<?php
	include("conexion/conexion.php");

	$sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio FROM parlay WHERE codigo='".$_GET["cod_t"]."'";
	$rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
	$row_ticket=mysqli_fetch_array($rs_ticket);

	$sql_agen="SELECT agencia FROM agencias WHERE id='".$row_ticket["agencia"]."'";
	$rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
	$row_agen=mysqli_fetch_array($rs_agen);

	
	echo '<style>
		#ticket {
		width: 302px;
		
}

	</style>';
	echo '<div id="ticket">';
	echo "www.eurobet.com<br>";
	echo "Agencia: ".$row_agen["agencia"]."<br>";
	echo "Apuesta: ".$row_ticket["tipo"]."<br>";
	list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
	$fecha = $d."/".$m."/".$a;
	echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
	echo "Ticket: ".$row_ticket["codigo"]."<br>";
	echo "El ticket caduca a los 5 dias.<br><br>";

	$sql="SELECT p.*, a.id_partido, a.logro, a.valor_logro, j.* FROM parlay p
	JOIN apuestas a ON p.codigo=a.ticket
	JOIN partidos j ON a.id_partido=j.id WHERE p.codigo='".$_GET["cod_t"]."'";
	$rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
	while($row = mysqli_fetch_array($rs)) {
			$sql_eq1="SELECT equipo from equipos WHERE id='".$row["equipo1"]."'";
			$rs_eq1=mysqli_query($mysqli,$sql_eq1) or die(mysqli_error());
			$row_eq1=mysqli_fetch_array($rs_eq1);

			$sql_eq2="SELECT equipo from equipos WHERE id='".$row["equipo2"]."'";
			$rs_eq2=mysqli_query($mysqli,$sql_eq2) or die(mysqli_error());
			$row_eq2=mysqli_fetch_array($rs_eq2);
			
			
		if ($row["logro"]=="gj1") {
			echo $row_eq1["equipo"]."-> Ganar: ".$row["gj1"]." vs ".$row_eq2["equipo"]."<br>";
			echo "------------------------------------------------------------<br>";
			

		}

		if ($row["logro"]=="gj2") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar: ".$row["gj2"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}


		if ($row["logro"]=="empate") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Enpate: ".$row["empate"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}

		if ($row["logro"]=="alta") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Alta( ".$row["v_alta"]." ): ".$row["alta"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}

		if ($row["logro"]=="baja") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Baja( ".$row["v_alta"]." ): ".$row["baja"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}

		if ($row["logro"]=="runline1") {
			echo $row_eq1["equipo"]."-> Runline( ".$row["v_runline1"]." ): ".$row["runline1"]." vs ".$row_eq2["equipo"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}

		if ($row["logro"]=="runline2") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Runline( ".$row["v_runline2"]." ): ".$row["runline2"]."<br>";
			echo "------------------------------------------------------------<br>";

			
		}

		if ($row["logro"]=="gpt1") {
			echo $row_eq1["equipo"]."-> Ganar 1T: ".$row["gpt1"]." vs ".$row_eq2["equipo"]."<br>";
			echo "------------------------------------------------------------<br>";

		}

		if ($row["logro"]=="gpt2") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 1T: ".$row["gpt2"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}

		if ($row["logro"]=="gst1") {
			echo $row_eq1["equipo"]."-> Ganar 2T: ".$row["gst1"]." vs ".$row_eq2["equipo"]."<br>";
			echo "------------------------------------------------------------<br>";
			

		}

		if ($row["logro"]=="gst2") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 2T: ".$row["gst2"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}

		if ($row["logro"]=="g5to1") {
			echo $row_eq1["equipo"]."-> Ganar 5to I: ".$row["g5to1"]." vs ".$row_eq2["equipo"]."<br>";
			echo "------------------------------------------------------------<br>";
			

		}

		if ($row["logro"]=="g5to2") {
			echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 5to I: ".$row["g5to2"]."<br>";
			echo "------------------------------------------------------------<br>";
			
		}



	
		
	}
	echo "Apostado: ".$row_ticket["monto"]."<br>";
	echo "------------------------------------------------------------<br>";
	echo "Ganancia Maxima: ".$row_ticket["premio"]."<br><br>";
	echo "<p>- Este ticket expira 7 dias luego de la impresión del mismo</p>";
	echo "<p>- Sin ticket no se reclama el premio</p>";
	echo "<p>- En caso de un error en la linea, rotación, hora programada, maxima apuesta, apuestas fuera de tiempo o comenzando el evento, las apuestas seran CANCELADAS y el monto del arriesgado será devuelto en consecuencia.</p>";
	echo "<p>Conozco y acepto las reglas.</p>";
	echo "<p>visita www.eurobet.com</p>";
	echo "</div>";

?>