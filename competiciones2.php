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
                   	    <?php 
                    include("conexion/conexion.php");
                         $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                        ?> 
                            <a href="#"> Salir</a></h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <form action="compe_selec2.php" method="POST">
                        <?php
                                
                            

                            $sql_inicio="SELECT id, hora FROM partidos WHERE fecha='".date("y/m/d")."' AND inicio='0'";
                            $rs_inicio=mysqli_query($mysqli,$sql_inicio) or die(mysqli_error());
                            while ($row_inicio=mysqli_fetch_array($rs_inicio)) {

                                if ($row_inicio["hora"] <= date("H:i:s")) {
                                    $sql_act="UPDATE partidos SET inicio='1' WHERE id='".$row_inicio["id"]."'";
                                    $rs_act=mysqli_query($mysqli,$sql_act) or die(mysqli_error());
                                    
                                }
                            }

                            $sql="SELECT id, deporte FROM deportes";
                            $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());
                          
                            while($row=mysqli_fetch_array($rs)) {
                                    echo '<div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped">    
                                            <thead>
                                                <th>'.$row['deporte'].'</th>
                                            </thead>';
                                            echo '<tbody>';

                                            $id_dep=$row["id"];
                                            $sql2="SELECT * FROM competiciones WHERE id_deporte=$id_dep AND activa=1";
                                            $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                
                                            while($row2=mysqli_fetch_array($rs2)) {
                                                echo '<tr><td>';
                                                echo '<input type="checkbox" name="competicion[]" value="'.$row2["id_competicion"].'"> ';
                                                echo $row2["competicion"];
                                                echo '</td></tr>';
                                            }
                                            echo  '</tbody>';
                                        echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                     
                                ?>
                           
                    </div>
                     <button>Continuar</button>
                        </form>
                                
                            
                        
            
                
            
        
        
                
                 <div class="col-lg-6">
                      <table class="table">
                            
                        </tbody>
                    </table>
                   
                    </form>
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
