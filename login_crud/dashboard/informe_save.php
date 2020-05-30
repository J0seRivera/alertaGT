<?php

include('db.php');

if (isset($_POST['btnsave_Informe'])) {
  $id_informe = $_POST['id_informe'];
  $direccion_almacenamiento = $_POST['direccion_almacenamiento'];
  $id_usuario = $_POST['id_usuario'];
  $titulo_informe = $_POST['titulo_informe'];
  $id_declaracion_alerta = $_POST['id_declaracion_alerta'];
  $id_grado_alerta = $_POST['id_grado_alerta'];
  $id_evento = $_POST['id_evento'];
  $medida_escala_evento = $_POST['medida_escala_evento'];
  $id_escala_evento = $_POST['id_escala_evento'];
  $fecha_informe = $_POST['fecha_informe'];


  $toku = strtok($id_usuario, ' ');
  $tokd = strtok($id_declaracion_alerta, ' ');
  $tokg = strtok($id_grado_alerta, ' ');
  $tokev = strtok($id_evento, ' ');
  $tokes = strtok($id_escala_evento, ' ');

  $query = "INSERT INTO gt_informe (id_informe, direccion_almacenamiento, id_usuario, titulo_informe, id_declaracion_alerta, id_grado_alerta, id_evento, medida_escala_evento, id_escala_evento, fecha_informe) VALUES ('$id_informe', '$direccion_almacenamiento', '$toku', '$titulo_informe', '$tokd', '$tokg', '$tokev', '$medida_escala_evento', '$tokes', NOW())";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario agregado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: informe.php');

}

?>
