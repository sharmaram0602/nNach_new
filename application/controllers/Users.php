<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function __construct()
		{
			parent::__construct();

	    	/* Checking Condition if not logged in  */
			if (!$this->session->userdata('logged_in')) {
				# code...
				redirect(base_url('Auth/Login'));

			} 
				
	    // Start---- Code for changing last online status ////

	        $conEmail['conditions'] = array(
	            'id' => $this->session->userdata('id'),
	        ); 
	        $check=$this->Crud_model->getRows('users',$conEmail,'row');

	    
	       
	        if($check->last_online_at!=date('Y-m-d H:i:s')) {
	           
	            $data = array(
	                'last_online_at' => date('Y-m-d H:i:s'),
	            );

	            $u_row=$this->Crud_model->update('users',$data,$conEmail);
	        }
	      
	    // End---- Code for changing last online status ////

	}

	public function index()
	{

	

		$this->data['page_name']  = 'Staff';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
	

		$this->render_template('pages/users/users', $this->data);

	}

	public function user_import_template(){


			// Initialize PHPExcel object
			$objPHPExcel = new PHPExcel();

			// Set instructions
			$instructions = "Instructions:\n1. Please fill in the required information marked with astric(*)\n2. Select appropriate options from the dropdown lists where provided.\n3.Please Dont Change/Edit names columns or shift columns.";

			// Add instructions at the beginning

			$richText = new PHPExcel_RichText();
			$boldTextRun = $richText->createTextRun($instructions);
			$boldTextRun->getFont()->setBold(true); // Make the text bold



			$objPHPExcel->getActiveSheet()->mergeCells('A1:K4'); // Merge cells to accommodate instructions
			$objPHPExcel->getActiveSheet()->setCellValue('A1', $richText);


			// Set column headers
			$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Firstname (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('B6', 'Middlename');
			$objPHPExcel->getActiveSheet()->setCellValue('C6', 'Lastname (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Email (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Phone or Mobile No. (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('F6', 'Address');
			$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Gender');
			$objPHPExcel->getActiveSheet()->setCellValue('H6', 'Username (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('I6', 'Password (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('J6', 'Branch (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('K6', 'Designation (*)');

			$objPHPExcel->getActiveSheet()->getStyle('A6:K6')->getFont()->setBold(true);

		    $redFont = array(
			    'font' => array(
			        'color' => array('rgb' => 'FF0000'), // Red color
			    ),
			);

			$objPHPExcel->getActiveSheet()->getStyle('A6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('D6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('H6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('I6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('J6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('K6')->applyFromArray($redFont);

			// Arrays to store dropdown options and numeric values
			$optionsDesignation = array(); 
			$numericValuesDesignation = array(); 

			$optionsBranch = array(); 
			$numericValuesBranch = array();

			$optionsGender = array('Male','Female','Other'); 
			$numericValuesGender = array(1,2,3);

			// Query to fetch designation options
			$designationOption = array(
			    'select' => 'designations.*',
			    'table' => 'designations',
			    'where' => array('is_active' => 1, 'is_deleted' => 0),
			);

			if ($designation_rows = $this->Crud_model->commonGet($designationOption)) {
			    foreach ($designation_rows as $designation_row) {
			        array_push($optionsDesignation, $designation_row->designation_name);
			        array_push($numericValuesDesignation, $designation_row->id);
			    }
			}

			// Query to fetch branch options
			$branchOption = array(
			    'select'=> 'bank_branches.*',
			    'table' =>'bank_branches',
			    'where' => array('bank_branches.bank_id' => 1,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),
			);

			if($branches_row = $this->Crud_model->commonGet($branchOption)){
			    foreach ($branches_row as $branch_row) {
			        array_push($optionsBranch, $branch_row->branch_name);
			        array_push($numericValuesBranch, $branch_row->branch_id);
			    }
			}

			// Set dropdown options for selective columns
			$dropdownColumns = array(6,9,10); 

			foreach ($dropdownColumns as $colIndex) {
			    $rowCount = 6; 
			    $totalRows = 1000; 

			    // Define options and numericValues based on the column
			    if ($colIndex == 6) {
			        $options = $optionsGender;
			        $numericValues = $numericValuesGender;
			    } 
			    elseif ($colIndex == 9) {
			        $options = $optionsBranch;
			        $numericValues = $numericValuesBranch;
			    } 
			    elseif ($colIndex == 10) {
			        $options = $optionsDesignation;
			        $numericValues = $numericValuesDesignation;
			    }

			    // Loop through each row in the column
			    for ($i = $rowCount; $i <= $totalRows; $i++) {
			        $cell = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($colIndex, $i);
			        $validation = $cell->getDataValidation(); 

			        // Set dropdown validation
			        $validation->setType(PHPExcel_Cell_DataValidation::TYPE_LIST);
			        $validation->setErrorStyle(PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
			        $validation->setAllowBlank(false);
			        $validation->setShowInputMessage(true);
			        $validation->setShowErrorMessage(true);
			        $validation->setShowDropDown(true);
			        $validation->setErrorTitle('Input error');
			        $validation->setError('Value is not in list');
			        $validation->setPromptTitle('Please Select Value from the list');
			        $validation->setPrompt('Please pick a value from the dropdown list');
			        $validation->setFormula1('"'.implode(',', $options).'"'); // Set dropdown options

			        // Set numeric value corresponding to text option
			        $textValue = $cell->getValue();
			        if (in_array($textValue, $options)) {
			            $numericIndex = array_search($textValue, $options);
			            $cell->setValueExplicit($numericValues[$numericIndex], PHPExcel_Cell_DataType::TYPE_NUMERIC);
			        }
			    }
			}

			$objPHPExcel->setActiveSheetIndex(0);
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

			// Sending headers to force the user to download the file
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="sync_finnect_staff_template.xlsx"');
			header('Cache-Control: max-age=0');

			$objWriter->save('php://output');

	}

	public function mandateCustomer($value='')
	{
		// code...

		$mandate_setting_option = array(
		    'select' => 'mandate_settings.*',
		    'table' => 'mandate_settings',
		    'where' => array('is_active' => 1, 'is_deleted' => 0),
		);

		$mandate_settings = $this->Crud_model->commonGet($mandate_setting_option);

		$this->data['page_name']  = 'Mandate Customers';	
		$this->data['mandate_settings']  = $mandate_settings;	
		$this->data['page_title'] = 'eNACH - Mandate Customers';
		$this->render_template('pages/users/mandateCustomer', $this->data);

	}

	public function pendingmandateCustomer($value='')
	{
		// code...
		$mandate_setting_option = array(
		    'select' => 'mandate_settings.*',
		    'table' => 'mandate_settings',
		    'where' => array('is_active' => 1, 'is_deleted' => 0),
		);
		
		$mandate_settings = $this->Crud_model->commonGet($mandate_setting_option);
		$this->data['page_name']  = 'Pending Mandate Customers';	
		$this->data['mandate_settings']  = $mandate_settings;	
		$this->data['page_title'] = 'eNACH - Pending Mandate  Customers';
		$this->render_template('pages/users/pendingMandateCustomers', $this->data);

	}

	public function transactionSchedule($mandate_customer_id='')
	{
		// code...
		$this->data['page_name']  = 'Customer Transaction Schedule';	
		$this->data['page_title'] = 'eNACH Customer Transaction Schedule';
		$this->data['mandate_customer_id'] = $mandate_customer_id;
		$this->render_template('pages/users/transactionSchedule', $this->data);

	}
	public function cancelMandateCustomer()
	{
		$this->data['page_name']  = 'Canceled Mandates';	
		$this->data['page_title'] = 'Canceled Mandates';
		$this->render_template('pages/users/canceledMandate', $this->data);
	}



public function cancelMandateSheetDownload($mandateCustomerId = '')
{
    // Fetch customer data from the database
    $conCustomer['conditions'] = array(
        'mandate_customer_id' => $mandateCustomerId
    );

    $CustomerRowData = $this->Crud_model->getRows('mandate_customers', $conCustomer, 'row');

    // Extract values
    $customerName = $CustomerRowData->customer_name;
    $ConsumerCode = $CustomerRowData->consumer_ID;
    $ProcessorUniqueNo = $CustomerRowData->mandate_token;

    $all_log = json_decode($CustomerRowData->all_log);
    $mandateData = $all_log->merchantAdditionalDetails;

    // Extract the mandateData section
    preg_match('/mandateData{([^}]*)}/', $mandateData, $matches);
    $mandateData = $matches[1]; // Get the inner content of the mandateData

    // Split the key-value pairs using ~
    $mandateArray = explode('~', $mandateData);

    // Create an associative array
    $parsedMandateData = [];
    foreach ($mandateArray as $pair) {
        if (strpos($pair, ':') !== false) {
            list($key, $value) = explode(':', $pair);
            $parsedMandateData[$key] = $value;
        }
    }

    // Get UMRNNumber from parsed mandate data
    $UMRNNumber = isset($parsedMandateData['UMRNNumber']) ? $parsedMandateData['UMRNNumber'] : '';
	
	$payee_id= new PHPExcel_RichText();
	$boldTextRunTitle = $payee_id->createTextRun('900000004826');

    // Initialize PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set column headers
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Payee ID');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Consumer Code');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Processor Unique No');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'UMRN No.');

    // Bold the header row
    $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);

    // Set data for the first row
    $objPHPExcel->getActiveSheet()->getStyle('A2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

	$objPHPExcel->getActiveSheet()->setCellValue('A2',$payee_id);
    $objPHPExcel->getActiveSheet()->setCellValue('B2', $ConsumerCode); // Consumer code
    $objPHPExcel->getActiveSheet()->setCellValue('C2', $ProcessorUniqueNo); // Processor Unique No
    $objPHPExcel->getActiveSheet()->setCellValue('D2', $UMRNNumber); // UMRN No

    // Set number format to text for the relevant cells
    $objPHPExcel->getActiveSheet()->getStyle('A2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('B2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('C2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('D2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    // Set column widths
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Payee ID
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Consumer Code
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Processor Unique No
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // UMRN No

    // Set filename and output as Excel 2007
    $filename = '' . $customerName . '_Mandate_Cancellation_File.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Create writer and save the file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}





	
}
