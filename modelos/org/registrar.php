<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();

	$id = $_REQUEST['id'];
	$org = $_REQUEST['org'];
	$correo = $_REQUEST['correo'];
	$telefono = $_REQUEST['telefono'];
	$descripcion = $_REQUEST['descripcion'];
	$facebook = $_REQUEST['facebook'];
	$twitter = $_REQUEST['twitter'];
	$instagram = $_REQUEST['instagram'];

	$sSql = "INSERT INTO `organizaciones` (`user_id`, `org`, `correo`, `telefono`, `descripcion`, `facebook`, `twitter`, `instagram`) VALUES ('$id', '$org', '$correo', '$telefono', '$descripcion', '$facebook', '$twitter', '$instagram');";

	if (mysqli_query($con->conectarse(), $sSql)) {
		$respuesta['mensaje'] = 'Registro exitoso';
		$respuesta['tipo'] = 'true';
		$respuesta = json_encode($respuesta);
		echo $respuesta;
	} else {
		$respuesta['mensaje'] = 'Problemas para insertar registro';
		$respuesta['tipo'] = 'false';
		$respuesta = json_encode($respuesta);
		echo $sSql;
	}
	mysqli_close($con->conectarse());


 ?>