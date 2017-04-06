<!DOCTYPE html>
<html lang="es">
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="Sitio de Apuestas en colombia, Parlays, Apuestas directas">
    <meta name="author" content="">
    <title>EuroBet :: Tu sitio de apuestas parlay en la web</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="pacejs/themes/orange/pace-theme-barber-shop.css" rel="stylesheet">
    <link rel="icon"  href="balon.ico">



</head>

<body>
 


        <!-- /#sidebar-wrapper -->
       
        <!-- Contenido -->
        <div id="page-content-wrapper">
            <header>
                <img src="img/header2.png" class="img-responsive" alt="">
        </header>
        <br>
            <div class="container-fluid">
                <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row">
                    <div class="col-lg-6">
                   	<h4>Bienvenido <?php //echo $_SESSION['nombreC']; ?> <a href="#"> Salir</a></h4>
                    </div>
                    
                </div>
               	<form action="apostar.php" name="jugadas" id="jugadas" method="POST">
                    <div class="row">
                    
                        <?php
                                
                            include("conexion/conexion.php");
                             $competicion=$_POST["competicion"];
                             foreach ($competicion as $pb => $valor) {
								$sql="SELECT * FROM competiciones Where id_competicion=$valor";
                            	$rs=mysqli_query($mysqli, $sql) or die (mysqli_error());
                            	while ($row=mysqli_fetch_array($rs)) {
                            		echo '<div class="col-lg-12">
                                		<div class="table-responsive">
                                        	<table class="table">    
                                            	<thead>
                                                	<th>'.$row['competicion'].'</th>

                                            	</thead>';
                                            	 echo '<tbody>';

                                            $id_comp=$row["id_competicion"];
                                            $sql2="SELECT * FROM partidos WHERE id_competicion=$id_comp";
                                            $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                
                                            while($row2=mysqli_fetch_array($rs2)) {
                                            	$sql3="SELECT id, equipo FROM equipos WHERE id=$row2[equipo1]";
                                            	$rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());
                                            	$row3=mysqli_fetch_array($rs3);
                                            	$sql4="SELECT id, equipo FROM equipos WHERE id=$row2[equipo2]";
                                            	$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());
                                            	$row4=mysqli_fetch_array($rs4);
                                                echo '<tr class="danger">';
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
                                                    }
                                                     if ($row["id_deporte"] == 1) {
	                                                	echo '<td>Segundo Tiempo</td>';
                                                    }
	                                                if ($row["id_deporte"] == 2) {
	                                                	echo '<td>5to ining</td>';
	                                                }
	                                                
                                                echo '</tr>';
                                                echo '<tr class="agg">';
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
                                                    echo '<td>Empate</td>';
                                                    echo '<td> <input type="checkbox" class="chk"  name="empate[]" id="empate'.$row2["id"].'" value="'.$row2["id"].'/'.$row2["empate"].'"> '.$row2["empate"].'</td>';
                                                    echo '<td></td><td></td><td></td><td></td>';
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
                        
                   	
                   <button id="ap">Continuar</button>
                        </form>
                                 
                            
                        
            
                
            
    




    

    
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

   
        
      
  
    </script>
</body>


</html>
