<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';


class Auth extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->table ='users';
    }


    // passwordReset


      public function userCheck_get($value='')
        {
            // code...
            
            $phone = $this->security->xss_clean($this->get("phone"));

             if (!empty($phone)){

                $con['conditions'] = array(
                    'phone' => $phone,
                    'is_active' => 1,
                    'is_deleted' => 0
                );

                 if($users_row=$this->Crud_model->getRows($this->table,$con,'row')){
                      
                      $this->response([
                        "status" => TRUE,
                        "message" => "Redirecting to OTP Page",
                        "user_id"=>$users_row->id,
                        "customer_mobile_no"=>$users_row->phone,
                        "email"=>$users_row->email,
                     ], REST_Controller::HTTP_OK); 

                 }

                 else{
                     // Set the response and exit
                    $this->response([
                      'status' => FALSE,
                      "message" => "User Mobile No not found.",
                    ], REST_Controller::HTTP_NOT_ACCEPTABLE);
                 }

           }

           else{
               // Set the response and exit
                $this->response([
                  'status' => FALSE,
                  "message" => "User Mobile No not found.",
                ], REST_Controller::HTTP_NOT_ACCEPTABLE);
                
            }
    }

  public function checkLogin_get()
      {

          $email = $this->security->xss_clean($this->get("email"));
          $password = $this->security->xss_clean($this->get("password"));

          $api_key = $this->input->get_request_header('X-API-KEY', TRUE);

            if (!empty($email) && !empty($password) ){

              if(is_numeric($email)){
                   $con['conditions'] = array(
                          'phone' => $email,
                          'is_active' => 1,
                          'is_deleted' => 0
                      );
              }else{
                  $con['conditions'] = array(
                          'email' => $email,
                          'is_active' => 1,
                          'is_deleted' => 0
                      );
              }
                    
                 if($users_row=$this->Crud_model->getRows($this->table,$con,'row')){
                              // Set the response and exit
                    
                        if(password_verify($password,$users_row->password)){
          
                                  $this->response([
                                      "status" => TRUE,
                                      "message" => "Redirecting to OTP Page",
                                      // "data"=>$users_row,
                                      "user_id"=>$users_row->id,
                                      "customer_mobile_no"=>$users_row->phone,
                                      "email"=>$users_row->email,
                                      // "other_data"=>$user_group
                                  ], REST_Controller::HTTP_OK); 

                              // }

                           }
                           else{

                            $this->response([
                                'status' => FALSE,
                                "message" => "Password Incorrect.Please try again.",
                                "data"=>'',
                                "user_id"=>'',
                                "other_data"=>''
                              ],
                                REST_Controller::HTTP_UNAUTHORIZED);
                           }
            
                  }
                  
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Please Check Email/Phone No. or else Signup as new Account.",
                           "data"=>'',
                          "user_id"=>'',
                         "other_data"=>''],
                          REST_Controller::HTTP_UNAUTHORIZED);
                      
                  }

              }
              
              else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Please Enter Email and Password.",
                             "data"=>'',
                          "user_id"=>'',
                           "other_data"=>''
                           ], REST_Controller::HTTP_NOT_ACCEPTABLE);
                      
                  }
    }




  
   public function checkOTP_get(){


          $user_id = $this->security->xss_clean($this->get("user_id"));
          $otp = $this->security->xss_clean($this->get("otp"));

          $api_key = $this->input->get_request_header('X-API-KEY', TRUE);

            if (!empty($user_id) && !empty($otp) ){

             
                   $con['conditions'] = array(
                        'id' => $user_id,
                        'is_active' => 1,
                        'is_deleted' => 0
                    );
            
                    
                 if($users_row=$this->Crud_model->getRows($this->table,$con,'row')){
                              // Set the response and exit
                        $currentDateTime = date('Y-m-d H:i:s');


                        $otp_expiry_time = new DateTime($users_row->otp_expiry_time);
                        $currentDateTime = new DateTime($currentDateTime);
                        $interval = $otp_expiry_time->diff($currentDateTime);

                        $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

                      
                      if($minutes<10){

                         if($otp==$users_row->otp){
          
                            if($users_row->is_govt_emp=="Y" && $users_row->is_bank_emp=="N")
                              {
                                  $option = array(
                                      'select' => 'user_group.*, designations.*,government.government_name,government.address,government.id',
                                      'table' =>'user_group',
                                      'join' => array(array('designations' => 'designations.id = user_group.group_id','government' => 'government.id ='.$users_row->organization_id)),
                                      'where' =>array('user_group.user_id' => $users_row->id),
                                      'single' =>TRUE,
                                 );
                                 $user_group=$this->Crud_model->commonGet($option);

                                   $logged_in_sess = array(
                                        'id' => $users_row->id,
                                        'username'  => $users_row->username,
                                        'email'     => $users_row->email,
                                        'firstname' => $users_row->firstname,
                                        'lastname'  => $users_row->lastname,
                                        'logged_in' => TRUE,
                                        'group_id' => $user_group->group_id,
                                        'group_name' => $user_group->designation_name,
                                        'permission' => $user_group->permission,
                                        'organization_id' => $users_row->organization_id,
                                        'LoginAfterLogout' => TRUE,
                                        'organization_name' => $user_group->government_name,
                                        // 'organization_logo' => $user_group->bank_logo,
                                        'organization_city' => $user_group->address,
                                        'sub_organization_branch_id' => $users_row->sub_organization_branch_id,
                                        'is_govt_emp' => "Y",
                                        'is_bank_emp' => "N",
                                        'document' => $mandate_customer_row->document,

                                        
                                  );

                              }
                              elseif ($users_row->is_govt_emp=="N" && $users_row->is_bank_emp=="Y") {
                                   $option = array(
                                      'select' => 'user_group.*, designations.*,banks.bank_name,banks.bank_id,banks.bank_address,banks.bank_logo',
                                      'table' =>'user_group',
                                      'join' => array(array('designations' => 'designations.id = user_group.group_id','banks' => 'banks.bank_id ='.$users_row->organization_id)),
                                      'where' =>array('user_group.user_id' => $users_row->id),
                                      'single' =>TRUE,
                                 );
                                 $user_group=$this->Crud_model->commonGet($option);

                                  $logged_in_sess = array(
                                        'id' => $users_row->id,
                                        'username'  => $users_row->username,
                                        'email'     => $users_row->email,
                                        'firstname' => $users_row->firstname,
                                        'lastname'  => $users_row->lastname,
                                        'logged_in' => TRUE,
                                        'group_id' => $user_group->group_id,
                                        'group_name' => $user_group->designation_name,
                                        'permission' => $user_group->permission,
                                        'organization_id' => $users_row->organization_id,
                                        'LoginAfterLogout' => TRUE,
                                        'organization_name' => $user_group->bank_name,
                                        'organization_logo' => $user_group->bank_logo,
                                        'organization_city' => $user_group->bank_address,
                                        'organization_phone' => $user_group->bank_phone,
                                        'sub_organization_branch_id' => $users_row->sub_organization_branch_id,
                                        'is_govt_emp' => "N",
                                        'is_bank_emp' => "Y",
                                        'document' => $mandate_customer_row->document,
                                        'profile_picture'=>$users_row->profile_picture
        
                                  );
                              }

                              else{

                                $option = array(
                                      'select' => 'user_group.*, designations.*',
                                      'table' =>'user_group',
                                      'join' => array(array('designations' => 'designations.id = user_group.group_id')),
                                      'where' =>array('user_group.user_id' => $users_row->id),
                                      'single' =>TRUE,
                                 );
                                 $user_group=$this->Crud_model->commonGet($option);

                                  $logged_in_sess = array(
                                        'id' => $users_row->id,
                                        'username'  => $users_row->username,
                                        'email'     => $users_row->email,
                                        'firstname' => $users_row->firstname,
                                        'lastname'  => $users_row->lastname,
                                        'logged_in' => TRUE,
                                        'group_id' => $user_group->group_id,
                                        'group_name' => $user_group->designation_name,
                                        'permission' => $user_group->permission,
                                        'organization_id' => $users_row->organization_id,
                                        'LoginAfterLogout' => TRUE,
                                        'organization_name' => "Briidea Innoventures",
                                        // 'organization_logo' => $user_group->bank_logo,
                                        'organization_city' => "Pune",
                                        'sub_organization_branch_id' => $users_row->sub_organization_branch_id,
                                        'is_govt_emp' => "N",
                                        'is_bank_emp' => "N",
                                  );

                              }
       
                                $this->session->set_userdata($logged_in_sess);
                                $system_name= '';
                                $system_logo= '';
                                $settings_row    = $this->Crud_model->getRows('general_settings',array(),'result');
                                  foreach ($settings_row as $key => $value) {
                                  
                                        if($value->type=="system_name"){
                                          $system_name=$value->value;
                                        }

                                        if($value->type=="system_logo"){
                                          $system_logo=$value->value;
                                        }
                                  
                                  }

                                  $this->session->set_userdata(array('system_name'=>$system_name,'system_logo'=>$system_logo));

                                  $conUserActive['conditions'] = array(
                                      'email' => $email,
                                      'id'=> $users_row->id,
                                      'is_active' => 1,
                                      'is_deleted' => 0
                                  );

                                  $data = array(
                                    'is_online' => 1,
                                  );

                                  $branches_row=$this->Crud_model->update($this->table,$data,$conUserActive);

                                  if($user_group->permission){
                                    $user_group->permission=unserialize($user_group->permission);
                                  }
                                  
                                  $this->response([
                                      "status" => TRUE,
                                      "message" => "Redirecting to Dashboard",
                                 
                                      // "other_data"=>$user_group
                                  ], REST_Controller::HTTP_OK); 

                              // }

                           }
                           else{

                            $this->response([
                                'status' => FALSE,
                                "message" => "OTP Incorrect.Please Enter Valid OTP.",
                                "data"=>'',
                                "user_id"=>'',
                                "other_data"=>'',
                                "otp_Expired"=>FALSE
                              ],
                                REST_Controller::HTTP_UNAUTHORIZED);
                           }


                      }
                      else{

                         $this->response([
                                'status' => FALSE,
                                "message" => "OTP Time Expired. Please Resend OTP.",
                                "data"=>'',
                                "user_id"=>'',
                                "other_data"=>'',
                                "otp_Expired"=>TRUE
                              ],
                                REST_Controller::HTTP_UNAUTHORIZED);

                      }

                       
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Please Check Email/Phone No. or else Signup as new Account.",
                          "data"=>'',
                          "user_id"=>'',
                          "other_data"=>'',
                          "otp_Expired"=>FALSE
                        ],
                          REST_Controller::HTTP_UNAUTHORIZED);
                      
                  }

              }
              
              else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Please Enter OTP.",
                             "data"=>'',
                          "user_id"=>'',
                           "other_data"=>''
                           ], REST_Controller::HTTP_NOT_ACCEPTABLE);
                      
                  }
    }


}

?>