<?php include("time_sesion.php");  
    include("conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

     <?php
        include("head.php");
    ?>
	<link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css">


</head>

<body>
 
     <div id="wrapper" class="hidden-print">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php 
            include("menu2.php");
        ?>
    </div>

        <!-- /#sidebar-wrapper -->
       
        <!-- Contenido -->
        <div id="page-content-wrapper">
            <header>
                <img src="img/header3.png" class="img-responsive hidden-print" alt="">
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
                            <a href="cerrar_sesion.php"> Salir</a></h4>
                    </div>
                    
                </div>
                <br><br> 
                <div class="row">
               
                    <div class="col-sm-6 col-xs-offset-2">
                		<center><h3>Cambiar Clave:</h3><br></center>
	                	 <form class="form-horizontal" method="POST" action="cambio_clave.php" name="cambio">

                            <div class="form-group">
                                <label for="clave_a" class="col-sm-4 control-label">Clave Actual:</label>
                                <div class="col-sm-6">
                                    <input type="password"  name="clave_a" id="clave_a" class="form-control" autocomplete="off" required="">
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="clave" class="col-sm-4 control-label">Clave Nueva:</label>
                                <div class="col-sm-6">
                                    <input type="password"  name="clave" id="clave" class="form-control" autocomplete="off" required="">
                                    	
                                </div>
                                 
                            </div>

                            <div class="form-group">
                                <label for="clave2" class="col-sm-4 control-label">Confirmar Clave Nueva:</label>
                                <div class="col-sm-6">
                                    <input type="password"  name="clave2" id="clave2" class="form-control" autocomplete="off" required="">
                                    	
                                </div><br><br>
                                <div class="col-sm-6 col-sm-offset-5">
                                 	<button class="btn btn-success">Cambiar Clave</button>
                                </div>
                            </div>
                            

                        </form>
                	
	                
                </div>
            </div>
            
           
            

          


            <!-- Contenido -->
            
        </div>


        




    

    <script src="js/jquery.js"></script>
    <script src="lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
    <!-- Menu Toggle Script -->
    <script>
    	$(".menu-toggle").click(function(e) {
           e.preventDefault();
           $("#wrapper").toggleClass("toggled");
        });

		var clave = cambio.clave;
		var clave2 = cambio.clave2;
		var validar= function validar(e) {
		var cambio = document.cambio;
		if (clave.value != clave2.value) {
			alert("las contraseñas no coinciden vuelva a introducirlas");
			e.preventDefault()
		}
		largopass = cambio.clave.value.length;
		    if(largopass < 6){
		        alert("La contraseña debe ser al menos de 6 caracteres.");
		        cambio.clave.focus();
		         e.preventDefault()
		    }
		}
		cambio.addEventListener("submit", validar);
    </script>
</body>


</html>
