<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>votosCentroMesa/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
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
$.get("<?php echo baseUrlRole() ?>votosCentroMesa/centrosBusqueda", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-archive fa-2x"></i> TOTALIZACIÓN<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <br>
      <form action="<?php echo baseUrlRole() ?>votosCentroMesa/index" method="GET">
        <div class="row">
          <div id="previewBox" class="col-lg-12">
            <div class="panel panel-default animated bounceInDown">
              <div class="panel-body">
                <div class="col-lg-1">
                  <i class="fa fa-info fa-3x text-primary" aria-hidden="true"></i>
                </div>
                <div class="col-lg-11 alerta">
                  Seleccione Municipio, paroquia y centro, y luego cargue los votos segun mesa.
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
          <div class="col-lg-3">
            <div class="form-group">
              <select id="" class="form-control" name="id_parroquia" required/>
                <?php
                $user = User();
                $municipio = \App\MunicipioCne::where('id_municipio',$user['id_municipio'])->first();
                ?>
                <option>MUNICIPIO <?php echo $municipio->nombre ?></option>
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
              <select id="MesasSelect" class="form-control" name="id_mesa" required/>
              </select>
            </div>
          </div>
          <div class="col-lg-1">
            <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-search fa-1x"></i></button>
          </div>
        </div>
      </form>
      <br><br>
      <div class="row">
        <?php if (isset($centro->nombre)): ?>
        <div class="col-lg-12">
          <h4 class="text-danger text-left"><?php echo $centro->nombre ?></h4>
          <hr>
        </div>
        <?php else: ?>
        
        <?php endif ?>
        <div class="col-lg-12">
          <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
            <thead>
              <tr class="">
                <!-- <th>ID</th> -->
                <th width="" class="text-uppercase"> Candidato</th>
                <th>Mesas</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?php echo baseUrlRole() ?>votosCentroMesa/test" method="POST">
                <?php echo Token::field() ?>
                <?php if (isset($candidatos) and $candidatos): ?>
                <?php foreach ($candidatos as $key => $u): ?>
                <tr>
                  <td class="text-uppercase"> <?php echo $u->nombre_apellido ?></td>
                  <td class="text-uppercase">
                    <?php
                    //$n=0;
                    $centros =\App\MesasCne::where('codigo_cne',$centro->codigo_cne)->get();
                    $conteo_mesas = $centros->count();
                    $n_mesa = $conteo_mesas;
                    for($i=0; $i < $n_mesa ; $i++) { ?>
                    
                    <input type="number" min="0" name="mesa_<?php echo $i+1; ?>[]" placeholder="mesa <?php echo $i+1; ?>" style="width:80px;" required>
                    
                    <?php }  ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php else: ?>
                <?php endif ?>
              </tbody>
            </table>
            <input type="hidden" name="id_municipio" value="<?php echo $id_municipio ?>">
            <input type="hidden" name="id_parroquia" value="<?php echo $id_parroquia ?>">
            <input type="hidden" name="id_mesa" value="<?php echo $id_mesa ?>">
            <div class="col-lg-12">
              <div class="col-lg-9"></div>
              <div class="col-lg-3">
                <button type="submit" class="btn btn-danger btn-lg btn pull-center fa-1x" data-toggle="modal" data-target="#cargarVotos"><i class="fa fa-upload"></i> Subir votos</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br><br>
  </div>
</div>
</div>
</div>