<?php

include('db.php');

if (isset($_POST['btnsave_Reporte'])) {
  $id_reporte = $_POST['id_reporte'];
  $tipo_reporte = $_POST['tipo_reporte'];
  $detalles_reporte = $_POST['detalles_reporte'];
  $id_usuario = $_POST['id_usuario'];
  $ubicacion = $_POST['ubicacion'];
  $id_sensor = $_POST['id_sensor'];


  $tokr = strtok($tipo_reporte, ' ');
  $toku = strtok($id_usuario, ' ');
  $toks = strtok($id_sensor, ' ');


  $query = "INSERT INTO gt_reporte (id_reporte, tipo_reporte, detalles_reporte, fecha_reporte, id_usuario, ubicacion, id_sensor) VALUES ('$id_reporte', '$tokr', '$detalles_reporte', NOW(), '$toku', '$ubicacion', '$toks');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario agregado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: reportes.php');

}

?>
