<section id="main-content">
      <section class="wrapper">


        <!-- bootstrap theme -->

  <link href="<?php echo base_url()?>assest/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url()?>assest/css/jquery-ui.theme.css" rel="stylesheet">
        <div id="product" class="col-sm-12">

                    <section class="panel">




             <header class="panel-heading">
               Pedidos - Mesas
             </header>
             <div class="panel-header">


  <div class="col-sm-12">
    <div class="col-sm-4">
  <?php      foreach ($pedido as $pe) {
    ?>
<h2><strong>MESA
        <?php echo $pe->numeromesa; ?>

        <?php $num = $pe->id;
    $mesa = $pe->numeromesa;

    $subtotal=0;
    $total=0; ?>
</h2></strong>

<h4><strong>Data: </strong><?php echo $pe->data; ?></h4>
<h4><strong>Hora: </strong><?php echo $pe->hora; ?></h4>
</div>
<div class="col-sm-6">
  <div class="row">
  <form action="" method="post" id="form_prepare">
<div class="col-md-8">
                              <div class="form-group">
                                <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                <input type="text" class="form-control input-lg m-bot15 required" name="produto" id="produto" placeholder="Digite o nome do produto" required/>

                                <input type="hidden" name="idproduto" id="idproduto" value=""/>

<input type="hidden" name="idpedido" id="idpedido" value="<?php echo $num;?>" />
<input type="hidden" name="numeromesa" id="numeromesa" value="<?php echo $mesa;?>" />

<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />
                                <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                <input type="hidden" name="venda" id="venda" />

                              </div>
                            </div>



                            <div class="col-md-2">
                                                            <div class="form-group">
                                                              <label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> Qtdd</label>
                                                          <input type="text" class="form-control input-lg m-bot15 required" onkeyup="somenteNumeros(this);" name="quantidade" id="quantidade" required/>
</div>
</div>

<div class="col-md-2">

<label for="">&nbsp</label>

<input type="submit" class="btn btn-success btn-lg" name="ok" value="INSERIR" />  </form>
</div>
</div>
</div>



<?php
}?>
</div>
<div  class="panel-body">


</div>
</div>


          <div class="table-overflow">


  <table id="item" class="table table-striped table-advance table-hover" >
            <thead class="tabela">


              <tr>
                <th>Garçon</th>
                <th>Hora</th>
                <th>Produto</th>

              <th>Valor UNI</th>
              <th>QTDD</th>
              <th>VALOR TOTAL</th>
              <th>AÇÕES</th>
              </tr>
            </thead>
            <tbody id="tabela">

              <div id="itenstable">
  <?php foreach ($itenspedido as $i) {
        ?>
    <tr>
    <?php    $totalitem= $i['valorproduto']*$i['qtdd'];
        $subtotal += $totalitem; ?>






<td></td>
<td><strong><?php echo $i['hora']; ?></strong></td>
<td><strong><?php echo $i['nome_produto']; ?></strong></td>
<td><strong>R$ <?php echo $i['valorproduto']; ?>,00</strong></td>
<td><strong><?php echo $i['qtdd']; ?></strong></td>
<td><strong>R$ <?php echo $i['valorproduto']*$i['qtdd']; ?>,00</strong></td>
<td><div class="btn-group">
                        <a class="btn btn-primary" title="IMPRIMIR" href="<?php echo site_url('vendas/imprimiproduto/'.$i['id']); ?>"><i class="fa fa-print"></i></a>

                        <a data-toggle="modal" data-target="#modaledit<?php echo $i['id']?>" class="btn btn-warning" title="EDITAR" ><i class="fa fa-edit"></i></a>
                        <a data-toggle="modal" data-target="#modalitem<?php echo $i['id']; ?>" class="btn btn-danger" title="EXCLUIR" href="#"><i class="fa fa-times"></i></a>
                      </div>

                      <div class="modal fade" id="modalitem<?php echo $i['id']; ?>">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    Aviso !
                                  </div>
                                  <div class="modal-body">
                                      <h3 style="text-align: center">Tem certeza que deseja excluir o item <?php echo $i['nome_produto']; ?>?</h3>


                                  </div>
                                  <div class="modal-footer">
                                    <span idAcao="<?php echo $i['id']; ?>" title="SIM" class="btn btn-success col-md-2 btn-lg"><i class="icon-remove icon-white">SIM</i></span>
                                    <button class="btn btn-danger col-md-2 btn-lg" data-dismiss="modal" aria-hidden="true">NÃO</button>

                                  </div>
                              </div>
                              </div>
                            </div>

                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modaledit<?php echo $i['id']; ?>" class="modal fade">
                                             <div class="modal-dialog">
                                               <div class="modal-content">
                                                 <div class="modal-header">
                                                   <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                   <h4 class="modal-title">Atualizar item</h4>
                                                 </div>
                                                 <div class="modal-body">


<div class="row">

    <form  action="<?php echo base_url() ?>vendas/atualizaitem" method="post" id="formUpdateItem">
  <div class="col-md-5">
    <label for="nomeproduto" class="control-label">Produto: <?php echo $i['nome_produto']?></label>

                                              <input type="hidden" name="id" id="id" value="<?php echo $i['id']; ?>"/>

</div>



<div class="col-md-2">

<label for="valorproduto" class="control-label">R$ <?php echo $i['valorproduto']; ?>,00

</label>
</div>




<div class="col-md-2">
<label for="qtddproduto" class="control-label">Qtdd</label>

    <input type="number" class="form-control col-md-1 required" name="quantidade" id="quantidade" onkeyup="somenteNumeros(this);" value="<?php echo $i['qtdd']; ?>"onfocus="this.value=''" required/>



</div>
                  <div class="col-md-2">


                <input type="submit" class="btn btn-success" name="ok" value="ALTERAR" />

</div>
              </form>

                                        </div>
                                      </div>
                                        <div class="modal-footer">


                                        </div>


                                    </div>
                                  </div>
                                </div>
</td>
  </tr>

<?php
    }?>





