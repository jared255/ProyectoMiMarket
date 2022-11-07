<?php
    include 'BasedeDatos/conexionbd.php';

    
    $conexion=mysqli_connect($nombreservidor,$usuariobd,$passw,$dbnombre);

    $nombreProduto=$_GET['nombreProduto'];
    $unidades=$_GET['unidades'];
    $fechavencimiento=$_GET['fechavencimiento'];
    $preciocompra=$_GET['preciocompra'];
    $precioVenta=$_GET['precioVenta'];
    $descripcion=$_GET['descripcion'];
    $categoriaProducto=$_GET['categoriaProducto'];
    

    //consulta

    $consulProducto="INSERT INTO producto (idProducto, nombre, unidadesStock, precioCompra, precioVenta, categoria, fechaVencimiento, descripcion) VALUES (NULL,'{$nombreProduto}','{$unidades}','{$preciocompra}','{$precioVenta}','{$categoriaProducto}','{$fechavencimiento}','{$descripcion}')";

    if(mysqli_query($conexion,$consulProducto)){
        ?>
        <div class="alert alert-success" role="alert">
            PRODUCTO REGISTRADO.
        </div>
        <?php
    }
    else{
        ?>  
        <div class="alert alert-warning" role="alert">
        <?php
            echo "Error".$consulProducto." ". mysqli_error($conexion);
        ?>
        </div>
        
        <?php
    }
?>