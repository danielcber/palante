<?php 
     
  	include_once('../../conexion/conexion.php');
	   $con = new conectar();
     $link = new mysqli("localhost","root","", "palante");
     $salida = "";

     $query = "SELECT * FROM eventos ORDER BY id";

     if(isset($_POST['consulta'])){
     	// mysqli_query($con->conectarse(), $sSql);
      $q = $link->real_escape_string($_POST['consulta']);
     	$query = "SELECT `eventos`.`id`, `eventos`.`titulo`, `eventos`.`ubicacion`, `eventos`.`org_id` as orgid, `organizaciones`.`org`, `eventos`.`start_date`, `eventos`.`start_time`, `eventos`.`end_date`, `eventos`.`end_time`, `eventos`.`entradaprecio`, `eventos`.`entradacantidad`, `eventos`.`imagen`, `eventos`.`descripcion`, `eventos`.`cat_id`, `categorias`.`nombre` as categoria from (`eventos` inner join `organizaciones` on `eventos`.`org_id` = `organizaciones`.`id`) inner join `categorias` on `eventos`.`cat_id` = `categorias`.`idcategorias` WHERE titulo LIKE '%$q%' OR ubicacion LIKE '%$q%' OR `categorias`.`nombre` LIKE '%$q%';";
    }

    $resultado =mysqli_query($con->conectarse(), $query);

    if($resultado->num_rows > 0){

    	while ($fila =$resultado->fetch_assoc()) {

    		$salida.= "<div class='col-sm-4' style='height:33vh; margin-bottom:20px;');'><a href='index.php?evento=detalles#".$fila['id']."'><img style='width: 100%; max-height:33vh;' src=".substr($fila['imagen'], 6)."><h5 class='imgbus card-text wrap'>".$fila['titulo']."</h5></a></div>";
    	}

    }else {

       $salida.= "No hay datos relacionados...";
    }

    echo $salida;

    mysqli_close($con->conectarse());

 ?>