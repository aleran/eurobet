<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include("time_sesion.php"); 
	include("conexion/conexion.php");

	$sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio, tipo FROM parlay WHERE codigo='".$_GET["cod_t"]."'";
	$rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
	$row_ticket=mysqli_fetch_array($rs_ticket);

	$sql_agen="SELECT agencia FROM agencias WHERE id='".$row_ticket["agencia"]."'";
	$rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
	$row_agen=mysqli_fetch_array($rs_agen);

    $compe_select=array();

	echo '<style>
		#ticket {
		width: 302px;
		text-align:justify;
		
}

	</style>';
	echo '<div class="col-lg-6 col-lg-offset-5">';
	echo '<div id="ticket">';
	echo "www.eurobet.com.co<br>";
    echo "Agencia: ".$row_agen["agencia"]."<br>";
    echo "Apuesta: ".$row_ticket["tipo"]."<br>";
    list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
    $fecha = $d."/".$m."/".$a;
    echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
    echo "Serial: ".$row_ticket["codigo"]."<br>";
    echo "Ticket Vigente por 5 días<br><br>";

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
            if ($_SESSION["pais"]==2) {
                list($a2,$m2,$d2)= explode("-",$row["fecha_v"]);
            }
            else {
                 list($a2,$m2,$d2)= explode("-",$row["fecha"]);
            }

			
			$fecha2 = $d2."/".$m2."/".$a2;
			
		if ($row["logro"]=="gj1") {
            echo $row_eq1["equipo"]."-> Ganar: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["logro"]=="gj2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar: ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }


        if ($row["logro"]=="empate") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Empate: ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }

        if ($row["logro"]=="empatept") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Empate 1T: ".$row["valor_logro"]."<br>";
           if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }

        if ($row["logro"]=="alta") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Alta( ".$row["v_alta"]." ): ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }

        if ($row["logro"]=="baja") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Baja( ".$row["v_alta"]." ): ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }

        if ($row["logro"]=="runline1") {
            echo $row_eq1["equipo"]."-> Runline (".$row["v_runline1"]."): ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }

        if ($row["logro"]=="runline2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Runline (".$row["v_runline2"]."): ".$row["valor_logro"]."<br>";
             if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";

                                    
        }

        if ($row["logro"]=="gpt1") {
            echo $row_eq1["equipo"]."-> Ganar 1T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";

        }

        if ($row["logro"]=="gpt2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 1T: ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }

         if ($row["logro"]=="gst1") {
            echo $row_eq1["equipo"]."-> Ganar 2T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";

        }

        if ($row["logro"]=="gst2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 2T: ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
        }
             


        if ($row["logro"]=="g5to1") {
            echo $row_eq1["equipo"]."-> Ganar 5to I: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["logro"]=="g5to2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 5to I: ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    
        }
        if (!in_array($row["id_competicion"], $compe_select)) {
            $compe_select[]=$row["id_competicion"];
        }
        
    }

                            echo "Apostado: ".$row_ticket["monto"]."<br>";
                           echo "-------------------------------------------------------------<br>";
                            echo "Ganancia: ".$row_ticket["premio"]."<br><br>";
                            echo "- Este ticket expira 5 días luego de su impresión<br>";
                            echo "- Sin ticket no se cobra el premio.<br>";
                            echo "- En caso de error de línea, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado será devuelto en consecuencia.<br>";
                            echo "Conozco y acepto las reglas.<br>";
                            echo "visita www.eurobet.com.co<br>";
	echo "<button class='btn btn-primary hidden-print' id='imprimir' type='button'>Imprimir</button> ";
	echo "<a href='bienvenido.php' class='btn btn-success hidden-print'  type='button'>Volver</a><br>";
	echo "</div>";
	echo "</div><br>";
    $compe_select=serialize($compe_select);
    $compe_select=urlencode($compe_select);
	

?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	          
        window.print();
        <?php if ($row_ticket["tipo"]=="parlay") { ?>
        window.location="compe_selec.php?compe_select=<?php echo $compe_select;?>";
        <?php } 
        else { ?>

            window.location="compe_selec2.php?compe_select=<?php echo $compe_select;?>";
        <?php }?>
        

       
    
</script>
