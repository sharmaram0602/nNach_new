<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_logs extends Admin_Controller {

	public function __construct()
		{
			parent::__construct();

	    	/* Checking Condition if not logged in  */
			if (!$this->session->userdata('logged_in')) {
				# code...
				redirect(base_url('Auth/Login'));
			} 

	}

	public function index()
	{
		$this->data['page_name']  = 'Change logs';	
		$this->data['page_title'] = $this->data['page_name'];
	

		$this->render_template('pages/change_logs/change_logs', $this->data);

	}

	public function mandateLog($mandate_customer_id='')
	{
		// code...
		$this->data['page_name']  = 'eNACH Customer Transaction Schedule';	
		$this->data['page_title'] = 'eNACH';
		$this->data['mandate_customer_id'] = $mandate_customer_id;
		
		$this->render_template('pages/change_logs/mandate_log', $this->data);

	}
	// public function mandateLog($value='')
	// {
	// 	// code...
	// 	$this->data['page_name']  = 'eNACH Mandate Log';	
	// 	$this->data['page_title'] = 'eNACH';
		
	// 	$this->render_template('pages/change_logs/mandate_log', $this->data);

	// }

	public function transactionLog($mandate_customer_id='')
	{
		// code...
		$this->data['page_name']  = 'eNACH Mandate Log';	
		$this->data['page_title'] = 'eNACH';
		$this->data['mandate_customer_id'] = $mandate_customer_id;

		
		$this->render_template('pages/change_logs/transaction_logs', $this->data);

	}


}
