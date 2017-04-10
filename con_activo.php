<!DOCTYPE html>
<html lang="es">
<?php session_start(); 
    include("conexion/conexion.php");
    if (!isset($_SESSION["agencia"])) {
        header("location:index.php");
    }
?>
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
                <?php
                    if ($_SESSION["tipo"]=="root") {
                         echo '<li>
                            <a href="#" title="Creación de cuentas" data-toggle="modal" data-target="#modalUsuarios">Crear Usuarios</a>
                        </li>';
                     } 
                    
                ?>
                <li>
                </li>
                <li>
                    
                    <a href="competiciones.php" title="Bienvenido a Eurobet">Apostar</a>
                </li>
                <li>
                    <a href="#" title="Líneas del día">Tickets Activos</a>
                </li>
                <li>
                    <a href="#" title="Líneas del día">Consulta de Tickets</a>
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
                        <?php 
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                        ?> 
                            <a href="#"> Salir</a></h4>
                    </div>
                    
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-4">
                	
	                        	
                	
	                <?php
                        $codigo=$_GET["codigo"]; 
	                   $sql="SELECT p.*, a.id_partido, a.logro, a.valor_logro, j.* FROM parlay p
                        JOIN apuestas a ON p.codigo=a.ticket
                        JOIN partidos j ON a.id_partido=j.id WHERE p.codigo='".$codigo."'";
                        $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
                        $row2=mysqli_fetch_array($rs);
                        echo "codigo: ".$row2["codigo"]."<br><br>";
	                    while ($row=mysqli_fetch_array($rs)) {
	                    			
	                    	$sql_eq1="SELECT equipo from equipos WHERE id='".$row["equipo1"]."'";
                            $rs_eq1=mysqli_query($mysqli,$sql_eq1) or die(mysqli_error());
                            $row_eq1=mysqli_fetch_array($rs_eq1);

                            $sql_eq2="SELECT equipo from equipos WHERE id='".$row["equipo2"]."'";
                            $rs_eq2=mysqli_query($mysqli,$sql_eq2) or die(mysqli_error());
                            $row_eq2=mysqli_fetch_array($rs_eq2);

                            if ($row["logro"]=="gj1") {
                                echo $row_eq1["equipo"]."-> Ganar: ".$row["gj1"]." vs ".$row_eq2["equipo"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                

                            }

                            if ($row["logro"]=="gj2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar: ".$row["gj2"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }


                            if ($row["logro"]=="empate") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Enpate: ".$row["empate"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

                            if ($row["logro"]=="alta") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Alta( ".$row["v_alta"]." ): ".$row["alta"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

                            if ($row["logro"]=="baja") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Baja( ".$row["v_alta"]." ): ".$row["baja"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

                            if ($row["logro"]=="runline1") {
                                echo $row_eq1["equipo"]."-> Runline( ".$row["v_runline1"]." ): ".$row["runline1"]." vs ".$row_eq2["equipo"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

                            if ($row["logro"]=="runline2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Runline( ".$row["v_runline2"]." ): ".$row["runline2"]."<br>";
                                echo "------------------------------------------------------------<br>";

                                
                            }

                            if ($row["logro"]=="gpt1") {
                                echo $row_eq1["equipo"]."-> Ganar 1T: ".$row["gpt1"]." vs ".$row_eq2["equipo"]."<br>";
                                echo "------------------------------------------------------------<br>";

                            }

                            if ($row["logro"]=="gpt2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 1T: ".$row["gpt2"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

                            if ($row["logro"]=="gst1") {
                                echo $row_eq1["equipo"]."-> Ganar 2T: ".$row["gst1"]." vs ".$row_eq2["equipo"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                

                            }

                            if ($row["logro"]=="gst2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 2T: ".$row["gst2"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

                            if ($row["logro"]=="g5to1") {
                                echo $row_eq1["equipo"]."-> Ganar 5to I: ".$row["g5to1"]." vs ".$row_eq2["equipo"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                

                            }

                            if ($row["logro"]=="g5to2") {
                                echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 5to I: ".$row["g5to2"]."<br>";
                                echo "------------------------------------------------------------<br>";
                                
                            }

	                    }
                        echo "Apostado: ".$row2["monto"]."<br>";
                        echo "Premio: ".$row2["premio"];

	                ?>
                    		
                	<br><br>
                	<a href="accion_ticket?anular=<?php echo $row2["codigo"] ?>" id="anular" class="btn btn-danger">Anular Ticket</a>
                    <a href="accion_ticket?ganar=<?php echo $row2["codigo"] ?>" id="ganar" class="btn btn-success">Ticket Ganador</a>
                
            
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
                                    <label for="cedula" class="col-sm-4 control-label">Cedula:</label>
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
                                    <label for="telefono" class="col-sm-4 control-label">Telefono:</label>
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
        $("#anular").click(function(){

        })
    </script>
</body>


</html>
