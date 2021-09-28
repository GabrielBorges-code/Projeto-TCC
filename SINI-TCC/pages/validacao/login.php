<?php

require('../../config/database.php');

$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = md5($senha);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT COUNT(nome) FROM usuario WHERE email = '$email' AND senha = '$senha'";
// $sql = "SELECT * FROM usuario";
$query = $pdo->prepare($sql);
$query->execute();
$login_usuario = $query->fetch(PDO::FETCH_ASSOC);

Database::disconnect();

// var_dump($login_usuario['COUNT(nome)']);

if($login_usuario['COUNT(nome)'] == 1){
    //echo "chegou no login";
    session_start();
    $_SESSION["logged_in"] = true;
	header("Location: ../pages/index.php");
	exit();

} else {
    //echo "não chegou no login";
    echo "<script>window.alert('Usuário ou senha incorreto!')
    window.location.href = '../../login.php'</script>";
    $_SESSION['logged_in'] = false;
	// header('Location: ../../cadastro.php');
    exit();

}

?>

