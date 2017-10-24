<?php include("../time_sesion.php");  
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
        <link rel="stylesheet" href="../lib/jquery-ui-1.12.1/jquery-ui.min.css">



</head>

<body>
 
     <div id="wrapper" class="hidden-print">

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
                <img src="../img/header_c.png" class="img-responsive" alt="">
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
                        if ($_SESSION["tipo"]=="root") {

                            $sql="SELECT agencia FROM agencias WHERE id='".$_POST["agencia"]."'";
                                $rs=mysqli_query($mysqli,$sql);
                                $row=mysqli_fetch_array($rs);

                            $sql_sum="SELECT SUM(monto) AS t_monto FROM tickets_c WHERE agencia='".$_POST["agencia"]."' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum=mysqli_query($mysqli,$sql_sum) or die(mysqli_error());
                            $row_sum=mysqli_fetch_array($rs_sum);


                            $sql_perdi="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM tickets_c WHERE agencia='".$_POST["agencia"]."' AND ganar='1' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi=mysqli_query($mysqli,$sql_perdi) or die(mysqli_error());
                             $row_perdi=mysqli_fetch_array($rs_perdi);

                            $total_perdido=$row_perdi["arr_perdido"];
                            
                            $total=  $row_sum["t_monto"] - $total_perdido;

                            /*$sql_recargas="SELECT SUM(monto) AS t_recargas FROM trans_usuario WHERE agencia='".$_POST["agencia"]."' AND tipo='recarga' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_recargas=mysqli_query($mysqli,$sql_recargas) or die(mysqli_error());
                            $row_recargas=mysqli_fetch_array($rs_recargas);

                            $sql_pagos="SELECT SUM(monto) AS t_pagos FROM trans_usuario WHERE agencia='".$_POST["agencia"]."' AND tipo='pago' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_pagos=mysqli_query($mysqli,$sql_pagos) or die(mysqli_error());
                            $row_pagos=mysqli_fetch_array($rs_pagos);*/
                        }
                        else {
                            $sql="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                                $rs=mysqli_query($mysqli,$sql);
                                $row=mysqli_fetch_array($rs);

                            $sql_sum="SELECT SUM(monto) AS t_monto FROM tickets_c WHERE agencia='".$_SESSION["agencia"]."' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum=mysqli_query($mysqli,$sql_sum) or die(mysqli_error());
                            $row_sum=mysqli_fetch_array($rs_sum);


                            $sql_perdi="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM tickets_c WHERE agencia='".$_SESSION["agencia"]."' AND ganar='1' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi=mysqli_query($mysqli,$sql_perdi) or die(mysqli_error());
                             $row_perdi=mysqli_fetch_array($rs_perdi);

                            $total_perdido=$row_perdi["arr_perdido"];
                            
                            $total=  $row_sum["t_monto"] - $total_perdido;

                            /*$sql_recargas="SELECT SUM(monto) AS t_recargas FROM trans_usuario WHERE agencia='".$_SESSION["agencia"]."' AND tipo='recarga' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_recargas=mysqli_query($mysqli,$sql_recargas) or die(mysqli_error());
                            $row_recargas=mysqli_fetch_array($rs_recargas);

                            $sql_pagos="SELECT SUM(monto) AS t_pagos FROM trans_usuario WHERE agencia='".$_SESSION["agencia"]."' AND tipo='pago' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_pagos=mysqli_query($mysqli,$sql_pagos) or die(mysqli_error());
                            $row_pagos=mysqli_fetch_array($rs_pagos);*/
                        }

                    ?>
                <div class="row">
                    
                    <div class="col-sm-6 col-xs-offset-3">
                    <?php
                        if ($_SESSION["tipo"]=="root") {
                            echo '<h3><center>Resumen económico para la Agencia:&nbsp;'; echo $row ["agencia"]; echo '</center></h3>';
                        }

                        else {
                            echo '<h3>Resumen Económico</h3>';
                        }
                    ?>
                    
                	
                	<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Balance desde: <?php echo $f1; ?> hasta: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                               
                                <tr><td><b>Apostado:</b></td> <td>$ <?php echo $row_sum["t_monto"]; ?> </td></tr>
                                <tr><td><b>Perdido:</b></td> <td>$ <?php echo $total_perdido; ?></td></tr>
                                <tr><td><b>Total:</b></td> <td>$ <?php echo $total; ?></td></tr>
                                <tr><td><em>Valores expresados en su moneda local</em></td> <td><br></tr>
                            </tbody>
                        </table>   
                    </div>
	                
                    </div>
            </div>

                <!--consulta de usuarios registrados-->
            <?php
                       /* if ($_SESSION["tipo"]=="root") {

                            $sql1="SELECT agencia FROM agencias WHERE id='".$_POST["agencia"]."'";
                                $rs1=mysqli_query($mysqli,$sql1);
                                $row1=mysqli_fetch_array($rs1);

                            $sql_sum1="SELECT SUM(monto) AS t_monto FROM parlay WHERE agencia='".$_POST["agencia"]."' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum1=mysqli_query($mysqli,$sql_sum1) or die(mysqli_error());
                            $row_sum1=mysqli_fetch_array($rs_sum1);


                            $sql_perdi1="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_POST["agencia"]."' AND ganar='1' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi1=mysqli_query($mysqli,$sql_perdi1) or die(mysqli_error());
                             $row_perdi1=mysqli_fetch_array($rs_perdi1);

                            $total_perdido1=$row_perdi1["arr_perdido"];
                            
                            $total1=  $row_sum1["t_monto"] - $total_perdido1;
                        }
                        else {
                            $sql1="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                                $rs1=mysqli_query($mysqli,$sql1);
                                $row1=mysqli_fetch_array($rs1);

                            $sql_sum1="SELECT SUM(monto) AS t_monto FROM parlay WHERE agencia='".$_SESSION["agencia"]."' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum1=mysqli_query($mysqli,$sql_sum1) or die(mysqli_error());
                            $row_sum1=mysqli_fetch_array($rs_sum1);


                            $sql_perdi1="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_SESSION["agencia"]."' AND ganar='1' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi1=mysqli_query($mysqli,$sql_perdi1) or die(mysqli_error());
                             $row_perdi1=mysqli_fetch_array($rs_perdi1);

                            $total_perdido1=$row_perdi1["arr_perdido"];
                            
                            $total1=  $row_sum1["t_monto"] - $total_perdido1;
                        }*/

                    ?>
                <!--<div class="row">
                    
                    <div class="col-sm-6 col-xs-offset-3">
                    <?php
                  
                            echo '<h3>Cuentas de Jugadas Online</h3>';
                        
                    ?>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Balances desde: <?php echo $f1; ?> hasta: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                               
                                <tr><td><b>Apostado:</b></td> <td>$ <?php echo $row_sum1["t_monto"]; ?></td></tr>
                                <tr><td><b>Perdido:</b></td> <td>$ <?php echo $total_perdido1; ?></td></tr>
                                <tr><td><b>Total:</b></td> <td>$ <?php echo $total1; ?></td></tr>
                                <tr><td><em>Valores expresados en su manera local</em></td> <td><br></tr>
                            </tbody>
                        </table>   
                    </div>
                    
                    </div>
            </div>

            <div class="row">
                    
                    <div class="col-sm-6 col-xs-offset-3">
                    <?php
                  
                            echo '<h3>Recargas y Pagos a usuarios</h3>';
                        
                    ?>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Balance desde: <?php echo $f1; ?> hasta: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                               
                                <tr><td><b>Recargas:</b></td> <td>$ <?php echo $row_recargas["t_recargas"]; ?></td></tr>
                                <tr><td><b>Pagos:</b></td> <td>$ <?php echo $row_pagos["t_pagos"]; ?></td></tr>
                                
                                <tr><td><em>Valores expresados en su moneda local</em></td> <td><br></tr>
                            </tbody>
                        </table>   
                    </div>
                    
                    </div>
            </div>-->
            
           
            

          


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
