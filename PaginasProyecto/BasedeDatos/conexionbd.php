<?php
    $nombreservidor="localhost";
    $usuariobd="root";
    $passw="";

    $conex=mysqli_connect($nombreservidor,$usuariobd,$passw);

    if (!conex) {
        echo "Error en la conexción".mysqli_connec_error();
    }
?>