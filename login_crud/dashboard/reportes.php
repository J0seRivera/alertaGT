<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class = 'container'>
<h1>GESTIONAR REPORTES</h1>

<?php include("db.php"); ?>


<div class = 'container'>
    <div class = 'row'>
        <div class = 'col-lg-12'>
            <button id = 'btnNuevoReporte' type = 'button' class = 'btn btn-warning' data-toggle = 'modal'>Registrar Nuevo Reporte</button>
        </div>
    </div>
    </div>
    <br>
    <div class = 'container'>
<div class = 'row'>
<div class = 'col-lg-12'>
<div class = 'table-responsive'>
<table id = 'tablaReporte' class = 'table table-striped table-bordered table-condensed' style = 'width:100%; font-size:10px;'>
    <thead class = 'text-center'>
    <tr>
            <th>id reporte</th>
            <th>tipo reporte</th>
            <th>nombre reporte</th>
            <th>detalle reporte</th>
            <th>fecha reporte</th>
            <th>id usuario</th>
            <th>usuario</th>
            <th>ubicacion</th>
            <th>id sensor</th>
            <th>sensor</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT gt_reporte.id_reporte id_reporte, tipo_reporte, nombre_reporte, detalles_reporte, fecha_reporte, gt_reporte.id_usuario id_usuario, gt_usuario.nombre nombre, ubicacion, gt_reporte.id_sensor id_sensor, gt_sensor.nombre_sensor from gt_reporte join gt_tipo_reporte on(gt_reporte.tipo_reporte=gt_tipo_reporte.id_reporte) join gt_usuario on(gt_reporte.id_usuario=gt_usuario.id_usuario) join gt_sensor on(gt_reporte.id_sensor=gt_sensor.id_sensor);";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_reporte']; ?></td>
            <td><?php echo $row['tipo_reporte']; ?></td>
            <td><?php echo $row['nombre_reporte']; ?></td>
            <td><?php echo $row['detalles_reporte']; ?></td>
            <td><?php echo $row['fecha_reporte']; ?></td>
            <td><?php echo $row['id_usuario']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['ubicacion']; ?></td>
            <td><?php echo $row['id_sensor']; ?></td>
            <td><?php echo $row['nombre_sensor']; ?></td>
            <td>
              <a href="reportes_edit.php?id=<?php echo $row['id_reporte']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="reportes_delete.php?id=<?php echo $row['id_reporte']?>" class="btn btn-danger">
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
<div class = 'modal fade' id = 'modalCRUD3' tabindex = '-1' role = 'dialog' aria-labelledby = 'exampleModalLabel' aria-hidden = 'true'>
<div class = 'modal-dialog' role = 'document'>
<div class = 'modal-content'>
<div class = 'modal-header'>
<h5 class = 'modal-title' id = 'exampleModalLabel'></h5>
<button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'><span aria-hidden = 'true'>&times;
</span>
</button>
</div>
<form action="reportes_save.php" method="POST">
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
    
            <label class = 'col-form-label'>NUEVO REPORTE</label>
       

          <div class="form-group">
            <input type="text" name="id_reporte" class="form-control" placeholder="id reporte" pattern="[\d]+" title="El ID debe ser un número entero" autofocus>
          </div>

          <div class="form-group">
                <label class = 'col-form-label'>Tipo de reporte a generar</label>
                <select name="tipo_reporte" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_reporte, nombre_reporte FROM gt_tipo_reporte;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_reporte'],' ',$dat['nombre_reporte']?>"><?php echo $dat['id_reporte'],' ',$dat['nombre_reporte']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>

          <div class="form-group">
            <input type="text" name="detalles_reporte" class="form-control" placeholder="detalles del reporte" autofocus>
          </div>

          <div class="form-group">
                <label class = 'col-form-label'>USUARIO</label>
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
            <input type="text" name="ubicacion" class="form-control" placeholder="ubicacion GPS" autofocus>
          </div>

          
          <div class="form-group">
                <label class = 'col-form-label'>Sensor objetivo</label>
                <select name="id_sensor" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_sensor, nombre_sensor FROM gt_sensor;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_sensor'],' ',$dat['nombre_sensor']?>"><?php echo $dat['id_sensor'],' ',$dat['nombre_sensor']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <input type="submit" name="btnsave_Reporte" class="btn btn-success btn-block" value="REGISTRAR REPORTE">
        


        </div>
    </form>
    </div>
    </div>
    </div>

</div>
<!--FIN del cont principal-->
<?php require_once 'vistas/parte_inferior.php'?>