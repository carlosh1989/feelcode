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
    <h3 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i> INGRESAR USUARIO RECARGA</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>/requerimientos" method="POST">
      <?php echo Token::field() ?>
      <div class="row">
        <div class="col-lg-4">
          <input class="form-control" name="cedula" type="number" value="<?php echo $cne->id?>" required placeholder="CEDULA">
        </div>
        <div class="col-lg-4">
          <input class="form-control" name="nombre_apellido" type="text" value="<?php echo $cne->apellido_1.' '.$cne->nombre_1?>" required placeholder="NOMBRE">
        </div>
        <div class="col-lg-4">
          <input class="form-control" name="id_ubch" type="hidden" value="<?php echo $id_ubch ?>">
        </div>

        <div class="col-lg-4">
          <input class="form-control" placeholder="TELEFONO CELULAR" type="number" name="telefono" type="text">
        </div>
        
        
        <div class="col-lg-12">
          <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-save fa-2x"></i></button>
        </div>
      </div>
    </div>
    <br>
  </form>
</div>