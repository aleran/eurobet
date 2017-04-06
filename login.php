<?php
	include("conexion/conexion.php");
	$pass=$_POST['clave'];
	$pass=md5($pass);
	
	$sql=$mysqli->query("SELECT * FROM usuarios WHERE correo='".$_POST["correo"]."'") or die (mysql_error());
	$num=mysqli_num_rows($sql);
	if ($num !== 1) echo "<script>alert('Correo no registrado');window.location='index.php';</script>";

	$row = mysqli_fetch_assoc($sql);
	
		
	if($pass==$row['clave']){
			ini_set("session.cookie_lifetime","86400");
			ini_set("session.gc_maxlifetime","86400");
			session_start();
			$_SESSION['agencia']=$row['agencia'];
			$_SESSION['tipo']=$row['tipo'];

			header("location:./bienvenido.php");
		}
	else echo "<script>alert('Clave Invalida');window.location='index.php';</script>";
	mysqli_close($mysqli);
?>	
	
	