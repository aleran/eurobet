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
                            <a href="cerrar_sesion.php"> Salir</a></h4>
                    </div>
                    
                </div>
                <br>
                <?php

                         $sql="SELECT agencia FROM agencias WHERE id='".$_POST["agencia"]."'";
                            $rs=mysqli_query($mysqli,$sql);
                            $row=mysqli_fetch_array($rs);

                        $sql_sum="SELECT SUM(monto) AS t_monto,  SUM(premio) as t_arr FROM parlay WHERE agencia='".$_POST["agencia"]."' AND activo='1' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                        $rs_sum=mysqli_query($mysqli,$sql_sum) or die(mysqli_error());
                        $row_sum=mysqli_fetch_array($rs_sum);
                           

                        $sql_ganan="SELECT SUM(monto) AS ganado FROM parlay WHERE agencia='".$_POST["agencia"]."' AND activo='1' AND ganar='0' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                        $rs_ganan=mysqli_query($mysqli,$sql_ganan) or die(mysqli_error());
                         $row_ganan=mysqli_fetch_array($rs_ganan);


                        $sql_perdi="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_POST["agencia"]."' AND ganar='1' AND activo='1' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                        $rs_perdi=mysqli_query($mysqli,$sql_perdi) or die(mysqli_error());
                         $row_perdi=mysqli_fetch_array($rs_perdi);

                        $total_perdido=$row_perdi["arr_perdido"] - $row_perdi["m_perdido"];
                        
                        $total= $row_ganan["ganado"] - $total_perdido;
                       

                    ?>
                <div class="row">
                    
                    <div class="col-sm-6 col-xs-offset-3">
                    <h3>Resumen Economico de la Agencia: <?php echo $row["agencia"] ?></h3>
                	
                	<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Del: <?php echo $f1; ?> Al: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                                <tr><td>Monto Apostado:</td> <td><?php echo $row_sum["t_monto"]; ?></td></tr>
                                <tr><td>Monto Arriesgado:</td> <td><?php echo $row_sum["t_arr"]; ?></td></tr>
                                <tr><td>Monto Ganado:</td> <td><?php echo $row_ganan["ganado"]; ?></td></tr>
                                <tr><td>Monto Perdido:</td> <td><?php echo $total_perdido; ?></td></tr>
                                <tr><td>Total<br>(Ganado - Perdido):</td> <td><br><?php echo $total; ?></td></tr>
                            </tbody>
                        </table>   
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
