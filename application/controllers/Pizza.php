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
	  $data['produto'] = $this->Produto_model->getpizza();
$data['categoriaprodutos'] = $this->Categoria_model->get_all_categoriaprodutos();
  $this->load->view('include/header');
   $this->load->view('produto/pizza',$data);
  $this->load->view('include/footer');
}

function add(){

$tipopizza='2';
$status='1';
$item='3';
		$pizza = array(
			'nomeproduto'=> $this->input->post('nomepizza'),
		'status'=> $status,
		'categoria_id' => $this->input->post('categoria_id'),
		'tipoproduto'=> $tipopizza


		);

		$idpizza = 	$produto_id = $this->Produto_model->add_produto($pizza);
	$count = count($this->input->post('vendapizza'));

	for($i=0;$i<$count;$i++){
		$nome= $this->input->post('nomepizza');
$tam= $this->input->post('nometam')[$i];

					$params = array(

							'nomeproduto'=> $nome.' '.$tam,
						'venda'=> $this->input->post('vendapizza')[$i],
						'tamanho'=> $this->input->post('sigla')[$i],
						'categoria_id' => $this->input->post('categoria_id'),
							'tipoproduto'=>$item,
							'itempai' =>$idpizza,
							'status' =>$status,
						'custo' => $this->input->post('custopizza')[$i]




					);
						$produto_id = $this->Produto_model->add_produto($params);


}

	redirect('pizza/index');
}
}
