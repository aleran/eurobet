<!DOCTYPE html>
<html lang="es">
<?php include("time_sesion.php"); 
    include("conexion/conexion.php");
    
?>
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
            include("menu2.php");
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
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                        ?> 
                            <a href="cerrar_sesion.php"> Salir</a></h4>
                    </div>
                    
                </div>
                
                <div class="row">
                    <?php 
                        list($a,$m,$d) = explode("-", $_POST["desde"]);
                        $desde=$d."/".$m."/".$a;
                         list($a2,$m2,$d2) = explode("-", $_POST["hasta"]);
                        $hasta=$d2."/".$m2."/".$a2;

                    ?>
                    <h3> Tickets Del: <?php echo $desde; ?> Al: <?php echo $hasta; ?></h3>
                	<div class="table-responsive">
                		<table class="table table-striped">
	                		<thead>
	                            <th>Codigo</th>
	                            <th>Apuesta</th>
	                            <th>Fecha - Hora</th>
	                            <th>Apostado</th>
	                            <th>Ganancia</th>
	                            <th>Ganador</th>
	                        </thead>
	                        <tbody>
	                        	
                	
	                <?php 
	                	if ($_SESSION["tipo"]=="root") {
	                		$sql_act="SELECT * FROM parlay WHERE activo='1' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
	                	}
	                	else {
	                		$sql_act="SELECT * FROM parlay WHERE activo='1' AND agencia='".$_SESSION["agencia"]."'AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
	                	}
	                    
	                    $rs_act=mysqli_query($mysqli, $sql_act) or die(mysqli_error());
	                    while ($row_act=mysqli_fetch_array($rs_act)) {
	                    		list($a3,$m3,$d3) = explode("-", $row_act["fecha"]);
                                $fecha=$d3."/".$m3."/".$a3;
	                    		echo"<tr>";
	                    			echo"<td>";
	                    				echo "<a href='con_activo.php?codigo=".$row_act["codigo"]."'>".$row_act["codigo"]."</a>";
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
	                    				if ($row_act["ganar"]==0) {
	                    					echo "NO";
	                    				}
	                    				else echo "SI";
	                    			echo"</td>";
	                    		echo"</tr>";

	                    }

	                ?>
                    		
                				
                			</tbody>
                		</table>
                	</div>
                
            
                <br>
        
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
    </script>
</body>


</html>
