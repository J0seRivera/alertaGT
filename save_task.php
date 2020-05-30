<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $id_usuario = $_POST['id_usuario'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $id_puesto = $_POST['id_puesto'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $id_municipio = $_POST['id_municipio'];
  $direccion = $_POST['direccion'];

  $tok = strtok($id_puesto, ' ');
  $tokm = strtok($id_municipio, ' ');

  $query = "INSERT INTO gt_usuario (id_usuario, nombre, apellido, id_puesto, correo, telefono, id_municipio, direccion) VALUES ('$id_usuario', '$nombre','$apellido','$tok','$correo','$telefono','$tokm','$direccion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario agregado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
