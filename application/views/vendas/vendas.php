

    <link href="<?php echo base_url()?>assest/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assest/css/jquery-ui.theme.css" rel="stylesheet">
<section id="main-content">
  <section class="wrapper">

         <div class="col-lg-12">
           <h4>.</h4></div>

           <section class="panel">


             <!-- INICIO DIV PEDIDO !-->


<div class="painelvenda">
                <div class="cabecalhopedido">
                    <div class="col-lg-3">
                        <h2>MESA <?php echo $mesa;?></h2>
                    </div>
                    <div class="col-lg-8">
                      <form action="" method="post" id="form_prepare">
<div class="col-md-7">
                                                  <div class="form-group">
                                                    <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                                    <input type="text" class="form-control input-lg required" name="produto" id="produto" placeholder="Digite o nome do produto" required/>

                                                    <input type="hidden" name="idproduto" id="idproduto" value=""/>



                    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                    <input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />

                                                    <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                                    <input type="hidden" name="venda" id="venda" />
                                                      <input type="hidden" name="garcom" id="garcom" value="<?php echo $login ?>"/>
  <input type="hidden" name="numeromesa" id="numeromesa" value="<?php echo $mesa;?> " />
                                                  </div>



</div>
                                                <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                  <label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> Qtdd</label>
                                                                              <input type="text" class="form-control input-lg m-bot15 required"  name="quantidade" id="quantidade" required/>
                    </div>
                    </div>

                    <div class="col-md-2">

                    <label for="">&nbsp</label>

                    <input type="submit" class="btn btn-success btn-lg" name="ok" value="INSERIR" />  </form>
                    </div>

</div>
                </div>
                <div class="esquerda">
                <div class="botoespedido">

                  </div>
                  <div class="totaispedido">
                    <div class="col-lg-12">
                      <div class="col-lg-7">
                        <h3>Subtotal</h3>

                        <h4>Serviço</h4>
                        <h3>Total</h3>
                      </div>
                      <div class="col-lg-5">
                        <h3>.</h3>
                        <h4></h4>
                        <h3></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- INICIO DIV DIREITA !-->
                <div class="direita">


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

                </tbody>
              </table>
</div>
                  </div>
<!-- FIM DIV ITENS DO PEDIDO !-->


<!-- INICIO DIV BOTOES PEDIDO !-->


                  <div class="botoespagamento">
                    <div class="col-lg-12">

                      <div class="col-lg-4">
                        <a id="btnreceber" href="#abrirmesa" data-toggle="modal" class="btn btn-success btn-lg btn-block">RECEBER</a>

                    </div>

                    <div class="col-lg-4">
                      <a id="btnreceber" href="#abrirmesa" data-toggle="modal" class="btn btn-success btn-lg btn-block">IMPRIMIR CONTA</a>

                  </div>
                  <div class="col-lg-2">
                    <form action="<?php echo base_url();?>vendas/abremesa" method="post" id="form_insert">

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
           </section>






  </section>
</section>
<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>

<script>




$('#form_prepare').submit(function(){





  var $this = $( this );


 var nomeproduto = $this.find("input[name='nomeproduto']").val();
  var hora = $this.find("input[name='hora']").val();
  var venda = $this.find("input[name='venda']").val();
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
url:"<?php echo base_url();?>vendas/abremesa",
data:dados,
dataType:'json',
success:function(data)
{

}

});
return false;
}

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
