<?php

class Cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();



        $this->load->model('Cliente_model');
    }


    public function index()
    {

      $data['cliente'] = $this->Cliente_model->get_all_clientes();
      $this->load->view('include/header');
  		 $this->load->view('clientes/index',$data);
      $this->load->view('include/footer');
    }


    public function autoCompleteCliente(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Cliente_model->autoCompleteCliente($q);
        }

    }
    function add()
  	{
     date_default_timezone_set('America/Sao_Paulo');
        $datacadastro = date('d/m/Y');
      $status='1';
  		$params = array(

        'nome'=>$this->input->post('nome'),
        'telefone'=>$this->input->post('telefone'),
        'celular'=>$this->input->post('celular'),
        'rua'=>$this->input->post('endereco'),
        'numero'=>$this->input->post('numero'),
        'bairro'=>$this->input->post('bairro'),
        'status'=>$status,
        'data'=>$datacadastro
      );
      $null=$this->Cliente_model->addcliente($params);
        redirect('cliente/index');
    }

    function edit($id){

      $params = array(

        'nome'=>$this->input->post('nome'),
        'telefone'=>$this->input->post('telefone'),
        'celular'=>$this->input->post('celular'),
        'rua'=>$this->input->post('endereco'),
        'numero'=>$this->input->post('numero'),
        'bairro'=>$this->input->post('bairro'),
        'status'=>$this->input->post('status'),
        'data'=>$this->input->post('data')
      );



      $this->Cliente_model->update_cliente($id,$params);
      redirect('cliente/index');
    }
  }
