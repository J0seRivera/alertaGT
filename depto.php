<?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM gt_departamento_pais";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Editar Tablas</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/offcanvas/">
    <!-- Bootstrap core CSS -->
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
    <link rel="stylesheet" href="styles/login.css">

    <!--JQUERY-->
  <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
  <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script 
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
  <!-- Los iconos tipo Solid de Fontawesome-->
  <link rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  
  <!-- Nuestro css-->
  <link rel="stylesheet" type="text/css" href="static/css/user-form.css"
    th:href="@{/css/user-form.css}">
  <!-- DATA TABLE -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript">
      $(document).ready(function() {
          //Asegurate que el id que le diste a la tabla sea igual al texto despues del simbolo #
          $('#userList').DataTable();
      } );
  </script>
  </head>
  <body class="cuerpo">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand " href="#">AlertaGT</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="inicio-admin.html">Inicio </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gestión de Usuarios<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
             <a class="nav-link" href="crud_reporte.php">Reportes</a>
           </li>
      <li class="nav-item ">
             <a class="nav-link" href="crud_informe.php">Informes</a>
           </li>
       <li class="nav-item ">
             <a class="nav-link " href="crud_boletin.php">Boletines</a>
           </li>
        <li class="nav-item ">
             <a class="nav-link" href="vitacora.php">Vitacora</a>
           </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Editar Tablas 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="roll.php">GT_ROLL_CUENTA</a>
            <a class="dropdown-item" href="estado_cuenta.php">ESTADO_CUENTA</a>
            <a class="dropdown-item" href="puesto.php">GT_PUESTO</a>
            <a class="dropdown-item" href="area.php">GT_AREA</a>
            <a class="dropdown-item" href="evento.php">GT_EVENTO</a>
            <a class="dropdown-item" href="escala_evento.php">GT_ESCALA_EVENTO</a>
            <a class="dropdown-item" href="cateogira_evento.php">CATEGORIA_EVENTO</a>
            <a class="dropdown-item" href="sensor.php">GT_SENSOR</a>
            <a class="dropdown-item" href="treporte.php">GT_TIPO_REPORTE</a>
            <a class="dropdown-item" href="mapat.php">GT_MAPA</a>
            <a class="dropdown-item" href="tipomapa.php">GT_TIPO_MAPA</a>
            <a class="dropdown-item" href="det_mapa.php">GT_DETALLE_MAPA</a>
            <a class="dropdown-item" href="region.php">GT_REGION_PAIS</a>
            <a class="dropdown-item" href="depto.php">GT_DEPARTAMENTO_PAIS</a>
            <a class="dropdown-item" href="municipio.php">GT_MUNICIPIO</a>
            <a class="dropdown-item" href="declaratoria_a.php">GT_DECLARATORIA_ALERTA</a>
            <a class="dropdown-item" href="grado_a.php">GT_GRADO_ALERTA</a>
          </div>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cerrar Sesión</a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
        <div class="card">
          <div class="card-header">
            <h4>GT DEPARTAMENTO PAIS</h4>
          </div>
          <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal">Añadir Registro</button>    
            </div>    
        </div>    
    </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="userList" class="table table-bordered table-hover table-striped">
                <thead class="thead-light">
                <tr>
                  <th scope="col">ID Departamento</th>
                  <th scope="col">Nombre Departamento</th>
                  <th scope="col">ID Región</th>
                  <th scope="col">Ubicación</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_departamento'] ?></td>
                                <td><?php echo $dat['nombre_departamento'] ?></td>
                                <td><?php echo $dat['id_region'] ?></td>
                                <td><?php echo $dat['ubicacion_apriximada'] ?></td>
                                <td>
                                   <div class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btnEditar">Editar</button>
                                        <button class="btn btn-danger btnEditar">Borrar</button>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>  
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
 
    </div>
  <!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ID Departamento</label>
                       <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">ID</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="iddepartamento" required>
            <div class="invalid-feedback" style="width: 100%;">
              Es necesario llenar este campo.
            </div>
          </div>
                    </div>
                    </div>  
                </div>
            
              <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Nombre Departamento</label>
                    <input type="text" class="form-control" id="ndepartamento">
                        </div>
                    </div>    
                  </div>
               <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">ID Región</label>
                        <select class="custom-select d-block w-100" id="iregion" required>
              <option value="">Seleccionar</option>
              <option>No.1 xxxx</option>
            </select>
                        </div>
                    </div>      
                </div>
             
                    
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
  </body>