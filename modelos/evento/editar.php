<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();

	$id = $_REQUEST['id'];
	$titulo = $_REQUEST['titulo'];
	$ubicacion = $_REQUEST['ubicacion'];
	$organizacion = $_REQUEST['organizacion'];
	$categoria = $_REQUEST['categoria'];
	$startdate = $_REQUEST['startdate'];
	$starttime = $_REQUEST['starttime'];
	$enddate = $_REQUEST['enddate'];
	$endtime = $_REQUEST['endtime'];
	$cantidad = $_REQUEST['entradacantidad'];
	$precio = $_REQUEST['entradaprecio'];
	$descripcion = $_REQUEST['descripcion'];

	$startdate = date("Y-m-d",strtotime(str_replace('/','-', $startdate)));
	$enddate = date("Y-m-d",strtotime(str_replace('/','-', $enddate)));
	$starttime = date("H:i:s",strtotime($starttime));
	$endtime = date("H:i:s",strtotime($endtime));

	$oSql = "UPDATE `eventos` SET `titulo`='$titulo', `ubicacion`='$ubicacion', `org_id`='$organizacion', `cat_id`='$categoria', `start_date`='$startdate', `start_time`='$starttime', `end_date`='$enddate', `end_time`='$endtime', `entradacantidad`='$cantidad', `entradaprecio`='$precio', `descripcion`='$descripcion' WHERE `id`='$id';";

	if(mysqli_query($con->conectarse(), $oSql)){
		mysqli_close($con->conectarse());
		echo "true";
	}else{
		mysqli_close($con->conectarse());
		echo 'false';
	}

 ?>