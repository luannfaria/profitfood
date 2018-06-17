<?php

/**
 *
 */
class Fluxo_model extends CI_Model
{

  function __construct() {
      parent::__construct();
  }

public function add($fluxo) {


  $this->db->insert('fluxocaixa',$fluxo);
	return $this->db->insert_id();
}

public function get_total(){

  return $this->db->count_all("fluxocaixa");
}

public function addentrada($fluxo){

    $this->db->insert('fluxocaixa',$fluxo);

  if ($this->db->affected_rows() == '1')
  {
    return TRUE;
  }
else{
  return FALSE;
}
}

public function addsaida($fluxo){

    $this->db->insert('fluxocaixa',$fluxo);

  if ($this->db->affected_rows() == '1')
  {
    return TRUE;
  }
else{
  return FALSE;
}
}

public function getfluxo($table,$field,$data,$limit=0,$start=0,$one=false,$array='array'){
  $this->db->select($field);
  $this->db->from($table);
  $this->db->where('data',$data);
  $this->db->order_by('idfluxo','desc');
   $this->db->limit($limit,$start);



  $query = $this->db->get();

  $result =  !$one  ? $query->result() : $query->row();
  return $result;


}

}
