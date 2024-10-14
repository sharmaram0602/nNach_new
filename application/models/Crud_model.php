<?php
class Crud_model extends CI_Model
{
  
    function getRows($table,$params = array(),$record=''){

      $this->db->from($table);
      //fetch data by conditions
      if(array_key_exists("conditions",$params)){
          foreach($params['conditions'] as $key => $value){
              $this->db->where($key,$value);
          }
      }
    
        $data=$this->db->get();
        if ($data->num_rows()>0) {
            
            if ($record=='row') {
                # code...
                return $data->row();
            }
            else{
                return $data->result();
            }
            
        }
        else
        {
          return false;
        }
  
  }
///Mandate log insert

///
   public function change_log_insert($table,$data = array()){
         $this->db->insert($table, $data);
   }
   public function mandate_log_insert($table, $data = array()) {
    $this->db->insert($table, $data);
}

public function transaction_log_insert($table, $data = array()) {
    $this->db->insert($table, $data);
}


   public function insert($table,$data = array()){
    $this->db->insert($table, $data);
        if ($this->db->affected_rows() >0) {

          
        $insert_id = $this->db->insert_id();
        $user_id = $this->session->userdata('id');  
        $table_name = $table;
        

        // foreach ($data as $column_name => $value) {

            $log_data = array(
                'log_table' => $table_name,
                'log_table_row_id' => $insert_id,
                'log_user_id' => $user_id,
                'log_event' => 'INSERT',
                'log_current_data' =>  json_encode($data),
            );

           $this->Crud_model->change_log_insert('change_logs', $log_data);
       
           if($table=="mandate_customers"){
            $mandate_log_data = array(
                'mandate_log_table' => $table_name,
                'mandate_table_row_id' => $insert_id,
                'mandate_log_user_id' => $user_id,
                'mandate_log_event' => 'INSERT',
                'mandate_current_data' => json_encode($data),
            );
                 $this->Crud_model->mandate_log_insert('mandate_log', $mandate_log_data);
                //  $this->Crud_model->mandate_log_insert($table, $log_data);
           }

           if($table=="mandate_transaction_schedule"){
            $transaction_log_data = array(
                'transaction_log_table' => $table_name,
                'transaction_table_row_id' => $insert_id,
                'transaction_user_id' => $user_id,
                'transaction_event' => 'INSERT',
                'transaction_current_data' => json_encode($data),
            );
                $this->Crud_model->transaction_log_insert('transaction_log', $transaction_log_data);
            }
       
        // }

          return $insert_id;

        }

        else{

         return false;

        }

  }


