<?php
require APPPATH.'libraries/REST_Controller.php';


class Designation extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='designations';

    }
    /////////////////// New Changes ////////////////////
    public function showDesignationData_get($page = '')
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
      
        $order_array=array('designations.designation_name' => 'ASC');
     

        $final_columnSearchValue = array();

        // $condition_amount = array();

        // $condition_emi_start_date = array();
        // $condition_emi_end_date = array();
        // $condition_mandate_register_date = array();

        $searchCondition = array();
                   
        foreach ($_GET['columns'] as $index => $column) {
            
            $columnSearchValue = $column['search']['value']; // Search value for the current column
            $columnData = $column['data']; // Search value for the current column
            $table_column_name = $column['name']; // Search value for the current column

             if($index==$order_column && $columnData!=null){
                
                $order_column_name = $column['data'];
                $order_column_name='designations.'.$order_column_name;
                $order_array=array($order_column_name => $order_sort_dir);

             }
           
            // Check if a search value is provided for the current column
            if (!empty($columnSearchValue)) {
                       
                        $filteredConditions = array();
    
                     

                             $searchCondition_filter = array(
                                $table_column_name.' REGEXP'=>'.*' . $columnSearchValue . '.*',
                            );

                         
                            $final_columnSearchValue [] =  $filteredConditions;
                     
                        
             }
           
        }

    
          $condition = array(
            'designations.is_active' => 1,
            'designations.is_deleted' => 0,
          //  'mandate_customers.mandate_status_message !=' => NULL,
          );
           
       

        if ($searchText) {
            $searchCondition = array(
                'designations.designation_name LIKE' => '%' . $searchText . '%',
                
            );
        }

                $option = array(
                  'select'=> 'designations.*',
                  'table' =>'designations',
                  'where' =>  $condition,
                  'or_where' =>  $searchCondition,
                  'filters' => $final_columnSearchValue,
                  'order' => $order_array,
                  'limit' => array($length => $start),
                  // 'where_in' => array('bank_branches.branch_id' => $this->session->userdata('user_permission_branch_id_array')),

            );

    
        $groups_row=$this->Crud_model->commonGet($option);
        if($groups_row){

                $conNumRows['conditions'] = array(
                                      
                    'designations.is_active' => 1,
                    'designations.is_deleted' => 0
              );

                  $optionCount = array(
                    'select'=> 'designations.*',
                    'table' =>'designations',
                    'where' =>  $condition,
                    'or_where' =>  $searchCondition,
                    'filters' => $final_columnSearchValue,
                    'order' => $order_array,
                  
              );

              $numRows = $this->Crud_model->commonGet_count($optionCount);
          $this->response([
                          "status" => TRUE,
                          "message" => "User Loaded Successfully.",
                          "data"=>$groups_row,
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



// ////////Export
public function exportDesignationData_get($value = '')
{
    $searchText = $this->security->xss_clean($this->get("searchText"));
    $columnProperties = $this->security->xss_clean($this->get("columnProperties"));

    $order_array = array('designations.id' => 'DESC');
    $final_columnSearchValue = array();
    $searchCondition = array();

    foreach ($columnProperties as $index => $column) {
        $columnSearchValue = $column['searchValue']; // Search value for the current column
        $table_column_name = $column['name']; // Search value for the current column

        // Check if a search value is provided for the current column
        if (!empty($columnSearchValue)) {
            $filteredConditions = array(
                $table_column_name . ' REGEXP' => '.*' . $columnSearchValue . '.*',
            );
            $final_columnSearchValue[] = $filteredConditions;
        }
    }

    $condition = array(
        'designations.is_active' => 1,
        'designations.is_deleted' => 0,
    );

    if ($searchText) {
        $searchCondition = array(
            'designations.designation_name LIKE' => '%' . $searchText . '%',
        );
    }

    $option = array(
        'select' => 'designations.*',
        'table' => 'designations',
        'where' => $condition,
        'or_where' => $searchCondition,
        'filters' => $final_columnSearchValue,
        'order' => $order_array,
    );

    $users_row = $this->Crud_model->commonGet($option);
    if ($users_row) {
        $this->response([
            "status" => TRUE,
            "message" => "Data Loaded Successfully.",
            "data" => $users_row,
        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "No Data Found.",
        ], REST_Controller::HTTP_OK);
    }
}


    // ///////////////

    public function index_get($page = '')
    {
        // code...

        $searchText = $this->security->xss_clean($this->get("searchTextDesignation"));
        $condition = array(
               'designations.is_active' => 1,
               'designations.is_deleted' => 0
               
           );

          if($searchText){

    
           $searchCondition=array(                                           
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
                'select'=> 'designations.*',
                'table' =>'designations',
                'where' =>  $condition,
                'or_where' =>  $searchCondition,
                'where'=> array(
              'is_active' => 1,
                    'is_deleted' => 0,
                ),
                'limit'=>array($limit=>$offset),
           );


          


           if($groups_row=$this->Crud_model->commonGet($option)) {

            $designation_name = array_column($groups_row, 'designation_name');
    
             array_multisort($designation_name, SORT_ASC, $groups_row);
               $conNumRows['conditions'] = array(
                              
                                  'is_active' => 1,
                                  'is_deleted' => 0,
                            );
                            $searchCondition=array(                                           
                              'designations.designation_name LIKE'=> '%'.$searchText.'%',            
                            );
                            $optionCount = array(
                              'select'=> 'designations.*',
                              'table' =>'designations',
                              'where' =>  $condition,
                              'or_where' =>  $searchCondition,
                              'where'=> array(
                            'is_active' => 1,
                                  'is_deleted' => 0,
                              ),
                              // 'limit'=>array($limit=>$offset),
                         );
                           $numRows = $this->Crud_model->commonGet_count($optionCount);

              $this->response([
                              "status" => TRUE,
                              "message" => "Designations Loaded Successfully.",
                              "data"=>$groups_row,
                                "total_rows" => $numRows,
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Designations Not Found.Please add some groups."],
                          REST_Controller::HTTP_OK);
           }
    }

   

     public function insert_post($value='')
  
    {
        # code...
        $designation_name  =  $this->security->xss_clean($this->post("designation_name"));
        $designation_organization_type  =  "BANK";
        $permission = $this->security->xss_clean($this->post("permission"));
        $con['conditions']=array(
          'designation_name' => $designation_name,
          'is_active' => 1,
          'is_deleted' => 0
      );


        if (!empty($designation_name) && !empty($permission) && !empty($designation_organization_type))  {
 
                

              $existing_branch = $this->Crud_model->getRows('designations', $con,'row');


              if ($existing_branch) {
                  // Branch with the same name already exists
                  $this->response([
                      'status'  => FALSE,
                      'message' => 'Designation with the same name already exists.'
                  ], REST_Controller::HTTP_CONFLICT);
                  return;
              }
       
                 $data = array(
                  'designation_name'    =>  $designation_name,
                  'designation_organization_type'    =>  $designation_organization_type,
                  'permission' => serialize($permission),
 
              );
             
              if($designation_row=$this->Crud_model->insert($this->table,$data)){
                            
                                $this->response([
                                  "status" => TRUE,
                                  "message" => "Designation Added successfully.",
                                  "data"=>$designation_row
                              ], REST_Controller::HTTP_OK);
    
                }
                 else{
                         $this->response([
                                  'status' => FALSE,
                                  "message" => "Please Fill Complete Information."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }
          }

          else{
            
             $this->response([
             'status' => FALSE,
             "message" => "Designation not Added."],REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
          }

    }


             public function row_get($value='')
            {
                // code...
                 $id = $this->security->xss_clean($this->get("id"));
                 if(!empty($id)){
                    $conGroup['conditions'] = array(
                                  'id' => $id,
                                  'is_active' => 1,
                                  'is_deleted' => 0
                    ); 

                    if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){

                      $this->response([
                                      "status" => TRUE,
                                      "message" => "Designation Loaded Successfully.",
                                      "data"=>$groups_row,
                                      "permissions"=>unserialize($groups_row->permission)
                                  ], REST_Controller::HTTP_OK); 
                   }
                   else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "Designation Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   }



                 }
                 else{
                     $this->response([
                                  'status' => FALSE,
                                  "message" => "Designation Not Found.Please try again."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                 }
               
            }

            public function update_post($value='')
            {
                 $id = $this->security->xss_clean($this->post("id"));
                 $designation_name = $this->security->xss_clean($this->post("designation_name"));
                 $designation_organization_type = "BANK";
                 $permission = $this->security->xss_clean($this->post("permission"));
                 if (!empty($id) && !empty($designation_name) && !empty($designation_organization_type))  {

                     $conGroup['conditions'] = array(
                                  'id' => $id,
                                  'is_active' => 1,
                                  'is_deleted' => 0
                    ); 

                    if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){
                        
                         $data = array(
                          'designation_name' => $designation_name,
                          'designation_organization_type' => $designation_organization_type,
                          'permission' => serialize($permission),
                      );
                     
                     if($branches_row=$this->Crud_model->update($this->table,$data,$conGroup)){
                                          // Set the response and exit
                                $this->response([
                                      "status" => TRUE,
                                      "message" => "Designation updated successfully.",
                                      "data"=>$branches_row
                                  ], REST_Controller::HTTP_OK);
                        
                              }
                              else{
                                  // Set the response and exit
                                $this->response([
                                      'status' => FALSE,
                                      "message" => "Designation not updated ."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                  
                              }

                    }
                   
                    else{
                                $this->response([
                                  'status' => FALSE,
                                  "message" => "Previous Designation Not Found.Please try again."],
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
                          'is_deleted' => 0,
                      
                      );
                $data = array('is_deleted' => 1 ,'is_active'=>0);

                 if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
                              // Set the response and exit
                    $this->response([
                          "status" => TRUE,
                          "message" => "Designation delete successfully.",
                          "data"=>$branches_row
                      ], REST_Controller::HTTP_OK);
            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Designation not delete ."],
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



}


?>
