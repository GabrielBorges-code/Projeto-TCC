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

<main>

    <div class="questionario">

        <h1>Quetionário Perfíl do Investidor</h1>

        <br>

        <form method="POST" action="../validacao/questionario.php">

            <!-- <p>Questionário definição do perfil do investidor:</p>         -->
            <br>
            
            <p>1 - Qual valor inicial você tem para investir?</p>
            <br>

            <input type="radio" id="renda-2k" name="renda" value="a">
            <label for="renda-2k">Até R$ 2.000,00.</label><br>
            <input type="radio" id="renda-entre-2k-10k" name="renda" value="b">
            <label for="renda-entre-2k-10k">De R$ 2.000,00 a R$ 10.000,00.</label><br>
            <input type="radio" id="renda-acima-10k" name="renda" value="c">
            <label for="renda-acima-10k">R$ 10.000,00.</label><br>

            <br><br>

            <p>2 - Você investe seu dinheiro?</p>
            <br>

            <input type="radio" id="investe-nunca" name="investe" value="a">
            <label for="investe-nunca">Nunca investi.</label><br>
            <input type="radio" id="investe-poupanca" name="investe" value="b">
            <label for="investe-poupanca">Poupança.</label><br>
            <input type="radio" id="investe-variado" name="investe" value="c">
            <label for="investe-variado">Tesouro direto, CDI, Bolsa de Valores ou outra.</label>

            <br><br>

            <p>3 -  Se você aplicasse seu dinheiro e estivesse perdendo 40% dele, qual seria sua reação?</p>
            <br>

            <input type="radio" id="reacao-perda-retiraria" name="reacao-perda" value="a">
            <label for="reacao-perda-retiraria">Retiraria o dinheiro.</label><br>
            <input type="radio" id="reacao-perda-deixaria" name="reacao-perda" value="b">
            <label for="reacao-perda-deixaria">Deixaria o dinheiro até ficar perdendo menos e retirava.</label><br>
            <input type="radio" id="reacao-perda-deixaria-positivo" name="reacao-perda" value="c">
            <label for="reacao-perda-deixaria-positivo">Deixaria o dinheiro aplicado até fica positivo ou até que se perca totalmente.</label>

            <br><br>

            <p>4 - Seu dinheiro consegue suprir seus gastos?</p>
            <br>

            <input type="radio" id="suprir-gasto-nao-sobra" name="suprir-gastos" value="a">
            <label for="suprir-gasto-nao-sobra">Consigo, mas não sobra.</label><br>
            <input type="radio" id="suprir-gastos-sobra-pouco" name="suprir-gastos" value="b">
            <label for="suprir-gastos-sobra-pouco">Consigo pagar as dívidas e sobra um pouco.</label><br>
            <input type="radio" id="suprir-gastos-sobra" name="suprir-gastos" value="c">
            <label for="suprir-gastos-sobra">Consigo e sobra.</label><br>

            <br><br>

            <p>5 - Quantos porcentos sobra de sua renda mensal?</p>
            <br>

            <input type="radio" id="sobra-ate-10" name="porcentos-sobra" value="a">
            <label for="sobra-ate-10">Até 10%.</label><br>
            <input type="radio" id="sobra-ate-35" name="porcentos-sobra" value="b">
            <label for="sobra-ate-35">Até 35%.</label><br>
            <input type="radio" id="sobra-ate-50" name="porcentos-sobra" value="c">
            <label for="sobra-ate-50">Até 50%.</label>

            <br><br>

            <p>6 - Você controla suas dívidas?</p>
            <br>

            <input type="radio" id="controla-dividas" name="controla-dividas" value="a">
            <label for="controla-dividas">Controlo.</label><br>
            <input type="radio" id="controla-dividas-pouco" name="controla-dividas" value="b">
            <label for="controla-dividas-pouco">Controlo um pouco.</label><br>
            <input type="radio" id="nao-controla-dividas" name="controla-dividas" value="c">
            <label for="nao-controla-dividas">Não controlo.</label><br>

            <br><br>

            <p>7 - Você acompanha o mercado de investimento?</p>
            <br>

            <input type="radio" id="investimentos-acompanha-nao-ve" name="acompanha-investimentos" value="a">
            <label for="investimentos-acompanha-nao-ve">Não vejo.</label><br>
            <input type="radio" id="investimentos-acompanha-asvezes" name="acompanha-investimentos" value="b">
            <label for="investimentos-acompanha-asvezes">Vejo no celular de vez em quando.</label><br>
            <input type="radio" id="investimentos-acompanha-sempre" name="acompanha-investimentos" value="c">
            <label for="investimentos-acompanha-sempre">Procuro sempre saber.</label><br>
            
            <br><br>

            <p>8 - Você investiria em algo que está subindo, especulando a continuação do momento?</p>
            <br>

            <input type="radio" id="investiria-nao-coragem" name="investiria-algo-subindo" value="a">
            <label for="investiria-nao-coragem">Não teria coragem.</label><br>
            <input type="radio" id="investiria-retiraria" name="investiria-algo-subindo" value="b">
            <label for="investiria-retiraria">Aplicaria, e na primeira alta ou baixa retiraria o dinheiro.</label><br>
            <input type="radio" id="investiria-ate-render" name="investiria-algo-subindo" value="c">
            <label for="investiria-ate-render">Deixaria o dinheiro aplicado até que ele rendesse.</label><br>

            <br><br>

            <p>9 - Em relação a investimentos você pensa?</p>
            <br>

            <input type="radio" id="investiria-pensa-seguranca" name="investimentos-pensa" value="a">
            <label for="investiria-pensa-seguranca">Segurança nos investimentos, mesmo que renda poucos.</label><br>
            <input type="radio" id="investiria-pensa-arriscar-pouco" name="investimentos-pensa" value="b">
            <label for="investiria-pensa-arriscar-pouco">Arriscar um pouco para o dinheiro render mais.</label><br>
            <input type="radio" id="investiria-pensa-correr-riscos" name="investimentos-pensa" value="c">
            <label for="investiria-pensa-correr-riscos">Correr riscos para ganhar mais.</label><br>

            <br><br>

            <p>10 - Qual seu planos para os investimentos?</p>
            <br>

            <input type="radio" id="planos-investimentos-reserva" name="planos-para-investimentos" value="a">
            <label for="planos-investimentos-reserva">Para ter uma reserva.</label><br>
            <input type="radio" id="planos-investimentos-render-mais" name="planos-para-investimentos" value="b">
            <label for="planos-investimentos-render-mais">Fazer o dinheiro render mais e aplicar em algo.</label><br>
            <input type="radio" id="planos-investimentos-reinvestir" name="planos-para-investimentos" value="c">
            <label for="planos-investimentos-reinvestir">Reinvestir o dinheiro cada vez mais.</label> <br>

            <br><br><br><br>

            <button type="submit" class="btn-enviar">Enviar</button>

        </form>

    </div>

</main>

<?php
$pagina_padrao->rodape();
?>