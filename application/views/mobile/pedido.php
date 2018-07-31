<!DOCTYPE html>
<html lang="en">

<head>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Profit sistemas</title>

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

	<!--header start-->




    <!-- container section start -->
    <section id="container" class="">
      <!--header start-->


      <header class="header blue-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="MENU" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="#" class="logo">MESA <?php echo $pedido->numeromesa ?> <span class="lite"> </span></a>

      </header>






  <div class="alert alert-success" id="success-alert" style="display: none ">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    Product have added to your wishlist.
  </div>


  <section id="main-content">
        <section class="wrapper">
<div class="row">
	<ul>



		 <?php $i=0;foreach($produtos as $pod){?>

<li  value="<?php echo $i;?>"onclick="produto(<?php echo $i;?>)">


						  <div class="col-lg-12">
							  <input type="button" class="btn btn-success btn-lg col-lg-3 col-xs-5" style="margin:5px;" name="nomeproduto[]" value="<?php echo $pod['nomeproduto'] ?>">
							   <input type="hidden" name="idproduto[]" value="<?php echo $pod['id'] ?>">
							  <input type="hidden" name="valorproduto[]" value="<?php echo $pod['venda'] ?>">
							  <input type="hidden" name="mesa[]" value="<?php echo $mesa ?>">
							  <input type="hidden" name="pedido[]" value="<?php echo $pedido->id ?>">
	 </div>

</li>
						<?php $i++;}?>
	</ul>

					  </div>

</section>
</section>






  <footer>

	  <form action="<?php echo base_url();?>mobile/additem"  method="post" >
						   <fieldset  id="fieldset"></fieldset>
<div class="row">
	<div class="col-lg-12">
						   <input  type="submit"  class="btn btn-success col-lg-8 btn-lg"  name="cadastrar" value="REVISAR" />
	</div></div>

		  <!-- task notificatoin start -->
						 </form>

	</footer>
</section>
</body>



        <script src="<?php echo base_url()?>assest/js/jquery.js"></script>
      <script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
      <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
      <script src="<?php echo base_url()?>assest/js/bootstrap.js"></script>
      <script src="<?php echo base_url()?>assest/js/validate.js"></script>
	<script>




			function produto(value){

			   var $this = $( this );

						var nomeproduto = document.getElementsByName('nomeproduto[]');
			  			var idproduto =  document.getElementsByName('idproduto[]');
   						var valorproduto =  document.getElementsByName('valorproduto[]');
				var idpedido =  document.getElementsByName('pedido[]');
				var nmesa =  document.getElementsByName('mesa[]');
document.getElementById('item').value =nomeproduto[value].value;
document.getElementById('numeropedido').value =idpedido[value].value;
document.getElementById('precoitem').value =valorproduto[value].value;
document.getElementById('produtoid').value =idproduto[value].value;
document.getElementById('numerom').value =nmesa[value].value;





				var nomeprodutook = nomeproduto[value].value;



    $('#call-modal').trigger('click');


			 //   var $this = $( this );



   // var vlrpgto = $this.find("input[name='itemmobile[value]']").val();


	//var item = $(this).val();


			}

		 $('#').submit(function(){



  var dados = $( '#fieldset' ).serialize();
  $.ajax({
  type: "POST",
  url:"<?php echo base_url();?>mobile/additem",
  data:dados,
  dataType:'json',
  success:function(data)
  {

if(data.result == true){




  $("#myWish").click(function showAlert() {
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#success-alert").slideUp(500);
                });
              });
}

else{

$("#painelrec").load("<?php echo current_url();?> #painelrec" );
	//location.reload();

}

  }

  });
  return false;


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

                <form action="" method="post">
                  <input type="text" class="form-control" id="item" name="produto" value="" disabled>

                  <input type="hidden" name="numeropedido" id="numeropedido">
<input type="hidden" name="produtoid" id="produtoid">
<input type="hidden" name="precoitem" id="precoitem">
<input type="hidden" name="numerom" id="numerom">


<input type="button" class="btn btn-default" value="-" id="moins" onclick="minus()">

                <input type="text" class="form-control" name="quantidade" value="1" id="count">
                <input type="button" class="btn btn-default" value="+" id="plus" onclick="plus()">
</form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>

              </div>
          </div>
          </div>
        </div>




      <script type="text/javascript">






      var count = 1;
      var countEl = document.getElementById("count");

      function plus(){



      count++;
      countEl.value = count;
      }
      function minus(){


      if (count > 1) {
      count--;
      countEl.value = count;
      }
      }


      </script>
        <script>





        $('#formitem').submit(function() {



          var $this = $( this );



          var quantidade = $this.find("input[name='quant']").val();
      var nmesa = $this.find("input[name='numerom']").val();
      var pedido_id = $this.find("input[name='numeropedido']").val();
      var idproduto = $this.find("input[name='produtoid']").val();
      var precovenda = $this.find("input[name='precoitem']").val();
      var nomeproduto = $this.find("input[name='item']").val();


      var hiddens =  '<input type="hidden" name="produto[]" value="'+idproduto+'" />'+
     '<input type="hidden" name="nome[]" value="'+nomeproduto+'" />'+
        '<input type="hidden" name="pedido[]" value="'+pedido_id+'" />'+
        '<input type="hidden" name="numeromesa[]" value="'+nmesa+'" />'+
          '<input type="hidden" name="quant[]" value="'+quantidade+'" />'+

'<input type="hidden" name="valorproduto[]" value="'+precovenda+'" />';



$('#fieldset').append( hiddens );
        });




        </script>
