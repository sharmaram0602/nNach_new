<?php
require APPPATH.'libraries/REST_Controller.php';


class Bank extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='banks';

    }

    //  public function index_get($value='')
    // {
    //     $searchText = $this->security->xss_clean($this->get("searchTextBank"));
    //     $condition = array(
    //         'banks.is_active' => 1,
    //         'banks.is_deleted' => 0,
    //         'banks.is_verified' => 1,

            
    //     );

    //    if($searchText){

 
    //     $searchCondition=array(                                           
    //        'banks.bank_name LIKE'=> '%'.$searchText.'%',            
    //      );

   
    //    }

    //     // code...

    //     if($page!=''){
    //         $limit = 10;
    //        $offset = ($page - 1) * $limit;

    //   }
    //   else{
    //       $limit = 10000000000;
    //       $offset =0;
    //   }

      

        

    //       if($this->session->userdata('is_bank_emp')=="N" && $this->session->userdata('is_govt_emp')=="N") {
    //             $con['conditions'] = array(
    //                   'is_active' => 1,
    //                   'is_deleted' => 0
    //                );

            
    //       }  
    //        if($this->session->userdata('is_bank_emp')=="Y" && $this->session->userdata('is_govt_emp')=="N") {
    //           $con['conditions'] = array(
    //                   'bank_id' => $this->session->userdata('organization_id'),
    //                   'is_active' => 1,
    //                   'is_deleted' => 0
    //                );
    //      }

    //      $totalRows = $this->Crud_model->numRowsCount($this->table, $con, 'result');

    //        if($banks_row=$this->Crud_model->getRows($this->table,$con,'result')){

    //           $this->response([
    //                           "status" => TRUE,
    //                           "message" => "Bank Loaded Successfully.",
    //                           "data"=>$banks_row,
    //                           "total_rows" => $totalRows

    //                       ], REST_Controller::HTTP_OK); 
    //        }
    //        else{
    //          $this->response([
    //                       'status' => FALSE,
    //                       "message" => "Bank Not Found.Please add Bank."],
    //                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    //        }
    // }
  
    public function index_get($page = '')
    {
    $searchText = $this->security->xss_clean($this->get("searchTextBank"));
    $condition = array(
        'banks.is_active' => 1,
        'banks.is_deleted' => 0,
        'banks.is_verified' => 1,
    );

    if ($searchText) {
        $searchCondition = array(
            'banks.bank_name LIKE' => '%' . $searchText . '%',
        );
    }

    if ($page != '') {
        $limit = 10;
        $offset = ($page - 1) * $limit;
    } else {
        $limit = 10000000000;
        $offset = 0;
    }

    $option = array(
        'select' => 'banks.*',
        'table' => 'banks',
        'where' => $condition,
        'or_where' => $searchCondition,
        'limit' => array($limit => $offset),
    );

    if ($banks_row = $this->Crud_model->commonGet($option)) {
        $bank_name = array_column($banks_row, 'bank_name');
        array_multisort($bank_name, SORT_ASC, $banks_row);

        $conNumRows['conditions'] = array(
                      'is_active' => 1,
            'is_deleted' => 0,
            'is_verified' => 1,
                   );

        $searchCondition = array(
            'banks.bank_name LIKE' => '%' . $searchText . '%',
        );
            
        $optionCount = array(
            'select' => 'banks.*',
            'table' => 'banks',
            'where' => $condition,
            'or_where' => $searchCondition,
            'where' => array(
                      'is_active' => 1,
                'is_deleted' => 0,
                'is_verified' => 1,
            ),
                   );

        $numRows = $this->Crud_model->commonGet_count($optionCount);

              $this->response([
                              "status" => TRUE,
            "message" => "Banks Loaded Successfully.",
            "data" => $banks_row,
            "total_rows" => $numRows,
                          ], REST_Controller::HTTP_OK); 
    } else {
             $this->response([
                          'status' => FALSE,
            "message" => "Banks Not Found. Please add some banks."
        ], REST_Controller::HTTP_OK);
           }
    }

    public function show_Enach_Banks_By_Payment_Mode_get($value='')
    {

         $payment_mode = $this->security->xss_clean($this->get("payment_mode"));

         if(!empty($payment_mode)){
       
            $option = array(
                'select'=> 'enach_banks.*',
                'table' =>'enach_banks',
                'where' => array(
                    // 'enach_banks.enach_bank_type' =>$payment_mode,
                    'enach_banks.is_active' => 1,'enach_banks.is_deleted' => 0),
                'order'=>array('enach_banks.enach_bank_name'=>'ASC')
            );

                   if($banks_row=$this->Crud_model->commonGet($option)){

                          $this->response([
                              "status" => TRUE,
                              "message" => "Bank Loaded Successfully.",
                              "data"=>$banks_row
                          ], REST_Controller::HTTP_OK); 
                   }
                   else{
                         $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please add Bank."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   }

        }

        else
            {
                $this->response([
                  'status' => FALSE,
                  "message" => "Bank Not Found.Please try again."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

             }

    }

    public function show_Enach_Bank_row_get($value='')
    {
         $enach_bank_id = $this->security->xss_clean($this->get("enach_bank_id"));


         if(!empty($enach_bank_id)){
            $conGroup['conditions'] = array(
              'enach_bank_id' => $enach_bank_id,
              'is_active' => 1,
              'is_deleted' => 0
            ); 

            if($groups_row=$this->Crud_model->getRows('enach_banks',$conGroup,'row')){
             
                     $this->response([
                          "status" => TRUE,
                          "message" => "Banks Loaded Successfully.",
                          "data"=>$groups_row,
                      ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }


         }
         else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }

    }

    public function showBranchDetails_get($value='')
{
     $id = $this->security->xss_clean($this->get("id"));

      if (!empty($id)) {
        $option = array(
            'select' => 'bank_branches.*, states.state_title, cities.name',
            'table'  => 'bank_branches',
              'left_join'  => array(array(

                'states' => 'states.id = bank_branches.branch_state_id',

                'cities' => 'cities.id = bank_branches.branch_city_id')),
                
                'where' => array('bank_branches.branch_id' =>$id,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),

                'order'=>array('bank_branches.branch_name'=>'DESC'),
                'single'=> TRUE
                    );


        if ($branchDetails = $this->Crud_model->commonGet($option)) {
            $this->response([
                "status"  => TRUE,
                "message" => "Branch Details Loaded Successfully.",
                "data"    => $branchDetails
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => FALSE,
                "message" => "Branch Details Not Found.",
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
      } else {
        $this->response([
            'status'  => FALSE,
            "message" => "Invalid data.",
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}
  

    public function UserBranchrow_get($value='')
    {
        // code...
         $id = $this->security->xss_clean($this->get("id"));


         if(!empty($id)){
            $conGroup['conditions'] = array(
                          'bank_id' => $id,
                          'is_active' => 1,
                          'is_deleted' => 0
            ); 

            if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){
             
                

                 $option = array(
                        'select'=> 'bank_branches.*,states.*,cities.*',
                        'table' =>'bank_branches',
                       'left_join'  => array(array('states' => 'states.id = bank_branches.branch_state_id','cities' => 'cities.id = bank_branches.branch_city_id')),
                        'where' => array('bank_branches.bank_id' =>$id,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),
                        'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
                    );

                   if( $branches_row=$this->Crud_model->commonGet($option)){
                       $groups_row->bank_branches = $branches_row;
                   } 
                   else{
                       $groups_row->bank_branches = NULL;
                   }

                    $option = array(
                        'select'=> 'users.*,user_group.group_id,user_group.user_id,
                                    designations.designation_name,designations.id',
                        'table' =>'users',
                        'left_join'  => array(array('user_group'   => 'user_group.user_id = users.id',
                                               'designations' => 'designations.id = user_group.group_id')),
                        'where' =>array( 'users.is_active'    => 1,'users.is_deleted' => 0,
                                         'users.is_verified'  => 1,'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
                                         'users.is_primary_user' => "Y",'users.organization_id' => $id),
                        'single'=>TRUE
                    );


                    if($user_row=$this->Crud_model->commonGet($option)){
                          $groups_row->user_details = $user_row;
                    }
                    else{
                        $groups_row->user_details =NULL;

                    }




              $this->response([
                              "status" => TRUE,
                              "message" => "Banks Loaded Successfully.",
                              "data"=>$groups_row,
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }



         }
         else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
       
    }


    // public function row_get($value='')
    // {
    //     // code...
    //      $id = $this->security->xss_clean($this->get("id"));


    //      if(!empty($id)){
    //         $conGroup['conditions'] = array(
    //                       'bank_id' => $id,
    //                       'is_active' => 1,
    //                       'is_deleted' => 0
    //         ); 

    //         if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){
             
    //             // $option = array(
    //             //     'select' => 'mandate_customer.*, bank_branches.*, states.*, cities.*',
    //             //     'table' => 'mandate_customer',
    //             //     'join' => array(
    //             //         array('bank_branches' => 'mandate_customer.bank_id = bank_branches.bank_id'),
    //             //         array('states' => 'states.id = bank_branches.branch_state_id'),
    //             //         array('cities' => 'cities.id = bank_branches.branch_city_id')
    //             //     ),
    //             //     'where' => array(
    //             //         'mandate_customer.bank_id' => $id,
    //             //         'bank_branches.is_active' => 1,
    //             //         'bank_branches.is_deleted' => 0
    //             //     ),
    //             // );
    
    //             // if ($branches_row = $this->Crud_model->commonGet($option)) {
    //             //     $groups_row->bank_branches = $branches_row;
    //             // } else {
    //             //     $groups_row->bank_branches = NULL;
    //             // }
    
    

    //              $option = array(
    //                     'select'=> 'bank_branches.*,states.*,cities.*',
    //                     'table' =>'bank_branches',
    //                    'join'  => array(array('states' => 'states.id = bank_branches.branch_state_id','cities' => 'cities.id = bank_branches.branch_city_id')),
    //                     'where' => array('bank_branches.bank_id' =>$id,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),
    //                     // add condition for show selected branches
    //                     'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))

    //                 );

    //                if( $branches_row=$this->Crud_model->commonGet($option)){
    //                    $groups_row->bank_branches = $branches_row;
    //                } 
    //                else{
    //                    $groups_row->bank_branches = NULL;
    //                }

    //                 $option = array(
    //                     'select'=> 'users.*,user_group.group_id,user_group.user_id,
    //                                 designations.designation_name,designations.id',
    //                     'table' =>'users',
    //                     'join'  => array(array('user_group'   => 'user_group.user_id = users.id',
    //                                            'designations' => 'designations.id = user_group.group_id')),
    //                     'where' =>array( 'users.is_active'    => 1,'users.is_deleted' => 0,
    //                                      'users.is_verified'  => 1,'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
    //                                      'users.is_primary_user' => "Y",'users.organization_id' => $id),
    //                     'single'=>TRUE
    //                 );


    //                 if($user_row=$this->Crud_model->commonGet($option)){
    //                       $groups_row->user_details = $user_row;
    //                 }
    //                 else{
    //                     $groups_row->user_details =NULL;

    //                 }




    //           $this->response([
    //                           "status" => TRUE,
    //                           "message" => "Banks Loaded Successfully.",
    //                           "data"=>$groups_row,
    //                       ], REST_Controller::HTTP_OK); 
    //        }
    //        else{
    //          $this->response([
    //                       'status' => FALSE,
    //                       "message" => "Bank Not Found.Please try again."],
    //                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    //        }



    //      }
    //      else{
    //          $this->response([
    //                       'status' => FALSE,
    //                       "message" => "Bank Not Found.Please try again."],
    //                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

    //      }
       
    // }

    public function row_get($value='')
    {
        // code...
         $id = $this->security->xss_clean($this->get("id"));


         if(!empty($id)){
            $conGroup['conditions'] = array(
                          'bank_id' => $id,
                          'is_active' => 1,
                          'is_deleted' => 0
            ); 

            if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){
             
                

                 $option = array(
                        'select'=> 'bank_branches.*,states.*,cities.*',
                        'table' =>'bank_branches',
                       'join'  => array(array('states' => 'states.id = bank_branches.branch_state_id','cities' => 'cities.id = bank_branches.branch_city_id')),
                        'where' => array('bank_branches.bank_id' =>$id,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),
                        // 'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
                    );

                   if( $branches_row=$this->Crud_model->commonGet($option)){
                       $groups_row->bank_branches = $branches_row;
                   } 
                   else{
                       $groups_row->bank_branches = NULL;
                   }

                    $option = array(
                        'select'=> 'users.*,user_group.group_id,user_group.user_id,
                                    designations.designation_name,designations.id',
                        'table' =>'users',
                        'join'  => array(array('user_group'   => 'user_group.user_id = users.id',
                                               'designations' => 'designations.id = user_group.group_id')),
                        'where' =>array( 'users.is_active'    => 1,'users.is_deleted' => 0,
                                         'users.is_verified'  => 1,'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
                                         'users.is_primary_user' => "Y",'users.organization_id' => $id),
                        'single'=>TRUE
                    );


                    if($user_row=$this->Crud_model->commonGet($option)){
                          $groups_row->user_details = $user_row;
                    }
                    else{
                        $groups_row->user_details =NULL;

                    }




              $this->response([
                              "status" => TRUE,
                              "message" => "Banks Loaded Successfully.",
                              "data"=>$groups_row,
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }



         }
         else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
       
    }

      public function showAllBankTypes_get($value='')
    {
        // code...

           $con['conditions'] = array(
              'is_active' => 1,
              'is_deleted' => 0
           );


           if($banks_row=$this->Crud_model->getRows('bank_types',$con,'result')){

              $this->response([
                              "status" => TRUE,
                              "message" => "Bank Type Loaded Successfully.",
                              "data"=>$banks_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Not Found.Please add Bank."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
    }

    public function insert_post($value='')
  
    {
        # code...
        $bank_name          = $this->security->xss_clean($this->post("bank_name"));
        $bank_address          = $this->security->xss_clean($this->post("bank_address"));
        $bank_email         = $this->security->xss_clean($this->post("bank_email"));
        $bank_phone        = $this->security->xss_clean($this->post("bank_phone"));

        $bank_admin_f_name    = $this->security->xss_clean($this->post("bank_admin_f_name"));
        $bank_admin_l_name    = $this->security->xss_clean($this->post("bank_admin_l_name"));
        $bank_admin_mobile  = $this->security->xss_clean($this->post("bank_admin_mobile"));
        $bank_admin_email   = $this->security->xss_clean($this->post("bank_admin_email"));
        $bank_admin_username   = $this->security->xss_clean($this->post("bank_admin_username"));
     
        $bank_admin_gender        = $this->security->xss_clean($this->post("bank_admin_gender"));
        $bank_designation_id        = $this->security->xss_clean($this->post("bank_designation_id"));
        $bank_type_id        = $this->security->xss_clean($this->post("bank_type_id"));

     

        if (!empty($bank_name) && !empty($bank_address) && !empty($bank_admin_f_name) && !empty($bank_admin_mobile) && !empty($bank_designation_id))  {
 
              $data = array(
                 'bank_name'    =>  $bank_name,
                 'bank_address' =>  $bank_address,
                 'bank_email'   =>  $bank_email,
                 'bank_phone'   =>  $bank_phone,
                 'bank_type_id'   =>  $bank_type_id,
                 'is_verified'  =>  1,
              );
             
              if($bank_row=$this->Crud_model->insert($this->table,$data)){
                             
                   
                    if (!empty($bank_admin_f_name)  && !empty($bank_admin_mobile)  &&  !empty($bank_row))  

                            {

                            $conPhoneCheck['conditions'] = array(
                                  'phone'       => $bank_admin_mobile,
                                  'is_active'   =>1,
                                  'is_deleted'  =>0,
                                 // 'id!='=>$user_row->id
                            );
           
                            if($phone_row=$this->Crud_model->getRows('users',$conPhoneCheck,'row')){
                                    $this->response([
                                          'status' => FALSE,
                                          "message" => "Entered Admin Mobile no. already exist.Please change admin mobile no."],
                                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }

                            else{

                                 if(!empty($this->security->xss_clean($this->post("bank_admin_username")))){
                                   $conUsernameCheck['conditions'] = array(
                                      'username' => $bank_admin_username,
                                      'is_active'=>1,
                                      'is_deleted'=>0,
                                         //  'id!='=>$user_row->id
                                  );  
                                }
                                  
                                if($username_row=$this->Crud_model->getRows('users',$conUsernameCheck,'row')){

                                      $this->response([
                                          'status' => FALSE,
                                          "message" => "Entered Username. already exist.Please change username."],
                                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                                }

                                else{


                                $data = array(
                                      'username' => $bank_admin_username,
                                      'email' => $bank_admin_email,
                                      'gender' => $bank_admin_gender,
                                      'password' =>  password_hash($bank_admin_mobile,PASSWORD_DEFAULT),
                                      'firstname' => $bank_admin_f_name,
                                      'lastname' => $bank_admin_l_name,
                                      'phone' => $bank_admin_mobile,
                                      'organization_id' => $bank_row,
                                      'is_verified'=>1,
                                      'is_active'=>1,
                                      'is_deleted'=>0,
                                      'otp'=>NULL,
                                      'is_govt_emp'=>'N',
                                      'is_bank_emp'=>'Y',
                                      'is_primary_user'=>'Y'
                                     
                                  );           
                           
                         if($u_row=$this->Crud_model->insert('users',$data)){
                                              // Set the response and exit
                                $group_data = array(
                                            'user_id' => $u_row,
                                            'group_id' =>$bank_designation_id
                                );
                                
                                $group_data_row = $this->Crud_model->insert('user_group', $group_data);
                                    
                              
                                    $this->response([
                                          "status" => TRUE,
                                          "message" => "Users Added successfully.",
                                          "data"=>$u_row
                                      ], REST_Controller::HTTP_OK);
                            
                                  }
                                

                                  else{
                                      // Set the response and exit
                                    $this->response([
                                          'status' => FALSE,
                                          "message" => "Users not Added."],
                                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                      
                                  }

                                }

                            }

                     }
                     else{
                             $this->response([
                                      'status' => FALSE,
                                      "message" => "Please Fill Complete Information."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                     }
              }

              else{
                
                 $this->response([
                 'status' => FALSE,
                 "message" => "Bank not Added."],REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  
              }

         }
         else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Fill Complete Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }

    }


     public function updateBankBranchfirst_post($value='')
    
        {
                $id = $this->security->xss_clean($this->post("id"));
                $bank_id = $this->security->xss_clean($this->post("bank_id"));
                $branch_name = $this->security->xss_clean($this->post("branch_name"));
                $branch_address = $this->security->xss_clean($this->post("branch_address"));
                $state_id = $this->security->xss_clean($this->post("state_id"));
                $city_id = $this->security->xss_clean($this->post("city_id"));

                $con['conditions'] = array(
                  'branch_id' => $id,
                );


                $update_data = array(
                    'branch_name' => $branch_name,
                    'branch_address' => $branch_address,
                    'branch_state_id' => $state_id,
                    'branch_city_id' => $city_id
                    
                );
                if ($this->Crud_model->update('bank_branches', $update_data,$con)) {

                    $this->response([
                        "status" => TRUE,
                        "message" => "Update and Fetch Successful.",
                        "data" => NULL
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        "message" => "Update Error Occurred."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
    }

    public function update_post($value='')
            {
               
                $id = $this->security->xss_clean($this->post("id"));
                
                $bank_name          = $this->security->xss_clean($this->post("bank_name"));
                $bank_address          = $this->security->xss_clean($this->post("bank_address"));
                $bank_email         = $this->security->xss_clean($this->post("bank_email"));
                $bank_phone        = $this->security->xss_clean($this->post("bank_phone"));

                $bank_admin_id    = $this->security->xss_clean($this->post("bank_admin_id"));
                $bank_admin_f_name    = $this->security->xss_clean($this->post("bank_admin_f_name"));
                $bank_admin_l_name  = $this->security->xss_clean($this->post("bank_admin_l_name"));
                $bank_admin_mobile   = $this->security->xss_clean($this->post("bank_admin_mobile"));
                $bank_admin_email   = $this->security->xss_clean($this->post("bank_admin_email"));
                $bank_admin_username        = $this->security->xss_clean($this->post("bank_admin_username"));
                $bank_admin_gender        = $this->security->xss_clean($this->post("bank_admin_gender"));
                $bank_designation_id        = $this->security->xss_clean($this->post("bank_designation_id"));
                $bank_type_id        = $this->security->xss_clean($this->post("bank_type_id"));
                 if (!empty($id) && !empty($bank_name))  {

                     $conBankCheck['conditions'] = array(
                                  'bank_id' => $id,
                                  'is_active' => 1,
                                  'is_deleted' => 0
                    ); 

                    if($groups_row=$this->Crud_model->getRows($this->table,$conBankCheck,'row')){
                        
                         $data = array(
                          'bank_name' => $bank_name,
                          'bank_address' => $bank_address,
                          'bank_email' => $bank_email,
                          'bank_phone' => $bank_phone,
                          'bank_type_id' => $bank_type_id,
                        
                         );
                     
                     if($branches_row=$this->Crud_model->update($this->table,$data,$conBankCheck)){

                                if(!empty($bank_admin_id)){


                                         $option = array(
                                            'select'=> 'users.*',
                                            'table' =>'users',
                                            'where' => array('users.phone' =>$bank_admin_mobile,'users.id!=' => $bank_admin_id,'users.is_active' => 1,'users.is_deleted' => 0),
                                         );

                                         if( $phone_row=$this->Crud_model->commonGet($option)){
                                                        $this->response([
                                                      'status' => FALSE,
                                                      "message" => "Entered Mobile no. already exist.Please change user mobile no."],
                                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                        }

                                        else{


                                              $option2 = array(
                                                    'select'=> 'users.*',
                                                    'table' =>'users',
                                                    'where' => array('users.username' =>$bank_admin_username,'users.id!=' => $bank_admin_id,'users.is_active' => 1,'users.is_deleted' => 0),
                                                 );

                                             if( $username_row=$this->Crud_model->commonGet($option2)){

                                                  $this->response([
                                                      'status' => FALSE,
                                                      "message" => "Entered Username. already exist.Please change username."],
                                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                                            }

                                            else{

                                                  $conUserUpdate['conditions'] = array(
                                                      'id' => $bank_admin_id,
                                                      'is_active' => 1,
                                                      'is_deleted' => 0,
                                                      'is_bank_emp' => "Y",
                                                      'is_govt_emp' => "N",
                                                      'is_primary_user' => "Y",
                                                  ); 

                                                if($groups_row=$this->Crud_model->getRows('users',$conUserUpdate,'row')){
                                                    
                                                         $dataUser = array(
                                                          'firstname' => $bank_admin_f_name,
                                                          'lastname' => $bank_admin_l_name,
                                                          'phone' => $bank_admin_mobile,
                                                          'email' => $bank_admin_email,
                                                          'username' => $bank_admin_username,
                                                          'gender' => $bank_admin_gender,
                                                        
                                                         );
                                                     
                                                             $branches_rowUser=$this->Crud_model->update('users',$dataUser,$conUserUpdate);
                                                                          // Set the response and exit

                                                                    $conUserGroupDes['conditions'] = array(
                                                                          'user_id' => $bank_admin_id,
                                                                   ); 
                                                                  $dataUserDes = array('group_id'=>$bank_designation_id);
                                                                $user_group_row=$this->Crud_model->update('user_group',$dataUserDes,$conUserGroupDes);


                                                                   $this->response([
                                                                      "status" => TRUE,
                                                                      "message" => "Bank updated successfully.",
                                                                      "data"=>$branches_rowUser
                                                                  ], REST_Controller::HTTP_OK);
                                                        
                                                              // }
                                                              // else{
                                                              //     $this->response([
                                                              //         "status" => TRUE,
                                                              //         "message" => "Bank updated successfully.",
                                                              //         "data"=>$branches_row
                                                              //     ], REST_Controller::HTTP_OK);
                                                              // }
                                                      
                                                    }

                                            }
                                        }
                                }
                                    
                               
                                else{

                                              $data = array(
                                                  'username'        => $bank_admin_username,
                                                  'email'           => $bank_admin_email,
                                                  'gender'          => $bank_admin_gender,
                                                  'password'        => password_hash($bank_admin_mobile,PASSWORD_DEFAULT),
                                                  'firstname'       => $bank_admin_f_name,
                                                  'lastname'        => $bank_admin_l_name,
                                                  'phone'           => $bank_admin_mobile,
                                                  'organization_id' => $id,
                                                  'is_verified'     => 1,
                                                  'is_active'       => 1,
                                                  'is_deleted'      => 0,
                                                  'otp'             => NULL,
                                                  'is_bank_emp' => "Y",
                                                  'is_govt_emp' => "N",
                                                  'is_primary_user' => "Y",
                                                  'sub_organization_branch_id' => NULL,
                                             );           
                                       
                                            if($u_row=$this->Crud_model->insert('users',$data)){

                                                    $group_data = array(
                                                        'user_id' => $u_row,
                                                        'group_id' => $bank_designation_id
                                                    );
                                                    
                                                    $group_data_row = $this->Crud_model->insert('user_group', $group_data);
                                                       
                                                        $this->response([
                                                              "status" => TRUE,
                                                              "message" => "Users Added successfully. and Bank Details Updated",
                                                              "data"=>$u_row
                                                          ], REST_Controller::HTTP_OK);
                                            }
                                        
                                }
                        
                      }
                      else{

                        if(!empty($bank_admin_id)){

                                          $option = array(
                                            'select'=> 'users.*',
                                            'table' =>'users',
                                            'where' => array('users.phone' =>$bank_admin_mobile,'users.id!=' => $bank_admin_id,'users.is_active' => 1,'users.is_deleted' => 0),
                                         );

                                         if( $phone_row=$this->Crud_model->commonGet($option)){
                                                        $this->response([
                                                      'status' => FALSE,
                                                      "message" => "Entered Mobile no. already exist.Please change user mobile no."],
                                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                        }

                                        else{


                                              $option = array(
                                                    'select'=> 'users.*',
                                                    'table' =>'users',
                                                    'where' => array('users.username' =>$bank_admin_username,'users.id!=' => $bank_admin_id,'users.is_active' => 1,'users.is_deleted' => 0),
                                                 );

                                             if( $username_row=$this->Crud_model->commonGet($option)){

                                                  $this->response([
                                                      'status' => FALSE,
                                                      "message" => "Entered Username. already exist.Please change username."],
                                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                                            }

                                            else{

                                                  $conUserUpdate['conditions'] = array(
                                                      'id' => $bank_admin_id,
                                                      'is_active' => 1,
                                                      'is_deleted' => 0,
                                                      'is_bank_emp' => "Y",
                                                      'is_govt_emp' => "N",
                                                      'is_primary_user' => "Y",
                                                  ); 

                                                if($groups_row=$this->Crud_model->getRows('users',$conUserUpdate,'row')){
                                                    
                                                         $dataUser = array(
                                                          'firstname' => $bank_admin_f_name,
                                                          'lastname' => $bank_admin_l_name,
                                                          'phone' => $bank_admin_mobile,
                                                          'email' => $bank_admin_email,
                                                          'username' => $bank_admin_username,
                                                          'gender' => $bank_admin_gender,
                                                        
                                                         );
                                                     
                                                             if($branches_rowUser=$this->Crud_model->update('users',$dataUser,$conUserUpdate)){
                                                                          // Set the response and exit

                                                                $conUserGroupDes['conditions'] = array(
                                                                      'user_id' => $bank_admin_id,
                                                                ); 
                                                                $dataUserDes = array('group_id'=>$bank_designation_id);
                                                                $user_group_row=$this->Crud_model->update('user_group',$dataUserDes,$conUserGroupDes);


                                                                   $this->response([
                                                                      "status" => TRUE,
                                                                      "message" => "Bank updated successfully.",
                                                                      "data"=>$branches_row
                                                                  ], REST_Controller::HTTP_OK);
                                                        
                                                              }
                                                                else{
                                                                  $this->response([
                                                                      "status" => TRUE,
                                                                      "message" => "Bank updated successfully.",
                                                                      "data"=>$branches_row
                                                                  ], REST_Controller::HTTP_OK);
                                                              }
                                                      
                                                    }

                                            }
                                        }
                                }
                                    
                                else{

                                              $data = array(
                                                  'username'        => $bank_admin_username,
                                                  'email'           => $bank_admin_email,
                                                  'gender'          => $bank_admin_gender,
                                                  'password'        => password_hash($bank_admin_mobile,PASSWORD_DEFAULT),
                                                  'firstname'       => $bank_admin_f_name,
                                                  'lastname'        => $bank_admin_l_name,
                                                  'phone'           => $bank_admin_mobile,
                                                  'organization_id' => $id,
                                                  'is_verified'     => 1,
                                                  'is_active'       => 1,
                                                  'is_deleted'      => 0,
                                                  'otp'             => NULL,
                                                  'is_bank_emp' => "Y",
                                                  'is_govt_emp' => "N",
                                                  'is_primary_user' => "Y",
                                                  'sub_organization_branch_id' => NULL,

                                            );           
                                       
                                            if($u_row=$this->Crud_model->insert('users',$data)){

                                                    $group_data = array(
                                                        'user_id' => $u_row,
                                                        'group_id' => $bank_designation_id
                                                    );
                                                    
                                                    $group_data_row = $this->Crud_model->insert('user_group', $group_data);
                                                       
                                                        $this->response([
                                                              "status" => TRUE,
                                                              "message" => "Users Added successfully. and Bank Details Updated",
                                                              "data"=>$u_row
                                                          ], REST_Controller::HTTP_OK);
                                            }
                                        
                                }
                       
                      }

                    }
                   
                    else{
                                $this->response([
                                  'status' => FALSE,
                                  "message" => "Previous Bank Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }


                 }
                 else{
                         $this->response([
                                  'status' => FALSE,
                                  "message" => "Please Fill Complete Information."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }
            }



  public function delete_post($value='')
            {
                # code...
             $id = $this->security->xss_clean($this->post("id"));
         
                if (!empty($id) && is_numeric($id)) {
                    # code...
            

                  $con['conditions'] = array(
                          'bank_id' => $id,
                          'is_active' => 1,
                          'is_deleted' => 0
                      
                      );
                $data = array('is_deleted' => 1 ,'is_active'=>0);

                 if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
                              // Set the response and exit
                    $this->response([
                          "status" => TRUE,
                          "message" => "Bank delete successfully.",
                          "data"=>$branches_row
                      ], REST_Controller::HTTP_OK);
            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Bank not delete ."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }

              }
              else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "invalid data."
                           ], REST_Controller::HTTP_BAD_REQUEST);
                      
                  }
            }

     public function showAllStates_get($value='')
            {
                   $con['conditions'] = array(
                      'status' => "Active",
                   );
              

                   if($states_result=$this->Crud_model->getRows('states',$con,'result')){

                        $name = array_column($states_result, 'state_title');
                         array_multisort($name, SORT_ASC, $states_result);
                      $this->response([
                                      "status" => TRUE,
                                      "message" => "States Loaded Successfully.",
                                      "data"=>$states_result
                                  ], REST_Controller::HTTP_OK); 
                   }
                   else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "States Not Found.Please add states."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   }
            }


             public function showAllCitiesByState_get($value='')
            {
              
                $state_id = $this->security->xss_clean($this->get("state_id"));
                if(!empty($state_id)){

                      $con['conditions'] = array(
                          'status'   => "Active",
                          'state_id' => $state_id 
                      );
                       
                      if($city_result=$this->Crud_model->getRows('cities',$con,'result')){
                            
                            $name = array_column($city_result, 'name');
                            array_multisort($name, SORT_ASC, $city_result);
                            
                              $this->response([
                                  "status" => TRUE,
                                  "message" => "Cities Loaded Successfully.",
                                  "data"=>$city_result
                              ], REST_Controller::HTTP_OK); 
                       }
                       else{
                            $this->response([
                              'status' => FALSE,
                              "message" => "Cities Not Found.Please add Cities first."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                       }
                
                }
                 else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "Error.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }

                 
            }



    public function insertBankBranch_post($value='')
  
    {
       
        $bank_id          = $this->security->xss_clean($this->post("bank_id"));
        $branch_name      = $this->security->xss_clean($this->post("branch_name"));
        $branch_address   = $this->security->xss_clean($this->post("branch_address"));
        $state_id         = $this->security->xss_clean($this->post("state_id"));
        $city_id          = $this->security->xss_clean($this->post("city_id"));
       
        $con['conditions']=array(
            'branch_name' => $branch_name,
            'is_active' => 1,
            'is_deleted' => 0
        );
  
        if (!empty($bank_id) && !empty($branch_name) && !empty($branch_address) && !empty($state_id) && !empty($city_id))  {
 
      
                    $existing_branch = $this->Crud_model->getRows('bank_branches', $con,'row');
      
      
                    if ($existing_branch) {
                        // Branch with the same name already exists
                        $this->response([
                            'status'  => FALSE,
                            'message' => 'Branch with the same name already exists.'
                        ], REST_Controller::HTTP_CONFLICT);
                        return;
                    }
              $data = array(
                  'bank_id'    =>  $bank_id,
                  'branch_name'         =>  $branch_name,
                  'branch_address'   =>  $branch_address,
                  'branch_state_id'   =>  $state_id,
                  'branch_city_id'     =>  $city_id,
              );
             
              if($government_row=$this->Crud_model->insert('bank_branches',$data)){
               
                    $this->response([
                          "status" => TRUE,
                          "message" => "Branch Added successfully.",
                          "data"=>$government_row
                      ], REST_Controller::HTTP_OK);
              }
              
              else{
                  // Set the response and exit
                $this->response([
                      'status' => FALSE,
                      "message" => "Branch not Added."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }

         }
         else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Fill Complete Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
         }

    }


    public function rowBankBranch_get($value='')
    {
        // code...
        $id = $this->security->xss_clean($this->get("id"));

        if(!empty($id)){

                $conGroup['conditions'] = array(
                              'branch_id' => $id,
                              'is_active' => 1,
                              'is_deleted' => 0
                ); 

                if($groups_row=$this->Crud_model->getRows('bank_branches',$conGroup,'row')){
                      $this->response([
                          "status" => TRUE,
                          "message" => "Branch Loaded Successfully.",
                          "data"=>$groups_row,
                      ], REST_Controller::HTTP_OK); 
                }
                else{
                 $this->response([
                              'status' => FALSE,
                              "message" => "Branch Not Found.Please try again."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
        }

        else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Invalid data."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

     public function updateBankBranch_post($value='')
            {
               
                $id = $this->security->xss_clean($this->post("id"));
                
                $bank_id          = $this->security->xss_clean($this->post("bank_id"));
                $branch_name          = $this->security->xss_clean($this->post("branch_name"));
                $branch_address         = $this->security->xss_clean($this->post("branch_address"));
                $state_id        = $this->security->xss_clean($this->post("state_id"));

                $city_id    = $this->security->xss_clean($this->post("city_id"));
              
                 if (!empty($id) && !empty($bank_id) && !empty($branch_name) 
                    && !empty($branch_address) && !empty($state_id) &&  !empty($city_id))  {


                       $con['conditions'] = array(
                          'branch_id' => $id,
                          'bank_id' => $bank_id,
                          'is_active' => 1,
                          'is_deleted' => 0
                        );
                        $data = array(
                            'branch_name' => $branch_name,
                            'branch_address' => $branch_address,
                            'branch_state_id' => $state_id,
                            'branch_city_id' => $city_id,
                         
                        );

                         if($branches_row=$this->Crud_model->update('bank_branches',$data,$con)){
                                      // Set the response and exit
                            $this->response([
                                  "status" => TRUE,
                                  "message" => "Branch Updated successfully.",
                                  "data"=>$branches_row
                              ], REST_Controller::HTTP_OK);
                    
                          }
                          else{
                              // Set the response and exit
                            $this->response([
                                  'status' => FALSE,
                                  "message" => "Branch not Updated."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                         }

            
                 }

                   else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Invalid Data."
                           ], REST_Controller::HTTP_BAD_REQUEST);
                 }
            }

             public function deleteBranch_post($value='')
            {
                # code...
             $branch_id = $this->security->xss_clean($this->post("branch_id"));
         
                if (!empty($branch_id) && is_numeric($branch_id)) {
                    # code...
                $con['conditions'] = array(
                  'branch_id' => $branch_id,
                  'is_active' => 1,
                  'is_deleted' => 0
                );
                $data = array('is_deleted' => 1 ,'is_active'=>0);

                 if($branches_row=$this->Crud_model->update('bank_branches',$data,$con)){
                              // Set the response and exit
                    $this->response([
                          "status" => TRUE,
                          "message" => "Branch delete successfully.",
                          "data"=>$branches_row
                      ], REST_Controller::HTTP_OK);
            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Branch not deleted."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                 }

              }
              else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Invalid Data."
                           ], REST_Controller::HTTP_BAD_REQUEST);
                 }
            }




               
    //   public function showBranchesOfBank_get($value='')
    // {
    //     // code...

    //      $id = $this->security->xss_clean($this->get("id"));

    //     if(!empty($id)){
               
    //        $con['conditions'] = array(
    //           'is_active' => 1,
    //           'is_deleted' => 0,
    //           'bank_id' =>$id,
    //        );


    //        if($banks_row=$this->Crud_model->getRows('bank_branches',$con,'result')){

    //           $this->response([
    //                           "status" => TRUE,
    //                           "message" => "Bank Branches Loaded Successfully.",
    //                           "data"=>$banks_row
    //                       ], REST_Controller::HTTP_OK); 
    //        }
    //        else{
    //          $this->response([
    //                       'status' => FALSE,
    //                       "message" => "Bank Branches Not Found.Please add Bank Branches."],
    //                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    //        }

    //      }

    //     else{
    //          $this->response([
    //                       'status' => FALSE,
    //                       "message" => "Invalid data."],
    //                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    //     }

    // }


    public function showBranchesOfBank_get($value = '')
{

    
         $id = $this->security->xss_clean($this->get("id"));

        if(!empty($id)){

             $option = array(
                'select'=> 'bank_branches.*,states.*,cities.*',
                'table' =>'bank_branches',
                   'left_join'  => array(array(

                    'states' => 'states.id = bank_branches.branch_state_id',

                    'cities' => 'cities.id = bank_branches.branch_city_id')),
                    
                    'where' => array('bank_branches.bank_id' =>$id,'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0),

                    'order'=>array('bank_branches.branch_name'=>'ASC')
                  );
       


           if($banks_row=$this->Crud_model->commonGet($option)){

              $this->response([
                              "status" => TRUE,
                              "message" => "Bank Branches Loaded Successfully.",
                              "data"=>$banks_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Bank Branches Not Found.Please add Bank Branches."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

         }

        else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Invalid data."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
  }
// ///////////////changes

// public function showUsersBranchList_get($page = '')
// {
//     $searchText = $this->security->xss_clean($this->get("search"));
//     $draw = $this->security->xss_clean($this->get("draw"));
//     $start = $this->security->xss_clean($this->get("start"));
//     $length = $this->security->xss_clean($this->get("length"));

//     $searchText = $searchText['value'];

//     $order_column = $_GET['order'][0]['column'];
//     $order_sort_dir = $_GET['order'][0]['dir'];
//     $order_column_name =$_GET['order'][0]['name'];
//     $order_column = (int)$order_column;
  
//     $order_array=array('bank_branches.branch_id' => 'ASC');
 

//     $final_columnSearchValue = array();

//     $searchCondition = array();
               
//     foreach ($_GET['columns'] as $index => $column) {
        
//         $columnSearchValue = $column['search']['value']; // Search value for the current column
//         $columnData = $column['data']; // Search value for the current column
//         $table_column_name = $column['name']; // Search value for the current column

//          if($index==$order_column && $columnData!=null){
            
//             $order_column_name = $column['data'];
//             $order_column_name='bank_branches.'.$order_column_name;
//             $order_array=array($order_column_name => $order_sort_dir);

//          }
       
//          if (!empty($columnSearchValue)) {
                       
//             $filteredConditions = array();

          

//             // else{

//                  $searchCondition_filter = array(
//                     $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
//                 );

//                 // foreach ($searchCondition_filter as $key => $value) {
//                 //             // Check if the key contains the string specified in $columnData
//                 //       if($columnData!="amount" && $columnData!="customer_start_date" && 
//                 //          $columnData!="customer_end_date"  && $columnData!="mandate_register_datetime"){

//                 //             if (strpos($key, $columnData) !== false) {
//                 //                 $filteredConditions[$key] = $value;
//                 //             }  

//                 //       }
                
//                 // } 

//                 $final_columnSearchValue [] =  $filteredConditions;
               
//             // }
            
//  }

//     }

//     $condition = array(
//         'bank_branches.is_active'=>1,
//         'bank_branches.is_deleted'=>0
//     );
       
//     if ($searchText) {
//         $searchCondition = array(
//             // 'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
//             'bank_branches.branch_name LIKE' => '%' . $searchText . '%',

//             'bank_branches.branch_address LIKE' => '%' . $searchText . '%',
//             'states.state_title LIKE' => '%' . $searchText . '%',
//             'cities.name LIKE' => '%' . $searchText . '%',
//         );
//     }

//     $option = array(
//         'select'=> 'bank_branches.*,states.*,cities.*',
//         'table' =>'bank_branches',
//         'left_join'  => array(
//             array(
//                 'states' => 'states.id = bank_branches.branch_state_id',
//                 'cities' => 'cities.id = bank_branches.branch_city_id'
//             )
//         ),
//         'where' => $condition,
//         'or_where' => $searchCondition,
//         'filters' => $final_columnSearchValue,
//         'order' => $order_array,
//         'limit' => array($length => $start),
//     );

//     $users_row=$this->Crud_model->commonGet($option);
//     if($users_row){

//         $conNumRows['conditions'] = array(
//             'bank_branches.is_active'=>1,
//             'bank_branches.is_deleted'=>0
//         );
//         $optionCount = array(
//             'select'=> 'bank_branches.*,states.*,cities.*',
//             'table' =>'bank_branches',
//             'left_join'  => array(
//                 array(
//                     'states' => 'states.id = bank_branches.branch_state_id',
//                     'cities' => 'cities.id = bank_branches.branch_city_id'
//                 )
//             ),
//             'where' => $condition,
//             'or_where' => $searchCondition,
//             'filters' => $final_columnSearchValue,
//             'order' => $order_array,
//         );

//         $numRows = $this->Crud_model->commonGet_count($optionCount);
//         $this->response([
//             "status" => TRUE,
//             "message" => "User Loaded Successfully.",
//             "data"=>$users_row,
//             "total_rows" => $numRows,
//             "draw"=> intval($draw),
//             "recordsTotal"=>$numRows,
//             "recordsFiltered"=>$numRows,  
//         ], REST_Controller::HTTP_OK); 
    
//     } else {
//         $this->response([
//             'status' => FALSE,
//             "message" => "User Not Found. Please add User.",
//         ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//     }
// }

public function showUsersBranchList_get($page = '') {
    $searchText = $this->security->xss_clean($this->get("search"));
    $draw = $this->security->xss_clean($this->get("draw"));
    $start = $this->security->xss_clean($this->get("start"));
    $length = $this->security->xss_clean($this->get("length"));

    $searchText = $searchText['value'];

    $order_column = $_GET['order'][0]['column'];
    $order_sort_dir = $_GET['order'][0]['dir'];
    $order_column_name = $_GET['order'][0]['name'];
    $order_column = (int)$order_column;

    $order_array = array('bank_branches.branch_id' => 'ASC');

    $final_columnSearchValue = array();

    $searchCondition = array();

    foreach ($_GET['columns'] as $index => $column) {
        $columnSearchValue = $column['search']['value'];
        $columnData = $column['data'];
        $table_column_name = $column['name'];

        if ($index == $order_column && $columnData != null) {
            $order_column_name = $column['data'];
            $order_column_name = 'bank_branches.' . $order_column_name;
            $order_array = array($order_column_name => $order_sort_dir);
        }

        if (!empty($columnSearchValue)) {
            $filteredConditions = array();
            $searchCondition_filter = array(
                $table_column_name . ' REGEXP' => '.*' . $columnSearchValue . '.*',
            );
            $final_columnSearchValue[] = $searchCondition_filter;
        }
    }

    $condition = array(
        'bank_branches.is_active' => 1,
        'bank_branches.is_deleted' => 0,
        'bank_branches.bank_id' => 1
    );

    if ($searchText) {
        $searchCondition = array(
            'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
            'bank_branches.branch_address LIKE' => '%' . $searchText . '%',
            'states.state_title LIKE' => '%' . $searchText . '%',
            'cities.name LIKE' => '%' . $searchText . '%',
        );
    }

    $option = array(
        'select' => 'bank_branches.*, states.*, cities.*',
        'table' => 'bank_branches',
        'left_join' => array(
            array(
                'states' => 'states.id = bank_branches.branch_state_id',
                'cities' => 'cities.id = bank_branches.branch_city_id'
            )
        ),
        'where' => $condition,
        'or_where' => $searchCondition,
        'filters' => $final_columnSearchValue,
        'order' => $order_array,
        'limit' => array($length => $start),
    );

    $users_row = $this->Crud_model->commonGet($option);

    if ($users_row) {
        $conNumRows['conditions'] = array(
            'bank_branches.is_active' => 1,
            'bank_branches.is_deleted' => 0
        );
        $optionCount = array(
            'select' => 'bank_branches.*, states.*, cities.*',
            'table' => 'bank_branches',
            'left_join' => array(
                array(
                    'states' => 'states.id = bank_branches.branch_state_id',
                    'cities' => 'cities.id = bank_branches.branch_city_id'
                )
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
        );

        $numRows = $this->Crud_model->commonGet_count($optionCount);
        $this->response([
            "status" => TRUE,
            "message" => "User Loaded Successfully.",
            "data" => $users_row,
            "total_rows" => $numRows,
            "draw" => intval($draw),
            "recordsTotal" => $numRows,
            "recordsFiltered" => $numRows,
        ], REST_Controller::HTTP_OK);

    } else {
        $this->response([
            'status' => FALSE,
            "message" => "User Not Found. Please add User.",
            "data"=>NULL,
           "total_rows" =>0,
           "draw"=> intval($draw),
           "recordsTotal"=>0,
           "recordsFiltered"=>0,  
        ], REST_Controller::HTTP_OK);
    }
}


///export


public function exportbranchDetails_get()
{
    $searchText = $this->security->xss_clean($this->input->get("searchText"));
    $columnProperties = json_decode($this->input->get("columnProperties"), true);

    $condition = array(
        'bank_branches.is_active' => 1,
        'bank_branches.is_deleted' => 0,
        'bank_branches.bank_id' => 1
    );

    if ($searchText) {
        $searchCondition = array(
            'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
            'bank_branches.branch_address LIKE' => '%' . $searchText . '%',
            'states.state_title LIKE' => '%' . $searchText . '%',
            'cities.name LIKE' => '%' . $searchText . '%',
        );
    } else {
        $searchCondition = array();
    }

    $option = array(
        'select' => 'bank_branches.*, states.state_title, cities.name',
        'table' => 'bank_branches',
        'left_join' => array(
            array(
                'states' => 'states.id = bank_branches.branch_state_id',
                'cities' => 'cities.id = bank_branches.branch_city_id'
            )
        ),
        'where' => $condition,
        'or_where' => $searchCondition,
    );

    $users_row = $this->Crud_model->commonGet($option);

    if ($users_row) {
        $this->response([
            "status" => TRUE,
            "message" => "Data Loaded Successfully.",
            "data" => $users_row,
        ], REST_Controller::HTTP_OK); 
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "No Data Found.",
        ], REST_Controller::HTTP_OK);
    }
}


//////////////
///Show Branch
public function showLoanType_get($value = '')
{
    $option = array(
        'select' => 'loan_types.loan_type_id, loan_types.loan_type_name',
        'table' => 'loan_types',
    );

    $loan_result = $this->Crud_model->commonGet($option);

    if ($loan_result) {
        $this->response([
            "status" => TRUE,
            "message" => "Loaded Successfully.",
            "data" => $loan_result
        ], REST_Controller::HTTP_OK);
    } else {
             $this->response([
                          'status' => FALSE,
            "message" => "Loan Types Not Found. Please add loan types.",
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


}


?>
