


<section id="main-content">
  <section class="wrapper">

         <div class="col-lg-12">
           <h4>.</h4></div>

           <section class="panel">


             <!-- INICIO DIV PEDIDO !-->


<div id="painelvenda" class="painelvenda">
  <link href="<?php echo base_url()?>assest/css/jquery-ui.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assest/css/jquery-ui.theme.css" rel="stylesheet">
                <div class="cabecalhopedido">
                    <div class="col-lg-3">



                        <h2>MESA <?php echo $mesa;?></h2>
                          <h4> Pedido Nº <?php echo $pedido;?></h4>
                    </div>
                    <div class="col-lg-8">
                      <form action="" method="post" id="form_prepare">
<div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                                    <input type="text" class="form-control input-lg  required" name="produto" id="produto" placeholder="Digite o nome do produto" required/>

                                                    <input type="hidden" name="idproduto" id="idproduto" value=""/>



                    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                    <input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />

                                                    <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                                    <input type="hidden" name="venda" id="venda" />
                                                      <input type="hidden" name="idpedido" id="idpedido" value="<?php echo $pedido?>" />
                                                      <input type="hidden" name="garcom" id="garcom" value="<?php echo $login ?>"/>

                                                  </div>



</div>
                                                <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                  <label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> Qtdd</label>
                                                                              <input type="text" class="form-control input-lg m-bot15 required"  name="quantidade" onkeyup="somenteNumeros(this);" id="quantidade" required/>
                    </div>
                    </div>

                    <div class="col-md-2">

                    <label for="">&nbsp</label>
<br/>
                    <input type="submit" class="btn btn-success btn-lg btn-block" name="ok" value="INSERIR" />
                    </div>

</form>
</div>
                </div>
                <div  class="esquerda">


                <div class="botoespedido">

                  </div>
                  <div class="totaispedido">
                    <div class="col-lg-12">
                      <div class="col-lg-6">
                        <h3>Subtotal </h3>

                        <?php  $total=0;
                        $subtotal=0;
                        foreach ($itenspedido as $i) {




                                  $totalitem= $i['valorproduto']*$i['qtdd'];
                                  $subtotal += $totalitem; }?>
                        <?php foreach($empresa as $e){
                         $taxaservico = $e['taxaservico'];}
                         $taxa = ($subtotal*$taxaservico)/100; $total=$subtotal+$taxa; ?>
                        <h4>Serviço</h4>

                        <h3>Total </h3>
                      </div>
                      <div class="col-lg-6">
                        <h3>R$<?php echo number_format($subtotal,2,',','.')?></h3>
                        <h4>R$<?php echo number_format($taxa,2,',','.')?></h4>
                        <h3>R$<?php echo number_format($total,2,',','.')?></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- INICIO DIV DIREITA !-->
                <div  class="direita">


<!-- INICIO DIV ITENS DO PEDIDO !-->
                  <div class="tabelaitens">
                      <div class="tabela">
                    <table id="item" class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-md-1">Garçom</th>
                    <th class="col-md-1">Hora</th>
                    <th class="col-md-4">Item</th>
                    <th class="col-md-1">Vlr UN</th>
                    <th class="col-md-1">Qtdd</th>
                    <th class="col-md-1">Total</th>
                    <th class="col-md-1">Ações</th>
                  </tr>
                </thead>
                <tbody>

                  <?php  $total=0;
                  foreach ($itenspedido as $i) {
                        ?>

                        <tr>

                        <?php    $subtotal=0;  $totalitem= $i['valorproduto']*$i['qtdd'];
                            $subtotal += $totalitem; ?>






                    <td><strong><?php echo $i['garcom']; ?></strong></td>
                    <td><strong><?php echo $i['hora']; ?></strong></td>
                    <td><strong><?php echo $i['nome_produto']; ?></strong></td>
                    <td><strong>R$ <?php echo $i['valorproduto']; ?>,00</strong></td>
                    <td><strong><?php echo $i['qtdd']; ?></strong></td>
                    <td><strong>R$ <?php echo $i['valorproduto']*$i['qtdd']; ?>,00</strong></td>
                    <td><span idAcao="<?php echo $i['id'] ;?>" title="Excluir" class="btn btn-danger"><i class="icon-remove icon-white">EXCLUIR</i></span>

                    </td>
</tr>

<?php
$total += $subtotal;

} ?>
                </tbody>
              </table>
</div>
                  </div>
<!-- FIM DIV ITENS DO PEDIDO !-->


<!-- INICIO DIV BOTOES PEDIDO !-->


                  <div class="botoespagamento">
                    <div class="col-lg-12">

                      <div class="col-lg-4">
                        <a id="btnreceber"  data-target=".bs-example-modal-lg" data-toggle="modal" class="btn btn-success btn-lg btn-block">RECEBER</a>

                    </div>

                    <div class="col-lg-4">
                      <a id="btnreceber" href="#abrirmesa" data-toggle="modal" class="btn btn-success btn-lg btn-block">IMPRIMIR CONTA</a>

                  </div>
                  <div class="col-lg-2">
                    <form action="<?php echo base_url();?>vendas/mesasindex">

                          <fieldset style="display: none;"></fieldset>

                          <input id="btnreceber" type="submit" style="position:right;" class="btn btn-success col-lg-12 btn-lg"  name="cadastrar" value="SAIR" />


                        </form>
                  </div>
                    </div>
                  </div>

<!-- FIM DIV BOTOES DO PEDIDO !-->

                </div>

                <!-- FIM DIV DIREITA !-->
