<?php
    include "BasedeDatos/conexionbd.php";
    conectarbd();

    //recepcionando los datos para actualizar
     $idUsuario = $_GET['idusu'];
      $usuario=$_GET['usuario'];
      $password=$_GET['password'];
      $nombre=$_GET['nombre'];
      $apellidos=$_GET['apellidos'];
      $direccion=$_GET['direccion'];
      $telefono=$_GET['telefono'];
      $tipoUsuario=$_GET['tipoUsuario'];


    //actualizar
    $sqlactualizar = "UPDATE usuario SET usuario='$usuario', password ='$password',
    nombres='$nombre',apellidos='$apellidos',direccion='$direccion',
    telefonos='$telefono', tipoUsuario='$tipoUsuario'  
    WHERE idUsuario='$idUsuario'";

    $ejecutarActualizacion = mysqli_query($conex, $sqlactualizar);

    //mostrar los datos actualizados
    //recuperar los datos para mostrarlos en la lista
    $sqllista1 = "SELECT idusuario,usuario,nombres,apellidos,direccion,telefonos,tipoUsuario
        FROM usuario";

    $consultaCli1 = mysqli_query($conex,$sqllista1);

?>

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
            while($filaAct = mysqli_fetch_assoc($consultaCli1)){
            echo "<tr>";
                $idusuario = $filaAct['idusuario'];
                echo "<td>".$filaAct['usuario']."</td>";
                echo "<td>".$filaAct['nombres']."</td>";
                echo "<td>".$filaAct['apellidos']."</td>";
                echo "<td>".$filaAct['direccion']."</td>";
                echo "<td>".$filaAct['telefonos']."</td>";
                echo "<td>".$filaAct['tipoUsuario']."</td>";
        ?>
            <td>
                <div class="btn-group">
                <a href="#" class="btn btn-warning" data-toggle='modal' data-target='#actualizar'  onClick="actualizarUsuario(<?php echo $idusuario;?>);"><i class="fas fa-pencil-alt"></i>Editar</a>
                
            </div>
            </td>
            <td>
                <div class="btn-group">
                <a href="#" class="btn btn-danger" data-toggle='modal' data-target='#eliminar' onClick="eliminarCliente(<?php echo $idusuario;?>)"><i class="fas fa-trash"></i></a>
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