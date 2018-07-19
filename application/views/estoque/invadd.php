<section id="main-content">
      <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Novo inventario
                </header>

                <div class="panel-body-inv">
<div class="cabinventario">
                  <div class="row">
                    <div class="col-lg-4">

                      <div class="col-lg-5">
                          <h2>Nº <?php echo $inventario['id'];?></h2>
                          <h4>DATA <?php echo $inventario['data'];?> </h4>
                      </div>


                    </div>

                    <div class="col-lg-5">

                      <div class="form-group">
                        <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Descrição do inventario</label>

                        <input type="text" class="form-control input-lg  required" name="descricaoinv" id="descricaoinv" />
                      </div>

                    </div>

                      <form action="" method="post" id="insereproduto">


                        <div class="col-lg-8">
                <div class="col-lg-6">
                                                  <div class="form-group">
                                                    <label for="idservico" class="control-label"><i class="fa fa-spinner"> </i> Produtos</label>

                                                    <input type="text" class="form-control input-lg  required" name="produto" id="produto"  placeholder="Digite o nome do produto" required/>

                                                    <input type="hidden" name="idproduto" id="idproduto" value=""/>



                    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                    <input type="hidden" name="hora" id="hora" value="<?php echo date('H:i') ;?>" />

                                                    <input type="hidden" name="nomeproduto" id="nomeproduto" />
                                                      <input type="hidden" name="codbarra" id="codbarra" />

<input type="hidden" name="idinv" id="idinv" value="<?php echo $inventario['id']?>" />

                                                  </div>



                </div>
                                                <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                  <label for="quantidade" class="control-label"><i class="fa fa-spinner"> </i> Qtdd</label>
                                                                              <input type="text" class="form-control input-lg m-bot15 required"  onclick="this.value='1'" name="quantidade" id="quantidade" required/>
                    </div>
                    </div>

                    <div class="col-md-2">



                    <input id="btntot" type="submit" class="btn btn-success btn-lg" name="ok" value="INSERIR" />

                  </div>
                </div>
                </form>
</div>
                </div>

                <div class="tabelainventario">

                  <table class="table table-hover">
              <thead>
                <tr>
                  <th class="col-md-2">DATA/HORA</th>
                  <th class="col-md-2">COD BARRA</th>
                  <th class="col-md-5">PRODUTO</th>
                  <th class="col-md-2">QTDD</th>
                </tr>
              </thead>
              <tbody>
                      <?php if($itensinv){ foreach($itensinv as $it){?>
                          <tr>
                            <td><?php  echo date('d/m/Y H:i:s', strtotime($it['time']));  ?></td>
                            <td><?php echo $it['codbarra']?></td>
                              <td><?php echo $it['nomeproduto']?></td>
                                <td><?php echo $it['qtdd']?></td>

                          </tr>
                      <?php }} ?>
              </tbody>
            </table>
                </div>
                <div class="footerinventario">

                  <div class="col-lg-3">
                    <a  id="btntot" style="margin-top:5px;"href="<?php echo site_url('inventario'); ?>"  class="btn btn-success btn-lg btn-block">SALVAR</a>

                </div>
                </div>

</div>
</section>
</div>
</div>

<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>


<script>
$( document ).ready(function() {
$('#produto').focus();
});
$("#produto").autocomplete({

    source: "<?php echo base_url(); ?>produto/autoCompleteProdutocodbarra",

    minLength: 2,

    select: function(event, ui) {



        $("#idproduto").val(ui.item.id);

        $("#codbarra").val(ui.item.codbarra);
          $("#nomeproduto").val(ui.item.nomeproduto);







    }

});

$('#insereproduto').submit(function(){





  var $this = $( this );


 var nomeproduto = $this.find("input[name='nomeproduto']").val();
  var idinv = $this.find("input[name='idinv']").val();
  var idproduto = $this.find("input[name='idproduto']").val();
var codbarra = $this.find("input[name='codbarra']").val();
  var qtdd = $this.find("input[name='quantidade']").val();

  var hiddens =  '<input type="hidden" name="nomeproduto" value="'+nomeproduto+'" />'+
  '<input type="hidden" name="quantidade" value="'+qtdd+'" />'+

  '<input type="hidden" name="idinv" value="'+idinv+'" />'+
    '<input type="hidden" name="codbarra" value="'+codbarra+'" />'+
    '<input type="hidden" name="idproduto" value="'+idproduto+'" />';


    var dados = $(hiddens).serialize();
    $.ajax({
    type: "POST",
    url:"<?php echo base_url();?>inventario/additem",
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
</script>

      </section>
    </section>
