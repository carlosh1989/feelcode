<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> CLP<b></b>
      <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>CuentasUbchMunicipal/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> CREAR CLP</i></a>
    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <!-- <th>ID</th> -->
            <th width="" class="text-uppercase">Nombre Centro</th>
            <th width="" class="text-uppercase">parroquia</th>
            <th width="" class="text-uppercase">Cant. Centros</th>
            <th width="25%" class="text-uppercase">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($centros): ?>
          <?php foreach ($centros as $key => $u): ?>
          <tr>
            <!--  <td class="text-uppercase"><?php echo $u->nombre ?></td> -->
            <td class="text-uppercase"><?php echo $u->nombre ?></td>
            <td class="text-uppercase"></td>
            <td class="text-uppercase"></td>
              <td>
                <a href="<?php echo baseUrlRole() ?>centrosClp/create/<?php echo $u->id_clp ?>" class="btn"><i class="fa fa-university"></i> Asignar centro</a>
                <a href="<?php echo baseUrlRole() ?>centrosClp/<?php echo $u->id_clp ?>" class="btn text-danger"><i class="text-danger fa fa-search fa-1x"></i> Ver centros</a>
              </td>
          </tr>
          <?php endforeach ?>
          <?php else: ?>
          
          <?php endif ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($centros); ?>
      </div>
    </div>
  </div>
</div>
</div>
