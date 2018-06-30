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
  $data['produto'] = $this->Produto_model->getprodutosimples();
  $data['categoriaprodutos'] = $this->Categoria_model->get_all_categoriaprodutos();
		$this->load->view('include/header');
		 $this->load->view('produto/index',$data);
    $this->load->view('include/footer');


	}

	function add()
	{
		$params = array(
'categoria_id' => $this->input->post('categoria_id'),
'status' => $this->input->post('status'),
'nomeproduto' => $this->input->post('nomeproduto'),
'custo' => $this->input->post('custo'),
'venda' => $this->input->post('venda'),
'impressora' => $this->input->post('impressora'),
'vendermeio' => $this->input->post('vendermeio'),
'porc_meio' => $this->input->post('porc_meio'),
		);

		$produto_id = $this->Produto_model->add_produto($params);
	}

	function edit($id)
	{



						$params = array(
			'categoria_id' => $this->input->post('categoria_id'),
			'status' => $this->input->post('status'),
			'nomeproduto' => $this->input->post('nomeproduto'),
			'custo' => $this->input->post('custo'),
			'venda' => $this->input->post('venda'),
			'impressora' => $this->input->post('impressora'),
			'vendermeio' => $this->input->post('vendermeio'),
			'porc_meio' => $this->input->post('porc_meio'),
						);

						$this->Produto_model->update_produto($id,$params);
						redirect('produto/index');

}

public function autoCompleteProduto(){
	if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->Produto_model->autoCompleteProduto($q);
	}
}
}
