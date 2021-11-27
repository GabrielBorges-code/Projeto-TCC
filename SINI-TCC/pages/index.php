<?php
require('../config/database.php');

include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

session_start();
if (!$_SESSION['logged_in']) {
  header("Location: ../validacao/logout.php");
  exit;
}

$pagina_padrao->cabecalho();

$id = $_SESSION["dados_usuario"]["id"];
// var_dump($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_consulta = "SELECT * FROM questionario_perfil_investidor WHERE id = $id";
$query_consulta = $pdo->prepare($sql_consulta);
$query_consulta->execute();
$dados_consulta = $query_consulta->fetchAll(PDO::FETCH_ASSOC);

// var_dump($dados_consulta);

Database::disconnect();

?>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Tape de Cotações</span></a> por TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
      "symbols": [{
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

    <?php
      if (empty($dados_consulta)) {
        echo "<button onclick=\"window.location='questionario_perfil_investidor.php'\" type='button' class='btn-perfil'>Quetionario Perfil do Investidor</button>";
        
      } else {
        echo "<button onclick=\"window.location='investimentos_recomendados.php'\" type='button' class='btn-perfil'>Investimentos Recomendados</button>";

      }

    ?>

    <button onclick="window.location='simular_lucro.php'" type="button" class="btn-perfil">Simular Lucro</button>
    <button onclick="window.location='lancamento_diario.php'" type="button" class="btn-perfil">Lançamentos Diários/Controle diário</button>
    <!-- <button onclick="window.location='#'" type="button" class="btn-perfil">Gerar Relatório</button> -->

  </div>

  <br><br><br>

  <p>Um gráfico para realizar análises com indicadores técnicos para aqueles que desejam realizar operações na bolsa</p>

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