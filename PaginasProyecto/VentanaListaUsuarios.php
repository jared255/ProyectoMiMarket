<?php
include "BasedeDatos/conexionbd.php";
conectarbd();

$conex=mysqli_connect($nombreservidor,$usuariobd,$passw,$dbnombre);
$sqllista = "SELECT idusuario,usuario,nombres,apellidos,direccion,telefonos,tipoUsuario
FROM usuario";

$consultaCli = mysqli_query($conex,$sqllista);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MiMARKET | Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
            <div class="row">
              <div class="col-sm-2 text-center">
                <img src="../img/computadora-portatil.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="max-width: 70px ;">
              </div>
              <div class="col-xs-1">
              </div>
              <div class="col-sm-9">
                <h1>Lista Usuarios</h1><h1>MiMARKET</h1>
              </div>
            </div>
          </div> 
           <!--Barra de INICIO VENTAS INVENTARIO...-->
          <div class="col-sm-5">
            <div class="row">
              <div class="col-sm-11">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="Principal.html">INICIO</a></li>
                  <li class="breadcrumb-item"><a href="VentanaVentas.html">VENTAS</a></li>
                  <li class="breadcrumb-item "><a href="VentanaInventario.html">INVENTARIO</a></li>
                  <li class="breadcrumb-item "><a href="VentanaReportes.html">REPORTES</a></li>
                  <li class="breadcrumb-item "><a href="Registro.html">REGISTRO</a></li>
                  <li class="breadcrumb-item "><a href="index.html">SALIR</a></li></ol></div><a href="index.html">
              <div class="col-sm-min">
                
              </div>

            </a>
          </div>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
  </div>

  <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-1">
          
        </div>
        <div class="col-md-10">
          
          <h2>Lista</h2>
          <div class="row">
            <div class="col-md-2">
              <a href="VentanaRegistrarUsuario.html">
              <button type="button" class="btn btn-block btn-primary btn-sm">
              NUEVO <i class="fas fa-user-plus"></i>
              </button></a> 
            </div>
            <div class="col-sm-10">
              
            </div>
          </div>
          
          <div class="card card-info">

            <div class="card-body p-0">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfonos</th>
                    <th>Tipo de Usuario</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                   //codigo PHP para generar datos de la tabla
                   while($fila = mysqli_fetch_assoc($consultaCli)){
                     echo "<tr>";
                       $idusuario = $fila['idusuario'];
                       echo "<td>".$fila['usuario']."</td>";
                       echo "<td>".$fila['nombres']."</td>";
                       echo "<td>".$fila['apellidos']."</td>";
                       echo "<td>".$fila['direccion']."</td>";
                       echo "<td>".$fila['telefonos']."</td>";
                       echo "<td>".$fila['tipoUsuario']."</td>";
                ?>
                    <td>
                      <div class="btn-group">
                        <a href="#" class="btn btn-warning" data-toggle='modal' data-target='#actualizar'  onClick='actualizarCliente(<?php echo $idCliente;?>);'><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="btn btn-danger" data-toggle='modal' data-target='#eliminar' onClick='eliminarCliente(<?php echo $idCliente;?>)'><i class="fas fa-trash"></i></a>
                     </div>
                    </td>
                 </tr>
                <?php
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfonos</th>
                    <th>Tipo de Usuario</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-1">
          
        </div>
      </div>
          
    </div>
  </section> 
  <!--Footer-->
  <footer class="dropdown-footer">
    <strong>Copyright &copy; 2022 <a href="">JARED LUIZAGA</a>.</strong> All rights reserved.
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

</body>
</html>
