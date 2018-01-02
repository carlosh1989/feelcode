<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-university fa-2x"></i> REQUERIMEINTOS<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrl ?>admin/RegistroUbch/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> Agregar Requerimiento</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th width="" class="text-uppercase">Nombre Centro</th>
            <th width="" class="text-uppercase">Municipio</th>
            <th width="" class="text-uppercase">Parroquia</th>
            <th width="40%" class="text-uppercase">Direcciòn</th>
            <th width="" class="text-uppercase">Estatus</th>
            <th class="text-uppercase">Ver</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($requerimientos as $key => $u): ?>
          <tr>
            <td><?php echo $u->nombre_ubch ?></td>
            <td><?php echo $u->municipio->nombre ?></td>
            <td><?php echo $u->parroquia->nombre ?></td>
            <td><?php echo $u->direccion_ubch ?></td>
            <td><?php echo $u->parroquia->estatus ?></td>
            <td><a class="text-danger fa fa-search fa-2x" href="<?php echo baseUrl ?>admin/RegistroUbch/<?php echo $u->id_ubch ?>"></a></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($requerimientos); ?>
      </div>
    </div>
  </div>
</div>
</div>