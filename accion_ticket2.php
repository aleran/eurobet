<?php
	include("time_sesion.php");
	include("conexion/conexion.php");
	if (isset($_GET["anular"])) {

		$sql_anular="UPDATE parlay SET activo='0' WHERE codigo='".$_GET["anular"]."'";
		$rs_anular=mysqli_query($mysqli,$sql_anular) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket marcado como Ganador');window.location='consultas.php'</script>";
	}

	if (isset($_GET["ganar"])) {

		$sql_ganar="UPDATE parlay SET ganar='1' WHERE codigo='".$_GET["ganar"]."'";
		$rs_ganar=mysqli_query($mysqli,$sql_ganar) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket marcado como Ganador');window.location='consultas.php'</script>";
	}

	if (isset($_GET["perder"])) {

		$sql_perder="UPDATE parlay SET ganar='0' WHERE codigo='".$_GET["perder"]."'";
		$rs_perder=mysqli_query($mysqli,$sql_perder) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket marcado como Perdedor');window.location='consultas.php'</script>";
	}
	if (isset($_GET["pagar"])) {

		$sql_perder="UPDATE parlay SET pagado='1' WHERE codigo='".$_GET["pagar"]."'";
		$rs_perder=mysqli_query($mysqli,$sql_perder) or die(mysqli_error($mysqli));
		echo "<script>alert('Ticket Pagado');window.location='consultas.php'</script>";
	}
?>