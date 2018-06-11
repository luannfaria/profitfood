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
                  </div>

                </div>
<br>
                <div class="row">
                          <div class="col-lg-12">
                            <section class="panel">

                              <header class="panel-heading">
                                  Mesas abertas
                                  </header>

                              <div class="panel-body">
                                <?php      foreach ($mesasaberta as $ma) {
    ?>
<div class="col-lg-3">
    <a href="<?php echo site_url('vendas/editamesa/'.$ma['id']); ?>" id="botaomesas"class="btn btn-primary btn-lg btn-block">MESA <?php echo $ma['numeromesa']; ?></a>


</div>
                                      <?php
} ?>

</div>
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
<div class="container">
  <div class="col-lg-12">

                  <?php      foreach ($mesas as $m) {
        ?>

                          <div class="col-lg-4">
  <form id="formServicos" action="<?php echo base_url() ?>vendas/abrirmesa" method="post">

    <input type="hidden" name="numeromesa" value="<?php echo $m['id']?>" name="numermomesa"/>
                          <input type="submit" id="botaomesas" class="btn btn-success btn-lg btn-block" name="servico" value="MESA <?php echo $m['id']?>" />



                            </form>
</div>




                    <?php
    }

                        ?>
                        <br>
                        </div>

</div>
                    </div>
                    </div>
                  </div>
                </div>



              </section>
            </section>
