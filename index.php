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
    <div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un maximo de 15 ::EuroBet - Tus Apuestas seguras en línea</marquee></div>
 
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
            <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle">Cerrar Menú</a></div>
                <li class="sidebar-brand">
                    <a href="#">
                       <span class="icon-home"></span>&nbsp;BIENVENIDO
                    </a>
                </li>
                
                <li>
                    
                    <a href="index.php" title="Bienvenido a Eurobet"><span class="icon-checkmark2"></span>&nbsp;Inicio</a>
                </li>
                
                <li>
                    <a href="#" title="Registro de datos para creación de cuentas" data-toggle="modal" data-target="#modalRegistro"><span class="icon-user-tie"></span>&nbsp;Regístrate</a>
                </li>
                
                <li>
                    <a href="competiciones.php" target="_blank" title="Líneas del día"><span class="icon-file-text2"></span>&nbsp;Logros / Líneas</a>
                </li>
                <li>
                    <a href="#" title="Por Favor ingrese los últimos 9 dígitos de su ticket"><span class="icon-coin-dollar"></span>&nbsp;Consulta tu Ticket</a>
                </li>
                
                
                <li>
                    <a href="reglas-de-juego.html" target="_blank"  title="Conoce nuestras políticas y términos de prestación de Servicio"><span class="icon-library"></span>&nbsp;Reglas</a>
                            
                </li>
                <li>
                    <a href="ayuda.html" target="_blank" title="¿Necesitas ayuda? , Comunícate con nosotros"><span class="icon-bullhorn"></span>&nbsp;¿Cómo Apostar?</a>
                </li>
                <li>
                    <a href="juego-responsable.html" target="_blank" title="Juego Responsable"><span class="icon-hammer2"></span>&nbsp;Responsabilidad</a>
                </li>
                <li>
                    <a href="formulario_contacto.html" target="_blank" title="PQR - Peticiones, Quejas y Reclamos"><span class="icon-pushpin"></span>&nbsp;Contáctenos</a>
                </li>
                <li>
                    <a href="descargas.html" target="_blank" title="Descarga de Software para taquillas"><span class="icon-download"></span>&nbsp;Descargas</a>
                </li>
                <li>
                    <a href="http://www.mismarcadores.com" target="_blank" title="Resultados de Deportes en Vivo"><span class="icon-file-text2"></span>&nbsp;Resultados</a>
                </li>
                
                
                
            </ul>
        </div>
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
                                    <img src="img/cr7.jpg" alt="..." align="" width="100%" title="LaLiga Santander, Premier League. Tenemos todas las ligas disponibles">
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
                        <p><strong>EuroBet</strong> reúne un grupo de profesionales dedicados al mundo de las apuestas de Parlay, estamos ubicados en Bogotá, Colombia y en la actualidad poseemos clientes en todo el territorio nacional y fuera de nuestras fronteras. </p>
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
    </script>
</body>


</html>
