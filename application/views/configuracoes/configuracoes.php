<section id="main-content">
      <section class="wrapper">

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
        <!--tab nav start-->
           <section class="panel">
             <header class="panel-heading tab-bg-primary ">
               <ul class="nav nav-tabs">
                 <li class="active">
                   <a data-toggle="tab" href="#empresa">Empresa</a>
                 </li>
                 <li class="">
                   <a data-toggle="tab" href="#impressoras">Impressoras</a>
                 </li>
                 <li class="">
                   <a data-toggle="tab" href="#garcons">Garçons</a>
                 </li>
                 <li class="">
                   <a data-toggle="tab" href="#usuarios">Usuarios</a>
                 </li>

               </ul>
             </header>
             <div class="panel-body">
               <div class="tab-content">
                 <div id="empresa" class="tab-pane active">



      <!--notification start-->
      <section class="panel">


                <div class="row">
<div class="col-lg-12">
              <form action="" method="post" id="formempresa">

                      <div class="col-lg-3">
            						<label for="razaosocial" class="control-label"><span class="text-danger">*</span>Razão Social</label>

            							<input type="text" name="razaosocial" value="<?php echo $empresa['razaosocial']; ?>" class="form-control"  id="razaosocial" />
            							<span class="text-danger"><?php echo form_error('razaosocial');?></span>
<input type="hidden" name="id" id="id" value="<?php echo $empresa['id'];?>"/>


            					</div>
                      <div class="col-lg-3">
            						<label for="nomefantasia" class="control-label">Nome fantasia</label>

            							<input type="text" name="nomefantasia" value="<?php echo $empresa['nomefantasia']; ?>" class="form-control"  id="nomefantasia" />


            					</div>
                      <div class="col-lg-2">
            						<label for="cnpj" class="control-label"><span class="text-danger">*</span>CNPJ</label>

            							<input type="text" name="cnpj" value="<?php echo $empresa['cnpj']; ?>" class="form-control"  id="cnpj" />
            							<span class="text-danger"><?php echo form_error('cnpj');?></span>

            					</div>
                      <div class="col-md-2">
            						<label for="inscricaoestadual" class="control-label"><span class="text-danger">*</span>IE</label>

            							<input type="text" name="inscricaoestadual" value="<?php echo $empresa['inscricaoestadual']; ?>" class="form-control"  id="inscricaoestadual" />
            							<span class="text-danger"><?php echo form_error('inscricaoestadual');?></span>

            					</div>

  <div class="col-lg-4">
    <label for="rua" class="control-label"><span class="text-danger">*</span>Rua</label>

      <input type="text" name="rua" value="<?php echo $empresa['rua']; ?>" class="form-control"  id="rua" />
      <span class="text-danger"><?php echo form_error('rua');?></span>

  </div>

  <div class="col-lg-1">
    <label for="numero" class="control-label"><span class="text-danger">*</span>Numero</label>

      <input type="text" name="numero" value="<?php echo $empresa['numero']; ?>" class="form-control"  id="numero" />
      <span class="text-danger"><?php echo form_error('numero');?></span>

  </div>

  <div class="col-lg-3">
    <label for="bairro" class="control-label"><span class="text-danger">*</span>Bairro</label>

      <input type="text" name="bairro" value="<?php echo $empresa['bairro']; ?>" class="form-control"  id="bairro" />
      <span class="text-danger"><?php echo form_error('bairro');?></span>

  </div>
  <div class="col-md-4">
    <label for="cidade" class="control-label"><span class="text-danger">*</span>Cidade</label>

      <input type="text" name="cidade" value="<?php echo $empresa['cidade']; ?>" class="form-control"  id="cidade" />
      <span class="text-danger"><?php echo form_error('cidade');?></span>

  </div>

  <div class="col-md-2">
    <label for="telefone" class="control-label"><span class="text-danger">*</span>Telefone</label>

      <input type="text" name="telefone" value="<?php echo $empresa['telefone']; ?>" class="form-control"  id="telefone" />
      <span class="text-danger"><?php echo form_error('telefone');?></span>

  </div>

  <div class="col-md-1">
    <label for="taxaservico" class="control-label"><span class="text-danger">*</span>% serviço</label>

      <input type="number" name="taxaservico" value="<?php echo $empresa['taxaservico'];?>" class="form-control"  id="taxaservico" />
      <span class="text-danger"><?php echo form_error('taxaservico');?></span>

  </div>


