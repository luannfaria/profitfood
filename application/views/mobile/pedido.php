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

       <div class="nav search-row" id="top_menu">
         <!--  search form start -->
         <ul class="nav top-menu">
           <li>
             <form class="navbar-form">
               <H4>MESA <?php echo $pedido->numeromesa ?></h4>
             </form>
           </li>
         </ul>

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
              <div class="row">

                    <div class="col-lg-12">

                        <?php foreach($categorias as $cat){?>

                                                           <div class="col-lg-4">
     <input type="submit"  class="btn btn-success btn-lg btn-block" style="margin:5px;"name="servico" value=" <?php echo $cat['nomedescricao'];?>" />
   </div>
                        <?php }?>
                    </div>

              </div>


      </section>
    </section>
