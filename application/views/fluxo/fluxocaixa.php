<section id="main-content">
  <section class="wrapper">

  <link href="<?php echo base_url() ?>assest/css/bootstrap.min.css" rel="stylesheet">
 <!-- bootstrap theme -->
 <link href="<?php echo base_url() ?>assest/css/bootstrap-theme.css" rel="stylesheet">
 <!--external css-->
 <!-- font icon -->
 <link href="<?php echo base_url() ?>assest/css/elegant-icons-style.css" rel="stylesheet" />
 <link href="<?php echo base_url() ?>assest/css/font-awesome.min.css" rel="stylesheet" />
 <link href="<?php echo base_url() ?>assest/css/daterangepicker.css" rel="stylesheet" />
 <link href="<?php echo base_url() ?>assest/css/bootstrap-datepicker.css" rel="stylesheet" />
 <link href="<?php echo base_url() ?>assest/css/bootstrap-colorpicker.css" rel="stylesheet" />
 <!-- date picker -->

 <!-- color picker -->

 <!-- Custom styles -->
 <link href="<?php echo base_url() ?>assest/css/style.css" rel="stylesheet">
 <link href="<?php echo base_url() ?>assest/css/style-responsive.css" rel="stylesheet" />


        <ol class="breadcrumb" style="margin-top:0">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
          <li><i class="fa fa-dollar"></i>Fluxo de caixa</li>
        </ol>
    <div class="row" >
      <div class="col-lg-9">

<form class="form-inline" method="post" action="<?php echo base_url();?>fluxo/buscafluxo" >
  <div class="form-group">

      <label>Data  <input type="text" value=" "class="form-control sm-input" id="data" name="data"/></label>


<button class="btn btn-primary">PESQUISAR</button>
</div>




</form>
      </div>

        <div class="col-lg-3">

            <a class="btn btn-success" data-toggle="modal" href="#modal-entrada">
<i class="fa fa-arrow-up"></i> ENTRADA</a>

<a class="btn btn-danger" data-toggle="modal" href="#modal-saida">
<i class="fa fa-arrow-down"></i> SAIDA</a>






        </div>
      <br>
    </div>
<br>
<?php
if (!$result) {
    ?>
    <section class="panel">
<table class="table table-striped">
  <thead>
    <tr>

<th>Data </th>
<th>Tipo Movimentação</th>

<th>Descrição</th>


<th>Valor</th>
<th>Forma</th>

</tr>
</thead>

<tbody>
</tbody>

</table>

</section>
<?php
} else {
        ?>

  <section class="panel">
  <table class="table table-striped">
    <thead>
      <tr>

  <th>Data </th>
  <th>Tipo Movimentação</th>

  <th>Descrição</th>


  <th>Valor</th>
  <th>Forma pgto/rec</th>

  </tr>
  </thead>

  <tbody >
<?php $totalentrada=0;
        $totalsaida=0;
        $saldofinal=0; ?>
    <?php foreach ($result as $r) {
            echo '<tr>';
            echo '<td>'.$r->data.'</td>';
            if ($r->tipomov==1) {
                echo '<td><span class="label label-success"><i class="fa fa-arrow-up"></i> ENTRADA</span></td>';
                $totalentrada += $r->valor;
            }
            if ($r->tipomov==2) {
                $totalsaida += $r->valor;
                echo '<td><span class="label label-danger"><i class="fa fa-arrow-down"></i> SAIDA</span></td>';
            }
            echo '<td>'.$r->descricao.'</td>';
            echo '<td>R$ '.$r->valor.'</td>';
            echo '<td>'.$r->forma.'</td>';


            echo '</tr>';
        }
        $saldofinal = ($totalentrada-$totalsaida); ?>

  <tr>
                                            <td colspan="4" style="text-align: right"><font color="green"><strong>Total Entrada:</font></strong></td>
                                             <td><font color="green"><strong>R$ <?php echo number_format($totalentrada, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalentrada, 2); ?>"></font></strong></td>
                                         </tr>

                                         <tr>
                                                                                   <td colspan="4" style="text-align: right"><font color="red"><strong>Total Saida:</strong></font></td>
                                                                                    <td><font color="red"><strong>R$ <?php echo number_format($totalsaida, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalentrada, 2); ?>"></strong></font></td>
                                                                                </tr>

                                                                                <tr>
                                                                                                                          <td colspan="4" style="text-align: right"><strong>Saldo Final:</strong></td>
                                                                                                                           <td><strong>R$ <?php echo number_format($saldofinal, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalentrada, 2); ?>"></strong></td>
                                                                                                                       </tr>
<?php
    }?>
  </tbody>

  </table>

  <?php if (isset($links)) { ?>
      <?php echo $links ?>
  <?php } ?>



