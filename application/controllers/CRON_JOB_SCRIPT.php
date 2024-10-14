<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRON_JOB_SCRIPT extends Admin_Controller {

    public function __construct()
        {
          
            parent::__construct();

            $option = array(
              'select' => 'mandate_transaction_schedule.*, mandate_customers.*',
              'table' =>'mandate_transaction_schedule',
              'join' => array(array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id')),
              'where' => array(
                    'YEAR(mandate_transaction_schedule.mts_datetime)'  => date('Y'),
                    'MONTH(mandate_transaction_schedule.mts_datetime)' => date('m'),
                    'mandate_transaction_schedule.mts_datetime >= '    => date('Y-m-d'), 
                    'mandate_transaction_schedule.mts_is_skipped'      => 0,
                    'mandate_transaction_schedule.mts_is_active'       => 1,
                    'mandate_transaction_schedule.mts_is_deleted'      => 0,
                    'mandate_customers.is_active' => 1,
                    'mandate_customers.is_deleted' => 0,
                    'mandate_transaction_schedule.mts_is_already_scheduled' => 0,
                )
            );

          if($user_group=$this->Crud_model->commonGet($option))
              {

                foreach ($user_group as $key => $value) {
                    $mts_datetime = date('dmY', strtotime($value->mts_datetime));
                  
                    if(empty($value->mandate_token)){
                       
                        $mandate_register_datetime= date('d-m-Y', strtotime($value->mandate_register_datetime));
                            
                        $token=$this->verifyMandate(
                            $value->mandate_customer_id,
                            $value->merchant_ID,
                            $value->txn_ID,
                            $mandate_register_datetime,
                            $value->consumer_ID);
                          
                    }
                    else{
                        $token=$value->mandate_token;
                    }

                    if($token){
                            $data = array(
                                "merchant" => array(
                                    "identifier" => $value->merchant_ID
                                ),
                                "payment" => array(
                                    "instrument" => array(
                                        "identifier" => "test"
                                    ),
                                    "instruction" => array(
                                        "amount" => $value->mts_amount,
                                        "endDateTime" => $mts_datetime,
                                        "identifier" =>$token,
                                    )
                                ),  
                                "transaction" => array(
                                    "deviceIdentifier" => "S",
                                    "type" => "002",
                                    "currency" => "INR",
                                    "identifier" =>$value->mts_txn_id,
                                    "subType" => "003",
                                    "requestType" => "TSI"
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
                                $this->saveTransactionLog($value->mts_id,'',$response,$response);
                               
                            }

                            else{
                             
                               curl_close($ch);
                              
                               $this->saveTransactionLog($value->mts_id,'',$response,$response);

                            }
                    }
                   
                }
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

            $data = array(
               
                 'mts_success_log' => trim($success_repsonse),
                 'mts_error_log' =>  trim($error_response),
                 'mts_all_log' =>trim($all_response),
                 'mts_status_message' => $mts_status_message,
                 'mts_status_code' => $mts_status_code,
                 'mts_payment_transaction_id' => $mts_payment_transaction_id,
                 'mts_scheduled_datetime' => $mts_scheduled_datetime,
                 'mts_is_already_scheduled' => 1,
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
                
                if (isset($decoded_response['paymentMethod']['paymentTransaction']['statusMessage'])) {

                        $statusMessage = $decoded_response['paymentMethod']['paymentTransaction']['statusMessage'];

                       // update token if previously not set by mandate registration time

                        if($this->setMandateToken($mandate_customer_id,$decoded_response['paymentMethod']['token'])){
                           
                           return $decoded_response['paymentMethod']['token'];

                        }
                       
                        else{
                            return false;
                        }
                     
                    } 
                    else {
                       
                       return false;
                    }
            
            }
        }


    public function setMandateToken($mandate_customer_id='',$token='')
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
