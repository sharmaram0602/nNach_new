<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Admin_Controller {

	public function __construct()
		{
			parent::__construct();

	}

	public function index()
		{
			$this->data['page_name']  = 'Transaction';	
			$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
			$this->render_template_unauthorized('pages/customer/customer', $this->data);

		}

}
