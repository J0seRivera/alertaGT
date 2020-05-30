<?php require_once 'vistas/parte_superior.php'?>

<!--INICIO del cont principal-->
<div class = 'container'>
<h1>USUARIOS</h1>



<?php include("db.php"); ?>


<div class = 'container'>
    <div class = 'row'>
        <div class = 'col-lg-12'>
            <button id = 'btnNuevo' type = 'button' class = 'btn btn-success' data-toggle = 'modal'>Registrar Nuevo usuario</button>
        </div>
    </div>
    </div>
    <br>
    <div class = 'container'>
<div class = 'row'>
<div class = 'col-lg-12'>
<div class = 'table-responsive'>
<table id = 'tablaPersonas' class = 'table table-striped table-bordered table-condensed' style = 'width:100%; font-size:10px;'>
    <thead class = 'text-center'>
    <tr>
            <th>id</th>
            <th>nombres</th>
            <th>apellidos</th>
            <th>idp</th>
            <th>puesto</th>
            <th>correo</th>
            <th>telefono</th>
            <th>idm</th>
            <th>municipio</th>
            <th>direccion</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT id_usuario, nombre, apellido, gt_usuario.id_puesto,nombre_puesto, correo, telefono, gt_usuario.id_municipio,nombre_municipio, direccion FROM gt_usuario JOIN gt_puestos ON(gt_usuario.id_puesto=gt_puestos.id_puesto) JOIN gt_municipio ON(gt_usuario.id_municipio=gt_municipio.id_municipio);";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_usuario']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['id_puesto']; ?></td>
            <td><?php echo $row['nombre_puesto']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['id_municipio']; ?></td>
            <td><?php echo $row['nombre_municipio']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_usuario']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id_usuario']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
</table>
</div>
</div>
</div>
</div>

<!--Modal para CRUD-->
<div class = 'modal fade' id = 'modalCRUD' tabindex = '-1' role = 'dialog' aria-labelledby = 'exampleModalLabel' aria-hidden = 'true'>
<div class = 'modal-dialog' role = 'document'>
<div class = 'modal-content'>
<div class = 'modal-header'>
<h5 class = 'modal-title' id = 'exampleModalLabel'></h5>
<button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'><span aria-hidden = 'true'>&times;
</span>
</button>
</div>
<form action="save_task.php" method="POST">
<div class = 'modal-body'>

    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
    
            <label class = 'col-form-label'>NUEVO USUARIO</label>
       

          <div class="form-group">
            <input type="text" name="id_usuario" class="form-control" placeholder="id usuario" pattern="[\d]+" title="El ID debe ser un número entero" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombres del usuario" pattern="^(([A-ZÑ][a-zñüáéíóú]+)|(([A-ZÑ][a-zñüáéíóú]+)(\s([A-ZÑ][a-zñüáéíóú]+)){1,3}))$" title="Los nombres deben empezar en mayuscula y contener solo letras" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Apellidos del usuario" pattern="^(([A-ZÑ][a-zñüáéíóú]+)|(([A-ZÑ][a-zñüáéíóú]+)(\s([A-ZÑ][a-zñüáéíóú]+)){1,3}))$" title="Los apellidos deben empezar en mayuscula y contener solo letras" autofocus>
          </div>


          <div class="form-group">
                <label class = 'col-form-label'>Puesto</label>
                <select name="id_puesto" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_puesto, nombre_puesto FROM gt_puestos;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_puesto'],' ',$dat['nombre_puesto']?>"><?php echo $dat['id_puesto'],' ',$dat['nombre_puesto']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <div class="form-group">
            <input type="text" name="correo" class="form-control" placeholder="correo electrónico" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" title="El correo no puede contener simbolos extraños como: ´/,:;*{}[]+?¿¡!" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="número de teléfono" pattern="^(\d){8}$" title="Solo puede contener 8 digitos" autofocus>
          </div>

          
          <div class="form-group">
                <label class = 'col-form-label'>Municipio</label>
                <select name="id_municipio" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_municipio, nombre_municipio FROM gt_municipio;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_municipio'],' ',$dat['nombre_municipio']?>"><?php echo $dat['id_municipio'],' ',$dat['nombre_municipio']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <div class="form-group">
            <input type="text" name="direccion" class="form-control" placeholder="dirección de domicilio" pattern="^((\\s?[A-ZÑa-zñüáéíóú\\.\\,\\-0-9])+)$" title="Las direcciones no puden contener simbolos extraños como: #!#$%&%/()=?¡¨*[]" autofocus>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        


        </div>
    </form>
    </div>
    </div>
    </div>

</div>
<!--FIN del cont principal-->
<?php require_once 'vistas/parte_inferior.php'?>