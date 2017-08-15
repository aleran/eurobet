<?php 
include("time_sesion.php");  
include("conexion/conexion.php");
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
<div id="avisow"><marquee>..::<strong>IMPORTANTE:</strong> <strong>LA COMBINACIÓN GANAR Y ALTA, RUNLINE Y ALTA NO SE ENCUENTRA DISPONIBLE, PUEDES JUGAR GANAR Y BAJA O EMPATE Y ALTA/BAJA</strong> -- Nuestra plataforma permite un mínimo de 2 jugadas y un máximo de 15. Montos mínimos de apuesta: <strong>COLOMBIA:</strong> $ 5.000 , <strong>VENEZUELA</strong> : Bs.F 500 ,  <strong>MÉXICO</strong>: $ 30 ::<strong>EUROBET  - ¡Tus Apuestas seguras en línea! --- </strong></marquee></div>
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php
            if ($_SESSION["tipo"]=="normal") {
                include("menu3.php");
            } 
            else {
                include("menu2.php");
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
                          
                                $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                                $rs_ag=mysqli_query($mysqli,$sql_ag);
                                $row_ag=mysqli_fetch_array($rs_ag);
                                echo "<h4>Agencia: ". $row_ag["agencia"];
                                echo '<a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>';
                          
                        ?> 
                            
                    </div>
                    
                </div>
                
        		<br>

        		<?php 
        			$sql_part="SELECT * FROM partidos WHERE id='".$_GET["partido"]."'";
        			$rs_part=mysqli_query($mysqli, $sql_part) or die(mysqli_error());
        			$row_part=mysqli_fetch_array($rs_part);

					$sql_compe="SELECT competicion, id_deporte FROM competiciones WHERE id_competicion=$row_part[id_competicion]";
					$rs_compe=mysqli_query($mysqli, $sql_compe) or die (mysqli_error());
					$row_compe=mysqli_fetch_array($rs_compe);

					$sql_eq1="SELECT id, equipo FROM equipos WHERE id=$row_part[equipo1]";
					$rs_eq1=mysqli_query($mysqli, $sql_eq1) or die (mysqli_error());
					$row_eq1=mysqli_fetch_array($rs_eq1);

					$sql_eq2="SELECT id, equipo FROM equipos WHERE id=$row_part[equipo2]";
					$rs_eq2=mysqli_query($mysqli, $sql_eq2) or die (mysqli_error());
					$row_eq2=mysqli_fetch_array($rs_eq2);

					echo "Partido: ".$row_eq1["equipo"]. " vs " .$row_eq2["equipo"]. " (".$row_compe["competicion"].")";
        		?>
           		
           		<form class="form-horizontal" method="POST" action="evaluado.php">
                    
					<input type="hidden" name="id_partido" value="<?php echo $row_part["id"] ?>">
					<input type="hidden" name="dep" value="<?php echo $row_compe["id_deporte"] ?>">
                    <div class="form-group">
                        <label for="r_gj1" class="col-sm-4 control-label">ML: <?php echo $row_eq1["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_gj1" id="r_gj1" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_gj2" class="col-sm-4 control-label">ML: <?php echo $row_eq2["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_gj2" id="r_gj2" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <?php if ($row_compe["id_deporte"]==1) {?>
                    <div class="form-group">
                        <label for="r_empate" class="col-sm-4 control-label">EMPATE:</label>
                        <div class="col-sm-3">
                            <select  name="r_empate" id="r_empate" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($row_compe["id_deporte"] == 1 || $row_compe["id_deporte"]== 2 || $row_compe["id_deporte"]== 3 || $row_compe["id_deporte"]== 4) { ?>
                    <div class="form-group">
                        <label for="r_alta" class="col-sm-4 control-label">ALTA: <?php echo $row_part["v_alta"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_alta" id="r_alta" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_baja" class="col-sm-4 control-label">BAJA: <?php echo $row_part["v_alta"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_baja" id="r_baja" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($row_compe["id_deporte"]==1) {?>
                    <div class="form-group">
                        <label for="r_gpt1" class="col-sm-4 control-label">G 1T: <?php echo $row_eq1["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_gpt1" id="r_gpt1" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_gpt2" class="col-sm-4 control-label">G 1T: <?php echo $row_eq2["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_gpt2" id="r_gpt2" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label for="r_empatept" class="col-sm-4 control-label">Empate 1T:</label>
                        <div class="col-sm-3">
                            <select  name="r_empatept" id="r_empatept" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_gg" class="col-sm-4 control-label">GG:</label>
                        <div class="col-sm-3">
                            <select  name="r_gg" id="r_gg" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_ng" class="col-sm-4 control-label">NG:</label>
                        <div class="col-sm-3">
                            <select  name="r_ng" id="r_ng" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_dc1x" class="col-sm-4 control-label">DC1X: <?php echo $row_eq1["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_dc1x" id="r_dc1x" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_dc2x" class="col-sm-4 control-label">DC2X: <?php echo $row_eq2["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_dc2x" id="r_dc2x" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_dc12" class="col-sm-4 control-label">DC12:</label>
                        <div class="col-sm-3">
                            <select  name="r_dc12" id="r_dc12" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <?php }?>
                    <?php if ($row_compe["id_deporte"] == 1 || $row_compe["id_deporte"]== 2 || $row_compe["id_deporte"]== 3 || $row_compe["id_deporte"]== 4 || $row_compe["id_deporte"]== 5) { ?>
                    <div class="form-group">
                        <label for="r_runline1" class="col-sm-4 control-label">RUNLINE (<?php echo $row_part["v_runline1"]; ?>): <?php echo $row_eq1["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_runline1" id="r_runline1" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_runline2" class="col-sm-4 control-label">RUNLINE (<?php echo $row_part["v_runline2"]; ?>): <?php echo $row_eq2["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_runline2" id="r_runline2" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                     <?php if ($row_compe["id_deporte"]== 2) { ?>
                    <div class="form-group">
                        <label for="r_g5to1" class="col-sm-4 control-label">G 5to: <?php echo $row_eq1["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_g5to1" id="r_g5to1" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="r_g5to2" class="col-sm-4 control-label">G 5to: <?php echo $row_eq2["equipo"]; ?></label>
                        <div class="col-sm-3">
                            <select  name="r_g5to2" id="r_g5to2" class="form-control">
                            	
                            	<option value="PERDEDOR">PERDEDOR</option>
                            	<option value="GANADOR">GANADOR</option>
                            	<option value="PUSH">PUSH</option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>               
                            <button class="btn btn-success">Evaluar</button>
                        
                </form>
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
                                    <label for="pais" class="col-sm-4 control-label">Pais:</label>
                                    <div class="col-sm-6">
                                        <select  name="pais" id="pais" class="form-control">
                                        <?php 
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
                                    <label for="tipo" class="col-sm-4 control-label">Tipo de usuario:</label>
                                    <div class="col-sm-6">
                                        <select  name="tipo" id="tipo" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="taquilla">Taquilla</option>
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
