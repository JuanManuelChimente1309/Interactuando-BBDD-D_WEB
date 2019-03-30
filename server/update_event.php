<?php
session_start();
require '../server/conexionBD.php';

$conexion = new ConectorBD();
if ($conexion->initConexion() == 'OK'){

    $idevento = $_POST["id"];
    if($conexion->actualizarEvento($idevento,$_SESSION['id'])){
    	$php_response = array("msg"=>"OK","eventos"=>$idevento);  
    }else{
    	$php_response = array("msg"=>"Error al eliminar el evento","eventos"=>$idevento); 
    }
	 
	echo json_encode($php_response, JSON_FORCE_OBJECT);

    $conexion->cerrarConexion();
    
}else {
    echo "Error en la conexión";
}

 ?>