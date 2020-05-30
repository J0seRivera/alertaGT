<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM gt_cuenta_usuario WHERE id_cuenta = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Cuenta eliminado correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: cuentas.php');
}

?>
