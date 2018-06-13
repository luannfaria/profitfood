<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Categoria_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get categoriaproduto by id
     */
    function get_categoriaproduto($id)
    {
        return $this->db->get_where('categoria',array('id'=>$id))->row_array();
    }

    /*
     * Get all categoriaprodutos
     */
    function get_all_categoriaprodutos()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('categoria')->result_array();
    }

    /*
     * function to add new categoriaproduto
     */
    function add_categoriaproduto($params)
    {
        $this->db->insert('categoria',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update categoriaproduto
     */
    function update_categoriaproduto($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('categoria',$params);
    }

    /*
     * function to delete categoriaproduto
     */
    function delete_categoriaproduto($id)
    {
        return $this->db->delete('categoria',array('id'=>$id));
    }
}