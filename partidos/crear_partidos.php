<?php
	include("../time_sesion.php");  
	include("../conexion/conexion.php");
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
	    <link href="../lib/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
	    <link href="../pacejs/themes/orange/pace-theme-barber-shop.css" rel="stylesheet">
	    <link rel="icon"  href="../balon.ico">
	<style>
		.suggest-element{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:150px;
			height:100px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}
		.suggest-element2{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions2 {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:150px;
			height:100px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}
		.suggest-element3{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions3 {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:150px;
			height:100px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}
		::selection{background: white;}
		::-moz-selection {background: white;}

		.aparecer {
			display: block;
		}

	</style>
	
	<!--Fuentes-->
	
</head>
 <!-- Fecha Sistema -->

<body>
	  <div style="float:right;">
        <script src="js/meses.js"></script>
    </div>

    <script src="js/fecha.js"></script>

    <div id="reloj" style="font-size:14px;"></div>
	<div id="avisow"><marquee>..::<strong>IMPORTANTE:</strong> <strong>LA COMBINACIÓN GANAR Y ALTA, RUNLINE Y ALTA NO SE ENCUENTRA DISPONIBLE, PUEDES JUGAR GANAR Y BAJA O EMPATE Y ALTA/BAJA</strong> -- Nuestra plataforma permite un mínimo de 2 jugadas y un máximo de 15. Montos mínimos de apuesta: <strong>COLOMBIA:</strong> $ 5.000 , <strong>VENEZUELA</strong> : Bs.F 500 ,  <strong>MÉXICO</strong>: $ 30 ::<strong>EUROBET  - ¡Tus Apuestas seguras en línea! --- </strong></marquee></div>

	<div id="wrapper">

        <!-- Sidebar -->
        <!-- Menu -->
        
    </div>
	  <!-- Contenido -->
        <div id="page-content-wrapper">
		<!-- header -->
		<header>
                <img src="../img/header3.png" class="img-responsive" alt="">
        </header>
        <br>
            <div class="container-fluid">
                <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a></div>
                <div class="row">
                    <div class="col-lg-6">
                        <?php 
                            if($_SESSION["tipo"]=="normal"){
                                $sql_normal="SELECT nombre,apellido FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                                $rs_normal=mysqli_query($mysqli,$sql_normal) or die(mysqli_error());
                                $row_normal=mysqli_fetch_array($rs_normal);
                                echo "<h4><b>En Línea:&nbsp;</b> ". $row_normal["nombre"].", ".$row_normal["apellido"]."";
                                echo '<a href="cerrar_sesion.php"> &nbsp;Desconectarse</a></h4>'; 
                            }
                            else {
                                $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                                $rs_ag=mysqli_query($mysqli,$sql_ag);
                                $row_ag=mysqli_fetch_array($rs_ag);
                                echo "<h4>Agencia: ". $row_ag["agencia"];
                                echo '<a href="cerrar_sesion.php"> Cerrar Sesión</a></h4>'; 
                            }
                          
                        ?> 
                            
                    </div>
                    
                </div>
                
            
        <br><br>
            
            <?php 
                if ($_SESSION["tipo"]=="normal") {
                $sql_sal="SELECT saldo FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                $rs_sal=mysqli_query($mysqli,$sql_sal) or die(mysqli_error());
                $row_sal=mysqli_fetch_array($rs_sal);
                echo "<center><h3><b>Saldo disponible: $,</b> ". $row_sal["saldo"]."</h3></center>";
                }
            ?>
            </div>
		
			<br>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-3">
				<?php
					$sql_dep="SELECT deporte FROM deportes WHERE id='".$_POST["deporte"]."'";
					$rs_dep=mysqli_query($mysqli, $sql_dep) or die(mysqli_error());
					$row_dep=mysqli_fetch_array($rs_dep);
				?>
					<h2>Creador de Partidos(<?php echo $row_dep["deporte"]; ?>)</h2><br>


				</div>

			</div>
			<div class="form-group">
					    	
					    	


			<div class="row">
				<form class="form-horizontal" action="cp.php" method="POST">
				<input type="hidden" name="dep" id="dep" value="<?php echo $_POST["deporte"];?>">
				
				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-group">
						
						<div class="col-sm-8">
						    <input type="text" required autocomplete="off" class="form-control" name="id" id="id" placeholder="ID">
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-group">
						
						<div class="col-sm-8">
						    <input type="text" required autocomplete="off" onkeyup="busc_ms();bus_h()" class="form-control" name="comp" id="comp" placeholder="Liga o Competicion">
						    <input type="hidden" name="compe_selec" id="compe_selec"><div id="suggestions"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="fecha" id="fecha" placeholder="Fecha Colombia">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="hora" id="hora" placeholder="Hora Colombia">
					    	</div>
					  	</div>
				</div><br><br>
				<div class="col-sm-6">
						<div class="form-group">
							<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="fecha_v" id="fecha_v" placeholder="Fecha Venezuela">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="hora_v" id="hora_v" placeholder="Hora Venezuela"><br>
					    	</div>
					  	</div>
				</div>
			</div>
			<div class="row">
					<div class="col-sm-6">
						
					  	<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" autocomplete="off" onkeyup="busc_ms2();bus_h2()" name="equipo1" id="equipo1" placeholder="Equipo 1">
					      		<input type="hidden" name="equipo1_selec" id="equipo1_selec"><div id="suggestions2"></div>
					    	</div>
					  	</div>
					</div>
					<div class="col-sm-6">
					  	<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" autocomplete="off" onkeyup="busc_ms3();bus_h3()" name="equipo2" id="equipo2" placeholder="Equipo 2">
					      		<input type="hidden" name="equipo2_selec" id="equipo2_selec"><div id="suggestions3"></div>
					    	</div>
					  	</div>
					  	
				  	</div>
			</div><br>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gj1" id="gj1" placeholder="ML 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gj2" id="gj2" placeholder="ML 2">
					    </div>
					</div>
				</div>

			</div><br>
			<?php if ($_POST["deporte"] == 1) { ?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="empate" id="empate" placeholder="Empate">
						</div>
					</div>
				</div>
			</div><br>
			<?php } ?>
			<?php if ($_POST["deporte"] == 1 || $_POST["deporte"]== 2 || $_POST["deporte"]== 3 || $_POST["deporte"]== 4) { ?>
			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="alta" id="alta" placeholder="Alta">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_alta" id="v_alta" placeholder="Valor Alta">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="baja" id="baja" placeholder="Baja">
						</div>
					</div>
				</div>
			</div><br>
			<?php } ?>
			
			<?php if ($_POST["deporte"] == 1 || $_POST["deporte"]== 2 || $_POST["deporte"]== 3 || $_POST["deporte"]== 4 || $_POST["deporte"]== 5) { ?>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline1" id="v_runline1" placeholder="Valor RL1">
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="runline1" id="runline1" placeholder="Runline 1">
						</div>
					 </div>
					
					
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline2" id="v_runline2" placeholder="Valor RL2">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="runline2" id="runline2" placeholder="Runline2">
						</div>
					</div>
				</div>
			</div><br>
			<?php } ?>
			<?php if ($_POST["deporte"] == 1) { ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gpt1" id="gpt1" placeholder="1T 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gpt2"" id="gpt2" placeholder="1T 2">
					    </div>
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-group">						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="empatept" id="empatept" placeholder="Emp 1T">
						</div>
					</div>
				</div>
			</div><br>
				
			<!--<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gst1" id="gst1" placeholder="2T 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gst2" id="gst2" placeholder="2T 2">
					    </div>
					</div>
				</div>

			</div><br>-->
			
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gg" id="gg" placeholder="GG">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="ng" id="ng" placeholder="NG">
					    </div>
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="dc1x" id="dc1x" placeholder="DC1X">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="dc2x" id="dc2x" placeholder="DC2X">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="dc12" id="dc12" placeholder="DC12">
						</div>
					</div>
				</div>
			</div><br>
			<?php } ?>
			<!--Beisbol-->
			<?php if ($_POST["deporte"] == 2) { ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="g5to1" id="g5to1" placeholder="1eraM 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="g5to2" id="g5to2" placeholder="1eraM 2">
					    </div>
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_srl1" id="vsrl1" placeholder="Valor SRL1">
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="srl1" id="srl1" placeholder="SRL 1">
						</div>
					 </div>
					
					
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_srl2" id="v_srl2" placeholder="Valor SRL2">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="srl2" id="srl2" placeholder="SRL 2">
						</div>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="si" id="si" placeholder="Si">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="no" id="no" placeholder="No">
					    </div>
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="ap1" id="ap1" placeholder="AP 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="ap2" id="ap2" placeholder="AP 2">
					    </div>
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="bst1" id="bst1" placeholder="BST A">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_bst" id="v_bst" placeholder="Valor BST">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="bst2" id="bst2" placeholder="BST B">
						</div>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="alta_5to" id="alta_5to" placeholder="1eraM A">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_alta_5to" id="v_alta_5to" placeholder="Valor 1eraM A">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="baja_5to" id="baja_5to" placeholder="1eraM B">
						</div>
					</div>
				</div>
			</div><br>
			<?php } ?>

			<!--BALONCESTO-->
			<?php if ($_POST["deporte"] == 3) { ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gmt1" id="gmt1" placeholder="MT 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="text" required class="form-control" name="gmt2" id="gmt2" placeholder="MT 2">
					    </div>
					</div>
				</div>

			</div><br>
			
			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="alta_mt" id="alta_mt" placeholder="A MT">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_alta_mt" id="v_alta_mt" placeholder="Valor A MT">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="baja_mt" id="baja_mt" placeholder="B MT">
						</div>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline_mt1" id="v_runline_mt1" placeholder="Valor RL MT1">
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="runline_mt1" id="runline_mt1" placeholder="RL MT1">
						</div>
					 </div>
					
					
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline_mt2" id="v_runline_mt2" placeholder="Valor RL MT2">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="runline_mt2" id="runline_mt2" placeholder="RL MT2">
						</div>
					</div>
				</div>
			</div><br>
			<?php } ?>



			
				
			
				  	
				  	
				  	
			
			
<br>
			
			<br>
			<div class="row">
				<div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      	<button type="submit" class="btn btn-success">Crear Partido</button>
				    </div>
				</div>
			</div>	  	

				  
				</form>
			
			
		</div>
		</div>
		
	</div>
	
	<script src="../js/hora.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script>
		function bus_h(){
			var comp= document.getElementById('comp').value;
			var dep= document.getElementById('dep').value;
				var dataString = 'comp='+comp+"/"+dep;
				$.ajax({
					type: "POST",
					url: "buscar_compe.php",
					data: dataString,
					success: function(resp) {
						$('#suggestions').fadeIn(1000).html(resp);
						$('.suggest-element a').on('click', function(){
							var id = $(this).attr('id');
							var competicion= $(this).attr('data-compe');
							$('#comp').val(competicion);
							$('#compe_selec').val(id);
							$('#suggestions').fadeOut(1000);

							return false;
						});
					}
				});
		}


		function busc_ms(){
			$('#suggestions').addClass("aparecer");
			$('#suggestions').fadeIn(0);
			if ($("#comp").val()=="") {
				$("#comp").val("");
			}
		}

		//buscar equipo1

		function bus_h2(){
			var equipo= document.getElementById('equipo1').value;
			var dep= document.getElementById('dep').value;
				var dataString = 'equipo='+equipo+"/"+dep;
				$.ajax({
					type: "POST",
					url: "buscar_equipo1.php",
					data: dataString,
					success: function(resp) {
						$('#suggestions2').fadeIn(1000).html(resp);
						$('.suggest-element2 a').on('click', function(){
							var id = $(this).attr('id');
							var equipo= $(this).attr('data-equipo');
							$('#equipo1').val(equipo);
							$('#equipo1_selec').val(id);
							$('#suggestions2').fadeOut(1000);

							return false;
						});
					}
				});
		}


		function busc_ms2(){
			$('#suggestions2').addClass("aparecer");
			$('#suggestions2').fadeIn(0);
			if ($("#equipo").val()=="") {
				$("#equipo").val("");
			}
		}


		function bus_h3(){
			var equipo= document.getElementById('equipo2').value;
			var dep= document.getElementById('dep').value;
				var dataString = 'equipo='+equipo+"/"+dep;
				$.ajax({
					type: "POST",
					url: "buscar_equipo2.php",
					data: dataString,
					success: function(resp) {
						$('#suggestions3').fadeIn(1000).html(resp);
						$('.suggest-element3 a').on('click', function(){
							var id = $(this).attr('id');
							var equipo= $(this).attr('data-equipo');
							$('#equipo2').val(equipo);
							$('#equipo2_selec').val(id);
							$('#suggestions3').fadeOut(1000);

							return false;
						});
					}
				});
		}


		function busc_ms3(){
			$('#suggestions3').addClass("aparecer");
			$('#suggestions3').fadeIn(0);
			if ($("#equipo").val()=="") {
				$("#equipo").val("");
			}
		}

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '< Ant',
			nextText: 'Sig >',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

        $("#fecha").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
		});

		$("#fecha_v").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
		});

	</script>

</body>
</html>