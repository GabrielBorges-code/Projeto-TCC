<?php

require('../../config/database.php');

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}

$id = $_SESSION["dados_usuario"]["id"];

$idade = "";
if ( !empty($_POST["idade"])) {
    $idade = $_POST["idade"];
}
$renda = "";
if ( !empty($_POST["renda"])) {
    $renda = $_POST["renda"];
}

$experiencia_de_investimentos = "";
if ( !empty($_POST["experiencia-de-investimentos"])) {
    $experiencia_de_investimentos = $_POST["experiencia-de-investimentos"];
}

$frase_descreve_investidor = "";
if ( !empty($_POST["idade"])) {
    $frase_descreve_investidor = $_POST["frase-descreve-investidor"];
}

$oportunidade_retorno = "";
if ( !empty($_POST["oportunidade-retorno"])) {
    $oportunidade_retorno = $_POST["oportunidade-retorno"];
}

$suponha_investimento = "";
if ( !empty($_POST["suponha-investimento"])) {
    $suponha_investimento = $_POST["suponha-investimento"];
}

$investimentos_diminui = "";
if ( !empty($_POST["investimentos-diminui"])) {
    $investimentos_diminui = $_POST["investimentos-diminui"];
}

$finalidade_investimento = "";
if ( !empty($_POST["finalidade-investimento"])) {
    $finalidade_investimento = $_POST["finalidade-investimento"];
}

$recurso_aplicado = "";
if ( !empty($_POST["idade"])) {
    $recurso_aplicado = $_POST["idade"];
}

$resgata_aplicacao = "";
if ( !empty($_POST["resgata-aplicacao"])) {
    $resgata_aplicacao = $_POST["resgata-aplicacao"];
}

$montante_pretende_investir = "";
if ( !empty($_POST["montante-pretende-investir"])) {
    $montante_pretende_investir = $_POST["montante-pretende-investir"];
}

$reservas_financeiras = "";
if ( !empty($_POST["reservas-financeiras"])) {
    $reservas_financeiras = $_POST["reservas-financeiras"];
}

// $idade = $_POST['idade'];
// $renda = $_POST['renda'];
// $experiencia_de_investimentos = $_POST['experiencia-de-investimentos'];
// $frase_descreve_investidor = $_POST['frase-descreve-investidor'];
// $oportunidade_retorno = $_POST['oportunidade-retorno'];
// $suponha_investimento = $_POST['suponha-investimento'];
// $investimentos_diminui = $_POST['investimentos-diminui'];
// $finalidade_investimento = $_POST['finalidade-investimento'];
// $recurso_aplicado = $_POST['recurso-aplicado'];
// $resgata_aplicacao = $_POST['resgata-aplicacao'];
// $montante_pretende_investir = $_POST['montante-pretende-investir'];
// $reservas_financeiras = $_POST['reservas-financeiras'];


if ($idade == null || $renda == null || $experiencia_de_investimentos == null || $frase_descreve_investidor == null || $oportunidade_retorno == null || $suponha_investimento == null || $investimentos_diminui == null || $finalidade_investimento == null || $recurso_aplicado == null || $resgata_aplicacao == null || $montante_pretende_investir == null || $reservas_financeiras == null) {
    // echo "<script>window.alert('Por favor, preencher todos os campos!')</script>";
        echo "<script>window.alert('Por favor, preencher todos os campos!')
            window.location.href = '../pages/questionario_perfil_investidor.php'</script> ";
        exit();
}


$pontos = 0;

// Questão 1
if ($idade == "a") {
    $pontos += 4; 
} else if ($idade == "b") {
    $pontos += 3;

} else if ($idade == "c") {
    $pontos += 2;

} else if ($idade == "d") {
    $pontos += 1;

}

// Questão 2
if ($renda == "a") {
    $pontos += 3; 

} else if ($renda == "b") {
    $pontos += 1;

} else if ($renda == "c") {
    $pontos += 0;

} 

// Questão 3
if ($experiencia_de_investimentos == "a") {
    $pontos += 1; 
    
} else if ($experiencia_de_investimentos == "b") {
    $pontos += 3;

} else if ($experiencia_de_investimentos == "c") {
    $pontos += 5;

} 

// Questão 4
if ($frase_descreve_investidor == "a") {
    $pontos += 1; 
    
} else if ($frase_descreve_investidor == "b") {
    $pontos += 3;

} else if ($frase_descreve_investidor == "c") {
    $pontos += 5;

} else if ($frase_descreve_investidor == "d") {
    $pontos += 8;

} 

// Questão 5
if ($oportunidade_retorno == "a") {
    $pontos += 4; 
    
} else if ($oportunidade_retorno == "b") {
    $pontos += 1;

} else if ($oportunidade_retorno == "c") {
    $pontos += 0;

}

// Questão 6
if ($suponha_investimento == "a") {
    $pontos += 4; 
    
} else if ($suponha_investimento == "b") {
    $pontos += 3;

} else if ($suponha_investimento == "c") {
    $pontos += 2;

} else if ($suponha_investimento == "d") {
    $pontos += 1;

} 

// Questão 7
if ($investimentos_diminui == "a") {
    $pontos += 4; 
    
} else if ($investimentos_diminui == "b") {
    $pontos += 3;

} else if ($investimentos_diminui == "c") {
    $pontos += 2;

} else if ($investimentos_diminui == "d") {
    $pontos += 1;

} 

// Questão 8
if ($finalidade_investimento == "a") {
    $pontos += 1; 
    
} else if ($finalidade_investimento == "b") {
    $pontos += 2;

} else if ($finalidade_investimento == "c") {
    $pontos += 3;

} else if ($finalidade_investimento == "d") {
    $pontos += 4;

} 

// Questão 9
if ($recurso_aplicado == "a") {
    $pontos += 1; 
    
} else if ($recurso_aplicado == "b") {
    $pontos += 3;

} else if ($recurso_aplicado == "c") {
    $pontos += 5;

} else if ($recurso_aplicado == "d") {
    $pontos += 9;

} 

// Questão 10
if ($resgata_aplicacao == "a") {
    $pontos += 4; 
    
} else if ($resgata_aplicacao == "b") {
    $pontos += 2;

} else if ($resgata_aplicacao == "c") {
    $pontos += 1;

} else if ($resgata_aplicacao == "d") {
    $pontos += 0;

} 

// Questão 11
if ($montante_pretende_investir == "a") {
    $pontos += 4; 
    
} else if ($montante_pretende_investir == "b") {
    $pontos += 2;

} else if ($montante_pretende_investir == "c") {
    $pontos += 1;

}

// Questão 12
if ($reservas_financeiras == "Sim") {
    $pontos += 2; 
    
} else if ($reservas_financeiras == "Nao") {
    $pontos += 0;

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


// echo "Meu id: " . $id . "<br>";
// echo "Meus pontos: " . $pontos . "<br>";

// echo $idade . "<br>";
// echo $renda . "<br>";
// echo $experiencia_de_investimentos . "<br>";
// echo $frase_descreve_investidor . "<br>";
// echo $oportunidade_retorno . "<br>";
// echo $suponha_investimento . "<br>";
// echo $investimentos_diminui . "<br>";
// echo $finalidade_investimento . "<br>";
// echo $recurso_aplicado . "<br>";
// echo $resgata_aplicacao . "<br>";
// echo $montante_pretende_investir . "<br>";
// echo $reservas_financeiras . "<br>";

echo "<script>window.alert('Dados enviados para oservidor!')
            window.location.href = '../pages/index.php'</script> ";


?>