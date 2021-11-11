<?php

require('../../config/database.php');

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nome = "";
if (!empty($_POST["nome"])) {
    $nome = $_POST["nome"];
}

$email = "";
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
}

$telefone = "";
if (!empty($_POST["telefone"])) {
    $telefone = $_POST["telefone"];
}

$senha = "";
if (!empty($_POST["senha"])) {
    $senha = $_POST["senha"];
    $senha = md5($senha);
}

$sql_select= "SELECT email FROM USUARIO";
$query_select = $pdo->prepare($sql_select);
$query_select->execute();
$query_emails_cadastrados = $query_select->fetchAll(PDO::FETCH_ASSOC);

// var_dump($query_emails_cadastrados);
for ($i = 0; $i < sizeof($query_emails_cadastrados); $i++){
    if($query_emails_cadastrados[$i]['email'] == $email){
        echo "<script>window.alert('Esse email já está cadastrado!') 
                        window.location.href = '../../login.php'</script>";
        exit;
    }

}

$sql_insert = "INSERT INTO usuario (nome, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";
$query_insert = $pdo->prepare($sql_insert);
$query_insert->execute();

Database::disconnect();

header("Location: ../../email/email_cadastrado.php?email={$email}");

echo "<script>window.alert('Usuário cadastrado com sucesso!')
        window.location.href = '../../login.php'</script>";

?>