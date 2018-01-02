<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <!--     <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
    -->
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/bootstrap-theme-paper/paper.css">
    
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/components-font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/bootstrap-side-navbar/source/assets/stylesheets/navbar-fixed-side.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/animate.css/animate.min.css">
    <script src="<?php echo baseUrl ?>assets/bower/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/bootstrap-table/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/pickadate/lib/themes/default.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/pickadate/lib/themes/default.date.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/pickadate/lib/themes/default.time.css">
    <script src="<?php echo baseUrl ?>assets/bower/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
    <script src="<?php echo baseUrl ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/inputmask/dist/inputmask/phone-codes/phone.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/inputmask/dist/inputmask/phone-codes/phone-be.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/inputmask/dist/inputmask/phone-codes/phone-ru.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/inputmask/dist/inputmask/bindings/inputmask.binding.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/inputmask/dist/inputmask/bindings/inputmask.binding.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/pickadate/lib/picker.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/pickadate/lib/picker.time.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/pickadate/lib/picker.date.js"></script>
    <script src="<?php echo baseUrl ?>assets/bower/pickadate/lib/translations/es_ES.js"></script>
    
    <style>
    body{
    background-color: #222;
    }
    .table {
    border-bottom:0px !important;
    }
    .table th, .table td {
    border: 1px !important;
    }
    .fixed-table-container {
    border:0px !important;
    }
    input[type="button"] {
    transition: all .3s;
    border: 1px solid #ddd;
    padding: 3px 10px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 15px;
    }
    input[type="button"]:not(.active) {
    background-color:transparent;
    }
    .active {
    background-color: #299BFF;
    color :#fff;
    }
    input[type="button"]:hover:not(.active) {
    background-color: #ddd;
    }
    .example .pagination>li>a,
    .example .pagination>li>span {
    border: 1px solid red;
    }
    .pagination>li.active>a {
    background: grey;
    color: #fff;
    }
    th {
    color: red;
    box-shadow: 0px 0px 1px #CECECE;
    }
    .rojo
    {
    background-color:#E51C23;
    
    }
    
    </style>
  </head>
  <body>
    <?php $usuario = User(); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <nav class="navbar navbar-default navbar-fixed-side">
            <div class="container">
              <div style="background-color: red" class="navbar-header text-white">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="<?php echo baseUrl ?>" style="color:#fff;height: 73px;" class="navbar-brand text-white" href="#">
                  <!-- <img style="width: 47px;" id="profile-img" class="profile-img-card" src="" /> -->
                <i class="fa fa-wpexplorer fa-2x"></i> MUNICIPAL</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a class="text-uppercase" href="#" id="" data-toggle="collapse" data-target="#opcionesMenu" aria-expanded="false"><i class="fa fa-user-circle"></i>
                    <?php
                    
                    echo 'MUNICIPAL '.$usuario['name'];
                    ?>
                  </a>
                  <ul class="nav collapse" id="opcionesMenu" role="menu" aria-labelledby="btn-1">
                    <li><a class="text-danger" href="<?php echo baseUrlRole() ?>CuentasUbchMunicipal"><i class="fa fa-users"></i> CUENTAS CLP</a></li>
                    <li><a class="text-danger" href="<?php echo baseUrl ?>auth/login/logout"><i class="fa fa-power-off"></i> SALIR</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav">
                <li class=""><a href="<?php echo baseUrlRole() ?>clps"><i class="fa fa-map"></i> CLP</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <!--  <li class=""><a href="<?php echo baseUrlRole() ?>centrosMunicipal"><i class="fa fa-university"></i> CENTROS</a></li> -->
              </ul>
              <ul class="nav navbar-nav">
                <li class=""><a href="<?php echo baseUrlRole() ?>estructurasMuni"><i class="fa fa-sitemap"></i> ESTRUCTURA</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class=""><a href="<?php echo baseUrlRole() ?>partidosMuni"><i class="fa fa-handshake-o"></i> PARTIDOS</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class=""><a href="<?php echo baseUrlRole() ?>institucionesMuni"><i class="fa fa-building-o"></i> INSTITUCIONES</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class=""><a href="<?php echo baseUrlRole() ?>consultas/index"><i class="fa fa-search"></i> CONSULTAR PERSONA</a></li>
              </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a class="text-uppercase" href="#" id="" data-toggle="collapse" data-target="#opcionesMenuCarga" aria-expanded="false"><i class="fa fa-upload"></i> CARGA DE VOTOS</a>
              <ul class="nav collapse" id="opcionesMenuCarga" role="menu" aria-labelledby="btn-1">

                <li><a class="text-danger" href="<?php echo baseUrlRole() ?>votosMesa"><i class="fa fa-clock-o"></i> VOTOS * HORA</a></li>
                <li><a class="text-danger" href="<?php echo baseUrlRole() ?>votos"><i class="fa fa-area-chart"></i>  TOTALIZACION</a></li>
                <li><a class="text-danger" href="<?php echo baseUrlRole() ?>votosCentroMesa"><i class="fa fa-archive"></i>  ESCRUTINIO</a></li>
              </ul>
            </li>
          </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a class="text-uppercase" href="#" id="" data-toggle="collapse" data-target="#opcionesMenuReportes" aria-expanded="false"><i class="fa fa-file-pdf-o"></i> REPORTES</a>
                <ul class="nav collapse" id="opcionesMenuReportes" role="menu" aria-labelledby="btn-1">
                  <li><a class="text-danger" href="<?php echo baseUrlRole() ?>reportes"><i class="fa fa-university"></i> TOTALES</a></li>
                  <!--<li><a class="text-danger" href="<?php echo baseUrl ?>reportes"><i class="fa fa-users"></i> UBCH</a></li>
                  <li><a class="text-danger" href="<?php echo baseUrl ?>reportes"><i class="fa fa-address-book"></i> PATRULLEROS</a></li> -->
                <li><a class="text-danger" href="<?php echo baseUrlRole() ?>reportes/escrutinio"><i class="fa fa-archive"></i>  ESCRUTINIO</a></li>
                </ul>
              </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </div>
  <div class="col-sm-9 col-lg-10">
    <!-- <img width="100%" height="130px;" src="<?php echo baseUrl ?>/assets/img/banner.jpg" alt=""> -->
    <br>
    <?php echo $content ?>
  </div>
</div>
</div>
<!-- /container -->
<!-- MENSAJES FLASH SWEET ALERT 2 -->
<?php if (Message::hasMessages()): ?>
<?php echo Message::show() ?>
<?php endif ?>
<?php if (Message::hasQuestion()): ?>
<?php echo Message::showQuestion() ?>
<?php endif ?>
</body>
</html>