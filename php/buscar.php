<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "bd_alertagt";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM gt_informe WHERE id_informe NOT LIKE '' ORDER By id_informe LIMIT 25";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM gt_informe WHERE id_informe LIKE '%$q%' OR titulo_informe LIKE '%$q%' OR id_evento LIKE '%$q%' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<div class='desc'>
      <div class='my-3 p-3 bg-white rounded shadow-sm'>
        <h6 class='border-bottom border-gray pb-2 mb-0'>Buzón de Boletínes</h6>
        ";

    	while ($fila = $resultado->fetch_assoc()) {
				$salida.="
				<a href='../boletines.html'>
        <div class='media text-muted pt-3'>
          <svg class='bd-placeholder-img mr-2 rounded' width='32' height='32' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: 32x32'><title>Placeholder</title><rect width='100%' height='100%' fill='#007bff'/><text x='50%' y='50%' fill='#007bff' dy='.3em'>32x32</text></svg>
          <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
				
            <strong class='d-block text-gray-dark'>Reporte No. 00".$fila['id_informe']."</strong>
            ".$fila['descripcion']."
          </p></div>
					</a>";

    	}
			$salida.="
			</div>
    </div>
			";
    }else{
    	$salida.="NO HAY DATOS";
    }


    echo $salida;

    $conn->close();



?>