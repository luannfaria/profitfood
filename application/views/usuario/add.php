<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          Adicionar usuario
        </header>
        <div class="panel-body">

            <?php echo form_open('usuario/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">


          <div class="col-md-3">
						<label for="login" class="control-label"><span class="text-danger">*</span>Login</label>
						<div class="form-group">
							<input type="text" name="login" value="<?php echo $this->input->post('login'); ?>" class="form-control" id="login" required />
							<span class="text-danger"><?php echo form_error('login');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="senha" class="control-label"><span class="text-danger">*</span>Senha</label>
						<div class="form-group">
							<input type="password" name="senha" value="<?php echo $this->input->post('senha'); ?>" class="form-control" id="senha" required/>

              <input type="hidden" name="status" id="status" value="1" />
							<span class="text-danger"><?php echo form_error('senha');?></span>
						</div>
					</div>

          <div class="col-md-2">
						<label for="senha" class="control-label"><span class="text-danger">*</span>Confirmar senha</label>
						<div class="form-group">
							<input type="password" name="senhaconf" value="<?php echo $this->input->post('senhaconf'); ?>" class="form-control" id="senhaconf" required />


							<span class="text-danger"><?php echo form_error('senhaconf');?></span>
						</div>
					</div>

			<!--		<div class="col-md-3">
						<label for="datacadastro" class="control-label">Datacadastro</label>
						<div class="form-group">
							<input type="text" name="datacadastro" value="// echo $this->input->post('datacadastro'); ?>" class="has-datepicker form-control" id="datacadastro" />
						</div>
					</div>-->

              <input type="hidden" name="datacadastro" value="<?php echo date('d/m/Y') ;?>" class="has-datepicker form-control" id="datepicker" />

          <div class="col-md-2">

            <label class="control-label"><span class="text-danger">*</span>Permissões</label>
            <div class="form-group">
            <select name="permissao" class="form-control" required>
              <option value="">Selecione nivel de acesso</option>
              <?php
              foreach($permissao as $p)
              {
                $selected = ($p['idPermissao'] == $this->input->post('idPermissao')) ? ' selected="selected"' : "";

                echo '<option value="'.$p['idPermissao'].'" '.$selected.'>'.$p['nome'].'</option>';
              }
              ?>
            </select>
            <span class="text-danger"><?php echo form_error('permissao');?></span>
          </div>

          </div>


				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> SALVAR
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
      </section>
    </div>
</div>
