<link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/trumbowyg/dist/ui/trumbowyg.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="<?php echo baseUrl ?>assets/bower/trumbowyg/dist/trumbowyg.min.js"></script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-university fa-2x"></i> INGRESAR PROBLEMATICA</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>centrosProblematicasUbch/<?php echo $problema->id_problematica_ubch ?>" method="POST">
      <?php echo Token() ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="tipo" required/>
              <?php if ($problema->tipo): ?>
              <option value="<?php echo $problema->tipo->id_tipo_problema ?>"><?php echo $problema->tipo->nombre ?></option>
              <?php else: ?>
              <option>PROBLEMATICAS</option>
              <?php foreach ($tipo as $key => $t): ?>
              <option value="<?php echo $t->id_tipo_problema ?>"><?php echo $t->nombre ?></option>
              <?php endforeach ?>
              <?php endif ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="estatus" required/>
               <?php if ($problema->estatus==1): ?>
                <option value="1">Resuelto</option>
              <?php else: ?>
                <option value="0">En Estudio</option>
                <option value="1">Resuelto</option>
              <?php endif ?>
            </select>
          </div>
        </div>
      </div>
      <textarea name="observacion" class="editor">
      <?php echo $problema->observaciones ?>
      </textarea>
      <div class="col-lg-12">
        <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-save fa-2x"></i></button>
      </div>
      <br>
    </form>
  </div>
  <script>
  $('.editor').trumbowyg({
  lang: 'es'
  });
  </script>