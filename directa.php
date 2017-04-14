<!DOCTYPE html>
<html lang="es">
<?php session_start();  ?>
<head>

      <?php
        include("head.php");
    ?>



</head>

<body>
 
   <div id="wrapper">

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
                <img src="img/header3.png" class="img-responsive" alt="">
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
               
                <div class="row">
                    <form action="apuesta.php" id="apuesta" method="POST">
                        <?php
                        	
                            echo '<div class="col-lg-8 col-lg-offset-2">
                                 <div class="table-responsive">
                                    <table class="table table-striped">    
                                        <thead>
                                            <th>Jugadas</th>
                                            <th>Equipos</th>
                                            <th>Logro</th>
                                        </thead>';
                                        echo '<tbody>';

                                           	include("conexion/conexion.php");
                                           		if (isset($_POST["gj1"])){
                                           	 	$gj1=$_POST["gj1"];
                                           	 	$datos = array();
                                           	 	$partidos;
                           							foreach ($gj1 as $pa => $valor) {
                           								list($p,$l) = explode("/",$valor);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar";
                                                			echo '</td>';

                                                		$sql="SELECT * FROM partidos WHERE id='$p'";
                           								$rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                           						 		$row=mysqli_fetch_array($rs);
                           						 		$sql2="SELECT *  FROM equipos  WHERE id='".$row["equipo1"]."'";
                                            			$rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                            			$row2=mysqli_fetch_array($rs2);
                                            				
                                            				echo '<td>';
                                               					echo $row2["equipo"];
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
 
															
                                                				$partidos[] = $p."/"."gj1"."/".$l;
                                                	
                                                			
														}  


                                                		
                           						 	}
                           						 	
                           						 	

                           						 

                           						 	

                                           	 	}


                                           	 	if (isset($_POST["gj2"])){
                                           	 	$gj2=$_POST["gj2"];
                           							foreach ($gj2 as $pa => $valor2) {
                           								list($p2,$l2) = explode("/",$valor2);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar";
                                                			echo '</td>';

                                                		$sql3="SELECT * FROM partidos WHERE id='$p2'";
                           								$rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());

                           						 		$row3=mysqli_fetch_array($rs3);
                           						 		$sql4="SELECT *  FROM equipos  WHERE id='".$row3["equipo2"]."'";
                                            			$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());
                                            			while ( $row4=mysqli_fetch_array($rs4)) {
                                            				
                                            				echo '<td>';
                                               					echo $row4["equipo"];
                                                			echo '</td>';
                                            			}
                                            				echo '<td>';
                                               					echo $l2;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l2); $i++){
                                                			if ($l2 < 0) {
                                                				$datos[] =1 +100/($l2 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l2/100;
                                                			}
 															
															
														}

															for ($i=1; $i<=count ($p2); $i++){
 
															
                                                				$partidos[] = $p2."/"."gj2"."/".$l2;
                                                			
														}    
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["empate"])){
                                           	 		$empate=$_POST["empate"];
                           							foreach ($empate as $pa => $valor3) {
                           								list($p3,$l3) = explode("/",$valor3);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Empate";
                                                			echo '</td>';

                                                		$sql4="SELECT * FROM partidos WHERE id='$p3'";
                           								$rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());

                           						 		$row4=mysqli_fetch_array($rs4);
                           						 		$sql5="SELECT *  FROM equipos  WHERE id='".$row4["equipo1"]."'";
                                            			$rs5=mysqli_query($mysqli, $sql5) or die (mysqli_error());
                                            			$row5=mysqli_fetch_array($rs5);
                                            			$sql6="SELECT *  FROM equipos  WHERE id='".$row4["equipo2"]."'";
                                            			$rs6=mysqli_query($mysqli, $sql6) or die (mysqli_error());
                                            			$row6=mysqli_fetch_array($rs6);


                                            				
                                            				echo '<td>';
                                               					echo $row5["equipo"]." - ". $row6["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo $l3;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l3); $i++){
                                                			if ($l3 < 0) {
                                                				$datos[] =1 +100/($l3 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l3/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p3); $i++){
 
															
                                                				$partidos[] = $p3."/"."empate"."/".$l3;
                                                			
														}      
                           						 	}

                                           	 	}
                                               

                                               if (isset($_POST["alta"])){
                                           	 		$alta=$_POST["alta"];
                           							foreach ($alta as $pa => $valor4) {
                           								list($p4,$l4,$v_a) = explode("/",$valor4);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Alta";
                                                			echo '</td>';

                                                		$sql7="SELECT * FROM partidos WHERE id='$p4'";
                           								$rs7=mysqli_query($mysqli, $sql7) or die (mysqli_error());

                           						 		$row7=mysqli_fetch_array($rs7);
                           						 		$sql8="SELECT *  FROM equipos  WHERE id='".$row7["equipo1"]."'";
                                            			$rs8=mysqli_query($mysqli, $sql8) or die (mysqli_error());
                                            			$row8=mysqli_fetch_array($rs8);
                                            			$sql9="SELECT *  FROM equipos  WHERE id='".$row7["equipo2"]."'";
                                            			$rs9=mysqli_query($mysqli, $sql9) or die (mysqli_error());
                                            			$row9=mysqli_fetch_array($rs9);


                                            				
                                            				echo '<td>';
                                               					echo $row8["equipo"]." - ". $row9["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  "(".$v_a.") ".$l4;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';


                                                		for ($i=1; $i<=count ($l4); $i++){
                                                			if ($l4 < 0) {
                                                				$datos[] =1 +100/($l4 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l4/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p4); $i++){
 
															
                                                				$partidos[] = $p4."/"."alta"."/".$l4;
                                                			
														}       
                           						 	}

                                           	 	}


                                           	 	    if (isset($_POST["baja"])){
                                           	 		$baja=$_POST["baja"];
                           							foreach ($baja as $pa => $valor5) {
                           								list($p5,$l5,$v_b) = explode("/",$valor5);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Baja";
                                                			echo '</td>';

                                                		$sql10="SELECT * FROM partidos WHERE id='$p5'";
                           								$rs10=mysqli_query($mysqli, $sql10) or die (mysqli_error());

                           						 		$row10=mysqli_fetch_array($rs10);
                           						 		$sql11="SELECT *  FROM equipos  WHERE id='".$row10["equipo1"]."'";
                                            			$rs11=mysqli_query($mysqli, $sql11) or die (mysqli_error());
                                            			$row11=mysqli_fetch_array($rs11);
                                            			$sql12="SELECT *  FROM equipos  WHERE id='".$row10["equipo2"]."'";
                                            			$rs12=mysqli_query($mysqli, $sql12) or die (mysqli_error());
                                            			$row12=mysqli_fetch_array($rs12);


                                            				
                                            				echo '<td>';
                                               					echo $row11["equipo"]." - ". $row12["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  "(".$v_b.") ".$l5;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l5); $i++){
                                                			if ($l5 < 0) {
                                                				$datos[] =1 +100/($l5 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l5/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p5); $i++){
 
															
                                                				$partidos[] = $p5."/"."baja"."/".$l5;
                                                			
														}       
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["runline1"])){
                                           	 		$runline1=$_POST["runline1"];
                           							foreach ($runline1 as $pa => $valor6) {
                           								list($p6,$l6,$v_r1) = explode("/",$valor6);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Runline";
                                                			echo '</td>';

                                                		$sql13="SELECT * FROM partidos WHERE id='$p6'";
                           								$rs13=mysqli_query($mysqli, $sql13) or die (mysqli_error());

                           						 		$row13=mysqli_fetch_array($rs13);
                           						 		$sql14="SELECT *  FROM equipos  WHERE id='".$row13["equipo1"]."'";
                                            			$rs14=mysqli_query($mysqli, $sql14) or die (mysqli_error());
                                            			$row14=mysqli_fetch_array($rs14);
                                            			


                                            				
                                            				echo '<td>';
                                               					echo $row14["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  "(".$v_r1.") ".$l6;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l6); $i++){
                                                			if ($l6 < 0) {
                                                				$datos[] =1 +100/($l6 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l6/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p6); $i++){
 
															
                                                				$partidos[] = $p6."/"."runline1"."/".$l6;
                                                			
														}         
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["runline2"])){
                                           	 		$runline2=$_POST["runline2"];
                           							foreach ($runline2 as $pa => $valor7) {
                           								list($p7,$l7,$v_r2) = explode("/",$valor7);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Runline";
                                                			echo '</td>';

                                                		$sql16="SELECT * FROM partidos WHERE id='$p7'";
                           								$rs16=mysqli_query($mysqli, $sql16) or die (mysqli_error());

                           						 		$row16=mysqli_fetch_array($rs16);
                           						 		$sql17="SELECT *  FROM equipos  WHERE id='".$row16["equipo2"]."'";
                                            			$rs17=mysqli_query($mysqli, $sql17) or die (mysqli_error());
                                            			$row17=mysqli_fetch_array($rs17);


                                            				
                                            				echo '<td>';
                                               					echo $row17["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  "(".$v_r2.") ".$l7;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l7); $i++){
                                                			if ($l7 < 0) {
                                                				$datos[] =1 +100/($l7 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l7/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p7); $i++){
 
															
                                                				$partidos[] = $p7."/"."runline2"."/".$l7;
                                                			
														}          
                           						 	}

                                           	 	}


                                           	 	if (isset($_POST["gpt1"])){
                                           	 		$gpt1=$_POST["gpt1"];
                           							foreach ($gpt1 as $pa => $valor8) {
                           								list($p8,$l8) = explode("/",$valor8);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar 1T";
                                                			echo '</td>';

                                                		$sql19="SELECT * FROM partidos WHERE id='$p8'";
                           								$rs19=mysqli_query($mysqli, $sql19) or die (mysqli_error());

                           						 		$row19=mysqli_fetch_array($rs19);
                           						 		$sql20="SELECT *  FROM equipos  WHERE id='".$row19["equipo1"]."'";
                                            			$rs20=mysqli_query($mysqli, $sql20) or die (mysqli_error());
                                            			$row20=mysqli_fetch_array($rs20);


                                            				
                                            				echo '<td>';
                                               					echo $row20["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo $l8;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l8); $i++){
                                                			if ($l8 < 0) {
                                                				$datos[] =1 +100/($l8 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l8/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p8); $i++){
 
															
                                                				$partidos[] = $p8."/"."gpt1"."/".$l8;
                                                			
														}    
                           						 	}

                                           	 	}


                                           	 	if (isset($_POST["gpt2"])){
                                           	 		$gpt2=$_POST["gpt2"];
                           							foreach ($gpt2 as $pa => $valor9) {
                           								list($p9,$l9) = explode("/",$valor9);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar 1T";
                                                			echo '</td>';

                                                		$sql22="SELECT * FROM partidos WHERE id='$p9'";
                           								$rs22=mysqli_query($mysqli, $sql22) or die (mysqli_error());

                           						 		$row22=mysqli_fetch_array($rs22);
                           						 		$sql23="SELECT *  FROM equipos  WHERE id='".$row22["equipo2"]."'";
                                            			$rs23=mysqli_query($mysqli, $sql23) or die (mysqli_error());
                                            			$row23=mysqli_fetch_array($rs23);


                                            				
                                            				echo '<td>';
                                               					echo $row23["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  $l9;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l9); $i++){
                                                			if ($l9 < 0) {
                                                				$datos[] =1 +100/($l9 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l9/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p9); $i++){
 
															
                                                				$partidos[] = $p9."/"."gpt2"."/".$l9;
                                                			
														}    
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["gst1"])){
                                           	 		$gst1=$_POST["gst1"];
                           							foreach ($gst1 as $pa => $valor10) {
                           								list($p10,$l10) = explode("/",$valor10);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar 2T";
                                                			echo '</td>';

                                                		$sql24="SELECT * FROM partidos WHERE id='$p10'";
                           								$rs24=mysqli_query($mysqli, $sql24) or die (mysqli_error());

                           						 		$row24=mysqli_fetch_array($rs24);
                           						 		$sql25="SELECT *  FROM equipos  WHERE id='".$row24["equipo1"]."'";
                                            			$rs25=mysqli_query($mysqli, $sql25) or die (mysqli_error());
                                            			$row25=mysqli_fetch_array($rs25);


                                            				
                                            				echo '<td>';
                                               					echo $row25["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  $l10;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l10); $i++){
                                                			if ($l10 < 0) {
                                                				$datos[] =1 +100/($l10 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l10/100;
                                                			}
 
															
														}
														for ($i=1; $i<=count ($p10); $i++){
 
															
                                                				$partidos[] = $p10."/"."gst1"."/".$l10;
                                                			
														}   
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["gst2"])){
                                           	 		$gst2=$_POST["gst2"];
                           							foreach ($gst2 as $pa => $valor11) {
                           								list($p11,$l11) = explode("/",$valor11);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar 2T";
                                                			echo '</td>';

                                                		$sql26="SELECT * FROM partidos WHERE id='$p11'";
                           								$rs26=mysqli_query($mysqli, $sql26) or die (mysqli_error());

                           						 		$row26=mysqli_fetch_array($rs26);
                           						 		$sql27="SELECT *  FROM equipos  WHERE id='".$row26["equipo2"]."'";
                                            			$rs27=mysqli_query($mysqli, $sql27) or die (mysqli_error());
                                            			$row27=mysqli_fetch_array($rs27);


                                            				
                                            				echo '<td>';
                                               					echo $row27["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  $l11;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l11); $i++){
                                                			if ($l11 < 0) {
                                                				$datos[] =1 +100/($l11 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l11/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p11); $i++){
 
															
                                                				$partidos[] = $p11."/"."gst2"."/".$l11;
                                                			
														}    
                           						 	}

                                           	 	}

                                           	 	if (isset($_POST["g5to1"])){
                                           	 		$g5to1=$_POST["g5to1"];
                           							foreach ($g5to1 as $pa => $valor12) {
                           								list($p12,$l12) = explode("/",$valor12);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar 5to In";
                                                			echo '</td>';

                                                		$sql28="SELECT * FROM partidos WHERE id='$p12'";
                           								$rs28=mysqli_query($mysqli, $sql28) or die (mysqli_error());

                           						 		$row28=mysqli_fetch_array($rs28);
                           						 		$sql29="SELECT *  FROM equipos  WHERE id='".$row28["equipo1"]."'";
                                            			$rs29=mysqli_query($mysqli, $sql29) or die (mysqli_error());
                                            			$row29=mysqli_fetch_array($rs29);


                                            				
                                            				echo '<td>';
                                               					echo $row29["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  $l12;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l12); $i++){
                                                			if ($l12 < 0) {
                                                				$datos[] =1 +100/($l12 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l12/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p12); $i++){
 
															
                                                				$partidos[] = $p12."/"."g5to1"."/".$l12;
                                                			
														}   
                           						 	}

                                           	 	}


                                           	 	if (isset($_POST["g5to2"])){
                                           	 		$g5to2=$_POST["g5to2"];
                           							foreach ($g5to2 as $pa => $valor13) {
                           								list($p13,$l13) = explode("/",$valor13);

                           								echo '<tr>';
                                                			echo '<td>';
                                               					echo "Ganar 5to In";
                                                			echo '</td>';

                                                		$sql30="SELECT * FROM partidos WHERE id='$p13'";
                           								$rs30=mysqli_query($mysqli, $sql30) or die (mysqli_error());

                           						 		$row30=mysqli_fetch_array($rs30);
                           						 		$sql31="SELECT *  FROM equipos  WHERE id='".$row30["equipo2"]."'";
                                            			$rs31=mysqli_query($mysqli, $sql31) or die (mysqli_error());
                                            			$row31=mysqli_fetch_array($rs31);


                                            				
                                            				echo '<td>';
                                               					echo $row31["equipo"];
                                                			echo '</td>';
                                            			
                                            				echo '<td>';
                                               					echo  $l13;
                                                			echo '</td>';
                                            			
                                                		echo '</tr>';

                                                		for ($i=1; $i<=count ($l13); $i++){
                                                			if ($l13 < 0) {
                                                				$datos[] =1 +100/($l13 * -1);
                                                			}
                                                			else{
                                                				$datos[] =1 +$l13/100;
                                                			}
 
															
														}

														for ($i=1; $i<=count ($p13); $i++){
 
															
                                                				$partidos[] = $p13."/"."g5to2"."/".$l13;
                                                			
														}   
                           						 	}

                                           	 	}	
                           								
                                            		
                                          
                                            echo  '</tbody>';
                                        echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                
                                     
                                ?>
                          
                    </div>
                    <center>
                    <?php 
                      if (isset($_SESSION["tipo"])) {
                        echo '<h4>Usted tiene <span id="time"></span> segundos para realizar su apuesta.</h4><br>';
                      }
                    ?>

                    
                  <div class="col-lg-3 col-lg-offset-4">
                    <form action="apuesta.php" method="POST">
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

                             
                             	foreach ($partidos as $key => $part) {
                             		

                             		echo '<input name=partido[] type="hidden" value="'.$part.'">';
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


        




    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
      $(".menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

      $("#monto").keyup(function(){
      	var monto = $("#monto").val();
      	console.log(monto);
      	var producto=$("#poduc_l").val();
      	var resultado = monto * producto;
      	resultado=Math.round(resultado);
      	$(".total").val(resultado);
      	$(".total").val(resultado);
      })

      $("#apostar").click(function(){
        if ($("#monto").val()< 5000 || $("#monto").val() > 10000000) {
          alert("El monto a apostar debe estar entre $5000 y $10000000");

        }

        else  $("#apuesta").submit();
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
