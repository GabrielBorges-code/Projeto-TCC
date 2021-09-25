<?php
    require('../../config/database.php');

    session_start();
    if (!$_SESSION['logged_in']) {
        header("Location: ../validacao/logout.php");
        exit;
    }

    // var_dump($_SESSION['logged_in']);
    // echo "Você está logado"
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/dropdown.css">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <title>SINI</title>

</head>

<body>

    <header>
        <div class="menu">
            <a href="index.php"><img class="img-icone" src="../icon/control-panel.png" alt="icone painel de controle"></a>

            <nav>
                <ul>

                    <li>
                        <!-- <a href="cadastro.php"><button type="button" class="btn btn-register">Registre-se</button></a> -->
                        <!-- <p><img src="../icon/user.png" alt=""></p> -->

                        <!-- <a class="botao tp" title="menu dropdown" href="javascript://"><img src="../icon/user.png" alt=""></a> -->
                        <a class="botao tp" href="javascript://"><img src="../icon/user.png" alt=""></a>

                        <ul class="dropDown">
                            <!-- <li><a href="../validacao/logout.php" target="_blank">Sair</a></li> -->
                            <li><a href="../validacao/logout.php">Sair</a></li>
                            <!-- <li><a href="https://github.com" target="_blank">Clique fora</a></li>
                            <li><a href="http://www.youtube.com/" target="_blank">E veja o efeito</a></li>
                            <li><a href="http://www.apple.com/" target="_blank">Lorem ipsum</a></li> -->

                        </ul>
                    </li>

                </ul>

            </nav>

        </div>

    </header>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols"; [{
                        "proName": "FOREXCOM:SPXUSD",
                        "title": "S&P 500"
                    },
                    {
                        "proName": "FOREXCOM:NSXUSD",
                        "title": "Nasdaq 1000"
                    },
                    {
                        "proName": "FX_IDC:EURUSD",
                        "title": "EUR/USD"
                    },
                    {
                        "proName": "BITSTAMP:BTCUSD",
                        "title": "BTC/USD"
                    },
                    {
                        "proName": "BITSTAMP:ETHUSD",
                        "title": "ETH/USD"
                    }
                ],
                "showSymbolLogo"; true,
                "colorTheme"; "light",
                "isTransparent"; false,
                "displayMode"; "adaptive",
                "locale"; "br"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->

    <main>

        <p>Neiva developer Master especialista em metodologia Scrum</p>


        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div id="tradingview_c0b6c"></div>
            <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">Gráfico AAPL</span></a> por TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
                new TradingView.widget({
                    "width": 980,
                    "height": 610,
                    "symbol": "NASDAQ:AAPL",
                    "interval": "D",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "br",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "container_id": "tradingview_c0b6c"
                });
            </script>
        </div>
        <!-- TradingView Widget END -->

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </main>

    <footer>
        <div class="redes-sociais">
            <div class="linkedin">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img class="icone" src="../icon/linkedin.png" alt="Link para o linkedin"></a>

            </div>

            <div class="github">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img class="icone" src="../icon/github.png" alt="Link para o repositorio do projeto"></a>

            </div>
        </div>


        <div class="copy-rigth">
            <br>
            <p>&copy; 2021 Todos os direitos reservados SINI</p>
        </div>

    </footer>


    <script src="scripts/dropdown.js"></script>
</body>

</html>