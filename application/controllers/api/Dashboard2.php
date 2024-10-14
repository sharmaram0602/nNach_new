<?php
require APPPATH.'libraries/REST_Controller.php';


class Dashboard2 extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='mandate_customers';

    }

    public function showSkippedTransactionCount_get(){

         $condition = array(
            'mandate_transaction_schedule.mts_is_active'=>1,
            'mandate_transaction_schedule.mts_is_deleted'=>0,
            'mandate_transaction_schedule.mts_is_skipped'=>1,
            'mandate_customers.is_active'=>1,
            'mandate_customers.is_deleted'=>0,
        );


        $optionCountFigures = array(
           'select' => 'count(mandate_transaction_schedule.mts_id) as total_skipped_transactions,sum(mts_amount) as total_skipped_amount,COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_skipped_mandates',
           'table' =>'mandate_transaction_schedule',
           'left_join' => array(
                    array('mandate_customers' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id')),
           'where' => $condition,
           'single'=> TRUE
        );    

        if($skipped_count_row=$this->Crud_model->commonGet($optionCountFigures)){
            $this->response([
              "status" => TRUE,
              "message" => "Count Loaded Successfully.",
              "data"=>$skipped_count_row,
            ], REST_Controller::HTTP_OK);  
        }
        else{
              $this->response([
                   "data"=>NULL,
                  'status' => FALSE,
                   "message" => "No Transactions Found.",
                   
                 ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function showCountMandateTransaction_get($value='')
        {
           $filterMandateTransactionsAmountCount = $this->security->xss_clean($this->get("filterMandateTransactionsAmountCount"));
           $toDate = $this->security->xss_clean($this->get("toDate"));
           $fromDate = $this->security->xss_clean($this->get("fromDate"));

           if(!empty($toDate) && !empty($fromDate)){
           
            $toDateObj = DateTime::createFromFormat('d/m/y', $toDate);
            $toDate = $toDateObj->format('Y-m-d');

            // Convert fromDate to Y-m-d format
            $fromDateObj = DateTime::createFromFormat('d/m/y', $fromDate);
            $fromDate = $fromDateObj->format('Y-m-d');

       
           }

           if(!empty($filterMandateTransactionsAmountCount)){

               if($filterMandateTransactionsAmountCount=="yesterday"){
                    $yesterday_date = date('Y-m-d', strtotime('-1 day'));
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $yesterday_date // Filter by today's date
                    );
        
            }

           else if($filterMandateTransactionsAmountCount=="today"){
                    $date = date('Y-m-d');
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $date // Filter by today's date
                    );
        
            }

           else if($filterMandateTransactionsAmountCount=="week"){

                // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_week // Filter by this week

                    );
        
            }

             else if($filterMandateTransactionsAmountCount=="lastweek"){

                // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $start_of_last_week = date('Y-m-d', strtotime("-7 days", strtotime($start_of_week)));
                    $end_of_last_week = date('Y-m-d', strtotime("-1 day", strtotime($start_of_week)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_week // Filter by this week

                    );
        
            }


            else if($filterMandateTransactionsAmountCount=="month"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_month // Filter by this week

                    );
        
            }


            else if($filterMandateTransactionsAmountCount=="lastmonth"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));


                    // Calculate the start date of the last month
                    $start_of_last_month = date('Y-m-01', strtotime('-1 month', strtotime($current_date)));
                    // Calculate the end date of the last month
                    $end_of_last_month = date('Y-m-t', strtotime('-1 month', strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_month // Filter by this week

                    );
        
            }

              else if($filterMandateTransactionsAmountCount=="year"){

                    $current_year = date('Y');

                    // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_year, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_year // Filter by this week
                     );
        
            }

             else if($filterMandateTransactionsAmountCount=="lastyear"){

                    $current_year = date('Y');

                    // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    $start_of_last_year = ($current_year - 1) . '-01-01';
                    // Calculate the end date of the last year
                    $end_of_last_year = ($current_year - 1) . '-12-31';

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_year, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_year // Filter by this week
                     );
        
            }

            else if($filterMandateTransactionsAmountCount=="all"){
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                    );
        
            }

             else if($filterMandateTransactionsAmountCount=="customdate"){
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $fromDate, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $toDate // Filter by this week
                    );
        

            }

             $option = array(
                'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                             COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                             SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                             mandate_transaction_schedule.mts_status_message AS transaction_status',
                'table' =>'mandate_customers',
                'left_join' => array(
                    array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                     array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                     array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'group_by' => 'mandate_transaction_schedule.mts_status_message',
                'where' => $condition,
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

             );


             if($users_row=$this->Crud_model->commonGet($option)){
                    $this->response([
                      "status" => TRUE,
                      "message" => "Count Loaded Successfully.",
                      "data"=>$users_row,
                    ], REST_Controller::HTTP_OK);  
                }
                else{
                      $this->response([
                           "data"=>NULL,
                          'status' => FALSE,
                           "message" => "No Transactions Found.",
                           
                         ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

     

           }
           else{
                 $this->response([
                           "data"=>NULL,
                          'status' => FALSE,
                           "message" => "Please select filter range.",
                           
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

        }
/////////////////////////////////////////////////////////////////


    public function showCountMandate_get($value='')
        {
           $filterMandateCount = $this->security->xss_clean($this->get("filterMandateCount"));
           $toDate = $this->security->xss_clean($this->get("toDate"));
           $fromDate = $this->security->xss_clean($this->get("fromDate"));

           if(!empty($toDate) && !empty($fromDate)){
           
            $toDateObj = DateTime::createFromFormat('d/m/y', $toDate);
            $toDate = $toDateObj->format('Y-m-d');

            // Convert fromDate to Y-m-d format
            $fromDateObj = DateTime::createFromFormat('d/m/y', $fromDate);
            $fromDate = $fromDateObj->format('Y-m-d');

       
           }

           if(!empty($filterMandateCount)){

               if($filterMandateCount=="yesterday"){
                    $yesterday_date = date('Y-m-d', strtotime('-1 day'));

                    
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime)' => $yesterday_date // Filter by today's date
                    );
        
            }

           else if($filterMandateCount=="today"){
                    $date = date('Y-m-d');
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime)' => $date // Filter by today's date
                    );
        
            }

           else if($filterMandateCount=="week"){

                // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_week // Filter by this week

                    );
        
            }

            else if($filterMandateCount=="lastweek"){

                // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $start_of_last_week = date('Y-m-d', strtotime("-7 days", strtotime($start_of_week)));
                    $end_of_last_week = date('Y-m-d', strtotime("-1 day", strtotime($start_of_week)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_last_week, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_last_week // Filter by this week

                    );
        
            }

            else if($filterMandateCount=="month"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_month // Filter by this week

                    );
        
            }

            else if($filterMandateCount=="lastmonth"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $start_of_last_month = date('Y-m-01', strtotime('-1 month', strtotime($current_date)));
                    // Calculate the end date of the last month
                    $end_of_last_month = date('Y-m-t', strtotime('-1 month', strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_last_month, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_last_month // Filter by this week

                    );
        
            }

              else if($filterMandateCount=="year"){

                    $current_year = date('Y');

                    // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_year, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_year // Filter by this week
                     );
        
            }

             else if($filterMandateCount=="lastyear"){

                    $current_year = date('Y');

                    // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    $start_of_last_year = ($current_year - 1) . '-01-01';
                    // Calculate the end date of the last year
                    $end_of_last_year = ($current_year - 1) . '-12-31';

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_last_year, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_last_year // Filter by this week
                     );
        
            }

            else if($filterMandateCount=="all"){
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                    );
        
            }

             else if($filterMandateCount=="customdate"){
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message !=' => NULL,
                       'DATE(mandate_customers.created_datetime) >= ' => $fromDate, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $toDate // Filter by this week
                    );
            
            }

             $option = array(
                'select' => 'COUNT(mandate_customers.mandate_customer_id) AS total_mandates,mandate_status_message',
                'table' =>'mandate_customers',
                'group_by' => 'mandate_customers.mandate_status_message',
                'where' => $condition,
                'left_join' => array(
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );


             if($users_row=$this->Crud_model->commonGet($option)){
                    $this->response([
                      "status" => TRUE,
                      "message" => "Count Loaded Successfully.",
                      "data"=>$users_row,
                    ], REST_Controller::HTTP_OK);  
                }
                else{
                      $this->response([
                           "data"=>NULL,
                          'status' => FALSE,
                           "message" => "No Transactions Found.",
                           
                         ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

     

           }
           else{
                 $this->response([
                           "data"=>NULL,
                          'status' => FALSE,
                           "message" => "Please select filter range.",
                           
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

        }

        //////////////////////////////////////////////



        /////////////////////////////////////////////////////////////////


    public function showMandateCompare_get($value='')
        {
           $mandateCountCompareFilter = $this->security->xss_clean($this->get("mandateCountCompareFilter"));
         

           if(!empty($mandateCountCompareFilter)){

               if($mandateCountCompareFilter=="yesterdayVsToday"){

                    $condition_1 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime)' => date('Y-m-d', strtotime('-1 day')) // Filter by today's date
                    );

                     $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime)' => date('Y-m-d')// Filter by today's date
                    );
        
            }


           else if($mandateCountCompareFilter=="lastVsThisWeek"){

                    // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $start_of_last_week = date('Y-m-d', strtotime("-7 days", strtotime($start_of_week)));
                    $end_of_last_week = date('Y-m-d', strtotime("-1 day", strtotime($start_of_week)));

                 
                     $condition_1 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_last_week, // Filter by last week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_last_week // Filter by last week

                    );

                    $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_week // Filter by this week

                    );

            }

            else if($mandateCountCompareFilter=="lastVsThisMonth"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));


                    // Calculate the start date of the last month
                    $start_of_last_month = date('Y-m-01', strtotime('-1 month', strtotime($current_date)));
                    // Calculate the end date of the last month
                    $end_of_last_month = date('Y-m-t', strtotime('-1 month', strtotime($current_date)));



                    $condition_1 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_last_month, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_last_month // Filter by this week

                    );

                    $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_month // Filter by this week

                    );
        
            }

              else if($mandateCountCompareFilter=="lastVsThisYear"){

                    $current_year = date('Y');

                    // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    // Calculate the start date of the last year
                    $start_of_last_year = ($current_year - 1) . '-01-01';
                    // Calculate the end date of the last year
                    $end_of_last_year = ($current_year - 1) . '-12-31';


                    $condition_1 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_last_year, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_last_year // Filter by this week
                     );
        
                    $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'DATE(mandate_customers.created_datetime) >= ' => $start_of_year, // Filter by this week
                       'DATE(mandate_customers.created_datetime) <= ' => $end_of_year // Filter by this week
                     );
        
            }


             $option_1 = array(
                'select' => 'COUNT(mandate_customers.mandate_customer_id) AS total_mandates,mandate_status_message',
                'table' =>'mandate_customers',
                'group_by' => 'mandate_customers.mandate_status_message',
                'where' => $condition_1,
                'left_join' => array(
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );

                $option_2 = array(
                'select' => 'COUNT(mandate_customers.mandate_customer_id) AS total_mandates,mandate_status_message',
                'table' =>'mandate_customers',
                'group_by' => 'mandate_customers.mandate_status_message',
                'where' => $condition_2,
                'left_join' => array(
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );

            $compare_1=NULL;   
            $compare_2=NULL;   
            
            if($this->Crud_model->commonGet($option_1)){
                  $compare_1=$this->Crud_model->commonGet($option_1);
            }  
            
            if($this->Crud_model->commonGet($option_2)){
                 $compare_2=$this->Crud_model->commonGet($option_2);
            } 
          

             if($compare_1 || $compare_2){
                    $this->response([
                      "status" => TRUE,
                      "message" => "Count Loaded Successfully.",
                      "compare_1"=>$compare_1,
                      "compare_2"=>$compare_2,
                    ], REST_Controller::HTTP_OK);  
                }
                else{
                      $this->response([
                          "compare_1"=>NULL,
                          "compare_2"=>NULL,
                          'status' => FALSE,
                          "message" => "No Transactions Found.",
                      ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

     

           }
           else{
                 $this->response([
                           "data"=>NULL,
                          'status' => FALSE,
                           "message" => "Please select filter range.",
                           
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

        }


        //////////////////////////////////////////////




        /////////////////////////////////////////////////////////////////


    public function showTransactionCompare_get($value='')
        {
           $transactionCountCompareFilter = $this->security->xss_clean($this->get("transactionCountCompareFilter"));
         

           if(!empty($transactionCountCompareFilter)){

               if($transactionCountCompareFilter=="yesterdayVsToday"){

                    $condition_1 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => date('Y-m-d', strtotime('-1 day')) // Filter by today's date
                    );

                     $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)'=> date('Y-m-d')// Filter by today's date
                    );
        
            }


           else if($transactionCountCompareFilter=="lastVsThisWeek"){

                    // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $start_of_last_week = date('Y-m-d', strtotime("-7 days", strtotime($start_of_week)));
                    $end_of_last_week = date('Y-m-d', strtotime("-1 day", strtotime($start_of_week)));

                 
                     $condition_1 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_week, // Filter by last week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_week // Filter by last week

                    );

                    $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_week // Filter by this week

                    );

            }

            else if($transactionCountCompareFilter=="lastVsThisMonth"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));


                    // Calculate the start date of the last month
                    $start_of_last_month = date('Y-m-01', strtotime('-1 month', strtotime($current_date)));
                    // Calculate the end date of the last month
                    $end_of_last_month = date('Y-m-t', strtotime('-1 month', strtotime($current_date)));



                    $condition_1 = array(
                      'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                      'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_month, // Filter by this week
                      'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_month // Filter by this week

                    );

                    $condition_2 = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_month // Filter by this week

                    );
        
            }

              else if($transactionCountCompareFilter=="lastVsThisYear"){

                    $current_year = date('Y');

                    // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    // Calculate the start date of the last year
                    $start_of_last_year = ($current_year - 1) . '-01-01';
                    // Calculate the end date of the last year
                    $end_of_last_year = ($current_year - 1) . '-12-31';


                    $condition_1 = array(
                      'mandate_customers.is_active' => 1,
                      'mandate_customers.is_deleted' => 0,
                      'mandate_customers.mandate_status_message' =>'success',
                      'mandate_transaction_schedule.mts_is_active' => 1,
                      'mandate_transaction_schedule.mts_is_deleted' => 0,
                      'mandate_transaction_schedule.mts_is_skipped' => 0,
                      'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_year, // Filter by this week
                      'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_year // Filter by this week
                     );
        
                    $condition_2 = array(
                      'mandate_customers.is_active' => 1,
                      'mandate_customers.is_deleted' => 0,
                      'mandate_customers.mandate_status_message' =>'success',
                      'mandate_transaction_schedule.mts_is_active' => 1,
                      'mandate_transaction_schedule.mts_is_deleted' => 0,
                      'mandate_transaction_schedule.mts_is_skipped' => 0,
                      'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_year, // Filter by this week
                      'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_year // Filter by this week
                     );
        
            }

             $option_1 = array(
               'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                             COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                             SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                             mandate_transaction_schedule.mts_status_message AS transaction_status',
                'table' =>'mandate_customers',
                'left_join' => array(
                    array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                     array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'group_by' => 'mandate_transaction_schedule.mts_status_message',
                'where' => $condition_1,
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );

             $option_2 = array(
                    'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                 COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                 SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                 mandate_transaction_schedule.mts_status_message AS transaction_status',
                    'table' =>'mandate_customers',
                    'left_join' => array(
                        array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                         array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                         array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                    ),
                    'group_by' => 'mandate_transaction_schedule.mts_status_message',
                    'where' => $condition_2,
                     'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );

            $compare_1=NULL;   
            $compare_2=NULL;   
            
            if($this->Crud_model->commonGet($option_1)){
                  $compare_1=$this->Crud_model->commonGet($option_1);
            }  
            
            if($this->Crud_model->commonGet($option_2)){
                 $compare_2=$this->Crud_model->commonGet($option_2);
            } 
          

             if($compare_1 || $compare_2){
                    $this->response([
                      "status" => TRUE,
                      "message" => "Count Loaded Successfully.",
                      "compare_1"=>$compare_1,
                      "compare_2"=>$compare_2,
                    ], REST_Controller::HTTP_OK);  
                }
                else{
                      $this->response([
                          "compare_1"=>NULL,
                          "compare_2"=>NULL,
                          'status' => FALSE,
                          "message" => "No Transactions Found.",
                      ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

     

           }
           else{
                 $this->response([
                           "data"=>NULL,
                          'status' => FALSE,
                           "message" => "Please select filter range.",
                           
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

        }


        //////////////////////////////////////////////
   
        public function showCountTransactionBarLine_get($value='')
        {
           $filterTransactionsBarLineCount = $this->security->xss_clean($this->get("filterTransactionsBarLineCount"));

           if(!empty($filterTransactionsBarLineCount)){

            $xAxisData=array();

            if($filterTransactionsBarLineCount=="yesterday"){
                    for ($i = 0; $i < 24; $i++) {
                        $hour = ($i % 12 == 0) ? 12 : $i % 12; // Convert 0 to 12
                        $suffix = ($i < 12) ? "AM" : "PM"; // Determine AM or PM
                        $xAxisData[] = $hour . ":00 " . $suffix; 

                         if ($hour == 11 && $suffix == "PM") {
                              $xAxisData[] = $hour . ":59 " . $suffix; 
                            // If it's 11 PM, add minutes from 00 to 59
                           
                        }// Add hour in 12-hour format
                    }
                    $date = date('Y-m-d', strtotime('-1 day'));
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $date // Filter by today's date
                    );

                      $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                         CONCAT(
                                                CASE 
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) = 0 THEN "12:00 AM"
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) < 12 THEN CONCAT(HOUR(mandate_transaction_schedule.mts_datetime), ":00 AM")
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) = 12 THEN "11:59 PM"
                                                    ELSE CONCAT(HOUR(mandate_transaction_schedule.mts_datetime) - 12, ":00 PM")
                                                END,
                                                " - ",
                                                CASE 
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) + 1 = 24 THEN "12:00 AM"
                                                    WHEN (HOUR(mandate_transaction_schedule.mts_datetime) + 1) < 12 THEN CONCAT(HOUR(mandate_transaction_schedule.mts_datetime) + 1, ":00 AM")
                                                    WHEN (HOUR(mandate_transaction_schedule.mts_datetime) + 1) = 12 THEN "12:00 PM"
                                                    ELSE CONCAT((HOUR(mandate_transaction_schedule.mts_datetime) + 1) - 12, ":00 PM")
                                                END
                                            ) AS time_interval,
                                          mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                  array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                  array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'time_interval, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

                         );
            }
            else if($filterTransactionsBarLineCount=="today"){

                  for ($i = 0; $i < 24; $i++) {
                        $hour = ($i % 12 == 0) ? 12 : $i % 12; // Convert 0 to 12
                        $suffix = ($i < 12) ? "AM" : "PM"; // Determine AM or PM
                        $xAxisData[] = $hour . ":00 " . $suffix; 

                         if ($hour == 11 && $suffix == "PM") {
                              $xAxisData[] = $hour . ":59 " . $suffix; 
                            // If it's 11 PM, add minutes from 00 to 59
                           
                        }// Add hour in 12-hour format
                    }
                    $date = date('Y-m-d');
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $date // Filter by today's date
                    );

                      $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                         CONCAT(
                                                CASE 
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) = 0 THEN "12:00 AM"
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) < 12 THEN CONCAT(HOUR(mandate_transaction_schedule.mts_datetime), ":00 AM")
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) = 12 THEN "11:59 PM"
                                                    ELSE CONCAT(HOUR(mandate_transaction_schedule.mts_datetime) - 12, ":00 PM")
                                                END,
                                                " - ",
                                                CASE 
                                                    WHEN HOUR(mandate_transaction_schedule.mts_datetime) + 1 = 24 THEN "12:00 AM"
                                                    WHEN (HOUR(mandate_transaction_schedule.mts_datetime) + 1) < 12 THEN CONCAT(HOUR(mandate_transaction_schedule.mts_datetime) + 1, ":00 AM")
                                                    WHEN (HOUR(mandate_transaction_schedule.mts_datetime) + 1) = 12 THEN "12:00 PM"
                                                    ELSE CONCAT((HOUR(mandate_transaction_schedule.mts_datetime) + 1) - 12, ":00 PM")
                                                END
                                            ) AS time_interval,
                                          mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                 array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'time_interval, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

                         );
            }
            
            else if($filterTransactionsBarLineCount=="week"){
                  $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                  $xAxisData = $daysOfWeek;
                   
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_week // Filter by this week

                    );

                   $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                           DAYNAME(mandate_transaction_schedule.mts_datetime) AS day_of_week,
                                          mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                  array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'day_of_week, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),


                         );
            }

             else if($filterTransactionsBarLineCount=="lastweek"){
                      $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                      $xAxisData = $daysOfWeek;
                   
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $start_of_last_week = date('Y-m-d', strtotime("-7 days", strtotime($start_of_week)));
                    $end_of_last_week = date('Y-m-d', strtotime("-1 day", strtotime($start_of_week)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_week // Filter by this week

                    );

                   $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                           DAYNAME(mandate_transaction_schedule.mts_datetime) AS day_of_week,
                                          mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                 array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'day_of_week, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),


                         );
            }

            else if($filterTransactionsBarLineCount=="month"){

                 // Get the number of days in the current month
                    $currentMonth = date('n'); // Get the current month (1 for January, 2 for February, etc.)
                    $currentYear = date('Y'); // Get the current year
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

                    // Generate x-axis data for the month
                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $xAxisData[] = $day;
                    }
                    
                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_month // Filter by this week

                    );



                       $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                         DAY(mandate_transaction_schedule.mts_datetime) AS day_of_month,
                                         mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                 array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'day_of_month, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

                         );
            }


               else if($filterTransactionsBarLineCount=="lastmonth"){

                 // Get the number of days in the current month
                    $currentMonth = date('n'); // Get the current month (1 for January, 2 for February, etc.)
                    $currentYear = date('Y'); // Get the current year
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

                    // Generate x-axis data for the month
                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $xAxisData[] = $day;
                    }
                    
                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $start_of_last_month = date('Y-m-01', strtotime('-1 month', strtotime($current_date)));
                    // Calculate the end date of the last month
                    $end_of_last_month = date('Y-m-t', strtotime('-1 month', strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_month // Filter by this week

                    );

                       $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                         DAY(mandate_transaction_schedule.mts_datetime) AS day_of_month,
                                         mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'day_of_month, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),


                         );
            }


            else if($filterTransactionsBarLineCount=="year"){
                    $months = array(
                    'January', 'February', 'March', 'April',
                        'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    );

                    $xAxisData = $months;

                   $current_year = date('Y');

                // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_year, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_year // Filter by this week
                     );

                      $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                         MONTHNAME(mandate_transaction_schedule.mts_datetime) AS month_year,
                                          mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'month_year, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
                         );

            }

            else if($filterTransactionsBarLineCount=="lastyear"){
                    $months = array(
                    'January', 'February', 'March', 'April',
                        'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    );

                    $xAxisData = $months;

                   $current_year = date('Y');

                // Calculate the start date of the current year
                    $start_of_year = $current_year . '-01-01';

                    // Calculate the end date of the current year
                    $end_of_year = $current_year . '-12-31';

                    $start_of_last_year = ($current_year - 1) . '-01-01';
                    // Calculate the end date of the last year
                    $end_of_last_year = ($current_year - 1) . '-12-31';

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_last_year, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_last_year // Filter by this week
                     );

                      $option = array(
                            'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_mandates, 
                                         COUNT(mandate_transaction_schedule.mts_id) AS total_transaction, 
                                         SUM(mandate_transaction_schedule.mts_amount) AS total_transaction_amount,
                                         MONTHNAME(mandate_transaction_schedule.mts_datetime) AS month_year,
                                          mandate_transaction_schedule.mts_status_message AS transaction_status',
                            'table' =>'mandate_customers',
                            'left_join' => array(
                                array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                 array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                                  array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                            ),
                            'group_by' => 'month_year, transaction_status',
                            'where' => $condition,
                            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
                         );

            }
           
                 if($users_row=$this->Crud_model->commonGet($option)){
                         $grouped=array();

                        foreach ($users_row as $key => $value) {
                            
                            if(!$users_row[$value->month_year] && !$grouped[$value->month_year][$value->transaction_status]){
                                $grouped[$value->month_year][]=$value;
                            }

                        }

                        $this->response([
                          "status" => TRUE,
                          "message" => "Count Loaded Successfully.",
                          "xAxisData"=>$xAxisData,
                          "data"=>array_values($grouped),
                        ], REST_Controller::HTTP_OK);  
                 }

                else{
                      $this->response([
                           "data"=>NULL,
                           "xAxisData"=>NULL,
                           'status' => FALSE,
                           "message" => "No Transactions Found.",
                           
                         ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
        

           }

           else{
                $this->response([
                   "data"=>NULL,
                  'status' => FALSE,
                   "message" => "Please select Date Range and Type.",
                 ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
        }


        /////////////////////////


    public function showshowCanceledMandatesCount_get()
    {

         $condition = array(
            'mandate_transaction_schedule.mts_is_active'=>0,
            'mandate_transaction_schedule.mts_is_deleted'=>1,
            'mandate_transaction_schedule.mts_has_cancelled'=>1,
            'mandate_customers.is_active'=>1,
            'mandate_customers.is_deleted'=>0,
        );

        $conditionPending = array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'bank_branches.is_active' => 1,
            'bank_branches.is_deleted' => 0,
            'mandate_customers.mandate_status_message'=> NULL
            
        );
        
        $optionCountCanceled = array(
           'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_canceled_mandates,
                 COUNT(mandate_transaction_schedule.mts_has_cancelled) as total_cancelled, 
                 SUM(mandate_transaction_schedule.mts_amount) as total_amount',

           'table' =>'mandate_transaction_schedule',
           'left_join' => array(
                array('mandate_customers' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')),

           'where' => $condition,
           'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
           'single'=> TRUE
        );    


        $optionCountPending = array(
           'select' => 'COUNT(DISTINCT mandate_customers.mandate_customer_id) AS total_pending_mandates',

           'table' =>'mandate_customers',
            'left_join' => array(
                // array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
           'where' => $conditionPending,
           'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
           'single'=> TRUE
        ); 

        $pending_count_row=$this->Crud_model->commonGet($optionCountPending);


        if($skipped_count_row=$this->Crud_model->commonGet($optionCountCanceled)){
            $this->response([
              "status" => TRUE,
              "message" => "Count Loaded Successfully.",
              "data"=>$skipped_count_row,
              "pendingcount" => $pending_count_row,
            ], REST_Controller::HTTP_OK);  
        }
        else{
              $this->response([
                   "data"=>NULL,
                  'status' => FALSE,
                   "message" => "No Transactions Found.",
                   
                 ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function showTransactionsList_get($page='')
                
        {


        $searchText = $this->security->xss_clean($this->get("search"));
        $transactionDateFilter = $this->security->xss_clean($this->get("transactionDateFilter"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
      
      //   $toDate = $this->security->xss_clean($this->get("toDate"));
        $fromDate = $this->security->xss_clean($this->get("fromDate"));

        if( !empty($fromDate)){
        
       
         $fromDateObj = DateTime::createFromFormat('d/m/y', $fromDate);
         $fromDate = $fromDateObj->format('Y-m-d');

    
        }
     
      
        // $draw = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_transaction_schedule.mts_datetime' => 'ASC');
     

        $final_columnSearchValue = array();
        $condition = array();
        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_debit_date = array();

        $searchCondition = array();

         foreach ($_GET['columns'] as $index => $column) {
            
            $columnSearchValue = $column['search']['value']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column

             if($index==$order_column && $columnData!=null){
                
                $order_column_name = $column['data'];
                $order_column_name='mandate_customers.'.$order_column_name;
                $order_array=array($order_column_name => $order_sort_dir);

             }
           
            // Check if a search value is provided for the current column
            if (!empty($columnSearchValue)) {
                       
                        $filteredConditions = array();
    
                        if($columnData=="mts_amount"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                     $rangeValues = explode('between', $columnSearchValue);
                                     if (count($rangeValues) == 2) {
                                        $minAmount = $rangeValues[0] + 0;
                                        $maxAmount = $rangeValues[1] + 0;
                                        
                                        $condition_amount = array(
                                            $table_column_name.' >=' => $minAmount,
                                            $table_column_name.' <=' => $maxAmount,
                                        );
                                      
                                    }
                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                    $amount = str_replace('<', '', $columnSearchValue);
                                      $condition_amount = array(
                                            $table_column_name.' <' => $amount + 0,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {
                                    $amount = str_replace('>', '', $columnSearchValue);
                                      $condition_amount = array(
                                            $table_column_name.' >' => $amount+ 0,
                                      );
                             }
                             else{
                                $condition_amount = array(
                                        $table_column_name => $columnSearchValue + 0,
                                  );
                             }
                            
                        }

                        else  if($columnData=="mts_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate   = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_debit_date = array(
                                        $table_column_name.' >' => $fromDate.' 00:00:00',
                                        $table_column_name.' <' => $toDate.' 23:59:59',
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_debit_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_debit_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_debit_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else {

                           if($columnData=="mts_status_message"){

                                if(strpos($columnSearchValue,'^$') !== false){
                                     if($searchCondition_filter){
                                            
                                            $searchCondition_filter = array_merge($searchCondition_filter,
                                                array($table_column_name=>NULL)
                                            );          
                                     
                                     }
                                     
                                     else{
                                     
                                             $searchCondition_filter = array($table_column_name=>NULL);       
                                     
                                     }     

                                      $columnSearchValue = str_replace('^$|','', $columnSearchValue);

                                      $searchCondition_filter = array_merge($searchCondition_filter,
                                                array($table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*'));

                                }
                                else{
                                       $searchCondition_filter = array(
                                            $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                                      );

                                }
                       
                             
                             }
                             else{
                                  $searchCondition_filter = array(
                                            $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                                      );
                             }
                                 
                           
                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="mts_amount" && $columnData!="mts_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }
          
           if($transactionDateFilter=="yesterday"){
                    $yesterday_date = date('Y-m-d', strtotime('-1 day'));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $yesterday_date // Filter by today's date
                    );
        
            }

            if($transactionDateFilter=="tomorrow"){
                    $tomorrow_date = date('Y-m-d', strtotime('+1 day'));
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $tomorrow_date // Filter by today's date
                    );
        
            }

           else if($transactionDateFilter=="today"){
                    $date = date('Y-m-d');
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $date // Filter by today's date
                    );
        
            }

           else if($transactionDateFilter=="week"){

                // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_week // Filter by this week
                    );
        
            }


            else if($transactionDateFilter=="month"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_month // Filter by this week

                    );
        
            }
          
            else if($transactionDateFilter=="all"){
               $condition = array(
                  'mandate_customers.is_active' => 1,
                  'mandate_customers.is_deleted' => 0,
                  'mandate_customers.mandate_status_message' =>'success',
                  'mandate_transaction_schedule.mts_is_active' => 1,
                  'mandate_transaction_schedule.mts_is_deleted' => 0,
                  'mandate_transaction_schedule.mts_is_skipped' => 0,
               );
   
            }
              
   
            else if ($transactionDateFilter == "customdate") {
               
                   $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' => 'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >=' => $fromDate ,
                     //   'DATE(mandate_transaction_schedule.mts_datetime) <=' => $toDate ,
                   );
               
           }
      
          $condition = array_merge($condition_amount, $condition);
         
          $condition = array_merge($condition_debit_date, $condition);

   
        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_transaction_schedule.mts_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_transaction_schedule.mts_status_message LIKE' => '%' . $searchText . '%',
            );
        }


            $option = array(
                'select' => 'mandate_transaction_schedule.*,mandate_customers.*,enach_banks.*,bank_branches.branch_name,CONCAT(users.firstname," ",users.lastname) AS name,loan_types.loan_type_name,DATE(mandate_transaction_schedule.mts_datetime) as mts_datetime',
                    'table' =>'mandate_transaction_schedule',
                'left_join' => array(
                    array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id'),
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
                    array('loan_types' => 'loan_types.loan_type_id = mandate_customers.loan_type_id'),
                    array('users' => 'users.id = mandate_customers.created_by'),
                ),
                'where' => $condition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
                'limit' => array($length => $start),
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );

        // print_r($option);
        // die();
        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

           $optionCount = array(
                'select' => 'mandate_transaction_schedule.*,mandate_customers.*,enach_banks.*,bank_branches.branch_name,CONCAT(users.firstname," ",users.lastname) AS name,loan_types.loan_type_name,DATE(mandate_transaction_schedule.mts_datetime) as mts_datetime',
                    'table' =>'mandate_transaction_schedule',
                'left_join' => array(
                    array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id'),
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
                    array('loan_types' => 'loan_types.loan_type_id = mandate_customers.loan_type_id'),
                     array('users' => 'users.id = mandate_customers.created_by'),
                ),
                'where' => $condition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
                // 'limit' => array($length => $start),
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );
              $numRows = $this->Crud_model->commonGet_count($optionCount);
          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$users_row,
                          "total_rows" => $numRows,
                          "draw"=> intval($draw),
                          "recordsTotal"=>$numRows,
                          "recordsFiltered"=>$numRows,  
        
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


        ////////////////////////


        public function exportTransactionDetails_get($value='')
        {
            
        $searchText = $this->security->xss_clean($this->get("searchText"));
        $transactionDateFilter = $this->security->xss_clean($this->get("transactionDateFilter"));
         $columnProperties = $this->security->xss_clean($this->get("columnProperties"));
      
       //   $toDate = $this->security->xss_clean($this->get("toDate"));
         $fromDate = $this->security->xss_clean($this->get("fromDate"));
 
         if( !empty($fromDate)){
         
        
          $fromDateObj = DateTime::createFromFormat('d/m/y', $fromDate);
          $fromDate = $fromDateObj->format('Y-m-d');
 
     
         }

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_transaction_schedule.mts_datetime' => 'DESC');
     
        $final_columnSearchValue = array();
         $condition = array();
        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_debit_date = array();

        $searchCondition = array();

         foreach ($columnProperties as $index => $column) {
            
             $columnSearchValue = $column['searchValue']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column

             if($index==$order_column && $columnData!=null){
                
                $order_column_name = $column['data'];
                $order_column_name='mandate_customers.'.$order_column_name;
                $order_array=array($order_column_name => $order_sort_dir);

             }
           
            // Check if a search value is provided for the current column
            if (!empty($columnSearchValue)) {
                       
                        $filteredConditions = array();
    
                        if($columnData=="mts_amount"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                     $rangeValues = explode('between', $columnSearchValue);
                                     if (count($rangeValues) == 2) {
                                        $minAmount = $rangeValues[0] + 0;
                                        $maxAmount = $rangeValues[1] + 0;
                                        
                                        $condition_amount = array(
                                            $table_column_name.' >=' => $minAmount,
                                            $table_column_name.' <=' => $maxAmount,
                                        );
                                      
                                    }
                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                    $amount = str_replace('<', '', $columnSearchValue);
                                      $condition_amount = array(
                                            $table_column_name.' <' => $amount + 0,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {
                                    $amount = str_replace('>', '', $columnSearchValue);
                                      $condition_amount = array(
                                            $table_column_name.' >' => $amount+ 0,
                                      );
                             }
                             else{
                                $condition_amount = array(
                                        $table_column_name => $columnSearchValue + 0,
                                  );
                             }
                            
                        }

                        else  if($columnData=="mts_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate   = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_debit_date = array(
                                        $table_column_name.' >' => $fromDate.' 00:00:00',
                                        $table_column_name.' <' => $toDate.' 23:59:59',
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_debit_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_debit_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_debit_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else{

                           if($columnData=="mts_status_message" && strpos($columnSearchValue,'^$') !== false){
                             
                                 if($searchCondition_filter){
                                        
                                          $searchCondition_filter = array_merge($searchCondition_filter,array($table_column_name=>NULL));          
                                 
                                 }
                                 else{
                                         $searchCondition_filter = array($table_column_name=>NULL);       
                                 }
                             
                             }
                                    
                             else{
                                      $searchCondition_filter = array(
                                        $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                                         );
                             }

                           
                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="mts_amount" && $columnData!="mts_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }
          
           if($transactionDateFilter=="yesterday"){
                    $yesterday_date = date('Y-m-d', strtotime('-1 day'));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $yesterday_date // Filter by today's date
                    );
        
            }

            if($transactionDateFilter=="tomorrow"){
                    $tomorrow_date = date('Y-m-d', strtotime('+1 day'));
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $tomorrow_date // Filter by today's date
                    );
        
            }

           else if($transactionDateFilter=="today"){
                    $date = date('Y-m-d');
                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime)' => $date // Filter by today's date
                    );
        
            }

           else if($transactionDateFilter=="week"){

                // Get the current date and time
                    $current_date = date('Y-m-d');

                    // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $day_of_week = date('w', strtotime($current_date));

                    // Calculate the start date of the week (assuming Monday is the start of the week)
                    $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

                    // Calculate the end date of the week (assuming Sunday is the end of the week)
                    $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_week, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_week // Filter by this week
                    );
        
            }


            else if($transactionDateFilter=="month"){

                    $current_date = date('Y-m-d');

                    // Calculate the start date of the current month
                    $start_of_month = date('Y-m-01', strtotime($current_date));

                    // Calculate the end date of the current month
                    $end_of_month = date('Y-m-t', strtotime($current_date));

                    $condition = array(
                       'mandate_customers.is_active' => 1,
                       'mandate_customers.is_deleted' => 0,
                       'mandate_customers.mandate_status_message' =>'success',
                       'mandate_transaction_schedule.mts_is_active' => 1,
                       'mandate_transaction_schedule.mts_is_deleted' => 0,
                       'mandate_transaction_schedule.mts_is_skipped' => 0,
                       'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_month, // Filter by this week
                       'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_month // Filter by this week

                    );
        
            }
          
             else if($transactionDateFilter=="all"){
                $condition = array(
                   'mandate_customers.is_active' => 1,
                   'mandate_customers.is_deleted' => 0,
                   'mandate_customers.mandate_status_message' =>'success',
                   'mandate_transaction_schedule.mts_is_active' => 1,
                   'mandate_transaction_schedule.mts_is_deleted' => 0,
                   'mandate_transaction_schedule.mts_is_skipped' => 0,
                );
           
             }
         

             else if ($transactionDateFilter == "customdate") {
                
                    $condition = array(
                        'mandate_customers.is_active' => 1,
                        'mandate_customers.is_deleted' => 0,
                        'mandate_customers.mandate_status_message' => 'success',
                        'mandate_transaction_schedule.mts_is_active' => 1,
                        'mandate_transaction_schedule.mts_is_deleted' => 0,
                        'mandate_transaction_schedule.mts_is_skipped' => 0,
                        'DATE(mandate_transaction_schedule.mts_datetime) >=' => $fromDate ,
                      //   'DATE(mandate_transaction_schedule.mts_datetime) <=' => $toDate ,
                    );
                
            }
   
           $condition = array_merge($condition_amount, $condition);

           $condition = array_merge($condition_debit_date, $condition);

        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_transaction_schedule.mts_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_transaction_schedule.mts_status_message LIKE' => '%' . $searchText . '%',
            );
        }


            $option = array(
                'select' => 'mandate_transaction_schedule.*,mandate_customers.*,enach_banks.*,bank_branches.branch_name,CONCAT(users.firstname," ",users.lastname) AS name,loan_types.loan_type_name,DATE(mandate_transaction_schedule.mts_datetime) as mts_datetime',
                    'table' =>'mandate_transaction_schedule',
                'left_join' => array(
                    array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id'),
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
                    array('loan_types' => 'loan_types.loan_type_id = mandate_customers.loan_type_id'),
                    array('users' => 'users.id = mandate_customers.created_by'),
                ),
                'where' => $condition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
               
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );

         // print_r($option);
         // die();
        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$users_row,
                     
                      ], REST_Controller::HTTP_OK); 
        
                } 
                else {
         $this->response([
                      'status' => FALSE,
                       "message" => "User Not Found. Please add User.",
                       
            ], REST_Controller::HTTP_OK);
       }

        }


      //   public function exportTransactionDetails_get($value='')
      //   {
            

      //   $columnProperties = $this->security->xss_clean($this->get("columnProperties"));

      //   $searchText = $this->security->xss_clean($this->get("searchText"));
      //   $transactionDateFilter = $this->security->xss_clean($this->get("transactionDateFilter"));
      //   $draw = $this->security->xss_clean($this->get("draw"));
      //   $start = $this->security->xss_clean($this->get("start"));
      //   $length = $this->security->xss_clean($this->get("length"));
      //   // $draw = $this->security->xss_clean($this->get("length"));

      //   $order_column = $_GET['order'][0]['column'];
      //   $order_sort_dir = $_GET['order'][0]['dir'];
      //   $order_column_name =$_GET['order'][0]['name'];
      //   $order_column = (int)$order_column;
      
      //   $order_array=array('mandate_transaction_schedule.mts_datetime' => 'DESC');
     
      //   $final_columnSearchValue = array();

      //   $condition_amount = array();

      //   $condition_emi_start_date = array();
      //   $condition_emi_end_date = array();
      //   $condition_debit_date = array();

      //   $searchCondition = array();

      //    foreach ($columnProperties as $index => $column) {
            
      //       $columnSearchValue = $column['search']['value']; // Search value for the current column
      //       $columnData = $column['data']; // Search value for the current column
      //       $table_column_name = $column['name']; // Search value for the current column

      //        if($index==$order_column && $columnData!=null){
                
      //           $order_column_name = $column['data'];
      //           $order_column_name='mandate_customers.'.$order_column_name;
      //           $order_array=array($order_column_name => $order_sort_dir);

      //        }
           
      //       // Check if a search value is provided for the current column
      //       if (!empty($columnSearchValue)) {
                       
      //                   $filteredConditions = array();
    
      //                   if($columnData=="mts_amount"){
                             
      //                        if (strpos($columnSearchValue,'between') !== false) {

      //                                $rangeValues = explode('between', $columnSearchValue);
      //                                if (count($rangeValues) == 2) {
      //                                   $minAmount = $rangeValues[0] + 0;
      //                                   $maxAmount = $rangeValues[1] + 0;
                                        
      //                                   $condition_amount = array(
      //                                       $table_column_name.' >=' => $minAmount,
      //                                       $table_column_name.' <=' => $maxAmount,
      //                                   );
                                      
      //                               }
      //                        }

      //                        else if (strpos($columnSearchValue,'<') !== false) {
      //                               $amount = str_replace('<', '', $columnSearchValue);
      //                                 $condition_amount = array(
      //                                       $table_column_name.' <' => $amount + 0,
      //                                 );
      //                        }

      //                         else  if (strpos($columnSearchValue,'>') !== false) {
      //                               $amount = str_replace('>', '', $columnSearchValue);
      //                                 $condition_amount = array(
      //                                       $table_column_name.' >' => $amount+ 0,
      //                                 );
      //                        }
      //                        else{
      //                           $condition_amount = array(
      //                                   $table_column_name => $columnSearchValue + 0,
      //                             );
      //                        }
                            
      //                   }

      //                   else  if($columnData=="mts_datetime"){
                             
      //                        if (strpos($columnSearchValue,'between') !== false) {

      //                           $rangeValues = explode('between', $columnSearchValue);
                               
      //                           if (count($rangeValues) == 2) {

      //                               $fromDate = $rangeValues[0];
      //                               $toDate   = $rangeValues[1];

      //                               $fromDate = date("Y-m-d", strtotime($fromDate));
      //                               $toDate   = date("Y-m-d", strtotime($toDate));
                           
      //                               $condition_debit_date = array(
      //                                   $table_column_name.' >' => $fromDate.' 00:00:00',
      //                                   $table_column_name.' <' => $toDate.' 23:59:59',
      //                               );
      //                           }

      //                        }

      //                        else if (strpos($columnSearchValue,'<') !== false) {
                                  
      //                               $date = str_replace('<', '', $columnSearchValue);

      //                               $date = date("Y-m-d", strtotime($date));

      //                               $condition_debit_date = array(
      //                                    $table_column_name.' <' => $date.' 00:00:00',
      //                               );
      //                        }

      //                         else  if (strpos($columnSearchValue,'>') !== false) {

      //                               $date = str_replace('>', '', $columnSearchValue);

      //                               $date = date("Y-m-d", strtotime($date));

      //                               $condition_debit_date = array(
      //                                    $table_column_name.' >' => $date.' 23:59:59',
      //                               );
      //                        }
      //                        else{

      //                           $date = date("Y-m-d", strtotime($columnSearchValue));

      //                           $condition_debit_date = array(
      //                               $table_column_name.' >=' => $date.' 00:00:00',
      //                               $table_column_name.' <=' => $date.' 23:59:59',
      //                           );
      //                        }
                            
      //                   }

      //                   else{

      //                      if($columnData=="mts_status_message" && strpos($columnSearchValue,'^$') !== false){
                             
      //                            if($searchCondition_filter){
                                        
      //                                     $searchCondition_filter = array_merge($searchCondition_filter,array($table_column_name=>NULL));          
                                 
      //                            }
      //                            else{
      //                                    $searchCondition_filter = array($table_column_name=>NULL);       
      //                            }
                             
      //                        }
                                    
      //                        else{
      //                                 $searchCondition_filter = array(
      //                                   $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
      //                                    );
      //                        }

                           
      //                       foreach ($searchCondition_filter as $key => $value) {
      //                                   // Check if the key contains the string specified in $columnData
      //                             if($columnData!="mts_amount" && $columnData!="mts_datetime"){

      //                                   if (strpos($key, $columnData) !== false) {
      //                                       $filteredConditions[$key] = $value;
      //                                   }  

      //                             }
                            
      //                       } 

      //                       $final_columnSearchValue [] =  $filteredConditions;
                           
      //                   }
                        
      //        }
           
      //   }
          
      //      if($transactionDateFilter=="yesterday"){
      //               $yesterday_date = date('Y-m-d', strtotime('-1 day'));

      //               $condition = array(
      //                  'mandate_customers.is_active' => 1,
      //                  'mandate_customers.is_deleted' => 0,
      //                  'mandate_customers.mandate_status_message' =>'success',
      //                  'mandate_transaction_schedule.mts_is_active' => 1,
      //                  'mandate_transaction_schedule.mts_is_deleted' => 0,
      //                  'mandate_transaction_schedule.mts_is_skipped' => 0,
      //                  'DATE(mandate_transaction_schedule.mts_datetime)' => $yesterday_date // Filter by today's date
      //               );
        
      //       }

      //       if($transactionDateFilter=="tomorrow"){
      //               $tomorrow_date = date('Y-m-d', strtotime('+1 day'));
      //               $condition = array(
      //                  'mandate_customers.is_active' => 1,
      //                  'mandate_customers.is_deleted' => 0,
      //                  'mandate_customers.mandate_status_message' =>'success',
      //                  'mandate_transaction_schedule.mts_is_active' => 1,
      //                  'mandate_transaction_schedule.mts_is_deleted' => 0,
      //                  'mandate_transaction_schedule.mts_is_skipped' => 0,
      //                  'DATE(mandate_transaction_schedule.mts_datetime)' => $tomorrow_date // Filter by today's date
      //               );
        
      //       }

      //      else if($transactionDateFilter=="today"){
      //               $date = date('Y-m-d');
      //               $condition = array(
      //                  'mandate_customers.is_active' => 1,
      //                  'mandate_customers.is_deleted' => 0,
      //                  'mandate_customers.mandate_status_message' =>'success',
      //                  'mandate_transaction_schedule.mts_is_active' => 1,
      //                  'mandate_transaction_schedule.mts_is_deleted' => 0,
      //                  'mandate_transaction_schedule.mts_is_skipped' => 0,
      //                  'DATE(mandate_transaction_schedule.mts_datetime)' => $date // Filter by today's date
      //               );
        
      //       }

      //      else if($transactionDateFilter=="week"){

      //           // Get the current date and time
      //               $current_date = date('Y-m-d');

      //               // Find the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
      //               $day_of_week = date('w', strtotime($current_date));

      //               // Calculate the start date of the week (assuming Monday is the start of the week)
      //               $start_of_week = date('Y-m-d', strtotime("-$day_of_week day", strtotime($current_date)));

      //               // Calculate the end date of the week (assuming Sunday is the end of the week)
      //               $end_of_week = date('Y-m-d', strtotime("+".(6 - $day_of_week)." day", strtotime($current_date)));

      //               $condition = array(
      //                  'mandate_customers.is_active' => 1,
      //                  'mandate_customers.is_deleted' => 0,
      //                  'mandate_customers.mandate_status_message' =>'success',
      //                  'mandate_transaction_schedule.mts_is_active' => 1,
      //                  'mandate_transaction_schedule.mts_is_deleted' => 0,
      //                  'mandate_transaction_schedule.mts_is_skipped' => 0,
      //                  'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_week, // Filter by this week
      //                  'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_week // Filter by this week
      //               );
        
      //       }


      //       else if($transactionDateFilter=="month"){

      //               $current_date = date('Y-m-d');

      //               // Calculate the start date of the current month
      //               $start_of_month = date('Y-m-01', strtotime($current_date));

      //               // Calculate the end date of the current month
      //               $end_of_month = date('Y-m-t', strtotime($current_date));

      //               $condition = array(
      //                  'mandate_customers.is_active' => 1,
      //                  'mandate_customers.is_deleted' => 0,
      //                  'mandate_customers.mandate_status_message' =>'success',
      //                  'mandate_transaction_schedule.mts_is_active' => 1,
      //                  'mandate_transaction_schedule.mts_is_deleted' => 0,
      //                  'mandate_transaction_schedule.mts_is_skipped' => 0,
      //                  'DATE(mandate_transaction_schedule.mts_datetime) >= ' => $start_of_month, // Filter by this week
      //                  'DATE(mandate_transaction_schedule.mts_datetime) <= ' => $end_of_month // Filter by this week

      //               );
        
      //       }
          
           
      //     $condition = array_merge($condition_amount, $condition);
         
      //     $condition = array_merge($condition_debit_date, $condition);



      //   if ($searchText) {
      //       $searchCondition = array(
      //           'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
      //           'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
      //           'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
      //           'mandate_transaction_schedule.mts_amount LIKE' => '%' . $searchText . '%',
      //           'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
      //           'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
      //           'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
      //           'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
      //           'mandate_transaction_schedule.mts_status_message LIKE' => '%' . $searchText . '%',
      //       );
      //   }


      //       $option = array(
      //           'select' => 'mandate_transaction_schedule.*,mandate_customers.*,enach_banks.*,bank_branches.branch_name,CONCAT(users.firstname," ",users.lastname) AS name,loan_types.loan_type_name,DATE(mandate_transaction_schedule.mts_datetime) as mts_datetime',
      //               'table' =>'mandate_transaction_schedule',
      //           'left_join' => array(
      //               array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id'),
      //               array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
      //               array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
      //               array('loan_types' => 'loan_types.loan_type_id = mandate_customers.loan_type_id'),
      //               array('users' => 'users.id = mandate_customers.created_by'),
      //           ),
      //           'where' => $condition,
      //           'or_where' => $searchCondition,
      //           'filters' => $final_columnSearchValue,
      //           'order' => $order_array,
               
      //           'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
      //        );

      //   $users_row=$this->Crud_model->commonGet($option);
      //   if($users_row){

      //     $this->response([
      //                     "status" => TRUE,
      //                     "message" => "User Loaded Successfully.",
      //                     "data"=>$users_row,
                     
      //                 ], REST_Controller::HTTP_OK); 
        
      //          } else {
      //    $this->response([
      //                 'status' => FALSE,
      //                  "message" => "User Not Found. Please add User.",
                       
      //       ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
      //  }

      //   }




}