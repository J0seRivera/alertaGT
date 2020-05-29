<?php
function conectar(){
  $host = "localhost";
  $user = "root";
  $pass = "mysqladmin";
  $db = "mapa";
  $con = mysqli_connect($host, $user, $pass, $db) or die("Error de coneccion".mysql_error());
  mysqli_select_db($con,$db);
  return $con;
}
?>