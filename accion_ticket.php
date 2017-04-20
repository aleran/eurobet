<?php
	include("time_sesion.php");
	include("conexion/conexion.php");
	if (isset($_GET["anular"])) {

		$sql_anular="UPDATE parlay SET activo='0' WHERE codigo='".$_GET["anular"]."'";
		$rs_anular=mysqli_query($mysqli,$sql_anular) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket anulado correctamente');window.location='activos.php'</script>";
	}

	if (isset($_GET["ganar"])) {

		$sql_ganar="UPDATE parlay SET ganar='1' WHERE codigo='".$_GET["ganar"]."'";
		$rs_ganar=mysqli_query($mysqli,$sql_ganar) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket marcado como Ganador');window.location='activos.php'</script>";
	}
?>