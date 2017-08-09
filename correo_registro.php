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
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "recargaseurobet@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "recargas17-";
		//Set who the message is to be sent from
		$mail->setFrom('recargaseurobet@gmail.com', 'EUROBET :: Tu sitio de apuestas parlay');
		//Set an alternative reply-to address
		$mail->addReplyTo('recargaseurobet@gmail.com', 'EUROBET :: Tu sitio de apuestas parlay');
		//Set who the message is to be sent to
		$mail->addAddress($_POST["correo"], 'usuario');
		//Set the subject line
		$mail->Subject = 'Registro de usuario eurobet';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = 'Hola, gracias por registrarte al sistema de recargas EUROBET, el proceso ha sido exitoso. Su contraseña para ingresar es: '.$_POST["clave"]. '. <br>Por favor no responda este correo ya que es generado automáticamente por el sistema<br><br>www.eurobet.com.co';
		$mail->AltBody = 'registro';
		$mail->CharSet = 'UTF-8';
		//Attach an image file
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "<script>alert('Se ha registrado satisfactoriamente, pero ha ocurrido un error y no se le enviara por correo la información de registro;</script>". ": " . $mail->ErrorInfo;
		} else {
		    echo "<script>alert('Se ha registrado satisfactoriamente, se le ha enviado un correo con los datos para acceder a su cuenta');window.location='index.php';</script>";
		}
?>