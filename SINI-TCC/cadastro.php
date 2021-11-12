<?php
include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

$pagina_padrao->cabecalho();
?>

<main>
    <h1 class="login titulo-principal">Não tem cadastro em nossa plataforma?</h1>
    <p class="login">Faça o cadastro, e venha aprender conosco! 😉</p>

    <form method="POST" action="./pages/validacao/cadastrar_novo_usuario.php">
        <label for="nomesobrenome">Nome e Sobrenome</label>
        <input type="text" name="nome" id="nomesobrenome" class="input-padrao" required placeholder="Gabriel Borges de Moura">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="input-padrao" required placeholder="seuemail@gmail.com">

        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" class="input-padrao" min="1" max="11" required placeholder="(61)98888-7777">

        <label for="password">Senha</label>
        <input type="password" name="senha" id="password" class="input-padrao" required placeholder="********">

        <!-- <label for="password-2">Repita sua senha</label>
            <input type="password" name="senha" id="password-2" class="input-padrao" required placeholder="********"> -->

        <label class="checkbox"><input type="checkbox" required>Li e aceito os termos de uso</label>

        <button type="submit" class="btn-enviar">Enviar</button>

    </form>

</main>



<?php
$pagina_padrao->rodape();
?>
