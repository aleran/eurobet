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
                <div align="center" class="visible-xs  hidden-print"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row hidden-print">
                    <div class="col-sm-6">
                        <?php 
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                        ?> 
                            <a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>
                    </div>
                    
                </div>
                <br><br>
                <div class="row">
                <style>
                    #ticket {
                        width: 302px;
                        text-align:justify;
                    }
                 </style>
                    <div class="col-sm-6 col-xs-offset-4 ">
                    
                                
                    
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
                        
                        


                        $sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio, ganar, pagado, push FROM parlay WHERE codigo='".$codigo."'";
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
                            echo "www.eurobet.com.co<br>";
                            echo "Agencia: ".$row_agen["agencia"]."<br>";
                            echo "Apuesta: ".$row_ticket["tipo"]."<br>";
                            list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
                            $fecha = $d."/".$m."/".$a;
                            echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
                            echo "Serial: ".$row_ticket["codigo"]."<br>";
                            echo "Ticket vigente por 7 días.<br><br>";

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
                                    list($a2,$m2,$d2)= explode("-",$row["fecha"]);
                                    $fecha2 = $d2."/".$m2."/".$a2;
                                    
                                if ($row["logro"]=="gj1") {
                                    echo $row_eq1["equipo"]."-> Ganar: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            

                                }

                                if ($row["logro"]=="gj2") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar: ".$row["valor_logro"]."<br>";
                                     if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }


                                if ($row["logro"]=="empate") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Empate: ".$row["valor_logro"]."<br>";
                                     if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                                if ($row["logro"]=="empatept") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Empate 1T: ".$row["valor_logro"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                                if ($row["logro"]=="alta") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Alta( ".$row["v_alta"]." ): ".$row["valor_logro"]."<br>";
                                     if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                                if ($row["logro"]=="baja") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Baja( ".$row["v_alta"]." ): ".$row["valor_logro"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                                if ($row["logro"]=="runline1") {
                                    echo $row_eq1["equipo"]."-> Runline (".$row["v_runline1"]."): ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
                                     if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                                if ($row["logro"]=="runline2") {
                                  echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Runline (".$row["v_runline2"]."): ".$row["valor_logro"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    
                                    echo "-------------------------------------------------------------<br>";

                                                            
                                }

                                if ($row["logro"]=="gpt1") {
                                    echo $row_eq1["equipo"]."-> Ganar 1T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";

                                }

                                if ($row["logro"]=="gpt2") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 1T: ".$row["valor_logro"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                                 if ($row["logro"]=="gst1") {
                                    echo $row_eq1["equipo"]."-> Ganar 2T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";

                                }

                                if ($row["logro"]=="gst2") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 2T: ".$row["valor_logro"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                }
                                     


                                if ($row["logro"]=="g5to1") {
                                    echo $row_eq1["equipo"]."-> Ganar 5to I: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            

                                }

                                if ($row["logro"]=="g5to2") {
                                    echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> Ganar 5to I: ".$row["valor_logro"]."<br>";
                                    if ($_SESSION["pais"]==1) {
                                        echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
                                    }
                                    else {
                                         echo "Fecha: ".$fecha2." Hora(VE): ".$row["hora_v"]."<br>";
                                    }
                                    echo "-------------------------------------------------------------<br>";
                                                            
                                }

                             }

                            echo "Apostado: ".$row_ticket["monto"]."<br>";
                           echo "-------------------------------------------------------------<br>";
                            echo "Ganancia : ".$row_ticket["premio"]."<br><br>";
                            echo "- Este ticket expira 7 días luego de su impresión<br>";
                            echo "- Sin ticket no se cobra el premio.<br>";
                            echo "- En caso de error de línea, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado será devuelto en consecuencia.<br>";
                            echo "Conozco y acepto las reglas de EUROBET.<br>";
                            echo "¡Mucha suerte!<br>";
                            echo "</div>";

                            if ($row_ticket["ganar"]==1) {
                                echo "<h3>Ganador</h3>";
                            }
                            else if ($row_ticket["ganar"]==0) {
                                 echo "<h3>Perdedor</h3>";
                            }
                   
                    ?>
                
            
                <br>
                </div>
                <div class="col"></div>
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
