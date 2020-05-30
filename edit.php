<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM gt_usuario WHERE id_usuario=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id_usuario = $row['id_usuario'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $id_puesto = $row['id_puesto'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
    $id_municipio = $row['id_municipio'];
    $direccion = $row['direccion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $id_puesto = $_POST['id_puesto'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $id_municipio = $_POST['id_municipio'];
  $direccion = $_POST['direccion'];

  $tok = strtok($id_puesto, ' ');
  $tokm = strtok($id_municipio, ' ');

  $query = "UPDATE gt_usuario set nombre = '$nombre', apellido = '$apellido', id_puesto = '$tok', correo = '$correo', telefono = '$telefono', id_municipio = '$tokm', direccion = '$direccion' WHERE id_usuario=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          
        <div class="form-group">
        <label class = 'col-form-label'>NOMBRES</label>
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre">
        </div>

        <div class="form-group">
        <label class = 'col-form-label'>APELLIDOS</label>
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="apellido">
        </div>



        <div class="form-group">
                <label class = 'col-form-label'>Puesto</label>
                <select name="id_puesto" class = 'custom-select d-block w-100'>
                <option selected>"<?php echo $id_puesto; ?>"</option>
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
        <label class = 'col-form-label'>CORREO</label>
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="correo">
        </div>

        <div class="form-group">
        <label class = 'col-form-label'>TELEFONO</label>
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="telefono">
        </div>

        <div class="form-group">
                <label class = 'col-form-label'>Municipio</label>
                <select name="id_municipio" class = 'custom-select d-block w-100'>
                <option selected>"<?php echo $id_puesto; ?>"</option>
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
        <label class = 'col-form-label'>DIRECCION</label>
          <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="direccion">
        </div>

        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
