<?php
require APPPATH.'libraries/REST_Controller.php';


class Mandate_Log extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='mandate_log';

    }


    public function index_get($page = '')
    {
        // code...
        $mandate_customer_id = $this->input->get('mandate_customer_id'); 

           if($page!=''){
                 $limit = 10;
                 $offset = ($page - 1) * $limit;

            }
            else{
                $limit = 10000000000;
                $offset =0;
            }

           $option = array(
              'select'=> 'mandate_log.*,users.id,users.firstname,users.middlename,users.lastname,mandate_customers.customer_name',
              'table' =>'mandate_log',
              'left_join' => array(array(
                                'users' => 'users.id = mandate_log.mandate_log_user_id',
                                'mandate_customers' => 'mandate_customers.mandate_customer_id = mandate_log.mandate_table_row_id',
                              )
                            ),
              // 'limit'=>array($limit=>$offset),
              'order'=>array('mandate_log.mandate_log_id'=>'DESC'),
              'where'=>array('mandate_log.mandate_table_row_id' => $mandate_customer_id),

           );
        
           if($groups_row=$this->Crud_model->commonGet($option)) {


            foreach($groups_row as $key => $val) {

              if($val->mandate_current_data){
                $val->mandate_current_data =  json_decode($val->mandate_current_data);
              }
              if($val->mandate_previous_data){
                $val->mandate_previous_data =  json_decode($val->mandate_previous_data);
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
