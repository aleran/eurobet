<?php
	include("time_sesion.php"); 
	include("conexion/conexion.php");

	if (isset($_POST["cedula"])) {

		$sql="INSERT INTO usuarios VALUES (null, '$_POST[pais]', '$_POST[agencia]','$_POST[cedula]', '$_POST[nombre]', '$_POST[apellido]', '$_POST[correo]', '".md5($_POST["clave"])."', '$_POST[direccion]', '$_POST[telefono]', '0', '$_POST[tipo]')";
		$rs= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		echo "<script>alert('Registrado Correctamente');window.location='bienvenido.php';</script>";

	}

	else "no insertado"
?>