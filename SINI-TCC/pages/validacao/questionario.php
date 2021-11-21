<?php

require('../../config/database.php');

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}

$id = $_SESSION["dados_usuario"]["id"];

$idade_usuario = "";
if (!empty($_POST["idade-usuario"])) {
    $idade_usuario = $_POST["idade-usuario"];
}

$dependentes = "";
if (!empty($_POST["dependentes"])) {
    $dependentes = $_POST["dependentes"];
}

$porcento_renda_investiria = "";
if (!empty($_POST["porcento-renda-investiria"])) {
    $porcento_renda_investiria = $_POST["porcento-renda-investiria"];
}

$voce_investe_seu_dinheiro = "";
if (!empty($_POST["voce-investe-seu-dinheiro"])) {
    $voce_investe_seu_dinheiro = $_POST["voce-investe-seu-dinheiro"];
}

$perdendo_investimento = "";
if (!empty($_POST["perdendo-investimento"])) {
    $perdendo_investimento = $_POST["perdendo-investimento"];
}

$tempo_manter_investimento = "";
if (!empty($_POST["tempo-manter-investimento"])) {
    $tempo_manter_investimento = $_POST["tempo-manter-investimento"];
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


if ($idade_usuario == null || $dependentes == null || $porcento_renda_investiria == null || $voce_investe_seu_dinheiro == null || $perdendo_investimento == null || $tempo_manter_investimento == null || $acompanha_investimentos == null || $investiria_algo_subindo == null || $investimentos_pensa == null || $planos_para_investimentos == null) {
    // echo "<script>window.alert('Por favor, preencher todos os campos!')</script>";
    echo "<script>window.alert('Por favor, preencher todos os campos!')
                                history.go(-1)</script> ";
    exit();
}

// echo $idade_usuario;
// echo $dependentes;
// echo $porcento_renda_investiria;
// echo $voce_investe_seu_dinheiro;
// echo $perdendo_investimento;
// echo $tempo_manter_investimento;
// echo $acompanha_investimentos;
// echo $investiria_algo_subindo;
// echo $investimentos_pensa;
// echo $planos_para_investimentos;

$pontos = 0;

// Questão 1
if ($idade_usuario == "a") {
    $pontos += 5; 

} else if ($idade_usuario == "b") {
    $pontos += 3;

} else if ($idade_usuario == "c") {
    $pontos += 1;

}

// Questão 2
if ($dependentes == "a") {
    $pontos += 5; 

} else if ($dependentes == "b") {
    $pontos += 3;

} else if ($dependentes == "c") {
    $pontos += 1;

} 

// Questão 3
if ($porcento_renda_investiria == "a") {
    $pontos += 1; 
    
} else if ($porcento_renda_investiria == "b") {
    $pontos += 3;

} else if ($porcento_renda_investiria == "c") {
    $pontos += 5;

} 

// Questão 4
if ($voce_investe_seu_dinheiro == "a") {
    $pontos += 1; 
    
} else if ($voce_investe_seu_dinheiro == "b") {
    $pontos += 3;

} else if ($voce_investe_seu_dinheiro == "c") {
    $pontos += 5;

}

// Questão 5
if ($perdendo_investimento == "a") {
    $pontos += 1; 
    
} else if ($perdendo_investimento == "b") {
    $pontos += 3;

} else if ($perdendo_investimento == "c") {
    $pontos += 5;

}

// Questão 6
if ($tempo_manter_investimento == "a") {
    $pontos += 5; 
    
} else if ($tempo_manter_investimento == "b") {
    $pontos += 3;

} else if ($tempo_manter_investimento == "c") {
    $pontos += 1;

} 

// Questão 7
if ($acompanha_investimentos == "a") {
    $pontos += 1; 
    
} else if ($acompanha_investimentos == "b") {
    $pontos += 3;

} else if ($acompanha_investimentos == "c") {
    $pontos += 5;

} 

// Questão 8
if ($investiria_algo_subindo == "a") {
    $pontos += 1; 
    
} else if ($investiria_algo_subindo == "b") {
    $pontos += 3;

} else if ($investiria_algo_subindo == "c") {
    $pontos += 5;

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
    $pontos += 1; 
    
} else if ($planos_para_investimentos == "b") {
    $pontos += 3;

} else if ($planos_para_investimentos == "c") {
    $pontos += 5;

}

//Balanceamento
$tipo_de_investidor = "";
if ($pontos >= 10 AND $pontos <= 24) {
    $tipo_de_investidor = "Conservador";

} else if ($pontos >= 25 AND $pontos <= 39) {
    $tipo_de_investidor = "Moderado";

} else if ($pontos >= 40 AND $pontos <= 50) {
    $tipo_de_investidor = "Agressivo";

}

// echo "Pontos somados " . $pontos;

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_insert = "INSERT INTO questionario_perfil_investidor (id, pontos, tipo_de_investidor) VALUES ($id, '$pontos', '$tipo_de_investidor')";
$query_insert = $pdo->prepare($sql_insert);
$query_insert->execute();

Database::disconnect();

echo "<script>window.alert('Perfil Avaliado Com Sucesso!')
            window.location.href = '../investimentos_recomendados.php'</script> ";

