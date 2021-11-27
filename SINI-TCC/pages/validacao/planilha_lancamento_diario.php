<?php
require('../../config/database.php');


session_start();
if (!$_SESSION["logged_in"]) {
    header("Location: ../validacao/logout.php");
    exit;
}

$id = $_SESSION["dados_usuario"]["id"];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM `lancamento_diario` WHERE id_usuario = '$id' ORDER BY `lancamento_diario`.`id` ASC, `lancamento_diario`.`id_usuario`";
$query = $pdo->prepare($sql);
$query->execute();
$dados_lancamento = $query->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();


$arquivo = "planilha.xls";

$html = "";
$html .= "<table>";

$html .= "<tr>";
$html .= "<td colspan='3'><b>Relatorio do Lancamento Diario</b></td>";
$html .= "</tr>";

$html .= "<tr>";
$html .= "<td><b>Data</b></td>";
$html .= "<td><b>Lancamento</b></td>";
$html .= "<td><b>Saldo</b></td>";
$html .= "</tr>";

foreach ($dados_lancamento as $row) {

    $html .= "<tr>";

    $html .= "<td>{$row['data_lancamento']}</td>";
    $html .= "<td>R$ {$row['resultado_dia']}</td>";
    $html .= "<td>R$ {$row['saldo_virtual']}</td>";

    $html .= "</tr>";
}

$html .= "</table>";

header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=planilha_com_lancamentos_diarios.xls");

echo $html;
