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

        if ($row["apuesta"]=="ganar2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
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

        if ($row["apuesta"]=="ganar3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
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

        if ($row["apuesta"]=="ganar4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
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

        if ($row["apuesta"]=="ganar5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
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

        if ($row["apuesta"]=="ganar6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
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

        if ($row["apuesta"]=="ganar7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
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

        if ($row["apuesta"]=="ganar8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
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

        if ($row["apuesta"]=="ganar9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
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

         if ($row["apuesta"]=="ganar10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
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

        if ($row["apuesta"]=="place1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="place10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Place: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="show10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Show: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

         if ($row["apuesta"]=="exacta8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta1b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta2b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta3b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta4b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta5b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta6b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta7b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta8b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta9b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="exacta10b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Exacta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="quiniela10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Quiniela: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 1°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta1b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta2b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta3b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta4b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta5b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta6b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta7b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta8b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta9b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta10b") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 2°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta1c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta2c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta3c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta4c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta5c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta6c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta7c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta8c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta9c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="trifecta10c") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Trifecta 3°: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="dupleta10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Dupleta: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="triple10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Triple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple1") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo1"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple2") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo2"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple3") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo3"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple4") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo4"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple5") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo5"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple6") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo6"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple7") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo7"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple8") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo8"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple9") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo9"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            echo "-------------------------------------------------------------<br>";
                                    

        }

        if ($row["apuesta"]=="cuadruple10") {

            $sql_c1="SELECT caballo FROM caballos WHERE id='".$row["caballo10"]."'";
            $rs_c1=mysqli_query($mysqli,$sql_c1) or die(mysqli_error());
            $row_c1=mysqli_fetch_array($rs_c1);

            $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
            $rs_carrera=mysqli_query($mysqli,$sql_carrera);
            $row_carrera=mysqli_fetch_array($rs_carrera);

            echo "Carrera: ".$row_carrera["carrera"]."<br>";
            echo $row_c1["caballo"]."-> Cuadruple: ".$row["logro_c"]."<br>";
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