<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class = 'container'>
<h1>GESTIONAR INFORMES</h1>

<?php include("db.php"); ?>


<div class = 'container'>
    <div class = 'row'>
        <div class = 'col-lg-12'>
            <button id = 'btnNuevoInforme' type = 'button' class = 'btn btn-success' data-toggle = 'modal'>Nuevo Informe</button>
        </div>
                </div>
                </div>
                <br>
                <div class = 'container'>
            <div class = 'row'>
            <div class = 'col-lg-12'>
            <div class = 'table-responsive'>
            <table id = 'tablaInforme' class = 'table table-striped table-bordered table-condensed' style = 'width:100%; font-size:8px;'>
                <thead class = 'text-center'>
                <tr>
            <th>id inf</th>
            <th>detalle</th>
            <th>usuario</th>
            <th>titulo informe</th>
            <th>declaracion alerta</th>
            <th>grado alerta</th>
            <th>evento</th>
            <th>medida</th>
            <th>escala evento</th>
            <th>fecha informe</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT id_informe, direccion_almacenamiento, nombre, titulo_informe, nombre_declaracion, nombre_grado,  nombre_evento, medida_escala_evento, nombre_escala, fecha_informe FROM gt_informe join gt_usuario on(gt_informe.id_usuario=gt_usuario.id_usuario) join gt_declaracion_alerta on(gt_informe.id_declaracion_alerta=gt_declaracion_alerta.id_declaracion) join gt_grado_alerta on(gt_informe.id_grado_alerta=gt_grado_alerta.id_grado) join gt_evento on(gt_informe.id_evento=gt_evento.id_evento) join gt_escala_evento on(gt_informe.id_escala_evento=gt_escala_evento.id_escala);";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_informe']; ?></td>
            <td><?php echo $row['direccion_almacenamiento']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['titulo_informe']; ?></td>
            <td><?php echo $row['nombre_declaracion']; ?></td>
            <td><?php echo $row['nombre_grado']; ?></td>
            <td><?php echo $row['nombre_evento']; ?></td>
            <td><?php echo $row['medida_escala_evento']; ?></td>
            <td><?php echo $row['nombre_escala']; ?></td>
            <td><?php echo $row['fecha_informe']; ?></td>
            <td>
              <a href="informe_edit.php?id=<?php echo $row['id_informe']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="informe_delete.php?id=<?php echo $row['id_informe']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
</table>
</div>
</div>
</div>
</div>

<!--Modal para CRUD-->
<div class = 'modal fade' id = 'modalCRUD2' tabindex = '-1' role = 'dialog' aria-labelledby = 'exampleModalLabel' aria-hidden = 'true'>
<div class = 'modal-dialog' role = 'document'>
<div class = 'modal-content'>
<div class = 'modal-header'>
<h5 class = 'modal-title' id = 'exampleModalLabel'></h5>
<button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'><span aria-hidden = 'true'>&times;
</span>
</button>
</div>
<form action="informe_save.php" method="POST">
    <div class = 'modal-body'>

        <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
    
        <label class = 'col-form-label'>NUEVA CUENTA</label>
       

          <div class="form-group">
            <input type="text" name="id_informe" class="form-control" placeholder="id informe" pattern="[\d]+" title="El ID debe ser un número entero" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="direccion_almacenamiento" class="form-control" placeholder="direccion para almacenar el informe" autofocus>
          </div>

          <div class="form-group">
                <label class = 'col-form-label'>Usuario</label>
                <select name="id_usuario" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_usuario, nombre FROM gt_usuario;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_usuario'],' ',$dat['nombre']?>"><?php echo $dat['id_usuario'],' ',$dat['nombre']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>

          <div class="form-group">
            <input type="text" name="titulo_informe" class="form-control" placeholder="titulo del informe" autofocus>
          </div>
          
          <div class="form-group">
                <label class = 'col-form-label'>Declaración de alerta</label>
                <select name="id_declaracion_alerta" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_declaracion, nombre_declaracion FROM gt_declaracion_alerta;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_declaracion'],' ',$dat['nombre_declaracion']?>"><?php echo $dat['id_declaracion'],' ',$dat['nombre_declaracion']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>



          <div class="form-group">
                <label class = 'col-form-label'>Grado de alerta</label>
                <select name="id_grado_alerta" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_grado, nombre_grado FROM gt_grado_alerta;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_grado'],' ',$dat['nombre_grado']?>"><?php echo $dat['id_grado'],' ',$dat['nombre_grado']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>
                    

          <div class="form-group">
                <label class = 'col-form-label'>Evento sucedido</label>
                <select name="id_evento" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_evento, nombre_evento FROM gt_evento;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_evento'],' ',$dat['nombre_evento']?>"><?php echo $dat['id_evento'],' ',$dat['nombre_evento']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <div class="form-group">
            <input type="text" name="medida_escala_evento" class="form-control" placeholder="magnitud o medida del evento" autofocus>
          </div>

          
          <div class="form-group">
                <label class = 'col-form-label'>Escala del evento</label>
                <select name="id_escala_evento" class = 'custom-select d-block w-100'>

                    <?php
                    include_once './bd/conexion.php';
                    $objeto = new Conexion();
                    $conexion = $objeto->Conectar();

                    $consulta = 'SELECT id_escala, nombre_escala FROM gt_escala_evento;';
                    $resultado = $conexion->prepare( $consulta );
                    $resultado->execute();
                    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
                    ?>
                    <?php
                    foreach ( $data as $dat ) {

                        ?>
                        <tr>
                        <option value="<?php echo $dat['id_escala'],' ',$dat['nombre_escala']?>"><?php echo $dat['id_escala'],' ',$dat['nombre_escala']?></option>
                        </tr>
                        <?php
                    }
                    ?>

                </select>
          </div>


          <input type="submit" name="btnsave_Informe" class="btn btn-success btn-block" value="REGISTRAR INFORME">
        


        </div>
    </form>
    </div>
    </div>
    </div>

</div>
<!--FIN del cont principal-->
<?php require_once 'vistas/parte_inferior.php'?>