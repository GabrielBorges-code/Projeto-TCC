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

?>

<link rel="stylesheet" href="./styles/perfil.css">

<main class="perfil">
    <div class="info-perfil">
        <img class="img-perfil" src="./icon/user.png">

        <ul class="perfil">

            <hr>
            <form method="POST" action="./validacao/editar_dados_perfil.php?id=<?= $id ?>">
                <li class="perfil"><b class="nome-edicao">Nome:</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='text' name='nome-usuario' value='$nome' id=''>"; ?> </div>
                </li>
                <hr>

                <li class="perfil"><b class="nome-edicao">E-mail:</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='email' name='email' value='$email' id=''>"; ?> </div>
                </li>
                <hr>

                <li class="perfil"><b class="nome-edicao">Telefone:</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='tel' id='telefone' min='1' max='11' placeholder='(61) 9 8888-7777' name='telefone' value='$telefone' id=''>"; ?> </div>
                </li>
                <hr>

                <li class="perfil"><b class="nome-edicao">Tipo de Investidor:</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='text' name='perfil-investidor' disabled='' value='$perfil_investidor' id=''>"; ?> </div>
                </li>
                <hr>

                <br>

                <li class='perfil'>
                    <a href='perfil_editar.php?id=<?= $id ?>'><button type='submit' class='btn-access'>Salvar</button></a>

                    <button type='submit' id="alinhar-direita" class='btn-access' onclick="window.history.go(-1); return false;">Voltar</button>
                </li>

            </form>

        </ul>

    </div>

</main>

<script src="./scripts/mask.js"></script>

<?php
$pagina_padrao->rodape();

?>