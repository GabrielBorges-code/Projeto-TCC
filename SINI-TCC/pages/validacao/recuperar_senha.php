<?php
require('../../config/database.php');

$email = "";
if ( !empty($_GET["email"])) {
    $email = $_GET["email"];
}

$senha = "";
if ( !empty($_POST["senha"])) {
    $senha = $_POST["senha"];
    $senha = md5($senha);
}

// var_dump($email);
// var_dump($senha);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_insert = "UPDATE usuario SET senha = '{$senha}' WHERE email = '{$email}'";
$query_insert = $pdo->prepare($sql_insert);
$query_insert->execute();

Database::disconnect();

echo "<script>window.alert('Senha alterada com sucesso!')
        window.location.href = '../../login.php'</script>";
// echo "Senha alterada com sucesso";


?>