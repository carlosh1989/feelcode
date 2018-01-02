<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i>x<i class="fa fa-users fa-2x"></i> Ahijados<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>unoxdiezintegrantesAdmin/create/<?php echo $padrino->id_ubch_registro_unoxdiez ?>"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> Agregar Ahijado</i></a>    </h3>
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
            <th class="text-uppercase">Ver</th>
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
            <td style="text-align: center;" width="5%">
              <?php echo Token() ?>
              <a class="text-danger fa fa-times fa-1x" href="<?php echo baseUrlRole() ?>unoxdiezintegrantesAdmin/<?php echo $u->id_ubch_registro_unoxdiez_integrantes ?>/delete?id_ubch_registro_unoxdiez=<?php echo $u->id_ubch_registro_unoxdiez ?>"></a>
            </td>
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