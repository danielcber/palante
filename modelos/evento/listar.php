<?php

	include_once('../../conexion/conexion.php');
	$con = new conectar();
	$count = 0;

	$id = $_REQUEST['id'];

	$sSql = "SELECT * from `eventos` where `user_id` = '$id';";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
		while($resp = mysqli_fetch_array($respuesta)){
		
			$p[$count]['id'] = $resp['id'];
			$p[$count]['titulo'] = $resp['titulo'];
			$p[$count]['ubicacion'] = $resp['ubicacion'];
			$p[$count]['organizacion'] = $resp['org_id'];
			$p[$count]['startdate'] = $resp['start_date'];
			$p[$count]['starttime'] = $resp['start_time'];
			$p[$count]['enddate'] = $resp['end_date'];
			$p[$count]['endtime'] = $resp['end_time'];
			$p[$count]['entradaprecio'] = $resp['entradaprecio'];
			$p[$count]['entradacantidad'] = $resp['entradacantidad'];
			$p[$count]['descripcion'] = $resp['descripcion'];

			$count++;
		}
	}

	$p = json_encode($p);

	echo $p;

	mysqli_close($con->conectarse());