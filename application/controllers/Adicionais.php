<?php


class Adicionais extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('Adicionais_model');

	}


  function index()
  {
			$data['adicionais'] =$this->Adicionais_model->get_all();
    $this->load->view('include/header');
     $this->load->view('Adicionais/index',$data);
    $this->load->view('include/footer');

  }


	function add(){

		$status='1';
		$params = array(

			'nomeadicional'=>$this->input->post('nomeadicional'),
			'valoradicional'=>$this->input->post('valoradicional'),

			'status'=>$status

		);
		$null=$this->Adicionais_model->add($params);
			redirect('adicionais/index');
	}
}
