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
 
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
            <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle">Cerrar Menu</a></div>
                <li class="sidebar-brand">
                    <a href="#">
                       BIENVENIDO
                    </a>
                </li>
                <li>
                    <a href="#" title="Registro de datos para creación de cuentas" data-toggle="modal" data-target="#modalRegistro">Tus apuestas</a>
                </li>
                <li>
                    
                    <a href="#" title="Bienvenido a Eurobet">Apostar</a>
                </li>
                <li>
                    <a href="#" title="Líneas del día">Tickets Activos</a>
                </li>
                <li>
                    <a href="#" title="Por Favor ingrese los últimos 9 dígitos de su ticket">Cambio de Password</a>
                </li>
                <li>
                    <a href="#" title="Conoce nuestras políticas y términos de prestación de Servicio">Consulta tu Parlay</a>
                </li>
                <li>
                    <a href="ayuda.html" target="_blank" title="¿Necesitas ayuda? , Comunícate con nosotros">Reglas</a>
                </li>
                <li>
                    <a href="#" title="PQR - Peticiones, Quejas y Reclamos">Contáctenos</a>
                </li>
                
            </ul>
        </div>
    </div>

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
               
                <div class="row">
                    <form action="compe_selec.php" method="POST">
                        <?php
                        	
                            echo '<div class="col-lg-6">
                                 <div class="table-responsive">
                                    <table class="table">    
                                        <thead>
                                            <th>Jugadas</th>
                                        </thead>';
                                        echo '<tbody>';

                                           	include("conexion/conexion.php");
                                           		if (isset($_POST["gj1"])){
                                           	 	$gj1=$_POST["gj1"];
                           							foreach ($gj1 as $pa => $valor) {
                           								list($p,$l) = explode("-",$valor);
                           								echo $p;
                           								echo $l;
                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo $valor;
                                                			echo '</td>';

                                                		$sql="SELECT * FROM partidos WHERE id='$p'";
                           								$rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                           						 		$row=mysqli_fetch_array($rs);
                           						 		$sql2="SELECT *  FROM equipos  WHERE id='".$row["equipo1"]."'";
                                            			$rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                            			while ( $row2=mysqli_fetch_array($rs2)) {
                                            				
                                            				echo '<td>';
                                               					echo $row2["equipo"];
                                                			echo '</td>';
                                            			}
                                            				
                                            			
                                                		echo '</tr>';
                           						 	}

                                           	 	}


                                           	 	if (isset($_POST["gj2"])){
                                           	 	$gj2=$_POST["gj2"];
                           							foreach ($gj2 as $pa => $valor2) {
                           								list($p2,$l2) = explode("-",$valor2);
                           								echo $p2;
                           								echo $l2;
                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo $valor2;
                                                			echo '</td>';

                                                		$sql3="SELECT * FROM partidos WHERE id='$p2'";
                           								$rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());

                           						 		$row3=mysqli_fetch_array($rs3);
                           						 		$sql4="SELECT *  FROM equipos  WHERE id='".$row3["equipo2"]."'";
                                            			$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());
                                            			while ( $row4=mysqli_fetch_array($rs4)) {
                                            				
                                            				echo '<td>';
                                               					echo $row4["equipo"];
                                                			echo '</td>';
                                            			}
                                            				
                                            			
                                                		echo '</tr>';
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["empate"])){
                                           	 	$empate=$_POST["empate"];
                           							foreach ($empate as $pa => $valor3) {
                           								list($p3,$l3) = explode("-",$valor3);
                           								echo $p3;
                           								echo $l3;
                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo $valor3;
                                                			echo '</td>';

                                                		$sql4="SELECT * FROM partidos WHERE id='$p3'";
                           								$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());

                           						 		$row4=mysqli_fetch_array($rs4);
                           						 		$sql5="SELECT *  FROM equipos  WHERE id='".$row4["equipo1"]."'";
                                            			$rs5=mysqli_query($mysqli, $sql5) or die (mysqli_error());
                                            			$row5=mysqli_fetch_array($rs5);
                                            			$sql6="SELECT *  FROM equipos  WHERE id='".$row4["equipo2"]."'";
                                            			$rs6=mysqli_query($mysqli, $sql6) or die (mysqli_error());
                                            			$row6=mysqli_fetch_array($rs6);


                                            				
                                            				echo '<td>';
                                               					echo $row5["equipo"]." - ". $row6["equipo"];
                                                			echo '</td>';
                                            			
                                            				
                                            			
                                                		echo '</tr>';
                           						 	}

                                           	 	}
                                               
                                            


                        					

                           					
                           						

                            				
                           						 			
                           						 		
                           								
                                            			/*if (isset($_POST["gj2"])){
                           						 			$sql3="SELECT equipo FROM equipos WHERE id=$row[equipo2]";
                                            				$rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());
                                            				$row3=mysqli_fetch_array($rs3);
                                            				echo $row3["equipo"];
                           						 		}*/

                                            			//echo $row["equipo1"];
                            				 
                                          
                                            echo  '</tbody>';
                                        echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                
                                     
                                ?>
                           
                    </div>
                     <button>Continuar</button>
                        </form>
                                
                            
                        
            
                
            
        
        
                
                 <div class="col-lg-6">
                      <table class="table">
                            
                        </tbody>
                    </table>
                   
                    </form>
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
    </script>
</body>


</html>
