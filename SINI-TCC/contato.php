<?php
include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

$pagina_padrao->cabecalho();
?>

<main>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <div class="contatc">

        <div class="texto-contato">
            <h1 class="formulario titulo-formulario">Problemas e/ou dúvidas sobre o sistema?</h1>
            <p class="formulario subtitulo">Entre em contato!</p>
            
        </div>

        <form class="form-contact" method="POST" action="./pages/validacao/mensagem_contato">

            <label for="nomesobrenome">Nome e Sobrenome</label>
            <input type="text" name="nome" id="nomesobrenome" class="input-padrao" required placeholder="Gabriel Borges de Moura">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="input-padrao" required placeholder="seuemail@gmail.com">

            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" class="input-padrao" required placeholder="(61) 9 8888-7777">

            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" cols="70" rows="10" class="input-padrao" maxlength="500" required></textarea>
            <span class="caracteres">500</span> Restantes <br><br>

            <button type="submit" class="btn-enviar">Enviar</button>

        </form>

        <img class="img-contact" src="./pages/icon/contact.png" alt="imagem para representar o contato">

    </div>

</main>

<script src="./scripts/contato.js"></script>

<?php
$pagina_padrao->rodape();
?>