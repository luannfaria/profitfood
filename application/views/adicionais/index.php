<section id="main-content">
      <section class="wrapper">

        <div class="row">
                  <div class="col-md-12">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Adicionais</li>

            </ol>

            <div class="box-tools">

              <a href="#adicional" data-toggle="modal" class="btn btn-success">NOVO ADICIONAL</a>
                </div>
                <br>


</div>
</div>





<div class="row">
         <div class="col-sm-12">
           <section class="panel">

<table class="table table-striped">

  <tr>
  <th>ID</th>
  <th>Nome</th>
  <th>Valor</th>

  <th>Ações</th>
</tr>


<?php foreach($adicionais as $ad){ ?>
  <tr>
  <td><?php echo $ad['id']; ?></td>
  <td><?php echo $ad['nomeadicional']; ?></td>
  <td><?php echo $ad['valoradicional']; ?></td>
  <td></td>







</tr>

<?php } ?>

</table>
</section>
</div>
</div>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="adicional" class="modal fade">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                       <h4 class="modal-title">Novo adicional</h4>
                     </div>
                     <div class="modal-body">

                       <form action="<?php echo base_url(); ?>adicionais/add" method="post">

                         <div class="row">

                         <div class="form-group">
                           <label for="nomeproduto" class="col-md-1 control-label">Nome</label>
                           <div class="col-md-5">
                             <input type="text" name="nomeadicional" value="" class="form-control" id="nomeadicional" required/>
                           </div>

                           <label for="codbarra" class="col-md-2 control-label">Preço</label>
                           <div class="col-md-2">
                             <input type="text" name="valoradicional" value="" class="form-control" id="valoradicional"/>
                           </div>


                           <div class="col-md-2">

                           <label for="">&nbsp</label>
       <br/>
                           <input type="submit" class="btn btn-success btn-lg col-lg-12" name="ok" value="SALVAR" />
                           </div>
                         </div>
                       </div>

                       </form>
                     </div>
                   </div>
                 </div>
               </div>

</section>
</section>
