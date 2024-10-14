<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends Admin_Controller {

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
	      

	}

	public function user_import(){


		$error = '';

		$html = '';

		if($_FILES['file']['name'] != '')
			{


					$optionsDesignation = array(); // Array to store designation options
					$numericValuesDesignation = array(); 

					$optionsBranch = array(); // Array to store branch options
					$numericValuesBranch = array();

					$optionsGender = array('Male','Female','Other'); // Array to store branch options
					$numericValuesGender = array(1,2,3);

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
					
					$branchOption  = array(
				        'select'=> 'bank_branches.*',
				        'table' =>'bank_branches',
				        'where' => array('bank_branches.bank_id' =>1,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),
				        // 'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
				    );

				   if($branches_row=$this->Crud_model->commonGet($branchOption)){

				       	foreach ($branches_row as $branch_row) {
					        array_push($optionsBranch, $branch_row->branch_name);
					        array_push($numericValuesBranch, $branch_row->branch_id);
					    }
				   }

				  $file_data =$_FILES['file']['tmp_name'];
				  
			      $objPHPExcel = new PHPExcel();
  				  $objReader = PHPExcel_IOFactory::createReaderForFile($file_data);
  				  $objPHPExcel = $objReader->load($file_data);
				  $sheet = $objPHPExcel->getActiveSheet();
				  $highestRow = $sheet->getHighestRow();
		          $highestColumn = $sheet->getHighestColumn();
		          $numberOfColumns = PHPExcel_Cell::columnIndexFromString($highestColumn);

				  $html .= '<p class="form-label mb-5 text-danger">Below is 5 sample rows. Please Check columns before importing.</p><table class="table table-bordered"><tr>';

							   for ($col = 'A'; $col <= $highestColumn; ++$col) {
							   	  $cellValue = $sheet->getCell($col .'6')->getValue();
							   		$html.='<th>'.$cellValue.'</th>';
							   }
								 
								  $html .= '</tr>';

								  if($highestRow > 11){
								 		$highestRow = 11;
								  }

                  for ($row =7; $row <= $highestRow; ++$row) {
                   
                    	$colIndex=0;
                    	$html .= '<tr>';
							     
							        for ($col = 'A'; $col <= $highestColumn; ++$col) {

							            $cellValue = $sheet->getCell($col . $row)->getValue();

		            			    if ($colIndex == 6) {
												        $options = $optionsGender;
												        $numericValues = $numericValuesGender;
												    } 
												    else if ($colIndex == 9) {
												        $options = $optionsBranch;
												        $numericValues = $numericValuesBranch;
												    } 
												    else if ($colIndex == 10) {
												        $options = $optionsDesignation;
												        $numericValues = $numericValuesDesignation;
												    }
												    else{
 																$options=array();
 																$numericValues = $cellValue;

												    }

							                if (in_array($cellValue, $options)) {
						                			$numericIndex = array_search($cellValue, $options);
						               			//	$cellValue = $numericValues[$numericIndex];
						               	
									            }

													   $html .= '<td>'.$cellValue.'</td>';
													 
							               $colIndex++;
									
										}

							      $html .= '</tr>';	

				   				}

				  $html .= '
				  </table>';
				  // die();

			}
			else
				{
				
				 $error = 'Please Select CSV File';
				
				}

			$output = array(
			 'error'  => $error,
			 'output' => $html
			);

			echo json_encode($output);

	}
	
}
