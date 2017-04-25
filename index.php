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

    <div id="reloj" style="font-size:14px;"></div>
    <div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un maximo de 15 ::EuroBet - Tus Apuestas seguras en línea</marquee></div>
    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title"><center>¡Hola!, Bienvenido a EuroBet</center></h4>
            </div>
            <div class="modal-body">
                <p>Este es un sitio de apuestas deportivas sólo para mayores de 18 años , ¿Deseas continuar? Elije el pais:</p>
                <select name="pais" id="pais">
                    <option value="1">Colombia</option>
                    <option value="2">Venezuela</option>
                </select>
                
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
                        <input type="text" class="form-control" name="correo" id="login" placeholder="admin">
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
                                    
                                </div>
                                <div class="item">
                                    <img src="img/confederaciones.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="">
                                       
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/hockey_finales.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="carousel-caption">
                                        <h3>Hockey Playoffs</h3>
                                        <p>Los mejores equipos se disputan el titulo</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/nba_finales.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="carousel-caption">
                                        <h3>NBA Playoffs</h3>
                                        <p>Vive con nostros toda la pasión</p>
                                    </div>
                                </div>
                                 <div class="item">
                                    <img src="img/futbol.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
                                    <div class="carousel-caption">
                                        <h3>Fútbol</h3>
                                        <p>Todas las Ligas</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/Lebron.jpg" alt="..." width="100%">
                                    <div class="carousel-caption">
                                        <h3>Baloncesto</h3>
                                        <p>NBA / Colegial</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/mcabrera.jpg" alt="..." width="100%">
                                    <div class="carousel-caption">
                                        <h3>Béisbol</h3>
                                        <p>Grandes Ligas</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/nadal.jpg" alt="..." width="100%">
                                    <div class="carousel-caption">
                                        <h3>Tenis</h3>
                                        <p>ATP</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/peiton.jpg" alt="..." width="100%">
                                    <div class="carousel-caption">
                                        <h3>Fútbol Americano</h3>
                                        <p>NFL</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/nhl.jpg" alt="..." width="100%">
                                    <div class="carousel-caption">
                                        <h3>Hockey sobre hielo</h3>
                                        <p>NHL Stanley Cup</p>
                                    </div>
                                    
                                </div>
                                <div class="item">
                                    <img src="img/boxeo.jpg" alt="..." width="100%">
                                    <div class="carousel-caption">
                                        <h3>Boxeo</h3>
                                        <p>Las Mejores peleas</p>
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
                        <p><strong>EuroBet</strong> reúne un grupo de profesionales dedicados al mundo de las apuestas de Parlay, estamos ubicados en Colombia y en la actualidad poseemos clientes en todo el territorio nacional y fuera de nuestras fronteras. </p>
                        <p>Nuestro personal cuenta con años de experiencia en el ambiente de apuestas deportivas por Internet.</p>
                    </div>
                </div>
                <div class="row">
                    
                </div>
            
        <br>
        
            </div>

            <!-- Modal Registro de Usuarios -->

            


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
</body>


</html>
