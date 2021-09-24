<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./pages/style/reset.css">
    <link rel="stylesheet" href="./pages/style/style.css">
    <link rel="stylesheet" href="./pages/style/login.css">

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
        <h1 class="login titulo-principal">Já tem cadastro?</h1>
        <p class="login">Faça Login e aproveite a plataforma</p>

        <form method="POST" action="./pages/validacao/login.php">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="input-padrao" required placeholder="seuemail@gmail.com">

            <label for="password-2">Digite sua senha</label>
            <input type="password" name="senha" id="password-2" class="input-padrao" required placeholder="********">

            <a href="forgot-pass.php">Esqueci minha Senha</a>

            <button type="submit" class="btn-access">Entrar</button>
            <!-- <input type="submit" value="Login" class="enviar"> -->

        </form>
        
        <br>
        <br>
        <br>

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

</html>