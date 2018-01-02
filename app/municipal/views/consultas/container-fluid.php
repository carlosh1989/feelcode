<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"> aja
        <?php if (isset($datos_cne) and $datos_cne): ?>
          <div class="">
            <h5 class="text-muted">
            <i class="fa fa-cubes text-danger"></i> DATOS DEL REP
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-user"></i> NOMBRE Y APELLIDO:</b></td>
                  <td class="text-uppercase"><?php echo ucwords($datos_cne->nombre_1) ?> <?php echo ucwords($datos_cne->nombre_2) ?> <?php echo ucwords($datos_cne->apellido_1) ?> <?php echo ucwords($datos_cne->apellido_2) ?> </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> CÉDULA:</b></td>
                  <td class="text-uppercase"><?php echo ucwords($datos_cne->cedula) ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-circle"></i> MUNICIPIO:</b></td>
                  <td class="text-uppercase"><?php echo $datos_cne->nombre_municipio ?></td>
                </tr>
                  <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-dot-circle-o"></i> PARROQUIA:</b></td>
                  <td class="text-uppercase"><?php echo $datos_cne->nombre_parroquia ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-dot-circle-o"></i> CÓDIGO CENTRO:</b></td>
                  <td class="text-uppercase"><?php echo $datos_cne->campo_4 ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-university"></i> CENTRO:</b></td>
                  <td class="text-uppercase"><?php echo $mesas_cne->nombre ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-trello"></i> MESA:</b></td>
                  <td class="text-uppercase"><?php echo $mesas_cne->mesa ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-map-marker"></i> DIRECCIÓN:</b></td>
                  <td class="text-uppercase"><?php echo $mesas_cne->direccion ?></td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
        <div class="col-md-3"> aja
       <?php if (isset($responsable_municipal) and $responsable_municipal): ?>
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-university text-danger"></i> RESPONSABLE MUNICIPAL
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-map-signs"></i> MUNICIPIO:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->municipio->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-phone-square"></i> TLF 1:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->telefono_1 ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-phone"></i> TLF 2:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->telefono_2 ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-envelope-o"></i> EMAIL:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->email ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> INSTITUCIÓN:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->instituciones->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> PARTIDO:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->partidos->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> ESTRUCTURA:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_municipal->estructuras->nombre ?></td>
                  </td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
        <div class="col-md-3"> aja
       <?php if (isset($responsable_clp) and $responsable_clp): ?> 
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-street-view text-danger"></i> RESPONSABLE CLP
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-map-signs"></i> MUNICIPIO:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_clp->municipio->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-phone-square"></i> TLF 1:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_clp->telefono_1 ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-phone"></i> TLF 2:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_clp->telefono_2 ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-envelope-o"></i> EMAIL:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_clp->email ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> INSTITUCIÓN:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_clp->instituciones->nombre ?></td>
                  </td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
        <div class="col-md-3"> aja
       <?php if (isset($patrullero) and $patrullero): ?>   
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-users text-danger"></i> PATRULLADOS
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                   <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-pie-chart"></i> CANTIDAD:</b></td>
                   <td>
                    <?php echo $patrullero->unoxdiez_ahijados->count() ?>
                  </td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
        <div class="col-md-3"> aja
        <?php if (isset($responsable_ubch) and $responsable_ubch): ?>   
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-file-text-o text-danger"></i> RESPONSABLE UBCH
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-map-signs"></i> MUNICIPIO:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->municipio->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-map-signs"></i> DIRECCIÓN:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->direccion ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-phone-square"></i> TLF 1:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->telefono_1 ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-phone"></i> TLF 2:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->telefono_2 ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-envelope-o"></i> EMAIL:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->email ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> INSTITUCIÓN:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->instituciones->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> PARTIDO:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->partidos->nombre ?></td>
                  </td>
                </tr>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> ESTRUCTURA:</b></td>
                  <td class="text-uppercase">
                    <td><?php echo $responsable_ubch->estructuras->nombre ?></td>
                  </td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
        <div class="col-md-3"> aja
         <?php if (isset($profesionales) and $profesionales): ?>
          <div class="">
            <h5 class="text-muted">
            <i class="fa fa-graduation-cap text-danger"></i> DATOS PROFESIONALES
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-id-card-o"></i> NOMBRE Y APELLIDO:</b></td>
                  <td class="text-uppercase"><?php echo ucwords($profesionales->nombres) ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-graduation-cap"></i> PROFESIÓN:</b></td>
                  <td class="text-uppercase"><?php echo $profesionales->profesion ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-building"></i> TRABAJA EN:</b></td>
                  <td class="text-uppercase"><?php echo $profesionales->dependencia ?></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-briefcase"></i> CARGO:</b></td>
                  <td class="text-uppercase"><?php echo $profesionales->cargo ?></td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
        </div>
        <div class="col-md-3"> aja
         <?php if (isset($cedula) and $cedula): ?>   
          <div class="">
            <h5 class="text-muted text-muted">
            <i class="fa fa-file-text-o text-danger"></i> DATOS DE BENEFICIOS
            </h5>
            <hr>
          </div>
            <table class="table table-user-information panel panel-default animated fadeIn">
              <tbody>
                <tr>
                  <td width="30%" class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-pencil"></i> FIRMO:</b></td>
                  <td class="text-uppercase">
                    <?php if ($firmo_contra): ?>
                    <td>Si</td>
                    <?php else: ?>
                    <td>No</td>
                    <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E9E9E9;"><b><i class="fa fa-home"></i> ASIGNADOS:</b></td>
                  <td class="text-uppercase">
                    <?php if ($hogares_asignados): ?>
                    <td>Si</td>
                    <?php else: ?>
                    <td>No</td>
                    <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-home"></i> POR ASIGNAR:</b></td>
                  <td class="text-uppercase">
                    <?php if ($hogares_por_asignar): ?>
                    <td>Si</td>
                    <?php else: ?>
                    <td>No</td>
                    <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-credit-card"></i> POR PENSIONAR:</b></td>
                  <td class="text-uppercase">
                    <?php if ($por_pensionar): ?>
                    <td>Si</td>
                    <?php else: ?>
                    <td>No</td>
                    <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="background: #E0E0E0;"><b><i class="fa fa-credit-card"></i> PENSIONADOS:</b></td>
                  <td class="text-uppercase">
                    <?php if ($ya_pensionados): ?>
                    <td>Si</td>
                    <?php else: ?>
                    <td>No</td>
                    <?php endif ?>
                  </td>
                </tr>
              </tbody>
            </table>
    <?php else: ?>
    <?php endif ?>
        </div>
      </div>
</div>