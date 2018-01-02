<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> CUENTAS CENTROS<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>CuentasUbchMunicipal/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> CREAR CUENTA</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th width="" class="text-uppercase">Responsable</th>
            <th width="" class="text-uppercase">usuario</th>
            <th width="" class="text-uppercase">parroquia</th>
            <th width="" class="text-uppercase">Creado</th>
           <!-- <th width="" class="text-uppercase">Opciones</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if ($usuariosubch): ?>
          <?php foreach ($usuariosubch as $key => $u): ?>
          <tr>
            <td class="text-uppercase"><?php echo $u->name ?></td>
            <td class="text-uppercase"><?php echo $u->email ?></td>
            <td class="text-uppercase"><?php echo $u->parroquia->nombre ?></td>
            <td class="text-uppercase"><?php echo $u->created_at ?></td>
           <!-- <td class="text-uppercase">
            </td> -->
          </tr>
          <?php endforeach ?>
          <?php else: ?>
          
          <?php endif ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($usuariosubch); ?>
      </div>
    </div>
  </div>
</div>
</div>