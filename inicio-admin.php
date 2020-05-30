<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: login_crud/index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Inicio</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">
    <!-- Bootstrap core CSS -->
   
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://conred.gob.gt/site/images/logo.png" />
    <link rel="stylesheet" href="styles/blog.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="styles/offcanvas.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  <link href="styles/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">


    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand " href="index.html">AlertaGT</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./login_crud/dashboard/index.php">Usuarios</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mapas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href="mapa-alertas.html">Mapa de Alertas</a>
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
      <a class="nav-link" href="#">Alertas</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="crud_reporte.php">Reportes</a>
        
      </li>
      <li class="nav-item">
      <a class="nav-link" href="crud_informe.php">Informes</a>
        
      </li>
      <li class="nav-item">
      <a class="nav-link " href="crud_boletin.php">Boletines</a>
        
      </li>
      <li class="nav-item">
      <a class="nav-link" href="vitacora.php">Vitacora</a>
        
      </li>
    </ul>

    
    <form class="form-inline my-2 my-lg-0">
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="login_crud/bd/logout.php">Log out</a> </button>
    </form>
  </div>
</nav>

  </header>

    <main role="main" class="inner cover">
    <img class="conred-logo" src="images/conred-logo.png" alt="logo">
    <h1 class="cover-heading">Bienvenido.</h1>
    </p>
  </main>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 TuSoft</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="javaScript/jquery.slim.min.js"><\/script>')</script><script src="javaScript/bootstrap.bundle.js"></script>
        <script src="javaScript/offcanvas.js"></script>
</body>
</html>
