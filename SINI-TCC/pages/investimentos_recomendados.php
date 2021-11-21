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

?>
<link rel="stylesheet" href="./styles/investimentos_recomendados.css">

<main>
    <div class="conteudo">
        <h1>Sugestão de investimentos</h1>
        <p>Avaliamos o seu perfil, o melhor investimento que combina com você é</p>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    </div>

</main>

<?php
$pagina_padrao->rodape();
?>