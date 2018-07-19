<?php $permissoes = unserialize($result->permissoes);?>


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
            <form action="<?php echo base_url();?>permissoes/update" id="formPermissao" method="post" class="form-inline" role="form">
              <div class="form-group">
                <label>Nivel de permissões</label>
                <input name="nome" type="text" id="nome" class="form-control md-2" value="<?php echo $result->nome; ?>" />
                <input type="hidden" name="idPermissao" value="<?php echo $result->idPermissao; ?>">
              </div>
              <div class="form-group">
                <label>Situação</label>
                <select name="situacao" id="situacao" class="form-control m-bot15">
                    <?php if ($result->situacao == 1) {
    $sim = 'selected';
    $nao ='';
} else {
    $sim = '';
    $nao ='selected';
}?>
                    <option value="1" <?php echo $sim;?>>Ativo</option>
                    <option value="0" <?php echo $nao;?>>Inativo</option>
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
              ESTOQUE
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>COMPRAS
                                          <input <?php if (isset($permissoes['vCompra'])) {
    if ($permissoes['vCompra'] == '1') {
        echo 'checked';
    }
}?> name="vCompra" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>AJUSTE DE ESTOQUE
                                          <input <?php if (isset($permissoes['vEstoque'])) {
    if ($permissoes['vEstoque'] == '1') {
        echo 'checked';
    }
}?> name="vEstoque" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>FORNECEDORES
                                          <input <?php if (isset($permissoes['vFornecedores'])) {
    if ($permissoes['vFornecedores'] == '1') {
        echo 'checked';
    }
}?> name="vFornecedores" type="checkbox" value="1">

                                      </label>
              </div>



            </div>

          </section>

          <section class="panel">
            <header class="panel-heading">
              PRODUTOS
            </header>
            <div class="panel-body">
              <div class="checkbox">
                <label>PRODUTOS
                                          <input <?php if (isset($permissoes['vProduto'])) {
    if ($permissoes['vProduto'] == '1') {
        echo 'checked';
    }
}?> name="vProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>PIZZA
                                          <input <?php if (isset($permissoes['vPizza'])) {
    if ($permissoes['vPizza'] == '1') {
        echo 'checked';
    }
}?> name="vPizza" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>CATEGORIAS
                                          <input <?php if (isset($permissoes['vCategoria'])) {
    if ($permissoes['vCategoria'] == '1') {
        echo 'checked';
    }
}?> name="vCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>ADICIONAIS
                                          <input <?php if (isset($permissoes['vAdicionais'])) {
    if ($permissoes['vAdicionais'] == '1') {
        echo 'checked';
    }
}?> name="vAdicionais" type="checkbox" value="1">

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
                                          <input <?php if (isset($permissoes['vRel'])) {
    if ($permissoes['vRel'] == '1') {
        echo 'checked';
    }
}?> name="vRel" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar cliente
                                          <input <?php if (isset($permissoes['aProduto'])) {
    if ($permissoes['aProduto'] == '1') {
        echo 'checked';
    }
}?> name="aProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar cliente
                                          <input <?php if (isset($permissoes['eProduto'])) {
    if ($permissoes['eProduto'] == '1') {
        echo 'checked';
    }
}?> name="eProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir cliente
                                          <input <?php if (isset($permissoes['dProduto'])) {
    if ($permissoes['dProduto'] == '1') {
        echo 'checked';
    }
}?> name="dProduto" type="checkbox" value="1">

                                      </label>
              </div>

            </div>
          </section>
          </div>


          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                TIPO DE VENDAS
              </header>
              <div class="panel-body">
                <div class="checkbox">
                  <label>BALCÃO
                                            <input <?php if (isset($permissoes['vBalcao'])) {
    if ($permissoes['vBalcao'] == '1') {
        echo 'checked';
    }
}?> name="vBalcao" type="checkbox" value="1">

                                        </label>
                </div>

