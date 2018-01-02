<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> MUNICIPALES<b></b>
      <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>cuentasMunicipales/busqueda"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> CREAR MUNICIPAL</i></a
    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <!-- <th>ID</th> -->
            <th width="" class="text-uppercase">Responsable</th>
            <th width="" class="text-uppercase">Cedula</th>
            <th width="" class="text-uppercase">Usuario</th>
            <th width="" class="text-uppercase">Municipio</th>
            <th width="" class="text-uppercase">Telefono</th>
            <th width="" class="text-uppercase">Email</th>
            <th width="" class="text-uppercase">Cant. Clp</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($usuariosmunicipal): ?>
          <?php foreach ($usuariosmunicipal as $key => $u): ?>
          <tr>
              <?php 
              $datos_municipal = \App\MunicipalResponsable::find($u->id_municipal);
              ?>
            <!--  <td class="text-uppercase"><?php echo $u->name ?></td> -->
            <td class="text-uppercase"><?php echo $u->name ?></td>
            <td class="text-uppercase"><?php echo $datos_municipal->cedula ?></td>
            <td class="text-uppercase"><?php echo $u->email ?></td>
            <td class="text-uppercase"><?php echo $u->municipio->nombre ?></td>
            <td class="text-uppercase"><?php echo $datos_municipal->telefono_1 ?></td>
            <td class="text-uppercase"><?php echo $datos_municipal->email ?></td>
            <td class="text-uppercase"><?php echo $u->responsables_clp->count() ?></td>
          </tr>
          <?php endforeach ?>
          <?php else: ?>
          <?php endif ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($usuariosmunicipal); ?>
      </div>
    </div>
  </div>
</div>
</div>
