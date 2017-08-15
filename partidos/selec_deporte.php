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
	    <link href="../pacejs/themes/orange/pace-theme-barber-shop.css" rel="stylesheet">
	    <link rel="icon"  href="../balon.ico">
	
	<!--Fuentes-->
	
</head>


<body>
	 <!-- mensaje arriba -->
	<div style="float:right;">
        <script src="js/meses.js"></script>
    </div>
	 
	 <script src="js/fecha.js"></script>
	  <div id="reloj" style="font-size:14px;"></div>
	<div id="avisow"><marquee>..::<strong>IMPORTANTE:</strong> <strong>LA COMBINACIÓN GANAR Y ALTA, RUNLINE Y ALTA NO SE ENCUENTRA DISPONIBLE, PUEDES JUGAR GANAR Y BAJA O EMPATE Y ALTA/BAJA</strong> -- Nuestra plataforma permite un mínimo de 2 jugadas y un máximo de 15. Montos mínimos de apuesta: <strong>COLOMBIA:</strong> $ 5.000 , <strong>VENEZUELA</strong> : Bs.F 500 ,  <strong>MÉXICO</strong>: $ 30 ::<strong>EUROBET  - ¡Tus Apuestas seguras en línea! --- </strong></marquee></div>
	<div id="wrapper">
		<!-- header -->
		
    </div>
     <div id="page-content-wrapper">
		<!-- header -->
		<header>
                <img src="img/header3.png" class="img-responsive" alt="">
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
            <div class="container-fluid">
			<br>
			<div class="row">

				<div class="col-sm-8 col-sm-offset-3">
					<h3>Seleccione el deporte para crear partido</h3><br>
					<form class="form-horizontal" action="crear_partidos.php" method="POST">
						<div class="form-group">
						    <label for="deporte" class="col-sm-2 control-label">Deporte</label>
						    <div class="col-sm-4">
						    	<select name="deporte" id="deporte" class="form-control">
							    	<?php
							    		$sql_deportes="SELECT * FROM deportes";
							    		$rs_deportes=mysqli_query($mysqli, $sql_deportes) or die(mysqli_error());
							    		while ($row_deportes=mysqli_fetch_array($rs_deportes)) {

							    			echo '<option value="'.$row_deportes["id"].'">'.$row_deportes["deporte"].'</option>';
							    		}
							    	?>
						    	</select>
						    </div>
						 </div>
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						    	<button type="submit" class="btn btn-primary">Seleccionar</button>
						    </div>
						</div>
					</form>
				</div>

			</div>
			
		</div>
            </div>
	</div>
	
	<script src="../js/hora.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/validacion_registro.js"></script>

</body>
</html>


