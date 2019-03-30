<?php

session_start();
require '../server/conexionBD.php';

$titulo = $_POST['titulo'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$end_hour = $_POST['end_hour'];
$start_hour = $_POST['start_hour'];

$conexion = new ConectorBD();
if ($conexion->initConexion() == 'OK'){
	$datos['fk_usuarios'] = "'".$_SESSION['id']."'";
	$datos['titulo'] = "'".$titulo."'";
    $datos['fecha_inicio'] = "'".$start_date."'";
    $datos['fecha_fin'] = "'".$end_date."'";
    $datos['hora_inicio'] = "'".$end_hour."'";
    $datos['hora_fin'] = "'".$start_hour."'";


    if ($conexion->insertData('eventos', $datos)) {
      //echo "Se han registrado los datos correctamente";
      	$php_response=array("msg"=>"OK","data"=>"2");  
    }else{
    	$php_response=array("msg"=>"Error la registrar los datos","data"=>"2"); 
    }
    echo json_encode($php_response, JSON_FORCE_OBJECT);
    $conexion->cerrarConexion();
}else {
    echo "Error en la conexión";
}

?>
