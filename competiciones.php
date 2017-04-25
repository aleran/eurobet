<!DOCTYPE html>
<html lang="es">
<?php session_start();  ?>
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
<div id="avisow"><marquee>..:: Se informa que las taquillas de venta  permiten un mínimo de 2 jugadas y un maximo de 15 jugadas ::EuroBet - Tus Apuestas seguras en línea</marquee></div>
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        <?php 
            if (isset($_SESSION["tipo"])) {
               include("menu2.php");
            }
            else {
                include("menu1.php");
            }
            
        ?>
    </div>

        <!-- /#sidebar-wrapper -->
       
        <!-- Contenido -->
        <div id="page-content-wrapper">
            <header>
                <a href="index.php"><img src="img/header3.png" class="img-responsive" alt=""></a>
        </header>
        <br>
            <div class="container-fluid">
                <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row">
                    <div class="col-lg-6">
                   	<?php
                    include("conexion/conexion.php");

                    if (isset($_SESSION["agencia"])) {
                        
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                         
                            echo '<a href="cerrar_sesion.php"> Salir</a></h4>';
                     } 
                    ?>
                    </div>
                    
                </div>
                <?php 
                    if (isset($_SESSION["pais"])) {
                        echo '<center>Tipo de Apuesta: <a href="competiciones.php" class="btn btn-primary">Parlay</a> <a href="competiciones2.php" class="btn btn-info">Directa</a></center>';
                    }

                    else {
                        echo '<center>Tipo de Apuesta: <a href="competiciones.php?pais='.$_GET["pais"].'" class="btn btn-primary">Parlay</a> <a href="competiciones2.php?pais='.$_GET["pais"].'" class="btn btn-info">Directa</a></center>';
                    }

                ?>
                
                <div class="row">

                    
                        <?php
                            if (isset($_SESSION["pais"])) {
                                echo '<form id="form" action="compe_selec.php" method="POST">';
                            }
                            else {
                                echo '<form id="form" action="compe_selec.php?pais='.$_GET["pais"].'" method="POST">';
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
