<?php
session_start(); 
    if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4 || $_POST["pais"]==2 || $_POST["pais"]==4) {
        date_default_timezone_set('America/Caracas');
        
    }
    else {
        date_default_timezone_set('America/Bogota');
    }
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



</head>

<body>
    <div style="float:right;">
        <script src="../js/meses.js"></script>
    </div>


    <script src="../js/fecha.js"></script>

<div id="reloj" style="font-size:14px;"></div>
<div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un máximo de 15, monto mínimo es de $5000 ::EuroBet - Tus Apuestas seguras en línea</marquee></div>
 

<div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
       <?php 
            if (isset($_SESSION["tipo"])) {
              if ($_SESSION["tipo"]=="normal") {
                include("../menu3.php");
            }
              else {
                include("menu_h.php");
              } 
            }
            
            else {
                include("../menu1.php");
            }
            
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
                <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row">
                    <div class="col-lg-6">
                      <?php 
                    include("../conexion/conexion.php");
                        if ($_SESSION["pais"]==2 || $_POST["pais"]==2 || $_SESSION["pais"]==4 || $_POST["pais"]==4) {

                            $sql_inicio="SELECT id, hora_v FROM partidos WHERE fecha_v='".date("Y-m-d")."' AND inicio_v='0'";
                            $rs_inicio=mysqli_query($mysqli,$sql_inicio) or die(mysqli_error());
                            while ($row_inicio=mysqli_fetch_array($rs_inicio)) {

                                if ($row_inicio["hora_v"] <= date("H:i:s")) {
                                    $sql_act="UPDATE partidos SET inicio_v='1' WHERE id='".$row_inicio["id"]."'";
                                    $rs_act=mysqli_query($mysqli,$sql_act) or die(mysqli_error());
                                    
                                }
                            }

                        }

                        else if($_SESSION["pais"]==1 || $_POST["pais"]==1 || $_SESSION["pais"]==3 || $_POST["pais"]==3) {

                             $sql_inicio="SELECT id, hora FROM partidos WHERE fecha='".date("Y-m-d")."' AND inicio='0'";
                            $rs_inicio=mysqli_query($mysqli,$sql_inicio) or die(mysqli_error());
                            while ($row_inicio=mysqli_fetch_array($rs_inicio)) {

                                if ($row_inicio["hora"] <= date("H:i:s")) {
                                    $sql_act="UPDATE partidos SET inicio='1' WHERE id='".$row_inicio["id"]."'";
                                    $rs_act=mysqli_query($mysqli,$sql_act) or die(mysqli_error());
                                    
                                }
                            }
                        }
                        
                            
                         
                    if($_SESSION["tipo"]=="normal"){
                        $sql_normal="SELECT nombre,apellido FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                        $rs_normal=mysqli_query($mysqli,$sql_normal) or die(mysqli_error());
                        $row_normal=mysqli_fetch_array($rs_normal);
                        echo "<h4>Usuario: ". $row_normal["nombre"].", ".$row_normal["apellido"]."";
                        echo '<a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>'; 
                    }
                    else {
                        if (isset($_SESSION["agencia"])) {
                        
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                         
                            echo '<a href="cerrar_sesion.php"> Salir</a></h4>';
                        } 
                    }
                            ?>
                    </div>
                    
                </div>
                <form action="multiples_c.php" name="jugadas" id="jugadas" method="POST">
                    <div class="row">
                    
                        <?php
                                
                            include("../lib/fecha_hora.php");
                            
                            if (isset($_POST["carrera"])) {
                                $carrera=$_POST["carrera"];
                            }
                            else if (isset($_GET["carrera_select"])) {
                                $carrera=unserialize(urldecode(stripslashes($_GET["carrera_select"])));
                            }
                           
                            if (!isset($carrera)) {
                              echo "<script>alert('¡No seleccionó ligas!');window.location='carreras3.php?pais=".$_POST["pais"]."'</script>";
                            }
                             foreach ($carrera as $pb => $valor) {

                                if ($_SESSION["pais"]==1 || $_POST["pais"]==1 || $_SESSION["pais"]==3 || $_POST["pais"]==3) {

                                        $sql="SELECT * FROM nombre_carreras Where id=$valor AND inicio=0 AND fecha >= '".fecha()."' ORDER BY fecha ASC";
                                }
                                else {
                                    $sql="SELECT * FROM nombre_carreras Where id=$valor AND inicio=0 AND fecha_v >= '".fecha()."' ORDER BY fecha ASC";
                                }
                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());
                                
                                while ($row=mysqli_fetch_array($rs)) {
                                    echo '<div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">    
                                                <thead>
                                                    <th>'.$row['carrera'].'</th>

                                                </thead>';
                                                 echo '<tbody>';

                                            $id_c=$row["id"];
                                         

                                                $sql2="SELECT * FROM carreras WHERE id_nc=$id_c";
                                                $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                $num2=mysqli_num_rows($rs2);
                                        
                                            

                                            if ($num2 == 0) {
                                                echo "<tr>";
                                                    echo "<td>";
                                                        echo "POR AHORA NO HAY CARRERAS, INTENTA MÁS TARDE";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }

                                            while($row2=mysqli_fetch_array($rs2)) {

                                                //informacion de caballos
                                                $sql_c1="SELECT * FROM caballos WHERE id=$row2[caballo1]";
                                                $rs_c1=mysqli_query($mysqli, $sql_c1) or die (mysqli_error());
                                                $row_c1=mysqli_fetch_array($rs_c1);

                                                $sql_c2="SELECT * FROM caballos WHERE id=$row2[caballo2]";
                                                $rs_c2=mysqli_query($mysqli, $sql_c2) or die (mysqli_error());
                                                $row_c2=mysqli_fetch_array($rs_c2);

                                                $sql_c3="SELECT * FROM caballos WHERE id=$row2[caballo3]";
                                                $rs_c3=mysqli_query($mysqli, $sql_c3) or die (mysqli_error());
                                                $row_c3=mysqli_fetch_array($rs_c3);

                                                $sql_c4="SELECT * FROM caballos WHERE id=$row2[caballo4]";
                                                $rs_c4=mysqli_query($mysqli, $sql_c4) or die (mysqli_error());
                                                $row_c4=mysqli_fetch_array($rs_c4);

                                                if ($row2["logro5"]!=0) {

                                                    $sql_c5="SELECT * FROM caballos WHERE id=$row2[caballo5]";
                                                    $rs_c5=mysqli_query($mysqli, $sql_c5) or die (mysqli_error());
                                                    $row_c5=mysqli_fetch_array($rs_c5);

                                                }

                                                if ($row2["logro6"]!=0) {

                                                    $sql_c6="SELECT * FROM caballos WHERE id=$row2[caballo6]";
                                                    $rs_c6=mysqli_query($mysqli, $sql_c6) or die (mysqli_error());
                                                    $row_c6=mysqli_fetch_array($rs_c6);

                                                }

                                                if ($row2["logro7"]!=0) {

                                                    $sql_c7="SELECT * FROM caballos WHERE id=$row2[caballo7]";
                                                    $rs_c7=mysqli_query($mysqli, $sql_c7) or die (mysqli_error());
                                                    $row_c7=mysqli_fetch_array($rs_c7);

                                                }
                                                
                                                if ($row2["logro8"]!=0) {

                                                    $sql_c8="SELECT * FROM caballos WHERE id=$row2[caballo8]";
                                                    $rs_c8=mysqli_query($mysqli, $sql_c8) or die (mysqli_error());
                                                    $row_c8=mysqli_fetch_array($rs_c8);
                                                }
                                                
                                                if ($row2["logro9"]!=0) {

                                                    $sql_c9="SELECT * FROM caballos WHERE id=$row2[caballo9]";
                                                    $rs_c9=mysqli_query($mysqli, $sql_c9) or die (mysqli_error());
                                                    $row_c9=mysqli_fetch_array($rs_c9);
                                                }
                                                
                                                if ($row2["logro10"]!=0) {

                                                    $sql_c10="SELECT * FROM caballos WHERE id=$row2[caballo8]";
                                                    $rs_c10=mysqli_query($mysqli, $sql_c10) or die (mysqli_error());
                                                    $row_c10=mysqli_fetch_array($rs_c10);

                                                }
                                                
                                                echo "Fecha - Hora: ";
                                                 if ($_SESSION["pais"]==2 || $_POST["pais"]==2 || $_SESSION["pais"]==4 || $_POST["pais"]==4 ) {
                                                    list($a,$m,$d) = explode("-",$row["fecha_v"]);
                                                    echo $d.'/'.$m.'/'.$a.' - '.$row["hora_v"];
                                                    
                                                }

                                                else {
                                                    list($a,$m,$d) = explode("-",$row["fecha"]);
                                                    echo $d.'/'.$m.'/'.$a.' - '.$row["hora"];

                                                }
                                                echo '<tr class="danger">';
                                                    echo '<td>Caballos (logro)</td>';
                                                    echo '<td>Peso</td>';
                                                    echo '<td>Edad</td>';
                                                    echo '<td>Jinete</td>';
                                                    echo '<td>Dupleta</td>';
                                                    echo '<td>Triple (Pick 3)</td>';
                                                    echo '<td>Cuadruple (Pick 4)</td>';
                                                   
                                                                                                        
                                                echo '</tr>';

                                                echo '<tr class="agg">';

                                              
                                                    echo '<td>'.$row_c1["caballo"].'( '.$row2["logro1"].' )</td>';

                                                    echo '<td>'.$row_c1["peso"].'</td>';

                                                    echo '<td>'.$row_c1["edad"].'</td>';

                                                    echo '<td>'.$row_c1["jinete"].'</td>';

                                                    echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta1[]" id="dupleta1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk triple" name="triple1[]" id="triple1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';
            
                                                    echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple1[]" id="cuadruple1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';
                                                    
                                                    

                                                echo '</tr>';
                                           
                                                echo '<tr>';
                                                   ;
                                                    echo '<td>'.$row_c2["caballo"].'( '.$row2["logro2"].' )</td>';

                                                    echo '<td>'.$row_c2["peso"].'</td>';

                                                    echo '<td>'.$row_c2["edad"].'</td>';

                                                    echo '<td>'.$row_c2["jinete"].'</td>';

                                                    
                                                    echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta2[]" id="dupleta2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk triple" name="triple2[]" id="triple2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';
                                                    
                                                    echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple2[]" id="cuadruple2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';
                                                    
                                                     
                                                    
                                                echo '</tr>';

                                                 echo '<tr>';
                                                   ;
                                                    echo '<td>'.$row_c3["caballo"].'( '.$row2["logro3"].' )</td>';

                                                    echo '<td>'.$row_c3["peso"].'</td>';

                                                    echo '<td>'.$row_c3["edad"].'</td>';

                                                    echo '<td>'.$row_c3["jinete"].'</td>';
                                                    
                                                    
                                                    echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta3[]" id="dupleta3'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk triple" name="triple3[]" id="triple3'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';
                                                    
                                                    echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple3[]" id="cuadruple3'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';
                                                    
                                                    
                                                echo '</tr>';

                                                echo '<tr>';
                                                   ;
                                                    echo '<td>'.$row_c4["caballo"].'( '.$row2["logro4"].' )</td>';
                                                    
                                                    echo '<td>'.$row_c4["peso"].'</td>';

                                                    echo '<td>'.$row_c4["edad"].'</td>';

                                                    echo '<td>'.$row_c4["jinete"].'</td>';
                                                    
                                                    
                                                    echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta4[]" id="dupleta4'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk triple" name="triple4[]" id="triple4'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';
                                                    
                                                    echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple4[]" id="cuadruple4'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';
                                                    
                                                echo '</tr>';

                                                echo '<tr>';
                                                   ;
                                                    
                                                    
                                                    if ($row2["logro5"]!=0) {

                                                        echo '<td>'.$row_c5["caballo"].'( '.$row2["logro5"].' )</td>';
                                                        
                                                        echo '<td>'.$row_c5["peso"].'</td>';

                                                        echo '<td>'.$row_c5["edad"].'</td>';

                                                        echo '<td>'.$row_c5["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta5[]" id="dupleta5'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk triple" name="triple5[]" id="triple5'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple5[]" id="cuadruple5'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';
                                                        
                                                         
                                                    }

                                                    
                                                    
                                                    
                                                echo '</tr>';

                                                echo '<tr>';
                                                   ;
                                                    
                                                    
                                                    if ($row2["logro6"]!=0) {

                                                        echo '<td>'.$row_c6["caballo"].'( '.$row2["logro6"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c6["peso"].'</td>';

                                                        echo '<td>'.$row_c6["edad"].'</td>';

                                                        echo '<td>'.$row_c6["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta6[]" id="dupleta6'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk triple" name="triple6[]" id="triple6'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';

                                                        echo '<td> <input type="checkbox quiniela" class="chk cuadruple" name="cuadruple6[]" id="cuadruple6'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';
                                                    
                                                            
                                                    }

                                                    if ($row2["logro7"]!=0) {

                                                        echo '<td>'.$row_c7["caballo"].'( '.$row2["logro7"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c7["peso"].'</td>';

                                                        echo '<td>'.$row_c7["edad"].'</td>';

                                                        echo '<td>'.$row_c7["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta7[]" id="dupleta7'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk triple" name="triple7[]" id="triple7'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple7[]" id="cuadruple7'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';
                                                    
                                                            
                                                    }

                                                    if ($row2["logro8"]!=0) {

                                                        echo '<td>'.$row_c8["caballo"].'( '.$row2["logro8"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c8["peso"].'</td>';

                                                        echo '<td>'.$row_c8["edad"].'</td>';

                                                        echo '<td>'.$row_c8["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta8[]" id="dupleta8'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk triple" name="triple8[]" id="triple8'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple8[]" id="cuadruple8'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';
                                                    
                                                            
                                                    }

                                                    if ($row2["logro9"]!=0) {

                                                        echo '<td>'.$row_c9["caballo"].'( '.$row2["logro9"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c9["peso"].'</td>';

                                                        echo '<td>'.$row_c9["edad"].'</td>';

                                                        echo '<td>'.$row_c9["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta9[]" id="dupleta9'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk triple" name="triple9[]" id="triple9'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple9[]" id="cuadruple9'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';
                                                    
                                                            
                                                    }

                                                    if ($row2["logro10"]!=0) {

                                                        echo '<td>'.$row_c10["caballo"].'( '.$row2["logro10"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c10["peso"].'</td>';

                                                        echo '<td>'.$row_c10["edad"].'</td>';

                                                        echo '<td>'.$row_c10["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk dupleta" name="dupleta10[]" id="dupleta10'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk triple" name="triple10[]" id="triple10'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk cuadruple" name="cuadruple10[]" id="cuadruple10'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';
                                                            
                                                    }

                                                    
                                                    
                                                    
                                                echo '</tr>';

                                                

                                               
                                               
                                               echo '<script src="../js/jquery.js"></script>';
                                               echo '<script>
                                                        $(".chk").click(function(){

                                                            if ($("#dupleta1'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta2'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta3'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                             if ($("#dupleta4'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta5'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta6'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta7'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta8'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta9'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta10'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#dupleta10'.$row2["id"].'").prop("checked")) {

                                                                $("#dupleta1'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta2'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta3'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta4'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta5'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta6'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta7'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta8'.$row2["id"].'").prop("checked", false)

                                                                $("#dupleta9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                        	if ($("#triple1'.$row2["id"].'").prop("checked")) {

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple2'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple3'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple4'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple5'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple6'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple7'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple8'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple9'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple9'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple10'.$row2["id"].'").prop("checked", false)

 
                                                            }

                                                            if ($("#triple10'.$row2["id"].'").prop("checked")) {

                                                                $("#triple1'.$row2["id"].'").prop("checked", false)

                                                                $("#triple2'.$row2["id"].'").prop("checked", false)

                                                                $("#triple3'.$row2["id"].'").prop("checked", false)

                                                                $("#triple4'.$row2["id"].'").prop("checked", false)

                                                                $("#triple5'.$row2["id"].'").prop("checked", false)

                                                                $("#triple6'.$row2["id"].'").prop("checked", false)

                                                                $("#triple7'.$row2["id"].'").prop("checked", false)

                                                                $("#triple8'.$row2["id"].'").prop("checked", false)

                                                                $("#triple10'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple1'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple2'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple3'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple4'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple5'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple6'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple7'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple8'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

                                                                $("#cuadruple9'.$row2["id"].'").prop("checked", false)

 
                                                            }
                                                            

                                                           




                                                        })
                                                         
                                                    </script>'; 
                                               
                                            }
                                            echo  '</tbody>';
                                     echo '</div>';

                                }
                                
                            }


                          
                           
                                     
                                ?>
                               <tr> <td><center><button class="btn btn-primary" id="ap">CONTINUAR</button></center></td></tr>
                        </form>
                        
                    
                        
                                 
                            
                        
            
                
            
    




    

    
    <script src="../js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    var formul = document.jugadas;
    var validar = function validar(e){
        
        var elementos = formul.elements;
        var longElementos = elementos.length;

        var n=0;

        for(i=0; i < longElementos; i++){

            if (elementos[i].type=="checkbox") {
                if (elementos[i].checked) {
                    n++;
                }

            }
        }

        if(n < 1) {
            alert("Debe seleccionar una apuesta");
            e.preventDefault();
        }

        var dupleta= $(".dupleta").length;
        var ex=0;

        for(i=0; i < dupleta; i++){

            if ($(".dupleta")[i].checked) {
                ex++;
                    
            }
        }
        if(ex ==1){
            alert("debe seleccionar 2 dupletas, 1 por carrera");
            e.preventDefault();
        }  

        var etriple= $(".triple").length;
        var t=0;

        for(i=0; i < etriple; i++){

            if ($(".triple")[i].checked) {
                t++;
                    
            }
        }

        if(t > 0){
            if (t < 3) {
                alert("debe seleccionar 3 triples");
                e.preventDefault();
            }
            
        }

        var ecuadruple= $(".cuadruple").length;
        var c=0;

        for(i=0; i < ecuadruple; i++){

            if ($(".cuadruple")[i].checked) {
                c++;
                    
            }
        }
        if(c > 0){
            if (c < 4) {
                alert("debe seleccionar 4 cuadruples");
                e.preventDefault();
            }
            
        }


            
         
    }
     formul.addEventListener("submit", validar)
      
  
    </script>
  
  
</body>


</html>
