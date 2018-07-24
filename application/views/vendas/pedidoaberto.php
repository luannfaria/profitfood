


<section id="main-content">
  <section id="wrapper">





           <section class="viewpedido">


             <!-- INICIO DIV PEDIDO !-->



<div class="row">
<div id="painelvenda" class="painelvenda">
  <link href="<?php echo base_url()?>assest/css/jquery-ui.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assest/css/jquery-ui.theme.css" rel="stylesheet">
                <div class="cabecalhopedido">
                  <div class="row">
                    <div class="col-lg-4">


                        <div class="col-lg-6">
                        <h2>MESA <?php echo $mesa;?> </h2>
                        <?php if($pedido->nomecliente!=null){?>
                          <h4> Cliente: <?php echo $pedido->nomecliente;?></h4>
                       <?php }?>
                        </div>
                        <div class="col-lg-5">
                            <h4> Pedido Nº <?php echo $pedido->id;?></h4>
                        </div>
                    </div>



                      <form action="" method="post" id="itemteste">
                        <div class="col-lg-8">
  <div class="col-lg-6">
                                                  <div class="form-group">
                                                    <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                                    <input type="text" class="form-control input-lg  required" name="produto" id="produto"  placeholder="Digite o nome do produto" required/>

                                              <!--      <input type="hidden" name="idproduto" id="idproduto" value=""/>



                    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                    <input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />

                                                    <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                                    <input type="hidden" name="venda" id="venda" />-->
                                                      <input type="hidden" name="idpedido" id="idpedido" value="<?php echo $pedido->id?>" />
                                                      <input type="hidden" name="garcom" id="garcom" value="<?php echo $login ?>"/>

                                                          <input type="hidden" name="numeromesa" id="numeromesa" value="<?php echo $mesa ?>"/>

                                                  </div>



</div>
                                                <div class="col-md-2">
                                                                                <div class="form-group">

                    </div>
                    </div>

                    <div class="col-lg-2">


                    </div>
</div>
</form>

</div>
                </div>
                <div  class="esquerda">


                <div class="botoespedido">
                  <div class="clientes">
<form  action="" id="inserecliente" method="post">

<div class="col-lg-12">
  <div class="form-group">

                    <label for="cliente" class="control-label"><span class="text-danger">*</span><i class="fa fa-user"> </i> Cliente</label>


                    <input type="text" class="form-control required" name="cliente" id="cliente" placeholder="Digite o nome do cliente"  onfocus="this.value=''" required/>

                    <input type="hidden" class="form-control" name="id" id="id" />
                    <input type="hidden" class="form-control" name="nome" id="nome" />
                        <input type="hidden" name="idpedido" id="idpedido" value="<?php echo $pedido->id?>" />









</div>
</div>
</form>
<h4></h4>
</div>
                  </div>
                        <div class="excluir">




                        </div>

                  <div class="totaispedido">
                    <div class="col-lg-12">
                      <div class="col-lg-6">

                <?php        if(!$pagamento){?>
                        <h4>Desconto </h4>
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
                        <h4>R$<?php if($pedido->desconto>'0'){ echo number_format($pedido->desconto,2,',','.'); } else { echo '0.00'; } ?></h4>
                        <h3>R$<?php echo number_format($subtotal,2,',','.')?></h3>
                        <h4>R$<?php echo number_format($taxa,2,',','.')?></h4>
                        <h3>R$<?php echo number_format($total,2,',','.')?></h3>
                      </div>
                    <?php }else{
                      $vlrpago=0;
foreach($pagamento as $pg){
  $vlrpago += $pg['valortotal'];
}
                      ?>
                      <h4>Desconto</h4>
                      <h4>PAGO</h4>
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
                      <h4><?php echo $pedido->desconto ?></h4>
                      <h4>R$<?php echo number_format($vlrpago,2,',','.')?></h4>
                      <h3>R$<?php echo number_format($subtotal,2,',','.')?></h3>
                      <h4>R$<?php echo number_format($taxa,2,',','.')?></h4>
                      <h3>R$<?php echo number_format($total,2,',','.')?></h3>
                    </div>
                <?php    }?>
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
                    <th class="col-md-1"></th>
                    <th class="col-md-1"></th>
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
                    <td><strong>R$ <?php  echo number_format($i['valorproduto'],2,',','.');?></strong></td>
                    <td><strong><?php echo $i['qtdd']; ?></strong></td>
                    <td><strong>R$ <?php echo $i['valorproduto']*$i['qtdd']; ?>,00</strong></td>
                    <td><span idAcao="<?php echo $i['id'] ;?>" title="Excluir" class="btn btn-danger"><i class="icon-remove icon-white">EXCLUIR</i></span>

                    </td>


                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal<?php echo $i['id']?>" class="modal fade">
                                     <div class="modal-dialog">
                                       <div class="modal-content-small1">
                                         <div class="modal-header">
                                           <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                           <h4 class="modal-title">ITEM PEDIDO - MESA <?php echo $mesa ?></h4>
                                         </div>
                                         <div class="modal-body">


 <div class="col-lg-12">
                                               <form id="updateitem" action="" method="post">
                                                    <div class="row">
                                                      <div class="col-lg-">
                                                    <label class="prodedit"><?php echo $i['nome_produto']?></label>

