<?php


class Pizza extends CI_Controller {

	function __construct()
	{
			parent::__construct();
      $this->load->model('Vendas_model');
      $this->load->model('Categoria_model');
$this->load->model('Produto_model');
$this->load->model('Pizza_model');
	}

function index(){

  $this->load->view('include/header');
   $this->load->view('produto/pizza');
  $this->load->view('include/footer');
}
}
