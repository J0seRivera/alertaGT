<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Contenido principal</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_usuario, nombre, apellido, puesto, id_departamento, correo, telefono, direccion, municipio FROM usuario";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%; font-size:12px;">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>                                
                                <th>Pto</th>
                                <th>Dpto</th>
                                <th>correo</th>
                                <th>tel</th>
                                <th>direc</th>
                                <th>muni</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_usuario'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellido'] ?></td>
                                <td><?php echo $dat['puesto'] ?></td>
                                <td><?php echo $dat['id_departamento'] ?></td>
                                <td><?php echo $dat['correo'] ?></td> 
                                <td><?php echo $dat['telefono'] ?></td> 
                                <td><?php echo $dat['direccion'] ?></td> 
                                <td><?php echo $dat['municipio'] ?></td> 
                                <td></td>
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
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="id_usuario" class="col-form-label">id_usuario:</label>
                <input type="text" class="form-control" id="id_usuario">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="apellido" class="col-form-label">apellido:</label>
                <input type="text" class="form-control" id="apellido">
                </div>                
                <div class="form-group">
                <label for="puesto" class="col-form-label">puesto:</label>
                <input type="number" class="form-control" id="puesto">
                </div>
                <div class="form-group">
                <label for="id_departamento" class="col-form-label">id_departamento:</label>
                <input type="text" class="form-control" id="id_departamento">
                </div>
                <div class="form-group">
                <label for="correo" class="col-form-label">correo:</label>
                <input type="text" class="form-control" id="correo">
                </div>
                <div class="form-group">
                <label for="telefono" class="col-form-label">telefono:</label>
                <input type="text" class="form-control" id="telefono">
                </div>
                <div class="form-group">
                <label for="direccion" class="col-form-label">direccion:</label>
                <input type="text" class="form-control" id="direccion">
                </div>
                <div class="form-group">
                <label for="municipio" class="col-form-label">municipio:</label>
                <input type="text" class="form-control" id="municipio">
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
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>