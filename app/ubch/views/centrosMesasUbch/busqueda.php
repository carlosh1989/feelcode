
<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> INGRESAR RESPONSABLE DE CENTRO</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>centrosTestigosUbch/create" method="POST">
      <?php echo Token::field() ?>
      <input type="hidden" name="id_mesa" value="<?php echo $id_mesa ?>">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="number" name="cedula" placeholder="CEDULA">
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-danger pull-right"><i class="fa fa-save fa-2x"></i></button>
      </div>
    </div>
  </div>
  <br>
</form>
</div>