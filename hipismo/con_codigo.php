<?php include("../time_sesion.php");
if ($_SESSION['tipo']=="normal") {
    header("Location: ../bienvenido.php");
}  
    include("../conexion/conexion.php");   
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="Sitio de Apuestas en colombia, Parlays, Apuestas directas">
        <meta name="author" content="">
        <title>EUROBET :: Tu sitio de apuestas parlay</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../fonts/style.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../pacejs/themes/orange/pace-theme-barber-shop.css" rel="stylesheet">
        <link rel="icon"  href="balon.ico">

    <style>
        .ganador {
            color: #26DA14;
            font-weight: bold;
        }
        .perdedor {
           color: #FF0000;
           font-weight: bold;
        }
        .push {
            color: #FBF600;
            font-weight: bold;
        }
    </style>


</head>

<body>
 
     <div id="wrapper" class="hidden-print">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php 
            include("menu_h.php");
        ?>
    </div>

        <!-- /#sidebar-wrapper -->
       
        <!-- Contenido -->
        <div id="page-content-wrapper">
            <header>
                <img src="../img/header_c.png" class="img-responsive" alt="">
        </header>
        <br>
            <div class="container-fluid">
                <div align="center" class="visible-xs  hidden-print"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row hidden-print">
                    <div class="col-sm-6">
                        <?php 
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                        ?> 
                            <a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>
                    </div>
                    
                </div>
                <br><br>
                <div class="row">
                <style>
                    #ticket {
                        width: 302px;
                        text-align:justify;
                    }

                    #ticket2 {
                        width: 302px;
                        text-align:justify;
                        display: none;
                    }
                 </style>
                    <div class="col-sm-6 col-xs-offset-4 ">
                    
                                
                    
                    <?php

                        if ($_SESSION["tipo"]=="root") {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_POST["codigo"];
                            }
                        }
                        else {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_SESSION["agencia"]."-".$_POST["codigo"];
                            }
                        }
                        
                        


                        $sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio, ganar, pagado, push FROM tickets_c WHERE codigo='".$codigo."'";
                        $rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
                        $num_ticket=mysqli_num_rows($rs_ticket);
                        if ($num_ticket < 1) {
                            echo "<script>alert('Ticket no existe');window.location='consultas_c.php';</script>";
                        }
                        $row_ticket=mysqli_fetch_array($rs_ticket);
                        

                        $sql_agen="SELECT agencia FROM agencias WHERE id='".$row_ticket["agencia"]."'";
                        $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
                        $row_agen=mysqli_fetch_array($rs_agen);


                        echo '<div id="ticket">';
                            echo "www.eurobet.com.co<br>";
                            echo "Agencia: ".$row_agen["agencia"]."<br>";
                            echo "Apuesta: ".$row_ticket["tipo"]."<br>";
                            list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
                            $fecha = $d."/".$m."/".$a;
                            echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
                            echo "Serial: ".$row_ticket["codigo"]."<br>";
                            echo "Ticket vigente por 7 días.<br><br>";
                            $sql="SELECT t.*, a.id_carrera, a.apuesta, a.logro_c, c.* FROM tickets_c t JOIN apuestas_c a ON t.codigo=a.ticket_c JOIN carreras c ON a.id_carrera=c.id WHERE t.codigo='".$codigo."'";
                           
                            $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
                            while($row = mysqli_fetch_array($rs)) {
                                    
                                    list($a2,$m2,$d2)= explode("-",$row["fecha"]);
                                    $fecha2 = $d2."/".$m2."/".$a2;

                                    /*$sql_resul="SELECT * FROM resultados WHERE id_partido='".$row["id_partido"]."'";
                                    $rs_resul=mysqli_query($mysqli,$sql_resul) or die(mysqli_error());
                                    $row_resul=mysqli_fetch_array($rs_resul);*/
                                    
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
                            echo "Ganancia : ".$row_ticket["premio"]."<br><br>";
                            echo "- Este ticket expira 7 días luego de su impresión<br>";
                            echo "- Sin ticket no se cobra el premio.<br>";
                            echo "- En caso de error de línea, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado será devuelto en consecuencia.<br>";
                            echo "Conozco y acepto las reglas de EUROBET.<br>";
                            echo "¡Mucha suerte!<br>";
                            echo "</div><br>";
                            if ($_SESSION["tipo"]=="root") {
                                if ($row_ticket["push"]=="") {
                                    echo "<form action='push.php' method='POST' class='hidden-print'>";
                                    echo "*PUSH*: ";
                                    echo "<textarea name='push' id=''></textarea><br>";
                                
                                    echo "Ganancia con *PUSH*: ";
                                    echo "<input type='number' name='premio' ><br>";
                                    echo "<input type='hidden' name='codigo' value='".$row_ticket["codigo"]."'><br>";
                                    echo "<button>PUSH</button></form><br><br>";

                                }
                                else {

                                    echo "*PUSH*: ".$row_ticket["push"]."<br><br>";
                                }
                                
                            }
                            else {
                                if ($row_ticket["push"]!="") {
                                    echo "*PUSH*: ".$row_ticket["push"]."<br><br>";
                                }
                            }
                            echo "<button class='btn btn-primary hidden-print hidden-xs' id='imprimir' type='button'>Imprimir</button><br>";

                            echo "<br><button class='btn btn-primary hidden-print visible-xs' id='imprimir2' type='button'>Imprimir</button><br>";

                              
                            


                                            ?>
                             
                    
                    <?php

                    if ($_SESSION["tipo"]=="root" || $_SESSION["usuario"]=="111111111") {
                            echo '<a href="#" id="anular" class="btn btn-danger hidden-print">Anular Ticket</a> 
                                <br><br>';

                        } 
                        if ($row_ticket["ganar"]=='1') {
                            echo "<h3>Ganador</h3>";

                        }
                        else if ($row_ticket["ganar"]=='3') {

                            if ($_SESSION["tipo"]=="root") {
                             echo '<a href="#" id="ganar" class="btn btn-success hidden-print">Ticket Ganador</a> ';
                             echo '<a href="#" id="perder" class="btn btn-warning hidden-print">Ticket Perdedor</a><br>';
                            }
                        }
                        else {
                            echo "<h3>Perdedeor</h3>";
                        }


                        //ticket tablet

                        echo '<div class="col-lg-6 col-lg-offset-5">';
                        echo '<div id="ticket2">';
                        echo "www.eurobet.com.co\$intro$";
                        echo "Agencia: ".$row_agen["agencia"]."\$intro$";
                        echo "Apuesta: ".$row_ticket["tipo"]."\$intro$";
                        list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
                        $fecha = $d."/".$m."/".$a;
                        echo "Fecha: ".$fecha." ".$row_ticket["hora"]."\$intro$";
                        echo "Serial: ".$row_ticket["codigo"]."\$intro$";
                        echo "Ticket Vigente por 5 DIAS\$intro$\$intro$";

                        $sql="SELECT p.*, a.id_partido, a.logro, a.val_alta, a.valor_logro, j.* FROM parlay p
                            JOIN apuestas a ON p.codigo=a.ticket
                            JOIN partidos j ON a.id_partido=j.id WHERE p.codigo='".$codigo."'";
                        $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
                        while($row = mysqli_fetch_array($rs)) {
                                $sql_eq1="SELECT equipo from equipos WHERE id='".$row["equipo1"]."'";
                                $rs_eq1=mysqli_query($mysqli,$sql_eq1) or die(mysqli_error());
                                $row_eq1=mysqli_fetch_array($rs_eq1);

                                $sql_eq2="SELECT equipo from equipos WHERE id='".$row["equipo2"]."'";
                                $rs_eq2=mysqli_query($mysqli,$sql_eq2) or die(mysqli_error());
                                $row_eq2=mysqli_fetch_array($rs_eq2);
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    list($a2,$m2,$d2)= explode("-",$row["fecha_v"]);
                                }
                                else {
                                     list($a2,$m2,$d2)= explode("-",$row["fecha"]);
                                }

                                
                                $fecha2 = $d2."/".$m2."/".$a2;
                                
                            if ($row["logro"]=="gj1") {
                                echo $row_eq1["equipo"]."-%3E Ganar: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        

                            }

                            if ($row["logro"]=="gj2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }


                            if ($row["logro"]=="empate") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Empate: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="empatept") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Empate 1T: ".$row["valor_logro"]."\$intro$";
                               if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="alta") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Alta( ".$row["val_alta"]." ): ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="baja") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Baja( ".$row["val_alta"]." ): ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="runline1") {
                                echo $row_eq1["equipo"]."-%3E Runline (".$row["v_runline1"]."): ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="runline2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Runline (".$row["v_runline2"]."): ".$row["valor_logro"]."\$intro$";
                                 if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";

                                                        
                            }

                            if ($row["logro"]=="gpt1") {
                                echo $row_eq1["equipo"]."-%3E Ganar 1T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";

                            }

                            if ($row["logro"]=="gpt2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar 1T: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                             if ($row["logro"]=="gst1") {
                                echo $row_eq1["equipo"]."-%3E Ganar 2T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                               echo "------------------------------------------\$intro$";

                            }

                            if ($row["logro"]=="gst2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar 2T: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                            }
                                 


                            if ($row["logro"]=="g5to1") {
                                echo $row_eq1["equipo"]."-%3E Ganar 5to I: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        

                            }

                            if ($row["logro"]=="g5to2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar 5to I: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="gg") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E GG: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="ng") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E NG: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="dc1x") {
                                echo $row_eq1["equipo"]."-%3E DC1x: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";

                            }

                            if ($row["logro"]=="dc2x") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E DC2x: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }

                            if ($row["logro"]=="dc12") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E DC12: ".$row["valor_logro"]."\$intro$";
                                if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
                                }
                                else {
                                    echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
                                }
                                echo "------------------------------------------\$intro$";
                                                        
                            }
                                
                                
                            }

                                echo "Apostado: ".$row_ticket["monto"]."\$intro$";
                                echo "------------------------------------------\$intro$";
                                echo "Ganancia: ".$row_ticket["premio"]."\$intro$\$intro$";
                                echo "- Este ticket expira 5 DIAS luego de su IMPRESION\$intro$";
                                echo "- Sin ticket no se cobra el premio.\$intro$";
                                echo "- En caso de error de LINEA, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado SERA devuelto en consecuencia.\$intro$";
                                echo "Conozco y acepto las reglas.\$intro$";
                                echo "visita www.eurobet.com.co\$intro$";
                            echo "</div>";
                            echo "</div>";    
                                            ?>
                           
                    
                
            
                <br>
                </div>
            </div>
            
            <!-- Modal Crear de Usuarios -->

            <div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="modalUsuariosLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalUsuariosLabel">Registro de Usuarios</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" method="POST" action="crear_usuarios.php">
                                <div class="form-group">
                                    <label for="pais" class="col-sm-4 control-label">Pais:</label>
                                    <div class="col-sm-6">
                                        <select  name="pais" id="pais" class="form-control">
                                        <?php 
                                            $sql_pais="SELECT * FROM paises";
                                            $rs_pais=mysqli_query($mysqli,$sql_pais) or die(mysqli_error());
                                            while ($row_pais=mysqli_fetch_array($rs_pais)) {
                                                echo  '<option value='.$row_pais["id"].'>'.$row_pais["pais"].'</option>';
                                            }

                                        ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                                    <div class="col-sm-6">
                                        <select  name="agencia" id="agencia" class="form-control">
                                        <?php 
                                            $sql_agencias="SELECT * FROM agencias";
                                            $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                                            while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                                                echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                                            }

                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tipo" class="col-sm-4 control-label">Tipo de usuario:</label>
                                    <div class="col-sm-6">
                                        <select  name="tipo" id="tipo" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="taquilla">Taquilla</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cedula" class="col-sm-4 control-label">Cédula:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="cedula" id="cedula" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-4 control-label">Nombre:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido" class="col-sm-4 control-label">Apellido:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="col-sm-4 control-label">Correo:</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="correo" id="correo" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave" class="col-sm-4 control-label">Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave" id="clave" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="col-sm-4 control-label">Dirección:</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="direccion" id="direccion"  rows="3" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="col-sm-4 control-label">Teléfono:</label>
                                    <div class="col-sm-6">
                                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="" required>
                                    </div>
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-success">Crear Usuario</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            

          


            <!-- Contenido -->
            
        </div>


        




    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
            $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#anular").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro desea anular el ticket?")) {
                window.location="accion_ticket2.php?anular=<?php echo $row_ticket["codigo"];?>"
            }

        });
        $("#ganar").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que este ticket es Ganador?")) {
                window.location="accion_ticket2.php?ganar=<?php echo $row_ticket["codigo"];?>"
            }

        });
        $("#perder").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que este ticket es Perdedor?")) {
                window.location="accion_ticket2.php?perder=<?php echo $row_ticket["codigo"];?>"
            }

        })
        $("#pagar").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que desea pagar este ticket?")) {
                window.location="accion_ticket.php?pagar=<?php echo $row_ticket["codigo"];?>"
            }

        })
        $("#imprimir").click(function(){
            window.print();
        });

        var ticket= $("#ticket2").html();
        if($(window).width() <= 768)  {
            $("#imprimir2").click(function(){
                window.location="com.fidelier.printfromweb://$small$"+ticket+"$intro$$intro$$cut$$intro$";
            });
        }
        
    </script>
</body>


</html>
