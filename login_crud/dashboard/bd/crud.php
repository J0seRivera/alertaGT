<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS

$opcion = ( isset( $_POST['opcion'] ) ) ? $_POST['opcion'] : '';
$id_usuario = ( isset( $_POST['id_usuario'] ) ) ? $_POST['id_usuario'] : '';
$nombre = ( isset( $_POST['nombre'] ) ) ? $_POST['nombre'] : '';
$apellido = ( isset( $_POST['apellido'] ) ) ? $_POST['apellido'] : '';
$id_puesto = ( isset( $_POST['id_puesto'] ) ) ? $_POST['id_puesto'] : '';
$correo = ( isset( $_POST['correo'] ) ) ? $_POST['correo'] : '';
$telefono = ( isset( $_POST['telefono'] ) ) ? $_POST['telefono'] : '';
$id_municipio = ( isset( $_POST['id_municipio'] ) ) ? $_POST['id_municipio'] : '';
$direccion = ( isset( $_POST['direccion'] ) ) ? $_POST['direccion'] : '';

switch( $opcion ) {
    case 1: //alta
        
    $consulta1 = "SELECT id_puesto from gt_puesto WHERE nombre_puesto='$id_puesto'";
    $resultado1 = $conexion->prepare( $consulta1 );
    $resultado1->execute();

    $consulta2 = "SELECT id_municipio from gt_municipio WHERE nombre_municipio='$id_municipio'";
    $resultado2 = $conexion->prepare( $consulta2 );
    $resultado2->execute();

    $consulta = "INSERT INTO gt_usuario (id_usuario, nombre, apellido, id_puesto, correo, telefono, id_municipio, direccion) VALUES('$id_usuario', '$nombre', '$apellido','$resultado1','$correo','$telefono', '$resultado2', '$direccion') ";

    $resultado = $conexion->prepare( $consulta );
    $resultado->execute();


    $consulta = 'SELECT id_usuario, nombre, apellido, nombre_puesto, correo, telefono, nombre_municipio, direccion FROM gt_usuario join gt_puestos on(gt_usuario.id_puesto=gt_puestos.id_puesto) join gt_municipio on(gt_usuario.id_municipio=gt_municipio.id_municipio);';
    $resultado = $conexion->prepare( $consulta );
    $resultado->execute();
    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
 
    break;
    case 2: //modificación
    $consulta = "UPDATE gt_usuario SET nombre='$nombre', apellido='$apellido', id_puesto='$id_puesto', correo='$correo', telefono='$telefono', id_municipio='$id_municipio', direccion='$direccion'  WHERE id_usuario='$id_usuario' ";

    $resultado = $conexion->prepare( $consulta );
    $resultado->execute();

    $consulta = "SELECT id_usuario, nombre, apellido, id_puesto, correo, telefono, id_municipio, direccion FROM gt_usuario WHERE id_usuario='$id_usuario' ";

    $resultado = $conexion->prepare( $consulta );
    $resultado->execute();
    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
    break;

    case 3://baja
    $consulta = "DELETE FROM gt_usuario WHERE id_usuario='$id_usuario' ";

    $resultado = $conexion->prepare( $consulta );
    $resultado->execute();

    $consulta = 'SELECT id_usuario, nombre, apellido, nombre_puesto, correo, telefono, nombre_municipio, direccion FROM gt_usuario join gt_puestos on(gt_usuario.id_puesto=gt_puestos.id_puesto) join gt_municipio on(gt_usuario.id_municipio=gt_municipio.id_municipio);';
    $resultado = $conexion->prepare( $consulta );
    $resultado->execute();
    $data = $resultado->fetchAll( PDO::FETCH_ASSOC );
    break;

}

print json_encode( $data, JSON_UNESCAPED_UNICODE );
//enviar el array final en formato json a JS
$conexion = NULL;
