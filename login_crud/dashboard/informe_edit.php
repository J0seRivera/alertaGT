<?php
include("db.php");

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM gt_informe WHERE id_informe=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $direccion_almacenamiento = $row['direccion_almacenamiento'];
    $id_usuario = $row['id_usuario'];
    $titulo_informe= $row['titulo_informe'];
    $id_declaracion_alerta = $row['id_declaracion_alerta'];
    $id_grado_alerta = $row['id_grado_alerta'];
    $id_evento = $row['id_evento'];
    $medida_escala_evento = $row['medida_escala_evento'];
    $id_escala_evento = $row['id_escala_evento'];
  }
}

if (isset($_POST['update_Informe'])) {
  $id = $_GET['id'];

  $direccion_almacenamiento = $_POST['direccion_almacenamiento'];
    $id_usuario = $_POST['id_usuario'];
    $titulo_informe= $_POST['titulo_informe'];
    $id_declaracion_alerta = $_POST['id_declaracion_alerta'];
    $id_grado_alerta = $_POST['id_grado_alerta'];
    $id_evento = $_POST['id_evento'];
    $medida_escala_evento = $_POST['medida_escala_evento'];
    $id_escala_evento = $_POST['id_escala_evento'];


  $toku = strtok($id_usuario, ' ');
  $tokd = strtok($id_declaracion_alerta, ' ');
  $tokg = strtok($id_grado_alerta, ' ');
  $tokev = strtok($id_evento, ' ');
  $tokes = strtok($id_escala_evento, ' ');

  $query = "UPDATE gt_informe set direccion_almacenamiento = '$direccion_almacenamiento', id_usuario = '$toku', titulo_informe = '$titulo_informe', id_declaracion_alerta = '$tokd', id_grado_alerta = '$tokg', id_evento = '$tokev', medida_escala_evento = '$medida_escala_evento', id_escala_evento = '$tokes', fecha_informe = NOW() WHERE id_informe=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: informe.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body">
      <form action="informe_edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

      <div class="form-group">
        <label class = 'col-form-label'>DIRECCION ALMACENAMIENTO</label>
          <input name="direccion_almacenamiento" type="text" class="form-control" value="<?php echo $direccion_almacenamiento; ?>" placeholder="almacenamiento" >
        </div>



        <div class="form-group">
                <label class = 'col-form-label'>Usuario</label>
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
        <label class = 'col-form-label'> TITULO DEL INFORME</label>
          <input name="titulo_informe" type="text" class="form-control" value="<?php echo $titulo_informe; ?>" placeholder="titulo" >
        </div>


        <div class="form-group">
                <label class = 'col-form-label'>DECLARACION DE ALERTA</label>
                <select name="id_declaracion_alerta" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_declaracion_alerta; ?></option>
                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_declaracion, nombre_declaracion FROM gt_declaracion_alerta;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_declaracion'],' ',$dat['nombre_declaracion']?>"><?php echo $dat['id_declaracion'],' ',$dat['nombre_declaracion']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>



          <div class="form-group">
                <label class = 'col-form-label'>GRADO DE LA ALERTA</label>
                <select name="id_grado_alerta" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_grado_alerta; ?></option>
                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_grado, nombre_grado FROM gt_declaracion_alerta;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_grado'],' ',$dat['nombre_grado']?>"><?php echo $dat['id_grado'],' ',$dat['nombre_grado']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>



          <div class="form-group">
                <label class = 'col-form-label'>EVENTO SUCEDIDO</label>
                <select name="id_evento" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_grado_alerta; ?></option>
                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_evento, nombre_evento FROM gt_evento;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_evento'],' ',$dat['nombre_evento']?>"><?php echo $dat['id_evento'],' ',$dat['nombre_evento']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


        <div class="form-group">
        <label class = 'col-form-label'>MEDIDA O MAGNITUD DE EVENTO</label>
          <input name="medida_escala_evento" type="text" class="form-control" value="<?php echo $medida_escala_evento; ?>" placeholder="medida" >
        </div>

        <div class="form-group">
                <label class = 'col-form-label'>ESCALA DEL EVENTO</label>
                <select name="id_escala_evento" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_escala_evento; ?></option>
                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_escala, nombre_escala FROM gt_escala_evento;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_escala'],' ',$dat['nombre_escala']?>"><?php echo $dat['id_escala'],' ',$dat['nombre_escala']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>

            <button class="btn-success" name="update_Informe">
          Actualizar Informe
            </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
