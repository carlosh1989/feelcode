<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
//alert(idMunicipio);
$.get("<?php echo baseUrl ?>admin/RegistroUbch/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
$("#ParroquiaSelect").html(data);
});
});
})
});
</script>
<script language="javascript">
$(document).ready(function(){
$("#ParroquiaSelect").change(function () {
$("#ParroquiaSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idParroquia = $(this).val();
//alert(idParroquia);
$.get("<?php echo baseUrl ?>admin/RegistroUbch/mesasCne", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-university fa-2x"></i> INGRESAR CENTRO</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>centrosMunicipal" method="POST">
      <?php echo Token::field() ?>
      <input type="hidden" name="cedula" value="<?php echo $cedula ?>">
      <input type="hidden" name="id_clp" value="<?php echo $id_clp ?>">
      <div class="row">
        <div id="previewBox" class="col-lg-12">
          <div class="panel panel-default animated bounceInDown">
            <div class="panel-body">
              <div class="col-lg-1">
                <i class="fa fa-exclamation-triangle fa-3x text-warning" aria-hidden="true"></i>
              </div>
              <div class="col-lg-11 alerta">
                El centros sera anclado al inicio de sesion del responsable UBCH. Dicha acción no es reversible.
                <button type='button' id="closeButton" class='close' onclick="close_div()">×</button>
              </div>
            </div>
          </div>
        </div>
        <br id="br">
        <h4 class="text-muted text-center text-uppercase">Centro</h4>
        <div class="col-lg-12">
          <div class="form-group">
            <select style="cursor:pointer" id="" class="form-control" name="codigo_cne" required/>
              <?php foreach ($mesas_cne as $m): ?>
              <option value="<?php echo $m->codigo_cne ?>"><?php echo $m->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <br><br><br>
        <div class="col-lg-12">
          <h4 class="text-muted text-center text-uppercase">
          Datos Varios
          </h4>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="id_institucion" required/>
              <option value="">INSTITUCIÓN</option>
              <?php foreach ($instituciones as $key => $i): ?>
              <option value="<?php echo $i->id_instituciones ?>"><?php echo $i->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="id_partido" required/>
              <option value="">PARTIDOS</option>
              <?php foreach ($partidos as $key => $p): ?>
              <option value="<?php echo $p->id_partidos ?>"><?php echo $p->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="id_estructura" required/>
              <option value="">ESTRUCTURA</option>
              <?php foreach ($estructura as $key => $e): ?>
              <option value="<?php echo $e->id_estructura ?>"><?php echo $e->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <br><br><br>
        <div class="col-lg-12">
          <h4 class="text-muted text-center text-uppercase">
          Datos de acceso
          </h4>
        </div>
        <div class="col-lg-4">
          <input class="form-control" type="text" name="email" placeholder="NOMBRE USUARIO">
        </div>
        <div class="col-lg-4">
          <input class="form-control" id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'tiene que tener minimo 6 caracteres.' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="CLAVE" required>
        </div>
        <div class="col-lg-4">
          <input class="form-control" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'La clave no coinciden.' : '');" placeholder="VERIFICAR CLAVE" required>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-save fa-2x"></i></button>
        </div>
      </div>
    </div>
    <br>
  </form>
</div>
<script>
$(document).ready(function() {
$('#closeButton').on('click', function(e) {
$('#previewBox').remove();
$('#br').remove();
});
});
</script>