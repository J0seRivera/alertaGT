<?php
	$servername = "localhost";
    $username = "root";
  	$password = "mysqladmin";
  	$dbname = "mapa";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT coordenadas FROM coordenadas";


    $resultado = $conn->query($query);

		// if ($resultado->num_rows>0) {
    // 	$salida.="<table border=1 class='tabla_datos'>
    // 			<thead>
    // 				<tr id='titulo'>
    // 					<td>ID</td>
    // 					<td>COORDENADAS</td>
    // 					<td>LUGAR</td>
    				
    // 				</tr>

    // 			</thead>
    			

    // 	<tbody>";

    // 	while ($fila = $resultado->fetch_assoc()) {
    // 		$salida.="<tr>
    // 					<td>".$fila['id']."</td>
    // 					<td>".$fila['coordenadas']."</td>
    // 					<td>".$fila['lugar']."</td>
    // 				</tr>";

    // 	}
    // 	$salida.="</tbody></table>";
    // }else{
    // 	$salida.="NO HAY DATOS :(";
    // }
    
    //	while ($fila = $resultado->fetch_assoc()) {
			$fila = $resultado->fetch_assoc();
			$salida.=$fila['coordenadas'];
    //	}
    	
    echo $salida;

    //$conn->close();
?>