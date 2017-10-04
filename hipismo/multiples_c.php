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
                                           		if (isset($_POST["dupleta1"])){
                                              $dupleta1=$_POST["dupleta1"];
                                              $datos = array();
                                              $carreras;
                                              foreach ($dupleta1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                      $carreras[] = $p."/"."dupleta1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta2"])){
                                                $dupleta2=$_POST["dupleta2"];
                                                foreach ($dupleta2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta3"])){
                                                $dupleta3=$_POST["dupleta3"];
                                                foreach ($dupleta3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta4"])){
                                                $dupleta4=$_POST["dupleta4"];
                                                foreach ($dupleta4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar5"])){
                                                $ganar5=$_POST["ganar5"];
                                                foreach ($ganar5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."ganar5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta6"])){
                                                $dupleta6=$_POST["dupleta6"];
                                                foreach ($dupleta6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta7"])){
                                                $dupleta7=$_POST["dupleta7"];
                                                foreach ($dupleta7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta8"])){
                                                $dupleta8=$_POST["dupleta8"];
                                                foreach ($dupleta8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta9"])){
                                                $dupleta9=$_POST["dupleta9"];
                                                foreach ($dupleta9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["dupleta10"])){
                                                $dupleta10=$_POST["dupleta10"];
                                                foreach ($dupleta10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Dupleta";
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
 
                              
                                                       $carreras[] = $p."/"."dupleta10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple1"])){
                                              $triple1=$_POST["triple1"];
                                              foreach ($triple1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                       $carreras[] = $p."/"."triple1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple2"])){
                                                $triple2=$_POST["triple2"];
                                                foreach ($triple2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple3"])){
                                                $triple3=$_POST["triple3"];
                                                foreach ($triple3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple4"])){
                                                $triple4=$_POST["triple4"];
                                                foreach ($triple4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple5"])){
                                                $triple5=$_POST["triple5"];
                                                foreach ($triple5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple6"])){
                                                $triple6=$_POST["triple6"];
                                                foreach ($triple6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple7"])){
                                                $triple7=$_POST["triple7"];
                                                foreach ($triple7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple8"])){
                                                $triple8=$_POST["triple8"];
                                                foreach ($triple8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple9"])){
                                                $triple9=$_POST["triple9"];
                                                foreach ($triple9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["triple10"])){
                                                $triple10=$_POST["triple10"];
                                                foreach ($triple10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Triple";
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
 
                              
                                                      $carreras[] = $p."/"."triple10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple1"])){
                                              $cuadruple1=$_POST["cuadruple1"];
                                              foreach ($cuadruple1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple2"])){
                                                $cuadruple2=$_POST["cuadruple2"];
                                                foreach ($cuadruple2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple3"])){
                                                $cuadruple3=$_POST["cuadruple3"];
                                                foreach ($cuadruple3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple4"])){
                                                $cuadruple4=$_POST["cuadruple4"];
                                                foreach ($cuadruple4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple5"])){
                                                $cuadruple5=$_POST["cuadruple5"];
                                                foreach ($cuadruple5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple6"])){
                                                $cuadruple6=$_POST["cuadruple6"];
                                                foreach ($cuadruple6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple7"])){
                                                $cuadruple7=$_POST["cuadruple7"];
                                                foreach ($cuadruple7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple8"])){
                                                $cuadruple8=$_POST["cuadruple8"];
                                                foreach ($cuadruple8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple9"])){
                                                $cuadruple9=$_POST["cuadruple9"];
                                                foreach ($cuadruple9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["cuadruple10"])){
                                                $cuadruple10=$_POST["cuadruple10"];
                                                foreach ($cuadruple10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Cuadruple";
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
 
                              
                                                      $carreras[] = $p."/"."cuadruple10"."/".$l;
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
                      <input type="hidden" name="tipo" value="multiple">     
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