</div>


<div class="col-lg-4">
        <input type="hidden" class="form-control" name="iditem" id="iditem" value="<?php echo $i['id'] ?>"/>
                                                    <input type="text" class="form-control" name="qtdditem" id="qtdditem"/>
</div>

<div class="col-lg-5">
    <input type="submit" class="btn btn-success col-lg-12" name="ok" value="ALTERAR" />
</div>
</div>
                                               </form>
</div>

                                         </div>
                                       </div>
                                     </div>
                                   </div>

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


                      <div class="col-lg-3">

  <a id="btnreceber" href="#desconto" data-toggle="modal" class="btn btn-success btn-lg btn-block">DESCONTO (F8)</a>
                      </div>
                      <div class="col-lg-3">
                        <a href="#modalrec"id="btnreceber" name="botaoreceberpedido" data-target=".bs-example-modal-lg" data-toggle="modal" class="btn btn-success btn-lg btn-block">RECEBER (ALT+R)</a>

                    </div>

                    <div class="col-lg-3">
                      <a  id="btnreceber" href="<?php echo site_url('vendas/imprimirconta/'.$pedido->id); ?>"  class="btn btn-success btn-lg btn-block">IMPRIMIR CONTA</a>

                  </div>
                  <div class="col-lg-3">
<?php if(!$pagamento){ ?>
                    <a  href="<?php echo site_url('vendas/excluirpedido/'.$pedido->id); ?>" id="excluirpedido" data-confirm="Tem certeza que deseja excluir essa mesa?"  class="btn btn-danger col-lg-12 btn-lg btn-block">EXCLUIR(ALT+P)</a>
<?php }?>
                  </div>
                    </div>
                  </div>

<!-- FIM DIV BOTOES DO PEDIDO !-->

                </div>

                <!-- FIM DIV DIREITA !-->

 <!-- INICIO DIV PEDIDO !-->



 <div class="modal fade" id="desconto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content-small">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">DESCONTO</h4>
         </div>
         <div class="modal-body">

                         <div class="row">
                           <div class="col-lg-10">

                             <form id="descontopedido" action="" method="post">

                               <h4>DESCONTO</h4>
                               <input type="hidden" id="idpedido" name="idpedido" value="<?php echo $pedido->id?>"/>
                             <input type="text" class="form-control input-lg" name="valordesconto" id="valordesconto"/>
                               </form>
                           </div>
                         </div>

                       </div>
                       <div class="modal-footer">

                       </div>

                     </div>
                   </div>
                 </div>






</div>

           </section>


            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalproduto" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content-produto">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">ITEM</h4>
                    </div>
                    <div class="modal-body">

                                    <div class="row">
                                      <div class="col-lg-10">
                                        <form id="form_prepare" method="post" >

                            <div class="col-md-6">
                                                                            <div class="form-group">

                                                                              <input type="hidden" name="idproduto" id="idproduto" value=""/>



                                              <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                                              <input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />
  <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>
                                                                              <input type="text" class="form-control input-lg m-bot15" name="nomeproduto" id="nomeproduto" disabled/>
