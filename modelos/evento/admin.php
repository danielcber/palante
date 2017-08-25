<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	// $con->conectarse();
	$count = 0;

	$eventoid = $_REQUEST['id'];

	$sSql = "SELECT `asistencia`.`userid`, `users`.`nombre`, `users`.`correo`, `users`.`telefono`  from `users` inner join `asistencia` on `users`.`id` = `asistencia`.`userid` where `asistencia`.`eventoid` = '$eventoid';";


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