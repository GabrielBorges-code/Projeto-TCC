<?php
include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

$pagina_padrao->cabecalho();
?>

<main>
    <h1 class="login titulo-principal">Esqueceu a senha?</h1>
    <p class="login">Não seu preocupe, digite o seu e-mail para recuparar</p>

    <form method="POST" action="./email/email_recuperar_senha">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="input-padrao" required placeholder="seuemail@gmail.com">

        <button type="submit" id="esqueci-senha" class="btn-access">Enviar</button>
        <!-- <input type="submit" value="Login" class="enviar"> -->

    </form>

    <br><br><br><br><br><br><br><br><br>

</main>

<?php
$pagina_padrao->rodape();
?>