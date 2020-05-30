<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM gt_reporte WHERE id_reporte=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $tipo_reporte = $row['tipo_reporte'];
    $detalles_reporte = $row['detalles_reporte'];
    $fecha_reporte = $row['fecha_reporte'];
    $id_usuario = $row['id_usuario'];
    $ubicacion = $row['ubicacion'];
    $id_sensor = $row['id_sensor'];
  }
}

if (isset($_POST['updateReporte'])) {
  $id = $_GET['id'];

  $tipo_reporte = $_POST['tipo_reporte'];
  $detalles_reporte = $_POST['detalles_reporte'];
  $fecha_reporte = $_POST['fecha_reporte'];
  $id_usuario = $_POST['id_usuario'];
  $ubicacion = $_POST['ubicacion'];
  $id_sensor = $_POST['id_sensor'];

  $tokr = strtok($tipo_reporte, ' ');
  $toku = strtok($id_usuario, ' ');
  $toks = strtok($id_sensor, ' ');


  $query = "UPDATE gt_reporte set tipo_reporte = '$tokr', detalles_reporte = '$detalles_reporte', fecha_reporte = '$fecha_reporte', id_usuario = '$toku', ubicacion = '$ubicacion', id_sensor = '$toks' WHERE id_reporte=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: reportes.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="reportes_edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          


      <div class="form-group">
                <label class = 'col-form-label'>TIPO DE REPORTE</label>
                <select name="tipo_reporte" class = 'custom-select d-block w-100'>
                <option selected><?php echo $tipo_reporte;?></option>
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
        <label class = 'col-form-label'>DETALLE BREVE DEL REPORTE</label>
          <input name="detalles_reporte" type="text" class="form-control" value="<?php echo $detalles_reporte; ?>" placeholder="detalles reporte" >
        </div>

        <div class="form-group">
        <label class = 'col-form-label'>FECHA DEL REPORTE</label>
          <input name="fecha_reporte" type="text" class="form-control" value="<?php echo $fecha_reporte; ?>" placeholder="fecha reporte" >
        </div>



        <div class="form-group">
                <label class = 'col-form-label'>USUARIO</label>
                <select name="id_usuario" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_usuario; ?></option>
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
        <label class = 'col-form-label'>UBICACION GPS DE REPORTE</label>
          <input name="ubicacion" type="text" class="form-control" value="<?php echo $ubicacion; ?>" placeholder="ubicacion GPS" >
        </div>


        <div class="form-group">
                <label class = 'col-form-label'>SENSOR</label>
                <select name="id_sensor" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_sensor; ?></option>
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


        <button class="btn-success" name="updateReporte">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
