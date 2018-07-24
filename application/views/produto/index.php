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
       <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
       <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
       <script src="<?php echo base_url()?>assest/js/jquery-1.8.3.min.js"></script>


       <script src="<?php echo base_url()?>assest/js/validate.js"></script>


         <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>

        <div class="row">
                  <div class="col-md-7">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Produtos</li>

            </ol>





</div>

      <div class="col-md-5">
              <a href="#produto" data-toggle="modal" class="btn btn-success">NOVO PRODUTO</a>
      </div>
</div>
<!--<div class="pull-right">
	<a href="<?php echo site_url('produto/add'); ?>" class="btn btn-success">Add</a>
</div>
-->
<div class="row">
         <div class="col-sm-12">
           <section class="panel">

<table class="table table-striped">
    <tr>
		<th>COD. DE BARRAS</th>
		<th>PRODUTO</th>
		<th>CUSTO</th>
		<th>VENDA</th>
    <th>ESTOQUE</th>
		<th>STATUS</th>




		<th>AÇÕES</th>
    </tr>
	<?php foreach($produto as $p){ ?>
    <tr>
		<td><?php echo $p['codbarra']; ?></td>
		<td><?php echo $p['nomeproduto']; ?></td>

		<td>R$ <?php echo number_format($p['custo'],2,',','.')  ?></td>
		<td>R$ <?php echo number_format($p['venda'],2,',','.') ?></td>
    <?php if($p['estoque']>0) { ?>
<td><?php echo $p['estoque']; ?> UN</td>

<?php }else{ ?>
<td> SEM ESTOQUE</td>
<?php } ?>
		<td><?php if($p['status']=='1'){ echo 'ATIVO'; }else{ echo 'INATIVO'; } ?></td>

		<td>

            <!--  <a href="<?php echo site_url('produto/imprimir/'.$p['impressora']); ?>" class="btn btn-danger btn-xs">imprimir</a>-->
<a data-toggle="modal" data-target="#modal-lg<?php echo $p['id']?>" class="btn btn-success" >EDITAR</a>
<a href="<?php echo site_url('produto/remove/'.$p['id']); ?>" class="btn btn-danger">EXCLUIR</a>
        </td>
<!-- EDITAR PRODUTO -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-lg<?php echo $p['id']?>" class="modal fade">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                               <h4 class="modal-title">EDITAR PRODUTO</h4>
                             </div>
                             <div class="modal-body">
<?php echo form_open('produto/edit/'.$p['id']); ?>


                                 <div class="row">

                                 <div class="form-group">
                                   <label for="nomeproduto" class="col-md-1 control-label">Nome</label>
                                   <div class="col-md-5">
                                     <input type="text" name="nomeproduto" value="<?php echo $p['nomeproduto']; ?>"onfocus="this.value=''"; class="form-control required" id="nomeproduto" required/>
                                   </div>


                                   <label for="categoria_id" class="col-md-2 control-label">Categoria</label>
                                   <div class="col-md-4">
                                     <select name="categoria_id" class="form-control required" required>
                                       <option value="">Selecione</option>
                                       <?php
                                       foreach($categoriaprodutos as $categoriaproduto)
                                       {
                                         $selected = ($categoriaproduto['id'] == $p['categoria_id']) ? ' selected="selected"' : "";

                                         echo '<option value="'.$categoriaproduto['id'].'" '.$selected.'>'.$categoriaproduto['nomedescricao'].'</option>';
                                       }
                                       ?>
                                     </select>
                                   </div>


                                 </div>



          </div>
          <br>
          <div class="row">

          <div class="form-group">

            <label for="custo" class="col-md-1 control-label">Custo</label>
             <div class="col-md-2">
               <input type="text" name="custo" value="<?php echo number_format($p['custo'],2,',','.'); ?>"  onfocus="this.value='';" class="form-control" id="custo<?php echo $p['id']?>" />
             </div>

             <label for="venda" class="col-md-1 control-label">Venda</label>
             <div class="col-md-2">
               <input type="text" name="venda" value="<?php echo number_format($p['venda'],2,',','.'); ?>" onfocus="this.value='';" class="form-control required" id="venda<?php echo $p['id']?>" required/>
                 <input type="hidden" value="1" id="status" name="status"/>
             </div>


            <label for="categoria_id" class="col-md-2 control-label">Impressora</label>
            <div class="col-md-4">
              <select name="impressora" class="form-control">
                 <option value="">Selecione</option>
                <?php
                foreach($impressoras as $imp)
                {
                  $selected = ($imp['impressora'] == $this->input->post('impressora')) ? ' selected="selected"' : "";

                  echo '<option value="'.$imp['impressora'].'" '.$selected.'>'.$imp['localimpressao'].'</option>';
                }
                ?>
              </select>

            </div>

          </div>
          </div>
          <br>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i> SALVAR
          </button>
                            <?php echo form_close(); ?>
                             </div>
                           </div>
                         </div>
                       </div>
                       <script>


                       $('#venda<?php echo $p['id']?>').maskMoney();
                       $('#custo<?php echo $p['id']?>').maskMoney();


                       </script>

    </tr>
	<?php } ?>
