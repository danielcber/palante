<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();

	$org = $_REQUEST['actorg'];
	$correo = $_REQUEST['actcorreo'];
	$telefono = $_REQUEST['acttelefono'];
	$descripcion = $_REQUEST['actdescripcion'];
	$facebook = $_REQUEST['actfacebook'];
	$twitter = $_REQUEST['acttwitter'];
	$instagram = $_REQUEST['actinstagram'];
	$id = $_REQUEST['actid'];

	$oSql = "UPDATE `organizaciones` SET `org`='$org', `correo`='$correo', `telefono`='$telefono', `descripcion`='$descripcion', `facebook`='$facebook', `twitter`='$twitter', `instagram`='$instagram' WHERE `id`='$id';";

	if(mysqli_query($con->conectarse(), $oSql)){
		mysqli_close($con->conectarse());
		echo 'true';
	}else{
		mysqli_close($con->conectarse());
		echo 'false';
	}

 ?>