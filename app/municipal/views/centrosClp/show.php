<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <?php $user = User(); ?>
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i><i class="fa fa-university"></i> CENTROS DE CLP <?php echo strtoupper($centros[0]->clp->name) ?><b></b>
    <!--<a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>CuentasUbchMunicipal/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> CREAR CLP</i></a> --> </h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12 table-responsive">
      <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
        <thead>
          <tr class="">
            <!-- <th>ID</th> -->
            <th width="" class="text-uppercase">Nombre Centro</th>
            <th width="" class="text-uppercase">Dirección</th>
            <th width="" class="text-uppercase">Activo</th>
            <th width="5%" class="text-uppercase">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($centros): ?>
          <?php foreach ($centros as $key => $u): ?>
          <tr>
            <!--  <td class="text-uppercase"><?php echo $u->nombre ?></td> -->
            <td class="text-uppercase"><?php echo $u->nombre ?></td>
            <td class="text-uppercase"><?php echo $u->direccion ?></td>
            <?php if($u->ubch): ?>
            <td class="text-uppercase">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#siActivo<?php echo $u->id_centros_clp ?>"><i class="fa fa-check"></i> SI</button>
            </td>
            <!-- Modal -->
            <div id="siActivo<?php echo $u->id_centros_clp ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="col-lg-6">
                      <h5 class="modal-title"><i class="fa fa-user fa-2x text-danger"></i> Responsable</h5>
                      <p>
                        <b>Nombre:</b> <?php echo $u->ubch->responsable->nombre_apellido ?>
                        <br>
                        <b>C.I.:</b> <?php echo $u->ubch->responsable->cedula ?>
                        <br>
                        <b>Tlf 1:</b> <?php echo $u->ubch->responsable->telefono_1 ?>
                        <br>
                        <b>Asignado:</b> <?php echo $u->ubch->responsable->fecha_registro ?>
                        <br>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <h5 class="modal-title"><i class="fa fa-university fa-2x text-danger"></i> Centro</h5>
                      <p>
                        <b>Número Mesas:</b> <?php echo $u->ubch->numero_mesas ?>
                        <br>
                        <b>Cant. Electores:</b> <?php echo $u->ubch->cantidad_electores ?>
                        <br>
                        <b>Codigo CNE:</b> <?php echo $u->ubch->codigo_cne ?>
                        <br>
                      </p>
                    </div>      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <?php else: ?>
          <td class="text-uppercase">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#noActivo<?php echo $u->id_centros_clp ?>"><i class="fa fa-times"></i> NO</button>
          </td>
          <!-- Modal -->
          <div id="noActivo<?php echo $u->id_centros_clp ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title"><i class="fa fa-exclamation-triangle fa-2x text-warning"></i> Centro no activo</h5>
                  <p>
                    <hr>
                    <i class="fa fa-info-circle text-primary fa-2x" aria-hidden="true"></i>
                    El centro no esta activo, ya que no tiene responsable UBCH desigando. Si desea ingresarlo ahora, por favor ingrese <a style="font-size: 1.2em" class="text-danger" href="<?php echo baseUrlRole() ?>centrosMunicipal/busqueda/<?php echo $u->id_clp ?>/<?php echo $u->codigo_cne ?>">AQUI</a>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </td>
        <?php endif ?>
        <?php if ($u->ubch): ?>
        <td>
          <a class="btn btn-default" href="<?php echo baseUrlRole() ?>centrosMunicipal/<?php echo $u->ubch->id_ubch ?>"><i class="fa fa-search text-danger"></i></a>
        </td>
        <?php else: ?>
        <td>
          
        </td>
        <?php endif ?>
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