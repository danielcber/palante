<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();

	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
	$email = $_REQUEST['email'];
	$telefono = $_REQUEST['telefono'];
	$descripcion = $_REQUEST['descripcion'];
	$facebook = $_REQUEST['facebook'];
	$twitter = $_REQUEST['twitter'];
	$instagram = $_REQUEST['instagram'];
	$contrasenaverificar = $_REQUEST['contrasenaverificar'];
	$contrasena = $_REQUEST['contrasena'];

	if (password_verify($contrasena, $contrasenaverificar)) {

		$qSql = "UPDATE `users` SET `nombre`='$nombre', `email`='$email', `telefono`='$telefono', `descripcion`='$descripcion', `facebook`='$facebook', `twitter`='$twitter', `instagram`='$instagram' WHERE `id`='$id';";

		if (mysqli_query($con->conectarse(), $qSql)) {
			$respuesta['mensaje'] = 'Has actualizado tus datos!';
			$respuesta['tipo'] = true;
			$respuesta = json_encode($respuesta);
			echo $respuesta;
			session_start();
			session_destroy();
			include_once('../sesion/control.php');
		} else {
			$respuesta['mensaje'] = 'Problemas para insertar registro';
			$respuesta['tipo'] = false;
			$respuesta = json_encode($respuesta);
			echo $respuesta;
		}
	} else {
		$respuesta['mensaje'] = 'Contraseña equivocada';
			$respuesta['tipo'] = false;
			$respuesta = json_encode($respuesta);
			echo $respuesta;
	}
	mysqli_close($con->conectarse());


 ?>