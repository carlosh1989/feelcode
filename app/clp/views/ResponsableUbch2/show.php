<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i> SOLICITANTE<b> <?php echo strtoupper($solicitante->nombre_apellido) ?></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6 animated fadeIn table-responsive">
        <table class="table table-user-information panel panel-default animated fadeIn">
          <tbody>
            <tr>
              <td width="50%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Nombre:</b></td>
              <td class="text-uppercase"><?php echo ucwords($solicitante->nombre_apellido) ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-address-card"></i> Cédula:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->cedula ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-envelope"></i> Email:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->email ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-volume-control-phone"></i> Telefono n°1:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->telefono1 ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-mobile"></i> Telefono n°2:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->telefono2 ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-map-pin"></i> Municipio:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->municipio->nombre ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-map-marker"></i> Parroquia:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->parroquia->nombre ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-location-arrow"></i> Urbanización/Barrio:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->urbanizacion_barrio ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa fa-map"></i> Avenida/Calle:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->avenida_calle ?></td>
            </tr>
            <tr>
              <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Casa/Edificio/Apartamento:</b></td>
              <td class="text-uppercase"><?php echo $solicitante->casa_edificio_apartamento ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6 animated fadeIn panel panel-default animated">
        <div class="">
          <h5 class="text-muted text-primary">
          <i class="fa fa-file"></i> SOLICITUDES 
          <a class="btn btn-default pull-right" href="<?php echo baseUrl ?>admin/solicitudes/create/<?php echo $solicitante->id ?>"><i class="fa fa-files-o text-primary"></i> Agregar Solicitud</a>
          </h5>
          <hr>
        </div>
        <div class="">
        <table class="table table-striped table-condensed table-responsive animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th class="text-uppercase" width="5%" class="text-uppercase">COD</th>
              <th class="text-uppercase" width="35%" class="text-uppercase">Fecha</th>
              <th class="text-uppercase" class="text-uppercase">Paso Actual</th>
              <th class="text-uppercase" width="10%" class="text-uppercase">Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($ubch->responsables): ?>
            <?php foreach (Paginator($ubch->responsables,4) as $c): ?>
            <tr>
              <td>
                <button class="btn btn-default"><?php echo $c->cod ?></button>
              </td>
              <td class="text-uppercase">
              <?php  
              list($date,$hora) = explode(' ',$c->fecha_hora_asignado_consignado);
              list($ano,$mes,$dia) = explode('-',$date);
              $fecha = $dia.'/'.$mes.'/'.$ano;
              ?>
                <?php echo $fecha ?>
              </td>
              <td class="text-uppercase" class="text-uppercase">
                
                <?php if ($c->pasos->paso == 1): ?>
                <button class="btn btn-info btn-default">Registrado</button>
                <?php endif ?>
                <?php if ($c->pasos->paso == 2): ?>
                <button class="btn btn-default"><i class="fa fa-clipboard" aria-hidden="true"></i>
                Asignado y Consignado</button>
                <?php endif ?>
                <?php if ($c->pasos->paso == 3): ?>
                <button class="btn btn-default">Asignado</button>
                <?php endif ?>
                <?php if ($c->pasos->paso == 4): ?>
                <button class="btn btn-default">Procesado</button>
                <?php endif ?>
              </td>
              <td class="text-uppercase" class="text-uppercase" width="15%">
                <a class="btn btn-default" href="<?php echo baseUrl ?>admin/solicitudes/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <h5>No tiene solicitudes.</h5>
            <?php endif ?>
          </tbody>
        </table>
        <div class="text-center">
          <?php echo Paginator($solicitante->solicitudes,4) ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>