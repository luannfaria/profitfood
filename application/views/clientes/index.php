<section id="main-content">

  <section class="wrapper">


    <div class="row">
      <div class="col-lg-12">

        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
          <li><i class="fa fa-calendar"></i> Clientes</li>

        </ol>
        <div class="box-tools">
              <a href="#cliente" data-toggle="modal" class="btn btn-success">NOVO CLIENTE</a>

            </div>
            <br>


      </div>
    </div>

    <section class="panel">

    <?php  if(!$cliente){?>

    <table class="table table-striped">
      <thead>
        <tr>

    <th><i class="fa fa-sort-numeric-desc"> </i> Cliente </th>
    <th><i class="fa fa-user"> </i> Telefone</th>
    <th><i class="icon_calendar"> </i> Celular</th>

    <th><i class="fa fa-user"> </i> Saldo devedor</th>
<th><i class="fa fa-check"> </i> Status</th>
    <th><i class="fa fa-check"> </i> Data cadastro</th>
    <th><i class="fa fa-cogs"> </i> Ações</th>
        </tr>
</thead>
        <tbody>


        </tbody>
      </table>
    <?php } else{?>

      <table class="table table-striped">
          <tr>


      <th><i class="fa fa-user"> </i> Cliente</th>
      <th><i class="icon_calendar"> </i> Celular</th>
      <th><i class="fa fa-clock-o"> </i> Telefone</th>


      <th><i class="fa fa-check"> </i> Status</th>
      <th><i class="fa fa-cogs"> </i> Ações</th>
          </tr>

          <tbody>
            <?php foreach ($cliente as $c) { ?>
              <tr>
                  <td><?php echo $c['nome']?></td>
                  <td><?php echo $c['telefone']?></td>
                  <td><?php echo $c['celular']?></td>
                  <td><?php echo $c['nome']?></td>
                  <td><a data-toggle="modal" data-target="#modal-lg<?php echo $c['id']?>" class="btn btn-success" >EDITAR</a></td>

                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-lg<?php echo $c['id']?>" class="modal fade">
                                   <div class="modal-dialog">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                         <h4 class="modal-title">EDITAR CLIENTE</h4>
                                       </div>
                                       <div class="modal-body">


                                         <div class="row">
                                           <div class="col-lg-12">
              <form action="<?php echo base_url()?>cliente/edit/<?php echo $c['id']?>" method="post">

                                           <div class="col-lg-5">
                                                                     <label for="nome" class="control-label">Nome</label>


                                                                     <input type="text" class="form-control required" name="nome" value="<?php echo $c['nome']?>" required>

                                                                 </div>
                                                                   <div class="col-lg-3">
                                                                     <label for="telefone">Telefone</label>
                                                                     <input type="text" class="form-control" id="telefone1" value="<?php echo $c['telefone']?>" name="telefone" >
                                                                   </div>

                                                                   <div class="col-lg-3">
                                                                     <label for="celular">Celular</label>
                                                                     <input type="text" id="celular1"name="celular"class="form-control" value="<?php echo $c['celular']?>">
                                                                   </div>

                                                                   <div class="col-lg-6">
                                                                     <label for="endereco">Endereço</label>
                                                                     <input type="text" name="endereco" class="form-control" value="<?php echo $c['rua']?>" >
                                                                   </div>
                                                                   <div class="col-lg-2">
                                                                     <label for="numero">Nº</label>
                                                                     <input type="text" name="numero"class="form-control"  value="<?php echo $c['numero']?>">
                                                                   </div>
                                                                   <div class="col-lg-4">
                                                                     <label for="bairro">Bairro</label>
                                                                     <input type="text" name="bairro" class="form-control" value="<?php echo $c['bairro']?>" >
                                                                   </div>

                                                                   <div class="col-lg-5">
                                                                     <label for="cidade">Cidade</label>
                                                                     <input type="text" name="cidade" class="form-control" value="<?php echo $c['cidade']?>" >
                                                                   </div>

                                                                   <div class="col-lg-5">
                                                                     <label for="observacoes">Observações</label>
                                                                     <input type="text" name="observacoes" class="form-control"  >
                                                                     <input type="hidden" name="data" value="<?php echo $c['data']?>">
                                                                     <input type="hidden" name="status" value="<?php echo $c['status']?>">
                                                                   </div>

                                                                   <div  class="row">

                                                                     <div class="col-lg-12">
                                                                       <div style="text-align:right;"class="col-lg-4">
                                                                         <button style="margin-top:18px;" type="submit" class="btn btn-success btn-lg col-lg-12">
                                                                          EDITAR
                                                                         </button>
                                                                       </div>
                                                                     </div>
                                                                   </div>

              </form>
              </div>
              </div>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
              </tr>
            <?php } ?>
          </tbody>
        </table>



    <?php }?>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="cliente" class="modal fade">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                           <h4 class="modal-title">Novo cliente</h4>
                         </div>
                         <div class="modal-body">
                           <div class="row">
                             <div class="col-lg-12">
<form action="<?php echo base_url()?>cliente/add" method="post">

                             <div class="col-lg-5">
                                                       <label for="nome">Nome</label>


                                                       <input type="text" class="form-control required" name="nome"  required>

                                                   </div>
                                                     <div class="col-lg-3">
                                                       <label for="telefone">Telefone</label>
                                                       <input type="text" id="telefone" class="form-control" name="telefone" >
                                                     </div>

                                                     <div class="col-lg-3">
                                                       <label for="celular">Celular</label>
                                                       <input type="text" id="celular" name="celular"class="form-control" >
                                                     </div>

                                                     <div class="col-lg-6">
                                                       <label for="endereco">Endereço</label>
                                                       <input type="text" name="endereco" class="form-control"  >
                                                     </div>
                                                     <div class="col-lg-2">
                                                       <label for="numero">Nº</label>
                                                       <input type="text" name="numero"class="form-control"  placeholder="Password">
                                                     </div>
                                                     <div class="col-lg-4">
                                                       <label for="bairro">Bairro</label>
                                                       <input type="text" name="bairro" class="form-control"  >
                                                     </div>

                                                     <div class="col-lg-5">
                                                       <label for="cidade">Cidade</label>
                                                       <input type="text" name="cidade" class="form-control" >
                                                     </div>

                                                     <div class="col-lg-5">
                                                       <label for="observacoes">Observações</label>
                                                       <input type="text" name="observacoes" class="form-control"  >
                                                     </div>

                                                     <div  class="row">

                                                       <div class="col-lg-12">
                                                         <div style="text-align:right;"class="col-lg-4">
                                                           <button style="margin-top:18px;" type="submit" class="btn btn-success btn-lg col-lg-12">
                                                            CADASTRAR
                                                           </button>
                                                         </div>
                                                       </div>
                                                     </div>

</form>
</div>
</div>
                       </div>
                       </div>
                     </div>
                   </div>

    </section>

    <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url()?>assest/js/jquery-1.8.3.min.js"></script>


    <script src="<?php echo base_url()?>assest/js/validate.js"></script>


      <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



<script type="text/javascript">
$("#celular").mask("(00) 00000-0000");

$("#telefone").mask("(00) 0000-0000");
$("#celular1").mask("(00) 00000-0000");

$("#telefone1").mask("(00) 0000-0000");
</script>

  </section>
</section>
