<?php

include('db.php');

if (isset($_POST['btnsave_cuenta'])) {
  $id_cuenta = $_POST['id_cuenta'];
  $id_usuario = $_POST['id_usuario'];
  $id_roll = $_POST['id_roll'];
  $alias = $_POST['alias'];
  $clave = $_POST['clave'];
  $id_estado = $_POST['id_estado'];


  $toku = strtok($id_usuario, ' ');
  $tokr = strtok($id_roll, ' ');
  $toke = strtok($id_estado, ' ');

  $query = "INSERT INTO gt_cuenta_usuario (id_cuenta, id_usuario, id_roll, alias, clave, id_estado) VALUES ('$id_cuenta', '$toku','$tokr','$alias',MD5('$clave'),'$toke')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario agregado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: cuentas.php');

}

?>
