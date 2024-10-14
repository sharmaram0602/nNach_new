<?php
require APPPATH.'libraries/REST_Controller.php';


class Import extends REST_Controller{
    public function __construct() {
        parent::__construct();

    }


    public function user_import_post($value='')
        {
           
            $organization_id = $this->session->userdata('organization_id');
            $added_by        = $this->session->userdata('id');


            $file_data =$_FILES['file']['tmp_name'];
       

            $objPHPExcel     = new PHPExcel();
            $objReader       = PHPExcel_IOFactory::createReaderForFile($file_data);
            $objPHPExcel     = $objReader->load($file_data);
            $sheet           = $objPHPExcel->getActiveSheet();
            $highestRow      = $sheet->getHighestRow();
            $highestColumn   = $sheet->getHighestColumn();
            $numberOfColumns = PHPExcel_Cell::columnIndexFromString($highestColumn);

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

            $uninserted_row_ids=array();

            for ($row =7; $row <= $highestRow; ++$row) {
                
                 $colIndex=0;

                 $firstname=null;
                 $middlename=null;
                 $lastname=null;
                 $email=null;
                 $phone_no=null;
                 $address=null;
                 $gender=null;
                 $username=null;
                 $password=null;
                 $sub_organization_branch_id=null;
                 $designation=null;


                for ($col = 'A'; $col <= $highestColumn; ++$col) {

                     $cellValue = $sheet->getCell($col . $row)->getValue();

                    if ($colIndex == 0) {
                                                                           
                           $firstname = $cellValue; 
                      
                    } 

                   else if ($colIndex == 1) {
                           $middlename = $cellValue; 

                   }

                   else if ($colIndex == 2) {
                           $lastname = $cellValue; 

                   }

                    else if ($colIndex == 3) {
                           $email = $cellValue; 

                   }

                     else if ($colIndex == 4) {
                           $phone_no = $cellValue; 

                   }
                     else if ($colIndex == 5) {
                           $address = $cellValue; 

                   }


                    else if ($colIndex == 6) {
                                                                           
                        if (in_array($cellValue, $optionsGender)) {
                            $numericIndex = array_search($cellValue, $optionsGender);
                            $cellValue = $numericValuesGender[$numericIndex];
                            $gender = $cellValue;
                        }

                    } 
                      else if ($colIndex == 7) {
                           $username = $cellValue; 

                   }
                     else if ($colIndex == 8) {
                           $password = password_hash($cellValue,PASSWORD_DEFAULT) ;

                   }
                           
                    else if ($colIndex == 9) {
                         
                        if (in_array($cellValue, $optionsBranch)) {
                            $numericIndex = array_search($cellValue, $optionsBranch);
                            $cellValue = $numericValuesBranch[$numericIndex];
                            $sub_organization_branch_id = $cellValue;
                        }
                    
                    } 
                           
                    else if ($colIndex == 10) {
                        
                        if (in_array($cellValue, $optionsDesignation)) {
                            $numericIndex = array_search($cellValue, $optionsDesignation);
                            $cellValue = $numericValuesDesignation[$numericIndex];
                            $designation = $cellValue;

                        }

                    }

                    $colIndex++;                                        
                }


                   $condition = array(
                        'users.is_active' => 1,
                        'users.is_deleted' => 0,
                        'users.is_verified' => 1,
                    );
                        $searchCondition = array(
                            'users.email LIKE' => '%' . $email . '%',
                            'users.phone LIKE' => '%' . $phone_no . '%',
                            'users.username LIKE' => '%' . $username . '%',
                        );

                          $option = array(
                            'select' => 'users.id',
                            'table' => 'users',
                            'where' => $condition,
                            'or_where' => $searchCondition,
             
                         );

                        if($users_row = $this->Crud_model->commonGet($option)){
                             array_push($uninserted_row_ids,$row);
                        }
                        else{

                            $conBranchCheck['conditions'] = array(
                            'branch_id' => $sub_organization_branch_id,
                            'is_active' => 1,
                            'is_deleted' => 0,
                        );

                        $condesignation['conditions'] = array(
                            'id' => $designation,
                            'is_active' => 1,
                            'is_deleted' => 0
                        );

                        $designation_row    = $this->Crud_model->getRows('designations', $condesignation, 'row');
                       
                        $permission_branch  = NULL;

                        if ($branch_row = $this->Crud_model->getRows('bank_branches', $conBranchCheck, 'row')) {
                          
                              $permission_branch[]=array(
                                "name" => $branch_row->branch_name,
                                "branch_id" => $sub_organization_branch_id, 
                                'is_active' => 1,
                                'is_deleted' => 0,
                              ); 
            
                              $permission_branch=json_encode($permission_branch);                 
                        }
                        
                         $data = array(
                              'username'        => $username,
                              'email'           => $email,
                              'gender'          => $gender,
                              'password'        => $password,
                              'firstname'       => $firstname,
                              'middlename'      => $middlename,
                              'lastname'        => $lastname,
                              'phone'           => $phone_no,
                              'address'         => $address,
                              'organization_id' => $organization_id,
                              'added_by'        => $added_by,
                              'is_verified'     => 1,
                              'is_active'       => 1,
                              'is_deleted'      => 0,
                              'otp'             => NULL,
                              'is_govt_emp'     => 'N',
                              'is_bank_emp'     => 'Y',
                              'sub_organization_branch_id'     => $sub_organization_branch_id,
                              'permission' => $designation_row->permission,
                              'permission_branch' => $permission_branch,
                          );   

                            if($u_row=$this->Crud_model->insert('users',$data)){
                              
                                  $group_data = array(
                                    'user_id' => $u_row,
                                    'group_id' => $designation
                                  );
                                                    
                                  $group_data_row = $this->Crud_model->insert('user_group', $group_data);  
                            
                            }
                           
                            else{
                                array_push($uninserted_row_ids,$row);
                            }

                        }
                
            }


                $html .= '<p class="form-label mb-5 text-danger">Below are the excel row data which is not got inserted. There can be a duplicate entries for email,phone or username or it is already present in existing data.</p><table class="table table-bordered"><tr>';

                   for ($col = 'A'; $col <= $highestColumn; ++$col) {
                      $cellValue = $sheet->getCell($col .'6')->getValue();
                        $html.='<th>'.$cellValue.'</th>';
                   }
                     
                      $html .= '</tr>';

                  
                  for ($index =0; $index < count($uninserted_row_ids); $index++) {
                   
                        $colIndex=0;
                        $html .= '<tr>';
                                 
                        for ($col = 'A'; $col <= $highestColumn; ++$col) {

                            $cellValue = $sheet->getCell($col . $uninserted_row_ids[$index])->getValue();

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
                            //  $cellValue = $numericValues[$numericIndex];
                    
                            }

                            $html .= '<td>'.$cellValue.'</td>';
                                         
                            $colIndex++;
                        
                        }

                      $html .= '</tr>'; 

                    }

                  $html .= '
                </table>';

             if($u_row)
              {

                 $this->response([
                          "status" => TRUE,
                          "message" => "Data Imported Successfully",
                          "data"=>NULL,
                          "uninserted_rows"=>$uninserted_row_ids,
                          "uninserted_table"=>$html
                       
                      ], REST_Controller::HTTP_OK); 
              }
              else{
                  $this->response([
                          'status' => FALSE,
                           "message" => "Data Imported Not Successful.",
                           "uninserted_rows"=>$uninserted_row_ids,
                            "uninserted_table"=>$html
                        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
    }

}


?>