</div>
            </tbody>


          </table>

      </div>
      <div class="row">
<div class="col-md-6" style="background:#57889c;height:135px;">
  <a id="botaovenda" href="<?php echo site_url('vendas/imprimiconta/'.$pe->id); ?>" style="position:right;" class="btn btn-primary col-md-4 btn-lg"><i class="fa fa-print"></i> CONTA</a>

  <form action="<?php echo base_url();?>vendas/itemmesa" method="post" id="form_insert">

        <fieldset style="display: none;"></fieldset>

        <input id="botaovenda" type="submit" style="position:right;" class="btn btn-default col-md-4 btn-lg"  name="cadastrar" value="CONFIRMAR ITENS" />


      </form>
  <a id="botaovenda" href="<?php echo site_url('vendas/excluirpedido/'.$pe->id); ?>" data-confirm="Tem certeza que deseja excluir essa mesa?" style="position:left;" class="btn btn-danger col-md-4 btn-lg"><i class="fa fa-times-circle"></i> EXCLUIR</a>
  <a id="botaovenda" data-toggle="modal" data-target="#modal-lg" style="position:center;" class="btn btn-success col-md-4 btn-lg"><i class="fa fa-money"></i>RECEBER</a>











</div>

<div class="col-md-6" style="background:#57889c;">

  <div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
   <div class="info-box blue-bg">
 <div class="title">Subtotal</div>
     <div class="count">R$<?php echo number_format($subtotal,2,',','.')?></div>
<?php $taxa = ($subtotal*10)/100; $total=$subtotal+$taxa; ?>
   </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
       <div class="info-box blue-bg">
     <div class="title">Taxa</div>
         <div class="count">R$<?php echo number_format($taxa,2,',','.')?></div>

       </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
           <div class="info-box blue-bg">
         <div class="title">Total</div>
             <div class="count">R$<?php echo number_format($total,2,',','.')?></div>

           </div>
              </div>



</div>


         <!--/.info-box-->



</div>































</section>

</div>


<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">Modal Tittle</h4>
                       </div>
                       <div class="modal-body" style="height:410px">
<form action="" method="post" id="form_recebimento">
                         <div class="row" style="height:300px;">
         <div style="margin-top:12px" class="col-lg-12">
