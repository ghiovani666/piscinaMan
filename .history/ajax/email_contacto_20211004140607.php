<?php
	$sender = 'ghiovani999@gmail.com';
	$senderName = 'ResidenciaJN';
	$recipient = 'gersst@gmail.com';
	$recipientName = 'Gersson';

	// The subject line of the email
	$subject = 'Mensaje de Cotización';

	$txt_nombre           =$_POST['txt_contac_nombre'];
	$txt_email            =$_POST['txt_contac_email'];
	$txt_telefono         =$_POST['txt_contac_telefono'];
	$txt_mensaje          =$_POST['txt_contac_mensaje'];


	require 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = 'ghiovani999@gmail.com';
	$mail->Password = 'estudiarucvjorge369';
	$mail->setFrom('ghiovani999@gmail.com', 'ResidenciaJN');
	$mail->addAddress('ghiovani999@gmail.com', 'Gersson');
	if ($mail->addReplyTo('ghiovani999@gmail.com', 'dddddddddddd')) {
		$mail->Subject = 'PHPMailer contact form 1';
		$mail->isHTML(false);
		$mail->Body = "Contenido";
		if (!$mail->send()) {
			$msg = 'Sorry, something went wrong. Please try again later.';
		} else {
			$msg = 'Message sent! Thanks for contacting us.';
		}
	} else {
		$msg = 'Share it with us!';
	}
	if (!empty($msg)) {
		echo "<h2>$msg</h2>";
	}

    ?>