<input type="hidden" name="nomeprodutoadd" id="nomeprodutoadd" />
                                                                              <input type="hidden" name="venda" id="venda" />
                                                                                <input type="hidden" name="idpedido" id="idpedido" value="<?php echo $pedido->id?>" />
                                                                                <input type="hidden" name="garcom" id="garcom" value="<?php echo $login ?>"/>

                                                                                    <input type="hidden" name="numeromesa" id="numeromesa" value="<?php echo $mesa ?>"/>

                                                                            </div>



                          </div>
                                                                          <div class="col-md-2">
                                                                                                          <div class="form-group">
                                                                                                            <label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> Qtdd</label>
                                                                                                        <input type="text" class="form-control input-lg m-bot15 required" name="quantidade" onkeyup="somenteNumeros(this);" id="quantidade" required/>
                                              </div>
                                              </div>




                                      </div>
                                    </div>


                                    <div class="row">
         <div class="col-lg-6">
           <!--notification start-->
           <section class="panel-item">
             <header class="panel-heading">
               Adicionais
             </header>
             <div class="panel-body">

               <div class="form-group">
                <table class="table">

                  <tbody>
                  <?php foreach($adicionais as $ad){ ?>
                    <tr>
                      <td><input type="checkbox" name="nomeadicional[]" value="<?php echo $ad['nomeadicional'] ?>">
  <input type="hidden" name="valoradicional"  class="form-control" value="<?php echo $ad['valoradicional'] ?>">

                      </td>
                        <td>  <?php echo $ad['nomeadicional'] ?>  </td>
                        <td> <?php echo $ad['valoradicional'] ?> </td>
                      </tr>
                  <?php } ?>
</tbody>
                </table>

              </div>
             </div>
           </section>
</div><div class="col-lg-6">

           <section class="panel-item">
             <header class="panel-heading">
               Observações
             </header>
             <div class="panel-body">
               <div class="form-group">
                <table class="table">

                  <tbody>
                  <?php foreach($observacoes as $ob){ ?>
                    <tr>
                      <td><input type="checkbox" name="nomeobservacao[]" value="<?php echo $ob['nome'] ?>">


                      </td>
                        <td>  <?php echo $ob['nome'] ?>  </td>

                      </tr>
                  <?php } ?>
            </tbody>
                </table>

              </div>


             </div>
           </section>

</div>

<div class="col-lg-2">

<label for="">&nbsp</label>
<br/>
<input type="submit" class="btn btn-success btn-lg col-lg-12" name="ok" value="INSERIR" />
</div>
    </form>
</div>

<div class="row">

<div class="col-lg-12">





</div>

</div>
                                  </div>


                                </div>
                              </div>
                            </div>



           <div id="modalrec" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   <h4 class="modal-title">RECEBIMENTO - MESA <?php echo $mesa;?></h4>
                 </div>
                 <div id="painelrec"class="painelrec">

                   <div class="esquerdarecebimento">
          <div class="tabelamodalrec">
                     <table id="pagamento" class="table table-hover">
                 <thead>
                   <tr>
                     <th class="col-md-2">Pagamento</th>
                     <th class="col-md-2">Valor</th>

                     <th class="col-md-2">Estornar</th>
          </tr>
          </thead>
          <tbody>
          <?php if(!$pagamento){?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php }else{ foreach($pagamento as $pg){?>
            <tr>
              <td><?php echo $pg['formarec_nome']?></td>
              <td><?php echo $pg['valortotal']?></td>
              <td>  <a id="excluirpgto" href="<?php echo site_url('vendas/excluirpgto/'.$pg['id']); ?>"   class="btn btn-danger">EXC</a></td>
            </tr>
            <?php } }?>
          </tbody>
          </table>
          </div>

          <?php
          $totalvenda = 0;
          $vlrserv=  ($totalitens*$taxaservico)/100;
          $totalvenda = $vlrserv+$totalitens;
           ?>
          <div class="totalmodal">
          <?php if(!$pagamento){?>
            <h3>Total pedido <strong>R$<?php echo number_format($totalvenda,2,',','.')?></strong></h3>
          <?php }else{?>
            <h3>Pago <strong>R$ <?php echo number_format($vlrpago,2,',','.')?></strong></h3>

            <h3>Total pedido <strong>R$ <?php echo number_format($totalvenda,2,',','.')?></strong></h3>
          <h3> Restante <strong> R$ <?php echo number_format(($totalvenda)-($vlrpago)-($pedido->desconto),2,',','.')?> </strong></h3>
          <?php }?>


          </div>
                   </div>


                   <div class="direitarecebimento">

          <form action="" method="post" id="form_tablepgto">




<div class="row">
 <div class="form-group">
   <div class="col-lg-12">
                     <ul class="payment-methods">
            <li class="payment-method">
              <input name="payment_methods" type="radio" value="dinheiro" id="dinheiro">
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

