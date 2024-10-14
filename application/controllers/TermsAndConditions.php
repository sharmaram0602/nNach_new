
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsAndConditions extends Admin_Controller {

	public function __construct()
		{
			parent::__construct();

	    	/* Checking Condition if not logged in  */
			// if (!$this->session->userdata('logged_in')) {
			// 	# code...
			// 	redirect(base_url('Auth/Login'));
			// } 

	}

	public function index()
	{
		$this->data['page_name']  = 'SynceNACH  Terms  and Conditions';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
	

		$this->render_template_unauthorized('pages/termsandconditions/termsandconditions', $this->data);

	}

	// public function CustomerSelf($mandate_customer_id){

	// 	$this->data['page_name']  = 'Transaction';	
	// 	$this->data['mandate_customer_id']  = $mandate_customer_id;	
	// 	$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
	

	// 	$this->render_template_unauthorized('pages/customer/customer', $this->data);

	// }

	

}
