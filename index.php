<!DOCTYPE html>
<html lang="es">

<head>

    <?php
        include("head.php");
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php 
    if (!isset($_GET["pais"])) {
        echo '<script type="text/javascript">
    $(document).ready(function(){javascript:void(0)
        $("#myModal").modal("show");
    });
</script>';
    }
?>


</head>



<body>
    
    <div style="float:right;">
        <script src="js/meses.js"></script>
    </div>


    <script src="js/fecha.js"></script>

    <div id="reloj" style="font-size:18px;"></div>
    <div id="avisow"><marquee>..::<strong>IMPORTANTE:</strong> <strong>Tarifas Mínimas para: Colombia $ 2.000, México $ 30, Estados Unidos 5 $</STRONG></marquee></div>
    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
               <h4 class="modal-title"><center>¡Hola,Bienvenido a Eurobet!</center></h4>
            </div>
            <div class="modal-body">
                <!--<h3><center>FELIZ AÑO PARA TODOS</b><b> ¡COMIENZA A JUGAR!</center></b></h3>-->
                <p>Este es un sitio de apuestas deportivas sólo para mayores de 18 años , ¿Deseas continuar?&nbsp;&nbsp; <strong>Elija su país y presione continuar:</strong></p>
                <center><select name="pais" id="pais">
                    <option value="1">COLOMBIA</option>
                    <option value="2">VENEZUELA</option>
                    <option value="3">MEXICO</option>
                    <option value="4">USA (Washington)</option>
                </select></center>
                
            </div>
            <div class="modal-footer">
                <a href="http://www.google.com.co"><button type="button" class="btn btn-danger" title="Redirige a google">Salir</button></a>
                <button type="button" class="btn btn-success" id="continuar" data-dismiss="modal" Title="Soy mayor de edad">Continuar</button>
            </div>
        </div>
    </div>
</div>
 
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php include("menu1.php") ?>
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
                <center><h3>Iniciar Sesión</h3><form class="form-inline" method="POST" action="login.php"><br>
                    <div class="form-group">
                        <label for="login">Correo&nbsp;</label>
                        <input type="text" class="form-control" name="correo" id="login" placeholder="admin@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña&nbsp;</label>
                        <input type="password" class="form-control" name="clave" id="contraseña" placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form></center><br>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                   <a href="#"> <img src="img/RECARGA.jpg" alt="..." align="" width="100%" title="Recarga y juega desde la comodidad de tu hogar"></a>
                                    <div class="#">
                                        
                                        
                                    </div>
                                </div>
                        <div class="item">
                                    <img src="img/galgos1.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/seriea.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/francia1.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/oferta.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/asia.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/ufc.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/RECARGA.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/fseleccion.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/beisbolv.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                             
                                <div class="item">
                                    <img src="img/hockey_finales.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/finales.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                        
                                        
                                    </div>
                                </div>
                                 <div class="item">
                                    <img src="img/futbol.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/Lebron.jpg" alt="..." width="100%">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/mcabrera.jpg" alt="..." width="100%">
                                    <div class="">
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/fcolombia.jpg" alt="..." width="100%">
                                    <div class="">
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/peiton.jpg" alt="..." width="100%">
                                    <div class="">
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/nhl.jpg" alt="..." width="100%">
                                    <div class="">
                                        
                                    </div>
                                    
                                </div>
                                <div class="item">
                                    <img src="img/boxeo.jpg" alt="..." width="100%">
                                    <div class="">
                                        
                                    </div>
                                    
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 descripcion">
                        <p><strong>EUROBET</strong> reúne un grupo de profesionales dedicados al mundo de las apuestas  Parlay, estamos  en Colombia, con clientes y agentes satisfechos en todo el país, así como también Venezuela, México y otras naciones</p>
                        
                        <p><strong>¡Juega tranquilo y seguro!</strong>, Donde estés, a través de cualquier dispositivo y a la hora que desees.</p>
                        <p><a href="ayuda.html"><strong>¿Listo para ganar?</strong></a></p>
                    </div>
                </div>
                <div class="row">
                    
                </div>
            
        <br>
        
            </div>

            <!-- Modal Registro de Usuarios -->

            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalRegistroLabel">Registrate</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" name="registro" method="POST" action="registro.php">
                                <div class="form-group">
                                    <label for="pais" class="col-sm-4 control-label">Pais:</label>
                                    <div class="col-sm-6">
                                        <select  name="pais" id="pais" class="form-control">
                                        <?php
                                            include("conexion/conexion.php"); 
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
                                    <label for="correo2" class="col-sm-4 control-label">Confirmar Correo:</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="correo2" id="correo2" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave" class="col-sm-4 control-label">Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave" id="clave" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave2" class="col-sm-4 control-label">Confirmar Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave2" id="clave2" placeholder="" required>
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
            <footer>
                 <?php
                    include("footer.php");
                 ?>
    
            </footer>
        </div>


        




    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
     $("#continuar").click(function() {
        var pais_s=$("#pais").val()
        window.location="index.php?pais="+pais_s;
    });
    </script>
    <script src="js/validar_registro.js"></script>
</body>


</html>