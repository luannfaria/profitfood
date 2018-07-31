<section id="main-content">
      <section class="wrapper">

        <section class="caixa">

          <div class="painel1">

          <div class="esquerda">
            <div class="produtospdv">

                <div class="row">
                  <div class="col-lg-12">


                  <form  action="" method="POST">



                    <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                      <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>
<input type="text" class="form-control input-lg  required" name="produtobusca" id="produtobusca" placeholder="Digite o nome do produto" required/>


                                                                      <input type="hidden" name="idproduto" id="idproduto" value=""/>
                                                                        <input type="hidden" id="idpdv" name="idpdv" value="<?php echo $pdv->id?>"/>


                                      <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                                      <input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />

<input type="hidden" name="venda" id="venda" />

<input type="hidden" name="totalvenda" id="totalvenda"/>
                                                                      <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                                                        <input type="hidden" name="codbarra" id="codbarra" />
                                                                      <input type="hidden" name="quantidade" id="quantidade" value="1"/>
</div>
</div>

                  </form>
                </div>
              </div>
            </div>
            <div class="tabelapdv">


              <table id="item" class="table table-hover">
          <thead>
            <tr>
              <th class="col-md-2">COD BARRA</th>
              <th class="col-lg-3">PRODUTO</th>
              <th class="col-md-2">VALOR</th>
              <th class="col-md-1">QTDD</th>
              <th class="col-md-2">TOTAL</th>
              <th class="col-md-2">AÇÕES</th>

            </tr>
          </thead>
          <tbody>

            <?php $totalvenda=0;  foreach ($itenspdv as $it) { $totalitem=0;
    ?>
              <tr>
            <td><?php echo $it['codbarra']; ?></td>
            <td><?php echo $it['nomeproduto']; ?></td>
            <td>R$ <?php echo number_format($it['valor'], 2, '.', '.')?></td>
            <td><?php echo $it['qtdd']; ?></td>
            <td>R$ <?php echo number_format($it['valor']*$it['qtdd'], 2, '.', '.')?></td>
            <td><span idAcao="<?php echo $it['id']; ?>" title="Excluir" class="btn btn-danger"><i class="icon-remove icon-white">EXCLUIR</i></span></td>
            </tr>
          <?php  $totalitem = $it['qtdd']*$it['valor']; $totalvenda +=$totalitem;
} ?>

          </tbody>
        </table>
            </div>

            <div class="totalpdv">

            <div class="col-lg-12">

            <div class="col-lg-4">

                    <a  href="" id="excluirpedido" data-confirm="Tem certeza que deseja excluir essa venda?"  class="btn btn-danger col-lg-12 btn-lg btn-block"><i class="fa fa-times"> </i> EXCLUIR(ALT+P)</a>

            </div>


                  <div class="col-lg-4">
                  <button type="button" id="btntot"style="margin-top:30px" class="btn btn-success btn-lg-12 btn-lg btn-block" data-toggle="modal" href="#myModal">DESCONTO (ALT+D)</button>


</div>

        <div class="col-lg-4">

                <button type="button" id="btntot"style="margin-top:30px" class="btn btn-success btn-lg-12 btn-lg btn-block" data-toggle="modal" href="#receber"><i class="fa fa-money"> </i> RECEBER</button>
        </div>
</div>
</div>

          </div>

          <div class="direita">

              <div class="pdvcab">
                  <h2 style="text-align: center">PONTO DE VENDA</h2>

                      <H4 style="text-align: center">Nº:<?php echo $pdv->id?></H4>
                  <H4 style="text-align: center">DATA:<?php echo date('d/m/Y'); ?></H4>
                  <h4 style="text-align: center">HORA: <div id="real-clock"></div></h4>

              </div>

              <div class="receber">
                <div class="container">

                  <h4 style=" text-align: center;">VALOR RECEBIDO</H4>
                                <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th class="col-md-1">VALOR</th>
                                    <th class="col-md-4">FORMA PGTO</th>
                                    <th class="col-md-1">AÇÕES</th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php $totalpago=0;if($pagamento){
                                foreach($pagamento as $pg){?>

                                <tr>
                                <td><?php echo $pg['valor']?></td>
                                    <td><?php echo $pg['nomerecebimento']?></td>
                                    <?php $totalpago+=$pg['valor']; ?>
                                    <td></td>
</tr>
                                <?php } } ?>
                                </tbody>

                                </table>



                </div>
                <div class="col-lg-12">



            </div>

              </div>




                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="receber" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content-receber">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">RECEBER</h4>
                      </div>
                      <div class="modal-body">

                             <form id="pagamento" action="" method="post">

