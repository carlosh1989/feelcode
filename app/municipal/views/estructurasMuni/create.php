<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-sitemap fa-2x"></i> AGREGAR ESTRUCTURAS<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>estructurasMuni/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> Agregar ESTRUCTURAS</i></a>    </h3>
  </div>
  <div class="panel-body">
    <form action="<?php echo baseUrlRole() ?>estructurasMuni" method="POST">
      <?php echo Token::field() ?>
      <div class="row">
       <br>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="nombre" placeholder="INGRESAR NOMBRE DE ESTRUCTURAS">
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
</div>
</div>

