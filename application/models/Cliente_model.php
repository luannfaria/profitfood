<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


  function get_all_clientes(){

      $this->db->order_by('id', 'asc');
      return $this->db->get('cliente')->result_array();
    }


    public function autoCompleteCliente($q){

    		$this->db->select('*');
    		$this->db->limit(5);
    		$this->db->like('nome', $q);
    		$query = $this->db->get('cliente');
    		if($query->num_rows() > 0){
    				foreach ($query->result_array() as $row){
    						$row_set[] = array('label'=>$row['nome'],'id'=>$row['id'],'nome'=>$row['nome']);
    				}
    				echo json_encode($row_set);
    		}
    }

    function addcliente($params){

      $this->db->insert('cliente',$params);
      return $this->db->insert_id();
    }

    function update_cliente($id,$params){
      $this->db->where('id',$id);
      return $this->db->update('cliente',$params);
    }

  }
