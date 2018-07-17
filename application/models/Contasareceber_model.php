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

  $this->db->select('*');
 $this->db->from('contasreceber');
 $this->db->where('forma_pgtonome', $status);

  return $this->db->get()->result_array();
}
  public function receberconta($id,$params){


    $this->db->set($params);
    $this->db->where('id',$id);
     $this->db->update('contasreceber');
  }
}
