<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM gt_informe WHERE id_informe = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario eliminado correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: informe.php');
}

?>
