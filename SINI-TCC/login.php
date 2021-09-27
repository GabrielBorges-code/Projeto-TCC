<?php
include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

$pagina_padrao->cabecalho();
?>

<main>
    <h1 class="login titulo-principal">Já tem cadastro?</h1>
    <p class="login">Faça Login e aproveite a plataforma</p>

    <form method="POST" action="./pages/validacao/login.php">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="input-padrao" required placeholder="seuemail@gmail.com">

        <label for="password-2">Digite sua senha</label>
        <input type="password" name="senha" id="password-2" class="input-padrao" required placeholder="********">

        <a href="esqueci_a_senha.php">Esqueci minha Senha</a>

        <button type="submit" class="btn-access">Entrar</button>
        <!-- <input type="submit" value="Login" class="enviar"> -->
        
    </form>
    
    <br>
    <br>
    <br>
    <br>

</main>

<?php
$pagina_padrao->rodape();
?>