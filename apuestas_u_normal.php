<?php include("time_sesion.php"); 
    include("conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

     <?php
        include("head.php");
    ?>



</head>

<body>
 
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php 
            include("menu3.php");
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
                             $sql_normal="SELECT nombre,apellido FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                                $rs_normal=mysqli_query($mysqli,$sql_normal) or die(mysqli_error());
                                $row_normal=mysqli_fetch_array($rs_normal);
                                echo "<h4>Usuario: ". $row_normal["nombre"].", ".$row_normal["apellido"]."";
                                echo '<a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>'; 
                        ?> 
                            
                    </div>
                    
                </div>
                
                <div class="row">
                    <?php
                             $desde=$_POST["desde"];
                             $hasta=$_POST["hasta"];

                       

                        list($a,$m,$d) = explode("-", $desde);
                        $de=$d."/".$m."/".$a;
                         list($a2,$m2,$d2) = explode("-", $hasta);
                        $a=$d2."/".$m2."/".$a2;

                    ?>
                    <h3> Tickets Del: <?php echo $de; ?> Al: <?php echo $a; ?></h3>
                	<div class="table-responsive">
                		<table class="table table-striped">
	                		<thead>
	                            <th>Codigo</th>
	                            <th>Apuesta</th>
	                            <th>Fecha - Hora</th>
	                            <th>Apostado</th>
	                            <th>Ganancia</th>
	                            <th>Estatus</th>
	                        </thead>
	                        <tbody>
	                        	
                	
	                <?php
                       
	                	$sql_act="SELECT * FROM parlay WHERE activo='1' AND cedula='".$_SESSION["usuario"]."' AND (fecha BETWEEN '".$desde."' AND '".$hasta."')";

	                    
	                    $rs_act=mysqli_query($mysqli, $sql_act) or die(mysqli_error());
	                    while ($row_act=mysqli_fetch_array($rs_act)) {
	                    		list($a3,$m3,$d3) = explode("-", $row_act["fecha"]);
                                $fecha=$d3."/".$m3."/".$a3;
	                    		echo"<tr>";
	                    			echo"<td>";
	                    				echo "<a href='con_u_normal.php?codigo=".$row_act["codigo"]."&desde=".$desde."&hasta=".$hasta."'>".$row_act["codigo"]."</a>";
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $row_act["tipo"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $fecha ." - ". $row_act["hora"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $row_act["monto"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $row_act["premio"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				if ($row_act["ganar"]==3) {
	                    					echo "Por Verificar";
	                    				}
	                    				else if ($row_act["ganar"]==1) {
	                    					echo "Ganado";
	                    				}
	                    				else {
	                    					echo "Perdido";
	                    				}
	                    				 
	                    			echo"</td>";
	                    				
	                    		echo"</tr>";

	                    }

	                ?>
                    		
                				
                			</tbody>
                		</table>
                	</div>
                
            
                <br>
        
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
