<?php
require('../../config/database.php');

include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}

$pagina_padrao->cabecalho();

// $id = $_SESSION["dados_usuario"]["id"];
// var_dump($id);

?>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
            // "symbols": [{
            //         "proName": "FOREXCOM:SPXUSD",
            //         "title": "S&P 500"
            //     },
            //     {
            //         "proName": "FOREXCOM:NSXUSD",
            //         "title": "Nasdaq 1000"
            //     },
            //     {
            //         "proName": "FX_IDC:EURUSD",
            //         "title": "EUR/USD"
            //     },
            //     {
            //         "proName": "BITSTAMP:BTCUSD",
            //         "title": "BTC/USD"
            //     },
            //     {
            //         "proName": "BITSTAMP:ETHUSD",
            //         "title": "ETH/USD"
            //     }
            // ],
            // "showSymbolLogo": true,
            // "colorTheme": "dark",
            // "isTransparent": false,
            // "displayMode": "adaptive",
            // "locale": "br"
        }
    </script>
</div>
<!-- TradingView Widget END -->

<main>

    <div class="botoes">
        <a href="questionario_perfil_investidor.php"><button type="button" class="btn-perfil">Quetionario Perfil do Investidor</button></a>
        <a href="#"><button type="button" class="btn-perfil">Simular Gerenciamento</button></a>
        <a href="#"><button type="button" class="btn-perfil">Lançamento Diários</button></a>
        <a href="#"><button type="button" class="btn-perfil">Gerar Relatório</button></a>

    </div>

    <br>
    <br>
    <br>

    <!-- <p>Neiva developer Master especialista em Guia PMBoK</p> -->

    <br>
    <br>
    <br>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container tela-pequena">
        <div id="tradingview_7b017"></div>
        <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">Gráfico AAPL</span></a> por TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 375,
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
                "container_id": "tradingview_7b017"
            });
        </script>
    </div>
    <!-- TradingView Widget END -->

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container tela-grande">
        <div id="tradingview_27392"></div>
        <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">Gráfico AAPL</span></a> por TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 910,
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
                "container_id": "tradingview_27392"
            });
        </script>
    </div>
    <!-- TradingView Widget END -->

    <br>
    <br>
    <br>
    <br>
    <br>


</main>

<?php
$pagina_padrao->rodape();

?>