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
$.get("<?php echo baseUrlRole() ?>RegistroUbch/mesasCne", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> INGRESAR PATRULLADO</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>patrullados" method="POST">
      <?php echo Token::field() ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="number" name="cedula" placeholder="CEDULA" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" data-inputmask="'mask': '(9999) 999-9999'" name="telefono_1" placeholder="TELEFONO 1" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" data-inputmask="'mask': '(9999) 999-9999'"  name="telefono_2" placeholder="TELEFONO 2">
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <input class="form-control" type="text"  name="direccion" placeholder="DIRECCION">
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-save fa-2x"></i></button>
      </div>
    </div>
  </div>
  <br>
</form>
</div>