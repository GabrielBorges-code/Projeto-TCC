<?php
class PaginaPadrao {
    function cabecalho () {
        echo '
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="./pages/style/reset.css">
            <link rel="stylesheet" href="./pages/style/padrao.css">
            <link rel="stylesheet" href="./pages/style/sobre.css">
            <link rel="stylesheet" href="./pages/style/contato.css">
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
        ';
    }

    function rodape () {
        echo '
            <footer>
                <div class="redes-sociais">
                    <div class="linkedin">
                        <a href="https://linkedin.com/" target="_blank" rel="noopener noreferrer"><img class="icone" src="./pages/icon/linkedin.png"
                                alt="Link para o linkedin"></a>

                    </div>

                    <div class="github">
                        <a href="https://github.com/GabrielBorges-code/Projeto-TCC" target="_blank" rel="noopener noreferrer"><img class="icone" src="./pages/icon/github.png"
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
        ';
    }
}

?>