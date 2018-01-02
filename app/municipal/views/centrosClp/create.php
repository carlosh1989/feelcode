<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
//alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>centrosClp/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
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
//alert(idParroquia);
$.get("<?php echo baseUrlRole() ?>centrosClp/centrosBusqueda", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <?php
    $user = User();
    ?>
    <h3 class="panel-title text-muted text-uppercase"><i class="fa fa-university fa-2x"></i> ASIGNAR CENTRO</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>centrosClp" method="POST">
      <?php echo Token::field() ?>
      <input type="hidden" name="id_municipio" value="<?php echo $id_municipio ?>">
      <input type="hidden" name="id_clp" value="<?php echo $id_clp ?>">
      <div class="row">
        <div id="previewBox" class="col-lg-12">
          <div class="panel panel-default animated bounceInDown">
            <div class="panel-body">
              <div class="col-lg-1">
                <i class="fa fa-exclamation-triangle fa-3x text-warning" aria-hidden="true"></i>
              </div>
              <div class="col-lg-11 alerta">
                Los centros que asigne seran anclados por defecto al responsable de CLP. Acción no reversible.
                <button type='button' id="closeButton" class='close' onclick="close_div()">×</button>
              </div>
            </div>
          </div>
        </div>
        <script>
        $(document).ready(function() {
        $('#closeButton').on('click', function(e) {
        $('#previewBox').remove();
        $('#br').remove();
        });
        });
        </script>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <select id="ParroquiaSelect" class="form-control" name="id_parroquia" required/>
              <?php
              $user = User();
              $parroquias = \App\ParroquiaCne::where('id_municipio',$user['id_municipio'])->get();
              ?>
              <option>PARROQUIAS</option>
              <option></option>
              <?php foreach ($parroquias as $parroquia): ?>
              <option value="<?php echo $parroquia->id_parroquia ?>"><?php echo $parroquia->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="MesasSelect" class="form-control" name="id_mesa" required/>
            </select>
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