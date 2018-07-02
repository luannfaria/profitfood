<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Vendas_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


public function get_all_mesas(){

  $sql = "select * from empresa";
  $query = $this->db->query($sql);
  $array = $query->result_array();
  return $array;
}

public function verificamesa($verificamesa){
  $this->db->select('*');
 $this->db->from('mesasabertas');
 $this->db->where('numeromesa', $verificamesa);

   if($this->db->get()->result_array()!=null){
     return TRUE;
   }
   else{
     return FALSE;
   }

}

public function statusmesa($status){

      $this->db->insert('mesasabertas',$status);

}

public function atualizaitem($id,$qtdd){

  $this->db->set('qtdd',$qtdd);
  $this->db->where('id',$id);
   $this->db->update('itenspedido');
   if ($this->db->affected_rows() == '1')
{
  return TRUE;
}

return FALSE;

}

public function pagamento($params){
  return    $this->db->insert('pagamentopedido',$params);
}
public function excluiritem($id){

  $this->db->delete('itenspedido',array('id'=>$id ));
  if ($this->db->affected_rows() == '1')
{
return TRUE;
}

return FALSE;
}

public function imprimiproduto($id){

  $sql = "select * from itenspedido where id='$id'";
  $query = $this->db->query($sql);
  $array = $query->result_array();
  return $array;

}
public function get_mesas_abertas(){
  $this->db->select('*');
 $this->db->from('mesasabertas');
 $this->db->order_by('numeromesa', 'ASC');

  return $this->db->get()->result_array();
}
public function getpedidoimprimir($id){
  $sql = "select * from pedidos where id='$id'";
  $query = $this->db->query($sql);
  $array = $query->result_array();
  return $array;
}
public function getitensimprimir($id){

  $sql = "select * from itenspedido where idpedido='$id'";
  $query = $this->db->query($sql);
  $array = $query->result_array();
  return $array;
}
public function novamesa($params){

  $this->db->insert('pedidos',$params);

return $this->db->insert_id();




}

public function getitenspedido($id){

  $this->db->select('*');
 $this->db->from('itenspedido');
 $this->db->where('pedido_id', $id);

  return $this->db->get()->result_array();


}





public function deleteitens($id){


    $this->db->delete('itenspedido',array('idpedido'=>$id));
    if ($this->db->affected_rows() != '0')
{
return TRUE;
}

return FALSE;

}

public function deletepedido($id){


      $this->db->delete('pedidos',array('id'=>$id));
      if ($this->db->affected_rows() != '0')
  {
  return TRUE;
  }

  return FALSE;



}

public function itensmesa($params){

  $this->db->insert('itenspedido',$params);



}

public function getmesa($id){
  $this->db->select('numeromesa');
 $this->db->from('pedidos');
 $this->db->where('id', $id);
  $query = $this->db->get();
  $row = $query->row();

  //$row will now have if you printed the contents:
  //print_r( $row );
  //stdClass Object ( [email] => example@gmail.com )

  //Pass $query->email directly to reset_password

  return $row->numeromesa;
}

public function gethora($id){
  $this->db->select('*');
 $this->db->from('pedidos');
 $this->db->where('id', $id);
  $query = $this->db->get();
  $row = $query->row();

  //$row will now have if you printed the contents:
  //print_r( $row );
  //stdClass Object ( [email] => example@gmail.com )

  //Pass $query->email directly to reset_password

  return $row->aberturapedido;
}
public function getpedido($pedido){

  $this->db->select('*');
 $this->db->from('pedidos');
 $this->db->where('id', $pedido);

 $query = $this->db->get();

 if ($query->num_rows() == 1){


$row = $query->row();


return $row->id;
 //Use row() to get a single result




}

}

public function getprodutoimprimir($id){

  $this->db->select('*');
 $this->db->from('itenspedido');
 $this->db->where('id', $id);

  return $this->db->get()->result();

}


public function getidpedido($idpedido){

  $this->db->select('*');
$this->db->from('pedidos');
$this->db->where('id', $idpedido);

$this->db->limit(1);

$query = $this->db->get();

if ($query->num_rows() == 1)
{
//Use row() to get a single result
$row = $query->row();

//$row will now have if you printed the contents:
//print_r( $row );
//stdClass Object ( [email] => example@gmail.com )

//Pass $query->email directly to reset_password

return $row->id;
}

}

  }
