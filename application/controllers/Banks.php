<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banks extends Admin_Controller {

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
		$this->data['page_name']  = 'Banks';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
	

		$this->render_template('pages/banks/banks', $this->data);

	}

	public function branches($value='')
	{
		$this->data['page_name']  = 'Branches';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
	

		$this->render_template('pages/banks/branches', $this->data);
	}

		public function branch_import_template(){


			// Initialize PHPExcel object
			$objPHPExcel = new PHPExcel();

			// Set instructions
			$instructions = "Instructions:\n1. Please fill in the required information marked with astric(*)\n2. Select appropriate options from the dropdown lists where provided.\n3.Please Dont Change/Edit names columns or shift columns.";

			// Add instructions at the beginning

			$richText = new PHPExcel_RichText();
			$boldTextRun = $richText->createTextRun($instructions);
			$boldTextRun->getFont()->setBold(true); // Make the text bold
			$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(30);
			$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(30);

			$objPHPExcel->getActiveSheet()->mergeCells('A1:K4'); // Merge cells to accommodate instructions
			$objPHPExcel->getActiveSheet()->setCellValue('A1', $richText);

			// Set column headers
			$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Branch Name (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('B6', 'Address');
			$objPHPExcel->getActiveSheet()->setCellValue('C6', 'State (*)');
			$objPHPExcel->getActiveSheet()->setCellValue('D6', 'City (*)');
	
			$objPHPExcel->getActiveSheet()->getStyle('A6:D6')->getFont()->setBold(true);

		    $redFont = array(
			    'font' => array(
			        'color' => array('rgb' => 'FF0000'), // Red color
			    ),
			);

			$objPHPExcel->getActiveSheet()->getStyle('A6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($redFont);
			$objPHPExcel->getActiveSheet()->getStyle('D6')->applyFromArray($redFont);

			// Arrays to store dropdown options and numeric values
			$optionsDesignation = array(); 
			$numericValuesDesignation = array(); 

			$optionsBranch = array(); 
			$numericValuesBranch = array();

			// Query to fetch designation options
			$designationOption = array(
			    'select' => 'states.state_title,states.id,states.status',
			    'table' => 'states',
			    'where' => array('status' => 'Active'),
			);

			if ($designation_rows = $this->Crud_model->commonGet($designationOption)) {
			    foreach ($designation_rows as $designation_row) {
			        array_push($optionsDesignation, $designation_row->status);
			        array_push($numericValuesDesignation, $designation_row->id);
			    }
			}

			// Query to fetch branch options
			$branchOption = array(
			    'select'=> 'cities.*',
			    'table' =>'cities',
			    'where' => array('status' => 'Active'),
			);

			if($branches_row = $this->Crud_model->commonGet($branchOption)){
			    foreach ($branches_row as $branch_row) {
			        array_push($optionsBranch, $branch_row->status);
			        array_push($numericValuesBranch, $branch_row->id);
			    }
			}



			foreach ($dropdownColumns as $colIndex) {
			    $rowCount = 7; 
			    $totalRows = 100; 

			    // Define options and numericValues based on the column
			    if ($colIndex == 2) {
			    	$options = $optionsDesignation;
			    	$numericValues = $numericValuesDesignation;
			    } 
			 
			    else if ($colIndex == 3) {
			    	$options = $optionsBranch;
			    	$numericValues = $numericValuesBranch;
			    } 

			    // Loop through each row in the column
			   
			    for ($i = $rowCount; $i <= $totalRows; $i++) {

			         $cell = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($colIndex, $i);
			         $validation = $cell->getDataValidation(); 
			        
			    //      // Set dropdown validation
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
			    //      // Set dropdown options
 				
			    //     // Set numeric value corresponding to text option
			         $textValue = $cell->getValue();
			         if (in_array($textValue, $options)) {
			            $numericIndex = array_search($textValue, $options);
			            $cell->setValueExplicit($numericValues[$numericIndex],PHPExcel_Cell_DataType::TYPE_NUMERIC);
			         }
			      
			    }


			}
			// die();
			$objPHPExcel->setActiveSheetIndex(0);
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

			// Sending headers to force the user to download the file
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="sync_finnect_banks_template.xlsx"');
			header('Cache-Control: max-age=0');

			$objWriter->save('php://output');


	}
	

}
