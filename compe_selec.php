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
               
                    <div class="row">
                    <form action="" method="GET">
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
                                            	$sql3="SELECT equipo FROM equipos WHERE id=$row2[equipo1]";
                                            	$rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());
                                            	$row3=mysqli_fetch_array($rs3);
                                            	$sql4="SELECT equipo FROM equipos WHERE id=$row2[equipo2]";
                                            	$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());
                                            	$row4=mysqli_fetch_array($rs4);
                                                echo '<tr>';
	                                                echo '<td>Equipo</td>';
	                                                echo '<td>Moneyline</td>';
	                                                 echo '<td>Alta/Baja</td>';
	                                                echo '<td>Runline</td>';
	                                                echo '<td>Primer Tiempo</td>';
	                                                echo '<td>Segundo Tiempo</td>';
	                                                if ($row["id_deporte"] == 2) {
	                                                	echo '<td>5to ining</td>';
	                                                }
	                                                
                                                echo '</tr>';
                                                echo '<tr>';
                                                	echo '<td>'.$row3["equipo"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["gj1"].'"> '.$row2["gj1"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["alta"].'"> Alta: '.$row2["alta"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["runline1"].'"> '.$row2["runline1"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["gpt1"].'"> '.$row2["gpt1"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["gst1"].'"> '.$row2["gst1"].'</td>';
                                                	if ($row["id_deporte"] == 2) {
	                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["g5to"].'"> '.$row2["g5to"].'</td>';
	                                                }
                                                	

                                                echo '</tr>';
                                                 echo '<tr>';
                                                	echo '<td>Empate</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["empate"].'"> '.$row2["empate"].'</td>';
                                                	echo '<td>'.$row2["v_alta"].'</td>';
                                                	echo '<td>'.$row2["v_runline"].'</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                	echo '<td> '.$row4["equipo"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["gj2"].'"> '.$row2["gj2"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["baja"].'">  Baja: '.$row2["baja"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["runline2"].'"> '.$row2["runline2"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["gpt2"].'"> '.$row2["gpt2"].'</td>';
                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["gst2"].'"> '.$row2["gst2"].'</td>';
                                                	if ($row["id_deporte"] == 2) {
	                                                	echo '<td> <input type="checkbox" name="logros[]" value="'.$row2["g5to2"].'"> '.$row2["g5to2"].'</td>';
	                                                }
                                                echo '</tr>';
                                               

                                            }
                                            echo  '</tbody>';
                            		
                            	}
                            	
							}


                          
                           
                                     
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
