<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CVL extends Admin_Controller {

	public function __construct()
		{
			parent::__construct();
		}

	public function CustomerSelf($random_code){
		
		// https://tx.gl/r/iLl9i/

		$this->data['bank_name']  = ''; 
		$this->data['bank_logo']  = ''; 
		$conGroup['conditions'] = array(
			'random_code' => $random_code,
			'is_active' => 1,
			'is_deleted' => 0
		);

		$existing_data = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row');

		if ($existing_data) {

			// Convert existing datetime string to DateTime object
			$existing_datetime = new DateTime($existing_data->transaction_page_expiry_datetime);

			// Get current time in PHP
			$current_time = new DateTime();

			// Calculate the difference between current time and existing datetime
			$time_diff = $current_time->getTimestamp() - $existing_datetime->getTimestamp();

			// Convert difference to minutes
			$time_diff_minutes = round($time_diff / 60);

			$bankOption = array(
			    'select' => 'bank_branches.branch_id,bank_branches.bank_id,banks.bank_id,banks.bank_name,banks.bank_logo',
			    'table' => 'bank_branches',
			    'left_join' => array(
		            array(
		                'banks' => 'banks.bank_id = bank_branches.bank_id'
		            )
		         ),
			    'where' => array('branch_id' => $existing_data->branch_id),
			    'single' =>TRUE,
			);
				
			if ($bank_row = $this->Crud_model->commonGet($bankOption)) {

					$this->data['bank_name']  = $bank_row->bank_name; 
					$this->data['bank_logo']  = $bank_row->bank_logo; 
			}
			
			if($time_diff_minutes <= 15){

				$this->data['page_name']  = 'Transaction'; 
				$this->data['mandate_customer_id']  = $existing_data->mandate_customer_id; 
				$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
		 	    // Check if mandate exists
				$this->render_template_unauthorized('pages/customer/customer', $this->data);
			}

			else{

				$this->data['page_name']  = 'Error 403'; 
				$this->data['page_title'] = 'Error 403'.$time_diff_minutes;
				$this->data['mandate_customer_id']  = $existing_data->mandate_customer_id; 
				// Check if mandate exists
				$this->render_template_unauthorized('pages/errors/403',$this->data);
			}

		}

		else{
			$this->data['page_name']  = 'Error 404'; 
			$this->data['page_title'] = 'Error 404';
			$this->render_template_unauthorized('pages/errors/linkerror',$this->data);
		}

		
	}

}
