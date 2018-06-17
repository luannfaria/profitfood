<section id="main-content">
  <section class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                    <li><i class="fa fa-laptop"></i>Permissões</li>
                  </ol>
                	<div class="box-tools">
                      <a href="<?php echo site_url('permissoes/add'); ?>" class="btn btn-success">NOVO</a>
                    </div>
                    <br>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
                        <tr>


                <th>Nome</th>

                <th>Data cadastro</th>
                  <th>Ações</th>

                        </tr>
                        <?php foreach ($permissao as $c) {
    ?>
                        <tr>


                <td><?php echo $c['nome']; ?></td>

                <td><?php echo $c['data']; ?></td>
                <td>
                                <a href="<?php echo site_url('permissoes/edit/'.$c['idPermissao']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>



                        </tr>
                        <?php
} ?>
                    </table>

                </div>
              </div>
            </div>
          </div>
