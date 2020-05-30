<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM gt_cuenta_usuario WHERE id_cuenta=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id_ucuenta = $row['id_cuenta'];
    $id_usuario = $row['id_usuario'];
    $id_roll= $row['id_roll'];
    $alias = $row['alias'];
    $clave = $row['clave'];
    $id_estado = $row['id_estado'];
  }
}

if (isset($_POST['update_cuenta'])) {
  $id = $_GET['id'];

  $id_usuario = $_POST['id_usuario'];
  $id_roll = $_POST['id_roll'];
  $alias = $_POST['alias'];
  $clave = $_POST['clave'];
  $id_estado = $_POST['id_estado'];

  $toku = strtok($id_usuario, ' ');
  $tokr = strtok($id_roll, ' ');
  $toke = strtok($id_estado, ' ');

  $query = "UPDATE gt_cuenta_usuario set id_usuario = '$toku', id_roll = '$tokr', alias = '$alias', clave = MD5('$clave'), id_estado = '$toke' WHERE id_cuenta=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: cuentas.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body">
      <form action="edit_cuenta.php?id=<?php echo $_GET['id']; ?>" method="POST">

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
                <label class = 'col-form-label'>Roll de Cuenta</label>
                <select name="id_roll" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_roll; ?></option>
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
            <label class = 'col-form-label'>ALIAS DE CUENTA</label>
          <input name="alias" type="text" class="form-control" value="<?php echo $alias; ?>" placeholder="alias" pattern="^([A-Za-z][A-Za-z0-9]{3,20}|([A-Za-z0-9]{3,20}\\s[A-Za-z0-9]{3,20}))$" title="maximo 2 palabras y cada palabra con longitud maxima de 20 (solo letras y numeros)">
            </div>


         <div class="form-group">
         <label class = 'col-form-label'>CLAVE</label>
          <input name="clave" type="text" class="form-control" placeholder="ingrese nuevamente o modifique su clave" pattern="^([A-Za-z0-9.:;*¡?¿()=&%$#!+_@{}\[\]|]\s?){8,30}$" title="mínimo 8 caracteres">
            </div>



            <div class="form-group">
                <label class = 'col-form-label'>Estado de cuenta</label>
                <select name="id_estado" class = 'custom-select d-block w-100'>
                <option selected><?php echo $id_estado; ?></option>
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



            <button class="btn-success" name="update_cuenta">
          Update
            </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
