<?php
session_start(); 
    if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4 || $_POST["pais"]==2 || $_POST["pais"]==4) {
        date_default_timezone_set('America/Caracas');
        
    }
    else {
        date_default_timezone_set('America/Bogota');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>

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
    <div id="avisow"><marquee>..::<strong>IMPORTANTE:</strong> <strong>LA COMBINACIÓN GANAR Y ALTA, RUNLINE Y ALTA NO SE ENCUENTRA DISPONIBLE, PUEDES JUGAR GANAR Y BAJA O EMPATE Y ALTA/BAJA</strong> -- Nuestra plataforma permite un mínimo de 2 jugadas y un máximo de 15. Montos mínimos de apuesta: <strong>COLOMBIA:</strong> $ 5.000 , <strong>VENEZUELA</strong> : Bs.F 500 ,  <strong>MÉXICO</strong>: $ 30 ::<strong>EUROBET  - ¡Tus Apuestas seguras en línea! --- </strong></marquee></div>
 
   <div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
         <?php 
            if (isset($_SESSION["tipo"])) {
              if ($_SESSION["tipo"]=="normal") {
                include("../menu3.php");
            }
              else {
                include("../menu2.php");
              } 
            }
            
            else {
                include("../menu1.php");
            }
            
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
                    include("../conexion/conexion.php");
                          if($_SESSION["tipo"]=="normal"){
                        $sql_normal="SELECT nombre,apellido FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                        $rs_normal=mysqli_query($mysqli,$sql_normal) or die(mysqli_error());
                        $row_normal=mysqli_fetch_array($rs_normal);
                        echo "<h4>Usuario: ". $row_normal["nombre"].", ".$row_normal["apellido"]."";
                        echo '<a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>'; 
                    }
                    else {
                        if (isset($_SESSION["agencia"])) {
                        
                          $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                            $rs_ag=mysqli_query($mysqli,$sql_ag);
                            $row_ag=mysqli_fetch_array($rs_ag);
                            echo "<h4>Agencia: ". $row_ag["agencia"]; 
                         
                            echo '<a href="cerrar_sesion.php"> Salir</a></h4>';
                        } 
                    }
                            ?>
                    </div>
                    
                </div>
               
                <div class="row">
                    <form action="apuesta_c.php" id="apuesta" method="POST">
                        <?php
                            
                            echo '<div class="col-lg-8 col-lg-offset-2">
                                 <div class="table-responsive">
                                    <table class="table table-striped">    
                                        <thead>
                                            <th>Apuestas</th>
                                            <th>Carrera</th>
                                            <th>Caballos</th>
                                            <th>Logro</th>
                                        </thead>';
                                        echo '<tbody>';

                                            include("../conexion/conexion.php");
                                            if (isset($_POST["exacta1"])){
                                              $exacta1=$_POST["exacta1"];
                                              $datos = array();
                                              $carreras;
                                              foreach ($exacta1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo1"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."exacta1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta2"])){
                                                $exacta2=$_POST["exacta2"];
                                                foreach ($exacta2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo2"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta3"])){
                                                $exacta3=$_POST["exacta3"];
                                                foreach ($exacta3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo3"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta4"])){
                                                $exacta4=$_POST["exacta4"];
                                                foreach ($exacta4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo4"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta5"])){
                                                $exacta5=$_POST["exacta5"];
                                                foreach ($exacta5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo5"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta6"])){
                                                $exacta6=$_POST["exacta6"];
                                                foreach ($exacta5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo6"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta7"])){
                                                $exacta7=$_POST["exacta7"];
                                                foreach ($exacta7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo7"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta8"])){
                                                $exacta8=$_POST["exacta8"];
                                                foreach ($exacta8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo8"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta9"])){
                                                $exacta9=$_POST["exacta9"];
                                                foreach ($exacta9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo9"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta10"])){
                                                $exacta10=$_POST["exacta10"];
                                                foreach ($exacta10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo10"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta1b"])){
                                              $exacta1b=$_POST["exacta1b"];
                                              foreach ($exacta1b as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo1"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."exacta1b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta2b"])){
                                                $exacta2b=$_POST["exacta2b"];
                                                foreach ($exacta2b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo2"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta2b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta3b"])){
                                                $exacta3b=$_POST["exacta3b"];
                                                foreach ($exacta3b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo3"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta3b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta4b"])){
                                                $exacta4b=$_POST["exacta4b"];
                                                foreach ($exacta4b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo4"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta4b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta5b"])){
                                                $exacta5b=$_POST["exacta5b"];
                                                foreach ($exacta5b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo5"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta5b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta6b"])){
                                                $exacta6b=$_POST["exacta6b"];
                                                foreach ($exacta5b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo6"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta6b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta7b"])){
                                                $exacta7b=$_POST["exacta7b"];
                                                foreach ($exacta7b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo7"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta7b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta8b"])){
                                                $exacta8b=$_POST["exacta8b"];
                                                foreach ($exacta8b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo8"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta8b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta9b"])){
                                                $exacta9b=$_POST["exacta9b"];
                                                foreach ($exacta9b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo9"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta9b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["exacta10b"])){
                                                $exacta10b=$_POST["exacta10b"];
                                                foreach ($exact10b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Exacta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo10"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."exacta10b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                               if (isset($_POST["quiniela1"])){
                                              $quiniela1=$_POST["quiniela1"];
                                              foreach ($quiniela1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo1"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."quiniela1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela2"])){
                                                $quiniela2=$_POST["quiniela2"];
                                                foreach ($quiniela2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo2"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela3"])){
                                                $quiniela3=$_POST["quiniela3"];
                                                foreach ($quiniela3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo3"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela4"])){
                                                $quiniela4=$_POST["quiniela4"];
                                                foreach ($quiniela4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo4"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela5"])){
                                                $quiniela5=$_POST["quiniela5"];
                                                foreach ($quiniela5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo5"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela6"])){
                                                $quiniela6=$_POST["quiniela6"];
                                                foreach ($quiniela6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo6"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela7"])){
                                                $quiniela7=$_POST["quiniela7"];
                                                foreach ($quiniela7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo7"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela8"])){
                                                $quiniela8=$_POST["quiniela8"];
                                                foreach ($quiniela8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo8"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela9"])){
                                                $quiniela9=$_POST["quiniela9"];
                                                foreach ($quiniela9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo9"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela10"])){
                                                $quiniela10=$_POST["quiniela10"];
                                                foreach ($quiniela10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Quiniela";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo10"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }
                                              

                                              if (isset($_POST["trifecta1"])){
                                              $trifecta1=$_POST["trifecta1"];
                                              foreach ($trifecta1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo1"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."trifecta1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta2"])){
                                                $trifecta2=$_POST["trifecta2"];
                                                foreach ($trifecta2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo2"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta3"])){
                                                $trifecta3=$_POST["trifecta3"];
                                                foreach ($trifecta3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo3"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta4"])){
                                                $trifecta4=$_POST["trifecta4"];
                                                foreach ($trifecta4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo4"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta5"])){
                                                $trifecta5=$_POST["trifecta5"];
                                                foreach ($trifecta5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo5"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["quiniela6"])){
                                                $quiniela6=$_POST["quiniela6"];
                                                foreach ($quiniela6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo6"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."quiniela6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta7"])){
                                                $trifecta7=$_POST["trifecta7"];
                                                foreach ($trifecta7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo7"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta8"])){
                                                $trifecta8=$_POST["trifecta8"];
                                                foreach ($trifecta8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo8"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta9"])){
                                                $trifecta9=$_POST["trifecta9"];
                                                foreach ($trifecta9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo9"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta10"])){
                                                $trifecta10=$_POST["trifecta10"];
                                                foreach ($trifecta10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 1°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo10"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                               if (isset($_POST["trifecta1b"])){
                                              $trifecta1b=$_POST["trifecta1b"];
                                              foreach ($trifecta1b as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo1"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."trifecta1b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta2b"])){
                                                $trifecta2b=$_POST["trifecta2b"];
                                                foreach ($trifecta2b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo2"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta2b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta3b"])){
                                                $trifecta3b=$_POST["trifecta3b"];
                                                foreach ($trifecta3b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo3"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta3b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta4b"])){
                                                $trifecta4b=$_POST["trifecta4b"];
                                                foreach ($trifecta4b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo4"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta4b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta5b"])){
                                                $trifecta5b=$_POST["trifecta5b"];
                                                foreach ($trifecta5b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo5"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta5b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta6b"])){
                                                $trifecta6b=$_POST["trifecta6b"];
                                                foreach ($trifecta6b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo6"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta6b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta7b"])){
                                                $trifecta7b=$_POST["trifecta7b"];
                                                foreach ($trifecta7b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo7"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta7b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta8b"])){
                                                $trifecta8b=$_POST["trifecta8b"];
                                                foreach ($trifecta8b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo8"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta8b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta9b"])){
                                                $trifecta9b=$_POST["trifecta9b"];
                                                foreach ($trifecta9b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo9"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta9b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta10b"])){
                                                $trifecta10b=$_POST["trifecta10b"];
                                                foreach ($trifecta10b as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 2°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo10"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta10b"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                               if (isset($_POST["trifecta1c"])){
                                              $trifecta1c=$_POST["trifecta1c"];
                                              foreach ($trifecta1c as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo1"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                       $carreras[] = $p."/"."trifecta1c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta2c"])){
                                                $trifecta2c=$_POST["trifecta2c"];
                                                foreach ($trifecta2c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo2"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta2c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta3c"])){
                                                $trifecta3c=$_POST["trifecta3c"];
                                                foreach ($trifecta3c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo3"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta3c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta4c"])){
                                                $trifecta4c=$_POST["trifecta4c"];
                                                foreach ($trifecta4c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo4"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta4c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta5c"])){
                                                $trifecta5c=$_POST["trifecta5c"];
                                                foreach ($trifecta5c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo5"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta5c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta6c"])){
                                                $trifecta6c=$_POST["trifecta6c"];
                                                foreach ($trifecta6c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo6"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta6c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta7c"])){
                                                $trifecta7c=$_POST["trifecta7c"];
                                                foreach ($trifecta7c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo7"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta7c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta8c"])){
                                                $trifecta8c=$_POST["trifecta8c"];
                                                foreach ($trifecta8c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo8"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta8c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta9c"])){
                                                $trifecta9c=$_POST["trifecta9c"];
                                                foreach ($trifecta9c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo9"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta9c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["trifecta10c"])){
                                                $trifecta10c=$_POST["trifecta10c"];
                                                foreach ($trifecta10c as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Trifecta 3°";
                                                            echo '</td>';

                                                     

                                                $sql="SELECT * FROM carreras WHERE id='$p'";
                                                $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                                $row=mysqli_fetch_array($rs);
                                                $sql2="SELECT *  FROM caballos  WHERE id='".$row["caballo10"]."'";
                                                        $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                        $row2=mysqli_fetch_array($rs2);

                                                $sql_carrera="SELECT carrera FROM nombre_carreras WHERE id='".$row["id_nc"]."'";
                                                $rs_carrera=mysqli_query($mysqli,$sql_carrera) or die(mysqli_error());

                                                $row_carrera=mysqli_fetch_array($rs_carrera); 
                                                   
                                                     echo '<td>';
                                                        echo $row_carrera["carrera"];
                                                      echo '</td>';

                                                    echo '<td>';
                                                        echo $row2["caballo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l); $i++){
 
                                                      if ($l < 0) {
                                                          $datos[] =1 +100/($l * -1);
                                                      }
                                                      else{
                                                        $datos[] =1 +$l/100;
                                                      }
                                                      
                                                    }  

                                                    for ($i=1; $i<=count ($p); $i++){
 
                              
                                                      $carreras[] = $p."/"."trifecta10c"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }


                                              


                                              
                                          
                                                
                                          
                                            echo  '</tbody>';
                                        echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                
                                     
                                ?>
                          
                    </div>
                    <center><a href="competiciones2.php" class="btn btn-success">Volver a Ligas</a></center>
                    <center>
                    <?php 
                      if (isset($_SESSION["tipo"])) {
                        echo '<h4>Usted tiene <span id="time"></span> segundos para realizar su apuesta.</h4><br>';
                      }
                        if ($_SESSION["tipo"]=="normal") {
                        $sql_saldo="SELECT saldo FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                        $rs_saldo=mysqli_query($mysqli,$sql_saldo) or die(mysqli_error());
                        $row_saldo=mysqli_fetch_array($rs_saldo);

                      }
                    ?>

                    
                  <div class="col-lg-3 col-lg-offset-4">
                    <?php 
                        if ($_SESSION["tipo"]=="normal") {
                          echo '<span>Saldo: '.$row_saldo["saldo"].'</span><br>';
                        
                        }
                      ?>
                    <form action="apuesta.php" method="POST">
                      <?php 
                        if ($_SESSION["tipo"]=="normal") {
                         
                          echo '<input type="hidden" name="saldo" id="saldo" value="'.$row_saldo["saldo"].'">';
                        }
                      ?>
                      <div class="form-group">
                        <label for="monto">Monto a Apostar: </label>
                        <input type="text" class="form-control" name="monto" id="monto" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="total">Ganancia: </label>
                        <input type="text" class="form-control total" disabled="">
                      </div>
                      <input type="hidden" name="tipo" value="directa">     
                      <input type="hidden" name="premio" class="total">
                      
                          
                                
                           <?php
                          
                                $datos3=array_product($datos);
                                echo'<input type="hidden" value="'.$datos3.'" id="poduc_l">';

                             
                                foreach ($carreras as $key => $carr) {
                                    

                                    echo '<input name=carrera[] type="hidden" value="'.$carr.'">';
                                }
                        ?>
                  
              
          
          
                  
                   
                      <?php
                        if (isset($_SESSION["tipo"])) {
                          echo '<button type="button" class="btn btn-warning" id="apostar">Apostar</button>';
                        }
                      ?>
                      
                    </form>
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

      $("#monto").keyup(function(){
        var monto = $("#monto").val();
        //console.log(monto);
        var producto=$("#poduc_l").val();
        var resultado = monto * producto;
        resultado=Math.round(resultado);
        $(".total").val(resultado);
        $(".total").val(resultado);
      })

      $("#apostar").click(function(){
        <?php
          if ($_SESSION["pais"]==1) {
            if ($_SESSION["tipo"]=="normal") {
              echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");

                    }';
              echo 'else {';
                echo 'if ($("#monto").val()< 5000 || $("#monto").val() > 10000000) {
                    alert("El monto a apostar debe estar entre $5000 y $10000000");

                  }';
                echo 'else  $("#apuesta").submit();';
              echo '}';
            }
            else {
               echo 'if ($("#monto").val()< 5000 || $("#monto").val() > 10000000) {
                    alert("El monto a apostar debe estar entre $5000 y $10000000");

                  }';
                echo 'else  $("#apuesta").submit();';

            }
            
          }

          if ($_SESSION["pais"]==3) {
            if ($_SESSION["tipo"]=="normal") {
              echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");

                    }';
              echo 'else {';
                echo 'if ($("#monto").val()< 30 || $("#monto").val() > 10000000) {
                    alert("El monto a apostar debe estar entre $30 y $10000000");

                  }';
                echo 'else  $("#apuesta").submit();';
              echo '}';
            }
            else {
               echo 'if ($("#monto").val()< 30 || $("#monto").val() > 10000000) {
                    alert("El monto a apostar debe estar entre $30 y $10000000");

                  }';
                echo 'else  $("#apuesta").submit();';

            }
            
          }

        if ($_SESSION["pais"]==2) {
             if ($_SESSION["tipo"]=="normal") {
                echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");

                    }';
                echo 'else {';
                   echo 'if ($("#monto").val()< 5000) {
                    alert("El monto minimo a apostar es 5.000 Bs");

                  }';
                  echo 'else if($(".total").val() > 1000000){
                      $(".total").val(1000000);
           
                      if(confirm("La ganancia máxima es de 1 millon de Bs, ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                    }';
                  echo 'else  $("#apuesta").submit();';
                echo '}';
            }
              else {
                 echo 'if ($("#monto").val()< 5000) {
                        alert("El monto minimo a apostar es 5.000 Bs");

                      }';
                  echo 'else if($(".total").val() > 1000000){
                          $(".total").val(1000000);
               
                          if(confirm("La ganancia máxima es de 1 millon de Bs, ¿desea continuar?")){
                          $("#apuesta").submit();
                          }
                        }';
                  echo 'else  $("#apuesta").submit();';
              }
          }
          
          if ($_SESSION["pais"]==4) {
                if ($_SESSION["tipo"]=="normal") {
                   echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");

                    }';

                    echo 'else {';
                       echo 'if ($("#monto").val()< 5) {
                      alert("El monto minimo es de 5 USD");

                      }';
                      echo 'else  $("#apuesta").submit();';
                    echo '}';
                }

                else {
                   echo 'if ($("#monto").val()< 5) {
                      alert("El monto minimo es de 5 USD");

                      }';
                      echo 'else  $("#apuesta").submit();';
                }
             
            }
        ?>
        

        
      })
       <?php 
        if (isset($_SESSION["tipo"])) {
          echo 'var t=90;
      setInterval(function(){
        t--;
        if (t<=0) {
            
           window.location="bienvenido.php";
        }
        $("#time").html(t);
      },1000);';
        }
      ?>
    </script>
</body>


</html>
