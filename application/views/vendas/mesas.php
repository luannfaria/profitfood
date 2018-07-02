<section id="main-content">
      <section class="wrapper">
        <script src="<?php echo base_url();?>assest/js/scripts.js"></script>
                <!-- bootstrap theme -->

        <link href="<?php echo base_url();?>assest/css/elegant-icons-style.css" rel="stylesheet" />

         <link href="<?php echo base_url();?>assest/css/style-responsive.css" rel="stylesheet" />

        <div class="row">
                  <div class="col-md-12">
                    <div class="box-tools">
                          <a href="#abrirmesa" data-toggle="modal" class="btn btn-success btn-lg">ABRIR MESA</a>

                        </div>
                        <?php if($custom_error == true){ ?>
                        <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente e responsável.</div>
                        <?php } ?>
                  </div>

                </div>
<br>
                <div class="row">
                          <div class="col-lg-12">
                            <section class="panel">

                              <header class="panel-heading">
                                  Mesas abertas
                                  </header>
                                  <?php
                                  if(!$mesasaberta){?>
                                    <div class="panel-body">
                                      <div class="row">
                                        <h2> Nenhuma mesa aberta </h2>
                                      </div>
                                    </div>

                                  <?php }else{ ?>
                              <div class="panel-body">
                                <div class="row">
                                <div class="col-lg-12" style="background:#57889c;">
                                <?php      foreach ($mesasaberta as $ma) {
    ?>
 <div class="col-lg-2">
   <a href="<?php echo site_url('vendas/editamesa/'.$ma['idpedido']); ?>">
   <div class="info-box blue-bg">
    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">

   <div class="title"></div>
       <div class="mesas"><i class="fa fa-cutlery"> </i>MESA <?php echo $ma['numeromesa']; ?></div>

     </div>
   </div></a>
</div>
                                      <?php
} ?>
</div>
</div>
</div>

<?php }?>
</section>
</div>
</div>



                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="abrirmesa" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Abrir mesa</h4>
                      </div>
                      <div class="modal-body">

     <div class="row">
<?php foreach ($mesas as $m) { ?>
<?php $numer= $m['numeromesas']; ?>

 <?php }?>
                  <?php   $me=1;   for($i=1;$i<=$numer;$i++) {
        ?>

                          <div class="col-lg-4">
  <form id="formServicos" action="<?php echo base_url() ?>vendas/novamesa" method="post">

    <input type="hidden" name="numeromesa" value="<?php echo $me;?>" name="numermomesa"/>
                          <input type="submit" id="botaomesas" class="btn btn-success btn-lg btn-block" style="margin:5px;"name="servico" value="MESA <?php echo $me;?>" />



                            </form>
</div>




                    <?php $me++;
    }

                        ?>
                        <br>
                        </div>

</div>
                    </div>

                  </div>
                </div>



              </section>
            </section>
