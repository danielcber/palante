

<?php

	include_once('../../conexion/conexion.php');
	$con = new conectar();
	$count = 0;

	$email = $_REQUEST['email'];
	$contrasena = $_REQUEST['contrasena'];

	$sSql = "SELECT * from `users` where `email` = '$email';";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
		while($resp = mysqli_fetch_array($respuesta)){
		
			$p[$count]['id'] = $resp['id'];
			$p[$count]['nombre'] = $resp['nombre'];
			$p[$count]['email'] = $resp['email'];
			$p[$count]['contrasena'] = $resp['contrasena'];
			$p[$count]['telefono'] = $resp['telefono'];
			$p[$count]['descripcion'] = $resp['descripcion'];
			$p[$count]['facebook'] = $resp['facebook'];
			$p[$count]['twitter'] = $resp['twitter'];
			$p[$count]['instagram'] = $resp['instagram'];

			$count++;
		}
	}

	mysqli_close($con->conectarse());

	if( password_verify($contrasena, $p[0]['contrasena']) == true )
	{
		// Inicio la sesión
		session_start();
		
		// Declaro las variables de sesión
		$_SESSION['autentificado'] = true;
		$_SESSION['id'] = $p[0]['id'];
		$_SESSION['nombre'] = $p[0]['nombre'];
		$_SESSION['email'] = $p[0]['email'];
		$_SESSION['contrasena'] = $p[0]['contrasena'];
		$_SESSION['telefono'] = $p[0]['telefono'];
		$_SESSION['descripcion'] = $p[0]['descripcion'];
		$_SESSION['facebook'] = $p[0]['facebook'];
		$_SESSION['twitter'] = $p[0]['twitter'];
		$_SESSION['instagram'] = $p[0]['instagram'];
		

	}
	else
	{
		// header("Location: index.php?pag=login&error=si");
		echo $contrasena." ".$p[0]['contrasena'];
	}

 ?>