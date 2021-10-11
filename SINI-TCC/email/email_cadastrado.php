<?php
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
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                       
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'sistemaindicacaodeinvestimento@gmail.com';                     
    $mail->Password   = 'não é essa a senha';                         
    

    //Recipients
    $mail->setFrom('sistemaindicacaodeinvestimento@gmail.com', 'Atendimento');
    // $mail->addAddress('gabibook2@gmail.com', 'Gabriel Borges'); 
    $mail->addAddress('gabibook2@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);
    $mail->Subject = utf8_decode('Atendimento - Sistema  Indicação de Investimentos e Gerenciamento de Capital');
    $mail->Body    = 'Olá você está cadastrado no nosso <b>Sistema</b>.<br> Burguesia do e-mail automatico. <br>Testando caracter especial ção páulo';

    $mail->send();

    echo 'E-mail enviado com sucesso!<br>';
} catch (Exception $e) {
    // echo "Falha ao enviar o E-mail<br> {$mail->ErrorInfo}";
    echo "Falha ao enviar o E-mail<br>";

}

?>