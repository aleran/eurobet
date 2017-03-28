<?php

	$conexion = mysql_connect("localhost","root","102236");
	$db = mysql_select_db("eurobet");

	if (!$conexion || !$db) die ("Error al conectar con el servidor -> ".mysql_error());

?>