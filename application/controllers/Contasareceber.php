<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Contasareceber extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('dashboard/index');
}
      $this->load->model('Cliente_model');

        $this->load->model('Contasareceber_model');
    }


public function index(){

 $data['contasreceber'] =$this->Contasareceber_model->getallcontasreceber();
  $data['clientes']= $this->Cliente_model->get_all_clientes();

  $this->load->view('include/header');
  $this->load->view('contasareceber/index',$data);
  $this->load->view('include/footer');

}

public function add(){

  $valor= str_replace("," , "." ,$this->input->post('valor'));
    $params = array(
        'descricao'=>$this->input->post('descricao'),
        'valor'=>$valor,
          'cliente_id'=>$this->input->post('cliente'),
        'numerodoc'=>$this->input->post('numero'),
        'datavenc'=>$this->input->post('vencimento')

    );


      $null=$this->Contasareceber_model->add($params);

      redirect('contasareceber/index');
}


public function busca(){

  $status = $this->input->post('statusrec');

  $data['$contasreceber'] = $this->Contasareceber_model->busca($status);

  $this->load->view('include/header');
  $this->load->view('contasareceber/index',$data);
  $this->load->view('include/footer');

}
public function recebeconta($id){


  $valorpago = str_replace("," , "." ,$this->input->post('valorpago'));
    $params = array(
      'forma_pgtonome'=>$this->input->post('formarecebimento'),
        'datapgto'=>$this->input->post('datapgto'),
        'valorpgto'=> $valorpago,

    );

    $null = $this->Contasareceber_model->receberconta($id,$params);


    $tipomov='1';
    $descricao = "RECEBIMENTO REF ". $this->input->post('descricaoconta');
      $fluxo = array(
          'forma'=> $this->input->post('formarecebimento'),
          'data'=>$this->input->post('datapgto'),
          'valor'=>$valorpago,
          'descricao'=>$descricao,
          'tipomov'=>$tipomov
      );

    $this->load->model('Fluxo_model');
      $this->Fluxo_model->add($fluxo);

    redirect('contasareceber/index');

}
  }
