<?php

defined('BASEPATH') OR exit('URL inválida');

class Delivery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
      //  $this->load->model('Delivery_model');
        $this->load->model('Produto_model');
        $this->load->model('Cliente_model');
    }
    public function index()
    {

        $this->load->view('include/header');
		 $this->load->view('delivery/index');
		$this->load->view('include/footer');


    }
}