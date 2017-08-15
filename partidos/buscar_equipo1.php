<?php
include("../time_sesion.php");  
include("../conexion/conexion.php");
list($equipo, $deporte) = explode("/", $_POST["equipo"]);
$sql = mysqli_query($mysqli,"SELECT * FROM equipos WHERE id_deporte='".$deporte."' AND equipo like '" . $equipo . "%'");
while($row=mysqli_fetch_array($sql)){
	$equipo1_selec=$row['equipo'];
	echo "<div class='suggest-element2'><a data-equipo='".$row["equipo"]."' id='".$row["id"]."'>$equipo1_selec</a></div>";
}
?>