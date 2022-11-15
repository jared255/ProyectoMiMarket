<?php
    include "BasedeDatos/conexionbd.php";
    conectarbd();

    //recepcionando los datos para ELIMINAR
     $idUsuario = $_GET['idusu'];
      


    //ELIMINAR
    $sqleliminar = "DELETE FROM usuario   
    WHERE idUsuario='$idUsuario'";

    $ejecutarEliminar = mysqli_query($conex, $sqleliminar);

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
                <a href="#" class="btn btn-warning" data-toggle='modal' data-target='#actualizar'  onClick='actualizarUsuario(<?php echo $idusuario;?>);'><i class="fas fa-pencil-alt"></i>Editar</a>
                
            </div>
            </td>
            <td>
                <div class="btn-group">
                <a href="#" class="btn btn-danger" data-toggle='modal' data-target='#eliminar' onClick='ejecutarEliminar(<?php echo $idusuario;?>)'><i class="fas fa-trash"></i></a>
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