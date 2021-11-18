<?php
require('../../config/database.php');

include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}

$pagina_padrao->cabecalho();

?>

<main>
    <div class="conteudo">
        <p>Avaliamos o seu perfil, o melhor investimento que combina com você é</p>

    </div>

</main>

<?php
$pagina_padrao->rodape();
?>