</table>
</section>
</div>
</div>
<div class="pull-right">

</div>



<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="produto" class="modal fade">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                       <h4 class="modal-title">Novo produto</h4>
                     </div>
                     <div class="modal-body">

                     <form action="<?php echo base_url()?>produto/add" method="post">

                       <div class="row">

                       <div class="form-group">
                         <label for="nomeproduto" class="col-md-1 control-label">Nome</label>
                         <div class="col-md-5">
                           <input type="text" name="nomeproduto" value="" class="form-control" id="nomeproduto" required/>
                         </div>

                         <label for="codbarra" class="col-md-2 control-label">Cod barras</label>
                         <div class="col-md-4">
                           <input type="text" name="codbarra" value="" class="form-control" id="codbarra" onBlur="myFunction()"/>
                         </div>
                       </div>
</div>
</br>
 <div class="row">
   <div class="form-group">
                         <label for="categoria_id" class="col-md-1 control-label">Categoria</label>
                         <div class="col-md-2">
                           <select name="categoria_id" id="categoria" class="form-control" required>
                             <option value="">Selecione</option>
                             <?php
                             foreach($categoriaprodutos as $categoriaproduto)
                             {
                               $selected = ($categoriaproduto['id'] == $this->input->post('categoria_id')) ? ' selected="selected"' : "";

                               echo '<option value="'.$categoriaproduto['id'].'" '.$selected.'>'.$categoriaproduto['nomedescricao'].'</option>';
                             }
                             ?>
                           </select>
                         </div>




                       <label for="custo" class="col-md-1 control-label">Custo</label>
                        <div class="col-md-2">
                          <input type="text" name="custo" value="" class="form-control" id="custo" />
                        </div>

                        <label for="venda" class="col-md-1 control-label">Venda</label>
                        <div class="col-md-2">
                          <input type="text" name="venda" value="" class="form-control" id="venda" required/>
                            <input type="hidden" value="1" id="status" name="status"/>
                            <input type="hidden" value="1" id="tipoproduto" name="tipoproduto"/>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group">
                       <label for="categoria_id" class="col-md-2 control-label">Impressora</label>
                       <div class="col-md-4">
                         <select name="impressora" class="form-control">
                           <option value="">Selecione</option>
                           <?php
                           foreach($impressoras as $imp)
                           {
                             $selected = ($imp['impressora'] == $this->input->post('impressora')) ? ' selected="selected"' : "";

                             echo '<option value="'.$imp['impressora'].'" '.$selected.'>'.$imp['localimpressao'].'</option>';
                           }
                           ?>
                         </select>

                       </div>

                       <label for="unidade" class="col-md-2 control-label">Unidade</label>
                       <div class="col-md-4">
                         <select name="unidade" class="form-control" required>
                           <option value="">Selecione</option>
                           <option value="UN">UN</option>
                           <option value="KG">KG</option>
                         </select>
                       </div>
                     </div>
                   </div>
                   <br/>
                   <div class="row">
                   <div class="col-lg-12">

                   <button type="submit" class="btn btn-success btn-lg col-lg-3">
                     <i class="fa fa-check"></i> CADASTRAR
                   </button>
                   </div>
                 </div>

                                       </form>

</div>









                     </div>
                   </div>
                 </div>
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

   function myFunction(){
        var codbarra = document.getElementById("codbarra").value;
       if(codbarra.length==13){




                        $.ajax({
    type: "POST",
    url:"<?php echo base_url();?>produto/getproduto",
    data:"codbarra="+codbarra,
    dataType:'json',
    success:function(data)
    {
 var len = data.length;
 if(len>0){
            alert('PRODUTO JA ITEM ENCONTRADO');
    }
    else{

        $('#categoria').focus();
    }
}
    });

return false;
       }

   }



$('#venda').maskMoney();
$('#custo').maskMoney();
</script>




</section>
</section>
