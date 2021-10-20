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
if ( !empty($_POST["email"])) {
    $email = $_POST["email"];
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_select = "SELECT COUNT(email) FROM USUARIO WHERE email = '{$email}'";
$query_select = $pdo->prepare($sql_select);
$query_select->execute();
$query_emails_cadastrados = $query_select->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

$email_existe = $query_emails_cadastrados[0]['COUNT(email)'];

if ($email_existe == 0) {
    echo "<script>window.alert('Esse email não está cadastrado no sistema') 
                        window.location.href = '../cadastro.php'</script>";
    // echo "Esse email não está cadastrado no sistema";
            // exit;
} else if ($email_existe == 1) {
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'sistemaindicacaodeinvestimento@gmail.com';                     
        $mail->Password   = 'Não é a senha desse email';                         
        
        //Recipients
        $mail->setFrom('sistemaindicacaodeinvestimento@gmail.com', 'Atendimento');
        $mail->addAddress("{$email}");   
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = utf8_decode('Recuper Senha - Sistema  Indicação de Investimentos e Gerenciamento de Capital');
        $mail->Body    = "Prezado usuário, tudo bem?<br>Você solicitou a recuperação de senha, click no link para cadastrar uma <a href='http://localhost/projeto-TCC/SINI-TCC/recuperar_senha.php?email={$email}' target='_blank' rel='noopener noreferrer'>nova senha</a>.<br>Atenciosamente, <br>Sistema Indicação de Investimentos e Gerenciamento de Capital";
    
        $mail->send();
    
        // echo 'E-mail enviado com sucesso!<br>';
        echo "<script>window.alert('E-mail enviado para recuperar a senha')
                            window.location.href = '../index.php'</script>";

    } catch (Exception $e) {
        // echo "Falha ao enviar o E-mail<br> {$mail->ErrorInfo}";
        echo "Falha ao enviar o E-mail<br>";
    
    }
}

?>
