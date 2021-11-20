<?php
require('../../config/database.php');

$id = "";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$valor_saldo_virtual_somado = $valor_saldo_virtual + $resultado_dia;

$sql_deletar = "DELETE FROM lancamento_diario WHERE id = '$id'";
$query_deletar = $pdo->prepare($sql_deletar);
$query_deletar->execute();

Database::disconnect();

header("Location: /projeto-TCC/SINI-TCC/pages/lancamento_diario.php");