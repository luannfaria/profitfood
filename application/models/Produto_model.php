<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Produto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get produto by id
     */

     public function autoCompleteProduto($q){

     		$this->db->select('*');

     		$this->db->like('nomeproduto', $q);
     		$query = $this->db->get('produto');
     		if($query->num_rows() > 0){
     				foreach ($query->result_array() as $row){
     						$row_set[] = array('label'=>$row['nomeproduto'].' | Preço: R$ '.$row['venda'].',00','id'=>$row['id'],'nomeproduto'=>$row['nomeproduto'],'venda'=>$row['venda']);
     				}
     				echo json_encode($row_set);
     		}
     }
    function get_produto($id)
    {
        return $this->db->get_where('produto',array('id'=>$id))->row_array();
    }

    /*
     * Get all produto count
     */
    function get_all_produto_count()
    {
        $this->db->from('produto');
        return $this->db->count_all_results();
    }

    /*
     * Get all produto
     */
    function get_all_produto()
    {

      $this->db->order_by('id', 'asc');
      return $this->db->get('produto')->result_array();


    }

    public function getprodutoscategorias($idcat){
      $sql = "select * from produto where categoria_id='$idcat'";
      $query = $this->db->query($sql);
      $array = $query->result_array();
      return $array;


  }

    /*
     * function to add new produto
     */
    function add_produto($params)
    {
        $this->db->insert('produto',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update produto
     */
    function update_produto($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('produto',$params);
    }

    /*
     * function to delete produto
     */
    function delete_produto($id)
    {
        return $this->db->delete('produto',array('id'=>$id));
    }
}