</div>
 <!-- INICIO DIV PEDIDO !-->



 <div id="modalrec"class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title">RECEBIMENTO - MESA <?php echo $mesa;?></h4>
       </div>
       <div class="painelrec">

         <div class="esquerdarecebimento">
<div class="tabelamodalrec">
           <table id="pagamento" class="table table-hover">
       <thead>
         <tr>
           <th class="col-md-2">Pagamento</th>
           <th class="col-md-2">Valor</th>
           <th class="col-md-2">Obs</th>
           <th class="col-md-2">Estornar</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
<div class="totalmodal">

  <form action="<?php echo base_url();?>vendas/pagamento" method="post" id="form_confirmarec">

        <fieldset style="display: none;"></fieldset>

        <input id="btnreceber" type="submit" style="position:right;" class="btn btn-success col-lg-12 btn-lg"  name="cadastrar" value="CONFIRMAR PAGAMENTO" />


      </form>
</div>
         </div>

         <div class="direitarecebimento">
           <div class="col-lg-12">
  <form action="" method="post" id="form_tablepgto">
 <div class="col-lg-12">
    <div class="form-group">
           <ul class="payment-methods">
  <li class="payment-method">
    <input name="payment_methods" type="radio" value="dinheiro"id="dinheiro">
    <label for="dinheiro">DINHEIRO</label>
  </li>

  <li class="payment-method">
    <input name="payment_methods" type="radio" value="credito" id="credito">
    <label for="credito">CRÉDITO</label>
  </li>

  <li class="payment-method">
    <input name="payment_methods" type="radio" value="debito" id="debito">
    <label for="debito">DEBITO</label>
  </li>
  <li class="payment-method">
    <input name="payment_methods" type="radio" value="cheque" id="cheque">
    <label for="cheque">CHEQUE</label>
  </li>

  <li class="payment-method">
    <input name="payment_methods" type="radio" value="fiado" id="fiado">
    <label for="fiado">FIADO</label>
  </li>
</ul>
</div>

</div>

<div class="col-lg-6">
<div class="form-group">
  <input type="hidden" name="pedido" id="pedido" value="<?php echo $pedido ?>"
  <label for="valorpgto" class="control-label"> VALOR</label>

  <input type="text" class="form-control input-lg" name="vlrpgto" id="vlrpgto"/>
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






  </section>
</section>
<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>

<script>


$('#vlrpgto').maskMoney();



$('#form_tablepgto').keypress(function(e){


	if(e.wich == 13 || e.keyCode == 13){


    var $this = $( this );


   var radio = $this.find("input[type='radio']:checked").val();
    var vlrpgto = $this.find("input[name='vlrpgto']").val();
var pedido = $this.find("input[name='pedido']").val();


    var tr = '<tr>'+
      '<td>'+radio+'</td>'+
      '<td><strong>'+vlrpgto+'</strong></td>'+
      '<td></td>'+

      '<td></td>'




      '</tr>'
    $('#pagamento').find('tbody').append( tr );

    var hiddens =  '<input type="hidden" name="tiporecebimento[]" value="'+radio+'" />'+
    '<input type="hidden" name="pedido[]" value="'+pedido+'" />'+
    '<input type="hidden" name="vlrpgto[]" value="'+vlrpgto+'" />';


    $('#form_confirmarec').find('fieldset').append( hiddens );


    $('#form_tablepgto').trigger("reset");

    return false;
	}

});


$('#form_confirmarec').submit(function(){

  var dados = $( '#form_confirmarec' ).serialize();
  $.ajax({
  type: "POST",
  url:"<?php echo base_url();?>vendas/pagamento",
  data:dados,
  dataType:'json',
  success:function(data)
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


});
$('#form_prepare').submit(function(){





  var $this = $( this );


 var nomeproduto = $this.find("input[name='nomeproduto']").val();
  var hora = $this.find("input[name='hora']").val();
  var venda = $this.find("input[name='venda']").val();
  var idpedido = $this.find("input[name='idpedido']").val();
  var idproduto = $this.find("input[name='idproduto']").val();
    var garcom = $this.find("input[name='garcom']").val();
  var qtdd = $this.find("input[name='quantidade']").val();
  var numeromesa = $this.find("input[name='numeromesa']").val();
  var subtotal = venda*qtdd;




//  var nomeproduto = $('#precovenda').val();
  var tr = '<tr>'+
    '<td>'+garcom+'</td>'+
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
  '<input type="hidden" name="garcom[]" value="'+garcom+'" />'+
  '<input type="hidden" name="numeromesa" value="'+numeromesa+'" />'+
  '<input type="hidden" name="venda[]" value="'+venda+'" />'+
'<input type="hidden" name="idpedido[]" value="'+idpedido+'" />'+
  '<input type="hidden" name="subtotal[]" value="'+subtotal+'" />'+
  '<input type="hidden" name="idproduto[]" value="'+idproduto+'" />';

$('#form_insert').find('fieldset').append( hiddens );


var dados = $( '#form_insert' ).serialize();
$.ajax({
type: "POST",
url:"<?php echo base_url();?>vendas/itemmesa",
data:dados,
dataType:'json',
success:function(data)
{

  if(data.result == true){
    location.reload();

    $('#form_prepare').trigger("reset");
    $('#produto').focus();

  }
  else{
      alert('Ocorreu um erro ao tentar adicionar serviço.');
  }

}

});
return false;




});


function somenteNumeros (num) {
		var er = /[^0-9.]/;
		er.lastIndex = 0;
		var campo = num;
		if (er.test(campo.value)) {
		campo.value = "";
		}
	}




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

$("input[type='radio']").click(function(){

    $('#vlrpgto').focus();
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
