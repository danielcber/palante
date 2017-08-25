<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();

	$nombre = $_REQUEST['nombre'];
	$email = $_REQUEST['email'];
	$contrasena = $_REQUEST['contrasena'];
	$confirmacion = $_REQUEST['confirmacion'];
	
	$bcrypt = password_hash($contrasena, PASSWORD_BCRYPT);


	$sSql = "INSERT INTO `users` (`nombre`, `email`, `contrasena`) VALUES ('$nombre', '$email', '$bcrypt');";


	if (mysqli_query($con->conectarse(), $sSql) and ($contrasena === $confirmacion)) {
		include_once('../sesion/control.php');
	} else {
		$respuesta['mensaje'] = 'Problemas para insertar registro';
		$respuesta['tipo'] = 'false';
		$respuesta = json_encode($respuesta);
		echo $respuesta;
	}
	mysqli_close($con->conectarse());


 ?>