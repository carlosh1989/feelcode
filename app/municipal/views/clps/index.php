<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> CLP<b></b>
  <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>CuentasUbchMunicipal/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> CREAR CLP</i></a
  </h3>
</div>
<div class="panel-body">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
      <thead>
        <tr class="">
          <!-- <th>ID</th> -->
          <th width="" class="text-uppercase">Responsable Clp</th>
          <th width="" class="text-uppercase">Parroquia</th>
          <th width="15%" class="text-uppercase">Cant. Centros</th>
          <th width="40%" class="text-uppercase">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($clps): ?>
        <?php foreach ($clps as $key => $u): ?>
        <tr>
          <!--  <td class="text-uppercase"><?php echo $u->id ?></td> -->
          <td class="text-uppercase"><?php echo $u->name ?></td>
          <td class="text-uppercase"><?php echo $u->parroquia->nombre ?></td>
          <td class="text-uppercase">
            <?php if ($u->centros_clp->count() > 0): ?>
            <a class="btn btn-default animated flash text-danger" href=""><?php echo $u->centros_clp->count() ?></a>
            <?php else: ?>
            <a class="btn btn-default animated flash text-danger" href=""><?php echo $u->centros_clp->count() ?></a>
            <?php endif ?>
          </td>
          <td>
            <a href="<?php echo baseUrlRole() ?>centrosClp/create/<?php echo $u->id_clp ?>" class="btn"><i class="fa fa-university"></i> Asignar centro</a>
            <?php if (!$u->centro_clp): ?>
            <?php else: ?>
            <a href="<?php echo baseUrlRole() ?>centrosClp/<?php echo $u->id_clp ?>" class="btn text-danger"><i class="text-danger fa fa-search fa-1x"></i> Ver centros</a>
            <?php endif ?>
          </td>
        </tr>
        <?php endforeach ?>
        <?php else: ?>
        
        <?php endif ?>
      </tbody>
    </table>
    <div class="text-center">
      <?php echo Paginator($clps); ?>
    </div>
  </div>
</div>
</div>
</div>