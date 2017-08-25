<?php 
	class actualizar
{
	public function actualiza($id)
	{
		# code...
	include_once('../../conexion/conexion.php');
	$con = new conectar();

	$sSql = "SELECT * from `organizaciones` where `id` = '$id';";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
			$resp = mysqli_fetch_array($respuesta);

			$r['id'] = $resp['id'];
			$r['org'] = $resp['org'];
			$r['correo'] = $resp['correo'];
			$r['telefono'] = $resp['telefono'];
			$r['descripcion'] = $resp['descripcion'];
			$r['facebook'] = $resp['facebook'];
			$r['twitter'] = $resp['twitter'];
			$r['instagram'] = $resp['instagram'];
		}
	$r = json_encode($r);

	echo $r;
	}

}
	$id = $_REQUEST['id'];
	$act = new actualizar();
	return $act->actualiza($id);
 ?>