<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Editar Informe</title>
    <link rel="stylesheet" href="styles/login.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="styles/bootstrap.css" rel="stylesheet">

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
    <!-- Custom styles for this template -->
    <link href="styles/offcanvas.css" rel="stylesheet">
  </head>
  <body class="cuerpo">
    
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="inicio-admin.html">AlertaGT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="inicio-admin.html">Inicio </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Gestión de Usuarios <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item ">
             <a class="nav-link" href="#">Reportes</a>
           </li>
           <li class="nav-item active">
             <a class="nav-link active" href="informe.html">Informes</a>
           </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cerrar Sesión</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> -->
          </ul>
        </div>
      </nav>
      <div class="nav-scroller bg-white shadow-sm">
        <nav class="nav nav-underline">
          <div class="nav-link">Opciones</div>
          <a class="nav-link" href="lista_informes.html">
            Listar Informes
          </a>
          <a class="nav-link" href="informe.html">Generar Informe</a>
          <a class="nav-link active" href="edi_informe.html">Editar Informe</a>
          <a class="nav-link" href="buzon_informe.html">Buzón de Informes</a>
        </nav>
      </div>
    
    <div class="container">
      <div class="py-5 text-center">
    
    <h2>EDITAR INFORME</h2>
  
  </div>

  <div class="row ">
    <label> Para modificar un reporte, ingrese el número de reporte y luego presione el botón "Buscar". Seguidamente ud podrá Modificar ó Eliminar la información solicitada</label>
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="opcion">Elija una opción</span>
       
      </h4>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Buscar</button>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar</button>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Eliminar</button>
    </div>

    <div class="col-md-8 order-md-1">
      
      <div class="mb-3">
          <label for="username">No. de Informe</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">ID</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Informe" required>
            <div class="invalid-feedback" style="width: 100%;">
              Es necesario llenar este campo.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">ID Usuario</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">id</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your id is required.
            </div>
          </div>
        </div>

        <div class="mb-3">

          <label for="address2">Fecha <span class="text-muted"></span></label>
          <input type="date" class="form-control" name="fecha" min="1900-01-01"
                                  max="2100-01-01" step="1">
                                  <div class="invalid-feedback">
            Please insert a date.
          </div>
        </div>

        <div class="mb-3">
          <label for="coord">Ubicación</label>
          <input type="text" class="form-control" id="address" placeholder="Ej: 14°44'44.7'N 91°09'18.7'W'" required>
          <div class="invalid-feedback">
            Por favor ingresa coordenadas.
          </div>
        </div>


        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Tipo de Alerta</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Seleccionar</option>
              <option>Institucional</option>
              <option>Pública</option>
              <option>Otro</option>
            </select>
            <div class="invalid-feedback">
              Por favor seleccione una opción.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Grado de Alerta</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Seleccionar</option>
              <option>Verde</option>
              <option>Amarilla</option>
              <option>Naranja</option>
              <option>Roja</option>
            </select>
            <div class="invalid-feedback">
              Por favor seleccione una opción.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Alerta</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Seleccionar</option>
              <option>Alerta de Sismos</option>
              <option>Alerta de Vulcanología</option>
              <option>Alerta de Meteoroloía</option>
              <option>Alerta de Incendios Forestales</option>
            </select>
            <div class="invalid-feedback">
              Por favor seleccione una opción.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Evento</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Seleccionar</option>
              <option>Sismologia</option>
              <option>Vulcanología</option>
              <option>Meteorología</option>
              <option>Incendios Forestales</option>
            </select>
            <div class="invalid-feedback">
              Por favor seleccione una opción.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="coord">Medida del Evento</label>
          <input type="text" class="form-control" id="address" placeholder="Ej: 14.456" required>
          <div class="invalid-feedback">
            Por favor la medida.
          </div>
        </div>

        <div class="col-md-5 mb-3">
        <label for="sensor">Escala del Evento</label>

          <select class="custom-select d-block w-100" id="country" required>
            <option value="">Seleccionar</option>
            <option>Ritcher</option>
            <option>Mercalli</option>
            <option>Centimetros Cúbicos</option>
            <option>Metros Cúbicos</option>

          </select>
          <div class="invalid-feedback">
            Por favor seleccione una opción.
          </div>
        </div>
        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>
  </div>

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
        <script src="form-validation.js"></script></body>
</html>
