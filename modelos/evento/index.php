<?php

	include_once('../../conexion/conexion.php');
	$con = new conectar();
	$count = 0;

	$sSql = "SELECT `eventos`.`id`, `eventos`.`titulo`, `eventos`.`ubicacion`, `organizaciones`.`org`, `eventos`.`start_date`, `eventos`.`start_time`, `eventos`.`end_date`, `eventos`.`end_time`, `eventos`.`entradaprecio`, `eventos`.`entradacantidad`, `eventos`.`descripcion`, `eventos`.`imagen` from `eventos` inner join `organizaciones` on `eventos`.`org_id` = `organizaciones`.`id` where `eventos`.`end_date` >= CURDATE() order by `eventos`.`start_date` desc;";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
		while($resp = mysqli_fetch_array($respuesta)){
		
			$p[$count]['id'] = $resp['id'];
			$p[$count]['titulo'] = $resp['titulo'];
			$p[$count]['ubicacion'] = $resp['ubicacion'];
			$p[$count]['organizacion'] = $resp['org'];
			$p[$count]['startdate'] = $resp['start_date'];
			$p[$count]['starttime'] = $resp['start_time'];
			$p[$count]['enddate'] = $resp['end_date'];
			$p[$count]['endtime'] = $resp['end_time'];
			$p[$count]['entradaprecio'] = $resp['entradaprecio'];
			$p[$count]['entradacantidad'] = $resp['entradacantidad'];
			$p[$count]['descripcion'] = $resp['descripcion'];
			$p[$count]['imagen'] = $resp['imagen'];

			$count++;
		}
	}

	$p = json_encode($p);

	echo $p;

	mysqli_close($con->conectarse());