<div class="form-group">
<div class="col-lg-6">
          <input type="hidden" name="pedido" id="pedido" value="<?php echo $pedido->id?>"/>


              <input type="hidden" name="numeromesa" id="numeromesa" value="<?php echo $mesa?>"/>

          <input type="hidden" name="totalvenda" value="<?php echo number_format($totalvenda,2,',','.')?>"/>
          <label for="valorpgto"  style="text-align: center" class="control-label"> VALOR</label>
          <?php if(!$pagamento){?>
          <input type="hidden" name="vlrpago" value=""/>
          <?php }else{?>
            <input type="hidden" name="restante" value="<?php echo number_format(($totalvenda)-($vlrpago)-($pedido->desconto),2,',','.')?>"/>
            <input type="hidden" name="vlrpago" value="<?php echo number_format($vlrpago,2,',','.')?>"/>
          <?php }?>
          <input type="text" class="form-control input-lg" name="vlrpgto" id="vlrpgto"/>
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



  </section>
</section>
<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>



<script>
jQuery.browser = {};
(function () {
jQuery.browser.msie = false;
jQuery.browser.version = 0;
if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
jQuery.browser.msie = true;
jQuery.browser.version = RegExp.$1;
}
})();


$('#updateitem').submit(function(){



      var $this = $( this );


                      var dados = $('#updateitem').serialize();

      $.ajax({
      type: "POST",
      url:"<?php echo base_url();?>vendas/atualizaitem",
      data:dados,
      dataType:'json',
      success:function(data)
      {

        if(data.result == true){




         location.reload();
        }

        else{


    alert('erro');


        }

      }

      });
      return false;



  });
$('#desconto').keypress(function(e){

  	if(e.wich == 13 || e.keyCode == 13){


var $this = $( this );


                var dados = $('#descontopedido').serialize();

$.ajax({
type: "POST",
url:"<?php echo base_url();?>vendas/desconto",
data:dados,
dataType:'json',
success:function(data)
{

  if(data.result == true){




   location.reload();
  }

  else{


location.reload();


  }

}

});
return false;

    }


});

$( document ).ready(function() {
$('#produto').focus();
});

$(document).on('keydown', function(e) {
  console.log(e.which); // Retorna o número código da tecla
  console.log(e.altKey); // Se o alt foi Pressionado retorna true
if(e.which==115){
  $('#produto').focus();

}
  if ((e.altKey) && (e.which === 82)) {
// Pesquisar (Alt + P)
//if (e.which ===56) {
$('#modalrec').modal('show');
//  $('#excluirpedido').trigger('click');
  }

  if ((e.altKey) && (e.which === 80)) {
// Pesquisar (Alt + P)
//if (e.which ===56) {
  $('#excluirpedido').trigger('click');
  }

  if ((e.altKey) && (e.which === 68)){

    $('#desconto').modal('show');
  }


});

$('#vlrpgto').maskMoney();

$('#valordesconto').maskMoney();


$("#produto").keypress(function(e) {

  if(e.wich == 13 || e.keyCode == 13){



var idproduto = document.getElementById("idproduto").value;
var venda = document.getElementById("venda").value;
var garcom = document.getElementById("garcom").value;
      var hora = document.getElementById("hora").value;
    var nomeproduto = document.getElementById("nomeproduto").value;
    var idpedido = document.getElementById("idpedido").value;

//$('#desconto').modal('show');

  //$('#call-modal').trigger('click');
    if(idproduto>0){
    //  $("#produtoinserido").text(nomeproduto);

  //  document.getElementById("nomeprodutoadd").setAttribute ('value',nomeproduto);

    $('#modalproduto').modal('show');

    $('#quantidade').trigger('click');


 //alert('ok');
   //$('#call-modal').click();
}
return false;
  }


  /* Act on the event */
});