<div class="col-lg-3">

  <div class="radio-toolbar">
<input type="radio" id="radio1" name="radios" value="DINHEIRO">
<label for="radio1">DINHEIRO</label>

<input type="radio" id="radio2" name="radios" value="DEBITO">
<label for="radio2">DEBIDO</label>

<input type="radio" id="radio3" name="radios" value="CREDITO">
<label for="radio3">CREDITO</label>
</div>

</div>
<div class="col-lg-2">

    <label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> VALOR</label>
<input type="text" class="form-control input-lg m-bot15 required" name="valorpagamento" id="valorpagamento" required/>



</div>

<div class="col-lg-3">
  <br>
  <input type="submit" class="btn btn-success btn-lg m-bot15" name="ok" value="RECEBER" />
</div>
</form>
<div class="col-lg-4">
  <table id="pgto" class="table table-striped table-bordered">
        <tbody>
          <tr>

            <td>Valor</td>
            <td>PGTO</td>
          </tr>
        </tbody>
      </table>
</div>
   </div>


</div>


<div class="col-md-12" style="background:#57889c;margin-top:1px;">

  <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10">
   <div class="info-box blue-bg">
 <div class="title">Subtotal</div>
     <div class="count">R$<?php echo number_format($subtotal,2,',','.')?></div>
<?php $taxa = ($subtotal*10)/100; $total=$subtotal+$taxa; ?>
   </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10">
       <div class="info-box blue-bg">
     <div class="title">Taxa</div>
         <div class="count">R$<?php echo number_format($taxa,2,',','.')?></div>

       </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10">
           <div class="info-box blue-bg">
         <div class="title">Total</div>
             <div class="count">R$<?php echo number_format($total,2,',','.')?></div>

           </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10">
               <div class="info-box blue-bg">
             <div class="title">Valor recebido</div>
                 <div class="count">R$<?php echo number_format($total,2,',','.')?></div>

               </div>
                  </div>



</div>


                     </div>
                       <div class="modal-footer">

                         <form action="<?php echo base_url()?>vendas/pagamento" method="post" id="form_recebimento">

                               <fieldset style="display: none;"></fieldset>
                           <input id="botaovenda" type="submit"  class="btn btn-success col-md-4"  name="cadastrar" value="CONFIRMAR RECEBIMENTO" />
</form>
                       </div>
                     </div>
                   </div>
                 </div>





                <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
                <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
              <script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
                <script src="<?php echo base_url()?>assest/js/validate.js"></script>




<script>

function somenteNumeros (num) {
		var er = /[^0-9.]/;
		er.lastIndex = 0;
		var campo = num;
		if (er.test(campo.value)) {
		campo.value = "";
		}
	}
</script>

                <script>
