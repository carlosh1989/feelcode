<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>votos/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
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
$.get("<?php echo baseUrlRole() ?>votos/centrosBusqueda", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-archive fa-2x"></i> VOTOS<b></b>
  <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>CuentasUbchMunicipal/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> ENLAZAR CANDIDATO</i></a
  </h3>
</div>
<div class="panel-body">
  <div class="col-md-12 table-responsive">
    <br>
    <form action="<?php echo baseUrlRole() ?>votos/index" method="GET">
      <?php echo Token::field() ?>
      <div class="row">
        <div id="previewBox" class="col-lg-12">
          <div class="panel panel-default animated bounceInDown">
            <div class="panel-body">
              <div class="col-lg-1">
                <i class="fa fa-info fa-3x text-primary" aria-hidden="true"></i>
              </div>
              <div class="col-lg-11 alerta">
                Seleccione Municipio, paroquia y centro, y luego cargue o actualice los votos de candidatos hora por hora.
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
    <br><br>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
          <thead>
            <tr class="">
              <!-- <th>ID</th> -->
              <th width="" class="text-uppercase"> Candidato</th>
              <th width="" class="text-uppercase">Municipio</th>
              <th width="" class="text-uppercase">Parroquia</th>
              <th width="15%" class="text-uppercase">Centro </th>
              <th width="25%" class="text-uppercase">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($candidatos): ?>
            <?php foreach ($candidatos as $key => $u): ?>
            <tr>
              <td class="text-uppercase"><?php echo $u->candidato->nombre ?></td>
              <td class="text-uppercase"><?php echo $u->municipio->nombre ?></td>
              <td class="text-uppercase">
                <?php
                $parroquia = \App\ParroquiaCne::all();
                ?>
                <?php echo $parroquia->where('id_municipio',$u->municipio->id_municipio)->where('id_parroquia',$u->parroquia->id_parroquia)->first()->nombre; ?>
              </td>
              <td><?php echo $u->centros_clp->nombre ?></td>
              <td class="text-uppercase">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cargarVotos<?php echo $u->id_votos ?>"><i class="fa fa-upload"></i> CARGAR VOTOS</button>
              </td>
              <!-- Modal -->
              <div id="cargarVotos<?php echo $u->id_votos ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h5 class="modal-title"><i class="fa fa-database fa-2x text-danger"></i> VOTOS/HORA</h5>
                    </div>
                    <form action="<?php echo baseUrlRole() ?>votos/<?php echo $u->id_votos ?>" method="POST">
                      <?php echo Token::field() ?>
                      <input type="hidden" name="id_parroquia" value="<?php echo $u->id_parroquia ?>">
                      <input type="hidden" name="id_mesa" value="<?php echo $u->id_mesa ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="7am" name="h7am" value="<?php echo $u->h7am ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="8am" name="h8am" value="<?php echo $u->h8am ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="9am" name="h9am" value="<?php echo $u->h9am ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="10am" name="h10am" value="<?php echo $u->h10am ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="11am" name="h11am" value="<?php echo $u->h11am ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="12pm" name="h12pm" value="<?php echo $u->h12pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="1pm" name="h1pm" value="<?php echo $u->h1pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="2pm" name="h2pm" value="<?php echo $u->h2pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="3pm" name="h3pm" value="<?php echo $u->h3pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="4pm" name="h4pm" value="<?php echo $u->h4pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="5pm" name="h5pm" value="<?php echo $u->h5pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="6pm" name="h6pm" value="<?php echo $u->h6pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="7pm" name="h7pm" value="<?php echo $u->h7pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="8pm" name="h8pm" value="<?php echo $u->h8pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="9pm" name="h9pm" value="<?php echo $u->h9pm ?>"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="10pm" name="h10pm" value="<?php echo $u->h10pm ?>"></div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Actualizar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br><br>
  
  <div class="text-center">
    <?php echo Paginator($candidatos); ?>
  </div>
</div>
</div>
</div>
</div>