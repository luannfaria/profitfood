<section id="main-content">
      <section class="wrapper">

        <div class="row">
                  <div class="col-md-12">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Impressoras</li>

            </ol>

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



            <div class="box-tools">
                  <a href="#impressora" data-toggle="modal" class="btn btn-success">NOVA IMPRESSORA</a>
                  <a href="<?php echo base_url()?>vendas/testepdf"  class="btn btn-success">TESTE IMP</a>
                </div>
                <br>


</div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="impressora" class="modal fade">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                       <h4 class="modal-title">Nova impressora</h4>
                     </div>
                     <div class="modal-body">

                     <form action="<?php echo base_url()?>configuracoes/addimpressora" method="post">

                       <div class="row">

                       <div class="form-group">
                         <label for="nomeproduto" class="col-md-1 control-label">Nome local impressão</label>
                         <div class="col-md-5">
                           <input type="text" name="nomeimpressora" value="" class="form-control" id="nomeimpressora" required/>
                         </div>
                       </div>

                       <div class="form-group">
                        <label for="impressora" class="col-md-2 control-label">Impressora</label>
                        <div class="col-md-4">
                          <select name="impressora" class="form-control">
                            <option value="">Selecione</option>

                            <?php foreach($Name as $i => $n){
                              //  $Printers[$i] = (object)[
                              echo '<option value="'.$n.'">'.$n.'</option>'; }?>
                          </select>

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
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>

<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-1.8.3.min.js"></script>


<script src="<?php echo base_url()?>assest/js/validate.js"></script>


  <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
</section>
</section>
