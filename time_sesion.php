<?php
    session_start(); 
    //antes de hacer los cálculos, compruebo que el usuario está logueado
    //utilizamos el mismo script que antes
   /* if ($_SESSION["autentificado"] != "SI") {
        //si no está logueado lo envío a la página de autentificación
        header("Location: index.php");
    } else {
        //sino, calculamos el tiempo transcurrido
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
        //comparamos el tiempo transcurrido
         if($tiempo_transcurrido >= 14400) {
         //si pasaron 24 horas minutos o más
          session_destroy(); // destruyo la sesión
          echo "<script>alert('Su session a caducado por inactividad');window.location='index.php';</script>";
          //header("Location: login.php"); //envío al usuario a la pag. de autenticación
          //sino, actualizo la fecha de la sesión
        }else {
        $_SESSION["ultimoAcceso"] = $ahora;
       }
    }*/
?>