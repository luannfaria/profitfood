<section id="main-content">
      <section class="wrapper">

        <div class="row">
                  <div class="col-md-12">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Categorias</li>

            </ol>
            <div class="box-tools">
                  <a href="#categoria" data-toggle="modal" class="btn btn-success">NOVA CATEGORIA</a>

                    <a href="<?php echo base_url();?>categoria/print" data-toggle="modal" class="btn btn-success">NOVA CATEGORIA</a>

                </div>
                <br>


</div>
</div>

<div class="row">
         <div class="col-sm-12">
           <section class="panel">

<table class="table table-striped">

  <tr>
      <td>Nome descrição</td>
      <td>Status</td>
      <td> Ações </td>

  </tr>
      <?php foreach($categoriaprodutos as $c){?>
        <tr>
    		<td><?php echo $c['nomedescricao']; ?></td>
    		<td><?php echo $c['status']; ?></td>
        <td>  <a href="#" class="btn btn-info btn-xs">Editar</a> </td>
      </tr>
      <?php } ?>
</table>
</section>


</div>

</div>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="categoria" class="modal fade">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                       <h4 class="modal-title">Nova categoria</h4>
                     </div>
                     <div class="modal-body">

                       <form action="<?php echo base_url()?>categoria/add" method="post">

                         <div class="row">

                         <div class="form-group">
                           <label for="nomecategoria" class="col-md-1 control-label">Nome</label>
                           <div class="col-md-6">
                             <input type="text" name="nomedescricao" value=" " class="form-control" id="nomedescricao" required/>
                              <input type="hidden" value="1" name="status" id="status"/>
                           </div>

                           <div class="col-md-4">
                        			<button type="submit" class="btn btn-success">SALVAR</button>
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
