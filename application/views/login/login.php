
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Profit Sistemas | Entrar </title>

  <!-- Bootstrap CSS -->
<link href="<?php echo base_url(); ?>assest/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url(); ?>assest/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->


  <script src="<?php echo base_url()?>assest/js/jquery-1.8.3.min.js"></script>

  <!-- font icon -->
<link href="<?php echo base_url(); ?>assest/css/elegant-icons-style.css" rel="stylesheet" />
<!--  <link href="<?php echo base_url(); ?>assest/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo base_url(); ?>assest/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assest/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" id="formLogin" method="post"  action="<?php echo base_url()?>dashboard/verificarLogin">
      <?php if($this->session->flashdata('error') != null){?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->flashdata('error');?>
           </div>
      <?php }?>

      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" id="login" name="login" class="form-control" placeholder="Login" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="senha" class="form-control" placeholder="Senha">
        </div>
       <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>-->
        <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
     <!--   <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
      </div>
    </form>

  </div>

  <script src="<?php echo base_url()?>assest/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assest/js/validate.js"></script>



  <script type="text/javascript">
      $(document).ready(function(){

          $('#email').focus();
          $("#formLogin").validate({
               rules :{
                    login: { required: true},
                    senha: { required: true}
              },
              messages:{
                    email: { required: 'Campo Requerido.'},
                    senha: {required: 'Campo Requerido.'}
              },
             submitHandler: function( form ){
                   var dados = $( form ).serialize();


                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>dashboard/verificarLogin?ajax=true",
                    data: dados,
                    dataType: 'json',

                    success: function(data)
                    {
                      if(data.result == true){

                          window.location.href = "<?php echo base_url();?>Dashboard/painel";
                      }
                      else{


                          $('#btn-acessar').removeClass('disabled');
                          $('#progress-acessar').addClass('hide');

                          $('#call-modal').trigger('click');
                      }
                    }
                    });

                    return false;
              },

              errorClass: "help-inline",
              errorElement: "span",
              highlight:function(element, errorClass, validClass) {
                  $(element).parents('.control-group').addClass('error');
              },
              unhighlight: function(element, errorClass, validClass) {
                  $(element).parents('.control-group').removeClass('error');
                  $(element).parents('.control-group').addClass('success');
              }
          });

      });

  </script>


  <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>



  <div class="modal fade" id="notification">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  Profit sistemas
              </div>
              <div class="modal-body">
                  <h3 style="text-align: center">Os dados de acesso estão incorretos, por favor tente novamente!</h3>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>

              </div>
          </div>
          </div>
        </div>

</body>

</html>
