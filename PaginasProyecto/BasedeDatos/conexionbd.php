<?php
    $nombreservidor="localhost";
    $usuariobd="root";
    $password="";
    $db="mimarket_db";

    $conex;
    $resultado;
    
    $conex = mysqli_connect($nombreservidor,$usuariobd,$password,$db);
    

    function conectarbd(){
        $nombreservidor = "localhost";
        $usuariobd = "root";
        $password = "";
        $db = "mimarket_db";
    
        $conex = mysqli_connect($nombreservidor,$usuariobd,$password,$db);
    
        if(!$conex){
            die("Conexion fallida ".mysqli_connect_error());
        }
    }


    function conectarservidor(){
    global $nombreservidor,$usuariobd,$passw,$dbnombre;
    $conex = mysqli_connect($nombreservidor,$usuariobd,$passw,$dbnombre);

        if(!$conex){
            echo "Error en la conexion". mysqli_connect_error();
        }
        else{
            echo "Conexion Exitosa";
        }
    }

    function consulta($consul){
        global $conex,$resultado;
      
        $resultado = mysqli_query($conex,$consul); 
        if ($resultado) {
             echo "Consulta exitosa";
         } else {
             echo "Error: " . $consul . "<br>" . mysqli_error($conex);
         }
     }
 
     
     function numfilas(){
         global $resultado;
         return mysqli_num_rows($resultado);
     }
?>