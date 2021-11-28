<?php

require('../../config/database.php');

$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = md5($senha);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT COUNT(nome) FROM usuario WHERE email = '$email' AND senha = '$senha'";
$query = $pdo->prepare($sql);
$query->execute();
$login_usuario = $query->fetch(PDO::FETCH_ASSOC);

$sql_2 = "SELECT id, nome, email FROM usuario WHERE email = '$email' AND senha = '$senha'";
$query_2 = $pdo->prepare($sql_2);
$query_2->execute();
$dados_usuario = $query_2->fetch(PDO::FETCH_ASSOC);

Database::disconnect();

if($login_usuario['COUNT(nome)'] == 1){
    session_start();
    $_SESSION["logged_in"] = true; 
    $_SESSION["dados_usuario"] = $dados_usuario; 
	header("Location: ../index");
	exit();

} else {
    echo "<script>window.alert('Usuário ou senha incorreto!')
        history.go(-1)</script>";
    $_SESSION['logged_in'] = false;
    $_SESSION["dados_usuario"] = null; 
    exit();

}



