<?php

require('../../config/database.php');

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}

$id = $_SESSION["dados_usuario"]["id"];

$renda = "";
if (!empty($_POST["renda"])) {
    $renda = $_POST["renda"];
}

$investe = "";
if (!empty($_POST["investe"])) {
    $investe = $_POST["investe"];
}

$reacao_perda = "";
if (!empty($_POST["reacao-perda"])) {
    $reacao_perda = $_POST["reacao-perda"];
}

$suprir_gastos = "";
if (!empty($_POST["suprir-gastos"])) {
    $suprir_gastos = $_POST["suprir-gastos"];
}

$porcentos_sobra = "";
if (!empty($_POST["porcentos-sobra"])) {
    $porcentos_sobra = $_POST["porcentos-sobra"];
}

$controla_dividas = "";
if (!empty($_POST["controla-dividas"])) {
    $controla_dividas = $_POST["controla-dividas"];
}

$acompanha_investimentos = "";
if (!empty($_POST["acompanha-investimentos"])) {
    $acompanha_investimentos = $_POST["acompanha-investimentos"];
}

$investiria_algo_subindo = "";
if (!empty($_POST["investiria-algo-subindo"])) {
    $investiria_algo_subindo = $_POST["investiria-algo-subindo"];
}

$investimentos_pensa = "";
if (!empty($_POST["investimentos-pensa"])) {
    $investimentos_pensa = $_POST["investimentos-pensa"];
}

$planos_para_investimentos = "";
if (!empty($_POST["planos-para-investimentos"])) {
    $planos_para_investimentos = $_POST["planos-para-investimentos"];
}


if ($renda == null || $investe == null || $reacao_perda == null || $suprir_gastos == null || $porcentos_sobra == null || $controla_dividas == null || $acompanha_investimentos == null || $investiria_algo_subindo == null || $investimentos_pensa == null || $planos_para_investimentos == null) {
    // echo "<script>window.alert('Por favor, preencher todos os campos!')</script>";
    echo "<script>window.alert('Por favor, preencher todos os campos!')
        window.location.href = '../pages/questionario_perfil_investidor.php'</script> ";
    exit();
}

// $renda;
// $investe;
// $reacao_perda;
// $suprir_gastos;
// $porcentos_sobra;
// $controla_dividas;
// $acompanha_investimentos;
// $investiria_algo_subindo;
// $investimentos_pensa;
// $planos_para_investimentos;

$pontos = 0;

// Questão 1
if ($renda == "a") {
    $pontos += 4; 

} else if ($renda == "b") {
    $pontos += 3;

} else if ($renda == "c") {
    $pontos += 2;

}

// Questão 2
if ($investe == "a") {
    $pontos += 3; 

} else if ($investe == "b") {
    $pontos += 1;

} else if ($investe == "c") {
    $pontos += 0;

} 

// Questão 3
if ($reacao_perda == "a") {
    $pontos += 1; 
    
} else if ($reacao_perda == "b") {
    $pontos += 3;

} else if ($reacao_perda == "c") {
    $pontos += 5;

} 

// Questão 4
if ($suprir_gastos == "a") {
    $pontos += 1; 
    
} else if ($suprir_gastos == "b") {
    $pontos += 3;

} else if ($suprir_gastos == "c") {
    $pontos += 5;

}

// Questão 5
if ($porcentos_sobra == "a") {
    $pontos += 4; 
    
} else if ($porcentos_sobra == "b") {
    $pontos += 1;

} else if ($porcentos_sobra == "c") {
    $pontos += 0;

}

// Questão 6
if ($controla_dividas == "a") {
    $pontos += 4; 
    
} else if ($controla_dividas == "b") {
    $pontos += 3;

} else if ($controla_dividas == "c") {
    $pontos += 2;

} 

// Questão 7
if ($acompanha_investimentos == "a") {
    $pontos += 4; 
    
} else if ($acompanha_investimentos == "b") {
    $pontos += 3;

} else if ($acompanha_investimentos == "c") {
    $pontos += 2;

} 

// Questão 8
if ($investiria_algo_subindo == "a") {
    $pontos += 1; 
    
} else if ($investiria_algo_subindo == "b") {
    $pontos += 2;

} else if ($investiria_algo_subindo == "c") {
    $pontos += 3;

}

// Questão 9
if ($investimentos_pensa == "a") {
    $pontos += 1; 
    
} else if ($investimentos_pensa == "b") {
    $pontos += 3;

} else if ($investimentos_pensa == "c") {
    $pontos += 5;

}

// Questão 10
if ($planos_para_investimentos == "a") {
    $pontos += 4; 
    
} else if ($planos_para_investimentos == "b") {
    $pontos += 2;

} else if ($planos_para_investimentos == "c") {
    $pontos += 1;

}


//Perfil do inestidor;
$tipo_de_investidor = "";
if ($pontos >= 8 AND $pontos <= 24) {
    $tipo_de_investidor = "Defensivo";

} else if ($pontos >= 25 AND $pontos <= 34) {
    $tipo_de_investidor = "Conservador";

} else if ($pontos >= 35 AND $pontos <= 46) {
    $tipo_de_investidor = "Moderado";

}else if ($pontos >= 47 AND  $pontos <= 55) {
    $tipo_de_investidor = "Agressivo";

}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_insert = "INSERT INTO questionario_perfil_investidor (id, pontos, tipo_de_investidor) VALUES ($id, '$pontos', '$tipo_de_investidor')";
$query_insert = $pdo->prepare($sql_insert);
$query_insert->execute();

Database::disconnect();

echo "<script>window.alert('Dados enviados para oservidor!')
            window.location.href = '../pages/index.php'</script> ";

?>