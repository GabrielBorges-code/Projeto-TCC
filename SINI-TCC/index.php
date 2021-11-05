<?php
include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

$pagina_padrao->cabecalho();
?>

<main>
    <div class="conteudo-apresentacao">
        <!-- <h1>Sistema  Indicação de Investimentos e Gerenciamento de Capital</h1> -->

        <h1>Descubra qual é o seu perfil e o investimento adequado para você!</h1>

        <p>Uma plataforma que tem como propósito auxiliar pessoas que desejam obter uma renda extra</p>


    </div>

    <div class="conteudo-widget">
   
        <div class="tradingview-widget-container widget-cotacao">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/USDBRL/?exchange=FX_IDC" rel="noopener" target="_blank"><span class="blue-text">USDBRL Cotação</span></a> por TradingVie</div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                    "symbol": "FX_IDC:USDBRL",
                    "width": 250,
                    "height": 220,
                    "locale": "br",
                    "dateRange": "12M",
                    "colorTheme": "light",
                    "trendLineColor": "rgba(41, 98, 255, 1)",
                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                    "isTransparent": false,
                    "autosize": false,
                    "largeChartUrl": ""
                }
            </script>
        </div>
   
        <div class="tradingview-widget-container widget-cotacao">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/EURBRL/?exchange=FX_IDC" rel="noopener" target="_blank"><span class="blue-text">EURBRL Cotação</span></a> por TradingVie</div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                    "symbol": "FX_IDC:EURBRL",
                    "width": "250",
                    "height": 220,
                    "locale": "br",
                    "dateRange": "12M",
                    "colorTheme": "light",
                    "trendLineColor": "rgba(41, 98, 255, 1)",
                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                    "isTransparent": false,
                    "autosize": false,
                    "largeChartUrl": ""
                }
            </script>
        </div>
   
        <div class="tradingview-widget-container widget-cotacao">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/BTCBRL/?exchange=MERCADO" rel="noopener" target="_blank"><span class="blue-text">BTCBRL Cotação</span></a> por TradingVie</div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                    "symbol": "MERCADO:BTCBRL",
                    "width": "250",
                    "height": 220,
                    "locale": "br",
                    "dateRange": "12M",
                    "colorTheme": "light",
                    "trendLineColor": "rgba(41, 98, 255, 1)",
                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                    "isTransparent": false,
                    "autosize": false,
                    "largeChartUrl": ""
                }
            </script>
        </div>

    </div>
    
    <div class="tipo-investidor">
        <h1>Perfis de Investidores</h1>
        <p>Existem 3 tipos de perfis de investidores, podemos classificá-los como, conservador, moderado e agressivo, cada um desses perfis contêm características próprias, e são classificados de acordo com o risco que cada investimento possui.</p>

        <p><b>O conservador</b>, é o investidor que têm maior aversão ao risco – isto é, preferem investir seu dinheiro em produtos que apresentem nenhum ou baixo risco. No geral, podemos dizer que o investidor conservador busca receber ganhos reais com o menor risco possível, mesmo que para isso tenha que abrir mão de certa rentabilidade.</p>

        <img src="./pages/img/conservador.png" alt="Gráfico do perfil investidor conservador">

        <p><b>O Moderado</b>, é o investidor que corre um risco médio em suas aplicações – ele está disposto a assumir riscos um pouco maiores para ter uma rentabilidade também maior; mas, ao mesmo tempo, não abre mão de certa segurança. Por isso, ele investe tanto em renda fixa, mais segura, quanto em outras opções, como fundos multimercados (de médio risco) e até ações.</p>

        <img src="./pages/img/moderado.png" alt="Gráfico do perfil investidor conservador">

        <p><b>O agressivo</b>, por sua vez, está disposto a correr riscos para ter maior rentabilidade – e até perder parte de seu patrimônio em nome disso. Em uma carteira de investimentos, a maior parte de suas aplicações está em produtos de renda variável – ações, fundos de ações, opções, entre outros.</p>

        <img src="./pages/img/agressivo.png" alt="Gráfico do perfil investidor conservador">
    </div>

</main>

<?php
$pagina_padrao->rodape();
?>