</section>

<div class="modal fade" id="modal-entrada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Entrada caixa</h4>
                     </div>
                     <div class="modal-body">


                         <div class="row">
                      <form action="<?php echo base_url() ?>fluxo/entradacaixa" method="post">
                         <div class="col-md-4">
               						<label for="numero" class="control-label">Nº Documento</label>
                          <div class="form-group">
                            	<input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />

                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="descricao" class="control-label"><span class="text-danger">*</span>Descrição</label>
                          <div class="form-group">
                            <input type="text" name="descricao" value="<?php echo $this->input->post('descricao'); ?>" class="form-control" id="descricao" required/>
                            <span class="text-danger"><?php echo form_error('descricao');?></span>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <label for="valor" class="control-label"><span class="text-danger">*</span>Valor</label>
                          <div class="form-group">
                            <input type="text" name="valor" value="<?php echo $this->input->post('valor'); ?>"  class="form-control" id="valor" required/>
              							<span class="text-danger"><?php echo form_error('valor');?></span>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <label for="obs" class="control-label">Observação</label>
                          <div class="form-group">
                            <input type="text" name="obs" value="<?php echo $this->input->post('obs'); ?>" class="form-control" id="obs" />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="formarecebimento" class="control-label">Tipo Rec.</label>

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


                        <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                                                <div class="col-md-4">
                                      						<label for="datavencimento" class="control-label"><span class="text-danger">*</span>Data</label>
                                      						<div class="form-group">
                                                    <input type="hidden" name="datavencimento" value="<?php
                                           echo date('d/m/Y') ;?>" class="has-datepicker form-control"/>
                                      							<input type="text" name="data" value="<?php echo date('d/m/Y') ;?>" class="form-control" id="data" disabled/>
                                      							<span class="text-danger"><?php echo form_error('datavencimento');?></span>
                                      						</div>
                                      					</div>
                                                <br>

                                                <div class="col-md-4">
                                                  <label for="">&nbsp</label>
                                                  <div class="form-group">
                                                <input type="submit" class="btn btn-success" name="entradacaixa" value="RECEBER" />
                                              </div>
                                                </div>






                        </form>

