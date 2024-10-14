<?php
require APPPATH.'libraries/REST_Controller.php';


class Dashboard extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='mandate_customers';

    }


    public function showMandateList_get($page='')
    
{
    // $groups_row->all_log = json_decode($groups_row->all_log);mts_status_message


    if($page!=''){
        $limit = 10;
       $offset = ($page - 1) * $limit;

  }
  else{
      $limit = 10000000000;
      $offset =0;
  }

  $startDate = $this->security->xss_clean($this->get("startDate"));
  $endDate = $this->security->xss_clean($this->get("endDate"));
  $mts_status_message = $this->security->xss_clean($this->get("mts_status_message"));
  $mts_is_skipped = $this->security->xss_clean($this->get("mts_is_skipped"));
  $mts_id = $this->security->xss_clean($this->get("mts_id"));





  $conditionFilter['conditions'] = array();
  
  $dateFilter = '';
  

        if (empty($startDate) && empty($endDate) ) {
            $currentMonth = date('m');
            $currentYear = date('Y');

            $startDate = date("Y-m-01");
            $endDate = date("Y-m-t");

            $dateFilter = " AND mandate_transaction_schedule.mts_datetime BETWEEN '$startDate' AND '$endDate 23:59:59' AND ";
            $conditionFilter['conditions']=array_merge(
                $conditionFilter['conditions'], 
                array(
                    'mandate_transaction_schedule.mts_id' => $mts_id,

                     'mandate_transaction_schedule.mts_is_active' => 1,
                     'mandate_transaction_schedule.mts_is_deleted' => 0,
                    
                )
            );
        
        }
       
         if (!empty($startDate) && !empty($endDate)) {
             $dateFilter = " AND mandate_transaction_schedule.mts_datetime >= '$startDate' AND mandate_transaction_schedule.mts_datetime <= '$endDate 23:59:59'";
              
             $conditionFilter['conditions']=array_merge(
                 $conditionFilter['conditions'], 
                 array(

                     'mandate_transaction_schedule.mts_datetime >=' =>$startDate,
                     'mandate_transaction_schedule.mts_datetime <=' =>$endDate.' 23:59:59',            
                     'mandate_transaction_schedule.mts_is_active' => 1,
                     'mandate_transaction_schedule.mts_is_deleted' => 0,
                     
                 )
             );
             
         }

         
         if ($startDate == $endDate) {
             $startDate = date("Y-m-d", strtotime($startDate));
             $endDate = date("Y-m-d", strtotime($endDate));
             $dateFilter = " AND mandate_transaction_schedule.mts_datetime >= '$startDate 00:00:00' AND mandate_transaction_schedule.mts_datetime <= '$endDate 23:59:59'";

             $conditionFilter['conditions']=array_merge(
                 $conditionFilter['conditions'], 
                 array(
                    'mandate_transaction_schedule.mts_id' =>$mts_id ,

                     'mandate_transaction_schedule.mts_datetime >=' =>$startDate.' 00:00:00',
                     'mandate_transaction_schedule.mts_datetime <=' =>$endDate.' 23:59:59',                    
                     'mandate_transaction_schedule.mts_is_active' => 1,
                     'mandate_transaction_schedule.mts_is_deleted' => 0,
                 )

             );
         }

       

         if (!empty($mts_status_message) ) {

            if($mts_status_message==1){

                $dateFilter = " AND mandate_transaction_schedule.mts_is_skipped = '$mts_status_message' ";
             
                $conditionFilter['conditions']=array_merge(
                    $conditionFilter['conditions'], 
                    array(
                        
                        'mandate_transaction_schedule.mts_is_skipped' =>$mts_status_message,
                        'mandate_transaction_schedule.mts_is_active' => 1,
                        'mandate_transaction_schedule.mts_is_deleted' => 0,
                    )
                );


            }
            
            else{
               
                if($mts_status_message=="NOT_SCHEDULED"){


                    $dateFilter = " AND mandate_transaction_schedule.mts_status_message IS NULL ";
             
                    $conditionFilter['conditions']=array_merge(
                        $conditionFilter['conditions'], 
                        array(
                            // 'mandate_transaction_schedule.mts_status_message' => 'NOT_SCHEDULED',

                            'mandate_transaction_schedule.mts_status_message IS ' =>NULL,
                            'mandate_transaction_schedule.mts_is_active' => 1,
                            'mandate_transaction_schedule.mts_is_deleted' => 0,
                        )
                    );


                }
                
                else{

                    $dateFilter = " AND mandate_transaction_schedule.mts_status_message = '$mts_status_message' ";
             
                    $conditionFilter['conditions']=array_merge(
                        $conditionFilter['conditions'], 
                        array(
                            
                            'mandate_transaction_schedule.mts_status_message ' =>$mts_status_message,
                            'mandate_transaction_schedule.mts_is_active' => 1,
                            'mandate_transaction_schedule.mts_is_deleted' => 0,
                        )
                    );

                }

              

            }

        }
      

  $currentMonth = date('m');  // Get the current month
    $currentYear = date('Y');   // Get the current year

        $option = array(
            'select'=> 'mandate_customers.*,enach_banks.*,loan_types.*,bank_branches.branch_name,mandate_transaction_schedule.*,users.*,DATE(mandate_transaction_schedule.mts_datetime) as formatted_date',
            'table' =>'mandate_customers',
            'left_join'  => array(array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name','bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
                                 array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                                 array('users' => 'users.id = mandate_customers.created_by'), // Joining 'users' table
                                 array('loan_types' => 'loan_types.loan_type_id = mandate_customers.loan_type_id'), // Add this left join


                            ),

            'where' =>array('mandate_customers.is_active' => 1,
                            'mandate_customers.is_deleted' => 0,
                            'mandate_customers.mandate_status_message' => 'success', 
                            'MONTH(mandate_transaction_schedule.mts_datetime)' => $currentMonth,
                            'YEAR(mandate_transaction_schedule.mts_datetime)' => $currentYear,
                            
                           
                           
                            
                        ),
            // 'where' => ltrim($dateFilter, $conditionFilter . ' AND'),

            'order'=>array('mandate_customers.mandate_customer_id'=>'DESC'),
            'limit'=>array($limit=>$offset),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))


         );


   if($users_row=$this->Crud_model->commonGet($option))
   if($users_row){
    $all_log=json_decode($groups_row->all_log);  


    $conNumRows['conditions'] = array(
                              
        'mandate_customers.is_active' => 1,
        'mandate_customers.is_deleted' => 0,
       'mandate_customers.mandate_status_message' => 'success', 
        'MONTH(mandate_transaction_schedule.mts_datetime)' => $currentMonth,
        'YEAR(mandate_transaction_schedule.mts_datetime)' => $currentYear,
        

  );
  $optionCount = array(
    'select'=> 'mandate_customers.*,enach_banks.*,bank_branches.branch_name,mandate_transaction_schedule.*,users.*,DATE(mandate_transaction_schedule.mts_datetime) as formatted_date',
    'table' =>'mandate_customers',
    'left_join'  => array(array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name','bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
                         array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
                         array('users' => 'users.id = mandate_customers.created_by'), // Joining 'users' table

                    ),
    'where' =>array('mandate_customers.is_active' => 1,
                    'mandate_customers.is_deleted' => 0,
                    'mandate_customers.mandate_status_message' => 'success', 
                    'MONTH(mandate_transaction_schedule.mts_datetime)' => $currentMonth,
                    'YEAR(mandate_transaction_schedule.mts_datetime)' => $currentYear,

                ),
    // 'where' => ltrim($dateFilter, $conditionFilter . ' AND'),

    'order'=>array('mandate_customers.mandate_customer_id'=>'DESC'),
    // 'limit'=>array($limit=>$offset),
    'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))


 );
  $numRows = $this->Crud_model->commonGet_count($optionCount);


      $this->response([
                      "status" => TRUE,
                      "message" => "User Loaded Successfully.",
                      "data"=>$users_row,
                      "total_rows" => $numRows,
                      "all_log"=>$all_log,
                    //   "condition_Filter" => $condition_Filter


                  ], REST_Controller::HTTP_OK); 
   }
   else{
     $this->response([
                  'status' => FALSE,
                  "message" => "User Not Found.Please add User."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
   }

}

  
//     public function showMandateList_get($page='')
    
// {
//     // $groups_row->all_log = json_decode($groups_row->all_log);mts_status_message


//     if($page!=''){
//         $limit = 10;
//        $offset = ($page - 1) * $limit;

//   }
//   else{
//       $limit = 10000000000;
//       $offset =0;
//   }

//   $startDate = $this->security->xss_clean($this->get("startDate"));
//   $endDate = $this->security->xss_clean($this->get("endDate"));
// //   $mts_status_message = $this->security->xss_clean($this->get("mts_status_message"));

//   $conditionFilter['conditions'] = array();
//   $dateFilter = '';
//          if (!empty($startDate) && !empty($endDate)) {
//              $dateFilter = " AND mandate_transaction_schedule.mts_datetime >= '$startDate' AND mandate_transaction_schedule.mts_datetime <= '$endDate 23:59:59'";
              
//              $conditionFilter['conditions']=array_merge(
//                  $conditionFilter['conditions'], 
//                  array(
//                      'mandate_transaction_schedule.mts_datetime >=' =>$startDate,
//                      'mandate_transaction_schedule.mts_datetime <=' =>$endDate.' 23:59:59',
//                  )
//              );
             

//          }
//          elseif ($startDate == $endDate) {
//              $startDate = date("Y-m-d", strtotime($startDate));
//              $endDate = date("Y-m-d", strtotime($endDate));
//              $dateFilter = " AND mandate_transaction_schedule.mts_datetime >= '$startDate 00:00:00' AND mandate_transaction_schedule.mts_datetime <= '$endDate 23:59:59'";

//              $conditionFilter['conditions']=array_merge(
//                  $conditionFilter['conditions'], 
//                  array(
//                      'mandate_transaction_schedule.mts_datetime >=' =>$startDate.' 00:00:00',
//                      'mandate_transaction_schedule.mts_datetime <=' =>$endDate.' 23:59:59',
//                  )

//              );
//          }
//          elseif (empty($startDate) && empty($endDate)){
//             $startDate = null;
//             $endDate = null;
//             $condition_Filter['conditions'] = array_merge(
//                 $condition_Filter['conditions'],
//                 array(
//                     'mandate_transaction_schedule.mts_is_active >=' =>1,
//                      'mandate_transaction_schedule.mts_delete <=' =>0,
//                 )

//             );
//             echo "Conditions for empty start and end dates: ";
//             print_r($condition_Filter['conditions']);
//             // $condition_Filter = $this->Crud_model->commonGet($condition_Filter);
    
//         }
// //          if (empty($mts_status_message) || $mts_status_message === "ALL") {
// //             // Remove the condition for staff from $dateFilter
// //         } else {
// //             // If a specific staff is selected, include the condition for staff in $dateFilter
// //         $dateFilter  .= " AND mandate_transaction_schedule.mts_status_message  = '$mts_status_message'";
// //             $conditionFilter['conditions'] = array_merge(
// //                 $conditionFilter['conditions'],
// //                 array(
// //                     'mts_status_message' => $mts_status_message,
// //                 )
// //             );
// //     }




//   $currentMonth = date('m');  // Get the current month
//     $currentYear = date('Y');   // Get the current year

//         $option = array(
//             'select'=> 'mandate_customers.*,enach_banks.*,loan_types.*,bank_branches.branch_name,mandate_transaction_schedule.*,users.*,DATE(mandate_transaction_schedule.mts_datetime) as formatted_date',
//             'table' =>'mandate_customers',
//             'left_join'  => array(array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name','bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
//                                  array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
//                                  array('users' => 'users.id = mandate_customers.created_by'), // Joining 'users' table
//                                  array('loan_types' => 'loan_types.loan_type_id = mandate_customers.loan_type_id'), // Add this left join


//                             ),

//             'where' =>array('mandate_customers.is_active' => 1,
//                             'mandate_customers.is_deleted' => 0,
//                             // 'mandate_customers.mandate_status_message' => 'success', 
//                             'MONTH(mandate_transaction_schedule.mts_datetime)' => $currentMonth,
//                             'YEAR(mandate_transaction_schedule.mts_datetime)' => $currentYear,
                           
                           
                            
//                         ),
//             'where' => ltrim($dateFilter, ' AND'),

//             'order'=>array('mandate_customers.mandate_customer_id'=>'DESC'),
//             'limit'=>array($limit=>$offset),
//             'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))


//          );


//    if($users_row=$this->Crud_model->commonGet($option))
//    if($users_row){
//     $all_log=json_decode($groups_row->all_log);  


//     $conNumRows['conditions'] = array(
                              
//         'mandate_customers.is_active' => 1,
//         'mandate_customers.is_deleted' => 0,
//         // 'mandate_customers.mandate_status_message' => 'success', 
//         // 'MONTH(mandate_transaction_schedule.mts_datetime)' => $currentMonth,
//         // 'YEAR(mandate_transaction_schedule.mts_datetime)' => $currentYear,
        

//   );
//   $optionCount = array(
//     'select'=> 'mandate_customers.*,enach_banks.*,bank_branches.branch_name,mandate_transaction_schedule.*,users.*,DATE(mandate_transaction_schedule.mts_datetime) as formatted_date',
//     'table' =>'mandate_customers',
//     'left_join'  => array(array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name','bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id'),
//                          array('mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id'),
//                          array('users' => 'users.id = mandate_customers.created_by'), // Joining 'users' table

//                     ),
//     'where' =>array('mandate_customers.is_active' => 1,
//                     'mandate_customers.is_deleted' => 0,
//                     // 'mandate_customers.mandate_status_message' => 'success', 
//                     'MONTH(mandate_transaction_schedule.mts_datetime)' => $currentMonth,
//                     'YEAR(mandate_transaction_schedule.mts_datetime)' => $currentYear,

//                 ),
//     'where' => ltrim($dateFilter, ' AND'),

//     'order'=>array('mandate_customers.mandate_customer_id'=>'DESC'),
//     // 'limit'=>array($limit=>$offset),
//     'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array'))


//  );
//   $numRows = $this->Crud_model->commonGet_count($optionCount);


//       $this->response([
//                       "status" => TRUE,
//                       "message" => "User Loaded Successfully.",
//                       "data"=>$users_row,
//                       "total_rows" => $numRows,
//                       "all_log"=>$all_log,
//                     //   "condition_Filter" => $condition_Filter


//                   ], REST_Controller::HTTP_OK); 
//    }
//    else{
//      $this->response([
//                   'status' => FALSE,
//                   "message" => "User Not Found.Please add User."],
//                   REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//    }

// }

///Total Customer
public function TotalCustomer_get($value = '')
{
    $option = array(
        'select' => 'COUNT(mandate_customers.mandate_customer_id) as total_mandate_customers',
        
        'table' => 'mandate_customers',
          'left_join' => array(
                // array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
        'where' => array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            // 'mandate_customers.mandate_status_code !=' => 392, 
            
            'mandate_customers.mandate_status_message !=' => NULL,
            // 'mandate_transaction_schedule.mts_status_code' => 300,

        ),
      
        'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
      
        'single' => TRUE,
    );

    if ($total_mandate_customers_result = $this->Crud_model->commonGet($option)) {
        
        $this->response([
            "status" => TRUE,
            "message" => "Total Customers Count Loaded Successfully.",
            "total_mandate_customers_count" => $total_mandate_customers_result->total_mandate_customers

        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Failed to retrieve Total Customers Count."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}


///to show filed 
public function showfailure_get($value = '')
{
    $user_id = $this->session->userdata('id');

    $option = array(
        'select' => 'mandate_customers.mandate_status_message, COUNT(*) AS total_count',
        'table' => 'mandate_customers',
        'left_join' => array(
            // array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
            array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
        ),
        'where' => array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'mandate_customers.mandate_status_message' => 'failure', // Adjust the status code accordingly
        ),
        'group_by' => 'mandate_customers.mandate_status_message',
       'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

    );

    if ($resultStatus = $this->Crud_model->commonGet($option)) {
        if ($resultStatus) {
            $this->response([
                'status' => TRUE,
                'message' => 'Status retrieved successfully.',
                'data' => $resultStatus
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Failed to retrieve Status.'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}


///to show filed 
public function showUserAborted_get($value = '')
{
    $user_id = $this->session->userdata('id');

    $option = array(
        'select' => 'mandate_customers.mandate_status_message, COUNT(*) AS total_count',
        'table' => 'mandate_customers',
        'left_join' => array(
            // array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
            array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
        ),
        'where' => array(
            'mandate_customers.is_active' => 1,
            'mandate_customers.is_deleted' => 0,
            'mandate_customers.mandate_status_message' => 'User Aborted', // Adjust the status code accordingly
        ),
        'group_by' => 'mandate_customers.mandate_status_message',
       'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

    );

    if ($resultStatus = $this->Crud_model->commonGet($option)) {
        if ($resultStatus) {
            $this->response([
                'status' => TRUE,
                'message' => 'Status retrieved successfully.',
                'data' => $resultStatus
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Failed to retrieve Status.'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}


/// to show success
public function LeadByStatusEmpp_get($value = '')
{
    
    $user_id = $this->session->userdata('id');

    // $option = array(
    //     // 'select' => 'mandate_customers.mandate_status_message,mandate_transaction_schedule.*, mandate_customers.mandate_status_code, COUNT(*) AS total_count',
    //     'select' => 'mandate_transaction_schedule.*, COUNT(*) AS total_count',

    //     // 'table' => 'mandate_customers',
    //     'table' => 'mandate_transaction_schedule',

    //     'left_join' => array( 
    //         array('enach_banks' => 'enach_banks.enach_bank_id = mandate_customers.bank_name'),
    //         array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
    // ),
    //     'where' => array(
    //         'mandate_transaction_schedule.mts_is_active' => 1,
    //         'mandate_transaction_schedule.mts_is_deleted' => 0,
    //         'mandate_transaction_schedule.mts_status_message' =>'I',
    //         // // 'mandate_customers.staff_id' => $user_id,
    //         // 'mandate_customers.mandate_status_code' => 300,


    //     ),
    //      'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

    //     // 'group_by' => 'mandate_customers.mandate_status_code, mandate_customers.mandate_status_message',
    //     'group_by' => 'mandate_transaction_schedule.mts_status_code, mandate_transaction_schedule.mts_status_message',

    // );
    
    $currentDate = date('Y-m-d'); // Convert current date to MySQL format


    $option = array(
            'select' => 'mandate_customers.*, COUNT(*) AS total_count',
            'table' => 'mandate_customers',
            'left_join' => array(
                array('bank_branches' => 'bank_branches.branch_id = mandate_customers.branch_id')
            ),
             'where' => array(
                    'mandate_customers.is_active' => 1,
                    'mandate_customers.is_deleted' => 0,
                    'mandate_customers.mandate_status_message' => 'success',
                    'STR_TO_DATE(mandate_customers.customer_start_date, "%d-%m-%Y") <=' => $currentDate,
                    'STR_TO_DATE(mandate_customers.customer_end_date, "%d-%m-%Y") >=' => $currentDate,
                ),
            'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),
    );

    if ($resultStatus = $this->Crud_model->commonGet($option)) {
        if ($resultStatus) {
            $this->response([
                'status' => TRUE,
                'message' => 'Status retrieved successfully.',
                'data' => $resultStatus
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Failed to retrieve Status.'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

///to show closed status

public function showclosed_get($value = '')
{
    // $user_id = $this->session->userdata('id');

    // $option = array(
    //     'select' => 'mandate_transaction_schedule.*, COUNT(*) AS total_count', 
    //     'table' => 'mandate_transaction_schedule',
    //     'where' => array(
    //         'mandate_transaction_schedule.mts_is_active' => 1,
    //         'mandate_transaction_schedule.mts_is_deleted' => 0,
    //         'mandate_transaction_schedule.mts_status_code' => 300,
    //     ),
    //     'group_by' => 'mandate_transaction_schedule.mts_customer_id',
    // );

    $currentDate = date('Y-m-d');

   $this->db->select('mandate_customers.mandate_customer_id, mandate_transaction_schedule.mts_status_message, count(mandate_transaction_schedule.mts_customer_id) as total_schedules');
    $this->db->select('COUNT(CASE WHEN mandate_transaction_schedule.mts_status_message = "S" THEN 1 END) as successful_schedules');
    $this->db->from('mandate_customers');
    $this->db->join('mandate_transaction_schedule', 'mandate_transaction_schedule.mts_customer_id = mandate_customers.mandate_customer_id', 'left');
    $this->db->where('mandate_customers.is_active', 1);
    $this->db->where('mandate_customers.is_deleted', 0);
    $this->db->where('mandate_customers.mandate_status_message', 'success');
    $this->db->where('STR_TO_DATE(mandate_customers.customer_end_date, "%d-%m-%Y") <=', $currentDate);
    $this->db->group_by('mandate_customers.mandate_customer_id');
    $this->db->having('successful_schedules = total_schedules');
    $this->db->having('successful_schedules >', 0); // Ensure successful_schedules is not 0
    $query = $this->db->get();

    $total_closed=0;

    $resultStatus = $query->result();
    
    if($resultStatus){
       $total_closed= count($resultStatus);
        }


    // if ($resultStatus) {
  

        $this->response([
            'status' => TRUE,
            'message' => 'Data retrieved successfully.',
            'total_count' =>  $total_closed,
        ], REST_Controller::HTTP_OK);
    // } 

    // else {
    //     $this->response([
    //         'status' => FALSE,
    //         'message' => 'Failed to retrieve data.'
    //     ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    // }
}


// public function showclosed_get($value = '')
// {
//     $user_id = $this->session->userdata('id');

//     $option = array(
//         'select' => 'mandate_transaction_schedule.*, COUNT(*) AS total_count', 
//         'table' => 'mandate_transaction_schedule',
//         'where' => array(
//             'mandate_transaction_schedule.mts_is_active' => 1,
//             'mandate_transaction_schedule.mts_is_deleted' => 0,
//             'mandate_transaction_schedule.mts_status_code' => 300, 
            

//         ),
//         'group_by' => 'mandate_transaction_schedule.mts_status_message',
//     );

//     if ($resultStatus = $this->Crud_model->commonGet($option)) {
//         $mts_all_log=json_decode($groups_row->mts_all_log);  

//         if ($resultStatus) {
//             $this->response([
//                 'status' => TRUE,
//                 'message' => 'Data retrieved successfully.',
//                 'data' => $resultStatus,
//                 "mts_all_log"=>$mts_all_log,

//             ], REST_Controller::HTTP_OK);
//         } else {
//             $this->response([
//                 'status' => FALSE,
//                 'message' => 'Failed to retrieve data.'
//             ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//         }
//     }
// }



}