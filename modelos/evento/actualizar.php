<?php 
	class actualizar
{
	public function actualiza($id)
	{
		# code...
	include_once('../../conexion/conexion.php');
	$con = new conectar();

	$sSql = "SELECT `eventos`.`id`, `eventos`.`titulo`, `eventos`.`ubicacion`, `eventos`.`org_id` as orgid, `organizaciones`.`org`, `eventos`.`start_date`, `eventos`.`start_time`, `eventos`.`end_date`, `eventos`.`end_time`, `eventos`.`entradaprecio`, `eventos`.`entradacantidad`, `eventos`.`descripcion`, `eventos`.`cat_id`, `categorias`.`nombre` as categoria from (`eventos` inner join `organizaciones` on `eventos`.`org_id` = `organizaciones`.`id`) inner join `categorias` on `eventos`.`cat_id` = `categorias`.`idcategorias` where `eventos`.`id` = '$id';";

	if($respuesta = mysqli_query($con->conectarse(), $sSql)){
			$resp = mysqli_fetch_array($respuesta);

			$r['id'] = $resp['id'];
			$r['titulo'] = $resp['titulo'];
			$r['ubicacion'] = $resp['ubicacion'];
			$r['organizacion'] = $resp['org'];
			$r['orgid'] = $resp['orgid'];
			$r['idcat'] = $resp['cat_id'];
			$r['categoria'] = $resp['categoria'];
			$r['startdate'] = $resp['start_date'];
			$r['starttime'] = $resp['start_time'];
			$r['enddate'] = $resp['end_date'];
			$r['endtime'] = $resp['end_time'];
			$r['entradaprecio'] = $resp['entradaprecio'];
			$r['entradacantidad'] = $resp['entradacantidad'];
			$r['descripcion'] = $resp['descripcion'];
		}
	$r = json_encode($r);

	echo $r;
	}

}
	$id = $_REQUEST['id'];
	$act = new actualizar();
	return $act->actualiza($id);
 ?>