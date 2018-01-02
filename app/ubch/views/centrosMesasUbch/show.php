<div id="panel" class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-university fa-2x"></i> PROBLEMATICAS DE CENTRO<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6 animated fadeIn animated">
        <div class="col-lg-12">
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-file"></i> DATOS DE MESA
            </h5>
            <br>
          </div>
          <div class="">
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> N° Mesa:</b></td>
                  <td class="text-uppercase"><?php echo ucwords($mesa->mesa) ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-barcode"></i> COD:</b></td>
                  <td class="text-uppercase"><?php echo $mesa->codigo_mesa ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-sort-numeric-asc"></i> Cant. Electores:</b></td>
                  <td class="text-uppercase"><?php echo $mesa->cant_electores ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-book"></i> Tomo:</b></td>
                  <td class="text-uppercase"><?php echo $mesa->tomo ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-wifi"></i> Tecnologia:</b></td>
                  <td class="text-uppercase"><?php echo $mesa->tecnologia ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> Desde:</b></td>
                  <td class="text-uppercase"><?php echo $mesa->desde ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> Hasta:</b></td>
                  <td class="text-uppercase"><?php echo $mesa->hasta ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa fa-search"></i> Estatus:</b></td>
                  <td class="text-uppercase">
                    <?php if ($mesa->estatus): ?>
                    <?php if ($mesa->estatus == 1): ?>
                    <button class="btn btn-success"><i class="fa fa-check"></i> ACTIVA</button>
                    <?php else: ?>
                    <button class="btn btn-danger"><i class="fa fa-check"></i> INACTIVA</button>
                    <?php endif ?>
                    <?php else: ?>
                    <button class="btn btn-danger"><i class="fa fa-times"></i> INACTIVA</button>
                    <?php endif ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6 animated fadeIn animated">
        <div class="col-lg-12">
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-file"></i> TESTIGOS
            <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>centrosTestigosUbch/busqueda/<?php echo $mesa->id_mesas_ubch ?>"><i class="fa fa-plus text-primary"></i></a>
            </h5>
            <br>
          </div>
          <div class="col-md-12 table-responsive panel panel-default">
            <table id="myTable" class="table table-striped table-condensed animated fadeIn" data-striped="true">
              <thead>
                <tr class="">
                  <th width="" class="text-uppercase">Cedula</th>
                  <th class="text-uppercase">Nombre y Apellido</th>
                  <th class="text-uppercase">Posición</th>
                  <th class="text-uppercase">Partido</th>
                  <th class="text-uppercase">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($testigos as $key => $u): ?>
                <tr>
                  <td><?php echo $u->cedula ?></td>
                  <td><?php echo $u->nombre ?> <?php echo $u->apellido ?></td>
                  <td>
                    <?php if ($u->posicion == 1): ?>
                    TESTIGO REGIONAL
                    <?php endif ?>
                    <?php if ($u->posicion == 2): ?>
                    TESTIGO MUNICIPAL
                    <?php endif ?>
                    <?php if ($u->posicion == 3): ?>
                    TESTIGO CENTRO
                    <?php endif ?>
                  </td>
                  <td><?php echo $u->partido->nombre ?></td>
                  <td style="text-align: center;" width="5%">
                    <a class="text-primary fa fa-print fa-2x" href="<?php echo baseUrlRole() ?>centrosTestigosUbch/certificadoPDF/<?php echo $u->id_mesas_ubch_testigos ?>"></a>
                    <a class="text-danger fa fa-times fa-1x pull-right" href="<?php echo baseUrlRole() ?>centrosTestigosUbch/<?php echo $u->id_mesas_ubch_testigos ?>/delete?id_mesa=<?php echo $mesa->id_mesas_ubch ?>"></a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>