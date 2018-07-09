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

function mesas(){


	$verificamesa = $this->input->post('numeromesa');
	if($this->Vendas_model->verificamesa($verificamesa)==TRUE){


$data['categorias'] = $this->Categoria_model->get_all_categoriaprodutos();
		$pedido=	$this->Vendas_model->idpedidomesa($verificamesa);
		$data['empresa']= $this->Vendas_model->get_all_mesas();
	 		$data['mesa'] = $this->Vendas_model->getmesa($pedido);
	 		$data['horamesa']= $this->Vendas_model->gethora($pedido);
	 			$data['pedido'] = $this->Vendas_model->getpedido($pedido);
	 			$data['itenspedido'] = $this->Vendas_model->getitenspedido($pedido);
	 				$data['totalitens'] = $this->Vendas_model->totalpedido($pedido);
	 				$data['pagamento'] = $this->Vendas_model->valorpago($pedido);


	 //	$this->$data['pedido'] = $this->Vendas_model->getpedido($pedido);
	 //$this->load->model('Produto_model');
	 //$username = $this->session->userdata('login');
	 //$data['login']=$username;
	 //$data['mesas'] = $this->Vendas_model->get_all_mesas();
	 //$data['produtos'] = $this->Produto_model->get_all_produto();
	 //$this->load->view('include/header');
	//  	$this->load->view('vendas/pedidoaberto',$this->$data);
	// $this->load->view('include/footer');
	$this->load->view('mobile/pedido',$data);

					$data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
					redirect('mobile/index');


	}
else{
	  $data['categorias'] = $this->Categoria_model->get_all_categoriaprodutos();
//$data['mesa'] =$this->input->post('numeromesa');
	//$this->$data['pedido'] = $this->Vendas_model->getpedido($pedido);
$this->load->model('Produto_model');
$username = $this->session->userdata('login');
$data['login']=$username;
//$data['mesas'] = $this->Vendas_model->get_all_mesas();
//$this->$data['produtos'] = $this->Produto_model->get_all_produto();






 $this->load->model('Produto_model');
 	date_default_timezone_set('America/Sao_Paulo');
 	$data = date('d/m/Y');
 	$hora = date('H:i');
 	$status= "2";
 			$params = array(
 					'numeromesa' =>$verificamesa,
 					'data'=> $data,
 					'hora'=>$hora,
 					'status'=>$status

 			);

 			$pedido = $this->Vendas_model->novamesa($params);

 				$status = array(
 						'numeromesa'=>$this->input->post('numeromesa'),
 						'idpedido'=>$pedido,
 						'tempo'=>$hora
 				);
 			$null = $this->Vendas_model->statusmesa($status);
 //$id = $this->Vendas_model->getidpedido($pedido);
 	//		$username = $this->session->userdata('login');
 	//		$this->$data['login']=$username;
 	$this->$data['empresa']= $this->Vendas_model->get_all_mesas();
 		$this->$data['mesa'] = $this->Vendas_model->getmesa($pedido);
 		$this->$data['horamesa']= $this->Vendas_model->gethora($pedido);
 			$this->$data['pedido'] = $this->Vendas_model->getpedido($pedido);
 		$this->	$data['itenspedido'] = $this->Vendas_model->getitenspedido($pedido);
 				$this->$data['totalitens'] = $this->Vendas_model->totalpedido($pedido);
 				$this->$data['pagamento'] = $this->Vendas_model->valorpago($pedido);


					 $this->$data['categorias'] = $this->Categoria_model->get_all_categoriaprodutos();
 //	$this->$data['pedido'] = $this->Vendas_model->getpedido($pedido);
 //$this->load->model('Produto_model');
 //$username = $this->session->userdata('login');
 //$data['login']=$username;
 //$data['mesas'] = $this->Vendas_model->get_all_mesas();
 //$data['produtos'] = $this->Produto_model->get_all_produto();
 //$this->load->view('include/header');
//  	$this->load->view('vendas/pedidoaberto',$this->$data);
// $this->load->view('include/footer');
$this->load->view('mobile/pedido',$this->$data);
}

}
}
