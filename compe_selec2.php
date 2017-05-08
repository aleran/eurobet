<!DOCTYPE html>
<html lang="es">
<?php session_start()  ?>
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
    <div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un máximo de 15, monto mínimo $5000 ::EuroBet - Tus Apuestas seguras en línea</marquee></div>

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
                        if ($_SESSION["pais"]==1 || $_GET["pais"]==1) {

                            $sql_inicio="SELECT id, hora FROM partidos WHERE fecha='".date("Y-m-d")."' AND inicio='0'";
                            $rs_inicio=mysqli_query($mysqli,$sql_inicio) or die(mysqli_error());
                            while ($row_inicio=mysqli_fetch_array($rs_inicio)) {

                                if ($row_inicio["hora"] <= date("H:i:s")) {
                                    $sql_act="UPDATE partidos SET inicio='1' WHERE id='".$row_inicio["id"]."'";
                                    $rs_act=mysqli_query($mysqli,$sql_act) or die(mysqli_error());
                                    
                                }
                            }

                        }

                        else {

                            $sql_inicio="SELECT id, hora_v FROM partidos WHERE fecha_v='".date("Y-m-d")."' AND inicio_v='0'";
                            $rs_inicio=mysqli_query($mysqli,$sql_inicio) or die(mysqli_error());
                            while ($row_inicio=mysqli_fetch_array($rs_inicio)) {

                                if ($row_inicio["hora_v"] <= date("H:i:s")) {
                                    $sql_act="UPDATE partidos SET inicio_v='1' WHERE id='".$row_inicio["id"]."'";
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
               	<form action="directa.php" name="jugadas" id="jugadas" method="POST">
                    <div class="row">
                    
                        <?php
                                
                            include("lib/fecha_hora.php");

                             if (isset($_POST["competicion"])) {
                                $competicion=$_POST["competicion"];
                            }
                            else if (isset($_GET["compe_select"])) {
                                $competicion=unserialize(urldecode(stripslashes($_GET["compe_select"])));
                            }
                           
                            if (!isset($competicion)) {
                              echo "<script>alert('no selecciono ligas');window.location='competiciones.php?pais=".$_GET["pais"]."'</script>";
                            }
                             foreach ($competicion as $pb => $valor) {
								$sql="SELECT * FROM competiciones Where id_competicion=$valor";
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
                                             if ($_SESSION["pais"]==1 || $_GET["pais"]==1) {

                                                $sql2="SELECT * FROM partidos WHERE id_competicion=$id_comp AND inicio=0 AND fecha >= '".fecha()."' ORDER BY fecha ASC";
                                                $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                $num2=mysqli_num_rows($rs2);

                                            }
                                            else {
                                                $sql2="SELECT * FROM partidos WHERE id_competicion=$id_comp AND inicio_v=0 AND fecha_v >= '".fecha()."' ORDER BY fecha ASC";
                                                $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                $num2=mysqli_num_rows($rs2);
                                            }

                                            if ($num2 == 0) {
                                                echo "<tr>";
                                                    echo "<td>";
                                                        echo "NO HAY PARTIDOS";
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
	                                                echo '<td>Equipo</td>';
	                                                echo '<td>Moneyline</td>';
	                                                 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 4) {
	                                                 echo '<td>Alta/Baja</td>';
	                                             	}
	                                                if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 5) {
	                                                	echo '<td>Runline</td>';
	                                                }
                                                    if ($row["id_deporte"] == 1) {
	                                                	echo '<td>Primer Tiempo</td>';
                                                        echo '<td>Segundo Tiempo</td>';
                                                    }
                                                     
	                                                if ($row["id_deporte"] == 2) {
	                                                	echo '<td>5to ining</td>';
	                                                }
	                                                
                                                echo '</tr>';
                                                echo '<tr class="agg">';

                                                 if ($_SESSION["pais"]==1 || $_GET["pais"]==1) {
                                                    list($a,$m,$d) = explode("-",$row2["fecha"]);
                                                    echo '<td>'.$d.'/'.$m.'/'.$a.' - '.$row2["hora"].'</td>';
                                                }

                                                else {
                                                    list($a,$m,$d) = explode("-",$row2["fecha_v"]);
                                                    echo '<td>'.$d.'/'.$m.'/'.$a.' - '.$row2["hora_v"].'</td>';

                                                }
                                                	echo '<td>'.$row3["equipo"].'</td>';

                                                	echo '<td> <input type="checkbox" class="chk" name="gj1[]" id="gj1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gj1"].'"> '.$row2["gj1"].'</td>';

                                                	 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 4) {
                                                		echo '<td> <input type="checkbox" class="chk"  name="alta[]" id="alta'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["alta"].'/'.$row2["v_alta"].'"> Alta: ( '.$row2["v_alta"].' ) '.$row2["alta"].'</td>';
                                                	}
                                                	 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 5) {
                                                	echo '<td> <input type="checkbox" class="chk"  name="runline1[]" id="runline1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["runline1"].'/'.$row2["v_runline1"].'"> ( '.$row2["v_runline1"].' )'.$row2["runline1"].'</td>';
	                                                	
	                                                }
                                                    if ($row["id_deporte"] == 1) {
                                                    echo '<td> <input type="checkbox" class="chk"  name="gpt1[]" id="gpt1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gpt1"].'"> '.$row2["gpt1"].'</td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="gst1[]" id="gst1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gst1"].'"> '.$row2["gst1"].'</td>';
                                                    
                                                    }
                                                	if ($row["id_deporte"] == 2) {
	                                                	echo '<td> <input type="checkbox" class="chk"  name="g5to1[]" id="g5to1'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["g5to1"].'"> '.$row2["g5to1"].'</td>';
	                                                }
                                                	

                                                echo '</tr>';
                                           
                                                echo '<tr>';
                                                   echo '<td></td>';
                                                	echo '<td> '.$row4["equipo"].'</td>';
                                                	echo '<td> <input type="checkbox" class="chk"  name="gj2[]" id="gj2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gj2"].'"> '.$row2["gj2"].'</td>';
                                                	 if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 4) {
                                                		echo '<td> <input type="checkbox" class="chk"  name="baja[]"" id="baja'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["baja"].'/'.$row2["v_alta"].'">  Baja: ( '.$row2["v_alta"].' )'.$row2["baja"].'</td>';
                                                	}
                                                	if ($row["id_deporte"] == 1 || $row["id_deporte"]== 2 || $row["id_deporte"]== 3 || $row["id_deporte"]== 5) {
                                                	echo '<td> <input type="checkbox" class="chk"  name="runline2[]" id="runline2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["runline2"].'/'.$row2["v_runline2"].'"> ( '.$row2["v_runline2"].' )'.$row2["runline2"].'</td>';
                                                }
                                                    if ($row["id_deporte"] == 1) {
                                                    echo '<td> <input type="checkbox" class="chk"  name="gpt2[]" id="gpt2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gpt2"].'"> '.$row2["gpt2"].'</td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="gst2[]" id="gst2'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["gst2"].'"> '.$row2["gst2"].'</td>';

                                                    
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

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
 
                                                            }
                                                            

                                                            if ($("#gj2'.$row2["id"].'").prop("checked")) {
                                                                 $("#gj1'.$row2["id"].'").prop("checked", false)

                                                                $("#empate'.$row2["id"].'").prop("checked", false)

                                                                $("#runline1'.$row2["id"].'").prop("checked", false)

                                                                 $("#runline2'.$row2["id"].'").prop("checked", false)

                                                                  $("#gpt1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gpt2'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst1'.$row2["id"].'").prop("checked", false)

                                                                   $("#gst2'.$row2["id"].'").prop("checked", false)
                                                            
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




                                                        })
                                                         
                                                    </script>'; 
                                            }
                                            echo  '</tbody>';
                            		 echo '</div>';

                            	}
                            	
							}


                          
                           
                                     
                                ?>
                               <tr> <td><center><button class="btn btn-primary" id="ap">Continuar</button></center></td></tr>
                        </form>
                        

                        <!-- Modal Registro de Usuarios -->

            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalRegistroLabel">Registrate</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" name="registro" method="POST" action="registro.php">
                                <div class="form-group">
                                    <label for="pais" class="col-sm-4 control-label">Pais:</label>
                                    <div class="col-sm-6">
                                        <select  name="pais" id="pais" class="form-control">
                                        <?php
                                            include("conexion/conexion.php"); 
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
                                    <label for="correo2" class="col-sm-4 control-label">Confirmar Correo:</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="correo2" id="correo2" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave" class="col-sm-4 control-label">Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave" id="clave" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave2" class="col-sm-4 control-label">Confirmar Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave2" id="clave2" placeholder="" required>
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
                                 
                            
                        
            
                
            
    




    

    
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $(".menu-toggle").click(function() {
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

           if(n > 1){
                alert("Puede Seleccionar solo una jugada");
                e.preventDefault();
             }
            else if(n < 1) {
                alert("Debe seleccionar una jugada");
                e.preventDefault();
             }
            
         
    }
     formul.addEventListener("submit", validar)   
        
      
  
    </script>
    
   <h6><center><strong>IMPORTANTE:</strong> LOS VALORES DE LAS LÍNEAS PUEDEN CAMBIAR DURANTE EL DÍA <strong>SIN PREVIO AVISO</strong></center></h6>
    <h6><center><strong>SE INFORMA:</strong> QUE EN CASO DE EMPATE DE LOGRO (PUSH), DE SER UN TICKET GANADOR ÉSTA SE ELIMINA Y SE CALCULA EL PREMIO EN BASE A LAS RESTANTES</center></h6>
    
</body>


</html>
