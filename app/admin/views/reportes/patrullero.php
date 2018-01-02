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
    <h3 class="panel-title text-muted"><i class="fa fa-handshake-o fa-2x"></i> REPORTE DEL PATRULLERO<b></b> </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12">
      <table>
        <tr>
          <td style="margin:center">
            <img width="100%" src="<?php echo baseUrl ?>assets/img/elecciones-municipales.png"/>
          </td>
        </tr>
      </table>
      <br/>
      <div class="pull-right">
        BARINAS <?php echo date('d/m/y'); ?>
      </div>
      <div class="panel-body">
        <div class="col-md-12 table-responsive">
          <form action="<?php echo baseUrlRole() ?>reportes/patrullero" method="GET">
            <?php echo Token::field() ?>
        <div class="row">
          <div id="previewBox" class="col-lg-12">
            <div class="panel panel-default animated bounceInDown">
              <div class="panel-body">
                <div class="col-lg-1">
                  <i class="fa fa-info fa-3x text-primary" aria-hidden="true"></i>
                </div>
                <div class="col-lg-11 alerta">
                  <button type='button' id="closeButton" class='close' onclick="close_div()">×</button>
                  <h6>
                  Seleccione Municipio y Parroquia.
                  </h6>
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
            <form action="<?php echo baseUrlRole() ?>reportes/patrullero" method="GET">
              <?php echo Token::field() ?>
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <?php
                    $municipios = \App\MunicipioCne::all();
                    ?>
                    <select id="municipioSelect" class="form-control" name="id_municipio"/>
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
                <div class="col-lg-1">
                  <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-search fa-1x"></i></button>
                </div>
              </form>
            </div>
            <br><br>
            <div class="row">
              <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
                <thead>
                  <tr>
                    <th width="20%">Nombre</th>
                    <th width="8%">Cédula</th>
                    <th width="10%">Municipio</th>
                    <th width="10%">Parroquia</th>
                    <th width="20%">Dirección</th>
                    <th width="10%">Télefono 1</th>
                    <th width="10%">Télefono 2</th>
                    <th width="15%">N° Patrullados</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php foreach ($unox10 as $key => $u): ?>
                  <tr>
                    <td><?php echo $u->nombre ?> <?php echo $u->apellido ?></td>
                    <td><?php echo $u->cedula ?></td>
                    <td><?php echo $u->municipio->nombre ?></td>
                    <td>
                      <?php
                      $parroquia = \App\ParroquiaCne::where('id_municipio',$u->id_municipio)->where('id_parroquia',$u->id_parroquia)->first();
                      echo $parroquia->nombre;
                      ?>
                    </td>
                    <td><?php echo $u->direccion ?></td>
                    <td><?php echo $u->telefono_1 ?></td>
                    <td><?php echo $u->telefono_2 ?></td>
                    <td><?php echo $u->patrullados->count() ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            
            <div class="text-center">
            </div>
          </div>
        </div>
      </div>
    </div>