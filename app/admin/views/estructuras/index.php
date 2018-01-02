<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-sitemap fa-2x"></i> estructuras<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>estructuras/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> Agregar estructura</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <th width="" class="text-uppercase">estructura</th>
            <th class="text-uppercase">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach (Paginator($estructuras) as $key => $u): ?>
          <tr>
            <td><?php echo $u->nombre ?></td>
            <td width="5%">
              <form action="<?php echo baseUrlRole() ?>estructuras/<?php echo $u->id_estructura ?>/delete" method="POST">
                <?php echo Token() ?>
                <a class="text-primary fa fa-pencil fa-2x" href="<?php echo baseUrlRole() ?>estructuras/<?php echo $u->id_estructura ?>/edit"></a>
                <a class="text-danger fa fa-times fa-2x" href="#" onclick="this.parentNode.submit(); return false;"></a>
              </form>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <?php echo Paginator($estructuras); ?>
      </div>
    </div>
  </div>
</div>
</div>