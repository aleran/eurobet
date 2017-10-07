<?php include("../time_sesion.php");
if ($_SESSION['tipo']=="normal") {
    header("Location: ../bienvenido.php");
} 
    include("../conexion/conexion.php");    
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="Sitio de Apuestas en colombia, Parlays, Apuestas directas">
        <meta name="author" content="">
        <title>EUROBET :: Tu sitio de apuestas parlay</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../fonts/style.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../pacejs/themes/orange/pace-theme-barber-shop.css" rel="stylesheet">
        <link rel="icon"  href="balon.ico">



</head>

<body>
 
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php 
            include("../menu2.php");
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

                         if (isset($_POST["desde"])) {
                             $desde=$_POST["desde"];
                             $hasta=$_POST["hasta"];
                         } 
                         else {
                             $desde=$_GET["desde"];
                             $hasta=$_GET["hasta"];
                         } 

                        list($a,$m,$d) = explode("-", $desde);
                        $de=$d."/".$m."/".$a;
                         list($a2,$m2,$d2) = explode("-", $hasta);
                        $a=$d2."/".$m2."/".$a2;

                    ?>
                    <h3> Tickets Ganadores  Del: <?php echo $de; ?> Al: <?php echo $a; ?></h3>
                        <div class="table-responsive">
                                <table class="table table-striped">
                                        <thead>
                                    <th>Codigo</th>
                                    <th>Apuesta</th>
                                    <th>Fecha - Hora</th>
                                    <th>Apostado</th>
                                    <th>Ganancia</th>
                                </thead>
                                <tbody>
                                        
                        
                        <?php
                       
                                if ($_SESSION["tipo"]=="root") {
                                        $sql_act="SELECT * FROM tickets_c WHERE activo='1' AND ganar='1' AND (fecha BETWEEN '".$desde."' AND '".$hasta."')";
                                }
                                else {
                                        $sql_act="SELECT * FROM tickets_c WHERE activo='1' AND ganar='1' AND agencia='".$_SESSION["agencia"]."'AND (fecha BETWEEN '".$desde."' AND '".$hasta."')";
                                }
                            
                            $rs_act=mysqli_query($mysqli, $sql_act) or die(mysqli_error());
                            while ($row_act=mysqli_fetch_array($rs_act)) {
                                        list($a3,$m3,$d3) = explode("-", $row_act["fecha"]);
                                $fecha=$d3."/".$m3."/".$a3;
                                        echo"<tr>";
                                                echo"<td>";
                                                        echo "<a href='con_p_g.php?codigo=".$row_act["codigo"]."&desde=".$desde."&hasta=".$hasta."'>".$row_act["codigo"]."</a>";
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


        




    

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>


</html>