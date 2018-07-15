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

  <main>



	<header> <h4>MESA <?php echo $pedido->numeromesa ?></h4></header>



<div class="row">
	<ul>



		 <?php $i=0;foreach($produtos as $pod){?>

<li  value="<?php echo $i;?>"onclick="produto(<?php echo $i;?>)">


						  <div class="col-lg-12">
							  <input type="button" class="btn btn-success btn-lg col-lg-4 col-xs-5" style="margin:5px;" name="nomeproduto[]" value="<?php echo $pod['nomeproduto'] ?>">
							   <input type="hidden" name="idproduto[]" value="<?php echo $pod['id'] ?>">
							  <input type="hidden" name="valorproduto[]" value="<?php echo $pod['venda'] ?>">
							  <input type="hidden" name="mesa[]" value="<?php echo $mesa ?>">
							  <input type="hidden" name="pedido[]" value="<?php echo $pedido->id ?>">
	 </div>

</li>
						<?php $i++;}?>
	</ul>

					  </div>





	</main>

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


				var nomeprodutook = nomeproduto[value].value;


				  var hiddens =  '<input type="hidden" name="produto[]" value="'+idproduto[value].value+'" />'+
				 '<input type="hidden" name="nome[]" value="'+nomeproduto[value].value+'" />'+
					  '<input type="hidden" name="pedido[]" value="'+idpedido[value].value+'" />'+
					  '<input type="hidden" name="numeromesa[]" value="'+nomeproduto[value].value+'" />'+
	'<input type="hidden" name="valorproduto[]" value="'+valorproduto[value].value+'" />';



	$('#fieldset').append( hiddens );
			 //   var $this = $( this );



   // var vlrpgto = $this.find("input[name='itemmobile[value]']").val();


	//var item = $(this).val();

				alert(nomeprodutook);
			}

		 $('#itenspedido').submit(function(){



  var dados = $( '#fieldset' ).serialize();
  $.ajax({
  type: "POST",
  url:"<?php echo base_url();?>mobile/additem",
  data:dados,
  dataType:'json',
  success:function(data)
  {

if(data.result == true){




  alert('ok');
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
