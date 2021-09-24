<!DOCTYPE php>
<php lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./pages/style/reset.css">
    <link rel="stylesheet" href="./pages/style/style.css">
    <link rel="stylesheet" href="./pages/style/contact.css">

    <title>SINI</title>

</head>

<body>

    <header>
        <div class="menu">
            <a href="index.php"><img class="img-icone" src="./pages/icon/control-panel.png" alt="icone painel de controle"></a>

            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="contato.php">Contato</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li>
                        <a href="login.php"><button type="button" class="btn btn-login">Login</button></a>

                    </li>

                    <li>
                        <a href="cadastro.php"><button type="button" class="btn btn-register">Registre-se</button></a>
                    </li>

                </ul>

            </nav>
        </div>
    </header>

    <main>
        <div class="contatc">

            <h1 class="formulario titulo-formulario">Problemas e/ou dúvidas sobre o sistema?</h1>
            <p class="formulario subtitulo">Entre em contato!</p>

            <form class="form-contact" method="POST" action="./pages/validacao/mensagem_contato.php">

                <label for="nomesobrenome">Nome e Sobrenome</label>
                <input type="text" name="nome" id="nomesobrenome" class="input-padrao" required
                    placeholder="Gabriel Borges de Moura">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="input-padrao" required placeholder="seuemail@gmail.com">

                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="input-padrao" required placeholder="(61)98888-7777">

                <label for="mensagem">Mensagem</label>
                <textarea name="mensagem" id="mensagem" cols="70" rows="10" class="input-padrao" required></textarea>

                <button type="submit" class="btn-enviar">Enviar</button>

            </form>

            <img class="img-contact" src="./pages/icon/contact.png" alt="imagem para representar o contato">

        </div>

    </main>


    <footer>
        <div class="redes-sociais">
            <div class="linkedin">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img class="icone" src="./pages/icon/linkedin.png"
                        alt="Link para o linkedin"></a>

            </div>

            <div class="github">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img class="icone" src="./pages/icon/github.png"
                        alt="Link para o repositorio do projeto"></a>

            </div>
            <div class="texto">
                <p>Todas as informações apresentadas tem caráter informativo e são provenientes de fontes públicas como B3, CVM, TESOURO NACIONAL, etc. e de dados calculados a partir das informações coletadas. O StatusInvest não tem o objetivo de fazer sugestão de compra ou venda de ativos, sendo assim, não se responsabiliza pelas decisões e caminhos tomados a partir da análise das informações aqui apresentadas.</p>
            </div>
        </div>



        <div class="copy-rigth">
            <br>
            <p>&copy; 2021 Todos os direitos reservados SINI</p>
        </div>

    </footer>


</body>

</php>