<div class="col-lg-10">
  <label for="formarecebimento" class="control-label">FORMA PAGAMENTO</label>

  <div class="form-group">
  <select name="formarecebimento" id="formarecebimento" class="form-control" required>
    <option value="">Selecione    </option>
      <option value="DINHEIRO"> DINHEIRO</option>
      <option value="CARTAO DE CREDITO"> CARTÃO DE CRÉDITO</option>
      <option value="CARTAO DE DEBITO"> CARTÃO DE DÉBITO</option>
      <option value="CHEQUE"> CHEQUE</option>

  </select>
  </div>
</div>

<div class="col-lg-5">
    <label for="valorpgto" class="control-label"> VALOR</label>

      <div class="form-group">
          <input type="hidden" id="valorjarecebido" name="valorjarecebido" value="<?php echo number_format($totalpago, 2, '.', '.') ?>"/>
          <input type="text" class="form-control input-lg" name="valorrecebido" id="valorrecebido"/>
          <input type="hidden" id="idpdv" name="idpdv" value="<?php echo $pdv->id?>"/>

            <input type="hidden" name="restante" value="<?php echo number_format (($totalitens)-($totalpago)-($pdv->desconto), 2,'.' , '.') ?>"/>
          <input type="hidden" id="valordescontovenda" name="valordescontovenda" value="<?php if($pdv->desconto==null){ echo '0.00'; } else{ echo $pdv->desconto;} ?>"/>
            <input type="hidden" id="totalvendapdv" name="totalvendapdv" value="<?php echo $totalvenda;?>"/>
      </div>
</div>

<div class="col-lg-7">
  <label for="">&nbsp</label>
  <div class="form-group">
<input type="submit" class="btn btn-success btn-lg col-lg-12" name="ok" value="RECEBER" />
</div>
</div>
</form>





                      </div>

                    </div>
                  </div>
                </div>


              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content-small">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">DESCONTO</h4>
                      </div>
                      <div class="modal-body">

                       <form id="desconto" action="" method="post">

                         <h4>DESCONTO</h4>
                         <input type="hidden" id="idpdv" name="idpdv" value="<?php echo $pdv->id?>"/>
                       <input type="text" class="form-control input-lg" name="valordesconto" id="valordesconto">
                         </form>

                      </div>

                    </div>
                  </div>
                </div>

              <div class="totaispdv">

                    <div class="container">


                         <h3>Subtotal R$ <?php echo $totalitens?></h3>
                    <?php if ($pdv->desconto>0) {
        ?>
                        <h3>Desconto R$ <?php echo $pdv->desconto?></h3>
                    <?php
    } else {
        ?>
                    <h3>Desconto R$ 0.00</h3>
                    <?php
    } ?>
                 <h2>TOTAL R$ <?php echo number_format($totalitens-$pdv->desconto, 2, '.', '.')?></h2>

              </div>
</div>


          </div>

</div>


        </section>



<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>



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

$( document ).ready(function() {
$('#produtobusca').focus();
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
$('#receber').modal('show');
$('#valordesconto').focus();
//  $('#excluirpedido').trigger('click');
  }

  if ((e.altKey) && (e.which === 80)) {
// Pesquisar (Alt + P)
//if (e.which ===56) {
  $('#excluirpedido').trigger('click');
  }

  if ((e.altKey) && (e.which === 68)){

    $('#myModal').modal('show');
  }


});

$("#valordesconto").maskMoney();


$("#valorrecebido").maskMoney();


$( document ).ready(function() {
$('#produto').focus();
});

