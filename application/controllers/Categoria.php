<?php


class Categoria extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('Categoria_model');
			$this->load->helper('print_helper');
	}


  function index()
  {
     $data['categoriaprodutos'] = $this->Categoria_model->get_all_categoriaprodutos();

  //    $data['_view'] = 'categoriaproduto/index';
  //    $this->load->view('layouts/main',$data);


  $this->load->view('include/header');
   $this->load->view('produto/categoria_index',$data);
  $this->load->view('include/footer');
  }

  /*
   * Adding a new categoriaproduto
   */

   function print()
   {



	$this->load->helper('print');

echo printteste();
			//$this->load->print_helper();
     //$this->load->view('produto/testprint');

   }
  function add()
  {
      if(isset($_POST) && count($_POST) > 0)
      {
          $params = array(
      'nomedescricao' => $this->input->post('nomedescricao'),
      //'descricao' => $this->input->post('descricao'),
      'status' => $this->input->post('status'),
          );

          $categoriaproduto_id = $this->Categoria_model->add_categoriaproduto($params);
          redirect('categoria/index');
      }
      else
      {
        //  $data['_view'] = 'categoriaproduto/add';
        //  $this->load->view('layouts/main',$data);
      }
  }

  /*
   * Editing a categoriaproduto
   */
  function edit($id)
  {
      // check if the categoriaproduto exists before trying to edit it
      $data['categoriaproduto'] = $this->Categoriaproduto_model->get_categoriaproduto($id);

      if(isset($data['categoriaproduto']['id']))
      {
          if(isset($_POST) && count($_POST) > 0)
          {
              $params = array(
        'nomedescricao' => $this->input->post('nomedescricao'),

        'status' => $this->input->post('status'),
              );

              $this->Categoriaproduto_model->update_categoriaproduto($id,$params);
              redirect('categoriaproduto/index');
          }
          else
          {
              $data['_view'] = 'categoriaproduto/edit';
              $this->load->view('layouts/main',$data);
          }
      }
      else
          show_error('The categoriaproduto you are trying to edit does not exist.');
  }

  /*
   * Deleting categoriaproduto
   */
  function remove($id)
  {
      $categoriaproduto = $this->Categoriaproduto_model->get_categoriaproduto($id);

      // check if the categoriaproduto exists before trying to delete it
      if(isset($categoriaproduto['id']))
      {
          $this->Categoriaproduto_model->delete_categoriaproduto($id);
          redirect('categoriaproduto/index');
      }
      else
          show_error('The categoriaproduto you are trying to delete does not exist.');
  }


}
