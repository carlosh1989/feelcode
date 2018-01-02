<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
//alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>RegistroUbch/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
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
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> INGRESAR CUENTA UBCH</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>CuentasUbch" method="POST">
      <?php echo Token::field() ?>
      <div class="row">
        <div class="col-lg-4">
          <input class="form-control" type="text" name="name" placeholder="NOMBRE Y APELLIDO">
        </div>
        <div class="col-lg-4">
          <select id="" class="form-control" name="id_instituciones" required/>
            <option value="">ORGANISMOS</option>
            <?php foreach ($organismos as $key => $or): ?>
            <option value="<?php echo $or->id_instituciones ?>"><?php echo $or->nombre ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-lg-4">
          <select class="form-control" name="id_ubch" required>
            <option value="">CENTRO</option>
            <?php foreach ($centros as $key => $centro): ?>
            <option value="<?php echo $centro->id_ubch ?>"><?php echo $centro->nombre_ubch ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <h4 class="text-muted text-center text-uppercase">
          Datos de acceso
          </h4>
        </div>
        <div class="col-lg-4">
          <input class="form-control" type="text" name="email" placeholder="USUARIO">
        </div>
        <div class="col-lg-4">
          <input class="form-control" id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'tiene que tener minimo 6 caracteres.' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="CLAVE" required>
        </div>
        <div class="col-lg-4">
          <input class="form-control" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'La clave no coinciden.' : '');" placeholder="VERIFICAR CLAVE" required>
        </div>
      </div>
      <br>
      <div class="col-lg-12">
        <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-save fa-2x"></i></button>
      </div>
    </div>
  </div>
  <br>
</form>
</div>
<script>
$("#formCheckPassword").validate({
rules: {
password: {
required: true,
minlength: 6,
maxlength: 10,
} ,
cfmPassword: {
equalTo: "#password",
minlength: 6,
maxlength: 10
}
},
messages:{
password: {
required:"the password is required"
}
}
});
</script>