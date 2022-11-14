<?php
    include "BaseDatos/conexionbd.php";
    conectarbd();

    //recepcionar el dato o el ID
    $idusuario = $_GET['idusu'];

    //consulta para obtener los datos segun este ID
    $sqlActualizar = "SELECT * from usuario where idusuario='$idusuario'";
    $ejecutarConsulta = mysqli_query($conex,$sqlActualizar);

    while($filaAct = mysqli_fetch_assoc($ejecutarConsulta)){

        $idusuario1 = $filaAct['idusuario'];

    
?>

<div class="modal-body">

 
<div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <fieldset class="form-group border p-3">
            <legend class="w-auto px-2">Datos Personales</legend>

              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NOMBRE: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>USUARIO: </label>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario ..." >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>APELLIDOS:</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>CONTRASEÑA:</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Contraseña ...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>TELEFONO</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Telf ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>CONFIRMAR CONTRASEÑA:</label>
                        <input type="text" class="form-control" name="confirmarPassword" id="confirmarPassword" placeholder="Repetir Contraseña ...">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DIRECCIÓN:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label for="">TIPO DE USUARIO:</label>
                        <select class="form-control" name="tipoUsuario" id="tipoUsuario">
                          <option value="seleccionar">Seleccionar</option>
                          <option value="administrador">Administrador</option>
                          <option value="user">User</option>
                        </select>
                      </div>
                    </div>
                    
                  </div>

                </form>
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ejecutarActualizacion(<?php echo $idusuario1;?>);">Actualizar</button>
    </div>



              <?php
    }//fin del while
              ?>