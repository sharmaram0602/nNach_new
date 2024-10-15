<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class MessageCron extends Admin_Controller {

    public function __construct()
        {
          
            parent::__construct();

             // if ($this->input->is_cli_request()) {
            // Your code to run for command line execution
                    // echo "Running from the command line!\n";
                      
                    //     $initiated_tranasactions_mandate_customer_ids=array();
                    
                    //     $option = array(
                    //       'select' => 'mandate_transaction_schedule.*, mandate_customers.*',
                    //       'table' =>'mandate_transaction_schedule',
                    //       'join' => array(array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id')),
                    //       'where' => array(
                    //             // 'YEAR(mandate_transaction_schedule.mts_datetime)'  => date('Y'),
                    //             // 'MONTH(mandate_transaction_schedule.mts_datetime)' => date('m'),
                    //             'DATE(mandate_transaction_schedule.mts_datetime) >= '    => date('Y-m-d'), 
                    //             'mandate_transaction_schedule.mts_is_skipped'      => 0,
                    //             'mandate_transaction_schedule.mts_is_active'       => 1,
                    //             'mandate_transaction_schedule.mts_is_deleted'      => 0,
                    //             'mandate_customers.is_active' => 1,
                    //             'mandate_customers.is_deleted' => 0,
                    //             'mandate_transaction_schedule.mts_is_already_scheduled' => 0,
                    //         ),
                    //        'custom_where' => 'DATEDIFF(mandate_transaction_schedule.mts_datetime, CURDATE()) = 2'
                    //   );

                    //                                 echo "cust";
                    //                                 echo "<pre>";
                    //         print_r($option);
                    //         exit();

                    //   if($user_group=$this->Crud_model->commonGet($option))
                    //       {


                    //         foreach ($user_group as $key => $value) {
                    //             $mts_datetime = date('dmY', strtotime($value->mts_datetime));

                    //             $mts_date_for_schedule = date('Y-m-d', strtotime($value->mts_datetime));
                    //             $current_date_for_schedule = date('Y-m-d');
                    //             $diff_schedule = strtotime($mts_date_for_schedule) - strtotime($current_date_for_schedule);
                    //             $diff_in_days = floor($diff_schedule / (60 * 60 * 24));

                    //              if ($diff_in_days == 2) {

                    //                         $currentDate = date('Y-m-d');
                                         
                    //                         $createdDatetime = date('Y-m-d', strtotime($value->created_datetime));
                                         
                    //                         $dateDifference_mandate_verification = date_diff(date_create($createdDatetime), date_create($currentDate))->days;


                    //                         if(empty($value->mandate_token) && $dateDifference_mandate_verification < 7){
                                            

                    //                             if($value->mandate_register_datetime){
                    //                                $mandate_datetime= date('d-m-Y', strtotime($value->mandate_register_datetime)); 
                    //                             }
                    //                             else{
                    //                                $mandate_datetime= date('d-m-Y', strtotime($value->created_datetime)); 

                    //                             }
                                                    
                    //                             $token=$this->verifyMandate(
                    //                                 $value->mandate_customer_id,
                    //                                 $value->merchant_ID,
                    //                                 $value->txn_ID,
                    //                                 $mandate_datetime,
                    //                                 $value->consumer_ID);

                    //                         }

                    //                         else{
                    //                             $token=$value->mandate_token;
                    //                         }


                    //                     if($token){
                                        
                    //                             $data = array(
                    //                                 "merchant" => array(
                    //                                     "identifier" => $value->merchant_ID
                    //                                 ),
                    //                                 "payment" => array(
                    //                                     "instrument" => array(
                    //                                         "identifier" => "test"
                    //                                     ),
                    //                                     "instruction" => array(
                    //                                         "amount" => $value->mts_amount,
                    //                                         "endDateTime" => $mts_datetime,
                    //                                         "identifier" =>$token,
                    //                                     )
                    //                                 ),  
                    //                                 "transaction" => array(
                    //                                     "deviceIdentifier" => "S",
                    //                                     "type" => "002",
                    //                                     "currency" => "INR",
                    //                                     "identifier" =>$value->mts_txn_id,
                    //                                     "subType" => "003",
                    //                                     "requestType" => "TSI"
                    //                                 )
                    //                             );
                                                   
                    //                            $jsonData = json_encode($data,JSON_PRETTY_PRINT);
                                    
                    //                            $api_url = 'https://www.paynimo.com/api/paynimoV2.req';
                                               
                    //                            $json_data = ($jsonData); // Convert the data back to JSON
                                              
                    //                            $ch = curl_init($api_url);
                    //                                // Set cURL options
                    //                             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    //                             curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                    //                             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    //                             curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    //                                 'Content-Type: application/json',
                    //                                 // 'Content-Length: ' . strlen($json_data)
                    //                             ));

                    //                                 // Execute cURL session
                    //                             $response = curl_exec($ch);

                    //                             // Check for cURL errors
                    //                             if (curl_errno($ch)) {
                                                    
                    //                                 curl_close($ch);
                    //                                 $this->saveTransactionLog($value->mts_id,'',$response,$response);
                                                   
                    //                             }

                    //                             else{
                                                 
                    //                                 curl_close($ch);
                                                  
                    //                                 $this->saveTransactionLog($value->mts_id,'',$response,$response);
                                                   

                    //                             }

                    //                         $resp_decode = json_decode($response, true);
                                            
                    //                         $mts_s_m = $resp_decode['paymentMethod']['paymentTransaction']['statusMessage'];
                                              
                    //                         if($mts_s_m=="I"){
                    //                             array_push($initiated_tranasactions_mandate_customer_ids,$value->mandate_customer_id);
                    //                         }

                                               
                    //                     }


                    //              }
                               
                               
                    //         }
                    //     }

                    //      echo 'Code Runned';
                    //     print_r($initiated_tranasactions_mandate_customer_ids);
                    //     exit();
                    //     if(!empty($initiated_tranasactions_mandate_customer_ids)){
                    //           $this->sendTransactionReminderMessages($initiated_tranasactions_mandate_customer_ids);
                    //     }
                        
                   
                // } 
                // else {
                //     // If not running from the command line, show an error message
                //     echo 'No direct script access allowed 12';
                // }

        }

            public function index($value='') {

                $message_template_work_type = array('PAYMENT_FAIL', 'PAYMENT_REMINDER');

                // Loop through each message template work type

                for ($i=0; $i < count($message_template_work_type) ; $i++) { 
                    // code...
                
                    $all_transaction_record = '';
                    if ($message_template_work_type[$i] == 'PAYMENT_REMINDER') {

                                    $all_transaction_record = $this->db->select('mts.mts_customer_id, mts.mts_datetime, DATEDIFF(mts.mts_datetime, NOW()) AS dateDifferenceCount')
                                        ->from('mandate_transaction_schedule mts')
                                        ->join('mandate_customers mc', 'mts.mts_customer_id = mc.mandate_customer_id', 'left')
                                        ->where('mts.mts_is_active', 1)
                                        ->where('mts.mts_is_deleted', 0)
                                        ->where('(mts.mts_status_message IS NULL OR mts.mts_status_message = "I")')
                                        ->where('mts.mts_is_skipped', 0)
                                        ->where('mc.is_active', 1)
                                        ->where('mc.is_deleted', 0)
                                        ->where('mc.mandate_status_message', 'success')
                                        ->having('dateDifferenceCount > 0 AND dateDifferenceCount < 30')  // Include dates greater than 0 and less than 30 days
                                        ->order_by('dateDifferenceCount', 'ASC')  // Order by closest to today
                                        ->get()
                                        ->result();

                                }else{
                                    // Fetch all active transactions
                                        $all_transaction_record = $this->db->select('mts.mts_customer_id, mts.mts_datetime, DATEDIFF(mts.mts_datetime, NOW()) AS dateDifferenceCount')
                                            ->from('mandate_transaction_schedule mts')
                                            ->join('mandate_customers mc', 'mts.mts_customer_id = mc.mandate_customer_id', 'left')
                                            ->where('mts.mts_is_active', 1)
                                            ->where('mts.mts_is_deleted', 0)
                                            ->where('mts.mts_status_message = "F"')
                                            ->where('mts.mts_is_already_scheduled', 1)
                                            ->where('mc.is_active', 1)
                                            ->where('mc.is_deleted', 0)
                                            ->where('mc.mandate_status_message', 'success')
                                            ->having('dateDifferenceCount > -30 AND dateDifferenceCount < 0')  

                                            ->order_by('dateDifferenceCount', 'ASC')  // Order by closest to today
                                            ->get()
                                            ->result();
                                }



                    // Call the method to send transaction reminder messages
                    $this->sendTransactionReminderMessages($message_template_work_type[$i], $all_transaction_record);
                }
            }


        public function sendTransactionReminderMessages($message_template_work_type, $all_transaction_record) {

            $message_templates = $this->getDefaultTemplateIDsByWorkType($message_template_work_type);



            // If the work type is 'PAYMENT_REMINDER', fetch relevant records again
           
              // Debug output for templates
            // echo "<pre>Templates for {$message_template_work_type}:\n";
            // print_r($message_templates);
            // echo "</pre>";


                // echo "<pre>Templates for {$message_template_work_type}:\n";
                // print_r($all_transaction_record);
                // echo "</pre>";


            $matched_records_by_time = []; // Array to store matched records separately for each timePicker
            $current_time = date('h:i A'); // Get the current time in 12-hour format

            foreach ($message_templates as $template) {
                // Decode the 'message_template_send_setting' to get the frequencies
                $settings = json_decode($template->message_template_send_setting);

                if (isset($settings->frequencies)) {
                    foreach ($settings->frequencies as $frequency) {
                        $dayBeforeDebitDate = (int)$frequency->dayBeforeDebitDate; // Get dayBeforeDebitDate

                        // Filter records based on dateDifferenceCount
                        $filtered_records = array_filter($all_transaction_record, function($record) use ($dayBeforeDebitDate) {
                            return abs($record->dateDifferenceCount) == $dayBeforeDebitDate;
                        });

                //          echo "<pre>Filtered Records for dayBeforeDebitDate={$dayBeforeDebitDate}:\n";
                // print_r($filtered_records);
                // echo "</pre>";

                        // Process filtered records for each frequency
                        foreach ($filtered_records as $record) {
                            foreach ($frequency->timePickers as $timePicker) {
                                // Initialize an array for this specific timePicker if it doesn't exist
                                if (!isset($matched_records_by_time[$timePicker])) {
                                    $matched_records_by_time[$timePicker] = [];
                                }

                                // Store the matched record in the array for the specific timePicker
                                $matched_records_by_time[$timePicker][] = [
                                    'mts_customer_id' => $record->mts_customer_id,
                                    'mts_datetime' => $record->mts_datetime,
                                    'message_template_id' => $template->message_template_id,
                                    'dayBeforeDebitDate' => $dayBeforeDebitDate,
                                    'timePicker' => $timePicker
                                ];
                            }
                        }
                    }
                }
            }

            // If necessary, process matched records for sending messages (currently commented out)
            if (!empty($matched_records_by_time)) {
                foreach ($matched_records_by_time as $timePicker => $records) {
                    // if ($current_time == $timePicker) {
                        foreach ($records as $record) {
                            $message_template_id = $record['message_template_id'];
                            $mandate_customer_id = $record['mts_customer_id'];
                            $resp = $this->send_all_messages($message_template_id, $mandate_customer_id, null);
                            print($resp);
                        }
                    // }
                }
            }
        }

        public function getDefaultTemplateIDsByWorkType($message_template_work_type)
        {
            
            if(!empty($message_template_work_type)){
            
                $condition = array(
                    'message_templates.message_template_is_active'  => 1,
                    'message_templates.message_template_is_deleted' => 0,
                    'message_templates.message_template_work_type'  => $message_template_work_type,
                    'message_templates.message_template_is_current' => "Y",
                );
                    
                $option = array(
                    'select'    => 'message_templates.message_template_id,message_templates.message_template_send_setting,message_templates.message_template_type',
                    'table'    => 'message_templates',
                    'where'    => $condition,
                    'group_by' => 'message_templates.message_template_type',
                );
                // echo "<pre>";
                // print_r($option);exit();

                if ($banks_row = $this->Crud_model->commonGet($option)) {
                    
                   return $banks_row;

                } 

                else {

                   return false;
                
                }

            }
    
            else{

                 return false;
          
            }
     
        }




    // public function getAllMandateTransactionSchedule($query)
    //     {
    //             echo "<pre>";
    //             print_r($query);
    //             // exit();

    //             $recordTransactionSchedule = $this->db->select('mts.mts_customer_id, mts.mts_datetime, DATEDIFF(mts.mts_datetime, NOW()) AS dateDifferenceCount')
    //                                         ->from('mandate_transaction_schedule mts')
    //                                         ->join('mandate_customers mc', 'mts.mts_customer_id = mc.mandate_customer_id', 'left')
    //                                         ->where('mts.mts_is_active', 1)
    //                                         ->where('mts.mts_is_deleted', 0)
    //                                         ->where('(mts.mts_status_message IS NULL OR mts.mts_status_message = "I")')
    //                                         ->where('mts.mts_is_skipped', 0)
    //                                         ->where('mc.is_active', 1)
    //                                         ->where('mc.is_deleted', 0)
    //                                         ->where('mc.mandate_status_message', 'success')
    //                                         ->having('dateDifferenceCount > 0')  // Only include future dates, for example
    //                                         ->order_by('dateDifferenceCount', 'ASC')  // Order by closest to today
    //                                         ->get()
    //                                         ->result();
                                         

    //             if (!empty($recordTransactionSchedule)) {
                    
    //                return $recordTransactionSchedule;

    //             } 

    //             else {

    //                return false;
                
    //             }

                 
    //     }





    public function send_all_messages($message_template_id='',$mandate_customer_id='',$user_id='')    
    {

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


                                    $currentMonth = date('d-m-y');
                                    // print_r($currentMonth);
                                    // exit();
                                    $conTransaction['conditions'] = array(
                                        'mts_customer_id' => $mandate_customer_id,
                                        'mts_is_active' => 1,
                                        'mts_is_deleted' => 0,
                                        // 'MONTH(mts_datetime)' =>date('m'),
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
                                // echo"<pre>";
                                // print_r($vendor_row);
                                // exit();
                                $apiKey = urlencode($vendor_row->message_vendor_key);

                                $sender = urlencode($template_row->message_template_sender_head);

                                $message = rawurlencode($message_template);

                                // Prepare data for POST request'7709189291'
                                $data = array('unicode'=>1,'apikey' => $apiKey, 'numbers' => $phone, 
                                              "sender" => $sender, "message" => $message);


                                // Send the POST request with cURL
                                // echo"<pre>";
                                // print_r($data);
                                // exit();
                             
                                $ch = curl_init($vendor_row->message_vendor_redirect_url);

                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($ch);
                                curl_close($ch);

                                 // Determine success or failure
                                $status = (strpos($response, 'success') !== false) ? 'success' : 'failure';

                                // Store log
                                $log_data = array(
                                    'message_template_id' => $message_template_id,
                                    'mts_customer_id' => $mandate_customer_id,
                                    'user_id' => $user_id,
                                    'phone' => $phone,
                                    'message' => $message_template,
                                    'status' => $status,
                                    'response' => $response
                                );
                                $this->Crud_model->insert('message_logs', $log_data); // Assuming you have an insert method
                            
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
                                      // Determine success or failure
                                        $status = (strpos($response, 'success') !== false) ? 'success' : 'failure';

                                        // Store log
                                        $log_data = array(
                                            'message_template_id' => $message_template_id,
                                            'mts_customer_id' => $mandate_customer_id,
                                            'user_id' => $user_id,
                                            'phone' => $phone,
                                            'message' => $message_template,
                                            'status' => $status,
                                            'response' => $response
                                        );
                                        $this->Crud_model->insert('message_logs', $log_data); // Assuming you have an insert method
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

                                        print_r($response);
                                        // exit();

                                        // Determine success or failure
                                        $status = (strpos($response, 'success') !== false) ? 'success' : 'failure';

                                        // Store log
                                        $log_data = array(
                                            'message_template_id' => $message_template_id,
                                            'mts_customer_id' => $mandate_customer_id,
                                            'user_id' => $user_id,
                                            'phone' => $phone,
                                            'message' => $message_template,
                                            'status' => $status,
                                            'response' => $response
                                        );
                                        $this->Crud_model->insert('message_logs', $log_data); // Assuming you have an insert method

                                        // Check for errors
                                        if(curl_errno($ch)){
                                            echo 'cURL error: ' . curl_error($ch);
                                        }

                                        // Close cURL session
                                        curl_close($ch);

                                     //  print_r($message_template);

                                     // Output the number of variables detected
                                     
                                
                            }
                        
                           return $response;
                    }

                    else {
                          return false;
                    }



                    }



                }

                else{

                    return false;
                
                }      
    }

    public function saveTransactionLog($mts_id='',$success_repsonse='',$error_response='',$all_response)
        {
            
            $conEmail['conditions'] = array(
               'mts_id' => $mts_id,
               'mts_is_active' => 1,
               'mts_is_deleted'=> 0,
            );

            $decoded_response = json_decode($all_response, true);

            if (isset($decoded_response['paymentMethod'])) {
                    $mts_status_message = $decoded_response['paymentMethod']['paymentTransaction']['statusMessage'];
                    $mts_status_code = $decoded_response['paymentMethod']['paymentTransaction']['statusCode'];
                    $mts_payment_transaction_id = $decoded_response['paymentMethod']['paymentTransaction']['identifier'];
                    $mts_scheduled_datetime = $decoded_response['paymentMethod']['paymentTransaction']['dateTime'];
            }
            else{
                $mts_status_message = null;
                $mts_status_code = null;
                $mts_payment_transaction_id = null;
                $mts_scheduled_datetime = null;
            }



            $message=$mts_status_message;

            if($mts_status_message=="I"){
               $message = $decoded_response['paymentMethod']['error']['desc'].". But Transaction Status Pending.";
            }
            else if($mts_status_message=="A"){
               $message = $decoded_response['paymentMethod']['error']['desc'];
            }
            else if($mts_status_message=="F"){
               $message = $decoded_response['paymentMethod']['error']['desc'];
            }
            else if($mts_status_message=="S"){
                 $message="Transaction Successful."; 
            }
            else{
                $message=$mts_status_message;
            }
               

            $data = array(
               
                 'mts_success_log' => trim($success_repsonse),
                 'mts_error_log' =>  trim($error_response),
                 'mts_all_log' =>trim($all_response),
                 'mts_status_message' => $mts_status_message,
                 'mts_status_code' => $mts_status_code,
                 'mts_payment_transaction_id' => $mts_payment_transaction_id,
                 'mts_scheduled_datetime' => $mts_scheduled_datetime,
                 'mts_is_already_scheduled' => 1,
                 'mts_message'  => $message,
            );

             
            if($u_row=$this->Crud_model->update('mandate_transaction_schedule',$data,$conEmail)){
               return true;
            }
            else{
               return false;
            }
        }

    public function verifyMandate($mandate_customer_id,$merchant_ID,$txn_ID,$mandate_register_datetime,$consumer_ID)
        {

            $data = array(
                "merchant" => array(
                    "identifier" => $merchant_ID
                ),
                "payment" => array(
                    "instruction" => (object)array(
                    )
                ),
                "transaction" => array(
                    "deviceIdentifier" => "S",
                    "type" => "002",
                    "currency" => "INR",
                    "identifier" =>$txn_ID,
                    "dateTime"=>$mandate_register_datetime,
                    "subType" => "002",
                    "requestType" => "TSI"
                ),
                "consumer" => array(
                   "identifier" =>$consumer_ID,
                )
            );
            
           $jsonData = json_encode($data,JSON_PRETTY_PRINT);
             
           $api_url = 'https://www.paynimo.com/api/paynimoV2.req';
           
           $json_data = ($jsonData); // Convert the data back to JSON
          
           $ch = curl_init($api_url);
          // Set cURL options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                // 'Content-Length: ' . strlen($json_data)
            ));

            // Execute cURL session
            $response = curl_exec($ch);

            // Check for cURL errors
            if (curl_errno($ch)) {
                
                curl_close($ch);

                return false;
            
            }

            else{

                curl_close($ch);
                $decoded_response = json_decode($response, true);
                
                if (isset($decoded_response['paymentMethod']['token'])) {
                        $token = $decoded_response['paymentMethod']['token'];
                 } 
                 else{
                       $token = NULL;

                 }

               // update token if previously not set by mandate registration time

                if($this->setMandateToken($mandate_customer_id,$token,$response)){
                   
                   return $decoded_response['paymentMethod']['token'];

                }
               
                else{

                    return false;
                }
                     
                   
            
            }
        }


    public function setMandateToken($mandate_customer_id='',$token='',$response='')
        {

           if(!empty($mandate_customer_id) && !empty($token)){

               $conGroup['conditions'] = array(
                  'mandate_customer_id' => $mandate_customer_id,
                  'is_active' => 1,
                  'is_deleted' => 0
                ); 

                if($groups_row=$this->Crud_model->getRows('mandate_customers',$conGroup,'row')){

                     $data = array(
                      'mandate_token' => $token,
                      'all_log'=>trim($response),
                      'error_log'=>trim($response),
                      'success_log'=>trim($response),
                     );
                    
                     
                     if($branches_row=$this->Crud_model->update('mandate_customers',$data,$conGroup)){
                                          // Set the response and exit
                           return true;
                    
                      }

                      else{

                       return false;
                      
                      }

                }
                else{
                   return false;

                }

           }
           else{
             return false;
           }
          
        }

}
