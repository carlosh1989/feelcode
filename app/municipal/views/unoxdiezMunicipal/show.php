-<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i>x<i class="fa fa-users fa-2x"></i> PATRULLADOS
      <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>unoxdiezintegrantesMunicipal/create/<?php echo $id_ubch_registro_unoxdiez ?>"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> INGRESAR PATRULLADO</i></a>
      <b></b>  
  </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table id="myTable" class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th width="" class="text-uppercase">Nombre</th>
            <th class="text-uppercase">Apellido</th>
            <th class="text-uppercase">Cedula</th>
            <th class="text-uppercase">Telefono 1</th>
            <th class="text-uppercase">Telefono 2</th>
            <th class="text-uppercase">Dirección</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ahijados as $key => $u): ?>
          <tr>
            <td><?php echo $u->nombre ?></td>
            <td><?php echo $u->apellido ?></td>
            <td><?php echo $u->cedula ?></td>
            <td><?php echo $u->telefono_1 ?></td>
            <td><?php echo $u->telefono_2 ?></td>
            <td><?php echo $u->direccion ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($ahijados); ?>
      </div>
    </div>
  </div>
</div>
</div>