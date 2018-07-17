<?php


class Produto extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('Produto_model');
	}
	public function index()
	{

	//	$params['limit'] = RECORDS_PER_PAGE;
	//	$params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

//		$config = $this->config->item('pagination');
	//	$config['base_url'] = site_url('produto/index');
		//$config['total_rows'] = $this->Produto_model->get_all_produto_count();
	//	$this->pagination->initialize($config);
	$this->load->model('Categoria_model');
	$this->load->model('Configuracoes_model');
  $data['produto'] = $this->Produto_model->getprodutosimples();
  $data['categoriaprodutos'] = $this->Categoria_model->get_all_categoriaprodutos();
	$data['impressoras'] = $this->Configuracoes_model->getimpressoras();
		$this->load->view('include/header');
		 $this->load->view('produto/index',$data);
    $this->load->view('include/footer');


	}

	function add()
	{

		$custo = str_replace("," , "." ,$this->input->post('custo'));
		$venda = str_replace("," , "." ,$this->input->post('venda'));
		$params = array(
'categoria_id' => $this->input->post('categoria_id'),
'status' => $this->input->post('status'),
'nomeproduto' => $this->input->post('nomeproduto'),
'custo' => $custo,
'venda' => $venda,
'impressora' => $this->input->post('impressora'),
'codbarra' => $this->input->post('codbarra'),
'porc_meio' => $this->input->post('porc_meio'),
'tipoproduto' => $this->input->post('tipoproduto')
		);

		$produto_id = $this->Produto_model->add_produto($params);

redirect('produto/index');
	}

	function edit($id)
	{


		$custo = str_replace("," , "." ,$this->input->post('custo'));
		$venda = str_replace("," , "." ,$this->input->post('venda'));
						$params = array(
			'categoria_id' => $this->input->post('categoria_id'),
			'status' => $this->input->post('status'),
			'nomeproduto' => $this->input->post('nomeproduto'),
			'custo' => $custo,
			'venda' => $venda,
			'impressora' => $this->input->post('impressora'),
			'codbarra' => $this->input->post('codbarra'),
			'porc_meio' => $this->input->post('porc_meio'),
						);

						$this->Produto_model->update_produto($id,$params);
						redirect('produto/index');

}


public function remove($id){

	$status='2';

$null=	$this->Produto_model->excluir($id,$status);

redirect('produto/index');
}
public function autoCompleteProduto(){
	if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->Produto_model->autoCompleteProduto($q);
	}
}

public function autoCompleteProdutocodbarra(){
	if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->Produto_model->autoCompleteProdutocodbarra($q);
	}
}
}
