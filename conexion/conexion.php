<?php
class conectar{
	function conectarse(){
	{
		if(!($link = new mysqli("localhost","root","", "palante"))){
        //if(!($link = new mysqli("localhost","autoenlace","ToTdgPdp6aqr","autoenla_autoenlace"))){
			exit();
		}	
		return $link;
	}
}
}
?>