<?php
	require 'lib/PHPMailer/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'mail.eurobet.com.co'; //o 184.154.67.178
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 465;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "recargas@eurobet.com.co";
		//Password to use for SMTP authentication
		$mail->Password = "recargas17-";
		//Set who the message is to be sent from
		$mail->setFrom('recargas@eurobet.com.co', 'eurobet.com.co');
		//Set an alternative reply-to address
		$mail->addReplyTo('recargas@eurobet.com.co', 'eurobet.com.co');
		//Set who the message is to be sent to
		$mail->addAddress($_POST["correo"], 'usuario');
		//Set the subject line
		$mail->Subject = 'Registro usuario eurobet';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = 'Se ha registrado exitosamente en eurobet, su contraseña es: '.$_POST["clave"]. '. <br>Por favor no responda este correo ya que es generado automáticamente por el sistema';
		$mail->AltBody = 'registro';
		$mail->CharSet = 'UTF-8';
		//Attach an image file
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "<script>alert('Se ha registrado satisfactoriamente, pero ha ocurrido un error y no se le enviara por correo la información de registro en el sistema;</script>". ": " . $mail->ErrorInfo;
		} else {
		    echo "<script>alert('Se ha registrado satisfactoriamente, se le ha enviado un correo con los datos para acceder al sistema');window.location='index.php';</script>";
		}
?>