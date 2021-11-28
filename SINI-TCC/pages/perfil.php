<?php
require('../config/database.php');

include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}

$pagina_padrao->cabecalho();

$id = $_SESSION["dados_usuario"]["id"];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_questionario = "SELECT * FROM questionario_perfil_investidor WHERE id = $id";
$query_questionario = $pdo->prepare($sql_questionario);
$query_questionario->execute();
$dados_usuario_questionario = $query_questionario->fetchAll(PDO::FETCH_ASSOC);

// var_dump($dados_usuario_questionario);

$sql_usuario = "SELECT * FROM usuario WHERE id = $id";
$query_usuario = $pdo->prepare($sql_usuario);
$query_usuario->execute();
$dados_usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);

// var_dump($dados_usuario);

Database::disconnect();

$nome = $dados_usuario[0]['nome'];
$email = $dados_usuario[0]['email'];
$telefone = $dados_usuario[0]['telefone'];

if (!empty($dados_usuario_questionario[0]['tipo_de_investidor'])) {
    $perfil_investidor = $dados_usuario_questionario[0]['tipo_de_investidor'];
} else {
    $perfil_investidor = "Questionário ainda não respondido";
}

$imagem_perfil = "./img_perfil/{$id}/";

if (!is_dir($imagem_perfil)) {
    $caminho_ft_perfil = "./icon/user.png";
} else {
    $diretorio = "./img_perfil/{$id}/";
    $arquivo = scandir($diretorio, 0);

    for ($i = 2; $i < count($arquivo); $i++) {
        $caminho_ft_perfil =  $diretorio . $arquivo[$i];
        
    }
}

?>
<link rel="stylesheet" href="./styles/perfil.css">

<main class="perfil">
    <div class="info-perfil">
        <img class="img-perfil" src="<?= $caminho_ft_perfil ?>" alt="imagem de perfil do usuário">

        <ul class="perfil">

            <hr>

            <li class="perfil"><b>Nome:</b>
                <div class="alinha-direita"> <?= $nome ?> </div>
            </li>
            <hr>

            <li class="perfil"><b>E-mail:</b>
                <div class="alinha-direita"> <?= $email ?> </div>
            </li>
            <hr>

            <li class="perfil"><b>Telefone:</b>
                <div class="alinha-direita"> <?= $telefone ?> </div>
            </li>
            <hr>

            <li class="perfil"><b>Tipo de Investidor:</b>
                <div class="alinha-direita"> <?= $perfil_investidor ?> </div>
            </li>
            <hr>

            <br>

            <button type='button' onclick="window.location='perfil_edicao?id=<?= $id ?>'" class='btn-access'>Editar Perfil</button>

        </ul>

    </div>

</main>

<?php
$pagina_padrao->rodape();

?>