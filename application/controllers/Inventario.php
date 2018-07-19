<?php


class Inventario extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('Produto_model');
      $this->load->model('Inventario_model');
	}
	public function index()
	{

      $data['invent']= $this->Inventario_model->getallinv();
        $this->load->view('include/header');
        $this->load->view('estoque/inventario',$data);
        $this->load->view('include/footer');
  }

  public function novoinvetario(){

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('d/m/Y');
 $descricao = "AJUSTE ESTOQUE REALIZADO EM ".$data;
    $params = array(
              'data'=>$data,
              'descricao'=> $descricao
    );

          	$idinv = $this->Inventario_model->novoinventario($params);

            redirect('inventario/editainv/'.$idinv);


  }

  function additem(){



  	$params = array(
  		'idinvent' =>$this->input->post('idinv'),
  		'idproduto'=> $this->input->post('idproduto'),
  		'nomeproduto'=> $this->input->post('nomeproduto'),
  		'codbarra' => $this->input->post('codbarra'),
  	   'qtdd'=>$this->input->post('quantidade')
  	);
  	$this->Inventario_model->itensinv($params);

$idproduto = $this->input->post('idproduto');
$qtdd = $this->input->post('quantidade');

      $this->Inventario_model->atualizaestoque($idproduto,$qtdd);
  				echo json_encode(array('result'=> true));

        }
  public function editainv($idinv){

    $data['inventario'] = $this->Inventario_model->getinventario($idinv);
    $data['itensinv'] = $this->Inventario_model->getitens($idinv);
                $this->load->view('include/header');
                $this->load->view('estoque/invadd',$data);
                $this->load->view('include/footer');

  }
}
