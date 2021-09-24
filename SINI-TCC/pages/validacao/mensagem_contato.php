<?php

require('../../config/database.php');

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nome = "";
if ( !empty($_POST["nome"])) {
    $nome = $_POST["nome"];
}

$email = "";
if ( !empty($_POST["email"])) {
    $email = $_POST["email"];
}

$telefone = "";
if ( !empty($_POST["telefone"])) {
    $telefone = $_POST["telefone"];
}

$mensagem = "";
if ( !empty($_POST["mensagem"])) {
    $mensagem = $_POST["mensagem"];
}

$sql_insert = "INSERT INTO mensagem_contato (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";
$query_insert = $pdo->prepare($sql_insert);
$query_insert->execute();

Database::disconnect();

echo "<script>window.alert('Mensagem enviada, em breve entraremos em contato com você 😉!')
        window.location.href = '../../index.php'</script>";


?>