</div>
                     </div>

                   </div>
                 </div>
               </div>


               <div class="modal fade" id="modal-saida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title">Saida caixa</h4>
                                    </div>
                                    <div class="modal-body">
 <div class="box-body">
                                      <div class="row">
                                   <form action="<?php echo base_url() ?>fluxo/saidacaixa" method="post">
                                      <div class="col-md-2">
                                       <label for="numero" class="control-label">Nº Documento</label>
                                       <div class="form-group">
                                           <input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />

                                       </div>
                                     </div>
                                     <div class="col-md-5">
                                       <label for="descricao" class="control-label"><span class="text-danger">*</span>Descrição</label>
                                       <div class="form-group">
                                         <input type="text" name="descricao" value="<?php echo $this->input->post('descricao'); ?>" class="form-control" id="descricao" required/>
                                         <span class="text-danger"><?php echo form_error('descricao');?></span>
                                       </div>
                                     </div>

                                     <div class="col-md-2">
                                       <label for="valor" class="control-label"><span class="text-danger">*</span>Valor</label>
                                       <div class="form-group">
                                         <input type="text" name="valor" value="<?php echo $this->input->post('valor'); ?>"  class="form-control" id="valorsaida" required/>
                                         <span class="text-danger"><?php echo form_error('valor');?></span>
                                       </div>
                                     </div>


                                     <div class="col-md-6">
                                       <label for="obs" class="control-label">Observação</label>
                                       <div class="form-group">
                                         <input type="text" name="obs" value="<?php echo $this->input->post('obs'); ?>" class="form-control" id="obs" />
                                       </div>
                                     </div>

                                     <div class="col-md-4">
                                       <label for="formarecebimento" class="control-label">Tipo Pagamento</label>

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


                                     <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                                                             <div class="col-md-4">
                                                               <label for="datavencimento" class="control-label"><span class="text-danger">*</span>Data</label>
                                                               <div class="form-group">
                                                                 <input type="hidden" name="datavencimento" value="<?php
                                                        echo date('d/m/Y') ;?>" class="has-datepicker form-control"/>
                                                                 <input type="text" name="data" value="<?php echo date('d/m/Y') ;?>" class="form-control" id="data" disabled/>
                                                                 <span class="text-danger"><?php echo form_error('datavencimento');?></span>
                                                               </div>
                                                             </div>
                                                             <br>

                                                             <div class="col-md-4">
                                                               <label for="">&nbsp</label>
                                                               <div class="form-group">
                                                             <input type="submit" class="btn btn-danger" name="saidacaixa" value="PAGAR" />
                                                           </div>
                                                             </div>
                                   </div>
                                 </div>




                                     </form>
</div>
                                    </div>

                                  </div>
                                </div>
                              </div>



<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>


<script src="<?php echo base_url()?>assest/js/validate.js"></script>


  <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>

  <script src="<?php echo base_url()?>assest/js/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url()?>assest/js/bootstrap-wysiwyg.js"></script>

  <script src="<?php echo base_url()?>assest/js/moment.js"></script>
  <script src="<?php echo base_url()?>assest/js/bootstrap-colorpicker.js"></script>
  <script src="<?php echo base_url()?>assest/js/daterangepicker.js"></script>
  <script src="<?php echo base_url()?>assest/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url()?>assest/js/jquery.timepicker.min.js"></script>
  <!-- ck editor -->


<script type="text/javascript">



$('#valor').maskMoney();
$('#valorsaida').maskMoney();
$( function() {
  $( "#data" ).datepicker({ dateFormat: 'dd/mm/yy' });

$("#termino").datepicker({dateFormat: 'dd/mm/yy'});
});
$("#formEntrada").validate({

  rules:{
     descricao: {required:true},
     valor: {required:true}
  },
  messages:{
     descricao: {required: 'Insira uma descrição'},
     valor:{required: 'Insira um valor'}
  },

submitHandler: function( form ){
var dados = $( form ).serialize();


$.ajax({
type: "POST",
url: "<?php echo base_url();?>contasareceber/entradacaixa",
data: dados,
dataType: 'json',
success: function(data)
{
  if(data.result == true){


    window.location.reload(true);
  }
  else{
      alert('Ocorreu um erro ao tentar adicionar entrada no caixa.');
  }
}
});

return false;
}

});

$("#formSaida").validate({

  rules:{
     descricao: {required:true},
     valor: {required:true}
  },
  messages:{
     descricao: {required: 'Insira uma descrição'},
     valor:{required: 'Insira um valor'}
  },

submitHandler: function( form ){
var dados = $( form ).serialize();


$.ajax({
type: "POST",
url: "<?php echo base_url();?>contasapagar/saidacaixa",
data: dados,
dataType: 'json',
success: function(data)
{
  if(data.result == true){


    window.location.reload(true);
  }
  else{
      alert('Ocorreu um erro ao tentar adicionar saida no caixa.');
  }
}
});

return false;
}

});


</script>
</section>

</section>
