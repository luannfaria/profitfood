<?php

/**
 *
 */
class Contasapagar_model extends CI_Model
{

  function __construct() {
      parent::__construct();
  }


public function getallcontasapagar(){

  $this->db->order_by('id', 'asc');
  return $this->db->get('contaspagar')->result_array();
}

public function receberconta($id,$params){


  $this->db->set($params);
  $this->db->where('id',$id);
   $this->db->update('contaspagar');
}

public function add($params){

  $this->db->insert('contaspagar',$params);

return $this->db->insert_id();
}
}
