<section id="main-content">
      <section class="wrapper">
        <script src="<?php echo base_url();?>assest/js/jquery.js"></script>
        <script src="<?php echo base_url();?>assest/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url();?>assest/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript">
                    $(document).ready(function(){
                        /* ao pressionar uma tecla em um campo que seja de class="pula" */
                        $('.form-control required').keypress(function(e){
                            /*
                             * verifica se o evento é Keycode (para IE e outros browsers)
                             * se não for pega o evento Which (Firefox)
                            */
                           var tecla = (e.keyCode?e.keyCode:e.which);

                           /* verifica se a tecla pressionada foi o ENTER */
                           if(tecla == 13){
                               /* guarda o seletor do campo que foi pressionado Enter */
                               campo =  $('.pula');
                               /* pega o indice do elemento*/
                               indice = campo.index(this);
                               /*soma mais um ao indice e verifica se não é null
                                *se não for é porque existe outro elemento
                               */
                              if(campo[indice+1] != null){
                                 /* adiciona mais 1 no valor do indice */
                                 proximo = campo[indice + 1];
                                 /* passa o foco para o proximo elemento */
                                 proximo.focus();
                              }
                           }
                            /* impede o sumbit caso esteja dentro de um form */
                            e.preventDefault(e);
                            return false;
                        })
                     })
                </script>






                    <div class="panel panel-default">
             <header class="panel-heading">
               Pedidos - Mesas
             </header>
             <div class="panel-header">


  <div class="col-md-12">
  <?php      foreach ($pedido as $pe) {
    ?>
<h2><strong>MESA
        <?php echo $pe->numeromesa; ?>

        <?php $num = $pe->id;
    $mesa = $pe->numeromesa; ?>
</h2></strong>

<h4><strong>Data: </strong><?php echo $pe->data; ?></h4>
<h4><strong>Hora: </strong><?php echo $pe->hora; ?></h4>
</div>
<br>


<?php
}?>
</div>
<div class="panel-body">

      <form action="" method="post" id="form_prepare">
  <div class="col-md-5">
                                  <div class="form-group">
                        						<label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                    <input type="text" class="form-control required" name="produto" id="produto" placeholder="Digite o nome do serviço" onfocus="this.value=''" required/>

                                    <input type="hidden" name="idproduto" id="idproduto" value=""/>

<input type="hidden" name="idpedido" id="idpedido" value="<?php echo $num;?>" />
<input type="hidden" name="numeromesa" id="numeromesa" value="<?php echo $mesa;?>" />
<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />
    <input type="hidden" name="garcom" id="garcom" value="<?php echo $login ?>"/>
                                    <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                    <input type="hidden" name="venda" id="venda" />

                        					</div>
                                </div>

                                <div class="col-md-1">
                                                                <div class="form-group">
                                                      						<label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> Qtdd</label>
                                                                    <input type="text" class="form-control required" name="quantidade" id="quantidade"  required/>
</div>
</div>
  <div class="col-md-2">
    <br>
    <label for="">&nbsp</label>

    <input type="submit" class="btn btn-success" name="ok" value="INSERIR" />  </form>

</div>
<br/>

  <table id="item" class="table table-striped table-bordered table-hover" >
            <thead>
              <tr>
                <th class="col-xs-2">Garçon</th>
                <th class="col-xs-1">Hora</th>
                <th class="col-xs-4">Produto</th>

              <th class="col-xs-1">Valor UNI</th>
              <th class="col-xs-1">QTDD</th>
              <th class="col-xs-1">VALOR TOTAL</th>
              <th class="col-xs-2">AÇÕES</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>






</div>


<div class="panel-footer">





<button type="button" style="margin:3px"class="btn btn-danger col-md-2 btn-lg" name="excluir">EXCLUIR</button>
<button type="button" style="margin:3px"class="btn btn-success col-md-2 btn-lg" name="cadastrar">RECEBER</button>
<button type="button" style="margin:3px"class="btn btn-primary col-lg-2 btn-lg" name="cadastrar">IMPRIMIR CONTA</button>

  <form action="<?php echo base_url();?>vendas/itemmesa" method="post" id="form_insert">

        <fieldset style="display: none;"></fieldset>
      <label><input type="submit" style="width:250px"class="btn btn-primary btn-lg" name="cadastrar" value="CONFIMAR"/></label>

      </form>






</div>









</div>







<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>

<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>






    <script>


    $('#form_prepare').submit(function(){





      var $this = $( this );

       var idpedido = $this.find("input[name='idpedido']").val();
     var nomeproduto = $this.find("input[name='nomeproduto']").val();
     var hora = $this.find("input[name='hora']").val();
     var garcom = $this.find("input[name='garcom']").val();
      var venda = $this.find("input[name='venda']").val();
      var idproduto = $this.find("input[name='idproduto']").val();
      var qtdd = $this.find("input[name='quantidade']").val();
      var numeromesa = $this.find("input[name='numeromesa']").val();
      var subtotal = venda*qtdd;
//  var nomeproduto = $('#precovenda').val();
      var tr = '<tr>'+
        '<td>'+garcom+'</td>'+
        '<td>'+hora+'</td>'+
        '<td>'+nomeproduto+'</td>'+
        '<td>R$ '+venda+',00</td>'+
        '<td>'+qtdd+' </td>'+
        '<td>R$ '+subtotal+',00</td>'+
        '<td></td>'




        '</tr>'
      $('#item').find('tbody').append( tr );

    var hiddens =  '<input type="hidden" name="nomeproduto[]" value="'+nomeproduto+'" />'+
    '<input type="hidden" name="qtdd[]" value="'+qtdd+'" />'+
    '<input type="hidden" name="hora[]" value="'+hora+'" />'+
    '<input type="hidden" name="garcom[]" value="'+garcom+'" />'+
      '<input type="hidden" name="idpedido[]" value="'+idpedido+'" />'+
      '<input type="hidden" name="venda[]" value="'+venda+'" />'+
      '<input type="hidden" name="numeromesa[]" value="'+numeromesa+'" />'+
      '<input type="hidden" name="subtotal[]" value="'+subtotal+'" />'+
      '<input type="hidden" name="idproduto[]" value="'+idproduto+'" />';

    $('#form_insert').find('fieldset').append( hiddens );


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
