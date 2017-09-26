<?php
    session_start(); 
    include("../conexion/conexion.php");

    $sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio, tipo FROM tickets_c WHERE codigo='".$_GET["cod_t"]."'";
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

 #ticket2 {
        width: 302px;
        text-align:justify;
        display: none;
        
}

    </style>';
    echo '<div class="col-lg-6 col-lg-offset-5">';
    echo '<div id="ticket">';
    echo "www.eurobet.com.co<br>";
    echo "Agencia: ".$row_agen["agencia"]."<br>";
    echo "Apuesta Hipica: ".$row_ticket["tipo"]."<br>";
    list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
    $fecha = $d."/".$m."/".$a;
    echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
    echo "Serial: ".$row_ticket["codigo"]."<br>";
    echo "Ticket Vigente por 5 días<br><br>";

    $sql="SELECT t.*, a.id_carrera, a.apuesta, a.logro_c, c.* FROM tickets_c t
    JOIN apuestas_c a ON t.codigo=a.ticket_c
    JOIN carreras c ON a.id_carrera=c.id WHERE t.codigo='".$_GET["cod_t"]."'";
    $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
    while($row = mysqli_fetch_array($rs)) {

            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                list($a2,$m2,$d2)= explode("-",$row["fecha_v"]);
            }
            else {
                 list($a2,$m2,$d2)= explode("-",$row["fecha"]);
            }

            
            $fecha2 = $d2."/".$m2."/".$a2;
            
        if ($row["apuesta"]=="ganar1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Ganar: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

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
    echo "</div>";
    echo "</div><br>";
    $compe_select=serialize($compe_select);
    $compe_select=urlencode($compe_select);
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
         var ticket= $("#ticket2").html();
        <?php if ($_SESSION["tipo"]!="normal") { ?>
            if($(window).width() <= 768)  {
                window.location="com.fidelier.printfromweb://$small$"+ticket+"$intro$$intro$$cut$$intro$"
            }
            else {
                window.print();
            }
        <?php }?>
        <?php if ($row_ticket["tipo"]=="parlay") { ?>
            window.location="compe_selec.php?compe_select=<?php echo $compe_select;?>";
        <?php } 
        else { ?>

            window.location="compe_selec2.php?compe_select=<?php echo $compe_select;?>";
        <?php }?>
 
</script>