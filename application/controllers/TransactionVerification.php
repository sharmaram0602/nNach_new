<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionVerification extends Admin_Controller {

    public function __construct()
        {
          
            parent::__construct();

            // Your code to run for command line execution
                    echo "Running from the command line!\n";

                        $option = array(
                          'select' => 'mandate_transaction_schedule.*, mandate_customers.*',
                          'table' =>'mandate_transaction_schedule',
                          'join' => array(array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id')),
                          'where' => array(
                                'YEAR(mandate_transaction_schedule.mts_datetime)'  => date('Y'),
                                'MONTH(mandate_transaction_schedule.mts_datetime)' => date('m'),
                                'mandate_transaction_schedule.mts_datetime <= '    => date('Y-m-d'), 
                                'mandate_transaction_schedule.mts_is_skipped'      => 0,
                                'mandate_transaction_schedule.mts_is_active'       => 1,
                                'mandate_transaction_schedule.mts_is_deleted'      => 0,
                                'mandate_customers.is_active'                      => 1,
                                'mandate_customers.is_deleted'                     => 0,
                                'mandate_transaction_schedule.mts_is_already_scheduled' => 1,
                                'mandate_transaction_schedule.mts_status_message !=' => NULL,
                            )
                        );

                      if($user_group=$this->Crud_model->commonGet($option))
                          {

                            foreach ($user_group as $key => $value) {

                                $mts_date_for_schedule = date('Y-m-d', strtotime($value->mts_datetime));
                                $current_date_for_schedule = date('Y-m-d');
                                $diff_schedule = strtotime($current_date_for_schedule) - strtotime($mts_date_for_schedule);
                                $diff_in_days = floor($diff_schedule / (60 * 60 * 24));

                                if ($diff_in_days == 1 && $value->mts_status_message!="S") {

                                    $mts_datetime_verify = date('d-m-Y', strtotime($value->mts_datetime));

                                    $data =     array(
                                        "merchant" => array(
                                            "identifier" => $value->merchant_ID
                                        ),
                                        "payment" => array(
                                            "instruction" => (object)array(
                                            )
                                        ),
                                        "transaction" => array(
                                            "deviceIdentifier" => "S",
                                            "type" => "002",
                                            "currency" => "INR",
                                            "identifier" =>$value->mts_txn_id,
                                            "dateTime"=>$mts_datetime_verify,
                                            "subType" => "004",
                                            "requestType" => "TSI"
                                        ),
                                          "consumer" => array(
                                            "identifier"=> $value->consumer_ID
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
                                   
                                   curl_close($ch);
                                  
                                  $this->saveTransactionVerificationLog($value->mts_id,$response);

                               }

                            }
                        
                        }

            echo 'Code Runned';
       }

      public function index($value='')
     {
             echo "Hi";
     }   

    public function saveTransactionVerificationLog($mts_id='',$all_response)
        {
            
            $conEmail['conditions'] = array(
               'mts_id' => $mts_id,
               'mts_is_active' => 1,
               'mts_is_deleted'=> 0,
            );

            $decoded_response = json_decode($all_response, true);

            if (isset($decoded_response['paymentMethod'])) {
                $statusCode = $decoded_response['paymentMethod']['paymentTransaction']['statusCode'];

                $statusMessage = $decoded_response['paymentMethod']['paymentTransaction']['statusMessage'];

                $mts_payment_transaction_id = $decoded_response['paymentMethod']['paymentTransaction']['identifier'];

                $mts_scheduled_datetime = $decoded_response['paymentMethod']['paymentTransaction']['dateTime'];

                $message=$statusMessage;

                if($statusMessage=="I"){
                    $message = $decoded_response['paymentMethod']['error']['desc'].". But Transaction Status Pending.";
                }
                else if($statusMessage=="A"){
                   $message = $decoded_response['paymentMethod']['error']['desc'];
                }
                else if($statusMessage=="F"){
                   $message = $decoded_response['paymentMethod']['error']['desc'];
                }
                else if($statusMessage=="S"){
                     $message="Transaction Successful."; 
                }
                else{
                    $message=$statusMessage;
                }
               
                $conGroup['conditions'] = array(
                    'mts_id' => $mts_id,
                ); 
                        
                $data = array(
                  'mts_status_code' => $statusCode,
                  'mts_status_message'  => $statusMessage,
                  'mts_payment_transaction_id' => $mts_payment_transaction_id,
                  'mts_scheduled_datetime' => $mts_scheduled_datetime,
                  'mts_success_log'  => trim($all_response),
                  'mts_error_log'  => trim($all_response),
                  'mts_all_log'  => trim($all_response),
                  'mts_message'  => $message,
                );
                 

                if($branches_row=$this->Crud_model->update('mandate_transaction_schedule',$data,$conGroup)){
                   return true;
                }
                else{
                   return false;
                }   
                       
            }
           

         
          
        }



}
