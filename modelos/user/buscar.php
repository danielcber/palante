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

	$p = json_encode($p);
	echo $p;
 ?>