<section id="main-content">
      <section class="wrapper">

        <div class="row">
                  <div class="col-md-12">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Produtos</li>

            </ol>

            <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
            <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
            <script src="<?php echo base_url()?>assest/js/jquery-1.8.3.min.js"></script>


            <script src="<?php echo base_url()?>assest/js/validate.js"></script>


              <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
            <div class="box-tools">
                  <a href="#produto" data-toggle="modal" class="btn btn-success">NOVO PRODUTO</a>
                  <a href="#pizza" data-toggle="modal" class="btn btn-success">NOVA PIZZA</a>
                </div>
                <br>


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
		<th>ID</th>
		<th>Categoria Id</th>
		<th>Status</th>
		<th>Nome produto</th>
		<th>Custo</th>
		<th>Venda</th>


		<th>Cod barras</th>
		<th>Actions</th>
    </tr>
	<?php foreach($produto as $p){ ?>
    <tr>
		<td><?php echo $p['id']; ?></td>
		<td><?php echo $p['categoria_id']; ?></td>
		<td><?php echo $p['status']; ?></td>
		<td><?php echo $p['nomeproduto']; ?></td>
		<td>R$ <?php echo number_format($p['custo'],2,',','.')  ?></td>
		<td>R$ <?php echo number_format($p['venda'],2,',','.') ?></td>

		<td><?php echo $p['codbarra']; ?></td>

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

                <?php foreach($Name as $i => $n){
                  //  $Printers[$i] = (object)[
                  echo '<option value="'.$n.'">'.$n.'</option>'; }?>
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
<?php
//Função para tratar o retorno
function getPrinterProperty($key){
    $str = shell_exec('wmic printer get '.$key.' /value');

    $keyname = "$key=";
    $validValues = [];
    $fragments = explode(PHP_EOL,$str);
    foreach($fragments as $fragment){
        if($fragment == ""){
            continue;
        }
        if (preg_match('/('.$keyname.')/i', $fragment)) {
            array_push($validValues,str_replace($keyname,"",$fragment));
        }
    }
    return $validValues;
}
//Esplanação dos commandos:
// wmic /node:SERVER1 printer list status // Lista status das impressoras de um servidor remoto
// wmic printer list status // Lista status das impressoras  do servidor local
// wmic printer get // Obtem todas as propriedades da impressoa
// wmic printer get <propriedade> /value //Lista uma propriedade no formato chave=valor do servidor remoto
// wmic printer get <propriedade> /value //Lista uma propriedade no formato chave=valor do servidor local

//Obtém algumas propriedades, nesse caso vou pegar só algumas
$Name = getPrinterProperty("Name");
$Description =  getPrinterProperty("Description");
$Network = getPrinterProperty("Network");
$Local = getPrinterProperty("Local");
$PortName = getPrinterProperty("PortName");
$Default = getPrinterProperty("Default");
$Comment = getPrinterProperty("Comment"); ?>


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
                           <input type="text" name="codbarra" value="" class="form-control" id="codbarra"/>
                         </div>
                       </div>
</div>
</br>
 <div class="row">
   <div class="form-group">
                         <label for="categoria_id" class="col-md-1 control-label">Categoria</label>
                         <div class="col-md-2">
                           <select name="categoria_id" class="form-control" required>
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

                           <?php foreach($Name as $i => $n){
                             //  $Printers[$i] = (object)[
                             echo '<option value="'.$n.'">'.$n.'</option>'; }?>
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
               </div>


<script>

$('#venda').maskMoney();
$('#custo').maskMoney();
</script>




</section>
</section>
