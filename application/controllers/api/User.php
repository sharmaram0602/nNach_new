<?php
require APPPATH.'libraries/REST_Controller.php';


class User extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='users';

    }

    public function showUsersList_get($page = '') {
        $searchText = $this->security->xss_clean($this->get("search"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];
    
        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name = $_GET['order'][0]['name'];
        $order_column = (int)$order_column;
        // $order_array = array('users.id' => 'ASC');

        $order_array = array('users.firstname' => 'ASC');
    
        $final_columnSearchValue = array();
        $searchCondition = array();
        // if ($order_column_name == 'fullname') {
        //     $order_array = array("CONCAT(firstname, ' ', lastname)" => $order_sort_dir);

        //     // $order_array = array("CONCAT(firstname, ' ', middlename, ' ', lastname)" => $order_sort_dir);
        // }
        foreach ($_GET['columns'] as $index => $column) {
            $columnSearchValue = $column['search']['value'];
            $columnData = $column['data'];
            $table_column_name = $column['name'];
    
            if ($index == $order_column && $columnData != null) {
                $order_column_name = 'users.' . $column['data'];
                $order_array = array($order_column_name => $order_sort_dir);
            }
    
            if (!empty($columnSearchValue)) {
                $searchCondition_filter = array(
                    $table_column_name . ' REGEXP' => '.*' . $columnSearchValue . '.*',
                );
                $final_columnSearchValue[] = $searchCondition_filter;
            }
        }
    
        $condition = array(
            'users.is_active' => 1,
            'users.is_deleted' => 0,
            'users.is_verified' => 1
        );
    
        if ($searchText) {
            $searchCondition = array(
                // 'users.firstname LIKE' => '%' . $searchText . '%',
                // 'users.middlename LIKE' => '%' . $searchText . '%',
                // 'users.lastname LIKE' => '%' . $searchText . '%',

                'CONCAT(users.firstname, " ", users.middlename, " ", users.lastname) LIKE' => '%' . $searchText . '%',
                'users.phone LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'users.email LIKE' => '%' . $searchText . '%',
            );
        }
    
        $option = array(
            'select' => 'users.*, user_group.group_id, user_group.user_id, designations.designation_name, designations.id, banks.*, bank_branches.branch_name',
            'table' => 'users',
            'join' => array(
                array('user_group' => 'user_group.user_id = users.id'),
                array('designations' => 'designations.id = user_group.group_id'),
                array('bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id'),
                array('banks' => 'banks.bank_id = users.organization_id')
            ),
            'where' => $condition,
            'order' => $order_array,
            'limit' => array($length => $start),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
        );
    
        if (!empty($final_columnSearchValue)) {
            $option['filters'] = $final_columnSearchValue;
        }
        if (!empty($searchCondition)) {
            $option['or_where'] = $searchCondition;
        }
    
        $users_row = $this->Crud_model->commonGet($option);
    
        if ($users_row) {
            $conNumRows['conditions'] = $condition;
    
            $optionCount = array(
                'select' => 'users.*, user_group.group_id, user_group.user_id, designations.designation_name, designations.id, banks.*, bank_branches.branch_name',
                'table' => 'users',
                'join' => array(
                    array('user_group' => 'user_group.user_id = users.id'),
                    array('designations' => 'designations.id = user_group.group_id'),
                    array('bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id'),
                    array('banks' => 'banks.bank_id = users.organization_id')
                ),
                'where' => $condition,
                'order' => $order_array,
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
            );
    
            if (!empty($final_columnSearchValue)) {
                $optionCount['filters'] = $final_columnSearchValue;
            }
            if (!empty($searchCondition)) {
                $optionCount['or_where'] = $searchCondition;
            }
    
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
    
    
    public function exportUserDetails_get($value = '')
    {
        $searchText = $this->security->xss_clean($this->get("searchText"));
        $columnProperties = $this->security->xss_clean($this->get("columnProperties"));
    
        $order_array = array('users.id' => 'DESC');
    
        $final_columnSearchValue = array();
        $searchCondition = array();
    
        foreach ($columnProperties as $index => $column) {
            $columnSearchValue = $column['searchValue']; // Search value for the current column
            $table_column_name = $column['name']; // Column name
    
            // Check if a search value is provided for the current column
            if (!empty($columnSearchValue)) {
                $final_columnSearchValue[] = array($table_column_name . ' REGEXP' => '.*' . $columnSearchValue . '.*');
            }
        }
    
        $condition = array(
            'users.is_active' => 1,
            'users.is_deleted' => 0,
            'users.is_verified' => 1
        );
    
        if ($searchText) {
            $searchCondition = array(
                'CONCAT(users.firstname," ", users.middlename," ", users.lastname) LIKE' => '%' . $searchText . '%',
                'users.phone LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'users.email LIKE' => '%' . $searchText . '%',
                'designations.designation_name LIKE' => '%' . $searchText . '%',
            );
        }
    
        $option = array(
            'select' => 'users.*,user_group.group_id,user_group.user_id,designations.designation_name,designations.id,banks.*,bank_branches.branch_name',
            'table' => 'users',
            'join' => array(
                array('user_group' => 'user_group.user_id = users.id'),
                array('designations' => 'designations.id = user_group.group_id'),
                array('bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id'),
                array('banks' => 'banks.bank_id = users.organization_id')
            ),
            'where' => $condition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
        );
    
        if (!empty($searchCondition)) {
            $option['or_where'] = $searchCondition;
        }
    
        $users_row = $this->Crud_model->commonGet($option);
    
        if ($users_row) {
            $this->response([
                "status" => TRUE,
                "message" => "User Loaded Successfully.",
                "data" => $users_row,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                "message" => "User Not Found. Please add User.",
            ], REST_Controller::HTTP_OK);
        }
    }
    
public function showScheduleUsersList_get($page = '')
    {
    
        $searchText = $this->security->xss_clean($this->get("search"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
        $mandate_customer_id = $this->security->xss_clean($this->get("mandate_customer_id"));

        // $draw = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_transaction_schedule.mts_id' => 'ASC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        // $condition_emi_end_date = array();
        // $condition_mandate_register_date = array();

        $searchCondition = array();
                   
        foreach ($_GET['columns'] as $index => $column) {
            
            $columnSearchValue = $column['search']['value']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column

             if($index==$order_column && $columnData!=null){
                
                $order_column_name = $column['data'];
                $order_column_name='mandate_transaction_schedule.'.$order_column_name;
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
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate.' 00:00:00',
                                        $table_column_name.' <' => $toDate.' 23:59:59',
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_emi_start_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_emi_start_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_emi_start_date = array(
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
                        

                        // else{

                        //      $searchCondition_filter = array(
                        //         $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                        //     );

                        //     foreach ($searchCondition_filter as $key => $value) {
                        //                 // Check if the key contains the string specified in $columnData
                        //           if($columnData!="mts_amount" && $columnData!="mts_datetime"){

                        //                 if (strpos($key, $columnData) !== false) {
                        //                     $filteredConditions[$key] = $value;
                        //                 }  

                        //           }
                            
                        //     } 

                        //     $final_columnSearchValue [] =  $filteredConditions;
                           
                        // }
                        
             }
           
        }

          $condition = array(
            'mandate_transaction_schedule.mts_customer_id'=> $mandate_customer_id,
            'mandate_transaction_schedule.mts_is_active' => 1,
            'mandate_transaction_schedule.mts_is_deleted' => 0,
    
          );

          $orCondition = array(

            'mandate_transaction_schedule.mts_customer_id'=> $mandate_customer_id,
            'mandate_transaction_schedule.mts_has_cancelled'=>1,
            'mandate_transaction_schedule.mts_is_active'=> 0,
            'mandate_transaction_schedule.mts_is_deleted' => 1,

    
          );
           
          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
    
        if ($searchText) {
            $searchCondition = array(
                'mandate_transaction_schedule.mts_datetime LIKE' => '%' . $searchText . '%',
                
                'mandate_transaction_schedule.mts_amount LIKE' => '%' . $searchText . '%',
                'mandate_transaction_schedule.mts_is_skipped LIKE' => '%' . $searchText . '%',

                'mandate_transaction_schedule.mts_status_message LIKE' => '%' . $searchText . '%',
            );
        }

    
            $option = array(
                'select' => 'mandate_customers.*,mandate_transaction_schedule.*',
                'table' =>'mandate_transaction_schedule',
                'left_join' => array(
                array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id')

            ),
            // 'where' => $condition,
            'or_where' => $searchCondition, 
            'custom_where2'=> $condition,
            'custom_where3' => $orCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            'limit' => array($length => $start),
             );


            $optionCountFigures = array(
               'select' => 'count(mandate_transaction_schedule.mts_id) as total_transactions,
                          
                            sum(mts_amount) as total_transaction_amount,
                           
                            sum(case when mandate_transaction_schedule.mts_status_message="F" or  mandate_transaction_schedule.mts_status_message="A" then 1 else 0 end) as total_failed_transactions,
                           
                            sum(case when mts_status_message = "F"  or  mandate_transaction_schedule.mts_status_message="A" then mts_amount else 0 end) as total_failed_transaction_amount,
                          
                            sum(case when mts_is_skipped = 1 then 1 else 0 end) as total_skipped_transactions,
                           
                            sum(case when mts_is_skipped = 1 then mts_amount else 0 end) as total_skipped_transaction_amount,
                            
                            sum(case when mts_status_message = "F"  or  mandate_transaction_schedule.mts_status_message="A" and mts_message = "Balance Insufficient" then 1 else 0 end) as total_emi_bounced_count,
                           
                            sum(case when mts_status_message = "F"  or  mandate_transaction_schedule.mts_status_message="A" and mts_message = "Balance Insufficient" then mts_amount else 0 end) as total_emi_bounced_amount,

                            sum(case when mts_status_message = "S" then 1 else 0 end) as total_successful_count,
                           
                            sum(case when mts_status_message = "S" then mts_amount else 0 end) as total_successful_amount,

                            sum(case when mts_status_message IS NULL  and mts_is_skipped = 0 then 1 else 0 end) as total_remaining_count,
                            
                            sum(case when mts_status_message IS NULL and mts_is_skipped = 0 then mts_amount else 0 end) as total_remaining_amount,
                            
                            min(case when (mts_status_message IS NULL OR mts_status_message="I") and mts_is_skipped = 0 and DATE(mts_datetime) >= CURDATE() then DATE(mts_datetime) else NULL end) as next_emi_debit_date,

                            sum(case when mts_status_message = "C" and mts_has_cancelled = 1 then mts_amount else 0 end) as canceled_amount,

                            sum(case when mts_status_message = "I" then mts_amount else 0 end ) as total_initiatedEMIAmount,
                            
                            sum(case when mts_status_message = "I" then 1 else 0 end) as total_initiatedEMICount',  // Updated line for canceled_amount




               'table' =>'mandate_transaction_schedule',
               // 'where' => $condition, 
                'custom_where2'=> $condition,
                'custom_where3' => $orCondition,
               'single'=> TRUE
            );    

        $count_row=$this->Crud_model->commonGet($optionCountFigures);
        $users_row=$this->Crud_model->commonGet($option);

        // print_r($users_row);
        // exit();
     
        if($users_row){

                $conNumRows['conditions'] = array(
                   'mandate_transaction_schedule.mts_customer_id'=> $mandate_customer_id,
                    'mandate_transaction_schedule.mts_is_active'=>1,
                    'mandate_transaction_schedule.mts_is_deleted'=>0
                );

         
              $optionCount = array(
                'select' => 'mandate_customers.*,mandate_transaction_schedule.*',
                // 'select' => 'mandate_customers.*,mandate_transaction_schedule.*,enach_banks.*,bank_branches.branch_name',
                'table' => 'mandate_transaction_schedule',
                'left_join' => array(
                    array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id')
                ),
                // 'where' => $condition,
                'custom_where2'=> $condition,
                'custom_where3' => $orCondition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
             );

              $numRows = $this->Crud_model->commonGet_count($optionCount);
                 $this->response([
                      "status" => TRUE,
                      "message" => "User Loaded Successfully.",
                      "data"=>$users_row,
                      "count_row"=>$count_row,
                      "total_rows" => $numRows,
                      "draw"=> intval($draw),
                      "recordsTotal"=>$numRows,
                      "recordsFiltered"=>$numRows,  
    
                  ], REST_Controller::HTTP_OK); 
        
         } 
           else {
                $this->response([
                  'status' => FALSE,
                   "message" => "User Not Found. Please add User.",
                    "data"=>NULL,
                   "total_rows" =>0,
                   "draw"=> intval($draw),
                   "recordsTotal"=>0,
                   "recordsFiltered"=>0,  
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
             }
    }

    ///export
    public function exportscheduleDetails_get($value='')
    {
     
        $searchText = $this->security->xss_clean($this->get("searchText"));
        $mandate_customer_id = $this->security->xss_clean($this->get("mandate_customer_id"));

        // $draw = $this->security->xss_clean($this->get("length"));
     
        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_transaction_schedule.mts_id' => 'ASC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        // $condition_emi_end_date = array();
        // $condition_mandate_register_date = array();

        $searchCondition = array();
        $columnProperties   =   $this->security->xss_clean($this->get("columnProperties")); 
        foreach ($columnProperties as $index => $column) {
            
            $columnSearchValue = $column['search']['value']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column

             if($index==$order_column && $columnData!=null){
                
                $order_column_name = $column['data'];
                $order_column_name='mandate_transaction_schedule.'.$order_column_name;
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
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate.' 00:00:00',
                                        $table_column_name.' <' => $toDate.' 23:59:59',
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_emi_start_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_emi_start_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_emi_start_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                       

                        else{

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

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

    
           $condition = array(
            'mandate_transaction_schedule.mts_customer_id'=> $mandate_customer_id,
            'mandate_transaction_schedule.mts_is_active' => 1,
            'mandate_transaction_schedule.mts_is_deleted' => 0,
    
          );

          $orCondition = array(

            'mandate_transaction_schedule.mts_customer_id'=> $mandate_customer_id,
            'mandate_transaction_schedule.mts_has_cancelled'=>1,
            'mandate_transaction_schedule.mts_is_active'=> 0,
            'mandate_transaction_schedule.mts_is_deleted' => 1,

    
          );
           
          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
    
        if ($searchText) {
            $searchCondition = array(
                'mandate_transaction_schedule.mts_datetime LIKE' => '%' . $searchText . '%',
                
                'mandate_transaction_schedule.mts_amount LIKE' => '%' . $searchText . '%',
                
                'mandate_transaction_schedule.mts_status_message LIKE' => '%' . $searchText . '%',
            );
        }

    
            $option = array(
                'select' => 'mandate_customers.*,mandate_transaction_schedule.*',
                'table' =>'mandate_transaction_schedule',
                'left_join' => array(
                array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id')

            ),

            'or_where' => $searchCondition,
            'custom_where2'=> $condition,
            'custom_where3' => $orCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
         
             );

        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$users_row,
                     
                      ], REST_Controller::HTTP_OK); 
        
               } else {
         $this->response([
                      'status' => FALSE,
                       "message" => "User Not Found. Please add User.",
                       
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
       }
  }
    
    public function index_get($page='')
    
    {
    
        $searchText = $this->security->xss_clean($this->get("searchTextStaff"));

        $condition = array(
               'users.is_active' => 1,
               'users.is_deleted' => 0,
               'users.is_verified' => 1
           );

          if($searchText){

    
           $searchCondition=array(
               
              
              'CONCAT(users.firstname," ", users.middlename," ", users.lastname) LIKE'=> '%'.$searchText.'%',
               // 'users.firstname LIKE'=> '%'.$searchText.'%',
               // 'users.middlename LIKE'=> '%'.$searchText.'%',
               // 'users.lastname LIKE'=> '%'.$searchText.'%',
               'users.phone LIKE'=> '%'.$searchText.'%',
              'designations.designation_name LIKE'=> '%'.$searchText.'%',
               
           
            );

      
          }
        if($page!=''){
            $limit = 10;
            $offset = ($page - 1) * $limit;
      }
      else{
          $limit = 10000000000;
          $offset =0;
      }

            $option = array(
                'select'=> 'users.*,user_group.group_id,user_group.user_id,designations.designation_name,designations.id,banks.*,bank_branches.branch_name',
                'table' =>'users',
                //'left_join'  => array(array('user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id','bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id','banks' => 'banks.bank_id = users.organization_id')),

                'join'  => array(array('user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id','bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id','banks' => 'banks.bank_id = users.organization_id')),
                'where' =>array('users.is_active' => 1,'users.is_deleted' => 0,'users.is_verified' => 1,
                                // 'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
                                'banks.bank_id' => $this->session->userdata('organization_id'),'banks.is_active' => 1,'banks.is_deleted' => 0,'banks.is_verified' => 1),
                
                'order'=>array('users.id'=>'ASC'),
                'limit'=>array($limit=>$offset),
                // add condition for show selected branches
                'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
                'or_where' =>  $searchCondition,



             );

             $users_row=$this->Crud_model->commonGet($option);

              if($users_row){
                   foreach ($users_row as $key => $value) {
                      $value->orgnization_name =  $value->bank_name.' ('.$value->bank_address.')';
                      $value->emp_type = "Bank";
                  }
              }

       $users_row= array_values($users_row);

       if($users_row){
        $conNumRows['conditions'] = array(
                              
            'users.is_active' => 1,'users.is_deleted' => 0,'users.is_verified' => 1,
             // 'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
             // 'banks.bank_id' => $this->session->userdata('organization_id'),'banks.is_active' => 1,'banks.is_deleted' => 0,'banks.is_verified' => 1
         );
         $searchCondition=array(
               
              
            'CONCAT(users.firstname," ", users.middlename," ", users.lastname) LIKE'=> '%'.$searchText.'%',
             // 'users.firstname LIKE'=> '%'.$searchText.'%',
             // 'users.middlename LIKE'=> '%'.$searchText.'%',
             // 'users.lastname LIKE'=> '%'.$searchText.'%',
             'users.phone LIKE'=> '%'.$searchText.'%',
            'designations.designation_name LIKE'=> '%'.$searchText.'%',
             
         
          );
          $optionCount = array(
            'select'=> 'users.*,user_group.group_id,user_group.user_id,designations.designation_name,designations.id,banks.*,bank_branches.branch_name',
            'table' =>'users',
            //'left_join'  => array(array('user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id','bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id','banks' => 'banks.bank_id = users.organization_id')),

            'join'  => array(array('user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id','bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id','banks' => 'banks.bank_id = users.organization_id')),
            'where' =>array('users.is_active' => 1,'users.is_deleted' => 0,'users.is_verified' => 1,
                            // 'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
                            'banks.bank_id' => $this->session->userdata('organization_id'),'banks.is_active' => 1,'banks.is_deleted' => 0,'banks.is_verified' => 1),
            
            'order'=>array('users.id'=>'ASC'),
            // 'limit'=>array($limit=>$offset),
            // add condition for show selected branches
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
            'or_where' =>  $searchCondition,



         );



        $numRows = $this->Crud_model->commonGet_count($optionCount);

          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$users_row,
                          "total_rows" => $numRows,

                      ], REST_Controller::HTTP_OK); 
       }
       else{
         $this->response([
                      'status' => FALSE,
                      "message" => "User Not Found.Please add User."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
       }
    }


 public function resetNewPassword_post($value='') {
        // Clean and retrieve the ID from the POST data
        $user_id = $this->security->xss_clean($this->post("user_id"));
        $password = $this->security->xss_clean($this->post("password"));

        if (!empty($user_id) && !empty($password)) {
            // Define conditions to find the document by its ID
            $con['conditions'] = array(
                'id' => $user_id,
                'is_active'  => 1,
                'is_deleted' => 0
            );

            // Data to update (mark document as deleted)
            $password = password_hash($password,PASSWORD_DEFAULT);

            $data = array(
                'password' => $password,
            );

            // Update the document
            if ($this->Crud_model->update('users', $data, $con)) {
                // Set the response for successful deletion
                $this->response([
                    "status" => TRUE,
                    "message" => "Password Set successfully.",
               ], REST_Controller::HTTP_OK);
            
            } else {
                // Set the response for failure to delete
                $this->response([
                    'status' => FALSE,
                    "message" => "Failed to reset password."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // Set the response for invalid data
            $this->response([
                'status' => FALSE,
                "message" => "Invalid data."
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function user_otp_post($value='') {
        // Clean and retrieve the ID from the POST data
        $user_id = $this->security->xss_clean($this->post("user_id"));

        if (!empty($user_id)) {
            // Define conditions to find the document by its ID
            $con['conditions'] = array(
                'id' => $user_id,
                'is_active' => 1,
                'is_deleted' => 0
            );

            // Data to update (mark document as deleted)

            $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

            $data = array(
               'otp' => $otp,
               'otp_expiry_time' => date('Y-m-d H:i:s'),
            );

            // Update the document
            if ($this->Crud_model->update('users', $data, $con)) {
                // Set the response for successful deletion
                $this->response([
                    "status" => TRUE,
                    "otp_expiry" => date('Y-m-d H:i:s'),
                    "message" => "OTP Sent successfully.",
                   
                ], REST_Controller::HTTP_OK);
            } else {
                // Set the response for failure to delete
                $this->response([
                    'status' => FALSE,
                    "message" => "Failed to add otp."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // Set the response for invalid data
            $this->response([
                'status' => FALSE,
                "message" => "Invalid data."
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    

    public function showMandateUsersList_get($page = '')
    {
    
        $searchText = $this->security->xss_clean($this->get("search"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
        // $draw = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_customers.mandate_customer_id' => 'DESC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_mandate_register_date = array();

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
    
                        if($columnData=="amount"){
                             
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

                        else  if($columnData=="customer_start_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_start_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }

                        else  if($columnData=="customer_end_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_end_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_end_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);
                                            
                                      $condition_emi_end_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_end_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }
                        
                        else  if($columnData=="mandate_register_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate   = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_mandate_register_date = array(
                                        $table_column_name.' >=' => $fromDate.' 00:00:00',
                                        $table_column_name.' <=' => $toDate.' 23:59:59',
                                    );

                                    // print_r($condition_mandate_register_date);
                                    // die();
                                }



                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_mandate_register_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else{

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="amount" && $columnData!="customer_start_date" && 
                                     $columnData!="customer_end_date"  && $columnData!="mandate_register_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }

    
          $condition = array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
           'mandate_customers.mandate_status_message !=' => NULL,
          );
           
          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
          $condition = array_merge($condition_emi_end_date, $condition);
          $condition = array_merge($condition_mandate_register_date, $condition);



        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_code LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_name LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.commission_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.consumer_ID LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_email LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.mandate_status_message LIKE' => '%' . $searchText . '%',
            );
        }



    
            $option = array(
            'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' =>'mandate_customers',
            'left_join' => array(
                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            'limit' => array($length => $start),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );


        // echo "<pre>";
        // print_r($option);
        // die();    
        // $numRows = $this->Crud_model->commonGet_count($option);
        // $users_row = $this->Crud_model->commonGet($option);
        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

                $conNumRows['conditions'] = array(
                                      
                    'mandate_customers.is_active' => 1,
                    'mandate_customers.is_deleted' => 0
              );

            //   $searchCondition = array(
            //     'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
            //     'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
            // );

              $optionCount = array(
                'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' => 'mandate_customers',
                'left_join' => array(
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'where' => $condition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
                // 'limit' => array($limit => $offset),
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

   public function showCanceledMandateUsersList_get($page = '')
    {
    
        $searchText = $this->security->xss_clean($this->get("search"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
        // $draw = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_customers.mandate_customer_id' => 'DESC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_mandate_register_date = array();

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
    
                        if($columnData=="amount"){
                             
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

                        else  if($columnData=="customer_start_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_start_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }

                        else  if($columnData=="customer_end_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_end_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_end_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);
                                            
                                      $condition_emi_end_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_end_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }
                        
                        else  if($columnData=="mandate_register_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate   = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_mandate_register_date = array(
                                        $table_column_name.' >=' => $fromDate.' 00:00:00',
                                        $table_column_name.' <=' => $toDate.' 23:59:59',
                                    );

                                    // print_r($condition_mandate_register_date);
                                    // die();
                                }



                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_mandate_register_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else{

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="amount" && $columnData!="customer_start_date" && 
                                     $columnData!="customer_end_date"  && $columnData!="mandate_register_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }

    
          $condition = array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'mandate_customers.mandate_status_message !=' => NULL,
            'mandate_customers.mandate_customer_canceled'=> 1,
          );
           
          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
          $condition = array_merge($condition_emi_end_date, $condition);
          $condition = array_merge($condition_mandate_register_date, $condition);



        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_code LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_name LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.commission_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.consumer_ID LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_email LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.mandate_status_message LIKE' => '%' . $searchText . '%',
            );
        }



    
            $option = array(
            'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' =>'mandate_customers',
            'left_join' => array(
                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            'limit' => array($length => $start),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );


        // echo "<pre>";
        // print_r($option);
        // die();    
        // $numRows = $this->Crud_model->commonGet_count($option);
        // $users_row = $this->Crud_model->commonGet($option);
        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

                $conNumRows['conditions'] = array(
                                      
                    'mandate_customers.is_active' => 1,
                    'mandate_customers.is_deleted' => 0
              );

            //   $searchCondition = array(
            //     'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
            //     'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
            // );

              $optionCount = array(
                'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' => 'mandate_customers',
                'left_join' => array(
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'where' => $condition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
                // 'limit' => array($limit => $offset),
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


  public function exportMandateDetails_get($value='')
  {
     
        $searchText = $this->security->xss_clean($this->get("searchText"));
        $columnProperties = $this->security->xss_clean($this->get("columnProperties"));

        $order_array=array('mandate_customers.mandate_customer_id' => 'DESC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_mandate_register_date = array();

        $searchCondition = array();
                   
        foreach ($columnProperties as $index => $column) {
            
            $columnSearchValue = $column['searchValue']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column
           
            // Check if a search value is provided for the current column
            if (!empty($columnSearchValue)) {
                       
                        $filteredConditions = array();
    
                        if($columnData=="amount"){
                             
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

                        else  if($columnData=="customer_start_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_start_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }

                        else  if($columnData=="customer_end_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_end_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_end_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);
                                            
                                      $condition_emi_end_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_end_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }
                        
                        else  if($columnData=="mandate_register_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("d-m-Y", strtotime($fromDate));
                                    $toDate   = date("d-m-Y", strtotime($toDate));
                           
                                    $condition_mandate_register_date = array(
                                        $table_column_name.' >' => $fromDate.' 00:00:00',
                                        $table_column_name.' <' => $toDate.' 23:59:59',
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("d-m-Y", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("d-m-Y", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("d-m-Y", strtotime($columnSearchValue));

                                $condition_mandate_register_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else{

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="amount" && $columnData!="customer_start_date" && 
                                     $columnData!="customer_end_date"  && $columnData!="mandate_register_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }

    
          $condition = array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'mandate_customers.mandate_status_message !=' => NULL,
          );
           
          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
          $condition = array_merge($condition_emi_end_date, $condition);
          $condition = array_merge($condition_mandate_register_date, $condition);



        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_code LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_name LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.commission_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.consumer_ID LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_email LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.mandate_status_message LIKE' => '%' . $searchText . '%',
            );
        }

            $option = array(
            'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' =>'mandate_customers',
            'left_join' => array(
                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            // 'limit' => array($length => $start),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );


        // echo "<pre>";
        // print_r($option);
        // die();    
        // $numRows = $this->Crud_model->commonGet_count($option);
        // $users_row = $this->Crud_model->commonGet($option);
        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$users_row,
                        
                      ], REST_Controller::HTTP_OK); 
        
               } else {
         $this->response([
                      'status' => FALSE,
                       "message" => "User Not Found. Please add User.",
                       
            ], REST_Controller::HTTP_OK);
       }
  }


    public function showPendingMandateUsersList_get($page = '')
    {
    
        $searchText = $this->security->xss_clean($this->get("search"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
        // $draw = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_customers.mandate_customer_id' => 'DESC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_mandate_register_date = array();

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
    
                        if($columnData=="amount"){
                             
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

                        else  if($columnData=="customer_start_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_start_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }

                        else  if($columnData=="customer_end_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_end_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_end_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);
                                            
                                      $condition_emi_end_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_end_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }
                        
                        else  if($columnData=="mandate_register_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate   = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_mandate_register_date = array(
                                        $table_column_name.' >=' => $fromDate.' 00:00:00',
                                        $table_column_name.' <=' => $toDate.' 23:59:59',
                                    );

                                    // print_r($condition_mandate_register_date);
                                    // die();
                                }



                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("Y-m-d", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("Y-m-d", strtotime($columnSearchValue));

                                $condition_mandate_register_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else{

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="amount" && $columnData!="customer_start_date" && 
                                     $columnData!="customer_end_date"  && $columnData!="mandate_register_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }

    
          $condition = array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'mandate_customers.mandate_status_message'=>NULL,
            'bank_branches.is_active' => 1,
            'bank_branches.is_deleted' => 0,
          );
          
           // $searchCondition_filter_n = array(
           //      
           //  );

           // $filteredConditions[$key] = $searchCondition_filter_n;
           // $final_columnSearchValue [] =  $filteredConditions;

          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
          $condition = array_merge($condition_emi_end_date, $condition);
          $condition = array_merge($condition_mandate_register_date, $condition);



        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_code LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_name LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.commission_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.consumer_ID LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_email LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.mandate_status_message LIKE' => '%' . $searchText . '%',
                      
            );
        }

    
            $option = array(
            'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' =>'mandate_customers',
            'left_join' => array(
                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            'limit' => array($length => $start),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );



        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

                $conNumRows['conditions'] = array(
                                      
                    'mandate_customers.is_active' => 1,
                    'mandate_customers.is_deleted' => 0
              );


              $optionCount = array(
                'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' => 'mandate_customers',
                'left_join' => array(
                    array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                    array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
                ),
                'where' => $condition,
                'or_where' => $searchCondition,
                'filters' => $final_columnSearchValue,
                'order' => $order_array,
                // 'limit' => array($limit => $offset),
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


  public function exportPendingMandateDetails_get($value='')
  {
     
        $searchText = $this->security->xss_clean($this->get("searchText"));
        $columnProperties = $this->security->xss_clean($this->get("columnProperties"));

        $order_array=array('mandate_customers.mandate_customer_id' => 'DESC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        $condition_emi_end_date = array();
        $condition_mandate_register_date = array();

        $searchCondition = array();
                   
        foreach ($columnProperties as $index => $column) {
            
            $columnSearchValue = $column['searchValue']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column
           
            // Check if a search value is provided for the current column
            if (!empty($columnSearchValue)) {
                       
                        $filteredConditions = array();
    
                        if($columnData=="amount"){
                             
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

                        else  if($columnData=="customer_start_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_start_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }

                        else  if($columnData=="customer_end_date"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                                if (count($rangeValues) == 2) {
                                    $fromDate = $rangeValues[0];
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_end_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_end_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);
                                            
                                      $condition_emi_end_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_end_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }
                        
                        else  if($columnData=="mandate_register_datetime"){
                             
                             if (strpos($columnSearchValue,'between') !== false) {

                                $rangeValues = explode('between', $columnSearchValue);
                               
                                if (count($rangeValues) == 2) {

                                    $fromDate = $rangeValues[0];
                                    $toDate   = $rangeValues[1];

                                    $fromDate = date("d-m-Y", strtotime($fromDate));
                                    $toDate   = date("d-m-Y", strtotime($toDate));
                           
                                    $condition_mandate_register_date = array(
                                        $table_column_name.' >' => $fromDate.' 00:00:00',
                                        $table_column_name.' <' => $toDate.' 23:59:59',
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                    $date = date("d-m-Y", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' <' => $date.' 00:00:00',
                                    );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                    $date = date("d-m-Y", strtotime($date));

                                    $condition_mandate_register_date = array(
                                         $table_column_name.' >' => $date.' 23:59:59',
                                    );
                             }
                             else{

                                $date = date("d-m-Y", strtotime($columnSearchValue));

                                $condition_mandate_register_date = array(
                                    $table_column_name.' >=' => $date.' 00:00:00',
                                    $table_column_name.' <=' => $date.' 23:59:59',
                                );
                             }
                            
                        }

                        else{

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                            foreach ($searchCondition_filter as $key => $value) {
                                        // Check if the key contains the string specified in $columnData
                                  if($columnData!="amount" && $columnData!="customer_start_date" && 
                                     $columnData!="customer_end_date"  && $columnData!="mandate_register_datetime"){

                                        if (strpos($key, $columnData) !== false) {
                                            $filteredConditions[$key] = $value;
                                        }  

                                  }
                            
                            } 

                            $final_columnSearchValue [] =  $filteredConditions;
                           
                        }
                        
             }
           
        }

    
          $condition = array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'mandate_customers.mandate_status_message'=>NULL
          );
           
          
        $condition = array_merge($condition_amount, $condition);
        $condition = array_merge($condition_emi_start_date, $condition);
        $condition = array_merge($condition_emi_end_date, $condition);
        $condition = array_merge($condition_mandate_register_date, $condition);

        if ($searchText) {
            $searchCondition = array(
                'mandate_customers.customer_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_mobile_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.account_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_code LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_account_no LIKE' => '%' . $searchText . '%',
                'mandate_customers.bank_name LIKE' => '%' . $searchText . '%',
                'bank_branches.branch_name LIKE' => '%' . $searchText . '%',
                'mandate_customers.commission_amount LIKE' => '%' . $searchText . '%',
                'mandate_customers.consumer_ID LIKE' => '%' . $searchText . '%',
                'mandate_customers.customer_email LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_name LIKE' => '%' . $searchText . '%',
                'enach_banks.enach_bank_type LIKE' => '%' . $searchText . '%',
                'mandate_customers.mandate_status_message LIKE' => '%' . $searchText . '%',
            );
        }

            $option = array(
            'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',
                'table' =>'mandate_customers',
            'left_join' => array(
                array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            // 'limit' => array($length => $start),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );


        // echo "<pre>";
        // print_r($option);
        // die();    
        // $numRows = $this->Crud_model->commonGet_count($option);
        // $users_row = $this->Crud_model->commonGet($option);
        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$users_row,
                        
                      ], REST_Controller::HTTP_OK); 
        
               } else {
         $this->response([
                      'status' => FALSE,
                       "message" => "User Not Found. Please add User.",
                       
            ], REST_Controller::HTTP_OK);
       }
  }

    public function insertUserByOrganizationType_post($value='')
      
        {
          
            $organization_type      = $this->security->xss_clean($this->post("organization_type"));
            
    
            if($organization_type=="bank"){


                $first_name   = $this->security->xss_clean($this->post("bank_user_first_name"));
            $middlename = $this->security->xss_clean($this->post("bank_user_middlename"));

                $lastname     = $this->security->xss_clean($this->post("bank_user_lastname"));
                $email        = $this->security->xss_clean($this->post("bank_user_email"));
                $phone        = $this->security->xss_clean($this->post("bank_user_phone"));
                $username     = $this->security->xss_clean($this->post("bank_user_username"));
                $address     = $this->security->xss_clean($this->post("bank_user_address"));
                $gender       = $this->security->xss_clean($this->post("bank_user_gender"));
                $desigation_id          = $this->security->xss_clean($this->post("bank_desigation_id"));
            // password
            $password     = $this->security->xss_clean($this->post("bank_user_password"));

            //permission
            $permission = $this->security->xss_clean($this->post("permission"));
            $permission_branch=NULL;
            $sub_org_id = NULL;

                // if($this->security->xss_clean($this->post("bank_branch_id"))){
                //     $sub_org_id  = $this->security->xss_clean($this->post("bank_branch_id"));
                // $conBranchCheck['conditions'] = array(
                //     'branch_id' => $sub_org_id,
                //     'is_active' => 1,
                //     'is_deleted' => 0,
                // );
                if($this->security->xss_clean($this->post("branch_id"))){
                    $sub_org_id  = $this->security->xss_clean($this->post("branch_id"));
                $conBranchCheck['conditions'] = array(
                    'branch_id' => $sub_org_id,
                    'is_active' => 1,
                    'is_deleted' => 0,
                );
    
                if ($branch_row = $this->Crud_model->getRows('bank_branches', $conBranchCheck, 'row')) {
                      $permission_branch[]=array(
                        "name" => $branch_row->branch_name,
                        "branch_id" => $sub_org_id, 
                        'is_active' => 1,
                        'is_deleted' => 0,
    
                      ); 
    
                      $permission_branch=json_encode($permission_branch);                 
                }
                }
                else{
                    $sub_org_id          = NULL;
                }
                $org_id=$this->security->xss_clean($this->post("bank_id"));
                $is_govt_emp="N";
                $is_bank_emp="Y";

            }
            
          

            if (
                    !empty($organization_type) && !empty($first_name) && !empty($phone) && 
                    !empty($username) && !empty($org_id) && !empty($desigation_id) 
               )  

             {
                        $conPhoneCheck['conditions'] = array(
                              'phone'       => $phone,
                              'is_active'   =>1,
                              'is_deleted'  =>0,
                        );
       
                        if($phone_row=$this->Crud_model->getRows('users',$conPhoneCheck,'row')){
                                $this->response([
                                      'status' => FALSE,
                                      "message" => "Entered Mobile no. already exist.Please change user mobile no."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                        }

                        else{

                               $conUsernameCheck['conditions'] = array(
                                  'username' => $username,
                                  'is_active'=>1,
                                  'is_deleted'=>0,
                                     //  'id!='=>$user_row->id
                              );  
                             
                            if($username_row=$this->Crud_model->getRows('users',$conUsernameCheck,'row')){

                                  $this->response([
                                      'status' => FALSE,
                                      "message" => "Entered Username. already exist.Please change username."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                        } else {
                            $condesignation['conditions'] = array(
                                'id' => $desigation_id,
                                'is_active' => 1,
                                'is_deleted' => 0
                            );

                            if ($designation_row = $this->Crud_model->getRows('designations', $condesignation, 'row')) {

                                    $data = array(
                                          'username'        => $username,
                                          'email'           => $email,
                                          'gender'          => $gender,
                                    'password'        => password_hash($password,PASSWORD_DEFAULT),
                                    // 'password'        => $password,
                                          'firstname'       => $first_name,
                                    'middlename' => $middlename,
                                          'lastname'        => $lastname,
                                          'phone'           => $phone,
                                          'address'         => $address,
                                          'organization_id' => $org_id,
                                          'is_verified'     => 1,
                                          'is_active'       => 1,
                                          'is_deleted'      => 0,
                                          'otp'             => NULL,
                                          'is_govt_emp'     => $is_govt_emp,
                                          'is_bank_emp'     => $is_bank_emp,
                                          'sub_organization_branch_id'     => $sub_org_id,
                                    'permission' => $designation_row->permission,
                                    'permission_branch' => $permission_branch,
                                    );           
                               
                                    if($u_row=$this->Crud_model->insert('users',$data)){

                                            $group_data = array(
                                                'user_id' => $u_row,
                                                'group_id' => $desigation_id
                                            );
                                            
                                            $group_data_row = $this->Crud_model->insert('user_group', $group_data);
                                               
                                                $this->response([
                                                      "status" => TRUE,
                                        "message" => "Users added successfully.",
                                                      "data"=>$u_row
                                                  ], REST_Controller::HTTP_OK);
                                } else {
                                        $this->response([
                                              'status' => FALSE,
                                        "message" => "Users not added."
                                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
                            } else {
                                $this->response([
                                    'status' => FALSE,
                                    "message" => "Invalid designation ID."
                                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }
                        }
             }
                } else {
                     $this->response([
                              'status' => FALSE,
                        "message" => "Please fill complete information."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
             }


//branch
        public function showBranch_get($value = '')
{
    $option = array(
        'select' => 'bank_branches.*',
        'table' => 'bank_branches',
        'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))
    );

    $lead_Branch_result = $this->Crud_model->commonGet($option);

    if ($lead_Branch_result) {
        $lead_Branch_name = array_column($lead_Branch_result, 'branch_name');
        array_multisort($lead_Branch_name, SORT_DESC, $lead_Branch_result);

        $this->response([
            "status" => TRUE,
            "message" => "Loaded Successfully.",
            "data" => $lead_Branch_result
        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Branch Not Found. Please add branch.",
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
        }

      public function row_get($value='')
            {
                // code...
                 $id = $this->security->xss_clean($this->get("id"));
                 if(!empty($id)){

                     $option = array(
                'select'=> 'users.*,user_group.group_id,user_group.user_id,designations.designation_name,designations.id,banks.*',
                'table' =>'users',
                'join'  => array(array('user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id','banks' => 'banks.bank_id = users.organization_id')),
                'where' =>array('users.is_active' => 1,'users.is_deleted' => 0,
                    'users.is_verified' => 1,
                    'users.id' => $id,
                    'banks.bank_id' => $this->session->userdata('organization_id'),'banks.is_active' => 1,'banks.is_deleted' => 0,'banks.is_verified' => 1),
                'single'=>TRUE
             );

           

                    if($users_row=$this->Crud_model->commonGet($option)){


                      $this->response([
                                      "status" => TRUE,
                                      "message" => "Users Loaded Successfully.",
                                      "data"=>$users_row,
                                  ], REST_Controller::HTTP_OK); 
                   }
                   else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "User Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   }



                 }
                 else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "User Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }
               
            }

       public function update_post($value='')
            {
    // Clean and retrieve necessary data
                $id = $this->security->xss_clean($this->post("id"));

                $organization_type      = $this->security->xss_clean($this->post("organization_type"));
                    $first_name   = $this->security->xss_clean($this->post("bank_user_first_name"));
                    $middlename     = $this->security->xss_clean($this->post("bank_user_middlename"));

                    $lastname     = $this->security->xss_clean($this->post("bank_user_lastname"));
                    $email        = $this->security->xss_clean($this->post("bank_user_email"));
                    $phone        = $this->security->xss_clean($this->post("bank_user_phone"));
                    $username     = $this->security->xss_clean($this->post("bank_user_username"));
                    $password     = $this->security->xss_clean($this->post("bank_user_password"));
                    $address     = $this->security->xss_clean($this->post("bank_user_address"));
                    $gender       = $this->security->xss_clean($this->post("bank_user_gender"));
          
                    $bank_id       = $this->security->xss_clean($this->post("bank_id"));
                  
                    $branch_id       = $this->security->xss_clean($this->post("branch_id"));
                    
                    $bank_desigation_id       = $this->security->xss_clean($this->post("bank_desigation_id"));
    $permission = $this->security->xss_clean($this->post("permission"));
    $permission_branch = NULL;
    $sub_org_id = NULL;
             
    // Check if bank branch ID is provided
    if ($this->security->xss_clean($this->post("branch_id"))) {
        $sub_org_id = $this->security->xss_clean($this->post("branch_id"));
                
        // Fetch branch details from the database
        $conBranchCheck['conditions'] = array(
            'branch_id' => $sub_org_id,
            'is_active' => 1,
            'is_deleted' => 0,
        );
               
        if ($branch_row = $this->Crud_model->getRows('bank_branches', $conBranchCheck, 'row')) {
            // Prepare permission branch array
            $permission_branch = array(
                array(
                    "name" => $branch_row->branch_name,
                    "branch_id" => $sub_org_id,
                    'is_active' => 1,
                    'is_deleted' => 0,
                )
            );
               
            // Encode permission branch array
            $permission_branch = json_encode($permission_branch);
        }
    }

    // Check if user ID and username are provided
    if (!empty($id) && !empty($username))  {
                     $conGroup['conditions'] = array(
                                  'id' => $id,
                                  'is_active' => 1,
                                  'is_deleted' => 0
                    ); 

                    if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){
            // Prepare data for user update
                        $data = array(
                          'username' => $username,
                          'address'  => $address,
                          'email'    => $email,
                          'phone'    => $phone,
                          'firstname'=> $first_name,
                          'middlename' => $middlename,
                          'lastname' => $lastname,
                          'gender'   => $gender,
                          'password'   => password_hash($password,PASSWORD_DEFAULT),
                          'organization_id' => $bank_id,
                          'sub_organization_branch_id' => $branch_id,
                // 'permission' => $designation_row->permission,
                'permission_branch' => $permission_branch,
                        );
                     
            $branches_row=$this->Crud_model->update($this->table,$data,$conGroup);

            $conDesignation['conditions'] = array(
                            'user_id' => $id,
                         ); 

            $dataDesignation = array(
                'group_id' => $bank_desigation_id,
                        );
                                                
            $designation_row=$this->Crud_model->update('user_group',$dataDesignation,$conDesignation);

              if($branches_row || $designation_row){


                                $this->response([
                                      "status" => TRUE,
                                      "message" => "User updated successfully.",
                                      "data"=>$branches_row
                                  ], REST_Controller::HTTP_OK);
                    
                          }
                          else{
                              // Set the response and exit
                            $this->response([
                                  'status' => FALSE,
                                  "message" => "User not updated ."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                              
                          }

                    }
                   
                    else{
                                $this->response([
                                  'status' => FALSE,
                                  "message" => "Previous User Not Found.Please try again."],
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


     public function skipTransactionSchedule_post($value='')
            {
                $mts_skipped_reason = $this->security->xss_clean($this->post("mts_skipped_reason"));

                $mts_skip_transaction_id      = $this->security->xss_clean($this->post("mts_skip_transaction_id"));

                $mts_id   = $this->security->xss_clean($this->post("mts_id"));
                
           
                 if (!empty($mts_id))  {

                     $conGroup['conditions'] = array(
                          'mts_id' => $mts_id,
                          'mts_is_active' => 1,
                          'mts_is_deleted' => 0
                    ); 

                    if($groups_row=$this->Crud_model->getRows('mandate_transaction_schedule',$conGroup,'row')){
                        
                        $data = array(
                          'mts_skipped_reason' => $mts_skipped_reason,
                          'mts_skip_transaction_id'  => $mts_skip_transaction_id,
                          'mts_is_skipped'  => 1,
                       );
                     
                     if($branches_row=$this->Crud_model->update('mandate_transaction_schedule',$data,$conGroup)){
                                          // Set the response and exit
                                $this->response([
                                      "status" => TRUE,
                                      "message" => "Schedule Skipped successfully.",
                                      "data"=>$branches_row
                                  ], REST_Controller::HTTP_OK);
                        
                              }
                              else{
                                  // Set the response and exit
                                $this->response([
                                      'status' => FALSE,
                                      "message" => "Schedule not Skipped ."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                  
                              }

                    }
                   
                    else{
                                $this->response([
                                  'status' => FALSE,
                                  "message" => "Schedule  Not Found.Please try again."],
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
                          'id' => $id,
                          'is_active' => 1,
                          'is_deleted' => 0
                      
                      );
                $data = array('is_deleted' => 1 ,'is_active'=>0);

                 if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
                              // Set the response and exit
                    $this->response([
                          "status" => TRUE,
                          "message" => "User delete successfully.",
                          "data"=>$branches_row
                      ], REST_Controller::HTTP_OK);
            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "User not delete ."],
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


    
    public function insertMandateVerifyLink_post($value = '') {
        $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
    
        if (!empty($mandate_customer_id)) {
            
            //  http://localhost:81/enach/Customer/CustomerSelf/%%|link^{"inputtype" : "text", "maxlength" : "30"}%% 
          
            $random_code =substr(md5(uniqid(rand(), true)), 0, 6);

            $customer_url = 'C/'.$random_code;

            // $base_url="http://".$_SERVER['HTTP_HOST'].base_url();
            $base_url=$_SERVER['HTTP_HOST'].base_url();
           
            $transaction_link = $base_url.$customer_url.' '; 

            // Check if mandate exists
            $conGroup['conditions'] = array(
                'mandate_customer_id' => $mandate_customer_id,
                'is_active' => 1,
                'is_deleted' => 0
            );
    
            $existing_data = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row');
    
            if ($existing_data) {
                $expiration_time = date('Y-m-d H:i:s', strtotime('+15 minutes'));
    
                // Update the transaction link and expiration time
                $data = array(
                    'random_code' => $random_code,
                    'transaction_link' => $transaction_link,
                    'transaction_page_expiry_datetime' => $expiration_time
                );
    
                $mandate_updated = $this->Crud_model->update('mandate_customers', $data, $conGroup);

                if ($mandate_updated) {
                    $current_time = date('Y-m-d H:i:s');
                    $expiration_timestamp = strtotime($expiration_time);
                    $current_timestamp = strtotime($current_time);
                    $remaining_seconds = $expiration_timestamp - $current_timestamp;

                    $this->response([
                        "status" => TRUE,
                        "message" => "Transaction link generated and stored successfully.",
                        "transaction_link" => $transaction_link,
                        "transaction_page_expiry_datetime" => $expiration_time,
                        "remaining_time_in_seconds" => $remaining_seconds

                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        "message" => "Failed to update transaction link.",
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            } else {
                // Mandate not found for the provided ID
                $this->response([
                    'status' => FALSE,
                    "message" => "Mandate not found for the provided ID.",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            // Mandate ID not provided
            $this->response([
                'status' => FALSE,
                "message" => "Please provide the mandate_customer_id.",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    public function resendTransactionLink_post() {
        // Fetch the mandate_customer_id from the request
        $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
    
        if (!empty($mandate_customer_id)) {
            // Generate a new transaction link
            $transaction_link = base_url('Customer/CustomerSelf/'.$mandate_customer_id); 
    
            // Update the transaction link in the database
            $data = array(
                'transaction_link' => $transaction_link,
                'transaction_page_expiry_datetime' =>date('Y-m-d H:i:s')

            );
    
            $conGroup['conditions'] = array(
                'mandate_customer_id' => $mandate_customer_id,
                'is_active' => 1,
                'is_deleted' => 0
            );
    
            $mandate_updated = $this->Crud_model->update('mandate_customers', $data, $conGroup);
    
            if ($mandate_updated) {
                $this->response([
                    "status" => TRUE,
                    "message" => "Transaction link regenerated and updated successfully.",
                    "transaction_link" => $transaction_link,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    "message" => "Failed to update transaction link.",
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // Mandate ID not provided
            $this->response([
                'status' => FALSE,
                "message" => "Please provide the mandate_customer_id.",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    
    

    public function mandateCustomerInsert_post($value='')
    {
        $device_ID = $this->security->xss_clean($this->post("device_ID"));
        $payment_mode = $this->security->xss_clean($this->post("payment_mode"));
        $bank_name = $this->security->xss_clean($this->post("bank_name"));
        $merchant_ID = $this->security->xss_clean($this->post("merchant_ID"));
        $consumer_ID = $this->security->xss_clean($this->post("consumer_ID"));
        $customer_name = $this->security->xss_clean($this->post("customer_name"));
        $customer_mobile_no = $this->security->xss_clean($this->post("customer_mobile_no"));
        $customer_email = $this->security->xss_clean($this->post("customer_email"));
          // Adhar card
        $customer_adhar_card = $this->security->xss_clean($this->post("customer_adhar_card"));
        // Pan card
        $customer_pan_card = $this->security->xss_clean($this->post("customer_pan_card"));

        // loan
        $loan_type_id = $this->security->xss_clean($this->post("loan_type_id"));
        // bank_account_no
        $bank_account_no = $this->security->xss_clean($this->post("bank_account_no"));
        $account_no = $this->security->xss_clean($this->post("account_no"));
        $account_type = $this->security->xss_clean($this->post("account_type"));
        $ifsc_code = $this->security->xss_clean($this->post("ifsc_code"));
        //branch
        $branch_id = $this->security->xss_clean($this->post("branch_id"));
        //emi_count
        $emi_count = $this->security->xss_clean($this->post("emi_count"));
        //emi_freqquency
        $emi_frequency = $this->security->xss_clean($this->post("emi_frequency"));
        $customer_start_date = $this->security->xss_clean($this->post("customer_start_date"));
        $customer_end_date = $this->security->xss_clean($this->post("customer_end_date"));
        // EMI Date
        $transactionDate = $this->security->xss_clean($this->post("transactionDate"));
        $txn_ID = $this->security->xss_clean($this->post("txn_ID"));
        $txn_type = $this->security->xss_clean($this->post("txn_type"));
        $txn_sub_type = $this->security->xss_clean($this->post("txn_sub_type"));
        $item_id = $this->security->xss_clean($this->post("item_id"));
        $amount = $this->security->xss_clean($this->post("loanCollectionAmount"));
        $commission_amount = $this->security->xss_clean($this->post("commission_amount"));
        $bank_code = $this->security->xss_clean($this->post("bank_code"));
        $consumer_card_number = $this->security->xss_clean($this->post("consumer_card_number"));
        $consumer_expiry_month = $this->security->xss_clean($this->post("consumer_expiry_month"));
        $consumer_expiry_year = $this->security->xss_clean($this->post("consumer_expiry_year"));
        $consumer_cvv_no = $this->security->xss_clean($this->post("consumer_cvv_no"));
        $document = $this->security->xss_clean($this->post("document"));
        $termsAndConditions = $this->security->xss_clean($this->post("termsAndConditions"));

        $transactionScheduleData = $this->security->xss_clean($this->post("transactionScheduleData"));

        $startdate = new DateTime($customer_start_date);
        $formattedStartDate = $startdate->format('d-m-Y');

        $enddate = new DateTime($customer_end_date);
        $formattedEndDate = $enddate->format('d-m-Y');

        $formattedStartDate =  strval($formattedStartDate);
        $formattedEndDate =  strval($formattedEndDate);

        // Generate inputString
        
        $inputString = $merchant_ID . "|" . $txn_ID . "|" . $amount . "|" . $account_no . "|" . $consumer_ID . "|" . $customer_mobile_no . "|" . $customer_email . "|" . $formattedStartDate . "|" . $formattedEndDate . "|" . $amount . "|M|" . $emi_frequency . "|" . $consumer_card_number . "|" . $consumer_expiry_month . "|" . $consumer_expiry_year . "|" . $consumer_cvv_no . "|2576743890JCNHAM";
    
        $data = array(
          'device_ID' =>$device_ID,
          'payment_mode' =>$payment_mode,
          'bank_name' =>$bank_name,
          'branch_id' =>$branch_id,
          'merchant_ID' =>$merchant_ID,
          'consumer_ID' =>$consumer_ID,
          'customer_name' =>strtoupper($customer_name),
          'customer_mobile_no' =>$customer_mobile_no,
          'customer_email' =>$customer_email,
          'customer_adhar_card' => $customer_adhar_card,
          'customer_pan_card' => $customer_pan_card,
          'bank_account_no' =>$bank_account_no,
          'loan_type_id' => $loan_type_id,
          'account_no' =>$account_no,
          'account_type' =>$account_type,
          'ifsc_code' =>$ifsc_code,
          'emi_frequency' =>$emi_frequency,
          'emi_count' =>$emi_count,
          'customer_start_date' =>$customer_start_date,
          'customer_end_date' =>$customer_end_date,
          'transactionDate' =>$transactionDate,
          'txn_ID' =>$txn_ID,
          'txn_type' =>$txn_type,
          'txn_sub_type' =>$txn_sub_type,
          'item_id' =>$item_id,
          'amount' =>$amount,
          'commission_amount' =>$commission_amount,
          'bank_code' =>$bank_code,
          'consumer_card_number' =>$consumer_card_number,
          'consumer_expiry_month' =>$consumer_expiry_month,
          'consumer_expiry_year' =>$consumer_expiry_year,
          'consumer_cvv_no' =>$consumer_cvv_no,
          'created_by'=> $this->session->userdata('id'),
          'document'=>$document,
          'termsAndConditions'=>$termsAndConditions,
          'inputString' => $inputString,
          'mandate_register_datetime' => date('Y-m-d H:i:s'),
          'transactionScheduleData' => $transactionScheduleData,
        );           
               
         
        if (!empty($_FILES['document']['name'])) {
            $uploadDir = 'uploads/document/';
            $uploadedFileName = uniqid() . '_' . basename($_FILES['document']['name']);
            $uploadedFile = $uploadDir . $uploadedFileName;
        
            if (move_uploaded_file($_FILES['document']['tmp_name'], $uploadedFile)) {
                $data['document'] =  $uploadedFileName;
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error uploading document. Please check file type and size.'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                return;
            }
        }
    
        
    
         if($u_row=$this->Crud_model->insert('mandate_customers',$data)){
            $this->response([
                  "status" => TRUE,
                  "message" => "Customer Mandate Added successfully in Database.",
            "data" => $u_row,
            "inputString" => $inputString
              ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                  'status' => FALSE,
                    "message" => "Error in Customer Mandate Adding in Database. Please verify and resubmit the details."
                  ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }
         
    }

    public function savemandateLog_post($value='')
    {
        $response = $this->security->xss_clean($this->post("response"));
        $customer_mobile_no = $this->security->xss_clean($this->post("customer_mobile_no"));
        $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));

      //  $mandate_register_datetime = $this->security->xss_clean($this->post("mandate_register_datetime"));
        $mandate_status_code = $this->security->xss_clean($this->post("mandate_status_code"));
        $mandate_status_message = $this->security->xss_clean($this->post("mandate_status_message"));
       
        $mandate_identifier = $this->security->xss_clean($this->post("mandate_identifier"));
        $mandate_token = $this->security->xss_clean($this->post("mandate_token"));

        $conEmail['conditions'] = array(
           'customer_mobile_no' => $customer_mobile_no,
           'mandate_customer_id' => $mandate_customer_id,
        );
        $data = array(
             'all_log' => json_encode($response),
         //    'mandate_register_datetime' => date('Y-m-d H:i:s',strtotime($mandate_register_datetime)),
             'mandate_status_code' => $mandate_status_code,
             'mandate_status_message' => $mandate_status_message,
            
             'mandate_identifier' => $mandate_identifier,
             'mandate_token' => $mandate_token,
        );
         
        if($u_row=$this->Crud_model->update('mandate_customers',$data,$conEmail)){
             $this->response([
                  "status" => TRUE,
                  "message" => "Logs Saved",
                  "data"=>$u_row
              ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
              'status' => FALSE,
              "message" => "Error in Saving Log."],
              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

    

    public function mandateCustomerupdate_post($value='')
{
    
    $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
    $device_ID = $this->security->xss_clean($this->post("device_ID"));
    $payment_mode = $this->security->xss_clean($this->post("payment_mode"));
    $bank_name = $this->security->xss_clean($this->post("bank_name"));
    $merchant_ID = $this->security->xss_clean($this->post("merchant_ID"));
    $consumer_ID = $this->security->xss_clean($this->post("consumer_ID"));
    $customer_name = $this->security->xss_clean($this->post("customer_name"));
    $customer_mobile_no = $this->security->xss_clean($this->post("customer_mobile_no"));
    $customer_email = $this->security->xss_clean($this->post("customer_email"));
    $account_no = $this->security->xss_clean($this->post("account_no"));
    $account_type = $this->security->xss_clean($this->post("account_type"));
    $ifsc_code = $this->security->xss_clean($this->post("ifsc_code"));
    // branch_id
    $branch_id = $this->security->xss_clean($this->post("branch_id"));

    // loan
    $loan_type_id = $this->security->xss_clean($this->post("loan_type_id"));
    // bank_account_no
    $bank_account_no = $this->security->xss_clean($this->post("bank_account_no"));
    //emi_count
    $emi_count = $this->security->xss_clean($this->post("emi_count"));
    //emi_freqquency
    $emi_frequency = $this->security->xss_clean($this->post("emi_frequency"));
    $customer_start_date = $this->security->xss_clean($this->post("customer_start_date"));
    $customer_end_date = $this->security->xss_clean($this->post("customer_end_date"));
    // EMI Date
    $transactionDate = $this->security->xss_clean($this->post("transactionDate"));
    $txn_ID = $this->security->xss_clean($this->post("txn_ID"));
    $txn_type = $this->security->xss_clean($this->post("txn_type"));
    $txn_sub_type = $this->security->xss_clean($this->post("txn_sub_type"));
    $item_id = $this->security->xss_clean($this->post("item_id"));
    $amount = $this->security->xss_clean($this->post("loanCollectionAmount"));
    $commission_amount = $this->security->xss_clean($this->post("commission_amount"));
    $bank_code = $this->security->xss_clean($this->post("bank_code"));
    // $document = $this->security->xss_clean($this->post("document"));

    $consumer_card_number = $this->security->xss_clean($this->post("consumer_card_number"));
    $consumer_expiry_month = $this->security->xss_clean($this->post("consumer_expiry_month"));
    $consumer_expiry_year = $this->security->xss_clean($this->post("consumer_expiry_year"));
    $consumer_cvv_no = $this->security->xss_clean($this->post("consumer_cvv_no"));

    $startdate = new DateTime($customer_start_date);
    $formattedStartDate = $startdate->format('d-m-Y');

    $enddate = new DateTime($customer_end_date);
    $formattedEndDate = $enddate->format('d-m-Y');


    $formattedStartDate =  strval($formattedStartDate);
    $formattedEndDate =  strval($formattedEndDate);


    $transactionScheduleData = $this->security->xss_clean($this->post("transactionScheduleData"));

        // Generate inputString
        
    $inputString = $merchant_ID . "|" . $txn_ID . "|" . $amount . "|" . $account_no . "|" . $consumer_ID . "|" . $customer_mobile_no . "|" . $customer_email . "|" . $formattedStartDate . "|" . $formattedEndDate . "|" . $amount . "|M|" . $emi_frequency . "|" . $consumer_card_number . "|" . $consumer_expiry_month . "|" . $consumer_expiry_year . "|" . $consumer_cvv_no . "|2576743890JCNHAM";

    if (!empty($mandate_customer_id) && !empty( $customer_mobile_no)) {
        $conGroup['conditions'] = array(
            'mandate_customer_id' => $mandate_customer_id,
            //'customer_mobile_no' => $customer_mobile_no,
            'is_active' => 1,
            'is_deleted' => 0
        );

        // if ($groups_row = $this->Crud_model->getRows($this->table, $conGroup, 'row')) {
        if ($groups_row = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row')) {

            $data = array(
                // 'mandate_customer_id' => $mandate_customer_id,
                'device_ID' =>$device_ID,
                'payment_mode' =>$payment_mode,
                'bank_name' =>$bank_name,
                'merchant_ID' =>$merchant_ID,
                'consumer_ID' =>$consumer_ID,
                'customer_name' =>$customer_name,
                'customer_mobile_no' =>$customer_mobile_no,
                'customer_email' =>$customer_email,
                // branch_id
                'branch_id' =>$branch_id,
                // loan
                'loan_type_id' =>$loan_type_id,
                // bank_account_no
                'bank_account_no' =>$bank_account_no,
                'account_no' =>$account_no,
                'account_type' =>$account_type,
                'ifsc_code' =>$ifsc_code,
                'emi_frequency' =>$emi_frequency,
                'emi_count' =>$emi_count,
                'customer_start_date' =>$customer_start_date,
                'customer_end_date' =>$customer_end_date,
                'transactionDate' =>$transactionDate,
                'txn_ID' =>$txn_ID,
                'txn_type' =>$txn_type,
                'txn_sub_type' =>$txn_sub_type,
                'item_id' =>$item_id,
                'amount' =>$amount,
                'commission_amount' =>$commission_amount,
                'bank_code' =>$bank_code,
                // 'document' =>$document,
                'consumer_card_number' =>$consumer_card_number,
                'consumer_expiry_month' =>$consumer_expiry_month,
                'consumer_expiry_year' =>$consumer_expiry_year,
                'consumer_cvv_no' =>$consumer_cvv_no,
                'inputString' => $inputString,
                'mandate_register_datetime' => date('Y-m-d H:i:s'),
                'transactionScheduleData' => $transactionScheduleData,


            //    'created_by'=> $this->session->userdata('id'),
            );
            

            // if ($mandate_row = $this->Crud_model->update($this->table, $data, $conGroup)) {
               if ($mandate_row = $this->Crud_model->update('mandate_customers', $data, $conGroup)) {
                $this->response([
                    "status" => TRUE,
                    "message" => "Mandate Updated Successfully.",
                    "data" => $mandate_customer_id
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    "message" => "Mandate Not Updated.",
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }

           

          

        } else {
            $this->response([
                'status' => FALSE,
                "message" => "Previous Mandate Not Found. Please Try Again."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Please Fill Complete Information."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
   
}
// update document only
// public function documentupdate_post($value = '') {
//     // Retrieve form data
//     $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
//     $document = $_FILES['document'];

//     // Check if required fields are not empty
//     if (!empty($mandate_customer_id) && !empty($document)) {
//         // Define conditions to retrieve existing mandate data
//         $conGroup['conditions'] = array(
//             'mandate_customer_id' => $mandate_customer_id,
//             'is_active' => 1,
//             'is_deleted' => 0
//         );

//         // Retrieve existing mandate data
//         $existing_data = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row');

//         if ($existing_data) {
//             // Prepare data to update
//             $data = array(
//                 'mandate_customer_id' => $mandate_customer_id,
//                 // Other fields you may want to update...
//             );

//             // Handle document upload
//             $uploadDir = 'uploads/document/';
//             $uploadedFileName = uniqid() . '_' . basename($document['name']);
//             $uploadedFile = $uploadDir . $uploadedFileName;
            
//             if (move_uploaded_file($document['tmp_name'], $uploadedFile)) {
//                 // Store the relative path to the file in the $data array
//                 $data['document'] = $uploadedFileName;
//                 // Update the mandate data
//                 $data['doc_is_active'] = 1; // Activate the document
//                 $data['doc_is_delete'] = 0; // Mark as not deleted
//                 // Update the mandate data
//                 $mandate_updated = $this->Crud_model->update('mandate_customers', $data, $conGroup);

//                 // Check if mandate update was successful
//                 if ($mandate_updated) {
//                     $this->response([
//                         "status" => TRUE,
//                         "message" => "Mandate Updated Successfully.",
//                         "data" => $mandate_customer_id
//                     ], REST_Controller::HTTP_OK);
//                 } else {
//                     $this->response([
//                         'status' => FALSE,
//                         "message" => "Mandate Not Updated.",
//                     ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                 }
//             } else {
//                 $this->response([
//                     'status' => FALSE,
//                     'message' => 'Error uploading document. Please check file type and size.'
//                 ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//             }
//         } else {
//             // Send error response if mandate not found
//             $this->response([
//                 'status' => FALSE,
//                 "message" => "Mandate not found.",
//             ], REST_Controller::HTTP_NOT_FOUND);
//         }
//     } else {
//         // Send error response if required fields are missing
//         $this->response([
//             'status' => FALSE,
//             "message" => "Please provide all required information.",
//         ], REST_Controller::HTTP_BAD_REQUEST);
//     }
// }
public function documentupdate_post($value = '') {
    // Retrieve form data
    $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
    $document = $_FILES['document'];
    
    // Get current time and date
    $current_time = date('Y-m-d H:i:s'); // Change format to include date and time

    // Check if required fields are not empty
    if (!empty($mandate_customer_id) && !empty($document)) {
        // Define conditions to retrieve existing mandate data
        $conGroup['conditions'] = array(
            'mandate_customer_id' => $mandate_customer_id,
            'is_active' => 1,
            'is_deleted' => 0
        );

        // Retrieve existing mandate data
        $existing_data = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row');

        if ($existing_data) {
            // Prepare data to update
            $data = array(
                'mandate_customer_id' => $mandate_customer_id,
                // Add doc_uploaded_time to the data array
                'doc_uploaded_time' => $current_time, // Use the separately stored date and time
                // Other fields you may want to update...
            );

            // Handle document upload
            $uploadDir = 'uploads/document/';
            $uploadedFileName = basename($document['name']); // Get only the file name
            $uploadedFile = $uploadDir . $uploadedFileName;
            
            if (move_uploaded_file($document['tmp_name'], $uploadedFile)) {
                // Store the relative path to the file in the $data array
                $data['document'] = $uploadedFileName;
                // Update the mandate data
                $data['doc_is_active'] = 1; // Activate the document
                $data['doc_is_delete'] = 0; // Mark as not deleted
                // Update the mandate data
                $mandate_updated = $this->Crud_model->update('mandate_customers', $data, $conGroup);

                // Check if mandate update was successful
                if ($mandate_updated) {
                    $this->response([
                        "status" => TRUE,
                        "message" => "Mandate Updated Successfully.",
                        "data" => $mandate_customer_id
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        "message" => "Mandate Not Updated.",
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error uploading document. Please check file type and size.'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // Send error response if mandate not found
            $this->response([
                'status' => FALSE,
                "message" => "Mandate not found.",
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    } else {
        // Send error response if required fields are missing
        $this->response([
            'status' => FALSE,
            "message" => "Please provide all required information.",
        ], REST_Controller::HTTP_BAD_REQUEST);
    }
}


public function documentdelete_post($value='') {
    // Clean and retrieve the ID from the POST data
    $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));

    if (!empty($mandate_customer_id) && is_numeric($mandate_customer_id)) {
        // Define conditions to find the document by its ID
        $con['conditions'] = array(
            'mandate_customer_id' => $mandate_customer_id,
            'doc_is_active' => 1,
            'doc_is_delete' => 0
        );

        // Data to update (mark document as deleted)
        $data = array(
            'doc_is_delete' => 1,
            'doc_is_active' => 0
        );

        // Update the document
        if ($this->Crud_model->update('mandate_customers', $data, $con)) {
            // Set the response for successful deletion
            $this->response([
                "status" => TRUE,
                "message" => "Document deleted successfully.",
                "data" => $mandate_customer_id
            ], REST_Controller::HTTP_OK);
        } else {
            // Set the response for failure to delete
            $this->response([
                'status' => FALSE,
                "message" => "Failed to delete document."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        // Set the response for invalid data
        $this->response([
            'status' => FALSE,
            "message" => "Invalid document ID."
        ], REST_Controller::HTTP_BAD_REQUEST);
    }
}

// public function mandateCustomerInsert_post($value='')

// Update personal details only
public function mandateCustomerdetailsupdate_post($value = '')
{
    // Retrieve form data
    $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));
    $customer_name = $this->security->xss_clean($this->post("customer_name"));
    $customer_mobile_no = $this->security->xss_clean($this->post("customer_mobile_no"));
    $customer_email = $this->security->xss_clean($this->post("customer_email"));
    $branch_id = $this->security->xss_clean($this->post("branch_id"));
    $loan_type_id = $this->security->xss_clean($this->post("loan_type_id"));
    $bank_account_no = $this->security->xss_clean($this->post("bank_account_no"));
    $document = $this->security->xss_clean($this->post("document"));

    // Check if required fields are not empty
    if (!empty($mandate_customer_id) && !empty($customer_mobile_no)) {
        // Define conditions to retrieve existing mandate data
        $conGroup['conditions'] = array(
            'mandate_customer_id' => $mandate_customer_id,
            'is_active' => 1,
            'is_deleted' => 0
        );

        // Retrieve existing mandate data
        $existing_data = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row');

        if ($existing_data) {
            // Prepare data to update
            $data = array(
                'mandate_customer_id' => $mandate_customer_id,
                'customer_email' => $customer_email,
                'loan_type_id' => $loan_type_id,
                'bank_account_no' => $bank_account_no,
                'customer_name' => $customer_name,
                'customer_mobile_no' => $customer_mobile_no

                // 'created_by'=> $this->session->userdata('id')
            );

            // Check if a new document file is uploaded
  
            if (!empty($_FILES['document']['name'])) {
                $uploadDir = 'uploads/document/';
                $uploadedFileName = uniqid() . '_' . basename($_FILES['document']['name']);
                $uploadedFile = $uploadDir . $uploadedFileName;
            
                if (move_uploaded_file($_FILES['document']['tmp_name'], $uploadedFile)) {
                    // Store the relative path to the file in the $data array
                    $data['document'] =  $uploadedFileName;
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Error uploading document. Please check file type and size.'
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    return;
                }
            }
        
            // Update the mandate data
            $mandate_updated = $this->Crud_model->update('mandate_customers', $data, $conGroup);

            // Check if mandate update was successful
            if ($mandate_updated) {
                $this->response([
                    "status" => TRUE,
                    "message" => "Mandate Updated Successfully.",
                    "data" => $mandate_customer_id
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    "message" => "Mandate Not Updated.",
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // Send error response if mandate not found
            $this->response([
                'status' => FALSE,
                "message" => "Mandate not found.",
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    } else {
        // Send error response if required fields are missing
        $this->response([
            'status' => FALSE,
            "message" => "Please provide all required information.",
        ], REST_Controller::HTTP_BAD_REQUEST);
    }
}


    public function showMandateData_get($value = '')
    {
        $mandate_customer_id = $this->get("mandate_customer_id");
    
        $con['conditions'] = array(
            'mandate_customer_id'=>$mandate_customer_id,
            'is_active' => "1",
            'is_deleted' => "0",
        );
    
        if ($mandate_result = $this->Crud_model->getRows('mandate_customers', $con, 'row')) {
    
    
            $this->response([
                "status" => TRUE,
                "message" => "Loaded Successfully.",
                "data" => $mandate_result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                "message" => "Not Found. Please Add Mandate.",
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function getInputString_get($value = '')
{
    // Get mandate_customer_id from request parameters
    $mandate_customer_id = $this->get("mandate_customer_id");

    // Conditions to fetch data related to the mandate_customer_id
    $con['conditions'] = array(
        'mandate_customer_id' => $mandate_customer_id,
        'is_active' => "1",
        'is_deleted' => "0",
    );

    // Fetch data from the database
    if ($mandate_result = $this->Crud_model->getRows('mandate_customers', $con, 'row')) {

        // Concatenate values to form the input string
        // $inputString = $merchant_ID . "|" . $txn_ID . "|" . $amount . "|" . $account_no . "|" . $consumer_ID . "|" . $customer_mobile_no . "|" . $customer_email . "|" . $customer_start_date . "|" . $customer_end_date . "|" . $amount . "|" . $emi_frequency . "|" . $transactionDate . "|" . $consumer_card_number . "|" . $consumer_expiry_month . "|" . $consumer_expiry_year . "|" . $consumer_cvv_no . "|" . "2576743890JCNHAM";

        // Prepare and send the response
        $this->response([
            "status" => TRUE,
            "message" => "Loaded Successfully.",
            "data" => $mandate_result,
            // "inputString" => $inputString, // Include input string in the response
        ], REST_Controller::HTTP_OK);
    } else {
        // If no data found, send an error response
        $this->response([
            'status' => FALSE,
            "message" => "Not Found. Please Add Mandate.",
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    
    
       public function showMandateDetails_get($value = '') {
        $mandate_customer_id = $this->security->xss_clean($this->get("mandate_customer_id"));
    
        if (!empty($mandate_customer_id)) {
            $conGroup['conditions'] = array(
                'mandate_customer_id' => $mandate_customer_id,
                'is_active' => 1,
                'is_deleted' => 0
            );
    
            if ($groups_row = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row')) {
                $groups_row->all_log = json_decode($groups_row->all_log);
    
                $response_data = array(
                    "status" => TRUE,
                    "message" => "Mandate Details Retrieved",
                    "mandate_details" => $groups_row
                );
    
                $this->response($response_data, REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    "message" => "Mandate Details Not Found."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $this->response([
                'status' => FALSE,
                "message" => "Invalid Data."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } 
    // //////////////Changes///
    public function showSchedule_get($page = '')
    {
    
        $searchText = $this->security->xss_clean($this->get("search"));
        $draw = $this->security->xss_clean($this->get("draw"));
        $start = $this->security->xss_clean($this->get("start"));
        $length = $this->security->xss_clean($this->get("length"));
        // $draw = $this->security->xss_clean($this->get("length"));
        $searchText = $searchText['value'];

        $order_column = $_GET['order'][0]['column'];
        $order_sort_dir = $_GET['order'][0]['dir'];
        $order_column_name =$_GET['order'][0]['name'];
        $order_column = (int)$order_column;
      
        $order_array=array('mandate_transaction_schedule.mts_customer_id' => 'DESC');
     

        $final_columnSearchValue = array();

        $condition_amount = array();

        $condition_emi_start_date = array();
        // $condition_emi_end_date = array();
        // $condition_mandate_register_date = array();

        $searchCondition = array();
                   
        foreach ($_GET['columns'] as $index => $column) {
            
            $columnSearchValue = $column['search']['value']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column

             if($index==$order_column && $columnData!=null){
                
                $order_column_name = $column['data'];
                $order_column_name='mandate_transaction_schedule.'.$order_column_name;
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
                                    $toDate = $rangeValues[1];

                                    $fromDate = date("Y-m-d", strtotime($fromDate));
                                    $toDate = date("Y-m-d", strtotime($toDate));
                           
                                    $condition_emi_start_date = array(
                                        $table_column_name.' >' => $fromDate,
                                        $table_column_name.' <' => $toDate,
                                    );
                                }

                             }

                             else if (strpos($columnSearchValue,'<') !== false) {
                                  
                                    $date = str_replace('<', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' <' => $date,
                                      );
                             }

                              else  if (strpos($columnSearchValue,'>') !== false) {

                                    $date = str_replace('>', '', $columnSearchValue);

                                      $condition_emi_start_date = array(
                                            $table_column_name.' >' => $date,
                                      );
                             }
                             else{

                                $condition_emi_start_date = array(
                                        $table_column_name => $columnSearchValue,
                                  );
                             }
                            
                        }

                      

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                          

                            $final_columnSearchValue [] =  $filteredConditions;
                     
                        
             }
           
        }

    
          $condition = array(
            'mandate_transaction_schedule.mts_is_active' => 1,
            'mandate_transaction_schedule.mts_is_deleted' => 0
        //    'mandate_customers.mandate_status_message !=' => NULL,
          );
           
          $condition = array_merge($condition_amount, $condition);
          $condition = array_merge($condition_emi_start_date, $condition);
        //   $condition = array_merge($condition_emi_end_date, $condition);
        //   $condition = array_merge($condition_mandate_register_date, $condition);



        if ($searchText) {
            $searchCondition = array(
             
                'mandate_transaction_schedule.mts_amount LIKE' => '%' . $searchText . '%',
             
                'mandate_transaction_schedule.mts_status_message LIKE' => '%' . $searchText . '%',
            );
        }



    
            $option = array(
                // 'select' => 'mandate_customers.*,enach_banks.*,bank_branches.branch_name',

            'select' => 'mandate_transaction_schedule.*, mandate_customers.*',
                'table' =>'mandate_transaction_schedule',
            'left_join' => array(
                array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id'),
                // array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            'limit' => array($length => $start),
            // 'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
             );


        $users_row=$this->Crud_model->commonGet($option);
        if($users_row){

                $conNumRows['conditions'] = array(
                                      
                    'mandate_transaction_schedule.mts_is_active' => 1,
                    'mandate_transaction_schedule.mts_is_deleted' => 0
              );

         

              $optionCount = array(
                'select' => 'mandate_transaction_schedule.*, mandate_customers.*',
                'table' =>'mandate_transaction_schedule',
            'left_join' => array(
                array('mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id'),
                // array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
            'where' => $condition,
            'or_where' => $searchCondition,
            'filters' => $final_columnSearchValue,
            'order' => $order_array,
            'limit' => array($length => $start),
            
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
    
    public function showMandateTransactionSchedule_get($value = '') {
        $mandate_customer_id = $this->security->xss_clean($this->get("mandate_customer_id"));
        $search_query = $this->security->xss_clean($this->get("searchschedule"));

        if (!empty($mandate_customer_id)) {
            $conGroup['conditions'] = array(
              'mandate_customer_id' => $mandate_customer_id,
              'is_active' => 1,
              'is_deleted' => 0

            );
              
            if ($groups_row = $this->Crud_model->getRows('mandate_customers', $conGroup, 'row')) {
              $groups_row->all_log=json_decode($groups_row->all_log); 

                // $page = $this->input->get('page') ? $this->input->get('page') : 1;
                $limit = 10; // Number of items per page
                $offset = ($page - 1) * $limit;
    
                $conSchedule['conditions'] = array(
                  'mts_customer_id' => $mandate_customer_id,
                  'mts_is_active' => 1,
                  'mts_is_deleted' => 0
                ); 
                if (!empty($search_query)) {
                    // Use like condition for both fields
                    $conSchedule['like'] = array(
                        'mts_status_message' => $search_query,
                        'mts_datetime' => $search_query
                    );
                }
                // Fetch paginated data using limit and offset
                $schedule_result = $this->Crud_model->getRows(
                    'mandate_transaction_schedule',
                    $conSchedule,
                    'result',
                    $limit,
                    $offset
                );
    
                if ($schedule_result) {
                    // Calculate total amount and successful amount
                    $totalAmount = 0;
                    $successfulAmount = 0;
                    $successfulCount = 0; 
                    $remainingAmount = 0;
                    $remainingCount = 0;
                    $failedAmount = 0;
                    $failedCount = 0;
                    $skippedAmount = 0;
                    $skippedCount = 0;
            
            

    
                    foreach ($schedule_result as $transaction) {
                        $totalAmount += $transaction->mts_amount;
    
                        // Check if the status message is "Success"
                        if ($transaction->mts_status_message === 'S') {
                            $successfulAmount += $transaction->mts_amount;
                            $successfulCount++; // Increment count of successful transactions

                        } elseif ($transaction->mts_status_message === 'f') {
                            $failedAmount += $transaction->mts_amount;
                            $failedCount++; // Increment count of failed transactions
                        }else {
                            $remainingAmount += $transaction->mts_amount;
                            $remainingCount++;
                        }
                        if ($transaction->mts_is_skipped == 1) {
                            $skippedAmount += $transaction->mts_amount;
                            $skippedCount++;
                        }
                    }

                   
    
                    $response_data = array(
                      "status" => TRUE,
                      "message" => "Logs Saved",
                      "mandate_details"=>$groups_row,
                      "transaction_details"=>$schedule_result,
                        "total_rows" => count($schedule_result),
                        "total_amount" => $totalAmount,
                        "successful_amount" => $successfulAmount,
                        "successful_count" => $successfulCount, 
                        "remaining_amount" => $remainingAmount,
                        "remaining_count" => $remainingCount,
                        "failed_count" => $failedCount,
                        "failed_amount" => $failedAmount,
                        "skipped_count" => $skippedCount,
                        "skipped_amount" => $skippedAmount

                    );

                    $this->response($response_data, REST_Controller::HTTP_OK);
                } else {
                  $this->response([
                      'status' => FALSE,
                        "message" => "Error in showing schedule."
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            } else {
                   $this->response([
                      'status' => FALSE,
                    "message" => "Mandate Details Not Found."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        } else {
           $this->response([
              'status' => FALSE,
                "message" => "Invalid Data."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

     public function generateMandateTransactionSchedule_post()
    {
        $mandate_customer_id = $this->security->xss_clean($this->post("mandate_customer_id"));

        // $customer_start_date = $this->security->xss_clean($this->post("customer_start_date"));

        // $customer_end_date = $this->security->xss_clean($this->post("customer_end_date"));
        // $customer_amount = $this->security->xss_clean($this->post("customer_amount"));
        // $transactionDate = $this->security->xss_clean($this->post("transactionDate"));
        // $emi_count = $this->security->xss_clean($this->post("emi_count"));
        // $emi_frequency =  $this->security->xss_clean($this->post("emi_frequency"));
        // $schedule =  $this->security->xss_clean($this->post("schedule"));

        // print_r($schedule);
        // exit();


    if (!empty($mandate_customer_id) ) {

        $mandateCustCon['conditions'] = array(
            'mandate_customer_id' => $mandate_customer_id,
            'is_active' => 1,
            'is_deleted' => 0
        );

        $mandateCustomerData = $this->Crud_model->getRows('mandate_customers',$mandateCustCon,'row');
        $transactionSchedule = json_decode($mandateCustomerData->transactionScheduleData);
      

        $conGroup['conditions'] = array(
            'mts_customer_id' => $mandate_customer_id,
            'mts_is_active' => 1,
            'mts_is_deleted' => 0
        );

        if($group_data_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conGroup)) {
           
            $update_data = array(
                'mts_is_active' => 0,
                'mts_is_deleted' => 1
            );

            $this->Crud_model->update('mandate_transaction_schedule', $update_data, $conGroup);
        }

        // Insert new transaction schedules
        foreach ($transactionSchedule->scheduleData as $key => $value) {

            $formattedDateInsert=date('Y-m-d H:i:s',strtotime($value->emi_date));
            $dateForTXNGenerate = new DateTime($value->emi_date);
            $timestamp = $dateForTXNGenerate->getTimestamp();

            $mts_txn_id = $mandate_customer_id.date('dmYHis').$customer_amount.$timestamp.rand(11111, 99999);
         
            $conGroupCheckTXN['conditions'] = array(
                'mts_txn_id' => $mts_txn_id,
            );

            if($group_data_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conGroupCheckTXN)) {
                    
                $mts_txn_id = $mts_txn_id.rand(11111, 99999);
                
                $conGroupCheckTXN['conditions'] = array(
                    'mts_txn_id' => $mts_txn_id,
                );

                if($group_data_row = $this->Crud_model->getRows('mandate_transaction_schedule',$conGroupCheckTXN)) {
                    $mts_txn_id = $mts_txn_id.rand(11111, 99999);
                }

            }

               $data = array(
                'mts_customer_id' => $mandate_customer_id,
                'mts_datetime' => $formattedDateInsert,
                'mts_amount' => $value->emi_amount,
                'mts_txn_id' => $mts_txn_id,
                'mts_is_active' => 1,
                'mts_is_deleted' => 0
               );

               // print_r($data);

                
             $group_data_row = $this->Crud_model->insert('mandate_transaction_schedule', $data);

            }

            // die();

            if($group_data_row){
            
                $this->response([
                  "status" => TRUE,
                  "message" => "Transaction Schedule Generated successfully.",
                ], REST_Controller::HTTP_OK);
            
            }

            else {
            
                $this->response([
                    'status' => FALSE,
                    "message" => "Failed to update transaction schedule."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }


    } else {
          $this->response([
          'status' => FALSE,
            "message" => "Invalid Data."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }




    public function getMandateVerifyExpiryTime_get($value='')
            {
                // code...
                 $mandate_customer_id = $this->security->xss_clean($this->get("mandate_customer_id"));
                 if(!empty($mandate_customer_id)){
                  $option = array(
                        'select' => 'mandate_customers.*',
                        'table' => 'mandate_customers',
                        // add condition for show selected branches
                        'where_in' => array('mandate_customers.mandate_customer_id' =>$mandate_customer_id),
                        'single'=>TRUE
                    ); 

                    if($groups_row=$this->Crud_model->commonGet($option)){
                    

                    $current_time = date('Y-m-d H:i:s');
                    $current_timestamp = strtotime($current_time);

                    $expiration_timestamp = strtotime($groups_row->transaction_page_expiry_datetime);
                    $remaining_seconds = $expiration_timestamp - $current_timestamp;
                        
                        
                        if($remaining_seconds<0){
                            $remaining_seconds= 0;
                        }
                      $this->response([
                          "status" => TRUE,
                          "message" => "Tranasction Time Loaded Successfully.",
                          "transaction_page_expiry_datetime" => $expiration_timestamp,
                          "remaining_time_in_seconds" => $remaining_seconds
                      ], REST_Controller::HTTP_OK); 
                   }
                   else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "Tranasction Time Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   }


                 }
                 else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "User Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }
               
            }



    public function getMandateCustomer_Log_Row_get($value='')
            {
                // code...
                 $mandate_customer_id = $this->security->xss_clean($this->get("mandate_customer_id"));
                 if(!empty($mandate_customer_id)){
                    $conGroup['conditions'] = array(
                      'mandate_customer_id' => $mandate_customer_id,
                      'is_active' => 1,
                      'is_deleted' => 0
                    ); 

                    if($groups_row=$this->Crud_model->getRows('mandate_customers',$conGroup,'row')){
                      $all_log=json_decode($groups_row->all_log);  
                      $this->response([
                                      "status" => TRUE,
                                      "message" => "Logs Loaded Successfully.",
                                      "data"=>$groups_row,
                                      "all_log"=>$all_log,
                                  ], REST_Controller::HTTP_OK); 
                   }
                   else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "Logs Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   }


                 }
                 else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "User Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }
               
            }

            public function verifyMandateCustomer_post($mandate_customer_id='')
            {
                  $jsonData = $this->input->raw_input_stream;
               

                    
                   // // Perform additional processing as needed...

                   //  // Prepare data for Paynimo API
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
                          $this->response([
                              'status' => FALSE,
                              "message" => "Error in Verify this mandate details.Please try again."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }

                    else{
                          curl_close($ch);
                          $decoded_response = json_decode($response, true);
                          if (isset($decoded_response['paymentMethod']['paymentTransaction']['statusMessage'])) {
                                $statusMessage = $decoded_response['paymentMethod']['paymentTransaction']['statusMessage'];

                               // update token if previously not set by mandate registration time
                                $this->setMandateToken($mandate_customer_id,$decoded_response['paymentMethod']['token']);
                             
                                // Pass the status message to the frontend AJAX response
                              
                                $this->response([
                                    "status" => true,
                                    "message" => $statusMessage,
                                    "data" => $decoded_response,
                                ], REST_Controller::HTTP_OK);
                            } 
                            else {
                                // Handle the case when the response structure is not as expected
                                $this->response([
                                    "status" => false,
                                    "message" => "Unexpected response structure",
                                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }


                    }

            }

    function setMandateToken($mandate_customer_id='',$token='')
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

  public function getTransactionScheduleRow_get($value='')
    {

        $mts_id = $this->security->xss_clean($this->get("mts_id"));
        $merchant_ID = $this->security->xss_clean($this->get("merchant_ID"));
        $consumer_ID = $this->security->xss_clean($this->get("consumer_ID"));

        if(!empty($mts_id)){

            $conGroup['conditions'] = array(
              'mts_id' => $mts_id,
              'mts_is_active' => 1,
              'mts_is_deleted' => 0
            ); 

            if($groups_row=$this->Crud_model->getRows('mandate_transaction_schedule',$conGroup,'row'))
            {

                if($groups_row->mts_scheduled_datetime){
                    $mts_scheduled_datetime = $groups_row->mts_scheduled_datetime;
                    $day = substr($mts_scheduled_datetime, 0, 2);
                    $month = substr($mts_scheduled_datetime, 2, 2);
                    $year = substr($mts_scheduled_datetime, 4);

                    $mts_scheduled_datetime = $day . '-' . $month . '-' . $year;     
                }
                else{
                    $mts_scheduled_datetime = '';     
                }
               

                $mts_txn_ID=$groups_row->mts_txn_id;
               
                if($message=$this->verifyTransactionSchedule($mts_id,$consumer_ID,$merchant_ID,$mts_txn_ID,$mts_scheduled_datetime)){
                        $this->response([
                          "status" => TRUE,
                          "message" => $message,

                        ], REST_Controller::HTTP_OK);
                }
                else{
                      $this->response([
                        "status" => false,
                        "message" => "Error.",
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
 
            }

            else {

                   $this->response([
                      'status' => FALSE,
                      "message" => "Mandate Details Not Found."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

            } 


        }
        else{

           $this->response([
              'status' => FALSE,
              "message" => "Invalid Data."],
              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

        }
    }



   function verifyTransactionSchedule($mts_id,$consumer_ID,$merchant_ID,$mts_txn_ID,$mts_scheduled_datetime)
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
                    "identifier" =>$mts_txn_ID,
                    "dateTime"=>$mts_scheduled_datetime,
                    "subType" => "004",
                    "requestType" => "TSI"
                ),
                 "consumer" => array(
                    "identifier"=> $consumer_ID
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
                        
                        $statusCode = $decoded_response['paymentMethod']['paymentTransaction']['statusCode'];

                        $statusMessage = $decoded_response['paymentMethod']['paymentTransaction']['statusMessage'];
                        $mts_payment_transaction_id = $decoded_response['paymentMethod']['paymentTransaction']['identifier'];
                        $mts_scheduled_datetime = $decoded_response['paymentMethod']['paymentTransaction']['dateTime'];

                        $message=$statusMessage;

                        if($statusMessage=="I"){
                            $message = $decoded_response['paymentMethod']['error']['desc'].". But Transaction Status Pending.";
                        }
                        else if($statusMessage=="A"){
                           $message = $decoded_response['paymentMethod']['paymentTransaction']['errorMessage'];
                        }
                        else if($statusMessage=="F"){
                           $message = $decoded_response['paymentMethod']['paymentTransaction']['errorMessage'];
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
                          'mts_success_log'  => trim($response),
                          'mts_error_log'  =>  trim($response),
                          'mts_all_log'  =>  trim($response),
                          'mts_message'  => $message,
                        );
                     
                       $branches_row=$this->Crud_model->update('mandate_transaction_schedule',$data,$conGroup);   
                        return $message;
                             

                        }
                        else{
                            return false;
                        }
                     
                    } 

                  
                 
            }



///permission for bank
            
public function permissions_post($value = '')
{
    $id = $this->security->xss_clean($this->post("id"));
    $permission = $this->security->xss_clean($this->post("permission"));
    $selectedBranchNames = json_decode($this->input->post('selectedBranchNames'));

    if (!empty($id) && !empty($selectedBranchNames) && !empty($permission)) {
        $conUser['conditions'] = array(
            'id' => $id,
            'is_active' => 1,
            'is_deleted' => 0
        );

        if ($user_row = $this->Crud_model->getRows('users', $conUser, 'row')) {

      

            $updatedData = array(
                'permission' => serialize($permission),
                'permission_branch' => json_encode($selectedBranchNames),
            );

            // Update permissions for all selected branches
            if ($this->Crud_model->update($this->table, $updatedData, $conUser)) {
                $this->response([
                    "status" => TRUE,
                    "message" => "Permission updated successfully.",
                    "data" => $user_row
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    "message" => "Permissions not updated."
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $this->response([
                'status' => FALSE,
                "message" => "User Not Found. Please try again."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Please Fill Complete Information."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}

// public function showBranchesOfBank_get($value='')
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





///Show Branch
public function showBranchesOfBank_get($value = '')
{
    $option = array(
        'select' => 'bank_branches.*',
        'table' => 'bank_branches',
        // add condition for show selected branches
        'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))
    );

    $lead_Branch_result = $this->Crud_model->commonGet($option);

    if ($lead_Branch_result) {
        $lead_Branch_name = array_column($lead_Branch_result, 'branch_name');
        array_multisort($lead_Branch_name, SORT_DESC, $lead_Branch_result);

        $this->response([
            "status" => TRUE,
            "message" => "Loaded Successfully.",
            "data" => $lead_Branch_result
        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Branch Not Found. Please add branch.",
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}




public function permissionsrow_get($value = '')
{
    $id = $this->security->xss_clean($this->get("id")); 


    if (!empty($id)) {
        $conUser['conditions'] = array(
            'id' => $id,
            'is_active' => 1,
            'is_deleted' => 0
        );

        if ($user_row = $this->Crud_model->getRows('users', $conUser, 'row')) {

            $this->response([
                "status" => TRUE,
                "message" => "User Loaded Successfully.",
                "data" => $user_row,
                "permissions"=>unserialize($user_row->permission),
                "permission_branch" => json_decode($user_row->permission_branch)

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                "message" => "User Not Found. Please try again."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "User ID not provided. Please try again."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}


public function showStaffData_get($value = '')
{
    $mandate_customer_id = $this->get("mandate_customer_id");

    $option = array(
        'select' => 'users.firstname,users.middlename,users.lastname,users.phone,
                     mandate_customers.created_by,mandate_customers.mandate_customer_id',
        'table' => 'mandate_customers',
        'left_join' => array(
          array('users' => 'users.id = mandate_customers.created_by')
        ),
        'where' => array(
            'mandate_customers.mandate_customer_id' => $mandate_customer_id,
        ),
        'single' => TRUE
    );

    if ($mandate_result = $this->Crud_model->commonGet($option)) {

        $this->response([
            "status" => TRUE,
            "message" => "Loaded Successfully.",
            "data" => $mandate_result,
        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Not Found. Please Add Mandate.",
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}
// ///////////////Profile Picture

public function updateprofile_post($value = '')
{
    $id = $this->security->xss_clean($this->post("id"));
    $organization_id = $this->security->xss_clean($this->post("organization_id"));
    $sub_organization_branch_id = $this->security->xss_clean($this->post("sub_organization_branch_id"));

    $first_name = $this->security->xss_clean($this->post("bank_user_first_name"));
    $lastname = $this->security->xss_clean($this->post("bank_user_lastname"));
    $email = $this->security->xss_clean($this->post("email"));
    $phone = $this->security->xss_clean($this->post("bank_user_phone"));
    $city = $this->security->xss_clean($this->post("city"));
    // $city        =  $this->security->xss_clean($this->post("bank_city"));

    $username = $this->security->xss_clean($this->post("username"));
    // $headmanager = $this->security->xss_clean($this->post("bank_headmanager"));
    // $department = $this->security->xss_clean($this->post("department"));
   // $designation_name = $this->security->xss_clean($this->post("designation_name"));
    $password = $this->security->xss_clean($this->post("password"));
    $new_password = $this->security->xss_clean($this->post("new_password"));
    $confirm_password = $this->security->xss_clean($this->post("confirm_password"));

    if (!empty($id)) {
        $conGroup['conditions'] = array(
            'id' => $id,
            'is_active' => 1,
            'is_deleted' => 0
        );

        if ($groups_row = $this->Crud_model->getRows($this->table, $conGroup, 'row')) {

            // Update user profile information
            $data = array(
                'email' => $email,
                'phone' => $phone,
                'firstname' => $first_name,
                'lastname' => $lastname,
                'city' => $city,
                'username' => $username,
                // 'headmanager' => $headmanager,
                // 'department' => $department,
                // 'designation_name' => $designation_name,
                'organization_id' => $organization_id,
                'sub_organization_branch_id' => $sub_organization_branch_id
            );

            $info_updated = $this->Crud_model->update($this->table, $data, $conGroup);

            if (!empty($password) && !empty($new_password) && !empty($confirm_password)) {
                
                if (password_verify($password, $groups_row->password)) {
                   
                    if ($new_password === $confirm_password) {
                        $password_data = array(
                            'password' => password_hash($new_password, PASSWORD_BCRYPT),
                        );

                      $password_updated= $this->Crud_model->update($this->table, $password_data, $conGroup);
             }
            }
        }

            if( $info_updated || $password_updated ) {
                $this->response([
                    'status' => TRUE,
                    "message" => "User information updated successfully.",
                    "password_updated" =>$password_updated,
                    "information_updated"=>$info_updated
                ], REST_Controller::HTTP_OK);
            }
            else{

                $this->response([
                    'status' => FALSE,
                    "message" => "User Info Not Updated. Please try again.",
                    "password_updated" =>false,
                    "information_updated"=>false
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

            }


      

        } else {
            $this->response([
                'status' => FALSE,
                "message" => "Previous User Not Found. Please try again."
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Please Fill Complete Information."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}




public function profilerow_get($value='')
    
{

        $id = $this->security->xss_clean($this->get("id"));
            if(!empty($id)){
                        $option = array(
                            'select'=> 'users.*,
                                        user_group.group_id,user_group.user_id,
                                        designations.designation_name,designations.id,
                                        banks.*,
                                        bank_branches.*,
                                        cities.name as branch_city_name, cities.id as branch_city_id,
                                        states.state_title as branch_state_title,states.id as branch_state_id',
                                        
                            'table' =>'users',

                            'left_join'  => array(array(
                                'bank_branches' => 'bank_branches.branch_id = users.sub_organization_branch_id',
                                // 'cities' => 'cities.id = bank_branches.branch_city_id',
                                'cities' => 'cities.id = users.city',
                                // 'cities' => 'users.city = cities.id',
                                'states' => 'states.id = bank_branches.branch_state_id',
                            )),   

                            'join'  => array(array(
                                'user_group' => 'user_group.user_id = users.id',
                                'designations' => 'designations.id = user_group.group_id',
                                'banks' => 'banks.bank_id = users.organization_id',
                             )),

                            // 'where_in'=>array('users.sub_organization_branch_id'=>$this->session->userdata('user_permission_branch_id_array')),
                            //'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),


                            'where' =>array('users.is_active' => 1,'users.is_deleted' => 0,'users.is_verified' => 1, 'users.id' => $id,
                                            // 'users.is_govt_emp' => "N",'users.is_bank_emp' => "Y",
                                            'banks.bank_id' => $this->session->userdata('organization_id'),
                                            'banks.is_active' => 1,'banks.is_deleted' => 0,'banks.is_verified' => 1,
                                         //   'bank_branches.branch_id' => $this->session->userdata('sub_organization_branch_id'),
                                         //   'bank_branches.is_active' => 1,'bank_branches.is_deleted' => 0
                                        ),
                            //  'where_in'=>array('bank_branches.branch_id'=>$this->session->userdata('user_permission_branch_id_array')),

                         
                            'single'=>TRUE
                        );
            
                        $users_row=$this->Crud_model->commonGet($option);
            
                        // if($users_row){
                        //     foreach ($users_row as $key => $value) {
                        //         $value->orgnization_name =  $value->bank_name.' ('.$value->bank_address.')';
                        //         $value->emp_type = "Bank";
                        //     }
                        // }
            
                // $users_row= array_values($users_row);
            
                if($users_row){
            
                    $this->response([
                                    "status" => TRUE,
                                    "message" => "User Loaded Successfully.",
                                    "data"=>$users_row
                                ], REST_Controller::HTTP_OK); 
                }
                else{
                    $this->response([
                                'status' => FALSE,
                                "message" => "User Not Found.Please add User."],
                                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
    }

    else{
        $this->response([
                     'status' => FALSE,
                     "message" => "User Not Found.Please try again."],
                     REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

    }
}



//update profile picture    
public function updateProfilePicture_post()
{
    if (isset($_FILES['profile_picture'])) {
        $file = $_FILES['profile_picture'];

        // Specify the directory where you want to store the uploaded profile pictures
        $uploadDirectory = './uploads/profile_pictures/';

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $filename = uniqid() . '_' . $file['name'];

        // Move the uploaded file to the specified directory
        $destination = $uploadDirectory . $filename;
        move_uploaded_file($file['tmp_name'], $destination);

        $id = $this->security->xss_clean($this->post("id"));

        if (!empty($id)) {
            $conGroup['conditions'] = array(
                'id' => $id,
                'is_active' => 1,
                'is_deleted' => 0
            );

            $data = array(
                'profile_picture' => $filename,
                // 'profile_picture' => base_url('uploads/profile_pictures/') . $filename
            );

            $profile_picture_updated = $this->Crud_model->update($this->table, $data, $conGroup);
            if ($profile_picture_updated) {
                $logged_in_sess = array(
                  
                    'profile_picture' => $filename
                    
              );
              $this->session->set_userdata($logged_in_sess);

                // Send a response back to the client
                $this->response(array(
                    'status' => true,
                    'message' => 'Profile picture updated successfully',
                    'filename' => $filename,
                    'profile_picture' => base_url('uploads/profile_pictures/') . $filename
                ), REST_Controller::HTTP_OK);
            } else {
                // If the database update fails
                $this->response(array(
                    'status' => false,
                    'message' => 'Failed to update profile picture in the database'
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // If no user ID is provided
            $this->response(array(
                'status' => false,
                'message' => 'No user ID provided'
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        // If no file is provided in the request
        $this->response(array(
            'status' => false,
            'message' => 'No profile picture provided'
        ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    
    /*Mandate To be Cancel*/

    public function mandateToBeCancel_get()
    {

        $mandate_customer_id = $this->security->xss_clean($this->get('mandate_customer_id'));

        if (!empty($mandate_customer_id)) {
            
            $mandateCon['conditions'] = array(

                'mts_customer_id ' => $mandate_customer_id,
                'mts_status_message' => Null,
                'mts_is_already_scheduled' => '0',
                'mts_is_skipped' => '0',
            );

            $mandateData = $this->Crud_model->getRows('mandate_transaction_schedule',$mandateCon,'result');

            if (!empty($mandateData)){
                // code...
                $this->response([
                    'status' => True,
                    'message' => 'Mandate data to be cancel fetech',
                    'data' => $mandateData
                ], REST_Controller::HTTP_OK);

            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Failed to get mandate details'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
                $this->response([
                    'status' => FALSE,
                    "message" => "Mandate customer id is empty"
                ],REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }     
    }


    public function cancelMandateOfCustomer_post()
    {
        $mandate_customer_id = $this->security->xss_clean($this->post('mandateCustomerId'));

        if (!empty($mandate_customer_id)) {
            
            $mandateConUpdate['conditions'] = array(

                'mts_customer_id ' => $mandate_customer_id,
                'mts_status_message' => Null,
                'mts_is_already_scheduled' => '0',
                'mts_is_skipped' => '0',
            );

            $mandateDataUpate = $this->Crud_model->getRows('mandate_transaction_schedule',$mandateConUpdate,'result');


            if (!empty($mandateDataUpate)) {
                // code...

                $dataToUpdate = array(

                    'mts_is_active' => '0',
                    'mts_is_deleted' => '1',
                    'mts_has_cancelled' => '1',
                    'mts_status_message' => 'C',

                );

                if ($mandateToCancel = $this->Crud_model->update('mandate_transaction_schedule',$dataToUpdate,$mandateConUpdate)) {


                    $conToUpdate['conditions'] = array(

                        'mandate_customer_id' => $mandate_customer_id
                    );

                    $dataUpdate = array(
                        'mandate_customer_canceled' => '1'
                    );

                    $mts_customerData = $this->Crud_model->update('mandate_customers',$dataUpdate,$conToUpdate);



                        $this->response([
                            'status' => True,
                            'message' => 'Mandate has been cancelled successfully',
                            'data' => $mandateToCancel
                        ], REST_Controller::HTTP_OK);
                }else{
                        $this->response([
                            'status' => FALSE,
                            'message' => 'Failed to cancel mandate',
                        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            }else{

                $this->response([
                    'status' => FALSE,
                    'message' => 'Failed to get customer mandate details'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{

            $this->response([
                'status' => FALSE,
                "message" => "Mandate customer id is empty"
            ],REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function showDynamicSchedule_get()
    {
        $mandate_customer_id = $this->security->xss_clean($this->get('mandate_customer_id'));

        $con['conditions'] = array(
            'mandate_customer_id' => $mandate_customer_id,
            'is_active' => 1,
            'is_deleted' => 0,
        );

        if ($mandateCustData = $this->Crud_model->getRows('mandate_customers',$con,'row')) {
            // code...
            $this->response([
                'status' => TRUE,
                "message" => "Mandate customer data fetch successfully",
                "data" => $mandateCustData
            ],REST_Controller::HTTP_OK);
        }else{

            $this->response([
                'status' => FALSE,
                "message" => "Mandate customer data does no exist"
            ],REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


}


?>
