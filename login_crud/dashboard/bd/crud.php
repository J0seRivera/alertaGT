<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$id_departamento = (isset($_POST['id_departamento'])) ? $_POST['id_departamento'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : '';

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO usuario (id_usuario, nombre, apellido, puesto, id_departamento, correo, telefono, direccion, municipio) VALUES('$id_usuario', '$nombre', '$apellido','$puesto', '$id_departamento', '$correo','$telefono', '$direccion', '$municipio') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_usuario, nombre, apellido, puesto, id_departamento, correo, telefono, direccion, municipio FROM usuario ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', puesto='$puesto', id_departamento='$id_departamento', correo='$correo', telefono='$telefono', direccion='$direccion', municipio='$municipio' WHERE id_usuario='$id_usuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_usuario, nombre, apellido, puesto, id_departamento, correo, telefono, direccion, municipio FROM usuario WHERE id_usuario='$id_usuario' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM usuario WHERE id_usuario='$id_usuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
