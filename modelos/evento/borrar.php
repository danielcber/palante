<?php 
	include_once('../../conexion/conexion.php');
	$con = new conectar();
	/**
	* 
	*/
	class borrar
	{
		
		function borrado($id, $con)
		{
			$sSql = "DELETE FROM `palante`.`eventos` WHERE `id`='$id';";
			mysqli_query($con->conectarse(), $sSql);

			mysqli_close($con->conectarse());

			return 'true';
		}
	}
	
	$bo = new borrar();

	$id = $_REQUEST['id'];
	$bo->borrado($id, $con);
		

 ?>