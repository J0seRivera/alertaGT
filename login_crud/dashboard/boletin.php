<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class = 'container'>
<h1>GESTIONAR BOLETINES INFORMATIVOS</h1>

<?php include("db.php"); ?>


<div class = 'container'>
    <div class = 'row'>
        <div class = 'col-lg-12'>
            <button id = 'btnNuevoBoletin' type = 'button' class = 'btn btn-danger' data-toggle = 'modal'>Nuevo Boletín informativo</button>
        </div>
    </div>
    </div>
    <br>
    <div class = 'container'>
<div class = 'row'>
<div class = 'col-lg-12'>
<div class = 'table-responsive'>
<table id = 'tablaBoletin' class = 'table table-striped table-bordered table-condensed' style = 'width:100%; font-size:10px;'>
    <thead class = 'text-center'>
    <tr>
            <th>id boletin</th>
            <th>nombre boletin</th>
            <th>id informe</th>
            <th>fecha</th>
            <th>id usuario</th>
            <th>usuario</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT id_boletin, nombre_boletin, id_informe, fecha, gt_boletin.id_usuario id_usuario, nombre from gt_boletin join gt_usuario on(gt_boletin.id_usuario=gt_usuario.id_usuario);";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_boletin']; ?></td>
            <td><?php echo $row['nombre_boletin']; ?></td>
            <td><?php echo $row['id_informe']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['id_usuario']; ?></td>
            <td><?php echo $row['usuario']; ?></td>
            <td>
              <a href="edit_cuenta.php?id=<?php echo $row['id_boletin']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_cuenta.php?id=<?php echo $row['id_boletin']?>" class="btn btn-danger">
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
<div class = 'modal fade' id = 'modalCRUD4' tabindex = '-1' role = 'dialog' aria-labelledby = 'exampleModalLabel' aria-hidden = 'true'>
<div class = 'modal-dialog' role = 'document'>
<div class = 'modal-content'>
<div class = 'modal-header'>
<h5 class = 'modal-title' id = 'exampleModalLabel'></h5>
<button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'><span aria-hidden = 'true'>&times;
</span>
</button>
</div>
<form action="boletin_save.php" method="POST">
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
    
            <label class = 'col-form-label'>NUEVO BOLETIN</label>
       

          <div class="form-group">
            <input type="text" name="id_cuenta" class="form-control" placeholder="id cuenta" pattern="[\d]+" title="El ID debe ser un número entero" autofocus>
          </div>

          <div class="form-group">
                <label class = 'col-form-label'>Usuario</label>
                <select name="id_usuario" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_usuario, nombre FROM gt_usuario;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_usuario'],' ',$dat['nombre']?>"><?php echo $dat['id_usuario'],' ',$dat['nombre']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <div class="form-group">
                <label class = 'col-form-label'>Roll de Cuenta</label>
                <select name="id_roll" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_roll, nombre_roll FROM gt_roll_cuenta;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_roll'],' ',$dat['nombre_roll']?>"><?php echo $dat['id_roll'],' ',$dat['nombre_roll']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <div class="form-group">
            <input type="text" name="alias" class="form-control" placeholder="alias de la cuenta" pattern="^([A-Za-z][A-Za-z0-9]{3,20}|([A-Za-z0-9]{3,20}\\s[A-Za-z0-9]{3,20}))$" title="maximo 2 palabras y cada palabra con longitud maxima de 20 (solo letras y numeros)" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="clave" class="form-control" placeholder="clave de cuenta" pattern="^([A-Za-z0-9.:;*¡?¿()=&%$#!+_@{}\[\]|]\s?){8,30}$" title="mínimo 8 caracteres" autofocus>
          </div>

          
          <div class="form-group">
                <label class = 'col-form-label'>Estado de cuenta</label>
                <select name="id_estado" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_estado, nombre_estado FROM gt_estado_cuenta;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_estado'],' ',$dat['nombre_estado']?>"><?php echo $dat['id_estado'],' ',$dat['nombre_estado']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <input type="submit" name="btnsave_Boletin" class="btn btn-success btn-block" value="REGISTRAR BOLETIN">
        


        </div>
    </form>
    </div>
    </div>
    </div>

</div>
<!--FIN del cont principal-->
<?php require_once 'vistas/parte_inferior.php'?>