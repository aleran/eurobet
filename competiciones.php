<!DOCTYPE html>
<html lang="es">
<?php session_start(); ?>
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
                <li>
                    <a href="#" title="Registro de datos para creación de cuentas" data-toggle="modal" data-target="#modalRegistro">Tus apuestas</a>
                </li>
                <li>
                    
                    <a href="#" title="Bienvenido a Eurobet">Apostar</a>
                </li>
                <li>
                    <a href="#" title="Líneas del día">Tickets Activos</a>
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
                   	<h4>Bienvenido <?php //echo $_SESSION['nombreC']; ?> <a href="#"> Salir</a></h4>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-6">

                   
                 <div class="table-responsive">

                    <table class="table">
                            <?php
                                include("conexion/conexion.php");

                                 $sql="SELECT * FROM competiciones  WHERE id_deporte='1' and activa=1";
                                $rs=mysql_query($sql) or die (mysql_error());
                            ?>
                        <thead>
                            <th>Futbol</th>
                        </thead>
                        <tbody>
                        <?php
                            while($row=mysql_fetch_array($rs)) {
                                echo "<tr>";
                                
                                   
                                        echo "<td>";
                                        echo '<input type="checkbox" name=""> ';
                                        echo $row["competicion"];
                                        echo "</td>";
                                    
                                    
                                
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                   
                
            
        
        
                 </div>
                 <div class="col-lg-6">
                      <table class="table">
                            <?php
                                include("conexion/conexion.php");

                                 $sql="SELECT * FROM competiciones  WHERE id_deporte='2' and activa=1";
                                $rs=mysql_query($sql) or die (mysql_error());
                            ?>
                        <thead>
                            <th>Beisbol</th>
                        </thead>
                        <tbody>
                        <?php
                            while($row=mysql_fetch_array($rs)) {
                                echo "<tr>";
                                
                                   
                                        echo "<td>";
                                        echo '<input type="checkbox" name=""> ';
                                        echo $row["competicion"];
                                        echo "</td>";
                                    
                                    
                                
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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
