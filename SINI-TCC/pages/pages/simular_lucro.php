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

<link rel="stylesheet" href="./styles/simular_lucro.css">

<main>
    <div class="conteudo">
        <h1>Simular Lucro</h1>

        <label for="valorInvestir">Valor que Você Deseja Investir</label>
        <span class="span-padrao">R$</span><input class="input-padrao" type="number" name="valorInvestir" id="valorInvestir" min="1" required> 

        <label for="prazo">Prazo do Investimento</label>
        <input class="input-padrao" type="number" name="prazo" id="prazo" min="1" required><span id="span-meses" class="span-padrao">Meses</span>

        <label for="rentabilidade">Rentabilidade ao Ano</label>
        <input class="input-padrao" type="number" name="rentabilidade" id="rentabilidade" min="0" required><span id="span-ao-ano" class="span-padrao">% ao ano</span>
        
        <button onclick="calcular()" id="btn-calcular" class="btn-enviar">Calcular</button>
    </div>

    <div class="dinheiro-investido"></div>
    <div class="prazo-meses"></div>
    <div class="juros-ganhos"></div>
    <div class="total-ganhos"></div>
    <div class="imposto-sobre-ganhos"></div>

</main>

<script src="./scripts/simular_lucro.js"></script>
<?php
$pagina_padrao->rodape();
?>