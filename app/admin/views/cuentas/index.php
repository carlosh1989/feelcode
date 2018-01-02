<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> CUENTAS<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>cuentas/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> CUENTAS</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th>ID</th>
            <th width="" class="text-uppercase">Nombre</th>
            <th width="" class="text-uppercase">Role</th>
            <th width="" class="text-uppercase">Municipio</th>
            <th width="" class="text-uppercase">Parroquia</th>
            <th width="" class="text-uppercase">Organismo</th>
            <th width="" class="text-uppercase">Usuario</th>
            <th width="" class="text-uppercase">Creado</th>
            <th width="" class="text-uppercase">Centro</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $key => $u): ?>
          <tr>
            <td class="text-uppercase"><?php echo $u->id ?></td>
            <td class="text-uppercase"><?php echo $u->name ?></td>
            <td class="text-uppercase"><?php echo $u->role ?></td>
            <td class="text-uppercase"><?php echo $u->municipio->nombre ?></td>
            
            <td class="text-uppercase">
              <?php if (isset($u->id_parroquia)): ?>
              <?php if ($u->id_parroquia > 0): ?>
              <?php $parroquia = \App\ParroquiaCne::all(); ?>
              <?php echo $parroquia->where('id_municipio',$u->municipio->id_municipio)->where('id_parroquia',$u->parroquia->id_parroquia)->first()->nombre; ?>
              <?php else: ?>
              
              <?php endif ?>
              <?php else: ?>
              
              <?php endif ?>
            </td>
            <td class="text-uppercase">
              <?php if (isset($u->instituciones->nombre)): ?>
              <?php echo $u->instituciones->nombre ?>
              <?php endif ?>
            </td>
            <td class="text-uppercase"><?php echo $u->email ?></td>
            <td class="text-uppercase"><?php echo $u->created_at ?></td>
            <td class="text-uppercase">
              <?php if ($u->centro): ?>
                <?php echo $u->centro->nombre_ubch ?>
              <?php else: ?>
                
              <?php endif ?>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($usuarios); ?>
      </div>
    </div>
  </div>
</div>
</div>