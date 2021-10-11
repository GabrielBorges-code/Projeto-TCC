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

$id = $_SESSION["dados_usuario"]["id"];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT questionario_perfil_investidor.*, usuario.nome, usuario.email, usuario.telefone FROM questionario_perfil_investidor INNER JOIN usuario ON usuario.id = questionario_perfil_investidor.id WHERE usuario.id = $id";
$query = $pdo->prepare($sql);
$query->execute();
$login_usuario = $query->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

?>

<main>
    <p>Página de perfil</p>

    <?= var_dump($login_usuario); ?>

</main>

<?php
$pagina_padrao->rodape();

?>