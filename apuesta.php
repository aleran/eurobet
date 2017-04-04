 <?php
   include("conexion/conexion.php");
   do {
         $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
         $numerodeletras=9; //numero de letras para generar el texto
         $ticket = ""; //variable para almacenar la cadena generada
         for($i=0;$i<$numerodeletras;$i++)
         {
            $ticket .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
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
      echo $id_partido;
      echo $logro;
      echo $v_logro;
      $sql_apostar="INSERT INTO apuestas(id_partido,logro,valor_logro,ticket) VALUES('".$id_partido."','".$logro."','".$v_logro."','".$ticket."')";
      $rs=mysqli_query($mysqli,$sql_apostar) or die(mysqli_error($mysqli));
                                 

   }

    $sql_parlay="INSERT INTO parlay(codigo,monto,premio,ganar) VALUES('".$ticket."','".$_POST["monto"]."','".$_POST["premio"]."','0')";
      $rs=mysqli_query($mysqli,$sql_parlay) or die(mysqli_error($mysqli));
   echo "<br>".$ticket;                
                      
?>