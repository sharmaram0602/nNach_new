<?php
require APPPATH.'libraries/REST_Controller.php';


class Change_Log extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='change_logs';

    }


    public function index_get($page = '')
    {
        // code...
     
           if($page!=''){
                 $limit = 10;
                 $offset = ($page - 1) * $limit;

            }
            else{
                $limit = 10000000000;
                $offset =0;
            }

           $option = array(
              'select'=> 'change_logs.*,users.id,users.firstname,users.middlename,users.lastname',
              'table' =>'change_logs',
              'left_join' => array(array('users' => 'users.id = change_logs.log_user_id')),
              // 'limit'=>array($limit=>$offset),
              'order'=>array('DATE(change_logs.created_at)'=>'DESC'),
           );

           if($groups_row=$this->Crud_model->commonGet($option)) {

               $grouped_rows = array();

               $date_counts = array();

                foreach ($groups_row as $row=>$val) {


                    $date = date('d-m-Y', strtotime($val->created_at));

                    if (!isset($date_counts[$date])) {
                        $date_counts[$date] = 0;
                    }

                    $date_counts[$date]++;
                   
                    if($val->log_previous_data){
                      $val->log_previous_data = json_decode($val->log_previous_data);
                    }
                    
                    else{
                      $val->log_previous_data = NULL;
                    }

                    if($val->log_current_data){
                      $val->log_current_data = json_decode($val->log_current_data);
                    }
                    else{
                      $val->log_current_data = NULL;
                    }

                    $grouped_rows[$date]['num_rows'] = $date_counts[$date];
                    $grouped_rows[$date]['date'] = $date;

                    if (!isset($grouped_rows[$date][$val->log_event])) {
                        $grouped_rows[$date][$val->log_event] = array();
                    }

                     $log_events = ['INSERT', 'UPDATE', 'DELETE','OTHER']; 
                     foreach($log_events as $event){
                      if(!isset($grouped_rows[$date][$event])){
                        $grouped_rows[$date][$event] =array();


                      }
                     }// Add more if needed

                        // Add log event to the grouped rows
                      $grouped_rows[$date][$val->log_event][]= $val;
                }

              
                $optionCount = array(
                    'select'=>'change_logs.*',
                    'table' =>'change_logs',
                    'group_by' => 'DATE(change_logs.created_at)', // Group by date part only
                );
                $numRows = $this->Crud_model->commonGet_count($optionCount);
                $grouped_rows = array_values($grouped_rows);


               // $grouped_rows_count = array();
               
               //  foreach ($numRows as $row=>$val) {
               //     $date = date('Y-m-d', strtotime($row['created_at']));
                   
               //  }


              $this->response([
                              "status" => TRUE,
                              "message" => "Logs Loaded Successfully.",
                              "data"=>$grouped_rows,
                              "total_rows" => $numRows,
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Logs Not Found."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
    }

}


?>
