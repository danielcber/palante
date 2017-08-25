<!-- sesion.php -->

<?php 
	session_start();

	// Evalua que la sesión continue verificando una de las variables creadas en control.php,
	// cuando ésta ya no coincida con su valor inicial se redirije al archivo de salir.php
	if ( !$_SESSION['autentificado'] )
	{
		header("Location: index.php?pag=login");
	}

	$inactivo = 9000;
	 
	    if( isset($_SESSION['tiempo']) )
	    {
	    	$vida_session = time() - $_SESSION['tiempo'];
	        if($vida_session > $inactivo)
	        {
	            session_destroy();
	            header("Location: index.php?pag=login");
	        }
	    }
	 
	    $_SESSION['tiempo'] = time();
 ?>