<?php
include("../time_sesion.php"); 
   include("../conexion/conexion.php");
   include("../lib/fecha_hora.php");
   if (isset($_SESSION["tipo"])) {
       do {
         $caracteres = "1234567890"; //posibles caracteres a usar
         $numerodeletras=8; //numero de letras para generar el texto
         $ticket_c =$_SESSION['agencia']."-". ""; //variable para almacenar la cadena generada
         for($i=0;$i<$numerodeletras;$i++)
         {
            $ticket_c .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
            entre el rango 0 a Numero de letras que tiene la cadena */
         }
         $sql="SELECT codigo FROM tickets_c";
         $rs=mysqli_query($mysqli,$sql) or die(mysqli_error());
         while (($row=mysqli_fetch_array($rs)) && ($ticket_c !="")) {
            if (($row["codigo"]==$ticket_c)) $ticket_c="";
                  
         }
   
   } while ($ticket_c=="");

$carreras= $_POST["carrera"];
   foreach ($carreras as $key => $carrera) {
      list($id_carrera,$apuesta,$logro) = explode("/", $carrera);
      $sql_apostar="INSERT INTO apuestas_c(id_carrera,apuesta,logro_c,ticket_c) VALUES('".$id_carrera."','".$apuesta."','".$logro."','".$ticket_c."')";
      $rs=mysqli_query($mysqli,$sql_apostar) or die(mysqli_error($mysqli));
                                 

   }

    
      if ($_SESSION["tipo"]=="normal") {
         
         if ($_POST["monto"] > $_POST["saldo"]) {
            header('Location: competiciones.php');
         }
         else {

            $sql_ticket="INSERT INTO tickets_c(codigo,agencia,cedula,tipo,fecha,hora,monto,premio,ganar,pagado,activo) VALUES('".$ticket_c."','".$_SESSION['agencia']."','".$_SESSION['usuario']."','".$_POST['tipo']."','".fecha()."','".hora()."','".$_POST["monto"]."','".$_POST["premio"]."','3','0','1')";
            $rs=mysqli_query($mysqli,$sql_ticket) or die(mysqli_error($mysqli));

            $sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
            $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
            $row_s=mysqli_fetch_array($rs_s);
            $saldo_final = $row_s["saldo"] - $_POST["monto"];
            if($saldo_final < 0) {
                $saldo_final=0;
                header('Location: competiciones.php');
            } 
            $sql_as="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_SESSION["usuario"]."'";
            $rs_as=mysqli_query($mysqli,$sql_as) or die(mysqli_error($mysqli));
            
         }
         
      }
      else {
          $sql_ticket="INSERT INTO tickets_c(codigo,agencia,tipo,fecha,hora,monto,premio,ganar,pagado,activo) VALUES('".$ticket_c."','".$_SESSION['agencia']."','".$_POST['tipo']."','".fecha()."','".hora()."','".$_POST["monto"]."','".$_POST["premio"]."','3','0','1')";
         $rs=mysqli_query($mysqli,$sql_ticket) or die(mysqli_error($mysqli));

      }
   echo "<script>window.location='ticket_c.php?cod_t=".$ticket_c."'</script>";       
   }                    
?>