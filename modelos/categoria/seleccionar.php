<?php
ini_set("display_errors", 0) ;
	include_once('../../conexion/conexion.php');
	$con = new conectar();

	$sSql = "SELECT * FROM `categorias`;";
	$count = 0;

	if ($respuesta = mysqli_query($con->conectarse(), $sSql)) {
		while ($resp = mysqli_fetch_array($respuesta)) {
			$r[$count]['nombre'] = $resp['nombre'];
			$r[$count]['id'] = $resp['idcategorias'];
			$count++;
		}
	}
	
	$r = json_encode($r);
	
	echo $r;
 ?>