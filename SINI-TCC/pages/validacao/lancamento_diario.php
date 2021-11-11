<?php
require('../../config/database.php');

$id = "";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
}

$data = "";
if (!empty($_POST["data"])) {
    $data = $_POST["data"];
}

$resultado_dia = 0;
if (!empty($_POST["resultado-dia"])) {
    $resultado_dia = $_POST["resultado-dia"];
}

$saldo_inicial;
$valor_saldo_virtual = 0;
if (!empty($_POST["valor-saldo-virtual"])) {
    $valor_saldo_virtual = $_POST["valor-saldo-virtual"];
    
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_consulta = "SELECT * FROM lancamento_diario WHERE id_usuario = $id";
    $query_consulta = $pdo->prepare($sql_consulta);
    $query_consulta->execute();
    $dados_usuario = $query_consulta->fetchAll(PDO::FETCH_ASSOC);
    
    Database::disconnect();

    // var_dump($dados_usuario);

    if (empty($dados_usuario)) {
        $saldo_inicial = $valor_saldo_virtual;
        $valor_saldo_virtual += $resultado_dia;

        echo $saldo_inicial . "<br>";
        echo $resultado_dia . "<br>";
        echo $valor_saldo_virtual . "<br>";

    } else {
        var_dump($dados_usuario);
        // $valor_saldo_virtual += $resultado_dia;
        
        $saldo_virtual_banco = $dados_usuario[0]["saldo_virtual"];

        $valor_saldo_virtual = $resultado_dia + $saldo_virtual_banco;

        echo $saldo_virtual_banco . "<br>";
        echo $resultado_dia . "<br>";
        echo $valor_saldo_virtual . "<br>";

    }

}

// $saldo_inicial = 0;
// if (!empty($_POST["valor-saldo-virtual"])) {
//     $saldo_inicial = $_POST["valor-saldo-virtual"];

// }

// echo $id . "<br>";
// echo $data . "<br>";
// echo "Resultado do dia " . $resultado_dia . "<br>";
// echo "Valor saldo virtual " . $valor_saldo_virtual . "<br>";
// echo "Valor saldo inicial " . $saldo_inicial . "<br>";

// $valor_saldo_virtual += $resultado_dia;

// echo "total " . $valor_saldo_virtual; 

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_insert = "INSERT INTO lancamento_diario (id_usuario, data_lancamento, resultado_dia, saldo_virtual, saldo_inicial) VALUES ('$id', '$data', '$resultado_dia', '$valor_saldo_virtual', '$saldo_inicial')";
$query_insert = $pdo->prepare($sql_insert);
$query_insert->execute();

Database::disconnect();

// echo "<script>window.alert('Lançamento feito com suceso!')
//         window.location.href = '../pages/lancamento_diario.php'</script>";

// header("Location: /projeto-TCC/SINI-TCC/pages/pages/lancamento_diario.php");
