<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>PROFIT SISTEMAS - 1.0</title>

  <!-- Bootstrap CSS -->
  <!-- Bootstrap CSS -->
   <link href="<?php echo base_url()?>assest/css/bootstrap.min.css" rel="stylesheet">
   <!-- bootstrap theme -->
   <link href="<?php echo base_url();?>assest/css/bootstrap-theme.css" rel="stylesheet">
   <!--external css-->
   <!-- font icon -->
   <link href="<?php echo base_url();?>assest/css/elegant-icons-style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assest/css/font-awesome.min.css" rel="stylesheet" />
   <!-- full calendar css-->
   <link href="<?php echo base_url();?>assest/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assest/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
   <!-- easy pie chart-->
   <link href="<?php echo base_url();?>assest/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
   <!-- owl carousel -->
   <link rel="stylesheet" href="<?php echo base_url();?>assest/css/owl.carousel.css" type="text/css">
   <link href="<?php echo base_url();?>assest/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
   <!-- Custom styles -->
   <link rel="stylesheet" href="<?php echo base_url();?>assest/css/fullcalendar.css">
   <link href="<?php echo base_url();?>assest/css/widgets.css" rel="stylesheet">
   <link href="<?php echo base_url();?>assest/css/style.css" rel="stylesheet">
   <link href="<?php echo base_url();?>assest/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assest/css/xcharts.min.css" rel=" stylesheet">
   <link href="<?php echo base_url();?>assest/css/jquery-ui-1.10.4.min.css" rel="stylesheet">

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
    <header class="header blue-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="MENU" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="<?php echo site_url();?>dashboard/painel" class="logo">Profit 1.0<span class="lite"> </span></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->

          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->

          <!-- inbox notificatoin end -->
          <!-- alert notification start-->

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="eborder-top">
            <a href="<?php echo site_url();?>dashboard/sair">SAIR <i class="fa fa-sign-out"></i> </a>
          </li>

          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>



    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="<?php echo site_url();?>dashboard/painel">
                          <i class="icon_house_alt"></i>
                          <span>Painel</span>
                      </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-star"></i>
                          <span>Vendas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vBalcao')) {
            ?>
              <li><a class="" href="#">BALCÃO</a></li>
            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vDelivery')) {
            ?>
              <li><a class="" href="#">DELIVERY</a></li>
            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vMesas')) {
            ?>
              <li><a class="" href="<?php echo base_url();?>vendas/mesasindex">MESAS</a></li>

            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vMobile')) {
            ?>
              <li><a class="" href="<?php echo base_url();?>mobile">MOBILE</a></li>
            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vPdv')) {
            ?>
              <li><a class="" href="<?php echo base_url();?>pdv">PDV</a></li>
<?PHP } ?>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-tags"></i>
                          <span>Produtos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php  if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
            ?>
              <li><a class="" href="<?php echo base_url();?>produto">Produtos</a></li>
            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vPizza')) {
            ?>
              <li><a class="" href="<?php echo base_url();?>pizza">Pizzas</a></li>
            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCategoria')) {
            ?>
              <li><a class="" href="<?php echo base_url();?>categoria">Categorias</a></li>
            <?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vAdicionais')) {
            ?>
                <li><a class="" href="#">Adicionais</a></li>

              <?php } ?>

            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-exchange"></i>
                          <span>Estoque</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php  if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCompra')) {
            ?>

<li><a class="" href="#">Compras</a></li>
<?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vEstoque')) {
?>
<li><a class="" href="<?php echo base_url();?>inventario">Ajuste de estoque</a></li>
<?php } if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vFornecedores')) {
?>
<li><a class="" href="#">Fornecedores</a></li>
<?php } ?>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-users"></i>
                          <span>Clientes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?php echo base_url();?>cliente">Clientes</a></li>


            </ul>
          </li>


          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-dollar"></i>
                          <span>Financeiro</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?php echo base_url();?>contasapagar/index">Contas a pagar</a></li>
              <li><a class="" href="<?php echo base_url();?>contasareceber/index">Contas a receber</a></li>
              <li><a class="" href="<?php echo base_url();?>fluxo/fluxo">Caixa</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Relatorios</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="#">Financeiro</a></li>
              <li><a class="" href="#">Produtos</a></li>
              <li><a class="" href="#">Vendas</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-cogs"></i>
                          <span>Configurações</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?php echo base_url();?>configuracoes">Configurações</a></li>
              <li><a class="" href="<?php echo base_url();?>usuario"><span>Usuarios</span></a></li>
              <li><a class="" href="<?php echo base_url();?>permissoes"><span>Permissões</span></a></li>

              <li><a class="" href="<?php echo base_url();?>configuracoes/impressoras">Impressoras</a></li>
            </ul>
          </li>

        </ul>
      <!-- sidebar menu end-->
      </div>

    </aside>
