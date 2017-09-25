<?php
session_start();
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


<style>
    .principales{
        color:#FF8500;
    }
</style>
</head>

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
                <a href="index.php"><img src="img/header3.png" class="img-responsive" alt=""></a>
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
                        echo "<h4><b>En Línea:</b>&nbsp; ". $row_normal["nombre"].", ".$row_normal["apellido"]."";
                        echo '<a href="cerrar_sesion.php"> &nbsp;Desconectarse</a></h4>'; 
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
                
                
                
                <?php 
                    if (isset($_SESSION["pais"])) {
                        echo '<center>Tipo de Apuesta: <a href="index.php" class="btn btn-primary">Simple o Directa</a>';
        
                            echo ' <a href="carreras2.php" class="btn btn-info">Multiples</a></center>';
                        
                    }

                    else {
                        echo '<center>Tipo de Apuesta: <a href="competiciones.php?pais='.$_GET["pais"].'" class="btn btn-primary">Parlay</a>';

                        if($_GET["pais"] != 4) {
                            echo '<a href="competiciones2.php?pais='.$_GET["pais"].'" class="btn btn-info">Directa</a></center>';
                        }
                    }

                ?>
                
                <div class="row">

                    
                        <?php
                            if (isset($_SESSION["pais"])) {
                                echo '<form id="form" action="carrera_selec.php" method="POST">';
                            }
                            else {
                                echo '<form id="form" action="carrera_selec.php?pais='.$_GET["pais"].'" method="POST">';
                            }
                            

                            

                            $sql="SELECT id, hipodromo FROM hipodromos";
                            $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());
                          
                            while($row=mysqli_fetch_array($rs)) {
                                    echo '<div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped">    
                                            <thead>
                                                <th><b>'.$row['hipodromo'].'</b></th>
                                            </thead>';
                                            echo '<tbody>';

                                            $id_hip=$row["id"];
                                            $sql2="SELECT * FROM nombre_carreras WHERE id_hipodromo=$id_hip";
                                            $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                
                                            while($row2=mysqli_fetch_array($rs2)) {
                                               
                                                echo '<tr><td>';
                                                echo '<input type="checkbox" name="carrera[]" value="'.$row2["id"].'"> ';
                                                if ($row2["id"]==1 || $row2["id"]==2 || $row2["id"]==3 || $row2["id"]==4 || $row2["id"]==5 || $row2["id"]==6 || $row2["id"]==7 || $row2["id"]==8 || $row2["id"]==9 || $row2["id"]==10 || $row2["id"]==11 || $row2["id"]==12) {
                                                    echo "<span class='principales'><b>".$row2["carrera"]."</b><span>";
                                                }
                                                else {
                                                     echo $row2["carrera"]." <b></b>";
                                                }
                                               
                                                echo '</td></tr>';
                                            }
                                            echo  '</tbody>';
                                        echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                     
                                ?>
                           
                    </div>
                    <input type="hidden" name="pais" value="<?php echo $_GET["pais"]; ?>">
                     <button>Continuar</button>
                        </form>
                                
                            
                        
            
                
            
        
        
                <!-- Modal Registro de Usuarios -->

            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalRegistroLabel">Registrate</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" name="registro" method="POST" action="registro.php">
                                <div class="form-group">
                                    <label for="pais" class="col-sm-4 control-label">Pais:</label>
                                    <div class="col-sm-6">
                                        <select  name="pais" id="pais" class="form-control">
                                        <?php
                                            include("../conexion/conexion.php"); 
                                            $sql_pais="SELECT * FROM paises";
                                            $rs_pais=mysqli_query($mysqli,$sql_pais) or die(mysqli_error());
                                            while ($row_pais=mysqli_fetch_array($rs_pais)) {
                                                echo  '<option value='.$row_pais["id"].'>'.$row_pais["pais"].'</option>';
                                            }

                                        ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                                    <div class="col-sm-6">
                                        <select  name="agencia" id="agencia" class="form-control">
                                        <?php 
                                            $sql_agencias="SELECT * FROM agencias";
                                            $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                                            while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                                                echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                                            }

                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cedula" class="col-sm-4 control-label">Cédula:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="cedula" id="cedula" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-4 control-label">Nombre:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido" class="col-sm-4 control-label">Apellido:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="col-sm-4 control-label">Correo:</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="correo" id="correo" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo2" class="col-sm-4 control-label">Confirmar Correo:</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="correo2" id="correo2" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave" class="col-sm-4 control-label">Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave" id="clave" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave2" class="col-sm-4 control-label">Confirmar Password:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="clave2" id="clave2" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="col-sm-4 control-label">Dirección:</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="direccion" id="direccion"  rows="3" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="col-sm-4 control-label">Teléfono:</label>
                                    <div class="col-sm-6">
                                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="" required>
                                    </div>
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-success">Crear Usuario</button>
                        </div>
                        </form>
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
