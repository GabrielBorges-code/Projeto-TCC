<?php

require('../../config/database.php');

// session_start();
// if (!$_SESSION['logged_in']) {
//     header("Location: ../../sair.php");
//     exit;
// }

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Database::disconnect();

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

$senha = "";
if ( !empty($_POST["senha"])) {
    $senha = $_POST["senha"];
    $senha = base64_encode($senha);
}

// $senha = "132acb";
// $senha = base64_encode($senha);
// echo ($senha);
// echo "<br>";
// echo (base64_decode($senha));

$sql = "INSERT INTO usuario (nome, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";
$query = $pdo->prepare($sql);
$query->execute();

echo "<script>window.alert('Usuário cadastrado com sucesso!')
        window.location.href = '../../login.php'</script>";



?>