  public function update($table, $data = array(), $params = array()) {

        $existing_row=null;
        $user_id=null;

        if($this->session->userdata('id')){
          $user_id = $this->session->userdata('id');
        }
        
        $mandate_customer_id = null;

        if ($table == "mandate_customers" ) {
           
                if(isset($params['conditions']['mandate_customer_id'])){
                    $mandate_customer_id = $params['conditions']['mandate_customer_id'];
                    
                    $conGroup=array(
                        'mandate_customer_id' => $mandate_customer_id,
                        'is_active' => 1,
                        'is_deleted' => 0
                    );
                
                    $this->db->from($table);

                    if(array_key_exists("conditions",$params)){
                        foreach($params['conditions'] as $key => $value){
                            $this->db->where($key,$value);
                        }
                    }

                    //fetch data by conditions
                    $dataexe=$this->db->get();

                    if ($dataexe->num_rows()>0) {
                        $existing_row = $dataexe->row();
                    }
                
                    $changed_columns = array();
                
                    foreach ($data as $key => $value) {
                        // if ($existing_row->$key !== $value) {
                            $changed_columns[$key] = $existing_row->$key;
                        // }
                    }
                
                    if (!empty($changed_columns)) {

                        $mandate_log_data = array(
                            'mandate_log_table' => $table,
                            'mandate_table_row_id' => $mandate_customer_id,
                            'mandate_log_user_id' => $user_id,
                            'mandate_log_event' => 'UPDATE',
                            'mandate_previous_data' => json_encode($changed_columns), 
                            'mandate_current_data' => json_encode($data), // Only store the current data for updated columns
                            'mandate_column_name' => implode(',', array_keys($changed_columns))
                        );
                        $this->Crud_model->mandate_log_insert('mandate_log', $mandate_log_data);
                    }
                }
            
        }
        else if ($table == "mandate_transaction_schedule") {
           
            if(isset($params['conditions']['mts_id'])){
            
              $mandate_customer_id = $params['conditions']['mts_id'];
            

            $this->db->from($table);

             if(array_key_exists("conditions",$params)){
                foreach($params['conditions'] as $key => $value){
                    $this->db->where($key,$value);
                }
             }

            //fetch data by conditions
            $transactiondataexe=$this->db->get();

            if ($transactiondataexe->num_rows()>0) {
                $transactionexisting_row =   $transactiondataexe->row();
            }

            $transactionchanged_columns = array();
        
            foreach ($data as $key => $value) {
                // if ($existing_row->$key !== $value) {
                    $transactionchanged_columns[$key] = $transactionexisting_row->$key;
                // }
            }
        
        // Log changes if there are any
        if (!empty($transactionchanged_columns)) {
            $transaction_log_data = array(
                'transaction_log_table' => $table,
                'transaction_table_row_id' => $mandate_customer_id,
                'transaction_user_id' => $user_id,
                'transaction_event' => 'UPDATE',
                'transaction_previous_data' => json_encode($transactionchanged_columns),
                'transaction_current_data' => json_encode($data),
                'transaction_column_name' => implode(', ', array_keys($transactionchanged_columns))
            );
            $this->Crud_model->transaction_log_insert('transaction_log', $transaction_log_data);
        }
           
            }
        }
        else{

            // $log_data = array(
            //     'log_table' => $table,
            //     'log_table_row_id' => $mandate_customer_id,
            //     'log_user_id' => $user_id,
            //     'log_event' => 'UPDATE',
            //     'log_current_data' => json_encode($data),
            // );
            // $this->Crud_model->change_log_insert('change_logs', $log_data);
        }

        $this->db->from($table);
        if(array_key_exists("conditions",$params)){
            foreach($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        $this->db->update($table, $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }



  public function delete($table,$params = array()){

   if(array_key_exists("conditions",$params)){
          foreach($params['conditions'] as $key => $value){
              $this->db->where($key,$value);
          }
      }
      
    $this->db->delete($table);
    if ($this->db->affected_rows() >0) {
    # code...
      return true;
    }
    else{

     return false;

    }

  }
  public function commonGet_count($options) {
            $select = false;
            $table = false;
            $join = false;
            $order = false;
            $limit = false;
            $offset = false;
            $where = false;
            $or_where = false;
            $single = false;
            $where_not_in = false;
            $where_in = false;
            $like = false;
            $group_by = false;
            $left_join= false;
            $having= false;
            $filters= false;
            $custom_where3 = false;
            $custom_where2 = false;

            extract($options);
            
            if ($select != false)
                $this->db->select($select);

            if ($table != false)
                $this->db->from($table);

            if ($where != false)
                $this->db->where($where);

             if($or_where!=false){
                $this->db->group_start();
                foreach ($or_where as $key => $value) {
                    $this->db->or_where($key, $value);
                 }
                 $this->db->group_end();

            }

             if($filters!=false){
                 $this->db->group_start();
                foreach ($filters as $key => $value) {
                    $this->db->group_start();
                     foreach ($value as $key_1 => $value_1) {
                        $this->db->or_where($key_1, $value_1);
                    }
                   $this->db->group_end();
                }
              $this->db->group_end();

            }


            if($having!=false){

                 $this->db->having($having);

            }

                  

            if ($where_not_in != false) {
                foreach ($where_not_in as $key => $value) {
                    if (count($value) > 0)
                        $this->db->where_not_in($key, $value);
                }
            }

            if ($where_in != false) {
                foreach ($where_in as $key => $value) {
                    if (count($value) > 0)
                        $this->db->where_in($key, $value);
                }
            }

            if($custom_where2!=false)
            {
                $this->db->group_start();
                foreach ($custom_where2 as $key => $value) {
                    $this->db->where($key, $value);
                 }
                 $this->db->group_end();

            }

            if($custom_where3!=false)
            {
                $this->db->or_group_start();
                foreach ($custom_where3 as $key => $value) {
                    $this->db->where($key, $value);
                 }
                 $this->db->group_end();

            }

            if ($like != false) {
                $this->db->like($like);
            }

         

            if ($limit != false) {

                if (!is_array($limit)) {
                    $this->db->limit($limit);
                } else {
                    foreach ($limit as $limitval => $offset) {
                        $this->db->limit($limitval, $offset);
                    }
                }
            }


            if ($order != false) {

                foreach ($order as $key => $value) {

                    if (is_array($value)) {
                        foreach ($order as $orderby => $orderval) {
                            $this->db->order_by($orderby, $orderval);
                        }
                    } else {
                        $this->db->order_by($key, $value);
                    }
                }
            }


            if ($join != false) {
                
                foreach($join as $key1 => $value1){
                
                    foreach ($value1 as $key => $value) {
    
                        if (is_array($value)) {
    
                            if (count($value) == 3) {
                                $this->db->join($value[0], $value[1], $value[2]);
                            } else {
                                foreach ($value as $key1 => $value1) {
                                    $this->db->join($key1, $value1);
                                }
                            }
                        } else {
                            $this->db->join($key, $value);
                        }
                    }
                }    
            }

            if ($left_join != false) {
                
                foreach($left_join as $key1 => $value1){
                
                    foreach ($value1 as $key => $value) {
    
                        if (is_array($value)) {
    
                            if (count($value) == 3) {
                                $this->db->join($value[0], $value[1], $value[2], 'left');
                            } else {
                                foreach ($value as $key1 => $value1) {
                                    $this->db->join($key1, $value1, 'left');
                                }
                            }
                        } else {
                            $this->db->join($key, $value, 'left');
                        }
                    }
                }    
            }
           if ($group_by != false) {
              $this->db->group_by($group_by);
           }
           

            $query = $this->db->get();

            if ($single) {
                return $query->num_rows();
            }


            return $query->num_rows();

        }



  public function commonGet($options) {
            $select = false;
            $table = false;
            $join = false;
            $order = false;
            $limit = false;
            $offset = false;
            $where = false;
            $or_where = false;
            $single = false;
            $where_not_in = false;
            $where_in = false;
            $like = false;
            $group_by = false;
            $left_join= false;
            $having= false;
            $filters= false;
            $custom_where= false;
            $custom_where2 = false;
            $custom_where3 = false;

            extract($options);
            
            if ($select != false)
                $this->db->select($select);

            if ($table != false)
                $this->db->from($table);

            if ($where != false)
                $this->db->where($where);

            // if($or_where!=false)
            //     $this->db->or_where($or_where);
            if($or_where!=false){
                $this->db->group_start();
                foreach ($or_where as $key => $value) {
                    $this->db->or_where($key, $value);
                 }
                 $this->db->group_end();

            }

            if($filters!=false){
                 $this->db->group_start();
                foreach ($filters as $key => $value) {
                    $this->db->group_start();
                     foreach ($value as $key_1 => $value_1) {
                        $this->db->or_where($key_1, $value_1);
                    }
                   $this->db->group_end();
                }
              $this->db->group_end();

            }

            if($custom_where!=false){
                $this->db->where($custom_where, null, false);
            }

            if($custom_where2!=false)
            {
                $this->db->group_start();
                foreach ($custom_where2 as $key => $value) {
                    $this->db->where($key, $value);
                 }
                 $this->db->group_end();

            }

            if($custom_where3!=false)
            {
                $this->db->or_group_start();
                foreach ($custom_where3 as $key => $value) {
                    $this->db->where($key, $value);
                 }
                 $this->db->group_end();

            }

            if ($where_not_in != false) {
                foreach ($where_not_in as $key => $value) {
                    if (count($value) > 0)
                        $this->db->where_not_in($key, $value);
                }
            }

            if ($where_in != false) {
                foreach ($where_in as $key => $value) {
                    if (count($value) > 0)
                        $this->db->where_in($key, $value);
                }
            }

            if ($like != false) {
                $this->db->like($like);
            }

            // if ($or_where != false)
            //     $this->db->or_where($or_where);

            if ($limit != false) {

                if (!is_array($limit)) {
                    $this->db->limit($limit);
                } else {
                    foreach ($limit as $limitval => $offset) {
                        $this->db->limit($limitval, $offset);
                    }
                }
            }


            if ($order != false) {

                foreach ($order as $key => $value) {

                    if (is_array($value)) {
                        foreach ($order as $orderby => $orderval) {
                            $this->db->order_by($orderby, $orderval);
                        }
                    } else {
                        $this->db->order_by($key, $value);
                    }
                }
            }


            if($having!=false){

                 $this->db->having($having);

            }


            if ($join != false) {
                
                foreach($join as $key1 => $value1){
                
                    foreach ($value1 as $key => $value) {
    
                        if (is_array($value)) {
    
                            if (count($value) == 3) {
                                $this->db->join($value[0], $value[1], $value[2]);
                            } else {
                                foreach ($value as $key1 => $value1) {
                                    $this->db->join($key1, $value1);
                                }
                            }
                        } else {
                            $this->db->join($key, $value);
                        }
                    }
                }    
            }

            // left join
            if ($left_join != false) {
                
                foreach($left_join as $key1 => $value1){
                
                    foreach ($value1 as $key => $value) {
    
                        if (is_array($value)) {
    
                            if (count($value) == 3) {
                                $this->db->join($value[0], $value[1], $value[2], 'left');
                            } else {
                                foreach ($value as $key1 => $value1) {
                                    $this->db->join($key1, $value1, 'left');
                                }
                            }
                        } else {
                            $this->db->join($key, $value, 'left');
                        }
                    }
                }    
            }
            
           if ($group_by != false) {
              $this->db->group_by($group_by);
           }
           

            $query = $this->db->get();

            if ($single) {
                return $query->row();
            }


            return $query->result();

        }


        // public function getUserGroupByUserId($user_id) 
        //     {
        //         $sql = "SELECT * FROM user_group 
        //         INNER JOIN designations ON designations.id = user_group.group_id 
        //         WHERE user_group.user_id = ?";
        //         $query = $this->db->query($sql, array($user_id));
        //         $result = $query->row_array();

        //         return $result;

        //     }


        public function getUserGroupByUserId($user_id) 
            {

            $this->db->from('users');
            $this->db->where('id',$user_id);
            $data=$this->db->get();
           
            return $data->row();

        }

            function numRowsCount($table,$params = array()){

                $this->db->from($table);
                //fetch data by conditions
                if(array_key_exists("conditions",$params)){
                    foreach($params['conditions'] as $key => $value){
                        $this->db->where($key,$value);
                    }
                }
              
                  $data=$this->db->get();
                  if ($data->num_rows()>0) {
                      
                      return $data->num_rows();
                    
                      
                  }
                  else
                  {
                    return false;
                  }

            }


}
?>