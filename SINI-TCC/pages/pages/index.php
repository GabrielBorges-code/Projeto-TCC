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
  <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Tape de Cotações</span></a> por TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "",
      "proName": "FX_IDC:EURBRL"
    },
    {
      "description": "",
      "proName": "FX_IDC:USDBRL"
    },
    {
      "description": "",
      "proName": "MERCADO:BTCBRL"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "br"
}
  </script>
</div>
<!-- TradingView Widget END -->

<main>

    <div class="botoes">
        <a href="questionario_perfil_investidor.php"><button type="button" class="btn-perfil">Quetionario Perfil do Investidor</button></a>
        <a href="simular_lucro.php"><button type="button" class="btn-perfil">Simular Lucro</button></a>
        <a href="lancamento_diario.php"><button type="button" class="btn-perfil">Lançamentos Diários/Controle diário</button></a>
        <a href="#"><button type="button" class="btn-perfil">Gerar Relatório</button></a>

    </div>

    <br><br><br>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container tela-pequena">
        <div id="tradingview_a9071"></div>
        <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/BRLUSD/?exchange=FX_IDC" rel="noopener" target="_blank"><span class="blue-text">Gráfico BRLUSD</span></a> por TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 375,
                "height": 610,
                "symbol": "FX_IDC:BRLUSD",
                "interval": "D",
                "timezone": "America/Sao_Paulo",
                "theme": "light",
                "style": "1",
                "locale": "br",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "container_id": "tradingview_a9071"
            });
        </script>
    </div>
    <!-- TradingView Widget END -->

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container tela-grande">
        <div id="tradingview_dd0ec"></div>
        <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/BRLUSD/?exchange=FX_IDC" rel="noopener" target="_blank"><span class="blue-text">Gráfico BRLUSD</span></a> por TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 910,
                "height": 610,
                "symbol": "FX_IDC:BRLUSD",
                "interval": "D",
                "timezone": "America/Sao_Paulo",
                "theme": "light",
                "style": "1",
                "locale": "br",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "container_id": "tradingview_dd0ec"
            });
        </script>
    </div>
    <!-- TradingView Widget END -->

</main>

<?php
$pagina_padrao->rodape();

?>