$('#desconto').keypress(function(e){

  	if(e.wich == 13 || e.keyCode == 13){


var $this = $( this );


                var dados = $('#desconto').serialize();

$.ajax({
type: "POST",
url:"<?php echo base_url();?>pdv/desconto",
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
  var clock = document.getElementById('real-clock');


    setInterval(function () {
        clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
    }, 1000);




$("#produtobusca").keypress(function(e){


  	if(e.wich == 13 || e.keyCode == 13){


    //var codbarra = $this.find("input[name='codbarra']").val();
     var verifica = document.getElementById("produtobusca").value;
        if(verifica.length>13){
            var string =verifica.split("*");
            var codbarra = string[1];
            var qtdd= string[0];


        }

        else{
            var codbarra = verifica;
            var qtdd=1
        }
     idpdv = document.getElementById("idpdv").value;
    $.ajax({
    type: "POST",
    url:"<?php echo base_url();?>produto/getproduto",
    data:"codbarra="+codbarra,
    dataType:'json',
    success:function(data)
    {
 var len = data.length;
 if(len>0){
 for(var i=0; i<len; i++){
                 var id = data[i].id;
                 var nomeproduto = data[i].nomeproduto;
                 var venda = data[i].venda;
                 var cod = data[i].codbarra;
                var quantidade =qtdd;


               }


               var hiddens =  '<input type="hidden" name="nomeproduto" value="'+nomeproduto+'" />'+
               '<input type="hidden" name="quantidade" value="'+quantidade+'" />'+
  '<input type="hidden" name="codbarra" value="'+cod+'" />'+
               '<input type="hidden" name="idpdv" value="'+idpdv+'" />'+
                 '<input type="hidden" name="venda" value="'+venda+'" />'+

                 '<input type="hidden" name="idproduto" value="'+id+'" />';


                 var dados = $(hiddens).serialize();
                 $.ajax({
                 type: "POST",
                 url:"<?php echo base_url();?>pdv/additem",
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
    }
    else{

      alert('NENHUM ITEM ENCONTRADO');
      window.location.reload();
    }
}
    });

return false;
}

});





$(document).on('click', 'span', function(event) {
            var $id = $(this).attr('idAcao');
            if(($id % 1) == 0){

                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>pdv/excluiritem",
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



$('#pagamento').submit(function(){




var totalvenda = Number(document.getElementById("totalvendapdv").value);
var valordescontovenda = Number(document.getElementById("valordescontovenda").value);
var valorrecebido = Number(document.getElementById("valorrecebido").value);

var valorjarecebido = Number(document.getElementById("valorjarecebido").value);
var totalpago = valorjarecebido + valorrecebido;
var restante = totalvenda - valorjarecebido;

 var troco=0.00;

if(totalvenda>=totalpago){

    var troco = 0.00;

}else{
    var troco =  totalpago - totalvenda ;
}
//document.getElementById("modaldesconto").innerHTML = totalvenda;
//document.getElementById("modalrecebido").innerHTML = totalvenda;
//document.getElementById("modaltroco").innerHTML = totalvenda;

  var dados = $('#pagamento').serialize();

$.ajax({
type: "POST",
url:"<?php echo base_url();?>pdv/pagamento",
data:dados,
dataType:'json',
success:function(data)
{

  if(data.result == true){

//window.location.href = "<?php echo base_url();?>pdv/index";
     $("#modaltotal").html('<b>Total R$ '+totalvenda+'</b>');
      $("#modalrec").html('<b>Recebido R$ '+valorrecebido+'</b>');
       $("#modaltroco").html('<b>Troco R$ '+troco+'.00</b>');
          $('#call-modal').trigger('click');

  }

  else{

    window.location.reload();




  }

}

});
return false;



});
$('').submit(function(){





  var $this = $( this );

//var codbarra = $this.find("input[name='codbarra']").val();
 var nomeproduto = $this.find("input[name='nomeproduto']").val();
var codbarra = $this.find("input[name='codbarra']").val();
  var venda = $this.find("input[name='venda']").val();

  var quantidade = $this.find("input[name='quantidade']").val();
   var idpdv = $this.find("input[name='idpdv']").val();

  var idproduto = $this.find("input[name='idproduto']").val();
  var totalvenda = Number(document.getElementById("totalvenda").value);
  //var qtdd = $this.find("input[name='quantidade']").val();

  var subtotal = venda*quantidade;




var valorpedido = Number(venda) + Number(totalvenda);
document.getElementById('totalvenda').value = valorpedido;



//  var nomeproduto = $('#precovenda').val();
  var tr = '<tr>'+
    '<td>'+codbarra+'</td>'+
    '<td><strong>'+nomeproduto+'</strong></td>'+
    '<td><strong>R$ '+venda+',00</strong></td>'+
    '<td><strong>'+quantidade+' UN</strong></td>'+
    '<td><strong>R$ '+subtotal+',00 </strong></td>'+

     '<td><span idAcao='+idproduto+' title="Excluir" class="btn btn-danger"><i class="icon-remove icon-white">EXCLUIR</i></span></td>'+


    '<td></td>'




    '</tr>'
 // $('#item').find('tbody').append( tr );
var hiddens =  '<input type="hidden" name="nomeproduto" value="'+nomeproduto+'" />'+
'<input type="hidden" name="quantidade" value="'+quantidade+'" />'+

'<input type="hidden" name="idpdv" value="'+idpdv+'" />'+
  '<input type="hidden" name="venda" value="'+venda+'" />'+

  '<input type="hidden" name="idproduto" value="'+idproduto+'" />';

$('#form_insert').find('fieldset').append( hiddens );



var dados = $(hiddens).serialize();
$.ajax({
type: "POST",
url:"<?php echo base_url();?>pdv/additem",
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


$('#prepare').trigger('reset');


return false;

});



</script>


<a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>



<div class="modal fade" id="notification">
    <div class="modal-dialog">
        <div class="modal-content-small">
            <div class="modal-header">
                FATURAMENTO PDV
            </div>
            <div class="modal-body">

                <h3 id="modaltotal" style="text-align: center"></h3>
                <h3 id="modalrec" style="text-align: center"></h3>
                <h3 id="modaltroco" style="text-align: center"></h3>
            </div>
            <div class="modal-footer">

                  <a  href="<?php echo site_url('pdv/index'); ?>"  class="btn btn-success btn-lg btn-block">FINALIZAR</a>

            </div>
        </div>
        </div>
      </div>


</section>
</section>
