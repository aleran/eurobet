<?php
	include("conexion/conexion.php");

	if (isset($_POST["cedula"])) {

		$sql="INSERT INTO usuarios VALUES (null, '$_POST[agencia]','$_POST[cedula]', '$_POST[nombre]', '$_POST[apellido]', '$_POST[correo]', '".md5($_POST["clave"])."', '$_POST[direccion]', '$_POST[telefono]', 'admin')";
		$rs= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		echo "<script>alert('Registrado Correctamente');window.location='index.php';</script>";

	}

	else "no insertado"
?>