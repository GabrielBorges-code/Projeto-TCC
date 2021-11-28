<?php
require('../../config/database.php');

$id = "";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
}

$data = "";
if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $data = date('d/m/Y', strtotime($data));
    
}

$resultado_dia = 0;
if (!empty($_POST["resultado-dia"])) {
    $resultado_dia = $_POST["resultado-dia"];
}

$valor_saldo_virtual = 0;
if (!empty($_POST["valor-saldo-virtual"])) {
    $valor_saldo_virtual = $_POST["valor-saldo-virtual"];

}

// var_dump($id);
// var_dump($data);
// var_dump($resultado_dia);
// var_dump($valor_saldo_virtual);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM `lancamento_diario` WHERE id_usuario = '$id' ORDER BY `lancamento_diario`.`id` ASC, `lancamento_diario`.`id_usuario` ASC";
$query = $pdo->prepare($sql);
$query->execute();
$dados_lancamento = $query->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

// var_dump($dados_lancamento);

if (!empty($dados_lancamento)) {
    $saldo_inicial_2 = $dados_lancamento[0]['saldo_inicial'];
    $ultima_posicao_array = (count($dados_lancamento) - 1);

    $ultimo_valor_inserido = $dados_lancamento[$ultima_posicao_array]['saldo_virtual'];
    $valor_saldo_virtual_contabilizado = ($resultado_dia) + $ultimo_valor_inserido;

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_inserir = "INSERT INTO lancamento_diario (id_usuario, data_lancamento, resultado_dia, saldo_virtual, saldo_inicial) VALUES ('$id', '$data', '$resultado_dia', '$valor_saldo_virtual_contabilizado', '$saldo_inicial_2')";
    $query_inserir = $pdo->prepare($sql_inserir);
    $query_inserir->execute();

    Database::disconnect();

} else {
    $valor_saldo_virtual_somado = $valor_saldo_virtual + $resultado_dia;
    
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_inserir = "INSERT INTO lancamento_diario (id_usuario, data_lancamento, resultado_dia, saldo_virtual, saldo_inicial) VALUES ('$id', '$data', '$resultado_dia', '$valor_saldo_virtual_somado', '$valor_saldo_virtual')";
    $query_inserir = $pdo->prepare($sql_inserir);
    $query_inserir->execute();

    Database::disconnect();

}

// echo "<script>window.alert('Lançamento feito com suceso!')
//         window.location.href = '../pages/lancamento_diario'</script>";

header("Location: /projeto-TCC/SINI-TCC/pages/lancamento_diario");
