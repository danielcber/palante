<?php

	include_once('../../conexion/conexion.php');
	$con = new conectar();
	$count = 0;

	$id = $_REQUEST['id'];

	$sSql = "SELECT `eventos`.`id`, `eventos`.`titulo`, `eventos`.`ubicacion`, `eventos`.`org_id` as orgid, `organizaciones`.`org`, `eventos`.`start_date`, `eventos`.`start_time`, `eventos`.`end_date`, `eventos`.`end_time`, `eventos`.`entradaprecio`, `eventos`.`entradacantidad`, `eventos`.`imagen`, `eventos`.`descripcion`, `eventos`.`cat_id`, `categorias`.`nombre` as categoria from (`eventos` inner join `organizaciones` on `eventos`.`org_id` = `organizaciones`.`id`) inner join `categorias` on `eventos`.`cat_id` = `categorias`.`idcategorias` where `eventos`.`cat_id` = '$id';";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
		while($resp = mysqli_fetch_array($respuesta)){
		
			$p[$count]['id'] = $resp['id'];
			$p[$count]['titulo'] = $resp['titulo'];
			$p[$count]['ubicacion'] = $resp['ubicacion'];
			$p[$count]['organizacion'] = $resp['org'];
			$p[$count]['orgid'] = $resp['orgid'];
			$p[$count]['idcat'] = $resp['cat_id'];
			$p[$count]['categoria'] = $resp['categoria'];
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