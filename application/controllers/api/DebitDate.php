
<?php
require APPPATH.'libraries/REST_Controller.php';


class DebitDate extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='debitdate';

    }


    public function debitDateInsert_post($value='')
{
    $transactionDate = $this->security->xss_clean($this->post("transactionDate"));

    $data = array(
        'transactionDate' => $transactionDate,
        'created_by' => $this->session->userdata('id')
    );           

    // Insert data into the database
    if ($date_row = $this->Crud_model->insert('debitdate', $data)) {

        $this->response([
            "status" => TRUE,
            "message" => "Date added successfully.",
            "data" => $date_row
        ], REST_Controller::HTTP_OK);
        
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Error adding date. Please try again later."
        ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}


      

//     public function debitDateInsert_post($value='')
// {
   
//     $transactionDate = $this->security->xss_clean($this->post("transactionDate"));
//     $created_by = $this->session->userdata('id');


//     $data = array(
        
//         'transactionDate' =>$transactionDate,
     
//         'created_by'=> $this->session->userdata('id'),
      
//     );           

//     if($date_row = $this->Crud_model->insert('debitdate', $data)){
        
//         $this->response([
//             "status" => TRUE,
//             "message" => "Date Added successfully in Database.",
//             "data" => $date_row,
//             // "inputString" => $inputString
//         ], REST_Controller::HTTP_OK);
//     } else {
//         $this->response([
//             'status' => FALSE,
//             "message" => "Error in Date Adding in Database. Please verify and resubmit the details."
//         ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//     }
// }

public function delete_post($value='')
{
    # code...
 $id = $this->security->xss_clean($this->post("id"));

    if (!empty($id) && is_numeric($id)) {
        # code...


      $con['conditions'] = array(
              'id' => $id,
              'is_active' => 1,
              'is_delete' => 0
          
          );
    $data = array('is_delete' => 1 ,'is_active'=>0);

     if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
                  // Set the response and exit
        $this->response([
              "status" => TRUE,
              "message" => "Date delete successfully.",
              "data"=>$branches_row
          ], REST_Controller::HTTP_OK);

      }
      else{
          // Set the response and exit
        $this->response([
              'status' => FALSE,
              "message" => "Date not delete ."],
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
public function showDate_get($value = '')
{
    $option = array(
        'select' => 'debitdate.*',
        'table' => 'debitdate',
        'order'=>array('transactionDate'=>'ASC'),
        'where' => array(
            'is_active' => 1, 
            'is_delete' => 0, 
        ),
    );

    $lead_Branch_result = $this->Crud_model->commonGet($option);

    if ($lead_Branch_result) {
        $lead_Branch_name = array_column($lead_Branch_result, 'transactionDate');

        // DataTables requires data to be in 'data' key
        $this->response([
            "draw" => intval($this->input->get("draw")), // DataTables draw count
            "recordsTotal" => count($lead_Branch_result), // Total records, before filtering
            "recordsFiltered" => count($lead_Branch_result), // Total records, after filtering
            "data" => $lead_Branch_result, // Data array
        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            "draw" => intval($this->input->get("draw")), // DataTables draw count
            "recordsTotal" => 0, // Total records, before filtering
            "recordsFiltered" => 0, // Total records, after filtering
            "data" => NULL,
        ], REST_Controller::HTTP_OK);
    }
}

public function exportDateData_get() {
    $columnProperties = $this->input->get('columnProperties');
    $searchText = $this->input->get('searchText');

    // Your logic to fetch and filter the data based on column properties and search text
    $option = array(
        'select' => 'debitdate.*',
        'table' => 'debitdate',
        'order' => array('transactionDate' => 'ASC'),
        'where' => array(
            'is_active' => 1, 
            'is_delete' => 0, 
        ),
    );

    $lead_Branch_result = $this->Crud_model->commonGet($option);

    if ($lead_Branch_result) {
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

}