<?php
include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

$email = "";
if ( !empty($_GET["email"])) {
    $email = $_GET["email"];
}

// var_dump($email);

$pagina_padrao->cabecalho();
?>

<link rel="stylesheet" href="../style/login.css">

<main>
    <h1 class="login titulo-principal">Esqueceu a senha?</h1>
    <p class="login">Digite a sua nova senha</p>

    <form method="POST" action="./pages/validacao/recuperar_senha.php?email=<?= $email ?>">
        <label for="password">Digite a senha</label>
        <input type="password" name="senha" id="password" class="input-padrao" required placeholder="********">

        <button type="submit" id="esqueci-senha" class="btn-access">Enviar</button>

    </form>


    <br><br><br><br><br><br><br><br><br>

</main>

<?php
$pagina_padrao->rodape();
?>