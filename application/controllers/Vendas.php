<?php


class Vendas extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('Vendas_model');
	}
	public function mesasindex()
	{
		$data['custom_error'] = '';
	//	$data['numeromesas'] = $this->Vendas_model->get_mesas_abertas();

		$data['mesasaberta'] = $this->Vendas_model->get_mesas_abertas();
   $data['mesas'] = $this->Vendas_model->get_all_mesas();
    $this->load->view('include/header');
		 $this->load->view('vendas/mesas',$data);
    $this->load->view('include/footer');

  }

	public function pagamento(){

	$count = count($this->input->post('vlrpgto'));

	for($i=0;$i<$count;$i++){
		$params = array(
				'pedido_id' =>$this->input->post('pedido')[$i],
				'formarec_nome'=> $this->input->post('tiporecebimento')[$i],
				'valortotal'=>$this->input->post('vlrpgto')[$i]


		);
							$null=$this->Vendas_model->pagamento($params);
}
		echo json_encode(array('result'=> true));
	}

	public function excluiritem(){

		$id = $this->input->post('id');
		if($this->Vendas_model->excluiritem($id)== true){

			echo json_encode(array('result'=> true));

		}
		else{
					echo json_encode(array('result'=> false));
			}
	}

	public function sale(){
		$this->load->view('vendas/exemplosale');
	}
public function novamesa(){
	    $data['custom_error'] = '';

	$verificamesa = $this->input->post('numeromesa');
	if($this->Vendas_model->verificamesa($verificamesa)==TRUE){
				  $data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
					redirect('vendas/mesasindex');


	}
else{
$data['mesa'] =$this->input->post('numeromesa');
	//$this->$data['pedido'] = $this->Vendas_model->getpedido($pedido);
$this->load->model('Produto_model');
$username = $this->session->userdata('login');
$data['login']=$username;
//$data['mesas'] = $this->Vendas_model->get_all_mesas();
$data['produtos'] = $this->Produto_model->get_all_produto();
$this->load->view('include/header');
 $this->load->view('vendas/vendas',$data);
$this->load->view('include/footer');
}


}

public function abremesa(){




	date_default_timezone_set('America/Sao_Paulo');
	$data = date('d/m/Y');
	$hora = date('H:i');
	$status= "2";
			$params = array(
					'numeromesa' =>$this->input->post('numeromesa'),
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



			$count = count($this->input->post('venda'));

			for($i=0;$i<$count;$i++){
							$params = array(
								'nome_produto' =>$this->input->post('nomeproduto')[$i],
								'valorproduto'=> $this->input->post('venda')[$i],
								'produto_id'=> $this->input->post('idproduto')[$i],
								'qtdd' => $this->input->post('quantidade')[$i],
								'garcom'=>$this->input->post('garcom')[$i],
								'mesa'=>$this->input->post('numeromesa'),
								'pedido_id'=>$pedido,
								'hora'=>$this->input->post('hora')[$i]



							);

							$null=$this->Vendas_model->itensmesa($params);
}
						redirect('vendas/mesasindex');

}
public function atualizaitem(){

			$id = $this->input->post('iditem');
			$qtdd = $this->input->post('qtdd');

			if($this->Vendas_model->atualizaitem($id,$qtdd)== true){

				echo json_encode(array('result'=> true));

			}
			else{
						echo json_encode(array('result'=> false));
				}
}
	public function imprimiproduto($id){

		$itemvenda = $this->Vendas_model->getprodutoimprimir($id);

				foreach ($itemvenda as $vd) {

						$nome = $vd->nome_produto;
						$qtdd = $vd->qtdd;
						$mesa = 'Mesa: '.$vd->mesa;
						$produtoimp = $qtdd.' - '.$nome;

						$imprimir[] =$produtoimp;
				}

$this->load->helper('print');

printitem($imprimir,$mesa);

	redirect('vendas/mesasindex');

	}
public function excluirpedido($id){


				$this->Vendas_model->deleteitens($id);
				$this->Vendas_model->deletepedido($id);

redirect('vendas/mesasindex');


}
	public function imprimiconta($id){

		//	$data[] = $this->Vendas_model->getitensimprimir($id);

			$this->load->helper('print');

			conta($id);

				redirect('vendas/mesasindex');


	}

	public function editamesa($id){


		$username = $this->session->userdata('login');
		$data['login']=$username;
		$data['empresa']= $this->Vendas_model->get_all_mesas();
		$data['mesa'] = $this->Vendas_model->getmesa($id);
		$data['horamesa']= $this->Vendas_model->gethora($id);
		$data['pedido'] = $this->Vendas_model->getpedido($id);
		$data['itenspedido'] = $this->Vendas_model->getitenspedido($id);

		$this->load->view('include/header');
		 $this->load->view('vendas/pedidoaberto',$data);
		$this->load->view('include/footer');


	}


  public function abrirmesa(){
	//	$id = $mesa;



date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');
$hora = date('H:i');
$status= "2";
		$params = array(
				'numeromesa' =>$this->input->post('numeromesa'),
				'data'=> $data,
				'hora'=>$hora,
				'status'=>$status

		);

		$pedido = $this->Vendas_model->novamesa($params);
	//	 $idpedido =$this->Vendas_model->getidpedido($pedido);

		$this->$data['pedido'] = $this->Vendas_model->getpedido($pedido);
 $this->load->model('Produto_model');
 $username = $this->session->userdata('login');
	$this->$data['login']=$username;
//$data['mesas'] = $this->Vendas_model->get_all_mesas();
$this->$data['produtos'] = $this->Produto_model->get_all_produto();
  $this->load->view('include/header');
   $this->load->view('vendas/mesaaberta',$this->$data);
  $this->load->view('include/footer');
  }

public function additem(){

	$params = array(
		'nome_produto' =>$this->input->post('nomeproduto'),
		'valorproduto'=> $this->input->post('venda'),
		'produto_id'=> $this->input->post('idproduto'),
		'qtdd' => $this->input->post('qtdd'),
		'idpedido'=>$this->input->post('idpedido'),
		'hora'=>$this->input->post('hora')
	);

		if($this->Vendas_model->itensmesa($params)==true){

			echo json_encode(array('result'=> true));

		}
		else{
					echo json_encode(array('result'=> false));
			}

}
	public function itemmesa(){

$count = count($this->input->post('venda'));

for($i=0;$i<$count;$i++){
				$params = array(
					'nome_produto' =>$this->input->post('nomeproduto')[$i],
					'valorproduto'=> $this->input->post('venda')[$i],
					'produto_id'=> $this->input->post('idproduto')[$i],
					'qtdd' => $this->input->post('quantidade')[$i],
					'garcom'=>$this->input->post('garcom')[$i],
					'mesa'=>$this->input->post('numeromesa')[$i],
					'pedido_id'=>$this->input->post('idpedido')[$i],
					'hora'=>$this->input->post('hora')[$i]



				);

				$null=$this->Vendas_model->itensmesa($params);


				$produto = $this->input->post('nomeproduto')[$i];
				$qtdd = $this->input->post('quantidade')[$i];
				$produtoimp = $qtdd.' - '.$produto;
				$mesa ="MESA: " .$this->input->post('numeromesa')[$i];
				$imprimir[] =$produtoimp;




}






	//$this->load->helper('print');

	//printitem($imprimir,$mesa);
echo json_encode(array('result'=> true));
	}


	//			$nomeproduto = $this->input->post('nomeproduto')[0];
	//			$venda =  $this->input->post('venda')[0];

		//		$idproduto = $this->input->post('idproduto')[0];



	}
