<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-university fa-2x"></i> Registro Ubch<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>ProblematicasUbchAdmin/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> Agregar Problematica</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th width="" class="text-uppercase">Tipo</th>
            <th width="" class="text-uppercase">Problematica</th>
            <th width="" class="text-uppercase">Municipio</th>
            <th width="" class="text-uppercase">Parroquia</th>
            <th width="40%" class="text-uppercase">Direcciòn</th>
            <th width="" class="text-uppercase">Estatus</th>
            <th class="text-uppercase">Ver</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($problematicas as $key => $p): ?>
          <tr>
            <td><?php echo $p->tipo->nombre ?></td>
            <td><?php echo $p->observaciones ?></td>
            <td><?php echo $p->municipio->nombre ?></td>
            <td><?php echo $p->parroquia->nombre ?></td>
            <td><?php echo $p->direccion ?></td>
            <td><?php echo $p->parroquia->estatus ?></td>
            <td><a class="text-danger fa fa-search fa-2x" href="<?php echo baseUrlRole() ?>ProblematicasUbchAdmin/<?php echo $p->id_problematica_ubch ?>"></a></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($problematicas); ?>
      </div>
    </div>
  </div>
</div>
</div>
