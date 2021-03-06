<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Pdv_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


function buscaproduto($id){

  $this->db->select('*');

  $this->db->like('nomeproduto', $id);
//  $this->db->or();
 $this->db->or_like('codbarra', $id);
  $query = $this->db->get('produto');

  if($query->num_rows() > 0){

    return true;

  }
  else{
    return false;
  }
}

public function excluiritem($id){

  $this->db->delete('itenspdv',array('id'=>$id ));
  if ($this->db->affected_rows() == '1')
{
return TRUE;
}

return FALSE;
}

public function novavenda($params){


  $this->db->insert('pdv',$params);

return $this->db->insert_id();

}

public function desconto($idpdv,$valordesconto){

  $this->db->set('desconto',$valordesconto);
  $this->db->where('id',$idpdv);
   $this->db->update('pdv');
   if ($this->db->affected_rows() == '1')
{
  return TRUE;
}

return FALSE;
}

public function getpagamento($id){

  $this->db->select('*');
 $this->db->from('pagamentopdv');
 $this->db->where('idpdv', $id);

  return $this->db->get()->result_array();
}

public function pagamento($params){
  $this->db->insert('pagamentopdv',$params);

return $this->db->insert_id();
}

public function getvenda($id){

  $this->db->select('*');
 $this->db->from('pdv');
 $this->db->where('id', $id);

 $query = $this->db->get();

 if ($query->num_rows() == 1){


$row = $query->row();


return $row;
}
  }

  public function totalpedido($id){

    $sql = "SELECT sum(valor*qtdd) as total from itenspdv where idpdv='$id'";
    $query = $this->db->query($sql);
    $result = $query->row_array();

    return $result['total'];
  }

  function additem($params){

    $this->db->insert('itenspdv',$params);

  return $this->db->insert_id();

  }

  function getitens($id){
    $this->db->select('*');
   $this->db->from('itenspdv');
   $this->db->where('idpdv', $id);

    return $this->db->get()->result_array();
  }
}
