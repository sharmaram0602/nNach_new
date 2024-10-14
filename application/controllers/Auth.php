<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

	/* Login View Load  */
	public function login()
	{
		$this->data['page_name']  = 'Login';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];

		$this->render_template_unauthorized('templates/authentication_pages/simple/login', $this->data);

		// $this->load->view('templates/authentication_pages/simple/login');
    }

    	/* To Destroy Session and Logout View Load  */
	public function logout()
	{	

		$conUserActive['conditions'] = array(
            'id'=> $this->session->userdata('id'),
            'is_active' => 1,
            'is_deleted' => 0
        );

		$data = array(
            'is_online' => 0,
        );

        $branches_row=$this->Crud_model->update('users',$data,$conUserActive);

		$this->session->sess_destroy();

		redirect('Auth/login', 'refresh');
	}

}
