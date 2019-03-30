<?php
session_start();
require '../server/conexionBD.php';
$conexion = new ConectorBD();

$passw = $_POST["password"];
$email = $_POST["username"];

if ($conexion->initConexion() == 'OK'){
	$resultado = $conexion->datosUsuario($email);

	while ($rows = $resultado->fetch_array()) {
		 
		if(password_verify($passw, $rows["password"])) {
			$_SESSION['id'] = $rows["id"];

	    	$php_response = array("msg"=>"OK","data"=>"2");   

		}else{
			$php_response = array("msg"=>"El usuario no existe", "data"=>"2"); 
		}
		echo json_encode($php_response, JSON_FORCE_OBJECT);
	}

    $conexion->cerrarConexion();
}
?>