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
                <form action="mixtas_c.php" name="jugadas" id="jugadas" method="POST">
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
                              echo "<script>alert('¡No seleccionó ligas!');window.location='carreras2.php?pais=".$_POST["pais"]."'</script>";
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
                                                    echo '<td>Exac. 1°</td>';
                                                    echo '<td>Exac. 2°</td>';
                                                    echo '<td>Quiniela</td>';
                                                    echo '<td>Tri. 1°</td>';
                                                    echo '<td>Tri. 2°</td>';
                                                    echo '<td>Tri. 3°</td>';
                                                                                                        
                                                echo '</tr>';

                                                echo '<tr class="agg">';

                                              
                                                    echo '<td>'.$row_c1["caballo"].'( '.$row2["logro1"].' )</td>';

                                                    echo '<td>'.$row_c1["peso"].'</td>';

                                                    echo '<td>'.$row_c1["edad"].'</td>';

                                                    echo '<td>'.$row_c1["jinete"].'</td>';

                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta1[]" id="exacta1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta1b[]" id="exacta1b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';
            
                                                    echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela1[]" id="quiniela1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';
                                                    
                                                     
                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta1[]" id="trifecta1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta1b[]" id="trifecta1b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta1c[]" id="trifecta1c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro1"].'"></td>';
                                                    
                                                    

                                                echo '</tr>';
                                           
                                                echo '<tr>';
                                                   ;
                                                    echo '<td>'.$row_c2["caballo"].'( '.$row2["logro2"].' )</td>';

                                                    echo '<td>'.$row_c2["peso"].'</td>';

                                                    echo '<td>'.$row_c2["edad"].'</td>';

                                                    echo '<td>'.$row_c2["jinete"].'</td>';

                                                    
                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta2[]" id="exacta2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta2b[]" id="exacta2b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';
                                                    
                                                    echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela2[]" id="quiniela2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';
                                                    
                                                     
                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta2[]" id="trifecta2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta2b[]" id="trifecta2b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';

                                                     echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta2c[]" id="trifecta2c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro2"].'"></td>';
                                                    
                                                echo '</tr>';

                                                 echo '<tr>';
                                                   ;
                                                    echo '<td>'.$row_c3["caballo"].'( '.$row2["logro3"].' )</td>';

                                                    echo '<td>'.$row_c3["peso"].'</td>';

                                                    echo '<td>'.$row_c3["edad"].'</td>';

                                                    echo '<td>'.$row_c3["jinete"].'</td>';
                                                    
                                                    
                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta3[]" id="exacta3'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta3b[]" id="exacta3b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';
                                                    
                                                    echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela3[]" id="quiniela3'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';
                                                    
                                                     
                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta3[]" id="trifecta3'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta3b[]" id="trifecta3b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta3c[]" id="trifecta3c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro3"].'"></td>';
                                                    
                                                echo '</tr>';

                                                echo '<tr>';
                                                   ;
                                                    echo '<td>'.$row_c4["caballo"].'( '.$row2["logro4"].' )</td>';
                                                    
                                                    echo '<td>'.$row_c4["peso"].'</td>';

                                                    echo '<td>'.$row_c4["edad"].'</td>';

                                                    echo '<td>'.$row_c4["jinete"].'</td>';
                                                    
                                                    
                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta4[]" id="exacta4'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk exacta" name="exacta4b[]" id="exacta4b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';
                                                    
                                                    echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela4[]" id="quiniela4'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';
                                                    
                                                     
                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta4[]" id="trifecta4'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta4b[]" id="trifecta4b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';

                                                    echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta4c[]" id="trifecta4c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro4"].'"></td>';
                                                    
                                                echo '</tr>';

                                                echo '<tr>';
                                                   ;
                                                    
                                                    
                                                    if ($row2["logro5"]!=0) {

                                                        echo '<td>'.$row_c5["caballo"].'( '.$row2["logro5"].' )</td>';
                                                        
                                                        echo '<td>'.$row_c5["peso"].'</td>';

                                                        echo '<td>'.$row_c5["edad"].'</td>';

                                                        echo '<td>'.$row_c5["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta5[]" id="exacta5'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta5b[]" id="exacta5b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela5[]" id="quiniela5'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';
                                                        
                                                         
                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta5[]" id="trifecta5'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta5b[]" id="trifecta5b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta5c[]" id="trifecta5c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro5"].'"></td>';
                                                    }

                                                    
                                                    
                                                    
                                                echo '</tr>';

                                                echo '<tr>';
                                                   ;
                                                    
                                                    
                                                    if ($row2["logro6"]!=0) {

                                                        echo '<td>'.$row_c6["caballo"].'( '.$row2["logro6"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c6["peso"].'</td>';

                                                        echo '<td>'.$row_c6["edad"].'</td>';

                                                        echo '<td>'.$row_c6["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta6[]" id="exacta6'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta6b[]" id="exacta6b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';

                                                        echo '<td> <input type="checkbox quiniela" class="chk quiniela" name="quiniela6[]" id="quiniela6'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';
                                                    
                                                     
                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta6[]" id="trifecta6'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta6b[]" id="trifecta6b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta6c[]" id="trifecta6c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro6"].'"></td>';
                                                            
                                                    }

                                                    if ($row2["logro7"]!=0) {

                                                        echo '<td>'.$row_c7["caballo"].'( '.$row2["logro7"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c7["peso"].'</td>';

                                                        echo '<td>'.$row_c7["edad"].'</td>';

                                                        echo '<td>'.$row_c7["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta7[]" id="exacta7'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta7b[]" id="exacta7b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela7[]" id="quiniela7'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';
                                                    
                                                     
                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta7[]" id="trifecta7'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta7b[]" id="trifecta7b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta7c[]" id="trifecta7c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro7"].'"></td>';
                                                            
                                                    }

                                                    if ($row2["logro8"]!=0) {

                                                        echo '<td>'.$row_c8["caballo"].'( '.$row2["logro8"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c8["peso"].'</td>';

                                                        echo '<td>'.$row_c8["edad"].'</td>';

                                                        echo '<td>'.$row_c8["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta8[]" id="exacta8'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta8b[]" id="exacta8b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela8[]" id="quiniela8'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';
                                                    
                                                     
                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta8[]" id="trifecta8'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta8b[]" id="trifecta8b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';

                                                         echo '<td> <input type="checkbox" class="chk trifecta" name="trifecta8c[]" id="trifecta8c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro8"].'"></td>';
                                                            
                                                    }

                                                    if ($row2["logro9"]!=0) {

                                                        echo '<td>'.$row_c9["caballo"].'( '.$row2["logro9"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c9["peso"].'</td>';

                                                        echo '<td>'.$row_c9["edad"].'</td>';

                                                        echo '<td>'.$row_c9["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta9[]" id="exacta9'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta9b[]" id="exacta9b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela9[]" id="quiniela9'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';
                                                    
                                                     
                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta9[]" id="trifecta9'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta9b[]" id="trifecta9b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta9c[]" id="trifecta9c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro9"].'"></td>';
                                                            
                                                    }

                                                    if ($row2["logro10"]!=0) {

                                                        echo '<td>'.$row_c10["caballo"].'( '.$row2["logro10"].' )</td>';
                                                    
                                                        echo '<td>'.$row_c10["peso"].'</td>';

                                                        echo '<td>'.$row_c10["edad"].'</td>';

                                                        echo '<td>'.$row_c10["jinete"].'</td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta10[]" id="exacta10'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk exacta" name="exacta10b[]" id="exacta10b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk quiniela" name="quiniela10[]" id="quiniela10'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';
                                                    
                                                     
                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta10[]" id=trifecta10'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta10b[]" id=trifecta10b'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';

                                                        echo '<td> <input type="checkbox" class="chk trifecta" name=trifecta10c[]" id=trifecta10c'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["logro10"].'"></td>';
                                                            
                                                    }

                                                    
                                                    
                                                    
                                                echo '</tr>';

                                                

                                               
                                               
                                               echo '<script src="../js/jquery.js"></script>';
                                               echo '<script>
                                                        $(".chk").click(function(){

                                                            if ($("#exacta1'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)




                                                            }

                                                            if ($("#exacta2'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta3'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta4'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta5'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta6'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

$("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta7'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta8'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta9'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                               $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }

                                                            if ($("#exacta10'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
 
                                                            }


                                                            if ($("#exacta1b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta1'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta2b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta2'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta3b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta3'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta4b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta4'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta5b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta5'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta6b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta6'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta7b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta7'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta8b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta8'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta9b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta9'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#exacta10b'.$row2["id"].'").prop("checked")) {

                                                                $("#exacta10'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#exacta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela1'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela2'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela3'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela4'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela5'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela6'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela7'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela8'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela9'.$row2["id"].'").prop("checked", false)

                                                                $("#quiniela10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                             if ($("#quiniela1'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela2'.$row2["id"].'").prop("checked")) {

                                                               $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela3'.$row2["id"].'").prop("checked")) {

                                                               $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela4'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                             if ($("#quiniela5'.$row2["id"].'").prop("checked")) {

                                                               $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela6'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela7'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                             if ($("#quiniela8'.$row2["id"].'").prop("checked")) {

                                                               $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela9'.$row2["id"].'").prop("checked")) {

                                                               $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#quiniela10'.$row2["id"].'").prop("checked")) {

                                                               $("#trifecta1'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)

                                                                 $("#trifecta9c'.$row2["id"].'").prop("checked", false)

                                                                  $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta1'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta1b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta2'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta2b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta3'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta3b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta4'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta4b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta5'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta5b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta6'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta6b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                             if ($("#trifecta7'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta7b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta8'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta8b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta9'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta9b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta10'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta10b'.$row2["id"].'").prop("checked", false)

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta1b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta1c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                             if ($("#trifecta2b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta2c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                             if ($("#trifecta3b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta3c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta4b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta4c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta5b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta5c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta6b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta6c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta7b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta7c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta8b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta8c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta9b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta9c'.$row2["id"].'").prop("checked", false)
                                                            }

                                                            if ($("#trifecta10b'.$row2["id"].'").prop("checked")) {

                                                                $("#trifecta10c'.$row2["id"].'").prop("checked", false)
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

        var eexacta= $(".exacta").length;
        var ex=0;

        for(i=0; i < eexacta; i++){

            if ($(".exacta")[i].checked) {
                ex++;
                    
            }
        }
        if(ex ==1){
            alert("debe seleccionar 2 exactas");
            e.preventDefault();
        }  


        var equiniela= $(".quiniela").length;
        var q=0;

        for(i=0; i < equiniela; i++){

            if ($(".quiniela")[i].checked) {
                q++;
                    
            }
        }
        if(q ==1){
            alert("debe seleccionar 2 quinielas");
            e.preventDefault();
        }  
        if(q > 2){
            alert("puede seleccionar 2 quinielas");
            e.preventDefault();
        }

         var etrifecta= $(".trifecta").length;
        var t=0;

        for(i=0; i < etrifecta; i++){

            if ($(".trifecta")[i].checked) {
                t++;
                    
            }
        }
        if(t > 0){
            if (t < 3) {
                alert("debe seleccionar 3 trifectas");
                e.preventDefault();
            }
            
        }  
            
         
    }
     formul.addEventListener("submit", validar)
      
  
    </script>
  
  
</body>


</html>
