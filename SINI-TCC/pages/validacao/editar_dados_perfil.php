<?php
require('../../config/database.php');

$id = "";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
}

$nome = "";
if (!empty($_POST["nome-usuario"])) {
    $nome = $_POST["nome-usuario"];    
}

$email = "";
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
}

$telefone = 0;
if (!empty($_POST["telefone"])) {
    $telefone = $_POST["telefone"];

}

$perfil_investidor = "";
if (!empty($_POST["perfil-investidorone"])) {
    $perfil_investidor = $_POST["perfil-investidorone"];

}

// var_dump($id);
// var_dump($nome);
// var_dump($email);
// var_dump($telefone);
// var_dump($perfil_investidor);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE `usuario` SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = $id ";
$query = $pdo->prepare($sql);
$query->execute();

Database::disconnect();

echo "<script>window.alert('Dados atualizados com suceso!')
        window.location.href = '../perfil.php'</script>";

