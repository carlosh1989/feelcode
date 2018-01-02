<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
//alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>reportes/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
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
$.get("<?php echo baseUrlRole() ?>reportes/centrosBusqueda", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-file fa-2x"></i> REPORTES<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <br>
      <form action="http://201.249.75.155/reportes_recomand/index.php" method="GET" target="_blank">
        <?php echo Token::field() ?>
        <div class="row">
          <div class="col-lg-3">
            <div class="form-group">
              <select id="" class="form-control" name="id_municipio"/>
                <?php
                $user = User();
                $municipio = \App\MunicipioCne::where('id_municipio',$user['id_municipio'])->first();
                ?>
                <option value="<?php echo $municipio->id_municipio ?>">MUNICIPIO <?php echo $municipio->nombre ?></option>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
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
          <div class="col-lg-3">
            <div class="form-group">
              <select id="MesasSelect" class="form-control" name="id_mesa"/>
              </select>
            </div>
          </div>
          <div class="col-lg-1">
            <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-search fa-1x"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>