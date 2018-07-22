<?php

/**
 *
 */
class Contasareceber_model extends CI_Model
{

  function __construct() {
      parent::__construct();
  }

  public function add($params){

    $this->db->insert('contasreceber',$params);

  return $this->db->insert_id();
  }

  function getallcontasreceber(){

    $this->db->order_by('id', 'asc');
    return $this->db->get('contasreceber')->result_array();
  }


function busca($status){

     date_default_timezone_set('America/Sao_Paulo');
              $data = date('d/m/Y');
        if($status=='3'){
            
            $sql = "select * from contasreceber where datapgto != 0";
  $query = $this->db->query($sql);
  $array = $query->result_array();
  return $array;
            
        }
    
    if($status=='2'){
            
            $sql = "select * from contasreceber where datavenc < '$data' and datapgto = 0";
  $query = $this->db->query($sql);
  
  return $query->result_array();
            
        }


}
  public function receberconta($id,$params){


    $this->db->set($params);
    $this->db->where('id',$id);
     $this->db->update('contasreceber');
  }
}
