<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();

	$userid = $_REQUEST['userid'];
	$eventoid = $_REQUEST['eventoid'];

	$sSql = "INSERT INTO `asistencia` (`userid`, `eventoid`) VALUES ('$userid', '$eventoid');";


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