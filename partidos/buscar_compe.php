<?php
include("../time_sesion.php");  
include("../conexion/conexion.php");
list($competicion, $deporte) = explode("/", $_POST["comp"]);
$sql = mysqli_query($mysqli,"SELECT * FROM competiciones WHERE id_deporte='".$deporte."' AND competicion like '" . $competicion . "%'");
while($row=mysqli_fetch_array($sql)){
	$compe_selec=$row['competicion'];
	echo "<div class='suggest-element'><a data-compe='".$row["competicion"]."' id='".$row["id_competicion"]."'>$compe_selec</a></div>";
}
?>