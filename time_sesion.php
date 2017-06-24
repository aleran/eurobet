<?php
session_start(); 
if ($_SESSION["autentificado"] != "SI") {
//si no está logueado lo envío a la página de autentificación
header("location:./bienvenido.php");
} 
?>
