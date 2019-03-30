<?php
session_start();
require '../server/conexionBD.php';

$conexion = new ConectorBD();
if ($conexion->initConexion() == 'OK'){

    $resultado = $conexion->obtenerEventos($_SESSION['id']);
    $rows = array();
	while($r = mysqli_fetch_assoc($resultado)) {
	    $rows[] = $r;
	}
	$php_response = array("msg"=>"OK","eventos"=>$rows);   
	echo json_encode($php_response);

    $con->cerrarConexion();
}else {
    echo "Error en la conexión";
}

 ?>