<?php
    //conectar con consulta base de datos la sgte clase
    $usuario=$_GET['usuario'];
    $password=$_GET['passw'];

    if(($usuario=='jared255')&&($password=='incos')){
        ?>
        
        <script>
            window.location.href="http://localhost:9095/ProyectoMiMarket/PaginasProyecto/Principal.html";
     </script>
     <?php
    }
    else{
        ?>  
        <div class="error">
            El usuaro y/o la contraseña que ingreso es incorrecta, favor de revisar.
        </div>
        
        <?php
    }
?>
