<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mapa</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/offcanvas/">
  <link rel="stylesheet" href="../styles/bootstrap.css">
  <link rel="stylesheet" href="../styles/mapstyle.css">
	<!-- <link rel="stylesheet" href="styles/mstyle.css"> -->
	
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">AlertaGT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Alertas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Boletines</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mapas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item active" id="caja_busqueda" href="mapa-alertas.html" name="caja_busqueda">Mapa de Alertas</a>
            <a class="dropdown-item" href="mapa-reacion.html">Mapa de Reacción Inmediata</a>
            <a class="dropdown-item" href="mapa-radio.html">Mapa de de Radio Vigilancia</a>
            <a class="dropdown-item" href="mapa-inundacion.html">Mapa de Amenaza por Inundación</a>
            <a class="dropdown-item" href="mapa-deslizamiento.html">Mapa de Amenaza por Deslizamientos</a>
            <a class="dropdown-item" href="mapa-ondas.html">Mapa de Ondas Meteorológicas</a>
            <a class="dropdown-item" href="mapa-incendios.html">Mapa de Incendios Forestales</a>
            <a class="dropdown-item" href="mapa-fenomenos.html">Mapa de Fenomenos Meteorológicos</a>
            <a class="dropdown-item" href="mapa-sismologia.html">Mapa de Sismología</a>
            <a class="dropdown-item" href="mapa-vulcanologia.html">Mapa de Vulcanología</a>
            <a class="dropdown-item" href="mapa-epidemia.html">Mapa de Epidemia</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre Nosotros</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-md-4'>
        <div class="titulo"><p class="titulo-mapa">Mapa de Alertas</p></div>
        <div class="subtitulo"><p>Descripción</p></div>
        <div class="contenido">
          <p class="alerta-verde">Alerta Verde</p>
          <div class="descr"><p>Esta alerta significa vigilancia y la principal recomendación al momento de que se activa es continuar con las actividades normales.</p></div>

          <p class="alerta-amarilla">Alerta Amarilla</p>
          <div class="descr"><p>La alerta amarilla significa prevención. Una de las recomendaciones principales cuando se activa es prepararse para actuar al momento de atender las instrucciones y recomendaciones de las autoridades.</p></div>

          <p class="alerta-naranja">Alerta Anaranjada</p>
          <div class="descr"><p>Esta alerta significa peligro. Lo que se recomienda cuando se activa es que los ciudadanos se mantengan alerta. Es decir que observen cualquier signo de peligro, si es necesario se debe evacuar de las zonas de peligro y dirigirse a refugios provisionales, además de atender las instrucciones de las autoridades.</p></div>

          <p class="alerta-roja">Alerta Roja</p>
					<div class="descr"><p>La alerta roja significa emergencia. La recomendación que brinda la CONRED al momento de activarla es evacuar las zonas de peligro, permanecer en refugios provisionales y seguir las instrucciones emitidas por las autoridades.</p></div>
					<div name="datos" id="datos"></div>
        </div>
      </div>
      <div class='col-md-8'>
        <div id="map" class="map"></div>
      </div>
    </div>
  </div>



	<script src="js/jquery.min.js"></script>
	<!-- <script src="js/main.js"></script> -->
  <!-- <script src="../login_crud/jquery/jquery-3.3.1.min.js"></script> -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaCYTttKjLu0PQ2ER0rbxqx1JxAAirVtE"></script>
  <script type="module" src="../javaScript/map.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../javaScript/jquery.slim.min.js"><\/script>')</script><script src="../javaScript/bootstrap.bundle.js"></script>
  <script src="../javaScript/offcanvas.js"></script>
</body>
</html>