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

     <?php
        include("head.php");
    ?>



</head>

<body>
    <div style="float:right;">
        <script src="js/meses.js"></script>
    </div>


    <script src="js/fecha.js"></script>

<div id="reloj" style="font-size:14px;"></div>
<div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un máximo de 15, monto mínimo es de $5000 ::EuroBet - Tus Apuestas seguras en línea</marquee></div>
 

<div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
       <?php 
            if (isset($_SESSION["tipo"])) {
              if ($_SESSION["tipo"]=="normal") {
                include("menu3.php");
            }
              else {
                include("menu2.php");
              } 
            }
            
            else {
                include("menu1.php");
            }
            
        ?>
</div>
        <!-- /#sidebar-wrapper -->
       
        <!-- Contenido -->
        <div id="page-content-wrapper">
            <header>
                <img src="img/header3.png" class="img-responsive" alt="">
        </header>
        <br>
            <div class="container-fluid">
                <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row">
                    <div class="col-lg-6">
                   	  <?php 
                    include("conexion/conexion.php");
                        if ($_SESSION["pais"]==2 || $_POST["pais"]==2) {

                            $sql_inicio="SELECT id, hora_v FROM partidos WHERE fecha_v='".date("Y-m-d")."' AND inicio_v='0'";
                            $rs_inicio=mysqli_query($mysqli,$sql_inicio) or die(mysqli_error());
                            while ($row_inicio=mysqli_fetch_array($rs_inicio)) {

                                if ($row_inicio["hora_v"] <= date("H:i:s")) {
                                    $sql_act="UPDATE partidos SET inicio_v='1' WHERE id='".$row_inicio["id"]."'";
                                    $rs_act=mysqli_query($mysqli,$sql_act) or die(mysqli_error());
                                    
                                }
                            }

                        }

                        else {

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
               	<form action="apostar.php" name="jugadas" id="jugadas" method="POST">
                    <div class="row">
                    
                        <?php
                                
                            include("lib/fecha_hora.php");
                            
                            
                             
								$sql="SELECT c.id_competicion, c.competicion, c.id_deporte FROM partidos p JOIN competiciones c ON p.id_competicion=c.id_competicion WHERE p.inicio='0' AND p.fecha='".fecha()."' GROUP BY p.id_competicion";
                            	$rs=mysqli_query($mysqli, $sql) or die (mysqli_error());
                                
                            	while ($row=mysqli_fetch_array($rs)) {
                            		echo '<div class="col-lg-12">
                                		<div class="table-responsive">
                                        	<table class="table table-striped">    
                                            	<thead>
                                                	<th>'.$row['competicion'].'</th>

                                            	</thead>';
                                            	 echo '<tbody>';
                                            $id_comp=$row["id_competicion"];
                                            $id_comp=$row["id_competicion"];
                                            if ($_SESSION["pais"]==1 || $_POST["pais"]==1 || $_SESSION["pais"]==3 || $_POST["pais"]==3 || $_SESSION["pais"]==4 || $_POST["pais"]==4) {

                                                $sql2="SELECT * FROM partidos WHERE id_competicion=$id_comp AND inicio=0 AND fecha = '".fecha()."' ORDER BY fecha ASC";
                                                $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                $num2=mysqli_num_rows($rs2);

                                            }
                                            else {
                                                $sql2="SELECT * FROM partidos WHERE id_competicion=$id_comp AND inicio_v=0 AND fecha_v= '".fecha()."' ORDER BY fecha ASC";
                                                $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                $num2=mysqli_num_rows($rs2);

                                            }
                                            

                                            if ($num2 == 0) {
                                                echo "<tr>";
                                                    echo "<td>";
                                                        echo "POR AHORA NO HAY PARTIDOS, INTENTA MÁS TARDE";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                            while($row2=mysqli_fetch_array($rs2)) {
                                            	$sql3="SELECT id, equipo FROM equipos WHERE id=$row2[equipo1]";
                                            	$rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());
                                            	$row3=mysqli_fetch_array($rs3);
                                            	$sql4="SELECT id, equipo FROM equipos WHERE id=$row2[equipo2]";
                                            	$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());
                                            	$row4=mysqli_fetch_array($rs4);
                                                echo '<tr class="danger">';
                                                echo '<td>Fecha - Hora</td>';
	                                                echo '<td>Equipos</td>';
	                                                echo '<td>Moneyline</td>';
	                                                 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 4|| $row["id_deporte"]== 7) {
	                                                 echo '<td>Alta/Baja</td>';
	                                             	}
	                                                if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 5) {
	                                                	echo '<td>Runline</td>';
	                                                }
                                                    if ($row["id_deporte"] == 1) {
	                                                	echo '<td>Primer Tiempo</td>';
                                                        //echo '<td>Segundo Tiempo</td>';
                                                        echo '<td>GG/NG</td>';
                                                        echo '<td>DoubleC</td>';
                                                    }
                                                    
	                                                if ($row["id_deporte"] == 2) {
	                                                	echo '<td>5to ining</td>';
	                                                }
	                                                
                                                echo '</tr>';
                                                echo '<tr class="agg">';

                                                if ($_SESSION["pais"]==2 || $_POST["pais"]==2) {
                                                    list($a,$m,$d) = explode("-",$row2["fecha_v"]);
                                                    echo '<td>'.$d.'/'.$m.'/'.$a.' - '.$row2["hora_v"].'</td>';
                                                    
                                                }

                                                else {
                                                    list($a,$m,$d) = explode("-",$row2["fecha"]);
                                                    echo '<td>'.$d.'/'.$m.'/'.$a.' - '.$row2["hora"].'</td>';

                                                }
                                              
                                                	echo '<td>'.$row3["equipo"].'</td>';

                                                	echo '<td> <input type="checkbox" class="chk" name="gj1[]" id="gj1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gj1"].'"> '.$row2["gj1"].'</td>';

                                                	 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 4|| $row["id_deporte"]== 7) {
                                                		echo '<td> <input type="checkbox" class="chk"  name="alta[]" id="alta'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["alta"].'/'.$row2["v_alta"].'"> Alta: ( '.$row2["v_alta"].' ) '.$row2["alta"].'</td>';
                                                	}
                                                	 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 5) {
                                                	echo '<td> <input type="checkbox" class="chk"  name="runline1[]" id="runline1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["runline1"].'/'.$row2["v_runline1"].'"> ( '.$row2["v_runline1"].' )'.$row2["runline1"].'</td>';
	                                                	
	                                                }
                                                    if ($row["id_deporte"] == 1) {
                                                	echo '<td> <input type="checkbox" class="chk"  name="gpt1[]" id="gpt1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gpt1"].'"> '.$row2["gpt1"].'</td>';
                                                   // echo '<td> <input type="checkbox" class="chk"  name="gst1[]" id="gst1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gst1"].'"> '.$row2["gst1"].'</td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="gg[]" id="gg'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gg"].'"> GG: '.$row2["gg"].'</td>';

                                                    echo '<td> <input type="checkbox" class="chk"  name="dc1x[]" id="dc1x'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["dc1x"].'"> DC1X: '.$row2["dc1x"].'</td>';
                                                	
                                                    }
                                                	if ($row["id_deporte"] == 2) {
	                                                	echo '<td> <input type="checkbox" class="chk"  name="g5to1[]" id="g5to1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["g5to1"].'"> '.$row2["g5to1"].'</td>';
	                                                }
                                                	

                                                echo '</tr>';
                                           
                                                echo '<tr>';
                                                   echo '<td></td>';
                                                	echo '<td> '.$row4["equipo"].'</td>';
                                                	echo '<td> <input type="checkbox" class="chk"  name="gj2[]" id="gj2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gj2"].'"> '.$row2["gj2"].'</td>';
                                                	 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 4|| $row["id_deporte"]== 7) {
                                                		echo '<td> <input type="checkbox" class="chk"  name="baja[]"" id="baja'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["baja"].'/'.$row2["v_alta"].'">  Baja: ( '.$row2["v_alta"].' )'.$row2["baja"].'</td>';
                                                	}
                                                	if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 5) {
                                                	echo '<td> <input type="checkbox" class="chk"  name="runline2[]" id="runline2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["runline2"].'/'.$row2["v_runline2"].'"> ( '.$row2["v_runline2"].' )'.$row2["runline2"].'</td>';
                                                }
                                                    if ($row["id_deporte"] == 1) {
                                                	echo '<td> <input type="checkbox" class="chk"  name="gpt2[]" id="gpt2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gpt2"].'"> '.$row2["gpt2"].'</td>';
                                                    //echo '<td> <input type="checkbox" class="chk"  name="gst2[]" id="gst2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gst2"].'"> '.$row2["gst2"].'</td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="ng[]" id="ng'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["ng"].'"> NG: '.$row2["ng"].'</td>';

                                                    echo '<td> <input type="checkbox" class="chk"  name="dc2x[]" id="dc2x'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["dc2x"].'"> DC2X: '.$row2["dc2x"].'</td>';

                                                	
                                                    }
                                                	if ($row["id_deporte"] == 2) {
	                                                	echo '<td> <input type="checkbox" class="chk"  name="g5to2[]" id="g5to2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["g5to2"].'"> '.$row2["g5to2"].'</td>';
	                                                }
                                                echo '</tr>';

                                                echo '<tr>';
                                                    if ($row["id_deporte"] == 1) {
                                                    echo '<td></td>';
                                                    echo '<td>Empate</td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="empate[]" id="empate'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["empate"].'"> '.$row2["empate"].'</td>';
                                                    echo '<td></td><td></td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="empatept[]" id="empatept'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["empatept"].'"> '.$row2["empatept"].'</td>';

                                                    echo '<td></td>';

                                                    echo '<td> <input type="checkbox" class="chk"  name="dc12[]" id="dc12'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["dc12"].'"> DC12: '.$row2["dc12"].'</td>';
                                                      }

                                                   
                                                echo '</tr>';

                                               
                                               
                                               echo '<script src="js/jquery.js"></script>';
                                               echo '<script>
                                                        $(".chk").click(function(){
                                                            if ($("#gj1'.$row2["id"].'").prop("checked")) {
                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                 $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#alta'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gg'.$row2["id"].'").prop("checked", false)

                                                                   $("#ng'.$row2["id"].'").prop("checked", false)

                                                                   $("#dc1x'.$row2["id"].'").prop("checked", false)

                                                                   $("#dc2x'.$row2["id"].'").prop("checked", false)

                                                                   $("#dc12'.$row2["id"].'").prop("checked", false)
 
                                                            }
                                                            

                                                            if ($("#gj2'.$row2["id"].'").prop("checked")) {
                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                 $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                  $("#alta'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gg'.$row2["id"].'").prop("checked", false)

                                                                   $("#ng'.$row2["id"].'").prop("checked", false)

                                                                   $("#dc1x'.$row2["id"].'").prop("checked", false)

                                                                   $("#dc2x'.$row2["id"].'").prop("checked", false)

                                                                   $("#dc12'.$row2["id"].'").prop("checked", false)
                                                            
                                                            }

                                                            if ($("#empate'.$row2["id"].'").prop("checked")) {
                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                 $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#empatept'.$row2["id"].'").prop("checked", false)
                                                                   
                                                                   $("#baja'.$row2["id"].'").prop("checked", false)
                                                            
                                                            }

                                                            if ($("#empatept'.$row2["id"].'").prop("checked")) {
                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                 $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#empate'.$row2["id"].'").prop("checked", false)
                                                            
                                                            }

                                                            if ($("#alta'.$row2["id"].'").prop("checked")) {
                                                                
                                                                    
                                                                 $("#baja'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                    $("#g5to1'.$row2["id"].'").prop("checked", false)

                                                                     $("#g5to2'.$row2["id"].'").prop("checked", false)
                                                            
                                                            }

                                                             if ($("#baja'.$row2["id"].'").prop("checked")) {
                                                                
                                                                    
                                                                 $("#alta'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#g5to1'.$row2["id"].'").prop("checked", false)

                                                                     $("#g5to2'.$row2["id"].'").prop("checked", false)
                                                            
                                                            }

                                                            if ($("#runline1'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#alta'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                             if ($("#runline2'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)
                                                                
                                                                 $("#alta'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                             if ($("#gpt1'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)


                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                            if ($("#gpt2'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)


                                                                   $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                            if ($("#gst1'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)


                                                                   $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt2'.$row2["id"].'").prop("checked", false)


                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                             if ($("#gst2'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)


                                                                   $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt2'.$row2["id"].'").prop("checked", false)


                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                    
                                        
                                                            
                                                            }

                                                            if ($("#g5to1'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)


                                                                   $("#g5to2'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                            if ($("#g5to2'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)


                                                                   $("#g5to1'.$row2["id"].'").prop("checked", false)
                                                                    
                                        
                                                            
                                                            }

                                                            if ($("#gg'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#ng'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#alta'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt1'.$row2["id"].'").prop("checked", false)
                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#empate'.$row2["id"].'").prop("checked", false)

                                                                   $("#empatept'.$row2["id"].'").prop("checked", false)

                                                            
                                                            }

                                                            if ($("#ng'.$row2["id"].'").prop("checked")) {
                                                                

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#alta'.$row2["id"].'").prop("checked", false)

                                                                 $("#baja'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt1'.$row2["id"].'").prop("checked", false)
                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)
                                                                    
                                                                    $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#empate'.$row2["id"].'").prop("checked", false)

                                                                   $("#empatept'.$row2["id"].'").prop("checked", false)

                                                            
                                                            }

                                                            if ($("#dc1x'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#dc2x'.$row2["id"].'").prop("checked", false)

                                                                $("#dc12'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                 $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt1'.$row2["id"].'").prop("checked", false)
                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)
                                                                    
                                                                    $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#alta'.$row2["id"].'").prop("checked", false)

                                                                   $("#empate'.$row2["id"].'").prop("checked", false)

                                                                   $("#empatept'.$row2["id"].'").prop("checked", false)

                                                            
                                                            }

                                                            if ($("#dc2x'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#dc1x'.$row2["id"].'").prop("checked", false)

                                                                $("#dc12'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                 $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt1'.$row2["id"].'").prop("checked", false)
                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)
                                                                    
                                                                    $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#alta'.$row2["id"].'").prop("checked", false)

                                                                   $("#empate'.$row2["id"].'").prop("checked", false)

                                                                   $("#empatept'.$row2["id"].'").prop("checked", false)

                                                            
                                                            }

                                                            if ($("#dc12'.$row2["id"].'").prop("checked")) {
                                                                
                                                                $("#dc1x'.$row2["id"].'").prop("checked", false)

                                                                $("#dc2x'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                 $("#gj2'.$row2["id"].'").prop("checked", false)

                                                                    $("#gpt1'.$row2["id"].'").prop("checked", false)
                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)
                                                                    
                                                                    $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)

                                                                   $("#alta'.$row2["id"].'").prop("checked", false)

                                                                   $("#baja'.$row2["id"].'").prop("checked", false)

                                                                   $("#empate'.$row2["id"].'").prop("checked", false)

                                                                   $("#empatept'.$row2["id"].'").prop("checked", false)

                                                            
                                                            }




                                                        })
                                                         
                                                    </script>'; 
                                            }
                                            echo  '</tbody>';
                            		 echo '</div>';

                            	}
                            	
							


                          
                           
                                     
                                ?>
                                <input type="hidden" name="hoy" value="hoy">
                               <tr> <td><center><button class="btn btn-primary" id="ap">CONTINUAR</button></center></td></tr>
                        </form>
                        
                    
                        
                                 
                            
                        
            
                
            
    




    

    
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
       

      setInterval(function(){

            
           window.location="bienvenido.php";
        
        
       
      },360000);

    $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

        var formul = document.jugadas,
        elementos = formul.elements;
        longElementos = elementos.length;
        var validar = function validar(e){
            
            var n=0;
            for(i=0; i < longElementos; i++){

                if (elementos[i].type=="checkbox") {
                    if (elementos[i].checked) {
                        n++;
                    }

                }
            }

            if(n < 2){
                alert("minimo 2 jugadas");
                e.preventDefault();
            }
            else if(n >= 15){
                alert("Maximo 15 jugadas");
                e.preventDefault();
            }
         
    }
     formul.addEventListener("submit", validar)

     
      
       
        
      
      
  
    </script>
  
    <h5><font color="BLUE">NUEVA COMBINACIÓN EN FÚTBOL: <strong>GOL-GOL (GG)</strong></font> Ésta apuesta es válida si cada equipo marca al menos un gol. Ejemplo (Real Madrid 3 - Barcelona 1)</h5>
    <h5><font color="BLUE">NUEVA COMBINACIÓN EN FÚTBOL: <strong>NO-GOL (NG)</strong></font> Ésta apuesta es válida si uno o ambos equipos NO marcan gol. Ejemplo (Real Madrid 2 - Barcelona 0 )</h5>
    <h5><font color="BLUE">NUEVA COMBINACIÓN EN FÚTBOL: <strong>GANA O EMPATA VISITANTE (DC1X)</strong></font> Ésta apuesta es válida si gana o empata el equipo visitante</h5>
    <h5><font color="BLUE">NUEVA COMBINACIÓN EN FÚTBOL: <strong>GANA O EMPATA LOCAL (DC2X)</strong></font> Ésta apuesta es válida si gana o empata el equipo local</h5>
    <h5><font color="BLUE">NUEVA COMBINACIÓN EN FÚTBOL: <strong>GANA CUALQUIERA (DC12)</strong></font> Ésta apuesta es válida si gana cualquiera de los dos equipos</h5>
</body>


</html>
