<?php


class Configuracoes extends CI_Controller {

	function __construct()
	{
			parent::__construct();

	}

function index(){

  $this->load->view('include/header');
   $this->load->view('configuracoes/configuracoes');
  $this->load->view('include/footer');
}
}
  ?>
