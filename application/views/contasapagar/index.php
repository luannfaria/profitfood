<section id="main-content">
      <section class="wrapper">

        <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
        <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>

        <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
        <script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
        <script src="<?php echo base_url()?>assest/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url()?>assest/js/validate.js"></script>


          <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>

        <div class="row">
                  <div class="col-md-12">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Contas a pagar</li>

            </ol>

            <div class="box-tools">
<a href="#novaconta"  data-toggle="modal" class="btn btn-success">NOVA CONTA</a>

                </div>
              <br>
          </div>
        </div>


        <div class="modal fade" id="novaconta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               <h4 class="modal-title">Nova conta a pagar</h4>
                             </div>
                             <div class="modal-body">
                               <div class="row">
                            <form action="<?php echo base_url() ?>contasapagar/add" method="post">
                               <div class="col-md-2">
                                <label for="numero" class="control-label">Nº documento</label>
                                <div class="form-group">
                                    <input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control"  />

                                </div>
                              </div>

                              <div class="col-md-4">
                               <label for="descricao" class="control-label">Descrição</label>
                               <div class="form-group">
                                   <input type="text" name="descricao" value="<?php echo $this->input->post('descricao'); ?>" class="form-control"  />

                               </div>
                             </div>

                             <div class="col-md-2">
                              <label for="valor" class="control-label">Valor</label>
                              <div class="form-group">
                                  <input type="text" name="valor" id="valor" value="<?php echo $this->input->post('valor'); ?>" class="form-control"  />

                              </div>
                            </div>

                            <div class="col-lg-3">
                             <label for="vencimento" class="control-label">Vencimento</label>
                             <div class="form-group">
                                 <input type="text" id="data" name="vencimento" class="form-control"  />

                             </div>
                           </div>

                           <div class="col-md-4">
                            <label for="observacao" class="control-label">Observação</label>
                            <div class="form-group">
                                <input type="text" name="observacao" value="<?php echo $this->input->post('observacao'); ?>" class="form-control"  />

                            </div>
                          </div>

                          <div class="col-md-4">
                            <label for="">&nbsp</label>
                            <div class="form-group">
                          <input type="submit" class="btn btn-success btn-lg" name="contasapagar" value="SALVAR" />
                        </div>
                          </div>
                            </form>
                          </div>

                             </div>
                           </div>
                         </div>
                       </div>


        <div class="row">
                 <div class="col-sm-12">
                   <section class="panel">

        <table class="table table-striped">
          <thead>
            <tr>
        		<th class="col-md-1">Vencimento</th>
        		<th class="col-md-1">Nº DOC</th>
        		<th class="col-md-4">Descrição</th>
        		<th class="col-md-1">Valor</th>
        		<th class="col-md-1">Data pagamento</th>
            <th class="col-md-1">Status</th>
            <th class="col-md-2">Ações</th>
          </tr>
        </thead>

<?php if($contasapagar){ ?>
<?php foreach($contasapagar as $cp){?>
  <tr>
    <td><?php echo $cp['datavenc'] ?></td>
  <td><?php echo $cp['numerodoc'] ?></td>
  <td><?php echo $cp['descricao'] ?></td>
  <td>R$ <?php echo $cp['valor'] ?></td>
  <td><?php echo $cp['datapgto'] ?></td>

  <?php
  date_default_timezone_set('America/Sao_Paulo');
  $data = date('d/m/Y');

   if($cp['datapgto']==NULL && $cp['datavenc']<$data){ ?>
  <td><span class="label label-danger">ATRASADO</span></td>
<?php } if($cp['datapgto']==NULL && $cp['datavenc']>=$data){ ?>
  <td><span class="label label-warning">ABERTO</span></td>
  <?PHP } if($cp['datapgto']!=NULL){?>
<td><span class="label label-success">PAGO</span></td>
  <?php } ?>

  <td>
  <?PHP  if($cp['datapgto']==NULL){?>

    <a data-toggle="modal" data-target="#modal-lg<?php echo $cp['id']?>" class="btn btn-success" >EDITAR</a>
<a data-toggle="modal" data-target="#pagar-lg<?php echo $cp['id']?>" class="btn btn-success" >PAGAR</a>
<?php }?></td>



  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pagar-lg<?php echo $cp['id']?>" class="modal fade">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                         <h4 class="modal-title">PAGAR</h4>
                       </div>
                       <div class="modal-body">


                         <div class="row">
                      <form action="<?php echo base_url() ?>contasapagar/recebeconta/<?php echo $cp['id'] ?>" method="post">
                         <div class="col-md-2">
                          <label for="numero" class="control-label">Nº documento</label>
                          <div class="form-group">
                              <input type="text" name="numero" value="<?php echo $cp['numerodoc'] ?>" class="form-control" disabled />

                          </div>
                        </div>

                        <div class="col-md-4">
                         <label for="descricao" class="control-label">Descrição</label>
                         <div class="form-group">
                             <input type="text" name="descricao" value="<?php echo $cp['descricao'] ?>" class="form-control" disabled />
<input type="hidden" name="descricaoconta" value="<?php echo $cp['descricao'] ?>">
                         </div>
                       </div>

                       <div class="col-md-2">
                        <label for="valor" class="control-label">Valor conta</label>
                        <div class="form-group">
                            <input type="text" name="valor" id="valor" value="<?php echo $cp['valor'] ?>" class="form-control"  disabled/>

                        </div>
                      </div>

                      <div class="col-lg-3">
                       <label for="vencimento" class="control-label">Vencimento</label>
                       <div class="form-group">
                           <input type="text" id="data" name="vencimento" value="<?php echo $cp['datavenc'] ?>" class="form-control" disabled />

                       </div>
                     </div>
                     <div class="col-md-4">
                      <label for="observacao" class="control-label">Observação</label>
                      <div class="form-group">
                          <input type="text" name="observacao" value="<?php echo $cp['numerodoc'] ?>" class="form-control" disabled />

                      </div>
                    </div>
                     <div class="col-md-2">
                      <label for="valorpago" class="control-label">Valor PAGO</label>
                      <div class="form-group">
                          <input type="text" name="valorpago" id="valorpago<?php echo $cp['id']?>"  class="form-control" />
<input type="hidden" name="datapgto" value="<?php echo $data ?>">
                      </div>
                    </div>


                    <div class="col-md-4">
                      <label for="formarecebimento" class="control-label">Tipo Pgto</label>

                      <div class="form-group">
                      <select name="formarecebimento" class="form-control" required>
                        <option value="">Selecione    </option>
                          <option value="DINHEIRO"> DINHEIRO</option>
                          <option value="CARTAO DE CREDITO"> CARTÃO DE CRÉDITO</option>
                          <option value="CARTAO DE DEBITO"> CARTÃO DE DÉBITO</option>
                          <option value="CHEQUE"> CHEQUE</option>
                      </select>
                      </div>
                    </div>



                    <div class="col-md-4">
                      <label for="">&nbsp</label>
                      <div class="form-group">
                    <input type="submit" class="btn btn-danger" name="contasapagar" value="PAGAR" />
                  </div>
                    </div>
                      </form>

                      <script>


                      $('#valorpago<?php echo $cp['id']?>').maskMoney();


                      </script>
                    </div>
                       </div>
                       </div>
                       </div>
                       </div>


  </tr>
<?php }?>
<?php } ?>

          </table>
        </section>
      </div>
    </div>




    <script>
$('#valor').maskMoney();
    $( function() {
      $( "#data" ).datepicker({ dateFormat: 'dd/mm/yy' });

    });
    </script>

      </section>
    </section>
