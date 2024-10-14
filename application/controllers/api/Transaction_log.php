<?php
require APPPATH.'libraries/REST_Controller.php';


class Transaction_Log extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='transaction_log';

    }


    public function index_get($page = '')
    {
        // code...
        $mts_customer_id = $this->input->get('mts_customer_id'); 

           if($page!=''){
                 $limit = 10;
                 $offset = ($page - 1) * $limit;

            }
            else{
                $limit = 10000000000;
                $offset =0;
            }

           $option = array(
              'select'=> 'transaction_log.*, mandate_customers.customer_name, mandate_transaction_schedule.*,users.id,users.firstname,users.middlename,users.lastname',
              'table' =>'transaction_log',
              'left_join' => array(array(
                                'users' => 'users.id = transaction_log.transaction_user_id',
                                'mandate_transaction_schedule' => 'mandate_transaction_schedule.mts_id = transaction_log.transaction_table_row_id',

                                'mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_transaction_schedule.mts_customer_id',

                              )
                            ),
              // 'limit'=>array($limit=>$offset),
              'order'=>array('transaction_log.transaction_log_id'=>'DESC'),
              'where'=>array('mandate_transaction_schedule.mts_customer_id' => $mts_customer_id),

           );
        
           if($groups_row=$this->Crud_model->commonGet($option)) {


            foreach($groups_row as $key => $val) {

              if($val->transaction_current_data){
                $val->transaction_current_data =  json_decode($val->transaction_current_data);
              }
              if($val->transaction_previous_data){
                $val->transaction_previous_data =  json_decode($val->transaction_previous_data);
              }

            }
           
                $this->response([
                    "status" => TRUE,
                    "message" => "Logs Loaded Successfully.",
                    "data"=>$groups_row,
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
