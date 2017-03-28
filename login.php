<?php
	include("conexion/conexion.php");
	$pass=$_POST['clave'];
	$pass=md5($pass);
	
	$sql=mysql_query("SELECT * FROM usuarios WHERE correo='".$_POST["correo"]."'") or die (mysql_error());
	$num=mysql_num_rows($sql);
	if ($num !== 1) echo "<script>alert('Correo no registrado');window.location='index.php';</script>";

	$row = mysql_fetch_array($sql);
	
		
	if($pass==$row['clave']){
			ini_set("session.cookie_lifetime","7200");
			ini_set("session.gc_maxlifetime","7200");
			session_start();
			$_SESSION['correo']=$row['correo'];
			$_SESSION['password']=$pass;
			$_SESSION['tipo']=$row['tipo'];
			$_SESSION['nombreC']=$row['nombre']. " ". $row['apellido'];

			header("location:./bienvenido.php");
		}
	else echo "<script>alert('Clave Invalida');window.location='index.php';</script>";	
	
	