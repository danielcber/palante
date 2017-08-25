<?php

	include_once('../../conexion/conexion.php');
	$con = new conectar();
	$count = 0;

	$id = $_REQUEST['id'];

	$sSql = "SELECT * from `organizaciones` where `user_id` = '$id';";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
		while($resp = mysqli_fetch_array($respuesta)){
		
			$p[$count]['id'] = $resp['id'];
			$p[$count]['org'] = $resp['org'];
			$p[$count]['correo'] = $resp['correo'];
			$p[$count]['telefono'] = $resp['telefono'];
			$p[$count]['descripcion'] = $resp['descripcion'];
			$p[$count]['facebook'] = $resp['facebook'];
			$p[$count]['twitter'] = $resp['twitter'];
			$p[$count]['instagram'] = $resp['instagram'];

			$count++;
		}
	}

	$p = json_encode($p);

	echo $p;

	mysqli_close($con->conectarse());