<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">

        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>

          <li><i class="fa fa-list-alt"></i>Editar permissões</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Editar permissões
          </header>
          <div class="panel-body">
            <form action="<?php echo base_url();?>permissoes/add" id="formPermissao" method="post" class="form-inline" role="form">
              <div class="form-group">
                <label>Nivel de permissões</label>
                <input name="nome" type="text" id="nome" class="form-control md-2" value="" />
                <input type="hidden" name="idPermissao" value="">
              </div>
              <div class="form-group">
                <label>Situação</label>
                <select name="situacao" id="situacao" class="form-control m-bot15">

                    <option value="1">Ativo</option>
                    <option value="0" >Inativo</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">SALVAR</button>


          </div>
        </section>

      </div>
    </div>
    <div class="row">

      <div class="col-lg-6">
        <div class="col-lg-6">
          <section class="panel">
            <header class="panel-heading">
              CLIENTES
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input name="vCliente" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar cliente
                                          <input name="aCliente" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar cliente
                                          <input  name="eCliente" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir cliente
                                          <input  name="dCliente" type="checkbox" value="1">

                                      </label>
              </div>

            </div>

          </section>

          <section class="panel">
            <header class="panel-heading">
              AGENDA
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input  name="vAgenda" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar agendamento
                                          <input  name="aAgenda" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar agendamento
                                          <input name="eAgenda" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir agendamento
                                          <input  name="dAgenda" type="checkbox" value="1">

                                      </label>
              </div>

            </div>
          </section>


          <section class="panel">
            <header class="panel-heading">
              RELATORIOS
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input name="vRel" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar cliente
                                          <input  name="aProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar cliente
                                          <input  name="eProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir cliente
                                          <input  name="dProduto" type="checkbox" value="1">

                                      </label>
              </div>

            </div>
          </section>
          </div>


          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                SERVIÇOS
              </header>
              <div class="panel-body">
                <div class="checkbox">
                  <label>Visualizar menu
                                            <input name="vServico" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Adicionar serviço
                                            <input  name="aServico" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Editar serviço
                                            <input  name="eServico" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Excluir serviço
                                            <input name="dServico" type="checkbox" value="1">

                                        </label>
                </div>

              </div>

            </section>



            <section class="panel">
              <header class="panel-heading">
                USUARIOS DO SISTEMA
              </header>
              <div class="panel-body">
                <div class="checkbox">
                  <label>Visualizar menu
                                            <input name="vUser" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Adicionar usuario
                                            <input  name="aProduto" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Editar usuario
                                            <input  name="eProduto" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Excluir usuario
                                            <input  name="dProduto" type="checkbox" value="1">

                                        </label>
                </div>

              </div>
            </section>

            <section class="panel">
              <header class="panel-heading">
                FUNCIONARIOS
              </header>
              <div class="panel-body">
                <div class="checkbox">
                  <label>Visualizar menu
                                            <input  name="vFunc" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Adicionar funcionario
                                            <input name="aFunc" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Editar funcionario
                                            <input  name="eFunc" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Excluir funcionario
                                            <input name="dFunc" type="checkbox" value="1">

                                        </label>
                </div>

              </div>
            </section>


            </div>

      </div>
      <div class="col-lg-6">
        <!--notification start-->
        <div class="col-lg-6">
          <section class="panel">
            <header class="panel-heading">
              PRODUTOS
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input  name="vProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar produto
                                          <input  name="aProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar produto
                                          <input  name="eProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir produto
                                          <input  name="dProduto" type="checkbox" value="1">

                                      </label>
              </div>

            </div>
          </section>



          <section class="panel">
            <header class="panel-heading">
              CONTAS A RECEBER
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input  name="vReceber" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar conta
                                          <input  name="aReceber" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar conta
                                          <input name="eReceber" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir conta
                                          <input name="dReceber" type="checkbox" value="1">

                                      </label>
              </div>

            </div>
          </section>

          <section class="panel">
            <header class="panel-heading">
              PERMISSÕES
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input name="vPermissao" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar permissões
                                          <input  name="aPermissao" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar permissões
                                          <input  name="ePermissao" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir permissões
                                          <input  name="dPermissao" type="checkbox" value="1">

                                      </label>
              </div>

            </div>
          </section>

        </div>

        <div class="col-lg-6">
          <section class="panel">
            <header class="panel-heading">
              CATEGORIAS
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input  name="vCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar categoria
                                          <input  name="aCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar categoria
                                          <input name="eCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir Categoria
                                          <input  name="dCategoria" type="checkbox" value="1">

                                      </label>
              </div>

            </div>

          </section>


          <section class="panel">
            <header class="panel-heading">
              CONTAS A PAGAR
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>Visualizar menu
                                          <input  name="vPagar" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar conta
                                          <input name="aPagar" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar conta
                                          <input  name="ePagar" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir conta
                                          <input  name="dPagar" type="checkbox" value="1">

                                      </label>
              </div>

            </div>

          </section>
          </div>
</form>
      </div>
    </div>
