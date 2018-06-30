<section id="main-content">
      <section class="wrapper">

        <div class="row">
                  <div class="col-md-12">
                    <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
              <li><i class="fa fa-table"></i>Pizzas</li>

            </ol>

            <div class="box-tools">

                  <a data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success">NOVA PIZZA</a>
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
  <th>Categoria Id</th>
  <th>Status</th>
  <th>Nomeproduto</th>
  <th>Ações</th>
</tr>

<?php foreach($produto as $p){ ?>
  <tr>
  <td><?php echo $p['id']; ?></td>
  <td><?php echo $p['categoria_id']; ?></td>
  <td><?php echo $p['status']; ?></td>
  <td><?php echo $p['nomeproduto']; ?></td>
  <td><a data-toggle="modal" data-target=".bs-edit-modal-lg<?php echo $p['id']?>" class="btn btn-success" >EDITAR</a></td>






</tr>

<?php } ?>
</table>
</section>
</div>
</div>







<div id="rec"class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
           <form action="<?php echo base_url()?>pizza/add" method="post">
        <div class="container">

          <div class="row">

            <div  class="col-md-12 col-sm-12 col-xs-11">
                      <div class="row">



                        <div class="col-lg-6">
                          <label style="color:#000;"class="control-label" for="inputSuccess">Nome da pizza</label>
	<div class="form-group">
                          <input type="text" name="nomepizza" class="form-control">
</div>
</div>
                          <div class="col-md-4">
                              <label for="idcategoria" style="color:#000;"class="control-label"><span class="text-danger">*</span>Categoria do produto</label>
                            <div class="form-group">
                              <select name="categoria_id" class="form-control required" required>
                                <option value="">Selecione</option>
                                <?php
                                foreach($categoriaprodutos as $categoriaproduto)
                                {
                                  $selected = ($categoriaproduto['id'] == $p['categoria_id']) ? ' selected="selected"' : "";

                                  echo '<option value="'.$categoriaproduto['id'].'" '.$selected.'>'.$categoriaproduto['nomedescricao'].'</option>';
                                }
                                ?>
                              </select>
                          </div>


                        </div>

</div>
<div class="row">
                        <div class="col-lg-6">
                          <label style="color:#000;"class="control-label" for="inputSuccess">Tamanhos e preços</label>
<div class="form-group">
                          <table class="table">
                   <thead>
                     <tr>
                       <th>#</th>
                       <th>Tamanho</th>
                       <th>Custo</th>
                       <th>Venda</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td><input type="checkbox" id="fat" onchange="muda(this, 'fatia');"></td>
                       <td>Fatia <input type="hidden" name="nometam[]"  class="form-control" value="FATIA"/>
                          <input type="hidden" name="sigla[]"  class="form-control" value="f"/>
                       </td>
                       <td>	<input type="text" name="custopizza[]"  class="form-control" id="fatiac" disabled="true"/></td>
                       <td><input type="text" name="vendapizza[]" class="form-control" id="fatiav" disabled="true"/></td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" id="peq" onchange="muda(this, 'pequena');"></td>
                       <td>Pequena
<input type="hidden" name="sigla[]"  class="form-control" value="p"/>
                         <input type="hidden" name="nometam[]"  class="form-control" value="PEQUENA"/></td>
                       <td>	<input type="text" name="custopizza[]"  class="form-control" id="pequenac" disabled="true"/></td>
                       <td><input type="text" name="vendapizza[]"  class="form-control" id="pequenav" disabled="true"/></td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" id="med" onchange="muda(this, 'media');"></td>
                       <td>Media
<input type="hidden" name="sigla[]"  class="form-control" value="m"/>
                          <input type="hidden" name="nometam[]"  class="form-control" value="MEDIA"/></td>
                       <td>	<input type="text" name="custopizza[]"  class="form-control" id="mediac" disabled="true"/></td>
                       <td><input type="text" name="vendapizza[]"  class="form-control" id="mediav" disabled="true"/></td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" id="gra" onchange="muda(this, 'grande');"></td>
                       <td>Grande
<input type="hidden" name="sigla[]"  class="form-control" value="g"/>
                         <input type="hidden" name="nometam[]"  class="form-control" value="GRANDE"/></td>
                       <td>	<input type="text" name="custopizza[]" value=" " class="form-control" id="grandec" disabled="true"/></td>
                       <td><input type="text" name="vendapizza[]" value=" " class="form-control" id="grandev" disabled="true"/></td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" id="gig" onchange="muda(this, 'gigante');"></td>
                       <td>Gigante
<input type="hidden" name="sigla[]"  class="form-control" value="gg"/>
                         <input type="hidden" name="nometam[]"  class="form-control" value="GIGANTE"/></td>
                       <td>	<input type="text" name="custopizza[]" value=" " class="form-control" id="gigantec" disabled="true"/></td>
                       <td><input type="text" name="vendapizza[]" value=" " class="form-control" id="gigantev" disabled="true"/></td>
                     </tr>
                   </tbody>
                 </table>

                 <button type="submit" class="btn btn-success">
                   <i class="fa fa-check"></i> CADASTRAR
                 </button>
                        </div>
</div>

                      </div>
            </div>

          </div>

</div>
</form>
      </div>
    </div>
  </div>
</div>




<script src="<?php echo base_url()?>assest/js/jquery.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assest/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assest/js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="<?php echo base_url()?>assest/js/validate.js"></script>


  <script src="<?php echo base_url()?>assest/js/maskmoney.js"></script>
<script>

$('#fatiac').maskMoney();
$('#fatiav').maskMoney();
$('#pequenac').maskMoney();
$('#pequenav').maskMoney();
$('#mediac').maskMoney();
$('#mediav').maskMoney();
$('#grandec').maskMoney();
$('#grandev').maskMoney();
$('#gigantec').maskMoney();
$('#gigantev').maskMoney();
function muda(el, id) {

  switch(id) {
    case 'fatia':
    document.getElementById('fatiac').disabled = !el.checked;
    document.getElementById('fatiav').disabled = !el.checked;
        break;
    case 'pequena':
    document.getElementById('pequenac').disabled = !el.checked;
    document.getElementById('pequenav').disabled = !el.checked;
        break;
        case 'media':
        document.getElementById('mediac').disabled = !el.checked;
        document.getElementById('mediav').disabled = !el.checked;
            break;
            case 'grande':
            document.getElementById('grandec').disabled = !el.checked;
            document.getElementById('grandev').disabled = !el.checked;
                break;
                case 'gigante':
                document.getElementById('gigantec').disabled = !el.checked;
                document.getElementById('gigantev').disabled = !el.checked;
                    break;
}

}

</script>
