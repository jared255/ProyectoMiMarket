<?php
    include 'BasedeDatos/conexionbd.php';
    //conectar con consulta base de datos la sgte clase

    //connectando con la BD especifica
    conectarservidor();
    $conexion=mysqli_connect($nombreservidor,$usuariobd,$passw,$dbnombre);
   
    $usuario=$_GET['usuario'];
    $password=$_GET['passw'];

    //revisar los datos de la BD
    $consul="SELECT usuario, password FROM usuario WHERE usuario='$usuario' AND password='$password'";
    $resultado = mysqli_query($conexion,$consul); 
    if((numfilas()>0)){
        ?>
        
        <script>
            window.location.href="http://localhost:9095/ProyectoMiMarket/PaginasProyecto/Principal.html";
     </script>
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
