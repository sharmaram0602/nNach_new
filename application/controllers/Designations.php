<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designations extends Admin_Controller {

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
		$this->data['page_name']  = 'Designations';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
	

		$this->render_template('pages/designations/designations', $this->data);

	}

}
