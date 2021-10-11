<?php
// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

require './lib/vendor/phpmailer/phpmailer/src/Exception.php';
require './lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './lib/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './lib/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sistemaindicacaodeinvestimento@gmail.com';                     //SMTP username
    $mail->Password   = 'essa não é a senha';                         //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // //Recipients
    $mail->setFrom('sistemaindicacaodeinvestimento@gmail.com', 'Atendimento');
    // $mail->addAddress('gabibook2@gmail.com', 'Gabriel Borges');     //Add a recipient
    $mail->addAddress('gustavoneivacosta@gmail.com');     //Add a recipient
    $mail->addAddress('gabibook2@gmail.com');     //Add a recipient
    $mail->addAddress('alexjpbarroso23@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Atendimento - Sistema  Indicação de Investimentos e Gerenciamento de Capital';
    $mail->Body    = 'Olá você está cadastrado no nosso <b>Sistema</b>.<br> Burguesia do e-mail automatico. <br>Testando caracter especial ção páulo';
    // $mail->AltBody = 'Não tem html nesse texto\ntesta';

    $mail->send();

    echo 'E-mail enviado com sucesso!<br>';
} catch (Exception $e) {
    echo "Falha ao enviar o E-mail<br> {$mail->ErrorInfo}";
    // echo "Falha ao enviar o E-mail<br>";

}

?>
