<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
}

class Admin_Controller extends MY_Controller 
{
	
	var $permission = array();

	public function __construct() 
	{
		parent::__construct();

		$group_data = array();
		// if(empty($this->session->userdata('logged_in'))) {
		// 	$session_data = array('logged_in' => FALSE);
		// 	$this->session->set_userdata($session_data);
		// }
		// else {
			$user_id = $this->session->userdata('id');
				if($user_id){
				// $this->load->model('model_groups');
				$group_data = $this->Crud_model->getUserGroupByUserId($user_id);
				
				//print_r(unserialize($group_data->permission));
				// die();

				$this->data['user_permission'] = unserialize($group_data->permission);
				
				if($group_data->permission_branch){
					
					$permission_branch = json_decode($group_data->permission_branch);
					$this->data['user_permission_branch_array'] = json_decode($group_data->permission_branch);
					$this->data['user_permission_branch_id_array']  = array_column($permission_branch, 'branch_id');
					$this->data['user_permission_branch_name_array']  = array_column($permission_branch, 'name');

					$permission_branch_ids=array_values(array_column($permission_branch, 'branch_id'));
					$permission_branch_names=array_values(array_column($permission_branch, 'name'));

					$setSessionArrayPermission = array(
						'user_permission_branch_array' => json_decode($group_data->permission_branch),
						'user_permission_branch_id_array'  => $permission_branch_ids,
						'user_permission_branch_name_array'     => $permission_branch_names,
					);


				}
				else{
					$permission_branch =NULL;
					$this->data['user_permission_branches'] = NULL;
					$this->data['user_permission_branch_id_array']  = NULL;
					$this->data['user_permission_branch_name_array']  = NULL;

					$setSessionArrayPermission = array(
						'user_permission_branch_array' => NULL,
						'user_permission_branch_id_array'  =>NULL,
						'user_permission_branch_name_array'     => NULL,
					);

				}

				$this->session->set_userdata($setSessionArrayPermission);


				$this->permission = unserialize($group_data->permission);

			// }
		}
	}

	// 	$group_data = array();
	// 	// if(empty($this->session->userdata('logged_in'))) {
	// 	// 	$session_data = array('logged_in' => FALSE);
	// 	// 	$this->session->set_userdata($session_data);
	// 	// }
	// 	// else {
	// 		$user_id = $this->session->userdata('id');
	// 			if($user_id){
	// 			// $this->load->model('model_groups');
	// 			$group_data = $this->Crud_model->getUserGroupByUserId($user_id);
				
	// 			$this->data['user_permission'] = unserialize($group_data['permission']);
		
	// 			$this->permission = unserialize($group_data['permission']);
				

	// 		// }
	// 	}
	// }

	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			redirect('dashboard', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == FALSE) {
			redirect('auth/login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{

		$logged_in_sess = array(
            'sess_page' => str_replace(' ','_',$data['page_title']),
        );
		
        $this->session->set_userdata($logged_in_sess);
		$this->load->view('templates/header/header',$data);
		$this->load->view('templates/sidebar/sidebar',$data);
		$this->load->view('templates/topbar/topbar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer/footer',$data);
	}


	public function render_template_unauthorized($page = null, $data = array())
	{

		$logged_in_sess = array(
            'sess_page' => str_replace(' ','_',$data['page_title']),
        );
		
        $this->session->set_userdata($logged_in_sess);
		$this->load->view('templates/header/header',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer/footer',$data);
	}

}