 <?php
   session_start();
   include("conexion/conexion.php");
   include("lib/fecha_hora.php");
   do {
         $caracteres = "1234567890"; //posibles caracteres a usar
         $numerodeletras=8; //numero de letras para generar el texto
         $ticket =$_SESSION['agencia']."-". ""; //variable para almacenar la cadena generada
         for($i=0;$i<$numerodeletras;$i++)
         {
            $ticket .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
            entre el rango 0 a Numero de letras que tiene la cadena */
         }
         $sql="SELECT codigo FROM parlay";
         $rs=mysqli_query($mysqli,$sql) or die(mysqli_error());
         while (($row=mysqli_fetch_array($rs)) && ($ticket !="")) {
            if (($row["codigo"]==$ticket)) $ticket="";
                  
         }
   
   } while ($ticket=="");

$partidos= $_POST["partido"];
   foreach ($partidos as $key => $partido) {
      list($id_partido,$logro,$v_logro) = explode("/", $partido);
      $sql_apostar="INSERT INTO apuestas(id_partido,logro,valor_logro,ticket) VALUES('".$id_partido."','".$logro."','".$v_logro."','".$ticket."')";
      $rs=mysqli_query($mysqli,$sql_apostar) or die(mysqli_error($mysqli));
                                 

   }

    $sql_parlay="INSERT INTO parlay(codigo,agencia,tipo,fecha,hora,monto,premio,ganar,activo) VALUES('".$ticket."','".$_SESSION['agencia']."','".$_POST['tipo']."','".fecha()."','".hora()."','".$_POST["monto"]."','".$_POST["premio"]."','0','1')";
      $rs=mysqli_query($mysqli,$sql_parlay) or die(mysqli_error($mysqli));
   echo "<script>window.location='ticket.php?cod_t=".$ticket."'</script>";                
                      
?>