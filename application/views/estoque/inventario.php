<section id="main-content">
      <section class="wrapper">



        <div class="row">
                  <div class="col-md-7">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Inventario</li>

            </ol>





</div>

      <div class="col-md-5">
              <a href="<?php echo base_url()?>inventario/novoinvetario" data-toggle="modal" class="btn btn-success">NOVO INVENTARIO</a>
      </div>
</div>


<div class="row">
         <div class="col-sm-12">
           <section class="panel">

<table class="table table-striped">
  <thead>
    <tr>
		<th>Data</th>

<th>Descrição</th>


		<th>Visualizar</th>
  </tr>
</thead>
<tbody>

    <?php if($invent){ foreach($invent as $in){?>
  <tr>
    <td><?php echo $in['data'] ?></td>
    <td><?php echo $in['descricao'] ?></td>
    <td></td>
  </tr>

<?php }} ?>
</tbody>

</table>
</section>
</div>
</div>
