<div class="container">
  <div class="card-panel darken-2 z-depth-2">
    <h5 class="red-text"><i class="fa fa-search-plus"></i> CONSULTA</h5>
    <br>
    <form action="<?php echo baseUrl ?>home/consultas/index" method="POST" class="col s12">
      <?php echo Token::field() ?>
      <div class="row">
        <div class="input-field col s6 m4">
          <i class="fa fa-user red-text prefix"></i>
          <input name="cedula" id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">CEDULA</label>
        </div>
        <div class="input-field col s6 m3">
          <button class="btn waves-effect waves-light red" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
  </div>
  <?php if (isset($profesionales) and $profesionales): ?>
  <div class="col s12 m12 darken-2 z-depth-2 animated bounceInDown">
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
          <h5 class="text-center red-text"><i class="fa fa-graduation-cap red-text" aria-hidden="true"></i>
          PROFESIONAL</h5>
          <div class="col-lg-6 animated fadeIn">
            <table class="">
              <tbody>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-id-card-o"></i> NOMBRE Y APELLIDO:</b></td>
                  <td><?php echo $profesionales->nombres ?> <?php echo $profesionales->apellidos ?></td>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-graduation-cap"></i> PROFESIÓN:</b></td>
                  <td><?php echo $profesionales->profesion
                   ?></td>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-briefcase"></i> CARGO:</b></td>
                  <td><?php echo $profesionales->cargo
                   ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php else: ?>
  <?php endif ?>

  <?php if (isset($cedula) and $cedula): ?>
  <div class="col s12 m12 darken-2 z-depth-2 animated bounceInUp">
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
          <h5 class="text-center red-text"><i class="fa fa-file-text-o red-text" aria-hidden="true"></i>
          RESULTADOS</h5>
          <div class="col-lg-6 animated fadeIn">
            <table class="">
              <tbody>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-pencil"></i> FIRMO:</b></td>
                  <?php if ($firmo_contra): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-home"></i> HOGARES ASIGNADOS:</b></td>
                  <?php if ($hogares_asignados): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-home"></i> HOGARES POR ASIGNAR:</b></td>
                  <?php if ($hogares_por_asignar): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-credit-card"></i> POR PENSIONAR:</b></td>
                  <?php if ($por_pensionar): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-credit-card"></i> PENSIONADOS:</b></td>
                  <?php if ($ya_pensionados): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php else: ?>
  <?php endif ?>

  <?php if (isset($responsable_municipal) and $responsable_municipal): ?>
  <div class="col s12 m12 darken-2 z-depth-2 animated bounceInUp">
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
          <h5 class="text-center red-text"><i class="fa fa-file-text-o red-text" aria-hidden="true"></i>
          RESPONSABLE MUNICIPAL</h5>
          <div class="col-lg-6 animated fadeIn">
            <table class="">
              <tbody>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-pencil"></i> FIRMO:</b></td>
                  <?php if ($firmo_contra): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-home"></i> HOGARES ASIGNADOS:</b></td>
                  <?php if ($hogares_asignados): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-home"></i> HOGARES POR ASIGNAR:</b></td>
                  <?php if ($hogares_por_asignar): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-credit-card"></i> POR PENSIONAR:</b></td>
                  <?php if ($por_pensionar): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
                <tr class="grey-text text-darken-2">
                  <td width="40%" ><b><i class="fa fa-credit-card"></i> PENSIONADOS:</b></td>
                  <?php if ($ya_pensionados): ?>
                  <td>Si</td>
                  <?php else: ?>
                  <td>No</td>
                  <?php endif ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php else: ?>
  <?php endif ?>


