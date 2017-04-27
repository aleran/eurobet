<?php 
	include("time_sesion.php");  
    include("conexion/conexion.php");
    if (isset($_POST["cedula"])) {
    	$sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
	    $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
	    $row_s=mysqli_fetch_array($rs_s);
	    $saldo_final = $row_s["saldo"] + $_POST["recarga"];

	    $sql_recarga="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_POST["cedula"]."'";
	    $rs_recarga=mysqli_query($mysqli,$sql_recarga) or die(mysqli_error($mysqli));
	    echo "<script>alert('recarga realizada');window.location='buscar_usuario.php';</script>";
    }
    


?>