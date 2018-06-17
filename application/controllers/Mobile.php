<?php


class Mobile extends CI_Controller {

	function __construct()
	{
			parent::__construct();
      $this->load->model('Vendas_model');
      $this->load->model('Categoria_model');
$this->load->model('Produto_model');
	}

function index(){

  $data['categorias'] = $this->Categoria_model->get_all_categoriaprodutos();
  $data['mesasaberta'] = $this->Vendas_model->get_mesas_abertas();
 $data['mesas'] = $this->Vendas_model->get_all_mesas();

   $this->load->view('mobile/mobile',$data);

}

function getprodutoscategorias(){
  $idcat = $this->input->post('idcat');

  $data['result']=$this->Produto_model->getprodutoscategorias($idcat);

echo (json_encode($data));

}
}