$('#valorpagamento').maskMoney();

                $('#form_prepare').submit(function(){





                  var $this = $( this );

                   var idpedido = $this.find("input[name='idpedido']").val();
                 var nomeproduto = $this.find("input[name='nomeproduto']").val();
                  var hora = $this.find("input[name='hora']").val();
                  var venda = $this.find("input[name='venda']").val();
                  var idproduto = $this.find("input[name='idproduto']").val();
                  var qtdd = $this.find("input[name='quantidade']").val();
                  var numeromesa = $this.find("input[name='numeromesa']").val();
                  var subtotal = venda*qtdd;




                //  var nomeproduto = $('#precovenda').val();
                  var tr = '<tr>'+
                    '<td></td>'+
                    '<td><strong>'+hora+'</strong></td>'+
                    '<td><strong>'+nomeproduto+'</strong></td>'+
                    '<td><strong>R$ '+venda+',00</strong></td>'+
                    '<td><strong>'+qtdd+' </strong></td>'+
                    '<td><strong>R$ '+subtotal+',00</strong></td>'+
                    '<td></td>'




                    '</tr>'
                  $('#item').find('tbody').append( tr );

                var hiddens =  '<input type="hidden" name="nomeproduto[]" value="'+nomeproduto+'" />'+
                '<input type="hidden" name="quantidade[]" value="'+qtdd+'" />'+
                  '<input type="hidden" name="hora[]" value="'+hora+'" />'+
                  '<input type="hidden" name="idpedido[]" value="'+idpedido+'" />'+
                  '<input type="hidden" name="venda[]" value="'+venda+'" />'+
                  '<input type="hidden" name="numeromesa[]" value="'+numeromesa+'" />'+
                  '<input type="hidden" name="subtotal[]" value="'+subtotal+'" />'+
                  '<input type="hidden" name="idproduto[]" value="'+idproduto+'" />';

                $('#form_insert').find('fieldset').append( hiddens );


$('#form_prepare').trigger("reset");
$('#produto').focus();
                return false;
                });

                $('#form_insert').validate({

                  rules:{
                     idproduto: {required:true}
                  },
                  messages:{
                     idproduto: {required: 'Insira um serviço'}
                  },

                submitHandler: function( form ){
                var dados = $( form ).serialize();
                $.ajax({
                type: "POST",
                url:"<?php echo base_url();?>vendas/itemmesa",
                data:dados,
                dataType:'json',
                success:function(data)
                {
                if(data.result == true){

          location.reload();
                }
                else{
                 $('#falseservice').trigger('click');
                }
                }

                });
                return false;
                }

              });



              $('#form_recebimento').submit(function(){





                var $this = $( this );
  var formapagamento = $this.find("input[name='radios']").val();

                var valorpagamento = $this.find("input[name='valorpagamento']").val();





              //  var nomeproduto = $('#precovenda').val();
                var tr = '<tr>'+
                  '<td><strong>R$'+valorpagamento+',00</strong></td>'+
                  '<td><strong>'+formapagamento+'</strong></td>'






                  '</tr>'
                $('#pgto').find('tbody').append( tr );

                var hiddens =  '<input type="hidden" name="nomeproduto[]" value="'+nomeproduto+'" />'+
                '<input type="hidden" name="quantidade[]" value="'+qtdd+'" />'+
                  '<input type="hidden" name="hora[]" value="'+hora+'" />'+

                  '<input type="hidden" name="idproduto[]" value="'+idproduto+'" />';

                $('#form_pagar').find('fieldset').append( hiddens );

              return false;
              });



    $(document).on('click', 'span', function(event) {
                var $id = $(this).attr('idAcao');
                if(($id % 1) == 0){

                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url();?>vendas/excluiritem",
                      data: "id="+$id,
                      dataType: 'json',
                      success: function(data)
                      {
                        if(data.result == true){

                location.reload();



    }
    else{

    alert('Ocorreu um erro ao tentar excluir serviço.');
    }
                      }
                      });
                      return false;
                }

           });

    $(document).ready(function(){

          $('a[data-confirm]').click(function(ev){
            var href = $(this).attr('href');
            if(!$('#dataConfirmModal').length){
              $('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" tabindex="-1"aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h2 id="dataConfirmLabel">Pedido</h2></div><h2><div class="modal-body"></div></h2><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">NÃO</button><a class="btn btn-success" id="dataConfirmOK">SIM</a></div></div></div></div>');
            }
            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href',href);
            $('#dataConfirmModal').modal({show:true});
            return false;
          });


    });



    $("#produto").autocomplete({

        source: "<?php echo base_url(); ?>produto/autoCompleteProduto",

        minLength: 2,

        select: function(event, ui) {



            $("#idproduto").val(ui.item.id);

            $("#venda").val(ui.item.venda);
              $("#nomeproduto").val(ui.item.nomeproduto);







        }

    });

    </script>






<script>

$("#formUpdateItem").validate({

  rules:{
     quantidade: {required:true}
  },
  messages:{
     quantidade: {required: 'Insira um serviço'}
  },

submitHandler: function( form ){
var dados = $( form ).serialize();


$.ajax({
type: "POST",
url: "<?php echo base_url();?>vendas/atualizaitem",
data: dados,
dataType: 'json',
success: function(data)
{
  if(data.result == true){
    location.reload();

  }
  else{
      alert('Ocorreu um erro ao tentar adicionar serviço.');
  }
}
});

return false;
}

});

</script>
</section>
</section>
