<?php include("time_sesion.php");
    if ($_SESSION['tipo']=="normal" || $_SESSION['tipo']=="taquilla") {
          header("Location: bienvenido.php");
      }  
    include("conexion/conexion.php");   
?>
<!DOCTYPE html>
<html lang="es">
<head>

     <?php
        include("head.php");
    ?>
	<link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css">


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
                <br><br><br>
                <div class="row">
               
                    <div class="col-sm-6 col-xs-offset-2">
                	
	                	 <form class="form-horizontal" method="POST" action="saldo_agencia.php">
                            <?php
                                if ($_SESSION["tipo"]=="root") {
                                    echo '<div class="form-group">
                                    <label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                                    <div class="col-sm-6">
                                        <select  name="agencia" id="agencia" class="form-control">';
                                        $sql_agencias="SELECT * FROM agencias";
                                                $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                                                while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                                                    echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                                                }

                                 }  echo '</select>
                                    </div>
                                     
                                </div>';
                                              
                                  
                            ?>
                            <div class="form-group">
                                <label for="desde" class="col-sm-4 control-label">Desde:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="desde" id="desde" class="form-control" autocomplete="off">
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="hasta" class="col-sm-4 control-label">Hasta:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="hasta" id="hasta" class="form-control" autocomplete="off">
                                    	
                                </div>
                                 <button class="btn btn-primary">Consultar</button>
                            </div>
                            

                        </form>
                	
	                
                </div>
            </div>
            
           
            

          


            <!-- Contenido -->
            
        </div>


        




    

    <script src="js/jquery.js"></script>
    <script src="lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Menu Toggle Script -->
    <script>
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

        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#desde").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
			

	
		});
		$("#hasta").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
			

	
		});
    </script>
</body>


</html>
