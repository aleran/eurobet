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
                include("menu_h.php");
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
                <img src="../img/header_c.png" class="img-responsive" alt="">
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
                                           	if (isset($_POST["ganar1"])){
                                              $ganar1=$_POST["ganar1"];
                                              $datos = array();
                                              $carreras;
                                              foreach ($ganar1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                      $carreras[] = $p."/"."ganar1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar2"])){
                                                $ganar2=$_POST["ganar2"];
                                                foreach ($ganar2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar3"])){
                                                $ganar3=$_POST["ganar3"];
                                                foreach ($ganar3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar4"])){
                                                $ganar4=$_POST["ganar4"];
                                                foreach ($ganar4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar5"])){
                                                $ganar5=$_POST["ganar5"];
                                                foreach ($ganar5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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

                                              if (isset($_POST["ganar6"])){
                                                $ganar6=$_POST["ganar6"];
                                                foreach ($ganar6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar7"])){
                                                $ganar7=$_POST["ganar7"];
                                                foreach ($ganar7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar8"])){
                                                $ganar8=$_POST["ganar8"];
                                                foreach ($ganar8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar9"])){
                                                $ganar9=$_POST["ganar9"];
                                                foreach ($ganar9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["ganar10"])){
                                                $ganar10=$_POST["ganar10"];
                                                foreach ($ganar10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Ganar";
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
 
                              
                                                       $carreras[] = $p."/"."ganar10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place1"])){
                                              $place1=$_POST["place1"];
                                              foreach ($place1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                       $carreras[] = $p."/"."place1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place2"])){
                                                $place2=$_POST["place2"];
                                                foreach ($place2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place3"])){
                                                $place3=$_POST["place3"];
                                                foreach ($place3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place4"])){
                                                $place4=$_POST["place4"];
                                                foreach ($place4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place5"])){
                                                $place5=$_POST["place5"];
                                                foreach ($place5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place6"])){
                                                $place6=$_POST["place6"];
                                                foreach ($place6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place7"])){
                                                $place7=$_POST["place7"];
                                                foreach ($place7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place8"])){
                                                $place8=$_POST["place8"];
                                                foreach ($place8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place9"])){
                                                $place9=$_POST["place9"];
                                                foreach ($place9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["place10"])){
                                                $place10=$_POST["place10"];
                                                foreach ($place10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Place";
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
 
                              
                                                      $carreras[] = $p."/"."place10"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show1"])){
                                              $show1=$_POST["show1"];
                                              foreach ($show1 as $pa => $valor) {
                                                list($p,$l) = explode("/",$valor);

                                                echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show1"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show2"])){
                                                $show2=$_POST["show2"];
                                                foreach ($show2 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show2"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show3"])){
                                                $show3=$_POST["show3"];
                                                foreach ($show3 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show3"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show4"])){
                                                $show4=$_POST["show4"];
                                                foreach ($show4 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show4"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show5"])){
                                                $show5=$_POST["show5"];
                                                foreach ($show5 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show5"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show6"])){
                                                $show6=$_POST["show6"];
                                                foreach ($show6 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show6"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show7"])){
                                                $show7=$_POST["show7"];
                                                foreach ($show7 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show7"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show8"])){
                                                $show8=$_POST["show8"];
                                                foreach ($show8 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show8"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show9"])){
                                                $show9=$_POST["show9"];
                                                foreach ($show9 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show9"."/".$l;
                                                    }  


                                                    
                                                }
                                        
                                              }

                                              if (isset($_POST["show10"])){
                                                $show10=$_POST["show10"];
                                                foreach ($show10 as $pa => $valor) {
                                                  list($p,$l) = explode("/",$valor);

                                                  echo '<tr>';

                                                            echo '<td>';
                                                              echo "Show";
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
 
                              
                                                      $carreras[] = $p."/"."show10"."/".$l;
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
            
           window.location="carreras.php";
        }
        $("#time").html(t);
      },1000);';
        }
      ?>
    </script>
</body>


</html>
