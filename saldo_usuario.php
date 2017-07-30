<?php include("time_sesion.php");
    if ($_SESSION['tipo']=="normal" || $_SESSION['tipo']=="taquilla") {
          header("Location: bienvenido.php");
      }  
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
<div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un máximo de 15, monto mínimo de apuesta $5000 ::EuroBet - Tus Apuestas seguras en línea</marquee></div>
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
                            <a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>
                    </div>
                    
                </div>
                
            
	        	<div class="row">
                    <div class="col-lg-6">
                        <?php 
                            if ($_SESSION["tipo"]=="root") {
                                $sql_r="SELECT * FROM usuarios WHERE cedula='".$_POST["usuario"]."' AND tipo='normal'";
                                $rs_r=mysqli_query($mysqli,$sql_r) or die (mysqli_error());
                                $num_r=mysqli_num_rows($rs_r);
                                if ($num_r < 1) {
                                    echo "<script>alert('usuario no existe');window.location='buscar_usuario.php'</script>";
                                }
                                $row=mysqli_fetch_array($rs_r);
                            }
                            else {
                                $sql_r="SELECT * FROM usuarios WHERE cedula='".$_POST["usuario"]."' AND tipo='normal' AND agencia='".$_SESSION["agencia"]."'";
                                $rs_r=mysqli_query($mysqli,$sql_r) or die (mysqli_error());
                                $num_r=mysqli_num_rows($rs_r);
                                if ($num_r < 1) {
                                    echo "<script>alert('usuario no existe');window.location='buscar_usuario.php'</script>";
                                }
                                $row=mysqli_fetch_array($rs_r);
                            }
                            

                            
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Usuario</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Cédula:</b></td>
                                        <td><?php echo $row["cedula"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nombres:</b></td>
                                        <td><?php echo $row["nombre"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Apellidos:</b></td>
                                        <td><?php echo $row["apellido"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mail:</b></td>
                                        <td><?php echo $row["correo"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Saldo Disponible:</b></td>
                                        <td> $, <?php echo $row["saldo"]; ?></td>
                                        <input type="hidden" id="saldo" value="<?php echo $row["saldo"]; ?>">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRecargas">Recargar</button>
                        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalPagar">Pagar</button>

                    </div>

                    <div class="col-lg-6">
                     <?php if ($_SESSION["tipo"]=="root"){ ?>
                        <h4>Historial de Transacciones</h4>
                        <?php 
                             $sql_trans="SELECT * FROM trans_usuario WHERE cedula='".$_POST["usuario"]."' ORDER BY id DESC";
                                $rs_trans=mysqli_query($mysqli,$sql_trans) or die (mysqli_error());
                            
                        ?>
                       
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Trans</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Agente</th>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row_trans=mysqli_fetch_array($rs_trans)) {
                                            $sql_agente="SELECT nombre, apellido FROM usuarios WHERE cedula='".$row_trans["agente"]."'";
                                                $rs_agente=mysqli_query($mysqli,$sql_agente) or die (mysqli_error()); 
                                                $row_agente=mysqli_fetch_array($rs_agente);
                                                $agente=$row_agente["nombre"]." ". $row_agente["apellido"];
                                                list($a,$m,$d) = explode("-", $row_trans["fecha"]);
                                                $fecha_trans=$d."/".$m."/".$a;
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row_trans["tipo"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row_trans["monto"];
                                                echo "</td>";
                                                 echo "<td>";
                                                    echo $fecha_trans;
                                                echo "</td>";
                                                 echo "<td>";
                                                    echo $row_trans["hora"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $agente;
                                                echo "</td>";
                                            echo "<tr>";

                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    </div>
                    
                </div>
        </div> 
            
            <!-- Modal Recargas -->

            <div class="modal fade" id="modalRecargas" tabindex="-1" role="dialog" aria-labelledby="modalRecargasLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalRecargasLabel">Recargar Saldo</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" method="POST" action="recargar.php">
                                
                                <div class="form-group">
                                    <label for="recarga" class="col-sm-4 control-label">Monto a recargar:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="recarga" id="recarga" placeholder="" required>
                                    </div>
                                        <input type="hidden" class="form-control" value="<?php echo $row["cedula"];?>" name="cedula" id="cedula">
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-success">Recargar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

             <!-- Modal Pagar -->

            <div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="modalPagarLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalPagarLabel">Pagar a Usuario</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" method="POST" action="recargar.php" name="form_pagar">
                                
                                <div class="form-group">
                                    <label for="pagar" class="col-sm-4 control-label">Monto a Pagar:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="pagar" id="pagar" placeholder="" required>
                                    </div>
                                        <input type="hidden" class="form-control" value="<?php echo $row["cedula"];?>" name="cedula" id="cedula">
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" id="btn_pagar">Pagar</button>
                        </div>
                        </form>
                        </div>
                    </div>
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
    $("#btn_pagar").click(function(){
        var saldo_actual=parseInt($("#saldo").val());
        var monto_pagar=parseInt($("#pagar").val());
        console.log(saldo_actual);
        console.log(monto_pagar);

            if (saldo_actual < monto_pagar) {
                alert("saldo insuficiente para pagar esa cantidad");
            }
            else {
                document.form_pagar.submit();
            }
    });
    </script>
</body>


</html>
