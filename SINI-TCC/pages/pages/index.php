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

?>



<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Tape de Cotações</span></a> por TradingView</div>
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


</main>

<?php
$pagina_padrao->rodape();

?>