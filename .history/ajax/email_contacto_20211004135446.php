<?php
    require '../phpmailer/PHPMailerAutoload.php';

$sender = 'webmater@residenciajn.es';
$senderName = 'Movar';
$recipient = 'webmater@residenciajn.es';

// The subject line of the email
$subject = 'Mensaje de Cotización';


//Recibir todos los parámetros del formulario
//Recibir todos los parámetros del formulario
$txt_nombre           =$_POST['txt_contac_nombre'];
$txt_email            =$_POST['txt_contac_email'];
$txt_telefono         =$_POST['txt_contac_telefono'];
$txt_mensaje          =$_POST['txt_contac_mensaje'];



$mail = new PHPMailer;

try {
    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = 'ghiovani999@gmail.com';
    $mail->Password   = 'estudiarucvjorge369';
    $mail->Host       = 'smtp.gmail.com';
    $mail->Port       = 465;

    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    //$mail->addCustomHeader('X-SES-CONFIGURATION-SET');

    // Specify the message recipients.
    $mail->addAddress($recipient);
    // You can also add CC, BCC, and additional To recipients here.

    // Specify the content of the message.
    $mail->isHTML(true);
    $mail->Subject    = $subject;

    $mail->MsgHTML("<i>Mail body in HTML</i>");
    $mail->AltBody    ="<i>Mail body in HTML</i>";
    $mail->Send();
    echo "Email sent!" , PHP_EOL;
} catch (phpmailerException $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}


    ?>