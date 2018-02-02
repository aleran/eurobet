<?php

	$mysqli = new MySQLi("localhost","root","102236","eurobet");

	if (!$mysqli) die ("Error al conectar con el servidor -> ".mysqli_error());
	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	if ($_SESSION["pais"]==2) {
		date_default_timezone_set('America/Caracas');
		
	}
	else {
		date_default_timezone_set('America/Bogota');
	}
?>
