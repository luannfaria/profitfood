

<section id="main-content">
  <section class="wrapper">


    <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              Editar usuario
            </header>
  <div class="panel-body">


			<?php echo form_open('usuario/edit/'.$usuario['idusuario']); ?>
			<div class="box-body">
				<div class="row clearfix">


					<div class="col-md-2">
						<label for="login" class="control-label"><span class="text-danger">*</span>Login</label>
						<div class="form-group">
							<input type="text" name="login" value="<?php echo ($this->input->post('login') ? $this->input->post('login') : $usuario['login']); ?>" class="form-control" id="login" required/>
							<span class="text-danger"><?php echo form_error('login');?></span>
						</div>
					</div>

          <div class="col-md-2">
						<label for="senha" class="control-label"><span class="text-danger">*</span>Alterar senha</label>
						<div class="form-group">
							<input type="password" name="senha" value="<?php echo ($this->input->post('senha') ? $this->input->post('senha') : $usuario['senha']); ?>" class="form-control" id="senha" required/>
							<span class="text-danger"><?php echo form_error('senha');?></span>
						</div>
					</div>

          <div class="col-md-2">
            <label for="senha" class="control-label"><span class="text-danger">*</span>Confirmar senha</label>
            <div class="form-group">
              <input type="password" name="senhaconf" value="<?php echo ($this->input->post('senha') ? $this->input->post('senha') : $usuario['senha']); ?>" class="form-control" id="senha" required/>


              <span class="text-danger"><?php echo form_error('senhaconf');?></span>
            </div>
          </div>



          <div class="col-md-3">

            <label class="control-label"><span class="text-danger">*</span>Permissões</label>
            <div class="form-group">
            <select name="permissao" class="form-control">
              <option value="">Selecione nivel de acesso</option>
              <?php
              foreach($permissao as $p)
              {
                $selected = ($p['idPermissao'] == $usuario['idPermissao']) ? ' selected="selected"' : "";

                echo '<option value="'.$p['idPermissao'].'" '.$selected.'>'.$p['nome'].'</option>';
              }
              ?>
            </select>
            <span class="text-danger"><?php echo form_error('permissao');?></span>
          </div>

          </div>

          <div class="col-md-2">
            <label for="status" class="control-label">Status</label>
            <div class="form-group">
              <select name="status" class="form-control">
                <option value="">select</option>
                <?php
                $status_values = array(
                  '1'=>'ATIVO',
                  '2'=>'INATIVO',
                );

                foreach($status_values as $value => $display_text)
                {
                  $selected = ($value == $usuario['status']) ? ' selected="selected"' : "";

                  echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
                ?>
              </select>
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
    </div>
</div>
