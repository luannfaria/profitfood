<section id="main-content">
      <section class="wrapper">

        <section class="caixa">

          <div class="painel1">
          <div class="esquerda">
            <div class="produtospdv">

                <div class="row">
                  <div class="col-lg-12">
                  <form id="prepare" action="" method="POST">



                    <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                      <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                                                      <input type="text" class="form-control input-lg  required" name="produto" id="produto" placeholder="Digite o nome do produto" required/>

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

          </tbody>
        </table>
            </div>
          </div>

          <div class="direita">

              <div class="pdvcab">
                  <h2>PONTO DE VENDA</h2>

                      <H4>Nº:<?php echo $pdv->id?></H4>
                  <H4>DATA:</H4>


              </div>

              <div class="receber">
                <div class="container">

                  <h4 style=" text-align: center;">RECEBIMENTO</H4>

                    <form id="pagamento" action="" method="post">

                    <div class="col-lg-10">
                      <label for="formarecebimento" class="control-label">FORMA PAGAMENTO</label>

                      <div class="form-group">
                      <select name="formarecebimento" class="form-control" required>
                        <option value="">Selecione    </option>
                          <option value="DINHEIRO"> DINHEIRO</option>
                          <option value="CARTAO DE CREDITO"> CARTÃO DE CRÉDITO</option>
                          <option value="CARTAO DE DEBITO"> CARTÃO DE DÉBITO</option>
                          <option value="CHEQUE"> CHEQUE</option>
                          <option value="DESCONTO"> DESCONTO</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-lg-5">
                        <label for="valorpgto" class="control-label"> VALOR</label>

                          <div class="form-group">

                              <input type="text" class="form-control input-lg" name="vlrpgto" id="vlrpgto"/>
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

              <div class="totaispdv">

                    <div class="container">


                         <h3 id="valorteste"></h3>

                        <h3 id="valordesconto"></h3>

                  <h2>TOTAL: R$ <h2 id="valorteste"></h2></h2>

              </div>
</div>


          </div>

</div>


        </section>



<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>


<script>


$("#vlrpgto").maskMoney();

$("#produto").autocomplete({

    source: "<?php echo base_url(); ?>produto/autoCompleteProdutocodbarra",

    minLength: 2,

    select: function(event, ui) {


      $("#codbarra").val(ui.item.codbarra);
        $("#idproduto").val(ui.item.id);

        $("#venda").val(ui.item.venda);
          $("#nomeproduto").val(ui.item.nomeproduto);







    }

});




$('#pagamento').submit(function(){



 var desconto = document.getElementById("vlrpgto").value;

document.getElementById('vlrdesc').value = desconto;


x = document.getElementById("valordesconto");
x.innerHTML = "DESCONTO R$ "+desconto+",00";

 return false;

});
$('#prepare').submit(function(){





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


x = document.getElementById("valorteste");
x.innerHTML = "SUBTOTAL R$ "+valorpedido+",00";
//  var nomeproduto = $('#precovenda').val();
  var tr = '<tr>'+
    '<td>'+codbarra+'</td>'+
    '<td><strong>'+nomeproduto+'</strong></td>'+
    '<td><strong>R$ '+venda+',00</strong></td>'+
    '<td><strong>'+quantidade+' UN</strong></td>'+
    '<td><strong>R$ '+subtotal+',00 </strong></td>'+
    '<td><strong>'+valorpedido+' </strong></td>'+

    '<td></td>'




    '</tr>'
  $('#item').find('tbody').append( tr );
var hiddens =  '<input type="hidden" name="nomeproduto" value="'+nomeproduto+'" />'+
'<input type="hidden" name="quantidade" value="'+quantidade+'" />'+

'<input type="hidden" name="idpdv" value="'+idpdv+'" />'+
  '<input type="hidden" name="venda" value="'+venda+'" />'+

  '<input type="hidden" name="idproduto" value="'+idproduto+'" />';

$('#form_insert').find('fieldset').append( hiddens );


$('#prepare').trigger('reset');


return false;

});
</script>
</section>
</section>
