<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Elements | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url();?>assest/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url();?>assest/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo base_url();?>assest/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assest/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo base_url();?>assest/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assest/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>


      <!--logo end-->



      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->

          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
    <!--  toin end -->
          <!-- alert notification start-->

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="">
                            </span>
                            <span class="username">OK</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>


              <li>
                <a href="login.html"><i class="icon_key_alt"></i>SAIR</a>
              </li>

            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>

    <section id="main-content">
      <section class=" wrapper">

        <div id="mesas" class="row">
          <div class="col-lg-12">
            <?php foreach ($mesas as $m) { ?>
            <?php $numer= $m['numeromesas']; ?>

             <?php }?>
                              <?php   $me=1;   for($i=1;$i<=$numer;$i++) {
                    ?>
            <div class="col-xs-4">





                    <input type="hidden" name="numeromesa" value="<?php echo $me;?>" name="numermomesa"/>
                                          <input type="submit" onclick="hide('mesas')" class="btn btn-success btn-lg btn-block" style="margin:5px;"name="servico" value="MESA <?php echo $me;?>" />





            </div>
            <?php $me++;
}

                ?>
          </div>
        </div>
<div id="categorias" style="display:none">

    <div class="col-lg-12">
        <?php foreach ($categorias as $cate) { ?>

      <div class="col-xs-4">

<span idAcao="<?php echo $cate['id'];?>" class="btn btn-success btn-lg btn-block" style="margin:5px;"><?php echo $cate['nomedescricao']?></span>


      </div>

    <?php } ?>
    </div>
</div>

<div id="produtos">

    <div id="result" class="col-lg-12">

      </div>



</div>

<!-- javascripts -->
<script src="<?php echo base_url();?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url();?>assest/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="<?php echo base_url();?>assest/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>assest/js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- gritter -->
<script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assest/js/validate.js"></script>
<!-- custom gritter script for this page only-->
<script src="<?php echo base_url();?>assest/js/gritter.js" type="text/javascript"></script>
<!--custome script for all page-->
<script src="<?php echo base_url();?>assest/js/scripts.js"></script>




<script type="text/javascript">

$(document).on('click', 'span', function(event) {
            var $idcat = $(this).attr('idAcao');


                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>mobile/getprodutoscategorias",
                  data: "idcat="+$idcat,
                  dataType: 'json',
                  success: function(data)
                  {
var result = data.result;
var row ="";
for(i=0; i < result.length; i++) {
            row += '<div class=col-xs-4>';
          row+=  '<input type="submit"  class="btn btn-success btn-lg btn-block" style="margin:5px;"name="servico" value="'+result[i].nomeproduto+'" />';
            row += '</div>';

        }
          document.getElementById('categorias').style.display = 'none';
        $('#result').html(row);

                  }
                  });

  event.preventDefault();


       });

</script>


<script>
function hide(target) {
    document.getElementById(target).style.display = 'none';
    document.getElementById('categorias').style.display = 'block';
}
</script>

<script>


$("#getprodutoscategorias").validate({

  rules:{
     idcat: {required:true}
  },
  messages:{
     idcat: {required: 'Insira um serviço'}
  },

submitHandler: function( form ){
var dados = $( form ).serialize();
$.ajax({
type: "POST",
url:"<?php echo base_url();?>mobile/getprodutoscategorias",
data:dados,
dataType:'json',
success:function(data)
{
if(data.result == true){

alert('ahoooooooooooooow.');
}
else{
alert('Ocorreu um erro ao tentar adicionar serviço.');
}
}

});
return false;
}

});

</script>
      </section>
    </section>
  </section>





</body>
<footer>Hey, I'm the fixed footer :)</footer>
</html>