<div class="col-md-1">
    <label for="numeromesas" class="control-label"><span class="text-danger">*</span>Mesas</label>

      <input type="number" name="numeromesas" value="<?php echo $empresa['numeromesas'];?>" class="form-control"  id="numeromesas" />
      <span class="text-danger"><?php echo form_error('numeromesas');?></span>

  </div>

  <div class="col-md-6">
    <br>
    <label for="">&nbsp</label>

    <input type="submit" class="btn btn-success" name="ok" value="ALTERAR" />

</div>


</form>


                </div>


        </div>
      </section>

                 </div>

                 <div id="impressoras" class="tab-pane">
                   <div class="row">
                  <div class="col-lg-12">
                  <!--notification start-->
                  <section class="panel">
                  <div class="panel-header">
                  </div>
                  <div class="panel-body">

                  <div class="row">

                    <form action="" method="post" id="addimpressora">

                      <div class="form-group">
                <label class="control-label col-lg-1" for="tipoimpressora">Tipo impressora</label>
                <div class="col-lg-2">
                  <select name="tipoimpressora"onchange="divimp(this.value)"class="form-control m-bot3">
                                          <option>Selecione</option>
                                          <option value="1">IMPRESSORA LOCAL</option>
                                          <option value="2">IMPRESSORA REDE</option>

                                      </select>


</div>

</div>
<div id="local" style="display:none">
  <div class="form-group">
  <label class="control-label col-lg-1" for="impressora">Impressora</label>
  <div class="col-lg-2">
  <select name="impressora" class="form-control">
    <option value="">Selecione</option>

    <?php foreach($Name as $i => $n){
      //  $Printers[$i] = (object)[
      echo '<option value="'.$n.'">'.$n.'</option>'; }?>
  </select>
</div>

</div>



<div class="form-group">
<label class="control-label col-lg-1" for="tipoimpressora">Local impressão</label>
<div class="col-lg-2">
<select name="localimpressao" class="form-control m-bot3">
                    <option>Selecione</option>
                    <option value="1">CAIXA</option>
                    <option value="2">COZINHA</option>

                </select>


</div>

</div>




</div>

<div id="rede" style="display:none">
  <div class="form-group">
  <label class="control-label col-lg-1" for="impressora">IP impressora</label>
  <div class="col-lg-2">
  <input type="text" class="form-control" name="impressora" id="impressora"/>
</div>

</div>

<div class="form-group">
<label class="control-label col-lg-1" for="tipoimpressora">Local impressão</label>
<div class="col-lg-2">
<select name="localimpressao" class="form-control m-bot3">
                    <option>Selecione</option>
                    <option value="1">CAIXA</option>
                    <option value="2">COZINHA</option>

                </select>


</div>

</div>



</div>

<div class="col-md-2">

  <label for="">&nbsp</label>

  <input type="submit" class="btn btn-success" name="ok" value="ADICIONAR" />  </form>

</div>
  </form>
</div>
<section>
</div>
</div>


                 </div>
               </div>
                 <div id="garcons" class="tab-pane">Garçons</div>
                 <div id="usuarios" class="tab-pane">
                   <div class="row">
                  <div class="col-lg-12">
                  <!--notification start-->
                  <section class="panel">
                  <div class="panel-header">
                  </div>
                  <div class="panel-body">

                  <div class="row">


                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
               </div>
             </div>
           </section>

           <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
           <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>

         <script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
           <script src="<?php echo base_url()?>assest/js/validate.js"></script>

<script>
function divimp(valor){

  if( valor=="1" ){
      document.getElementById("local").style.display = "block";
      document.getElementById("rede").style.display = "none";
  }
  else{
    document.getElementById("local").style.display = "none";
    document.getElementById("rede").style.display = "block";
  }


}

</script>

<SCRIPT>
$('#addimpressora').validate({

  rules:{
     tipoimpressora: {required:true}
  },
  messages:{
     tipoimpressora: {required: 'Insira um serviço'}
  },

submitHandler: function( form ){
var dados = $( form ).serialize();
$.ajax({
type: "POST",
url:"<?php echo base_url();?>configuracoes/addimpressora",
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

$('#formempresa').validate({

  rules:{
     id: {required:true}
  },
  messages:{
     id: {required: 'Insira um serviço'}
  },

submitHandler: function( form ){
var dados = $( form ).serialize();
$.ajax({
type: "POST",
url:"<?php echo base_url();?>configuracoes/edit",
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

</SCRIPT>
<script>
$(document).ready( function() {
function alteraremp(){

  var dados = $( form ).serialize();
  $.ajax({
  type: "POST",
  url:"<?php echo base_url();?>configuracoes/edit",
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
}
});
</script>
      </section>

    </section>