<div class="checkbox">
                <label>MOBILE
                                          <input <?php if (isset($permissoes['vMobile'])) {
  if ($permissoes['vMobile'] == '1') {
      echo 'checked';
  }
}?> name="vMobile" type="checkbox" value="1">

                                      </label>
              </div>

                <div class="checkbox">
                  <label>DELIVERY
                                            <input <?php if (isset($permissoes['vDelivery'])) {
    if ($permissoes['vDelivery'] == '1') {
        echo 'checked';
    }
}?> name="vDelivery" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>MESAS
                                            <input <?php if (isset($permissoes['vMesas'])) {
    if ($permissoes['vMesas'] == '1') {
        echo 'checked';
    }
}?> name="vMesas" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>PDV
                                            <input <?php if (isset($permissoes['vPdv'])) {
    if ($permissoes['vPdv'] == '1') {
        echo 'checked';
    }
}?> name="vPdv" type="checkbox" value="1">

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
                                            <input <?php if (isset($permissoes['vUser'])) {
    if ($permissoes['vUser'] == '1') {
        echo 'checked';
    }
}?> name="vUser" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Adicionar usuario
                                            <input <?php if (isset($permissoes['aProduto'])) {
    if ($permissoes['aProduto'] == '1') {
        echo 'checked';
    }
}?> name="aProduto" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Editar usuario
                                            <input <?php if (isset($permissoes['eProduto'])) {
    if ($permissoes['eProduto'] == '1') {
        echo 'checked';
    }
}?> name="eProduto" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>Excluir usuario
                                            <input <?php if (isset($permissoes['dProduto'])) {
    if ($permissoes['dProduto'] == '1') {
        echo 'checked';
    }
}?> name="dProduto" type="checkbox" value="1">

                                        </label>
                </div>

              </div>
            </section>

            <section class="panel">
              <header class="panel-heading">
                FINANCEIRO
              </header>
              <div class="panel-body">
                <div class="checkbox">
                  <label>CONTAS A RECEBER
                                            <input <?php if (isset($permissoes['vReceber'])) {
    if ($permissoes['vReceber'] == '1') {
        echo 'checked';
    }
}?> name="vReceber" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>CONTAS A PAGAR
                                            <input <?php if (isset($permissoes['vPagar'])) {
    if ($permissoes['vPagar'] == '1') {
        echo 'checked';
    }
}?> name="vPagar" type="checkbox" value="1">

                                        </label>
                </div>

                <div class="checkbox">
                  <label>CAIXA
                                            <input <?php if (isset($permissoes['vCaixa'])) {
    if ($permissoes['vCaixa'] == '1') {
        echo 'checked';
    }
}?> name="vCaixa" type="checkbox" value="1">

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
                                          <input <?php if (isset($permissoes['vProduto'])) {
    if ($permissoes['vProduto'] == '1') {
        echo 'checked';
    }
}?> name="vProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar produto
                                          <input <?php if (isset($permissoes['aProduto'])) {
    if ($permissoes['aProduto'] == '1') {
        echo 'checked';
    }
}?> name="aProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar produto
                                          <input <?php if (isset($permissoes['eProduto'])) {
    if ($permissoes['eProduto'] == '1') {
        echo 'checked';
    }
}?> name="eProduto" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir produto
                                          <input <?php if (isset($permissoes['dProduto'])) {
    if ($permissoes['dProduto'] == '1') {
        echo 'checked';
    }
}?> name="dProduto" type="checkbox" value="1">

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
                                          <input <?php if (isset($permissoes['vReceber'])) {
    if ($permissoes['vReceber'] == '1') {
        echo 'checked';
    }
}?> name="vReceber" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar conta
                                          <input <?php if (isset($permissoes['aReceber'])) {
    if ($permissoes['aReceber'] == '1') {
        echo 'checked';
    }
}?> name="aReceber" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar conta
                                          <input <?php if (isset($permissoes['eReceber'])) {
    if ($permissoes['eReceber'] == '1') {
        echo 'checked';
    }
}?> name="eReceber" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir conta
                                          <input <?php if (isset($permissoes['dReceber'])) {
    if ($permissoes['dReceber'] == '1') {
        echo 'checked';
    }
}?> name="dReceber" type="checkbox" value="1">

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
                                          <input <?php if (isset($permissoes['vPermissao'])) {
    if ($permissoes['vPermissao'] == '1') {
        echo 'checked';
    }
}?> name="vPermissao" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar permissões
                                          <input <?php if (isset($permissoes['aPermissao'])) {
    if ($permissoes['aPermissao'] == '1') {
        echo 'checked';
    }
}?> name="aPermissao" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar permissões
                                          <input <?php if (isset($permissoes['ePermissao'])) {
    if ($permissoes['ePermissao'] == '1') {
        echo 'checked';
    }
}?> name="ePermissao" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir permissões
                                          <input <?php if (isset($permissoes['dPermissao'])) {
    if ($permissoes['dPermissao'] == '1') {
        echo 'checked';
    }
}?> name="dPermissao" type="checkbox" value="1">

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
                                          <input <?php if (isset($permissoes['vCategoria'])) {
    if ($permissoes['vCategoria'] == '1') {
        echo 'checked';
    }
}?> name="vCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar categoria
                                          <input <?php if (isset($permissoes['aCategoria'])) {
    if ($permissoes['aCategoria'] == '1') {
        echo 'checked';
    }
}?> name="aCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar categoria
                                          <input <?php if (isset($permissoes['eCategoria'])) {
    if ($permissoes['eCategoria'] == '1') {
        echo 'checked';
    }
}?> name="eCategoria" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir Categoria
                                          <input <?php if (isset($permissoes['dCategoria'])) {
    if ($permissoes['dCategoria'] == '1') {
        echo 'checked';
    }
}?> name="dCategoria" type="checkbox" value="1">

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
                                          <input <?php if (isset($permissoes['vPagar'])) {
    if ($permissoes['vPagar'] == '1') {
        echo 'checked';
    }
}?> name="vPagar" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Adicionar conta
                                          <input <?php if (isset($permissoes['aPagar'])) {
    if ($permissoes['aPagar'] == '1') {
        echo 'checked';
    }
}?> name="aPagar" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Editar conta
                                          <input <?php if (isset($permissoes['ePagar'])) {
    if ($permissoes['ePagar'] == '1') {
        echo 'checked';
    }
}?> name="ePagar" type="checkbox" value="1">

                                      </label>
              </div>

              <div class="checkbox">
                <label>Excluir conta
                                          <input <?php if (isset($permissoes['dPagar'])) {
    if ($permissoes['dPagar'] == '1') {
        echo 'checked';
    }
}?> name="dPagar" type="checkbox" value="1">

                                      </label>
              </div>

            </div>

          </section>
          </div>
</form>
      </div>
    </div>
