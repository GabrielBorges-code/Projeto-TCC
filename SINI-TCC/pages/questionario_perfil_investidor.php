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

?>
<main>

    <div class="questionario">

        <h1>Questionário Perfíl do Investidor</h1>

        <br>

        <form method="POST" action="./validacao/questionario">

            <div class="wall" id="wall-1">

                <!-- <a href="#wall-10"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a> -->

                <p>1 - Qual é a sua idade?</p>
                <br>

                <input type="radio" id="idade-ate-25" name="idade-usuario" value="a">
                <label for="idade-ate-25">até 25 anos.</label><br>
                <input type="radio" id="idade-entre-26-50" name="idade-usuario" value="b">
                <label for="idade-entre-26-50">entre 26 e 50 anos.</label><br>
                <input type="radio" id="idade-mais-51" name="idade-usuario" value="c">
                <label for="idade-mais-51">51 anos ou mais.</label><br>

                <a href="#wall-2"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>

            </div>

            <div class="wall" id="wall-2">

                <a href="#wall-1"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>2 - Quantos dependentes você possui?</p>
                <br>

                <input type="radio" id="dependentes-nenhum-1" name="dependentes" value="a">
                <label for="dependentes-nenhum-1">nenhum ou 1 dependente.</label><br>
                <input type="radio" id="dependentes-2-3" name="dependentes" value="b">
                <label for="dependentes-2-3">2 a 3 dependentes.</label><br>
                <input type="radio" id="dependentes-mais-3" name="dependentes" value="c">
                <label for="dependentes-mais-3">3 ou mais dependentes.</label><br>

                <a href="#wall-3"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>

            </div>

            <div class="wall" id="wall-3">
                <a href="#wall-2"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>3 - Quantos porcentos de sua renda mensal você estaria disposto a investir?</p>
                <br>

                <input type="radio" id="porcento-renda-10" name="porcento-renda-investiria" value="a">
                <label for="porcento-renda-10">até 10%.</label><br>
                <input type="radio" id="porcento-renda-entre-11-35" name="porcento-renda-investiria" value="b">
                <label for="porcento-renda-entre-11-35">entre 11% a 35%.</label><br>
                <input type="radio" id="porcento-renda-mais-36" name="porcento-renda-investiria" value="c">
                <label for="porcento-renda-mais-36">mais que 36%.</label><br>

                <a href="#wall-4"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-4">
                <a href="#wall-3"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>4 - Você investe seu dinheiro?</p>
                <br>

                <input type="radio" id="voce-investe-nunca-investi" name="voce-investe-seu-dinheiro" value="a">
                <label for="voce-investe-nunca-investi">Nunca investi.</label><br>
                <input type="radio" id="voce-investe-poupanca" name="voce-investe-seu-dinheiro" value="b">
                <label for="voce-investe-poupanca">Poupança.</label><br>
                <input type="radio" id="voce-investe-tesouro" name="voce-investe-seu-dinheiro" value="c">
                <label for="voce-investe-tesouro">Tesouro direto, CDI, Bolsa de Valores ou outra.</label><br>

                <a href="#wall-5"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-5">
                <a href="#wall-4"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>5 - Se você aplicasse seu dinheiro e estivesse perdendo 40% dele, qual seria sua reação?</p>
                <br>

                <input type="radio" id="perdendo-investimento-retiraria" name="perdendo-investimento" value="a">
                <label for="perdendo-investimento-retiraria">Retiraria o dinheiro.</label><br>
                <input type="radio" id="perdendo-investimento-deixaria-recuperar" name="perdendo-investimento" value="b">
                <label for="perdendo-investimento-deixaria-recuperar">Deixaria o dinheiro até recuperar uma parte.</label><br>
                <input type="radio" id="perdendo-investimento-arricar-tudo" name="perdendo-investimento" value="c">
                <label for="perdendo-investimento-arricar-tudo">Deixaria o dinheiro aplicado até ficar positivo ou até que se perca totalmente.</label><br>

                <a href="#wall-6"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-6">
                <a href="#wall-5"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>6 - Por quanto tempo deseja manter seu investimento?</p>
                <br>

                <input type="radio" id="manter-investimento-menos-1" name="tempo-manter-investimento" value="a">
                <label for="manter-investimento-menos-1">menos de 1 ano - curto prazo.</label><br>
                <input type="radio" id="manter-investimento-entre-1-3" name="tempo-manter-investimento" value="b">
                <label for="manter-investimento-entre-1-3">entre 1 e 3 anos - médio prazo.</label><br>
                <input type="radio" id="manter-investimento-mais-3" name="tempo-manter-investimento" value="c">
                <label for="manter-investimento-mais-3">3 anos para cima - longo prazo.</label><br>

                <a href="#wall-7"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-7">
                <a href="#wall-6"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>7 - Você acompanha o mercado de investimento?</p>
                <br>

                <input type="radio" id="investimentos-acompanha-nao-ve" name="acompanha-investimentos" value="a">
                <label for="investimentos-acompanha-nao-ve">Não vejo.</label><br>
                <input type="radio" id="investimentos-acompanha-asvezes" name="acompanha-investimentos" value="b">
                <label for="investimentos-acompanha-asvezes">Vejo no celular de vez em quando.</label><br>
                <input type="radio" id="investimentos-acompanha-sempre" name="acompanha-investimentos" value="c">
                <label for="investimentos-acompanha-sempre">Procuro sempre saber.</label><br>

                <a href="#wall-8"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-8">
                <a href="#wall-7"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>8 - Você investiria em algo que está subindo, especulando a continuação do momento?</p>
                <br>

                <input type="radio" id="investiria-nao-coragem" name="investiria-algo-subindo" value="a">
                <label for="investiria-nao-coragem">Não teria coragem.</label><br>
                <input type="radio" id="investiria-retiraria" name="investiria-algo-subindo" value="b">
                <label for="investiria-retiraria">Aplicaria, e na primeira alta ou baixa retiraria o dinheiro.</label><br>
                <input type="radio" id="investiria-ate-render" name="investiria-algo-subindo" value="c">
                <label for="investiria-ate-render">Deixaria o dinheiro aplicado até que ele rendesse.</label><br>


                <a href="#wall-9"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-9">
                <a href="#wall-8"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>9 - Em relação a investimentos você pensa?</p>
                <br>

                <input type="radio" id="investiria-pensa-seguranca" name="investimentos-pensa" value="a">
                <label for="investiria-pensa-seguranca">Segurança nos investimentos, mesmo que renda poucos.</label><br>
                <input type="radio" id="investiria-pensa-arriscar-pouco" name="investimentos-pensa" value="b">
                <label for="investiria-pensa-arriscar-pouco">Arriscar um pouco para o dinheiro render mais.</label><br>
                <input type="radio" id="investiria-pensa-correr-riscos" name="investimentos-pensa" value="c">
                <label for="investiria-pensa-correr-riscos">Correr riscos para ganhar mais.</label><br>

                <a href="#wall-10"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a>
            </div>

            <div class="wall" id="wall-10">
                <a href="#wall-9"><img class="botao-anterior" src="./icon/before.png" alt="botão de anterior"></a>

                <p>10 - Qual o seu plano para o investimento?</p>
                <br>

                <input type="radio" id="planos-investimentos-reserva" name="planos-para-investimentos" value="a">
                <label for="planos-investimentos-reserva">Para ter uma reserva.</label><br>
                <input type="radio" id="planos-investimentos-render-mais" name="planos-para-investimentos" value="b">
                <label for="planos-investimentos-render-mais">Fazer o dinheiro render mais e aplicar em algo.</label><br>
                <input type="radio" id="planos-investimentos-reinvestir" name="planos-para-investimentos" value="c">
                <label for="planos-investimentos-reinvestir">Reinvestir o dinheiro cada vez mais.</label><br>

                <!-- <a href="#wall-1"><img class="botao-proximo" src="./icon/next.png" alt="botão de próximo"></a> -->

                <br><br><br><br>

                <button type="submit" class="btn-enviar">Enviar</button> <br>
              
            </div>

        </form>

    </div>

</main>

<script src="./scripts/questionario.js"></script>

<?php
$pagina_padrao->rodape();
?>