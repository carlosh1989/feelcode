<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>votosMesa/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
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
$.get("<?php echo baseUrlRole() ?>votosMesa/centrosBusqueda", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-archive fa-2x"></i> VOTO * HORA<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <br>
      <form action="<?php echo baseUrlRole() ?>votosMesa/index" method="GET">
        <?php echo Token::field() ?>
        <div class="row">
          <div id="previewBox" class="col-lg-12">
            <div class="panel panel-default animated bounceInDown">
              <div class="panel-body">
                <div class="col-lg-1">
                  <i class="fa fa-warning fa-3x text-warning" aria-hidden="true"></i>
                </div>
                <div class="col-lg-11 alerta">
                  <button type='button' id="closeButton" class='close' onclick="close_div()">×</button>
                  <h5>
                  Seleccione Municipio, Parroquia y Centro, y luego cargue o actualice los votos de candidatos de acuerdo a la ultima hora la cual esta en formato militar.
                  </h5>
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
                <th width="" class="text-uppercase"> Comparación</th>
                <th width="15%" class="text-uppercase">Ultimos votos </th>
                <th width="25%" class="text-uppercase">Votos Actuales</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?php echo baseUrlRole() ?>votosMesa/subida" method="POST">
                <?php if (isset($candidatos) and $candidatos): ?>
                <?php foreach ($candidatos as $key => $u): ?>
                <tr>
                  <td class="text-uppercase">
                  <?php echo $u->nombre_apellido ?></td>
                  <td>
                    <?php
                    $ultimos_votos = \App\VotoDetalleMesa::where('id_candidatos',$u->id_candidatos)
                    ->where('id_municipio',$id_municipio)
                    ->where('id_parroquia',$id_parroquia)
                    ->where('id_mesa',$id_mesa)
                    ->where('estatus','>',0)
                    ->orderBy('id_votos_detalle','DESC')->first();
                    //Arr($ultimos_votos);
                    ?>
                    <?php if ($ultimos_votos): ?>
                    <?php echo $ultimos_votos->cantidad ?>
                    <?php else: ?>
                    
                    <?php endif ?>
                  </td>
                  <td class="text-uppercase">
                    <?php echo Token::field() ?>
                    <input type="number" min="0" name="cantidad[]" placeholder="Num. Votos" required>
                    <!-- <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#cargarVotos<?php echo $u->id_votos ?>"><i class="fa fa-upload"></i></button> -->
                  </td>
                  <td class="text-uppercase">
                    
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
              <div class="col-lg-3"></div>
              <div class="col-lg-2">
                <?php
                $ultimos_votos = \App\VotoDetalleMesa::where('id_candidatos',$candidatos[0]->id_candidatos)
                ->where('id_municipio',$id_municipio)
                ->where('id_parroquia',$id_parroquia)
                ->where('id_mesa',$id_mesa)
                ->where('estatus','>',0)
                ->orderBy('id_votos_detalle','DESC')->first(); ?>
                <?php $ultima_hora = $ultimos_votos->hora + 1 ; ?>
                <?php //echo $ultima_hora; ?>
                <select class="form-control" name="hora" required>
                  <option value="">HORA DE SUBIDA</option>
                  <?php
                  for ($i=$ultima_hora; $i <=  24; $i++) {
                  if($i<10){
                  echo $i='0'.$i;
                  }
                  ?>
                  <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-4">
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