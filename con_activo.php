<!DOCTYPE html>
<html lang="es">
<?php include("time_sesion.php");  
    include("conexion/conexion.php");
   
?>
<head>

     <?php
        include("head.php");
    ?>



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
                <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row hidden-print">
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
                <style>
                    #ticket {
                        width: 302px
                    }
                 </style>
                    <div class="col-lg-6 col-lg-offset-4">
                	
	                        	
                	
	                <?php

                        if ($_SESSION["tipo"]=="root") {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_POST["codigo"];
                            }
                        }
                        else {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_SESSION["agencia"]."-".$_POST["codigo"];
                            }
                        }
                        
                        


                        $sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio FROM parlay WHERE codigo='".$codigo."'";
                        $rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
                        $num_ticket=mysqli_num_rows($rs_ticket);
                        if ($num_ticket < 1) {
                            echo "<script>alert('Ticket no existe');window.location='consultas.php';</script>";
                        }
                        $row_ticket=mysqli_fetch_array($rs_ticket);
                        

                        $sql_agen="SELECT agencia FROM agencias WHERE id='".$row_ticket["agencia"]."'";
                        $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
                        $row_agen=mysqli_fetch_array($rs_agen);


                        echo '<div id="ticket">';
                            echo "www.eurobet.com<br>";
                            echo "Agencia: ".$row_agen["agencia"]."<br>";
                            echo "Apuesta: ".$row_ticket["tipo"]."<br>";
                            list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
                            $fecha = $d."/".$m."/".$a;
                            echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
                            echo "Ticket: ".$row_ticket["codigo"]."<br>";
                            echo "El ticket caduca a los 5 dias.<br><br>";

                            $sql="SELECT p.*, a.id_partido, a.logro, a.valor_logro, j.* FROM parlay p
                            JOIN apuestas a ON p.codigo=a.ticket
                            JOIN partidos j ON a.id_partido=j.id WHERE p.codigo='".$codigo."'";
                            $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
                            while($row = mysqli_fetch_array($rs)) {
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

                            echo "Apostado: ".$row_ticket["monto"]."<br>";
                            echo "------------------------------------------------------------<br>";
                            echo "Ganancia Maxima: ".$row_ticket["premio"]."<br><br>";
                            echo "<p>- Este ticket expira 7 dias luego de la impresión del mismo</p>";
                            echo "<p>- Sin ticket no se reclama el premio</p>";
                            echo "<p>- En caso de un error en la linea, rotación, hora programada, maxima apuesta, apuestas fuera de tiempo o comenzando el evento, las apuestas seran CANCELADAS y el monto del arriesgado será devuelto en consecuencia.</p>";
                            echo "<p>Conozco y acepto las reglas.</p>";
                            echo "<p>visita www.eurobet.com</p>";
                            echo "</div>";
                            echo "<button class='btn btn-primary hidden-print' id='imprimir' type='button'>Imprimir</button>";

                        	                ?>
                    		
                	<br><br>
                	<a href="#" id="anular" class="btn btn-danger hidden-print">Anular Ticket</a>
                    <a href="#" id="ganar" class="btn btn-success hidden-print">Ticket Ganador</a><br>
                
            
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
        $("#anular").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro desea anular el ticket?")) {
                window.location="accion_ticket.php?anular=<?php echo $row_ticket["codigo"]; ?>"
            }

        })
        $("#ganar").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que este ticket es ganador?")) {
                window.location="accion_ticket.php?ganar=<?php echo $row_ticket["codigo"]; ?>"
            }

        })
        $("#imprimir").click(function(){
            window.print();
        })
    </script>
</body>


</html>
