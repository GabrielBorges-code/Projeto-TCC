<?php
require('../config/database.php');

require '../lib/vendor/phpmailer/phpmailer/src/Exception.php';
require '../lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../lib/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../lib/vendor/autoload.php';

$email = "";
if (!empty($_GET["email"])) {
    $email = $_GET["email"];
}

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';    // TLS REQUERIDO pelo GMail
    $mail->Port = 587;          // A porta 587 deverá estar aberta em seu servidor
    $mail->Username   = 'sistemaindicacaodeinvestimento@gmail.com';
    $mail->Password   = 'Não é a senha';

    //Recipients
    $mail->setFrom('sistemaindicacaodeinvestimento@gmail.com', 'Atendimento');
    $mail->addAddress("{$email}");

    //Content
    $mail->isHTML(true);
    $mail->Subject = utf8_decode('Boas vindas - Sistema Indicação de Investimentos e Gerenciamento de Capital');
    $mail->Body    = utf8_decode('Boas Vindas!<br><br>Seja bem vindo ao Sistema Indicação de Investimentos e Gerenciamento de Capital. Agora você está cadastrado em nossa plataforma! ;-)<br><br>Atenciosamente, <br>Sistema Indicação de Investimentos e Gerenciamento de Capital.');

    $mail->send();

    echo "<script>window.alert('Usuário cadastrado com sucesso!')
         window.location.href = '../login'</script>";

} catch (Exception $e) {
    // echo "Falha ao enviar o E-mail<br> {$mail->ErrorInfo}";
    echo "Falha ao enviar o E-mail<br>";

    // var_dump($e);
}

?>