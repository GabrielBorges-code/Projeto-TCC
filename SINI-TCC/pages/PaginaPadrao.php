<?php

class PaginaPadrao {

    // <link rel="stylesheet" href="./styles/perfil.css">
    
    function cabecalho(){
        echo'
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="../style/reset.css">
            <link rel="stylesheet" href="../style/padrao.css">

            <link rel="stylesheet" href="./styles/index.css">
            <link rel="stylesheet" href="./styles/dropdown.css">
            <link rel="stylesheet" href="./styles/questionario.css">
           
            
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="../lib/vendor/igorescobar/jquery-mask-plugin/src/jquery.mask.js"></script>

            <title>SINI</title>

        </head>

        <body>

            <header>
                <div class="menu">
                    <a href="index.php"><img class="img-icone" src="./icon/control-panel.png" alt="icone painel de controle"></a>

                    <nav>
                        <ul>

                            <li>
                                <a class="botao tp" href="javascript://"><img src="./icon/user.png" alt=""></a>

                                <ul class="dropDown">
                                    <li><a href="perfil.php">Meu Perfil</a></li>
                                    <li><a href="mensagens.php">Mensagens</a></li>
                                    <li><a href="./validacao/logout.php">Sair</a></li>

                                </ul>
                            </li>

                        </ul>

                    </nav>

                </div>

            </header>
        ';
    }
      
    function rodape(){
        echo '
        <footer>
            <div class="redes-sociais">
                <div class="github linkedin">
                    <a href="https://github.com/GabrielBorges-code/Projeto-TCC" target="_blank" rel="noopener noreferrer"><img class="icone" src="./icon/github.png" alt="Link para o repositorio do projeto"></a>

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


        <script src="./scripts/dropdown.js"></script>
    </body>

    </html>
        ';
    
    }
    
}

?>