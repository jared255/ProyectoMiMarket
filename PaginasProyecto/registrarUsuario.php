<?php
    include 'BasedeDatos/conexionbd.php';

    
    $conexion=mysqli_connect($nombreservidor,$usuariobd,$passw,$dbnombre);

    $usuario=$_GET['usuario'];
    $nombre=$_GET['nombre'];
    $apellidos=$_GET['apellidos'];
    $password=$_GET['password'];
    $telefono=$_GET['telefono'];
    $confirmarPassword=$_GET['confirmarPassword'];
    $direccion=$_GET['direccion'];
    $tipoUsuario=$_GET['tipoUsuario'];

    //consulta

    $consul="INSERT INTO usuario (idUsuario, usuario, password, nombres, apellidos, direccion, telefonos, tipoUsuario) VALUES (NULL,'{$usuario}','{$password}','{$nombre}','{$apellidos}','{$direccion}',{$telefono},'{$tipoUsuario}')";

    if(mysqli_query($conexion,$consul)){
        ?>
        <div class="alert alert-success" role="alert">
            USUARIO REGISTRADO.
        </div>
        <?php
    }
    else{
        ?>  
        <div class="alert alert-warning" role="alert">
            El usuaro y/o la contraseña que ingreso es incorrecta, favor de revisar.
        </div>
        
        <?php
    }


?>