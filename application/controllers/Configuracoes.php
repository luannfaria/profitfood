<?php


class Configuracoes extends CI_Controller {

	function __construct()
	{
			parent::__construct();
$this->load->model('Configuracoes_model');
	}

function index(){

		  $data['empresa'] = $this->Configuracoes_model->get_empresa();
  $this->load->view('include/header');
   $this->load->view('configuracoes/configuracoes',$data);
  $this->load->view('include/footer');
}

function edit(){

$id = $this->input->post('id');
			$params = array(
					'razaosocial'=> $this->input->post('razaosocial'),
					'nomefantasia'=> $this->input->post('nomefantasia'),
					'inscricaoestadual'=> $this->input->post('inscricaoestadual'),
					'cnpj'=> $this->input->post('cnpj'),
					'telefone'=> $this->input->post('telefone'),
					'rua'=> $this->input->post('rua'),
					'numero'=>$this->input->post('numero'),
					'bairro'=>$this->input->post('bairro'),
					'cidade'=>$this->input->post('cidade'),
					'telefone'=>$this->input->post('telefone'),
					'taxaservico'=>$this->input->post('taxaservico'),
					'numeromesas'=>$this->input->post('numeromesas'),

			);

			if($this->Configuracoes_model->update_empresa($id,$params)==true){
				echo json_encode(array('result'=> true));

			}
			else{
						echo json_encode(array('result'=> false));
				}





}

public function addimpressora(){

		$params = array(
					'tipoimpressora'=> $this->input->post('tipoimpressora'),
					'impressora'=> $this->input->post('impressora'),
					'localimpressao'=> $this->input->post('localimpressao')
		);

		if($this->Configuracoes_model->addimpressora($params)==true){
			echo json_encode(array('result'=> true));

		}
		else{
					echo json_encode(array('result'=> false));
			}

}
}
