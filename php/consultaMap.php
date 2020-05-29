<?php
include ("conection.php");
$con= conectar();
echo "<script>alert('concecion exitosa')</script>";
$result = mysqli_query($con, "SELECT id,coordenadas,lugar FROM coordenadas");
$extraido= mysqli_fetch_array($result);
// echo "- id: ".$extraido['id']."<br/>";
$varPHP = "15.7270971 -90.1819147";
// while ($fila = $result -> fetch_assoc()) {
//     //<td>".$fila['coordenadas']."</td>
//  //echo "coordenadas: ".$fila['coordenadas']."<br/>";

//   # code...
// }
echo "$varPHP=".$varPHP;
 
// echo "- Dirección: ".$extraido['lugar']."<br/>";
// mysqli_free_result($result);
// mysqli_close($con);
?>