$('#form_tablepgto').keypress(function(e){


	if(e.wich == 13 || e.keyCode == 13){


    var $this = $( this );


   var radio = $this.find("input[type='radio']:checked").val();
    var vlrpgto = $this.find("input[name='vlrpgto']").val();
var pedido = $this.find("input[name='pedido']").val();
var vlrpago = $this.find("input[name='vlrpago']").val();
var restante = $this.find("input[name='restante']").val();
var numeromesa = $this.find("input[name='numeromesa']").val();
var totalvenda = $this.find("input[name='totalvenda']").val();


    var tr = '<tr>'+
      '<td>'+radio+'</td>'+
      '<td><strong>'+vlrpgto+'</strong></td>'+
      '<td></td>'+

      '<td></td>'




      '</tr>'
    $('#pagamento').find('tbody').append( tr );

    var hiddens =  '<input type="hidden" name="tiporecebimento[]" value="'+radio+'" />'+
    '<input type="hidden" name="pedido[]" value="'+pedido+'" />'+
    '<input type="hidden" name="totalvenda[]" value="'+totalvenda+'" />'+
      '<input type="hidden" name="numeromesa[]" value="'+numeromesa+'" />'+
      '<input type="hidden" name="restante[]" value="'+restante+'" />'+
      '<input type="hidden" name="vlrpago[]" value="'+vlrpago+'" />'+
    '<input type="hidden" name="vlrpgto[]" value="'+vlrpgto+'" />';


    $('#form_confirmarec').find('fieldset').append( hiddens );
var dados = $( hiddens ).serialize();

    $.ajax({
    type: "POST",
    url:"<?php echo base_url();?>vendas/pagamento",
    data:dados,
    dataType:'json',
    success:function(data)
    {

      if(data.result == true){




        window.location.href="<?php echo base_url();?>vendas/mesasindex";
      }

      else{


location.reload();


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
          $('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" tabindex="-1"aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h2 id="dataConfirmLabel">Pedido</h2></div><h2><div class="modal-body"></div></h2><div class="modal-footer"><a class="btn btn-success btn-lg col-lg-4" id="dataConfirmOK">SIM</a> <button  class="btn btn-danger btn-lg col-lg-4" data-dismiss="modal" aria-hidden="true">NÃO</button></div></div></div></div>');
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href',href);
        $('#dataConfirmModal').modal({show:true});
        return false;
      });


});


$('#inserecliente').submit(function(){

  var $this = $( this );


 var idcliente = $this.find("input[name='id']").val();
  var nome = $this.find("input[name='nome']").val();
  var idpedido = $this.find("input[name='idpedido']").val();

  var hiddens =  '<input type="hidden" name="idcliente" value="'+idcliente+'" />'+
  '<input type="hidden" name="nome" value="'+nome+'" />'+
    '<input type="hidden" name="idp" value="'+idpedido+'" />';







  var dados = $(hiddens).serialize();
  $.ajax({
  type: "POST",
  url:"<?php echo base_url();?>vendas/addclientepedido",
  data:dados,
  dataType:'json',
  success:function(data)
  {

if(data.result == true){




location.reload();
}

else{
    location.reload();
}

  }

  });
return false;

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




  window.location.href="<?php echo base_url();?>vendas/mesasindex";
}

else{

$("#painelrec").load("<?php echo current_url();?> #painelrec" );
    //location.reload();

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

var hiddens =  '<input type="hidden" name="nomeproduto" value="'+nomeproduto+'" />'+
'<input type="hidden" name="quantidade" value="'+qtdd+'" />'+
  '<input type="hidden" name="hora" value="'+hora+'" />'+
  '<input type="hidden" name="garcom" value="'+garcom+'" />'+
  '<input type="hidden" name="numeromesa" value="'+numeromesa+'" />'+
  '<input type="hidden" name="venda" value="'+venda+'" />'+
'<input type="hidden" name="idpedido" value="'+idpedido+'" />'+
  '<input type="hidden" name="subtotal" value="'+subtotal+'" />'+
  '<input type="hidden" name="idproduto" value="'+idproduto+'" />';

$('#form_insert').find('fieldset').append( hiddens );

  var dados = $('#form_prepare').serialize();

$.ajax({
type: "POST",
url:"<?php echo base_url();?>vendas/additem",
data:dados,
dataType:'json',
success:function(data)
{

  if(data.result == true){
    window.location.reload();
    $('#produto').focus();
//    $( "#painelvenda" ).load("<?php echo current_url();?> #painelvenda" );
//    $('#form_prepare').trigger("reset");
//  $( "#form_prepare" ).load("<?php echo current_url();?> #form_prepare" );




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


$("#cliente").autocomplete({

    source: "<?php echo base_url(); ?>cliente/autoCompleteCliente",

    minLength: 2,

    select: function(event, ui) {



        $("#id").val(ui.item.id);
        $("#nome").val(ui.item.nome);





    }

});


$("#produto").autocomplete({

    source: "<?php echo base_url(); ?>produto/autoCompleteProduto",

    minLength: 2,

    select: function(event, ui) {



        $("#idproduto").val(ui.item.id);

        $("#venda").val(ui.item.venda);
          $("#nomeproduto").val(ui.item.nomeproduto);
          $("#nomeprodutoadd").val(ui.item.nomeproduto);







    }

});
</script>
