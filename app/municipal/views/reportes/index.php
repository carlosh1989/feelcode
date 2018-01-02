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
<style>
.responsive-video {
position: relative;
padding-bottom: 56.25%;
padding-top: 60px; overflow: hidden;
}
.responsive-video iframe,
.responsive-video object,
.responsive-video embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
overflow-y: scroll
}


</style>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-file fa-2x"></i> REPORTES TOTALES<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <br>
      <form action="<?php echo baseUrlRole() ?>reportes/index" method="GET">
        <?php echo Token::field() ?>
        <div class="row">
          <div class="col-lg-3">
            <div class="form-group">
              <select id="municipioSelect" class="form-control" name="id_municipio"/>
                <?php
                $municipios = \App\MunicipioCne::all();
                ?>
                <option value="">MUNICIPIOS</option>
                <?php foreach ($municipios as $key => $municipio): ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <select id="ParroquiaSelect" class="form-control" name="id_parroquia"/>
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
        </form>
      </div>
      <br>
      <?php  
      if(!isset($id_municipio))
      {
        $id_municipio = "";
      }

      if(!isset($id_parroquia))
      {
        $id_parroquia = "";
      }

      if(!isset($id_mesa))
      {
        $id_mesa = "";
      }
      ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="responsive-video">
            <iframe frameborder=0 src="http://201.249.75.155/reportes_recomand/index.php?id_municipio=<?php echo $id_municipio ?>&id_parroquia=<?php echo $id_parroquia ?>&id_mesa=<?php echo $id_mesa ?>"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>