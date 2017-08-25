<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();

	$userid = $_REQUEST['userid'];
	$titulo = $_REQUEST['titulo'];
	$ubicacion = $_REQUEST['ubicacion'];
	$organizacion = $_REQUEST['organizacion'];
	$cat = $_REQUEST['categoria'];
	$startdate = $_REQUEST['startdate'];
	$starttime = $_REQUEST['starttime'];
	$enddate = $_REQUEST['enddate'];
	$endtime = $_REQUEST['endtime'];
	$cantidad = $_REQUEST['entradacantidad'];
	$precio = $_REQUEST['entradaprecio'];
	$descripcion = $_REQUEST['descripcion'];
	$imagen=$_FILES['imagen']['name'];
	$ruta=$_FILES['imagen']['tmp_name'];
	$destino='../../imagenes/'.$imagen;
	copy($ruta,$destino);

	$startdate = date("Y-m-d",strtotime(str_replace('/','-', $startdate)));
	$enddate = date("Y-m-d",strtotime(str_replace('/','-', $enddate)));
	$starttime = date("H:i:s",strtotime($starttime));
	$endtime = date("H:i:s",strtotime($endtime));

	$sSql = "INSERT INTO `eventos` (`user_id`, `titulo`, `ubicacion`, `org_id`, `cat_id`, `start_date`, `start_time`, `end_date`, `end_time`, `entradacantidad`, `entradaprecio`, `descripcion`, `imagen`) VALUES ('$userid', '$titulo', '$ubicacion', '$organizacion', '$cat', '$startdate', '$starttime', '$enddate', '$endtime', '$cantidad', '$precio', '$descripcion', '$destino');";

	if (mysqli_query($con->conectarse(), $sSql)) {
		$respuesta['mensaje'] = $sSql;
		$respuesta['tipo'] = 'true';
		header('Location:../../index.php?evento=listar');
		// $respuesta = json_encode($respuesta);
		// echo $respuesta;
	} else {
		$respuesta['mensaje'] = 'Problemas para insertar registro';
		$respuesta['tipo'] = 'false';
		$respuesta = json_encode($respuesta);
		// echo $respuesta;
		echo $respuesta;
	}
	mysqli_close($con->conectarse());


 ?>