<?php
    include "BaseDatos/conexionbd.php";
    conectarbd();

    //recepcionar el dato o el ID
    $idCliente = $_GET['idCli'];

    //consulta para obtener los datos segun este ID
    $sqlActualizar = "SELECT * from cliente where idCliente='$idCliente'";
    $ejecutarConsulta = mysqli_query($conex,$sqlActualizar);

    while($filaAct = mysqli_fetch_assoc($ejecutarConsulta)){

        $idCliente1 = $filaAct['idCliente'];

    
?>

<div class="modal-body">

 <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" value="<?php echo $filaAct['nombreCli'];?>" name="nombre" placeholder="Nombres">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellidos:</label>
                    <input type="text" class="form-control" id="apellido" value="<?php echo $filaAct['apellidoCli'];?>" name="apellido" placeholder="Apellidos">
                  </div>
                  <div class="row">
                    
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Carnet:</label>
                      <input type="text" class="form-control" id="carnet" value="<?php echo $filaAct['carnet'];?>" name="carnet" placeholder="Numero de Carnet">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefono Fijo:</label>
                      <input type="text" class="form-control" id="fonofijo" value="<?php echo $filaAct['fonoFijo'];?>" name="fonofijo" placeholder="Telefono Fijo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefono Celular:</label>
                      <input type="text" class="form-control" id="fonocelular" value="<?php echo $filaAct['fonoCel'];?>" name="fonocelular" placeholder="Telefono Celular">
                    </div>
                  </div>
                </div>
                  
                </div>
                <!-- /.card-body -->

                
              </form>

</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ejecutarActualizacion(<?php echo $idCliente1;?>);">Actualizar</button>
    </div>



              <?php
    }//fin del while
              ?>