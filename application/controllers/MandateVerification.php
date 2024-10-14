<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class MandateVerification extends Admin_Controller {

    public function __construct()
        {
          
            parent::__construct();

            // Your code to run for command line execution
            echo "Running from the command line!\n";

              $option = array(
                  'select' => 'mandate_customers.*',
                  'table' =>'mandate_customers',
                  'where' => array(
                        'mandate_customers.is_active'   => 1,
                        'mandate_customers.is_deleted'  => 0,
                        'mandate_customers.all_log !='  => NULL,
                   )
              );

                    if($user_group=$this->Crud_model->commonGet($option))
                          {
                            foreach ($user_group as $key => $value) {
                              
                                $currentDate = date('Y-m-d');
                             
                                $createdDatetime = date('Y-m-d', strtotime($value->created_datetime));
                             
                                $dateDifference_mandate_verification = date_diff(date_create($createdDatetime), date_create($currentDate))->days;

                                if (empty($value->mandate_token) && $dateDifference_mandate_verification < 7) {

                                    $mandate_datetime = date('d-m-Y', strtotime($value->created_datetime));

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
                                            "identifier" =>$value->txn_ID,
                                            "dateTime"=>$mandate_datetime,
                                            "subType" => "002",
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

                                    $decoded_response = json_decode($response, true);

                                    if (isset($decoded_response['paymentMethod']['token'])) {

                                         $token= $decoded_response['paymentMethod']['token'];
                                   
                                    } 

                                    else{
                                         $token  = NULL;
                                    }


                                       // update token if previously not set by mandate registration time

                                    $conGroup['conditions'] = array(
                                      'mandate_customer_id' => $value->mandate_customer_id,
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
                                         
                                        $branches_row=$this->Crud_model->update('mandate_customers',$data,$conGroup);
                                         
                                    }
                                    
                               }

                            }
                        
                        }

            echo 'Code Runned';
      }

      public function index($value='')
     {
             echo "Hi";
     }   

}
