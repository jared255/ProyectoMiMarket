<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MiMARKET | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script>
    function ingresar()
    {
      $(document).ready(function()
      {
      var usuario=$('#usuario').val();
      var passw=$('#passw').val();
      alert(passw);
      $.get("validacionLoguin.php",{usuario:usuario, passw:passw},function(result){
        $("#mostrarmensaje").html(result);
        $('#mostrarmensaje').show();
      });
    });
  }
  </script>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="container row text-center">
    <img src="../img/computadora-portatil.png" class="mx-auto d-block" style="width:50%">
  </div>
  <div class="login-logo">
    <b>SISTEMA DE VENTAS</b><br> MiMARKET</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus datos para iniciar su sección</p>

      <form action="validacionLoguin.php" method="get">
        <div class="input-group mb-3">
          <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="passw" id="passw" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-4">
          </div>
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-block float-sm-right" style="width:100% ;" onclick="ingresar();">Ingresar</button>
          </div> 
          <div class="col-4">
          </div> 
        </div>
      </form>

      
      <!-- /.social-auth-links --> 
    </div>
    <!-- /.login-card-body -->
  </div>
  <div id="mostrarmensaje">
    
  </div>
</div>


<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
