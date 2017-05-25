<?php 
	include("time_sesion.php");
	if ($_SESSION['tipo']=="normal") {
          header("Location: bienvenido.php");
      }  
    include("conexion/conexion.php");
    if (isset($_POST["recarga"])) {
    	$sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
	    $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
	    $row_s=mysqli_fetch_array($rs_s);
	    $saldo_final = $row_s["saldo"] + $_POST["recarga"];

	    $sql_recarga="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_POST["cedula"]."'";
	    $rs_recarga=mysqli_query($mysqli,$sql_recarga) or die(mysqli_error($mysqli));

	    $sql_trans="INSERT INTO trans_usuario VALUES(null, '".$_SESSION["agencia"]."', '".$_POST["cedula"]."', '".date("Y-m-d")."', '".date("H:i:s")."', 'recarga','".$_POST["recarga"]."','".$_SESSION["usuario"]."')";
	    $rs_trans=mysqli_query($mysqli,$sql_trans) or die(mysqli_error($mysqli));
	    echo "<script>alert('recarga realizada');window.location='buscar_usuario.php';</script>";
    }

     if (isset($_POST["pagar"])) {

    	$sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
	    $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
	    $row_s=mysqli_fetch_array($rs_s);

	    if ($row_s["saldo"] >= $_POST["pagar"]) {
     		$saldo_final = $row_s["saldo"] - $_POST["pagar"];

	    	$sql_pagar="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_POST["cedula"]."'";
	    	$rs_pagar=mysqli_query($mysqli,$sql_pagar) or die(mysqli_error($mysqli));

	    	$sql_trans="INSERT INTO trans_usuario VALUES(null, '".$_SESSION["agencia"]."', '".$_POST["cedula"]."', '".date("Y-m-d")."', '".date("H:i:s")."', 'pago','".$_POST["pagar"]."','".$_SESSION["usuario"]."')";
	    	$rs_trans=mysqli_query($mysqli,$sql_trans) or die(mysqli_error($mysqli));
	    	echo "<script>alert('Pago realizado');window.location='buscar_usuario.php';</script>";
     	}
     	else {
     		echo "<script>alert('saldo insuficiente para pagar esa cantidad');window.location='buscar_usuario.php';</script>";
     	}
	    
    }
    


?>