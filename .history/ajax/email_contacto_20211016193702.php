<?php
require 'phpmailer/PHPMailerAutoload.php';

$sender = 'ghiovani999@gmail.com';
$senderName = 'Informes';
$recipient = 'ghiovani999@gmail.com';
    
// The subject line of the email
$subject = 'Mensaje de Contaco';


//Recibir todos los parámetros del formulario
$txt_nombre           =	$_POST['txt_contac_nombre'];
$txt_email            = $_POST['txt_contac_email'];
$txt_telefono         = $_POST['txt_contac_telefono'];
$txt_mensaje          = $_POST['txt_contac_mensaje'];


$bodyHtml = body_html($txt_nombre,$txt_email,$txt_telefono,$txt_mensaje );

$mail = new PHPMailer(true);

try {
    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = 'ghiovani999@gmail.com';
    $mail->Password   = 'estudiarucvjorge369%';
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

    $mail->MsgHTML($bodyHtml);
    $mail->AltBody    ="This is the plain text version of the email content";
    $mail->Send();
    echo "Email sent!" , PHP_EOL;
} catch (phpmailerException $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}


function body_html($txt_nombre,$txt_email,$txt_telefono,$txt_mensaje )
{

$bodyHtml = "
<style>
html {
    width: 100%
}

::-moz-selection {
    background: #fd4326;
    color: #fff;
    text-shadow: 1px 1px 0 #f22b0e
}

::selection {
    background: #fd4326;
    color: #fff;
    text-shadow: 1px 1px 0 #f22b0e
}

body {
    background-color: #fff;
    margin: 0;
    padding: 0
}

.ReadMsgBody {
    width: 100%;
    background-color: #fff
}

.ExternalClass {
    width: 100%;
    background-color: #fff
}

a {
    color: #fd4326;
    text-decoration: none;
    font-weight: 400;
    font-style: normal
}

a:hover {
    color: #262626;
    text-decoration: none;
    font-weight: 400;
    font-style: normal
}

p,
div {
    margin: 0 !important
}

table {
    border-collapse: collapse
}

@media only screen and (max-width:640px) {
    body {
        width: auto !important
    }

    table table {
        width: 100% !important
    }

    td[class=full_width] {
        width: 100% !important
    }

    td[class=spacer] {
        width: 30px !important
    }

    td[class=spacer_spec] {
        display: none !important
    }

    div[class=div_scale] {
        width: 440px !important;
        margin: 0 auto !important
    }

    table[class=table_scale] {
        width: 440px !important;
        margin: 0 auto !important
    }

    td[class=td_scale] {
        width: 440px !important;
        margin: 0 auto !important
    }

    img[class=img_scale] {
        width: 100% !important;
        height: auto !important
    }

    img[class=divider] {
        width: 100% !important;
        height: 2px !important
    }

    td[class=divider] {
        width: 100% !important;
        display: block !important;
        float: left;
        text-align: inherit !important
    }
}

@media only screen and (max-width:479px) {
    body {
        width: auto !important
    }

    table table {
        width: 100% !important
    }

    td[class=full_width] {
        width: 100% !important
    }

    div[class=div_scale] {
        width: 280px !important;
        margin: 0 auto !important
    }

    table[class=table_scale] {
        width: 280px !important;
        margin: 0 auto !important
    }

    td[class=td_scale] {
        width: 280px !important;
        margin: 0 auto !important
    }

    img[class=img_scale] {
        width: 100% !important;
        height: auto !important
    }

    img[class=divider] {
        width: 100% !important;
        height: 2px !important
    }

    td[class=spacer] {
        display: none !important
    }

    td[class=spacer_spec] {
        display: none !important
    }

    td[class=divider] {
        width: 100% !important;
        display: block !important;
        float: left;
        text-align: inherit !important
    }

    td[class=center] {
        text-align: center !important
    }

    td[class=subject_line] {
        float: left;
        width: 240px;
        display: block !important;
        text-align: left !important;
        padding: 15px 20px !important
    }

    td[class=contact] {
        float: left;
        width: 240px;
        display: block !important;
        text-align: left !important;
        padding: 0 20px 15px !important;
        padding-bottom: 20px !important
    }

    td[class=social_left] {
        float: left;
        width: 240px;
        display: block !important;
        text-align: center !important;
        padding: 20px 20px 0 !important
    }

    td[class=social_right] {
        float: left;
        width: 240px;
        display: block !important;
        text-align: center !important;
        padding: 0 20px !important
    }

    td[class=one_one] {
        width: 240px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        padding-right: 20px !important;
        text-align: inherit !important
    }

    td[class=one_half] {
        width: 240px !important;
        padding-bottom: 0 !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_half_last] {
        width: 240px !important;
        margin-top: 40px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important;
        padding-top: 0 !important
    }

    td[class=one_third_fed] {
        width: 240px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_third_fed_sec] {
        width: 240px !important;
        margin-top: 20px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_third_fed_last] {
        width: 240px !important;
        margin-top: 20px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_third] {
        width: 240px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_third_sec] {
        width: 240px !important;
        margin-top: 40px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=two_third_last] {
        width: 240px !important;
        margin-top: 40px !important;
        display: block !important;
        float: left;
        padding-left: 20px !important;
        text-align: inherit !important
    }

    td[class=two_third] {
        width: 240px !important;
        display: block !important;
        float: left;
        margin-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_third_last] {
        width: 240px !important;
        margin-top: 40px !important;
        display: block !important;
        float: left;
        margin-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_fourth] {
        width: 110px !important;
        display: block !important;
        float: left;
        margin-left: 20px !important;
        text-align: inherit !important
    }

    td[class=one_fourth_last] {
        width: 110px !important;
        margin-top: 20px !important;
        display: block !important;
        float: left;
        margin-left: 20px !important;
        text-align: inherit !important
    }
}
</style>

<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#d0d0d0'
    style='padding: 0; margin: 0;'>
    <!-- START OF TOP BAR-->
    <tr>
        <td class='full_width' align='center' width='100%' bgcolor='#d0d0d0' style=''>
            <div class='div_scale' style='width:600px;'>
                <table class='table_scale' width='600' HEIGHT='42' border='0' align='center' cellpadding='0'
                    cellspacing='0' bgcolor='#494949' style='padding:0; margin: 0;'>
                    <tr>
                        <td class='spacer' width='20' align='left' valign='top' bgcolor='#494949'
                            style='margin: 0 !important; padding: 0 !important; line-height: 0 !important;'>&nbsp;</td>
                        <!-- START OF SUBJECT LINE-->
                        <td class='subject_line' align='left' valign='middle' width='270' bgcolor='#494949'
                            style='padding-top: 10px; padding-bottom: 10px;'>
                            <table width='100%'>
                                <tr>
                                    <td class='center' align='' valign=''
                                        style='font-family:Arial, sans-serif; font-style: italic; color:#d8d8d8; font-size:11px; line-height:18px;'>
                                        Formmulari de Contacto</td>
                                </tr>
                            </table>
                        </td>
                        <!-- END OF SUBJECT LINE-->
                        <td class='spacer' width='20' align='left' valign='top' bgcolor='#494949'
                            style='margin: 0 !important; padding: 0 !important; line-height: 0 !important;'>&nbsp;</td>
                        <!-- START OF CONTACT-->
                        <td class='contact' align='right' valign='middle' width='270' bgcolor='#494949'
                            style='padding: 0px;'>
                            <table width='100%'>
                                <tr>
                                    <td class='center' align='' valign=''
                                        style='text-align: right; font-family:Arial, sans-serif; font-style: italic; color:#d8d8d8; font-size:11px; line-height:100%;'>
                                        <img src='http://18.218.31.207/assets/img/logo.png' alt='email' width='20'
                                            height='11'
                                            style='display: inline; vertical-align: middle;' />ghiovani999@gmail.com
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- END OF CONTACT-->
                        <td class='spacer' width='20' align='left' valign='top' bgcolor='#494949'
                            style='margin: 0 !important; padding: 0 !important; line-height: 0 !important;'>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <!-- END OF TOP BAR-->
    <!-- START OF VERTIXAL SPACER BLOCK-->
    <tr>
        <td class='full_width' align='center' width='100%' bgcolor='#d0d0d0' style=''>
            <div class='div_scale' style='width:600px;'>
                <table class='table_scale' width='600' border='0' align='center' cellpadding='0' cellspacing='0'
                    bgcolor='#d0d0d0' style='padding:0; margin: 0;'>
                    <tr>
                        <td class='td_scale' width='600' height='40' bgcolor='#d0d0d0' align='center' valign='middle'
                            style='height: 40px; padding: 0px; font-size:0 ; color:#686868; font-family: Arial,sans-serif; line-height: 0; '>
                            &nbsp;</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <!-- END OF VERTIXAL SPACER BLOCK-->
    <!-- START OF FEATURED AREA BLOCK-->
    <tr>
        <td class='full_width' align='center' width='100%' bgcolor='#d0d0d0' style=''>
            <div class='div_scale' style='width:600px;'>
                <table class='table_scale' width='600' border='0' align='center' cellpadding='0' cellspacing='0'
                    bgcolor='#f0f0f0' style='padding:0; margin: 0;'>
                    <tr>
                        <!-- START OF LEFT COLUMN-->
                        <td class='td_scale' width='600' bgcolor='#fd4326' align='center' valign='top'
                            style='padding: 0px; font-size:14px ; color:#959595; font-family: Arial,sans-serif; line-height: 24px; '>
                            <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'
                                bgcolor='#fd4326' style='margin: 0;'>
                                <!-- START OF VERTICAL SPACER-->
                                <tr>
                                    <td height='20' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- END OF VERTICAL SPACER-->
                                <!-- START OF HEADING TITLE-->
                                <tr>
                                    <td class='center' align='center' valign='top' bgcolor='#f0f0f0'
                                        style='padding: 0px 20px;  text-shadow: 1px 1px 0px #ffffff;font-size:24px ; color:#444444; font-family: Lucida Sans Unicode; line-height: 34px; '>
                                        Detalle de la cotización </td>
                                </tr>
                                <!-- END OF HEADING TITLE-->
                                <!-- START OF VERTICAL SPACER-->
                                <tr>
                                    <td height='10' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- END OF VERTICAL SPACER-->

                                <!-- START OF VERTICAL SPACER-->
                                <tr>
                                    <td height='20' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- END OF VERTICAL SPACER-->
                            </table>
                        </td>
                        <!-- JUST A VERTICAL SPACER-->
                        <div class='div_scale' style='width:600px; display: block; border-bottom: 1px solid #d0d0d0;'>
                            <table class='table_scale' width='600' border='0' align='center' cellpadding='0'
                                cellspacing='0' bgcolor='#f9f9f9' style='padding:0; margin: 0;'>
                                <tr>
                                    <td class='td_scale' width='600' height='20' bgcolor='#f9f9f9' align='center'
                                        valign='middle'
                                        style='height: 20px; padding: 0px; font-size:0 ; color:#686868; font-family: Arial,sans-serif; line-height: 0; '>
                                        &nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <!-- END OF JUST A VERTICAL SPACER-->
                        <!-- JUST A VERTICAL SPACER-->
                        <div class='div_scale' style='width:600px; display: block; '>
                            <table class='table_scale' width='600' border='0' align='center' cellpadding='0'
                                cellspacing='0' bgcolor='#f0f0f0' style='padding:0; margin: 0;'>
                                <tr>
                                    <td class='td_scale' width='600' height='40' bgcolor='#f0f0f0' align='center'
                                        valign='middle'
                                        style='height: 40px; padding: 0px; font-size:0 ; color:#686868; font-family: Arial,sans-serif; line-height: 0; '>
                                        &nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <!-- END OF JUST A VERTICAL SPACER-->
        </td>
    </tr>
    <!-- END OF 3 COL FEATURED PRODUCT OR GALLERY-->
    <!-- START OF 1/2 COL WITH IMAGE ON TOP-->
    <tr>
        <td class='full_width' align='center' width='100%' bgcolor='#d0d0d0' style=''>
            <div class='div_scale' style='width:600px;'>


                <table class='table_scale' width='' border='0' align='center' cellpadding='0' cellspacing='0'
                    bgcolor='#f0f0f0' style='padding:0; margin: 0;'>
                    <tr>
                        <td class='spacer' width='20' align='left' valign='top' bgcolor='#f0f0f0'
                            style='margin: 0 !important; padding: 0 !important; line-height: 0 !important;'>&nbsp;</td>
                        <!-- START OF LEFT COLUMN-->
                        <td class='one_half' align='left' valign='top' width='270' bgcolor='#f0f0f0' style=''>
                            <table width='100%'>

                                <tr>
                                    <td height='12' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF HEADING-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:16px ; color:#262626; font-family: Lucida Sans Unicode; line-height: 26px; '>
                                        <a href='#' style='font-weight: normal; color:#262626; text-decoration: none;'>
                                            Nombre</a>
                                    </td>
                                </tr>
                                <!-- END OF HEADING-->
                                <tr>
                                    <td height='10' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF TEXT-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:13px ; color:#727272; font-family: Arial,sans-serif; line-height: 23px; '>
                                        ".$txt_nombre." </td>
                                </tr>
                                <!-- END OF TEXT-->
                                <tr>
                                    <td height='20' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>

                            </table>
                        </td>

                        <td class='one_half' align='left' valign='top' width='270' bgcolor='#f0f0f0' style=''>
                            <table width='100%'>

                                <tr>
                                    <td height='12' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF HEADING-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:16px ; color:#262626; font-family: Lucida Sans Unicode; line-height: 26px; '>
                                        <a href='#' style='font-weight: normal; color:#262626; text-decoration: none;'>
                                            Email</a>
                                    </td>
                                </tr>
                                <!-- END OF HEADING-->
                                <tr>
                                    <td height='10' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF TEXT-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:13px ; color:#727272; font-family: Arial,sans-serif; line-height: 23px; '>
                                        ".$txt_email ." </td>
                                </tr>
                                <!-- END OF TEXT-->
                                <tr>
                                    <td height='20' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>

                            </table>
                        </td>

                        <td class='one_half' align='left' valign='top' width='270' bgcolor='#f0f0f0' style=''>
                            <table width='100%'>

                                <tr>
                                    <td height='12' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF HEADING-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:16px ; color:#262626; font-family: Lucida Sans Unicode; line-height: 26px; '>
                                        <a href='#' style='font-weight: normal; color:#262626; text-decoration: none;'>
                                            Teléfono</a>
                                    </td>
                                </tr>
                                <!-- END OF HEADING-->
                                <tr>
                                    <td height='10' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF TEXT-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:13px ; color:#727272; font-family: Arial,sans-serif; line-height: 23px; '>
                                        ".$txt_telefono."</td>
                                </tr>
                                <!-- END OF TEXT-->
                                <tr>
                                    <td height='20' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                      
                        <td class='one_half' align='left' valign='top' width='270' bgcolor='#f0f0f0' style=''>
                            <table width='100%'>

                                <tr>
                                    <td height='12' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF HEADING-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:16px ; color:#262626; font-family: Lucida Sans Unicode; line-height: 26px; '>
                                        <a href='#' style='font-weight: normal; color:#262626; text-decoration: none;'>
                                            Descripción</a>
                                    </td>
                                </tr>
                                <!-- END OF HEADING-->
                                <tr>
                                    <td height='10' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>
                                <!-- START OF TEXT-->
                                <tr>
                                    <td valign='top' align='center'
                                        style='padding: 0px; text-shadow: 1px 1px 0px #ffffff;font-size:13px ; color:#727272; font-family: Arial,sans-serif; line-height: 23px; '>
                                        ".$txt_mensaje."</td>
                                </tr>
                                <!-- END OF TEXT-->
                                <tr>
                                    <td height='20' bgcolor='#f0f0f0' style='padding:0; line-height: 0;'>&nbsp;</td>
                                </tr>

                            </table>
                        </td>

                        <!-- END OF LEFT COLUMN-->
                        <td class='spacer' width='20' align='left' valign='top' bgcolor='#f0f0f0'
                            style='margin: 0 !important; padding: 0 !important; line-height: 0 !important;'>&nbsp;</td>

                        <td class='spacer' width='20' align='left' valign='top' bgcolor='#f0f0f0'
                            style='margin: 0 !important; padding: 0 !important; line-height: 0 !important;'>&nbsp;</td>
                    </tr>

                </table>

            </div>
            <!-- JUST A VERTICAL SPACER-->
            <div class='div_scale' style='width:600px; display: block; '>
                <table class='table_scale' width='600' border='0' align='center' cellpadding='0' cellspacing='0'
                    bgcolor='#f0f0f0' style='padding:0; margin: 0;'>
                    <tr>
                        <td class='td_scale' width='600' height='40' bgcolor='#f0f0f0' align='center' valign='middle'
                            style='height: 40px; padding: 0px; font-size:0 ; color:#686868; font-family: Arial,sans-serif; line-height: 0; '>
                            &nbsp;</td>
                    </tr>
                </table>
            </div>
            <!-- END OF JUST A VERTICAL SPACER-->
        </td>
    </tr>
    <!-- END OF 1/2 COL WITH IMAGE ON TOP-->
   

    <!-- START OF FOOTER-->
    <tr>
        <td class='full_width' align='center' width='100%' bgcolor='#d0d0d0' style=''>
            <div class='div_scale' style='width:600px;'>
                <table class='table_scale' width='' border='0' align='center' cellpadding='0' cellspacing='0'
                    bgcolor='#353535' style='padding:0; margin: 0;'>
                    <tr>
                        <td class='' align='center' valign='top' width='600' bgcolor='#353535' style=''>
                            <table align='center' width='100%'>
                                <!-- START OF TEXT-->
                                <tr>
                                    <td align='center' valign='top'
                                        style='border-top: 1px solid #2b2b2b; padding: 40px 20px; font-size:13px ; color:#bbbbbb; font-family: Arial,sans-serif; line-height: 23px; '>


                                        Este email estaba dirigido para realizar las cotizaciones o presupuestos.
                                        Recibes emails sobre Extracto de mensajes.<br />
                                        <span style='color:#ffffff;'> <a href='https://www.mercadolivre.com.br/'
                                                style='color:#ffffff; font-style: normal; text-decoration: none; '>
                                                Inicio </a> &nbsp;|&nbsp;<a href='http://18.218.31.207/#index_mains'
                                                style='color:#ffffff; font-style: normal; text-decoration: none;'>
                                                Nosotros </a> &nbsp;|&nbsp;<a href='http://18.218.31.207/#about_main'
                                                style='color:#ffffff; font-style: normal; text-decoration: none;'>
                                                Cotización </a> &nbsp;&nbsp;<a href='http://18.218.31.207/#cotizar_main'
                                                style='color:#ffffff; font-style: normal; text-decoration: none; '> </a>
                                        </span>
                                    </td>
                                </tr>
                                <!-- END OF TEXT-->
                                <!-- START OF LOGO-->
                                <tr>
                                    <td align='center' valign='top'
                                        style='border-top: 1px solid #484848; padding: 20px; font-size:13px ; color:#bbbbbb; font-family: Arial,sans-serif; line-height: 23px; '>
                                        <a href='#' style='font-style: normal;'> <img
                                                src='http://18.218.31.207/assets/img/logo.png' /> </a>
                                    </td>
                                </tr>
                                <!-- END OF LOGO-->
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <!-- END OF FOOTER-->
    <!-- START OF VERTIXAL SPACER BLOCK-->
    <tr>
        <td class='full_width' align='center' width='100%' bgcolor='#d0d0d0' style=''>
            <div class='div_scale' style='width:600px;'>
                <table class='table_scale' width='600' border='0' align='center' cellpadding='0' cellspacing='0'
                    bgcolor='#d0d0d0' style='padding:0; margin: 0;'>
                    <tr>
                        <td class='td_scale' width='600' height='40' bgcolor='#d0d0d0' align='center' valign='middle'
                            style='height: 40px; padding: 0px; font-size:0 ; color:#686868; font-family: Arial,sans-serif; line-height: 0; '>
                            &nbsp;</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <!-- END OF VERTIXAL SPACER BLOCK-->
</table>
";
	return $bodyHtml;
}
    ?>