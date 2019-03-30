<?php

require '../server/conexionBD.php';

$conexion = new ConectorBD();

if ($conexion->initConexion() == 'OK'){
    $datos['nombres'] = "'Juan Chimente'";
    $datos['correo'] = "'juanma@gmail.com'";
    $datos['password'] = "'".password_hash("123", PASSWORD_DEFAULT)."'";
    $datos['fecha_nacimiento'] = "'13/09/1991'";

    if ($conexion->insertData('usuarios', $datos)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";

    $datos['nombres'] = "'Thomas Ardila'";
    $datos['correo'] = "'thomas@gmail.com'";
    $datos['password'] = "'".password_hash("000", PASSWORD_DEFAULT)."'";
    $datos['fecha_nacimiento'] = "'06/10/1993'";

    if ($conexion->insertData('usuarios', $datos)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";

    $datos['nombres'] = "'Danna Afanador'";
    $datos['correo'] = "'danna@gmail.com'";
    $datos['password'] = "'".password_hash("999", PASSWORD_DEFAULT)."'";
    $datos['fecha_nacimiento'] = "'18/06/2003'";

    if ($conexion->insertData('usuarios', $datos)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";


    $conexion->cerrarConexion();
}else {
    echo "Se presentó un error en la conexión";
}

?>
