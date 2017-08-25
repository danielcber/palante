<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();
	$count = 0;

	$userid = $_REQUEST['userid'];

	$sSql = "SELECT `asistencia`.`eventoid`, `eventos`.`titulo`, `eventos`.`ubicacion`, `eventos`.`start_date`  from `eventos` inner join `asistencia` on `eventos`.`id` = `asistencia`.`eventoid` where `asistencia`.`userid` = '$userid';";


	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
		while($resp = mysqli_fetch_array($respuesta)){
		
			$p[$count]['titulo'] = $resp['titulo'];
			$p[$count]['ubicacion'] = $resp['ubicacion'];
			$p[$count]['start_date'] = $resp['start_date'];
			$p[$count]['eventoid'] = $resp['eventoid'];

			$count++;
		}
	}

	$p = json_encode($p);

	echo $p;

	mysqli_close($con->conectarse());