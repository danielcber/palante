<?php 
   error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Palante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="plugins/bootstrap/js/bootstrap.min.js">
    <!-- <link rel="shortcut icon" href="plugins/img/palantelogo.png" type="favicon/ico" /> -->
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/album.css">
   	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
   	<link rel="stylesheet" href="plugins/bootstrap/css/animate.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="vistas/principal/assets/css/icomoon.css">
    <link href="vistas/principal/assets/css/animate-custom.css" rel="stylesheet"> 
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="vistas/principal/assets/js/modernizr.custom.js"></script>
</head>
<body>

<?php @include('vistas/layouts/nav.php') ?>

	<?php 

			$pagprincipal = $_GET['pag'];
			if ( $pagprincipal == 'principal')
			{
				include_once('vistas/principal/index.php');
			}

	?>

 	<div class="container">
 	
	 			
			<?php

				$eventoindex = $_GET['evento'];
				if ( $eventoindex == 'index')
				{
					include_once('vistas/evento/index.php');
				}

				$eventoadmin = $_GET['evento'];
				if ( $eventoadmin == 'admin')
				{
					include_once('vistas/evento/admin.php');
				}

				$login = $_GET['sesion'];
				if ( $login == 'login')
				{
					include_once('vistas/sesion/login.php');
				}


				$eventoagenda = $_GET['evento'];
				if ( $eventoagenda == 'agenda')
				{
					include_once('vistas/evento/agenda.php');
				}

				$eventolistar = $_GET['evento'];
				if ( $eventolistar == 'listar')
				{
					include_once('vistas/evento/listar.php');
				}

				$eventoeditar = $_GET['evento'];
				if ( $eventoeditar == 'editar')
				{
					include_once('vistas/evento/editar.php');
				}

				$eventodetalles = $_GET['evento'];
				if ( $eventodetalles == 'detalles')
				{
					include_once('vistas/evento/detalles.php');
				}

				$userregistrar = $_GET['user'];
				if ( $userregistrar == 'registrar')
				{
					include_once('vistas/user/registrar.php');
				}

				$eventoregistrar = $_GET['evento'];
				if ( $eventoregistrar == 'registrar')
				{
					include_once('vistas/evento/registrar.php');
				}

				$orgregistrar = $_GET['org'];
				if ( $orgregistrar == 'registrar')
				{
					include_once('vistas/org/registrar.php');
				}

				$orgdetalles = $_GET['org'];
				if ( $orgdetalles == 'detalles')
				{
					include_once('vistas/org/detalles.php');
				}

				$orglistar = $_GET['org'];
				if ( $orglistar == 'listar')
				{
					include_once('vistas/org/listar.php');
				}

				$orgeditar = $_GET['org'];
				if ( $orgeditar == 'editar')
				{
					include_once('vistas/org/editar.php');
				}

				$usereditar = $_GET['user'];
				if ( $usereditar == 'editar')
				{
					include_once('vistas/user/editar.php');
				}

				$categoriaindex = $_GET['categoria'];
				if ( $categoriaindex == 'index')
				{
					include_once('vistas/categoria/index.php');
				}

			?>
	 		
 	</div>

<?php @include('vistas/layouts/footer.php') ?>