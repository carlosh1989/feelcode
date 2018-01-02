<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> PATRULLADOS<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>patrullados/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> INGRESAR PATRULLADO</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th width="" class="text-uppercase">Cedula</th>
            <th width="" class="text-uppercase">Nombre</th>
            <th width="" class="text-uppercase">Apellido</th>
            <th width="" class="text-uppercase">telefono 1</th>
            <th width="" class="text-uppercase">telefono 2</th>
            <th width="" class="text-uppercase">Dirección</th>
            <th width="" class="text-uppercase">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($patrullados): ?>
          <?php foreach ($patrullados as $key => $u): ?>
          <tr>
            <td class="text-uppercase"><?php echo $u->cedula ?></td>
            <td class="text-uppercase"><?php echo $u->nombre ?></td>
            <td class="text-uppercase"><?php echo $u->apellido ?></td>
            <td class="text-uppercase"><?php echo $u->telefono_1 ?></td>
            <td class="text-uppercase"><?php echo $u->telefono_2 ?></td>
            <td class="text-uppercase"><?php echo $u->direccion ?></td>
            <td style="text-align: center" class="text-uppercase">
              <a class="fa fa-times text-danger" href="<?php echo baseUrlRole() ?>patrullados/<?php echo $u->id_ubch_registro_unoxdiez_integrantes ?>/delete"></a>
            </td>
          </tr>
          <?php endforeach ?>
          <?php else: ?>
          
          <?php endif ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($patrullados); ?>
      </div>
    </div>
  </div>
</div>
</div>