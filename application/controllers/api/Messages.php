<?php
require APPPATH.'libraries/REST_Controller.php';


class Messages extends REST_Controller{
    public function __construct() {
        parent::__construct();

    }



    public function getVendorsByType_get($page = '')
        {
                $message_vendor_type = $this->security->xss_clean($this->get("message_vendor_type"));
               
                if(!empty( $message_vendor_type)){

                        $condition = array(
                            'message_vendors.message_vendor_is_active' => 1,
                            'message_vendors.message_vendor_is_deleted' => 0,
                            'message_vendors.message_vendor_type' => $message_vendor_type ,
                        );

                        $option = array(
                            'select' => 'message_vendors.message_variable_start_with,message_vendors.message_variable_end_with,
                                         message_vendors.message_vendor_id,message_vendors.message_vendor_name',
                            'table' => 'message_vendors',
                            'where' => $condition,
                        );

                        if ($banks_row = $this->Crud_model->commonGet($option)) {
                            
                            $this->response([
                                "status" => TRUE,
                                "message" => "Message Vendors Loaded Successfully.",
                                "data" => $banks_row,
                            ], REST_Controller::HTTP_OK); 

                        } 

                        else {

                            $this->response([
                                "status" => FALSE,
                                "message" => "Message Vendors Not Found."
                            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                        }

                }
                else{

                   $this->response([
                        "status" => FALSE,
                        "message" => "Please specify vendor type."
                        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                }

               
        }


        public function getSingleVendorByID_get($page = '')
        {
                $message_vendor_id = $this->security->xss_clean($this->get("message_vendor_id"));
               
                if(!empty( $message_vendor_id)){

                        $condition = array(
                            'message_vendors.message_vendor_is_active' => 1,
                            'message_vendors.message_vendor_is_deleted' => 0,
                            'message_vendors.message_vendor_id' => $message_vendor_id ,
                        );

                        $option = array(
                            'select' => 'message_vendors.message_variable_start_with,message_vendors.message_variable_end_with',
                            'table' => 'message_vendors',
                            'where' => $condition,
                            'single'=>TRUE
                        );

                        if ($banks_row = $this->Crud_model->commonGet($option)) {
                            
                            $this->response([
                                "status" => TRUE,
                                "message" => "Message Vendors Loaded Successfully.",
                                "data" => $banks_row,
                            ], REST_Controller::HTTP_OK); 

                        } 

                        else {

                            $this->response([
                                "status" => FALSE,
                                "message" => "Message Vendors Not Found."
                            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                        }

                }
                else{

                   $this->response([
                        "status" => FALSE,
                        "message" => "Please specify vendor type."
                        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                }

               
        }

    public function getTemplatesByVendorAndType_get($page = '')
        {
                $message_type = $this->security->xss_clean($this->get("message_type"));
                $message_template_vendor_id = $this->security->xss_clean($this->get("message_template_vendor_id"));
               
                if(!empty( $message_template_vendor_id) && !empty($message_type)){

                        if($message_template_vendor_id=='all'){
                            $condition = array(
                                'message_templates.message_template_is_active' => 1,
                                'message_templates.message_template_is_deleted' => 0,
                                'message_templates.message_template_type' => $message_type ,
                            );

                        }
                        else{
                            $condition = array(
                            'message_templates.message_template_is_active' => 1,
                            'message_templates.message_template_is_deleted' => 0,
                            'message_templates.message_template_type' => $message_type ,
                            'message_templates.message_template_vendor_id' => $message_template_vendor_id ,
                        );


                        }
                        
                        $option = array(
                            'select' => 'message_templates.*',
                            'table' => 'message_templates',
                            'where' => $condition,
                        );

                        if ($banks_row = $this->Crud_model->commonGet($option)) {
                            
                            $this->response([
                                "status" => TRUE,
                                "message" => "Message Templates Loaded Successfully.",
                                "data" => $banks_row,
                            ], REST_Controller::HTTP_OK); 

                        } 

                        else {

                            $this->response([
                                "status" => FALSE,
                                "message" => "Message Templates Not Found."
                            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                        }

                }
                else{

                   $this->response([
                        "status" => FALSE,
                        "message" => "Please specify vendor type."
                        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                }

               
        }

    public function getTemplateByID_get($page = '')
        {
            $message_template_id = $this->security->xss_clean($this->get("message_template_id"));
            
            if(!empty($message_template_id)){
            
                $condition = array(
                    'message_templates.message_template_is_active' => 1,
                    'message_templates.message_template_is_deleted' => 0,
                    'message_templates.message_template_id' => $message_template_id ,
                );
                    
                $option = array(
                    'select' => 'message_templates.*',
                    'table' => 'message_templates',
                    'where' => $condition,
                    'single'=>TRUE
                );

                if ($banks_row = $this->Crud_model->commonGet($option)) {
                        
                    $this->response([
                        "status" => TRUE,
                        "message" => "Message Templates Loaded Successfully.",
                        "data" => $banks_row,
                    ], REST_Controller::HTTP_OK); 

                } 

                else {

                    $this->response([
                        "status" => FALSE,
                        "message" => "Message Templates Not Found."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                
                }

            }
    
            else{

               $this->response([
                    "status" => FALSE,
                    "message" => "Please specify vendor type."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

            }
     
        }

        public function deleteMessageTemplate_post($value='')
            {
                # code...
             $message_template_id = $this->security->xss_clean($this->post("message_template_id"));
         
                if (!empty($message_template_id) && is_numeric($message_template_id)) {
                    # code...
            
                    $con['conditions'] = array(
                      'message_template_id' => $message_template_id,
                      'message_template_is_active' => 1,
                      'message_template_is_deleted' => 0
                    );
                    
                    $data = array('message_template_is_deleted' => 1 ,'message_template_is_active'=>0);

                     if($branches_row=$this->Crud_model->update('message_templates',$data,$con)){
                                  // Set the response and exit
                        $this->response([
                              "status" => TRUE,
                              "message" => "Template delete successfully.",
                              "data"=>$branches_row
                          ], REST_Controller::HTTP_OK);
                
                      }
                    
                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Template not deleted."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                      }

              }

              else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Invalid data."
                           ], REST_Controller::HTTP_BAD_REQUEST);
                      
                  }
            }



    public function getDefaultTemplateIDsByWorkType_get($page = '')
        {
            $message_template_work_type = $this->security->xss_clean($this->get("message_template_work_type"));
            
            if(!empty($message_template_work_type)){
            
                $condition = array(
                    'message_templates.message_template_is_active'  => 1,
                    'message_templates.message_template_is_deleted' => 0,
                    'message_templates.message_template_work_type'  => $message_template_work_type,
                    'message_templates.message_template_is_current' => "Y",
                );
                    
                $option = array(
                    'select'    => 'message_templates.message_template_id,message_templates.message_template_send_setting',
                    'table'    => 'message_templates',
                    'where'    => $condition,
                    'group_by' => 'message_templates.message_template_type',
                );

                if ($banks_row = $this->Crud_model->commonGet($option)) {

                    $messageTemplateSendBefore = [];

                    foreach ($banks_row as $key => $value) {
                        if ($value->message_template_send_setting) {
                            // Merge the decoded JSON array into $messageTemplateSendBefore
                            $messageTemplateSendBefore = array_merge(
                                $messageTemplateSendBefore,
                                json_decode($value->message_template_send_setting, true) // true to decode as an associative array
                            );
                        }
                    }


                    print_r($messageTemplateSendBefore);
                    exit();
                    
                        
                    $this->response([
                        "status" => TRUE,
                        "message" => "Message Templates Loaded Successfully.",
                        "data" => $banks_row,
                    ], REST_Controller::HTTP_OK); 

                } 

                else {

                    $this->response([
                        "status" => FALSE,
                        "message" => "Message Templates Not Found."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                
                }

            }
    
            else{

               $this->response([
                    "status" => FALSE,
                    "message" => "Please specify vendor type."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

            }
     
        }
    
    public function insertMessageTemplate_post($value='')
  
    {
       
       $message_template_type          = $this->security->xss_clean($this->post("message_template_type"));
       $message_template_work_type      = $this->security->xss_clean($this->post("message_template_work_type"));
       $message_template_vendor_id   = $this->security->xss_clean($this->post("message_template_vendor_id"));
       $message_template_sender_head         = $this->security->xss_clean($this->post("message_template_sender_head"));
       $message_template_dlt_id          = $this->security->xss_clean($this->post("message_template_dlt_id"));
       $message_template_name          = $this->security->xss_clean($this->post("message_template_name"));
       $message_template_category          = $this->security->xss_clean($this->post("message_template_category"));
       $message_template_language          = $this->security->xss_clean($this->post("message_template_language"));
       $message_template          = $this->security->xss_clean($this->post("message_template"));
       $message_template_variables_details          = $this->security->xss_clean($this->post("message_template_variables_details"));
       $message_template_is_current          = $this->security->xss_clean($this->post("message_template_is_current"));
       $message_template_vendor_template_id          = $this->security->xss_clean($this->post("message_template_vendor_template_id"));
       $message_template_vendor_template_name          = $this->security->xss_clean($this->post("message_template_vendor_template_name"));
       
       $message_template_send_setting = '{"frequencies":[{"dayBeforeDebitDate":"1","messageCount":1,"timePickers":["10:00 AM"]}]}';



    
       if(!empty($message_template_type) && !empty($message_template_work_type) && !empty($message_template_vendor_id) && !empty($message_template_name) && !empty($message_template_language) && !empty($message_template_is_current))  {
     
            $data = array(
              'message_template_type'             =>  $message_template_type,
              'message_template_work_type'         =>  $message_template_work_type,
              'message_template_vendor_id'      =>  $message_template_vendor_id,
              'message_template_sender_head'     =>  $message_template_sender_head,
              'message_template_dlt_id'      =>  $message_template_dlt_id,
              'message_template_name'             =>  $message_template_name,
              'message_template_category'         =>  $message_template_category,
              'message_template_language'      =>  $message_template_language,
              'message_template'      =>  $message_template,
              'message_template_variables_details'     =>  $message_template_variables_details,
              'message_template_is_current'      =>  $message_template_is_current,
              'message_template_vendor_template_id'      =>  $message_template_vendor_template_id,
              'message_template_vendor_template_name'      =>  $message_template_vendor_template_name,
              'message_template_added_by'      =>  $this->session->userdata('id'),
              'message_template_send_setting' => $message_template_send_setting
            );
         
              if($government_row=$this->Crud_model->insert('message_templates',$data)){
                    

                    if($message_template_is_current=="Y"){
                           $condition = array(
                            'message_templates.message_template_is_active'  => 1,
                            'message_templates.message_template_is_deleted' => 0,
                            'message_templates.message_template_work_type'  => $message_template_work_type ,
                            'message_templates.message_template_type'  => $message_template_type ,
                            'message_templates.message_template_is_current' => "Y",
                            'message_templates.message_template_id' =>$government_row,
                        );

                        $update_data = array( 'message_template_is_current'  => "N");
 
                    }
                    

                    $this->Crud_model->update('message_templates', $update_data,$condition);

                    $this->response([
                          "status" => TRUE,
                          "message" => "Template Added successfully.",
                          "data"=>$government_row
                      ], REST_Controller::HTTP_OK);
              }
              
              else{
                  // Set the response and exit
                $this->response([
                      'status' => FALSE,
                      "message" => "Template not Added."],
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



      public function updateMessageTemplate_post($value='')
    
        {
               $message_template_id = $this->security->xss_clean($this->post("message_template_id"));
               $message_template_type          = $this->security->xss_clean($this->post("message_template_type"));
               $message_template_work_type      = $this->security->xss_clean($this->post("message_template_work_type"));
               $message_template_vendor_id   = $this->security->xss_clean($this->post("message_template_vendor_id"));
               $message_template_sender_head         = $this->security->xss_clean($this->post("message_template_sender_head"));
               $message_template_dlt_id          = $this->security->xss_clean($this->post("message_template_dlt_id"));
               $message_template_name          = $this->security->xss_clean($this->post("message_template_name"));
               $message_template_category          = $this->security->xss_clean($this->post("message_template_category"));
               $message_template_language          = $this->security->xss_clean($this->post("message_template_language"));
               $message_template          = $this->security->xss_clean($this->post("message_template"));
               $message_template_variables_details          = $this->security->xss_clean($this->post("message_template_variables_details"));
               $message_template_is_current          = $this->security->xss_clean($this->post("message_template_is_current"));
               $message_template_vendor_template_id          = $this->security->xss_clean($this->post("message_template_vendor_template_id"));
               $message_template_vendor_template_name          = $this->security->xss_clean($this->post("message_template_vendor_template_name"));
       
                   
                $conGroup['conditions'] = array(
                  'message_template_id' => $message_template_id,
                  'message_template_is_active' => 1,
                  'message_template_is_deleted' => 0
                ); 

                if($groups_row=$this->Crud_model->getRows('message_templates',$conGroup,'row')){

                    $update_data = array(
                      'message_template_type'             =>  $message_template_type,
                      'message_template_work_type'         =>  $message_template_work_type,
                      'message_template_vendor_id'      =>  $message_template_vendor_id,
                      'message_template_sender_head'     =>  $message_template_sender_head,
                      'message_template_dlt_id'      =>  $message_template_dlt_id,
                      'message_template_name'             =>  $message_template_name,
                      'message_template_category'         =>  $message_template_category,
                      'message_template_language'      =>  $message_template_language,
                      'message_template'      =>  $message_template,
                      'message_template_variables_details'     =>  $message_template_variables_details,
                      'message_template_is_current'      =>  $message_template_is_current,
                      'message_template_vendor_template_id'      =>  $message_template_vendor_template_id,
                      'message_template_vendor_template_name'      =>  $message_template_vendor_template_name,
                      // 'message_template_added_by'      =>  $this->session->userdata('id'),
                    );

                    if ($this->Crud_model->update('message_templates', $update_data,$conGroup)) {

                        if($message_template_is_current=="Y"){
                               $condition = array(
                                'message_templates.message_template_is_active'  => 1,
                                'message_templates.message_template_is_deleted' => 0,
                                'message_templates.message_template_work_type'  => $message_template_work_type ,
                                'message_templates.message_template_type'  => $message_template_type ,
                                'message_templates.message_template_is_current' => "Y",
                                'message_templates.message_template_id' =>$message_template_id,
                            );

                            $update_data = array( 'message_template_is_current'  => "N");
         
                            }
                    

                        $this->response([
                            "status" => TRUE,
                            "message" => "Update  Successful.",
                            "data" => $message_template_id
                        ], REST_Controller::HTTP_OK);
                    } 
                    else {
                        $this->response([
                            'status' => FALSE,
                            "message" => "Update Error Occurred."
                        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }

                }
                else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "Template Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
              
    }




    public function send_all_messages_post($value='')
        
        {
                $message_template_id = $this->security->xss_clean($this->post("message_template_id"));
                $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
                $user_id = $this->security->xss_clean($this->post("user_id"));
                 
                if(!empty($message_template_id))  {


                    $conMessageTemplate['conditions'] = array(
                      'message_template_id' => $message_template_id,
                      'message_template_is_active' => 1,
                      'message_template_is_deleted' => 0
                    ); 

                    $customer_row=null;
                    $user_row=null;
                    $transaction_row=null;
                    $loan_row=null;
                    $phone=null;
                    $email=null;

                    if($mandate_customer_id){

                         $conCustomer['conditions'] = array(
                                'mandate_customer_id' => $mandate_customer_id,
                                'is_active' => 1,
                                'is_deleted' => 0
                            );

                        $customer_row    = $this->Crud_model->getRows('mandate_customers', $conCustomer,'row');

                    }  

                     if($user_id){

                        $conCustomer['conditions'] = array(
                            'id' => $user_id,
                            'is_active' => 1,
                            'is_deleted' => 0
                        );

                        $user_row = $this->Crud_model->getRows('users', $conCustomer,'row');

                    }     
                   

                    $template_row    = $this->Crud_model->getRows('message_templates',$conMessageTemplate,'row');
                    $settings_row    = $this->Crud_model->getRows('general_settings',array(),'result');
                    if(($customer_row || $user_row) && $template_row){


                        if($customer_row){


                                    $currentMonth = date('m');
                                    $conTransaction['conditions'] = array(
                                        'mts_customer_id' => $mandate_customer_id,
                                        'mts_is_active' => 1,
                                        'mts_is_deleted' => 0,
                                        'MONTH(mts_datetime)' =>date('m'),
                                    );
                                    $transaction_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conTransaction,'row');

                                    $conLoanType['conditions'] = array(
                                        'loan_type_id' => $customer_row->loan_type_id,
                                        'loan_type_is_active' => 1,
                                        'loan_type_is_deleted' => 0,
                                    );

                                    $loan_row = $this->Crud_model->getRows('loan_types',$conLoanType,'row');

                                    $conBranch['conditions'] = array(
                                        'branch_id' => $customer_row->branch_id,
                                        'is_active' => 1,
                                        'is_deleted' => 0,
                                    );

                                    $branch_row = $this->Crud_model->getRows('bank_branches',$conBranch,'row');

                        }


                        $conMessageVendor['conditions'] = array(
                           'message_vendor_id' => $template_row->message_template_vendor_id,
                           'message_vendor_is_active' => 1,
                           'message_vendor_is_deleted' => 0
                        );
                                        
                        if($vendor_row = $this->Crud_model->getRows('message_vendors', $conMessageVendor, 'row')){
                            
                            $message_template=NULL;
                            $response=NULL;


                            if($template_row->message_template_type=="SMS"){

                               
                                $message_template =  $template_row->message_template;
                                $message_template_variables_details = json_decode($template_row->message_template_variables_details);
                             
                                $variable_start = preg_quote($vendor_row->message_variable_start_with, '/');
                                $variable_end = preg_quote($vendor_row->message_variable_end_with, '/');

                                // Regular expression to match variables
                                $pattern = '/' . $variable_start . '(.*?)' . $variable_end . '/';

                                // Find all matches
                                preg_match_all($pattern, $message_template, $matches);

                                // Check if each match is a valid variable
                                $variables = [];

                                foreach ($matches[1] as $match) {
                                   $variables[] =$variable_start.rawurldecode($match).$variable_end;
                                }

                                $number_of_variables = count($variables);


                                foreach ($variables as $index => $variable) {

                                    if (isset($message_template_variables_details[$index])) {
                                        $column_name = $message_template_variables_details[$index];
                                        $parts = explode('.', $column_name);
                                        $table_name = $parts[0];
                                        $column_name = $parts[1];

                                          if (isset($user_row->$column_name) && $table_name=="users") {
                                             $replacement_value= '';
                                             if (isset($user_row->$column_name)){
                                                $replacement_value = $user_row->$column_name;
                                             }
                                            
                                            $message_template = str_replace($variable, $replacement_value, $message_template);
                                            
                                            $phone = $user_row->phone;
                                        }

                                        if (isset($branch_row->$column_name) && $table_name=="bank_branches") {
                                             $replacement_value= '';
                                             if (isset($branch_row->$column_name)){
                                                $replacement_value = $branch_row->$column_name;
                                             }
                                            
                                            $message_template = str_replace($variable, $replacement_value, $message_template);
                                        }




                                        if (isset($customer_row->$column_name) && $table_name=="mandate_customers") {
                                             $replacement_value= '';
                                             if (isset($customer_row->$column_name)){
                                                $replacement_value = $customer_row->$column_name;
                                             }
                                            
                                            $message_template = str_replace($variable, $replacement_value, $message_template);

                                            $phone = $customer_row->customer_mobile_no;
                                        }

                                        if (isset($transaction_row->$column_name) && $table_name=="mandate_transaction_schedule") {

                                             $replacement_value= '';
                                             if (isset($transaction_row->$column_name)){
                                                $replacement_value = $transaction_row->$column_name;
                                             }
                                        
                                            $message_template = str_replace($variable, $replacement_value, $message_template);
                                        }

                                        if (isset($loan_row->$column_name) && $table_name=="loan_types") {

                                             $replacement_value= '';
                                             if (isset($loan_row->$column_name)){
                                                $replacement_value = $loan_row->$column_name;
                                             }
                                            $message_template = str_replace($variable, $replacement_value, $message_template);
                                        }
                                    }
                                }

                            //    9869793658
                             
                                $apiKey = urlencode($vendor_row->message_vendor_key);

                                $sender = urlencode($template_row->message_template_sender_head);

                                $message = rawurlencode($message_template);

                                // Prepare data for POST request
                                $data = array('unicode'=>1,'apikey' => $apiKey, 'numbers' => $phone, 
                                              "sender" => $sender, "message" => $message);

                                // print_r($data);
                                // die();
                                // Send the POST request with cURL
                             
                                $ch = curl_init($vendor_row->message_vendor_redirect_url);

                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($ch);
                                curl_close($ch);
                                  


                            }

                            else if($template_row->message_template_type=="EMAIL"){

                                    $message_template =  $template_row->message_template;
                                    $message_template_variables_details = json_decode($template_row->message_template_variables_details);
                                 
                                    $variable_start = $vendor_row->message_variable_start_with;
                                    $variable_end = $vendor_row->message_variable_end_with;

                                    // Regular expression to match variables
                                    $pattern = '/' . $variable_start . '(.*?)' . $variable_end . '/';

                                    // Find all matches
                                    preg_match_all($pattern, $message_template, $matches);

                                    // Check if each match is a valid variable
                                    $variables = [];

                                    foreach ($matches[1] as $match) {
                                       $variables[] =$variable_start.rawurldecode($match).$variable_end;
                                    }

                                    $number_of_variables = count($variables);


                                    foreach ($variables as $index => $variable) {

                                        if (isset($message_template_variables_details[$index])) {
                                            $column_name = $message_template_variables_details[$index];
                                            $parts = explode('.', $column_name);
                                            $table_name = $parts[0];
                                            $column_name = $parts[1];

                                            if (isset($user_row->$column_name) && $table_name=="users") {
                                                 $replacement_value= '';
                                                 if (isset($user_row->$column_name)){
                                                    $replacement_value = $user_row->$column_name;
                                                 }
                                                
                                                $message_template = str_replace($variable, $replacement_value, $message_template);
                                                
                                                $phone = $user_row->phone;
                                                $email = $user_row->email;
                                            }

                                            if (isset($branch_row->$column_name) && $table_name=="bank_branches") {
                                                 $replacement_value= '';
                                                 if (isset($branch_row->$column_name)){
                                                    $replacement_value = $branch_row->$column_name;
                                                 }
                                                
                                                $message_template = str_replace($variable, $replacement_value, $message_template);
                                            }


                                            if (isset($customer_row->$column_name) && $table_name=="mandate_customers") {
                                                 $replacement_value= '';
                                                 if (isset($customer_row->$column_name)){
                                                    $replacement_value = $customer_row->$column_name;
                                                 }
                                                
                                                $message_template = str_replace($variable, $replacement_value, $message_template);

                                                $phone = $customer_row->customer_mobile_no;
                                                $email = $customer_row->customer_email;
                                            }

                                            if (isset($transaction_row->$column_name) && $table_name=="mandate_transaction_schedule") {

                                                 $replacement_value= '';
                                                 if (isset($transaction_row->$column_name)){
                                                    $replacement_value = $transaction_row->$column_name;
                                                 }
                                            
                                                $message_template = str_replace($variable, $replacement_value, $message_template);
                                            }

                                            if (isset($loan_row->$column_name) && $table_name=="loan_types") {

                                                 $replacement_value= '';
                                                 if (isset($loan_row->$column_name)){
                                                    $replacement_value = $loan_row->$column_name;
                                                 }
                                                $message_template = str_replace($variable, $replacement_value, $message_template);
                                            }
                                        }
                                    }


                                //    9869793658
                                   
                                    $mail_status='';
                                    $smtp_host='';
                                    $smtp_port='';
                                    $smtp_user='';
                                    $smtp_pass='';
                                    $organization_name='';

                                    foreach ($settings_row as $key => $value) {
                                            // code...

                                        if($value->type=="smtp_port"){
                                            $smtp_port  = $value->value;
                                        }
                                        if($value->type=="smtp_host"){
                                            $smtp_host = $value->value;
                                        }
                                         if($value->type=="smtp_user"){
                                            $smtp_user = $value->value;
                                        }
                                         if($value->type=="smtp_pass"){
                                            $smtp_pass = $value->value;
                                        }
                                         if($value->type=="mail_status"){
                                            $mail_status = $value->value;
                                        }

                                        if($value->type=="organization_name"){
                                            $organization_name = $value->value;
                                        }
                                            // print_r($value->type);
                                    }  

                                     $config = array(
                                        'protocol' =>  $mail_status,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user, // your Gmail address
                                        'smtp_pass' => $smtp_pass, // your App Password
                                        'mailtype' => 'html',
                                        'charset' => 'utf-8',
                                        'wordwrap' => TRUE,
                                        'newline' => "\r\n",
                                        'starttls'  => true,
                                    );


                                    $this->email->initialize($config);
                                    $this->email->from($smtp_user,$organization_name);
                                    $this->email->to($email);
                                    $this->email->subject($template_row->message_template_work_type);
                                    $this->email->message($message_template);

                                     if($this->email->send())
                                     {
                                      $response=TRUE;
                                     }
                                     else
                                    {
                                     $response= show_error($this->email->print_debugger());
                                    }
                                    


                            }

                            else if($template_row->message_template_type=="WHATSAPP"){

                                    $message_template =  $template_row->message_template;
                                    $message_template_variables_details = json_decode($template_row->message_template_variables_details);
                                 
                                    $variable_start = preg_quote($vendor_row->message_variable_start_with, '/');
                                    $variable_end = preg_quote($vendor_row->message_variable_end_with, '/');

                                    // Regular expression to match variables
                                    $pattern = '/' . $variable_start . '(.*?)' . $variable_end . '/';

                                    // Find all matches
                                    preg_match_all($pattern, $message_template, $matches);

                                    // Check if each match is a valid variable
                                    $variables = [];

                                    foreach ($matches[1] as $match) {
                                       $variables[] =$variable_start.rawurldecode($match).$variable_end;
                                    }

                                    $number_of_variables = count($variables);
                                    $parameters=[];
                                    $already_column_taken=array();
                                    foreach ($variables as $index => $variable) {

                                        if(isset($message_template_variables_details[$index])) {

                                            $column_name = $message_template_variables_details[$index];

                                            $parts = explode('.', $column_name);
                                            $table_name = $parts[0];
                                            $column_name = $parts[1];

                                            $replacement_value= '-';

                                            if(isset($user_row->$column_name) && $table_name=="users") {
                                              
                                                if (isset($user_row->$column_name)){
                                                    $replacement_value = $user_row->$column_name;
                                                }
                                                $phone = $user_row->phone;
                                                $email = $user_row->email;
                                            }

                                            if (isset($branch_row->$column_name) && $table_name=="bank_branches") {
                                                 $replacement_value= '';
                                                 if (isset($branch_row->$column_name)){
                                                    $replacement_value = $branch_row->$column_name;
                                                 }
                                                
                                                $message_template = str_replace($variable, $replacement_value, $message_template);
                                            }
                                            
                                            if(isset($customer_row->$column_name) && $table_name=="mandate_customers") {
                                              
                                                if (isset($customer_row->$column_name)){
                                                    $replacement_value = $customer_row->$column_name;
                                                }
                                                $phone = $customer_row->customer_mobile_no;
                                                $email = $customer_row->customer_email;
                                            }

                                            if(isset($transaction_row->$column_name) && $table_name=="mandate_transaction_schedule") {

                                                if (isset($transaction_row->$column_name)){
                                                    $replacement_value = $transaction_row->$column_name;
                                                }
                                            
                                            }

                                            if(isset($loan_row->$column_name) && $table_name=="loan_types") {

                                                if (isset($loan_row->$column_name)){
                                                    $replacement_value = $loan_row->$column_name;
                                                }

                                            }

                                            if(!in_array($column_name,$already_column_taken)){
                                                  array_push($parameters, array(
                                                        "type" => "text",
                                                        "text" => $replacement_value
                                                    ));

                                            }
                                          
                                            array_push($already_column_taken,$column_name);
                                        }
                                    }

                                        // print_r($parameters);
                                        // die();
                                        // Define the phone number, API key, and other necessary variables
                                      
                                        $accessToken = urlencode($vendor_row->message_vendor_key);

                                        // Define the message template
                                        $template = array(
                                            "messaging_product" => "whatsapp",
                                            "recipient_type" => "individual",
                                            "to" => $phone,
                                            "type" => "template",
                                            "template" => array(
                                                "name" => $template_row->message_template_name,
                                                "language" => array(
                                                    "code" => $template_row->message_template_language
                                                ),
                                                "components" => array(
                                                        array(
                                                            "type" => "body",
                                                            "parameters" => $parameters
                                                        )
                                                )
                                            )
                                        );

                                        $templateJson = json_encode($template);

                                        // Initialize cURL
                                        $ch = curl_init($vendor_row->message_vendor_redirect_url);

                                        // Set the required cURL options
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                            'Authorization: Bearer ' . $accessToken,
                                            'Content-Type: application/json'
                                        ));
                                        curl_setopt($ch, CURLOPT_POST, true);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $templateJson);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                        // Execute the cURL request and get the response
                                        $response = curl_exec($ch);

                                        // Check for errors
                                        if(curl_errno($ch)){
                                            echo 'cURL error: ' . curl_error($ch);
                                        }

                                        // Close cURL session
                                        curl_close($ch);

                                     //  print_r($message_template);

                                     // Output the number of variables detected
                                     
                                
                            }
                        
                            $this->response([
                                "status" => TRUE,
                                "message" => "Update  Successful.",
                                "variables" => $message_template,
                                "number_of_variables" => $response
                            ], REST_Controller::HTTP_OK);
                    }

                    else {
                          $this->response([
                          'status' => FALSE,
                          "message" => "Vendor Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }



                    }



                }

                else{
                     $this->response([
                      'status' => FALSE,
                      "message" => "Message Template or Customer ID not found."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }      
        }


    public function send_message_template_post($value='')
        {
        
            $message_template_id = $this->security->xss_clean($this->post("message_template_id"));
            $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
             
            if(!empty($message_template_id) && !empty($mandate_customer_id))  {
                
                $conMessageTemplate['conditions'] = array(
                  'message_template_id' => $message_template_id,
                  'message_template_is_active' => 1,
                  'message_template_is_deleted' => 0
                ); 

                $conCustomer['conditions'] = array(
                    'mandate_customer_id' => $mandate_customer_id,
                    'is_active' => 1,
                    'is_deleted' => 0
                );

                $customer_row    = $this->Crud_model->getRows('mandate_customers', $conCustomer,'row');
                $template_row    = $this->Crud_model->getRows('message_templates',$conMessageTemplate,'row');
              
                if($customer_row && $template_row){
                    $currentMonth = date('m');
                    $conTransaction['conditions'] = array(
                        'mts_customer_id' => $mandate_customer_id,
                        'mts_is_active' => 1,
                        'mts_is_deleted' => 0,
                        'MONTH(mts_datetime)' =>date('m'),
                    );
                    $transaction_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conTransaction,'row');

                    $conLoanType['conditions'] = array(
                        'loan_type_id' => $customer_row->loan_type_id,
                        'loan_type_is_active' => 1,
                        'loan_type_is_deleted' => 0,
                    );

                    $loan_row = $this->Crud_model->getRows('loan_types',$conLoanType,'row');

                    $conMessageVendor['conditions'] = array(
                       'message_vendor_id' => $template_row->message_template_vendor_id,
                       'message_vendor_is_active' => 1,
                       'message_vendor_is_deleted' => 0
                    );
                                    
                    if($vendor_row = $this->Crud_model->getRows('message_vendors', $conMessageVendor, 'row')){
                      
                        $message_template =  $template_row->message_template;
                        $message_template_variables_details = json_decode($template_row->message_template_variables_details);
                     
                        $variable_start = preg_quote($vendor_row->message_variable_start_with, '/');
                        $variable_end = preg_quote($vendor_row->message_variable_end_with, '/');

                        // Regular expression to match variables
                        $pattern = '/' . $variable_start . '(.*?)' . $variable_end . '/';

                        // Find all matches
                        preg_match_all($pattern, $message_template, $matches);

                        // Check if each match is a valid variable
                        $variables = [];

                        foreach ($matches[1] as $match) {
                           $variables[] =$variable_start.rawurldecode($match).$variable_end;
                        }

                        $number_of_variables = count($variables);


                        foreach ($variables as $index => $variable) {

                            if (isset($message_template_variables_details[$index])) {
                                $column_name = $message_template_variables_details[$index];
                                $parts = explode('.', $column_name);
                                $table_name = $parts[0];
                                $column_name = $parts[1];

                                if (isset($customer_row->$column_name) && $table_name=="mandate_customers") {
                                     $replacement_value= '';
                                     if (isset($customer_row->$column_name)){
                                        $replacement_value = $customer_row->$column_name;
                                     }
                                    
                                    $message_template = str_replace($variable, $replacement_value, $message_template);
                                }

                                if (isset($transaction_row->$column_name) && $table_name=="mandate_transaction_schedule") {

                                     $replacement_value= '';
                                     if (isset($transaction_row->$column_name)){
                                        $replacement_value = $transaction_row->$column_name;
                                     }
                                
                                    $message_template = str_replace($variable, $replacement_value, $message_template);
                                }

                                if (isset($loan_row->$column_name) && $table_name=="loan_types") {

                                     $replacement_value= '';
                                     if (isset($loan_row->$column_name)){
                                        $replacement_value = $loan_row->$column_name;
                                     }
                                    $message_template = str_replace($variable, $replacement_value, $message_template);
                                }
                            }
                        }

                    //    9869793658
                        $phone = $customer_row->customer_mobile_no;
                    
                        $apiKey = urlencode($vendor_row->message_vendor_key);

                        $sender = urlencode($template_row->message_template_sender_head);

                        $message = rawurlencode($message_template);

                        // Prepare data for POST request
                        $data = array('unicode'=>1,'apikey' => $apiKey, 'numbers' => $phone, 
                                      "sender" => $sender, "message" => $message);

                        // print_r($data);
                        // die();
                        // Send the POST request with cURL
                     
                        $ch = curl_init($vendor_row->message_vendor_redirect_url);

                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);

                      //  print_r($message_template);

                        // Output the number of variables detected
                        $this->response([
                            "status" => TRUE,
                            "message" => "Update  Successful.",
                            "variables" => $message_template,
                            "number_of_variables" => $response
                        ], REST_Controller::HTTP_OK);
                    
                    }
                  
                    else{
                         $this->response([
                          'status' => FALSE,
                          "message" => "Vendor Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }


                }

                else{
                     $this->response([
                      'status' => FALSE,
                      "message" => "Message OR Customer Not Found.Please try again."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }


            }

            else{
                 $this->response([
                  'status' => FALSE,
                  "message" => "Message Template or Customer ID not found."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }      


        }


    public function send_email_template_post($value='')
        {
        
            $message_template_id = $this->security->xss_clean($this->post("message_template_id"));
            $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
             
            if(!empty($message_template_id) && !empty($mandate_customer_id))  {
                
                $conMessageTemplate['conditions'] = array(
                  'message_template_id' => $message_template_id,
                  'message_template_is_active' => 1,
                  'message_template_is_deleted' => 0
                ); 

          

                $customer_row    = $this->Crud_model->getRows('mandate_customers', $conCustomer,'row');
                $template_row    = $this->Crud_model->getRows('message_templates',$conMessageTemplate,'row');
                $settings_row    = $this->Crud_model->getRows('general_settings',array(),'result');
              
                if($customer_row && $template_row){
                    $currentMonth = date('m');
                    $conTransaction['conditions'] = array(
                        'mts_customer_id' => $mandate_customer_id,
                        'mts_is_active' => 1,
                        'mts_is_deleted' => 0,
                        'MONTH(mts_datetime)' =>date('m'),
                    );
                    $transaction_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conTransaction,'row');

                    $conLoanType['conditions'] = array(
                        'loan_type_id' => $customer_row->loan_type_id,
                        'loan_type_is_active' => 1,
                        'loan_type_is_deleted' => 0,
                    );

                    $loan_row = $this->Crud_model->getRows('loan_types',$conLoanType,'row');

                    $conMessageVendor['conditions'] = array(
                       'message_vendor_id' => $template_row->message_template_vendor_id,
                       'message_vendor_is_active' => 1,
                       'message_vendor_is_deleted' => 0
                    );
                                    
                    if($vendor_row = $this->Crud_model->getRows('message_vendors', $conMessageVendor, 'row')){
                      
                        $message_template =  $template_row->message_template;
                        $message_template_variables_details = json_decode($template_row->message_template_variables_details);
                     
                        $variable_start = $vendor_row->message_variable_start_with;
                        $variable_end = $vendor_row->message_variable_end_with;

                        // Regular expression to match variables
                        $pattern = '/' . $variable_start . '(.*?)' . $variable_end . '/';

                        // Find all matches
                        preg_match_all($pattern, $message_template, $matches);

                        // Check if each match is a valid variable
                        $variables = [];

                        foreach ($matches[1] as $match) {
                           $variables[] =$variable_start.rawurldecode($match).$variable_end;
                        }

                        $number_of_variables = count($variables);


                        foreach ($variables as $index => $variable) {

                            if (isset($message_template_variables_details[$index])) {
                                $column_name = $message_template_variables_details[$index];
                                $parts = explode('.', $column_name);
                                $table_name = $parts[0];
                                $column_name = $parts[1];

                                if (isset($customer_row->$column_name) && $table_name=="mandate_customers") {
                                     $replacement_value= '';
                                     if (isset($customer_row->$column_name)){
                                        $replacement_value = $customer_row->$column_name;
                                     }
                                    
                                    $message_template = str_replace($variable, $replacement_value, $message_template);
                                }

                                if (isset($transaction_row->$column_name) && $table_name=="mandate_transaction_schedule") {

                                     $replacement_value= '';
                                     if (isset($transaction_row->$column_name)){
                                        $replacement_value = $transaction_row->$column_name;
                                     }
                                
                                    $message_template = str_replace($variable, $replacement_value, $message_template);
                                }

                                if (isset($loan_row->$column_name) && $table_name=="loan_types") {

                                     $replacement_value= '';
                                     if (isset($loan_row->$column_name)){
                                        $replacement_value = $loan_row->$column_name;
                                     }
                                    $message_template = str_replace($variable, $replacement_value, $message_template);
                                }
                            }
                        }


                    //    9869793658
                        $email = $customer_row->customer_email;
                        $mail_status='';
                        $smtp_host='';
                        $smtp_port='';
                        $smtp_user='';
                        $smtp_pass='';
                        $organization_name='';

                        foreach ($settings_row as $key => $value) {
                                // code...

                            if($value->type=="smtp_port"){
                                $smtp_port  = $value->value;
                            }
                            if($value->type=="smtp_host"){
                                $smtp_host = $value->value;
                            }
                             if($value->type=="smtp_user"){
                                $smtp_user = $value->value;
                            }
                             if($value->type=="smtp_pass"){
                                $smtp_pass = $value->value;
                            }
                             if($value->type=="mail_status"){
                                $mail_status = $value->value;
                            }

                            if($value->type=="organization_name"){
                                $organization_name = $value->value;
                            }
                                // print_r($value->type);
                        }  

                         $config = array(
                            'protocol' =>  $mail_status,
                            'smtp_host' => $smtp_host,
                            'smtp_port' => $smtp_port,
                            'smtp_user' => $smtp_user, // your Gmail address
                            'smtp_pass' => $smtp_pass, // your App Password
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'wordwrap' => TRUE,
                            'newline' => "\r\n"
                        );


                        $this->email->initialize($config);
                        $this->email->from($smtp_user,$organization_name);
                        $this->email->to($email);
                        $this->email->subject($template_row->message_template_work_type);
                        $this->email->message($message_template);

                         if($this->email->send())
                         {
                          $response=TRUE;
                         }
                         else
                        {
                         $response= show_error($this->email->print_debugger());
                        }
                        
                    
                        $this->response([
                            "status" => TRUE,
                            "message" => "Update  Successful.",
                            "variables" => $message_template,
                            "number_of_variables" => $response
                        ], REST_Controller::HTTP_OK);
                    
                    }
                  
                    else{
                         $this->response([
                          'status' => FALSE,
                          "message" => "Vendor Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }


                }

                else{
                     $this->response([
                      'status' => FALSE,
                      "message" => "Message OR Customer Not Found.Please try again."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }


            }

            else{
                 $this->response([
                  'status' => FALSE,
                  "message" => "Message Template or Customer ID not found."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }      


        }


    public function send_whatsapp_message_template_post($value='')
        {
        
            $message_template_id = $this->security->xss_clean($this->post("message_template_id"));
            $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
             
            if(!empty($message_template_id) && !empty($mandate_customer_id))  {
                
                $conMessageTemplate['conditions'] = array(
                  'message_template_id' => $message_template_id,
                  'message_template_is_active' => 1,
                  'message_template_is_deleted' => 0
                ); 

                $conCustomer['conditions'] = array(
                    'mandate_customer_id' => $mandate_customer_id,
                    'is_active' => 1,
                    'is_deleted' => 0
                );


                
                
                $customer_row    = $this->Crud_model->getRows('mandate_customers', $conCustomer,'row');
                $template_row    = $this->Crud_model->getRows('message_templates',$conMessageTemplate,'row');
              
                if($customer_row && $template_row){
                    $currentMonth = date('m');
                    $conTransaction['conditions'] = array(
                        'mts_customer_id' => $mandate_customer_id,
                        'mts_is_active' => 1,
                        'mts_is_deleted' => 0,
                        'MONTH(mts_datetime)' =>date('m'),
                    );
                    $transaction_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conTransaction,'row');

                    $conLoanType['conditions'] = array(
                        'loan_type_id' => $customer_row->loan_type_id,
                        'loan_type_is_active' => 1,
                        'loan_type_is_deleted' => 0,
                    );

                    $loan_row = $this->Crud_model->getRows('loan_types',$conLoanType,'row');



                    $conMessageVendor['conditions'] = array(
                       'message_vendor_id' => $template_row->message_template_vendor_id,
                       'message_vendor_is_active' => 1,
                       'message_vendor_is_deleted' => 0
                    );
                                    
                    if($vendor_row = $this->Crud_model->getRows('message_vendors', $conMessageVendor, 'row')){
                      
                        $message_template =  $template_row->message_template;
                        $message_template_variables_details = json_decode($template_row->message_template_variables_details);
                     
                        $variable_start = preg_quote($vendor_row->message_variable_start_with, '/');
                        $variable_end = preg_quote($vendor_row->message_variable_end_with, '/');

                        // Regular expression to match variables
                        $pattern = '/' . $variable_start . '(.*?)' . $variable_end . '/';

                        // Find all matches
                        preg_match_all($pattern, $message_template, $matches);

                        // Check if each match is a valid variable
                        $variables = [];

                        foreach ($matches[1] as $match) {
                           $variables[] =$variable_start.rawurldecode($match).$variable_end;
                        }

                        $number_of_variables = count($variables);
                        $parameters=[];
                        $already_column_taken=array();
                        foreach ($variables as $index => $variable) {

                            if(isset($message_template_variables_details[$index])) {

                                $column_name = $message_template_variables_details[$index];

                                $parts = explode('.', $column_name);
                                $table_name = $parts[0];
                                $column_name = $parts[1];

                                $replacement_value= '-';
                                
                                if(isset($customer_row->$column_name) && $table_name=="mandate_customers") {
                                  
                                    if (isset($customer_row->$column_name)){
                                        $replacement_value = $customer_row->$column_name;
                                    }
                                    
                                }

                                if(isset($transaction_row->$column_name) && $table_name=="mandate_transaction_schedule") {

                                    if (isset($transaction_row->$column_name)){
                                        $replacement_value = $transaction_row->$column_name;
                                    }
                                
                                }

                                if(isset($loan_row->$column_name) && $table_name=="loan_types") {

                                    if (isset($loan_row->$column_name)){
                                        $replacement_value = $loan_row->$column_name;
                                    }

                                }

                                if(!in_array($column_name,$already_column_taken)){
                                      array_push($parameters, array(
                                            "type" => "text",
                                            "text" => $replacement_value
                                        ));

                                }
                              
                                array_push($already_column_taken,$column_name);
                            }
                        }

                            // print_r($parameters);
                            // die();
                            // Define the phone number, API key, and other necessary variables
                            $phone =  $customer_row->customer_mobile_no;
                            $accessToken = urlencode($vendor_row->message_vendor_key);

                            // Define the message template
                            $template = array(
                                "messaging_product" => "whatsapp",
                                "recipient_type" => "individual",
                                "to" => $phone,
                                "type" => "template",
                                "template" => array(
                                    "name" => $template_row->message_template_name,
                                    "language" => array(
                                        "code" => $template_row->message_template_language
                                    ),
                                    "components" => array(
                                            array(
                                                "type" => "body",
                                                "parameters" => $parameters
                                            )
                                    )
                                )
                            );

                            $templateJson = json_encode($template);

                            // Initialize cURL
                            $ch = curl_init($vendor_row->message_vendor_redirect_url);

                            // Set the required cURL options
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Authorization: Bearer ' . $accessToken,
                                'Content-Type: application/json'
                            ));
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $templateJson);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                            // Execute the cURL request and get the response
                            $response = curl_exec($ch);

                            // Check for errors
                            if(curl_errno($ch)){
                                echo 'cURL error: ' . curl_error($ch);
                            }

                            // Close cURL session
                            curl_close($ch);

                         //  print_r($message_template);

                         // Output the number of variables detected
                         
                            $this->response([
                                "status" => TRUE,
                                "message" => "Update  Successful.",
                                "variables" => $message_template,
                                "number_of_variables" => $response
                            ], REST_Controller::HTTP_OK);
                    
                    }
                  
                    else{
                         $this->response([
                          'status' => FALSE,
                          "message" => "Vendor Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }


                }

                else{
                     $this->response([
                      'status' => FALSE,
                      "message" => "Message OR Customer Not Found.Please try again."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }


            }

            else{
                 $this->response([
                  'status' => FALSE,
                  "message" => "Message Template or Customer ID not found."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }      


        }

public function saveMessageFrequencies_post()
{
    $messageTemplateSetting = $this->security->xss_clean($this->post("mesaageFrequenciesData"));
    $message_template_id = $this->security->xss_clean($this->post("message_template_id"));

    // Decode the message frequencies data
    $messageFrequencies = json_decode($messageTemplateSetting);
    
    // Check if message template ID and message frequencies data are provided
    if (!empty($message_template_id) && !empty($messageFrequencies)) {
        // Iterate through each frequency entry
        foreach ($messageFrequencies->frequencies as $frequency) {
            $messageCount = $frequency->messageCount;
            $timePickers = $frequency->timePickers;

            // If timePickers count does not match messageCount, adjust the messageCount
            if (count($timePickers) !== $messageCount) {
                $frequency->messageCount = count($timePickers); // Set messageCount to match timePickers count
                // log_message('info', 'Adjusted messageCount to ' . $frequency->messageCount . ' for dayBeforeDebitDate: ' . $frequency->dayBeforeDebitDate);
            }
        }

        // Encode the adjusted message frequencies data back to JSON
        $updatedMessageTemplateSetting = json_encode($messageFrequencies);

        // Prepare conditions to update message template
        $messageTemplateCon['conditions'] = array(
            'message_template_id' => $message_template_id,
            'message_template_is_active' => '1',
            'message_template_is_deleted' => '0',
        );

        $messageTemplateData = $this->Crud_model->getRows('message_templates', $messageTemplateCon, 'row');

        if (!empty($messageTemplateData)) {
            // Prepare data to update the template
            $mesaageFrequenciesData = array(
                'message_template_send_setting' => $updatedMessageTemplateSetting
            );

            // Update the message template
            if ($this->Crud_model->update('message_templates', $mesaageFrequenciesData, $messageTemplateCon)) {
                $this->response([
                    'status' => TRUE,
                    'message' => "Message Frequencies Data Has Been Updated Successfully."
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => "Failed To Update Message Frequencies Data."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => "Message Template data not found."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        $this->response([
            'status' => FALSE,
            'message' => "Message Template ID or Message Frequencies not found."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}


    
}



?>
