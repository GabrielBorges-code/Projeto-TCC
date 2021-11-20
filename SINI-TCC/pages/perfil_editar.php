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

$sql = "SELECT questionario_perfil_investidor.*, usuario.nome, usuario.email, usuario.telefone FROM questionario_perfil_investidor INNER JOIN usuario ON usuario.id = questionario_perfil_investidor.id WHERE usuario.id = $id";
$query = $pdo->prepare($sql);
$query->execute();
$login_usuario = $query->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

$nome = $login_usuario[0]['nome'];
$email = $login_usuario[0]['email'];
$telefone = $login_usuario[0]['telefone'];
$tipo_de_investidor = $login_usuario[0]['tipo_de_investidor'];

?>

<link rel="stylesheet" href="./styles/perfil.css">

<main class="perfil">
    <div class="info-perfil">
        <img class="img-perfil" src="./icon/user.png">

        <ul class="perfil">

            <hr>
            <form method="POST" action="./validacao/editar_dados_perfil.php?id=<?= $id ?>">
                <li class="perfil"><b class="nome-edicao">Nome</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='text' name='nome-usuario' value='$nome' id=''>"; ?> </div>
                </li>
                <hr>

                <li class="perfil"><b class="nome-edicao">E-mail</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='email' name='email' value='$email' id=''>"; ?> </div>
                </li>
                <hr>

                <li class="perfil"><b class="nome-edicao">Telefone</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='tel' id='telefone' min='1' max='11' placeholder='(61) 9 8888-7777' name='telefone' value='$telefone' id=''>"; ?> </div>
                </li>
                <hr>

                <li class="perfil"><b class="nome-edicao">Tipo de Investidor</b>
                    <div class="input-edicao"> <?php echo "<input class='input-padrao' type='text' name='perfil-investidor' disabled='' value='$tipo_de_investidor' id=''>"; ?> </div>
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