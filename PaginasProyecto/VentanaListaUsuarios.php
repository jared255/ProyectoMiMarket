<?php
include "BasedeDatos/conexionbd.php";
//conectarbd();

$conex=mysqli_connect($nombreservidor,$usuariobd,$password,$db);
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
  <script>
    function actualizarUsuario(idusuario){
    let idusu = idusuario;

    $.get("actualizarUsuario.php",{idusu:idusu},function(result){
        $("#contenidoActualizar").html(result);
        $("#contenidoActualizar").show();
    });
  }
  </script>
  <script>
  function ejecutarActualizacion(idusuario){
      let idusu = idusuario;
      let usuario=$('#usuario').val();
      let nombre=$('#nombre').val();
      let apellidos=$('#apellidos').val();
      let password=$('#password').val();
      let telefono=$('#telefono').val();
      let direccion=$('#direccion').val();
      let tipoUsuario=$('#tipoUsuario').val();

    $.get("ejecutarActualizacion.php",{idusu:idusu,usuario:usuario, nombre:nombre, apellidos:apellidos, password:password, telefono:telefono, direccion:direccion, tipoUsuario:tipoUsuario},function(result){
        $("#actualizarTabla").html(result);
        $("#actualizarTabla").show();
    });
  }
</script>
<!-- ELIMINAR -->
<Script>
  function eliminarCliente(idusuario){
    let idusu = idusuario;

    $.get("eliminarCliente.php",{idusu:idusu},function(result){
        $("#contenidoActualizarEliminar").html(result);
        $("#contenidoActualizarEliminar").show();
    });
  }
</Script>
<Script>
  function ejecutarEliminar(idusuario){
    let idusu = idusuario;
    $.get("ejecutarEliminarCliente.php",{idusu:idusu},function(result){
        $("#actualizarTabla").html(result);
        $("#actualizarTabla").show();
    });
  }
</Script>

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
                  <li class="breadcrumb-item "><a href="index.html">SALIR</a></li></ol></div><a href="index.php">
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
            <div id="actualizarTabla">
                <div class="card-body p-0">
                  <table id="tabla1" class="table table-bordered table-striped">
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
                            <a href="#" class="btn btn-warning" data-toggle='modal' data-target='#actualizar'  onClick='actualizarUsuario(<?php echo $idusuario;?>);'><i class="fas fa-pencil-alt"></i>Editar</a>
                            
                        </div>
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="#" class="btn btn-danger" data-toggle='modal' data-target='#eliminar' onClick='eliminarCliente(<?php echo $idusuario;?>)'><i class="fas fa-trash"></i></a>
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

<script>
  $(function () {
    $("#tabla1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');
    $('#tabla2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Modal de actualizacion-->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar Datos Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div id="contenidoActualizar">
      <div class="modal-body">
        Cliente a cargar
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Actualizar</button>
      </div>
      </div><!--fin campos actualizar-->
    </div>
  </div>
</div>



<!--modal para eliminar-->

<!-- Modal -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div id="contenidoActualizarEliminar">
      <div class="modal-body">
        Esta seguro de eliminar este registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" >Eliminar</button>
      </div>
      </div><!--fin de contenidoActualizarEliminar-->
    </div>
  </div>
</div>


</body>
</html>
