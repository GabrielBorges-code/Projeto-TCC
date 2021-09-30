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

            <p>001 - Perfil do Investidor </p>        
            <br>
            
            <p>1 - Qual a sua Idade? </p>
            <br>

            <input type="radio" id="menor_35" name="idade" value="a">
            <label for="menor_35">Menos que 35 anos</label><br>
            <input type="radio" id="entre_36_e_55" name="idade" value="b">
            <label for="entre_36_e_55">Entre 36 e 55 anos</label><br>
            <input type="radio" id="entre_56_e_65" name="idade" value="c">
            <label for="entre_56_e_65">Entre 56 e 65 anos</label><br>
            <input type="radio" id="acime_65" name="idade" value="d">
            <label for="acime_65">Acima de 65 anos </label>

            <br><br>

            <p>2 - Com base na sua renda atual, qual a expectativa para os próximos cinco anos?</p>
            <br>

            <input type="radio" id="renda-1" name="renda" value="a">
            <label for="renda-1">Minha renda deve aumentar devido a promoções, troca de emprego, etc.</label><br>
            <input type="radio" id="renda-2" name="renda" value="b">
            <label for="renda-2">Minha renda deve ficar estável.</label><br>
            <input type="radio" id="renda-3" name="renda" value="c">
            <label for="renda-3">Minha renda deve diminuir devido a minha aposentadoria, mudança de emprego.</label>

            <br><br>

            <p>3 -  Sua experiência com produtos de investimentos ‚ melhor descrita como:</p>
            <br>

            <input type="radio" id="Pequena" name="experiencia-de-investimentos" value="a">
            <label for="Pequena">Pequena: Tenho muito pouca experiência em investimentos, buscando orientação com meu gerente de conta.</label><br>
            <input type="radio" id="Moderada" name="experiencia-de-investimentos" value="b">
            <label for="Moderada">Moderada: Tenho alguma experiência em investimentos em razão das aplicações que possuo, mas prefiro esclarecer algumas duvidas com meu gerente de conta.</label><br>
            <input type="radio" id="Extensa" name="experiencia-de-investimentos" value="c">
            <label for="Extensa">Extensa: Sou um investidor experiente, preparado para tomar minhas próprias decisões em investimento</label>

            <br><br>

            <p>4 - Qual das frases abaixo melhor descreve suas preferências em relações a investimentos: </p>
            <br>

            <input type="radio" id="frase-1" name="frase-descreve-investidor" value="a">
            <label for="frase-1">Não me sinto confortável com oscilações de curto prazo, portanto, busco retornos semelhantes à taxa de juros pós-fixadas para preservar</label><br>
            <input type="radio" id="frase-2" name="frase-descreve-investidor" value="b">
            <label for="frase-2">Gosto de preservar meu investimento, mas aceito pequenas flutuações negativas no curto prazo, período inferior a um ano, para buscar retornos l ligeiramente superiores às taxas de juros pós-fixadas (CDI).</label><br>
            <input type="radio" id="frase-3" name="frase-descreve-investidor" value="c">
            <label for="frase-3">Aceito investir partes iguais em produtos de baixo risco e produtos de maior risco, visando crescimento do meu capital. </label><br>
            <input type="radio" id="frase-4" name="frase-descreve-investidor" value="d">
            <label for="frase-4">Quero que meus investimentos cresçam e gere o maior retorno possível e, para isso, aceito a possibilidade de flutuações negativas por períodos de dois anos ou mais, incluindo a possibilidade de perda de meu investimento inicial.</label>

            <br><br>

            <p>5 - Se você tivesse a oportunidade de aumentar o retorno potencial de seus investimentos, aceitando correr mais riscos (incluindo a possível perda de montante aplicado), indique a alternativa que melhor descreveria a sua preferência:</p>
            <br>

            <input type="radio" id="diposto-mais-risco" name="oportunidade-retorno" value="a">
            <label for="diposto-mais-risco">Estou sempre disposto a assumir mais riscos nos meus recursos disponíveis para investimento.</label><br>
            <input type="radio" id="disposto-parte-recursos" name="oportunidade-retorno" value="b">
            <label for="disposto-parte-recursos">Estou disposto a assumir riscos com parte dos meus recursos disponíveis para investimento.</label><br>
            <input type="radio" id="disposto-nao-assumir-risco" name="oportunidade-retorno" value="c">
            <label for="disposto-nao-assumir-risco">Não pretendo assumir mais riscos.</label>

            <br><br>

            <p>6 - Suponha que você investiu inicialmente (ex.R$50.000), e com o passar do tempo esse valor cresceu para (ex. R$66.500). Suponha agora, que seu investimento inesperadamente diminuiu de valor para (ex.R$56.500 - queda em torno de 15%). Então você:</p>
            <br>

            <input type="radio" id="investiria-mais" name="suponha-investimento" value="a">
            <label for="investiria-mais">Investiria mais.</label><br>
            <input type="radio" id="preocupado" name="suponha-investimento" value="b">
            <label for="preocupado">Ficaria de alguma forma preocupada, mas não tomaria qualquer ação</label><br>
            <input type="radio" id="transfarencia" name="suponha-investimento" value="c">
            <label for="transfarencia">Transferiria parte dos recursos para investimentos menos arriscados.</label><br>
            <input type="radio" id="resgataria-integralmente" name="suponha-investimento" value="d">
            <label for="resgataria-integralmente">Resgataria integralmente todo o investimento.</label>

            <br><br>

            <p>7 - Seu investimento da questão acima, agora valendo (ex. R$56.500), diminui novamente para (ex. R$48.000 – outros 15%). Qual e melhor alternativa que define sua reação?</p>
            <br>

            <input type="radio" id="investiria-mais-2" name="investimentos-diminui" value="a">
            <label for="investiria-mais-2">Investiria mais..</label><br>
            <input type="radio" id="mais-preocupado" name="investimentos-diminui" value="b">
            <label for="mais-preocupado">Ficaria mais preocupado, mas não tomaria nenhuma ação.</label><br>
            <input type="radio" id="transferia-recurso" name="investimentos-diminui" value="c">
            <label for="transferia-recurso">Transferiria parte dos recursos para investimentos menos arriscados.</label><br>
            <input type="radio" id="resgataria-integralmente-2" name="investimentos-diminui" value="d">
            <label for="resgataria-integralmente-2">Resgataria integralmente todo o investimento.</label>
            
            <br><br>

            <p>002 - Objetivos de investimento</p>

            <br><br>

            <p>8 - Qual a finalidade deste investimento?</p>
            <br>

            <input type="radio" id="compra-bem" name="finalidade-investimento" value="a">
            <label for="compra-bem">Compra de um bem</label><br>
            <input type="radio" id="protencao" name="finalidade-investimento" value="b">
            <label for="protencao">Proteção do capital</label><br>
            <input type="radio" id="aposentadoria" name="finalidade-investimento" value="c">
            <label for="aposentadoria">Aposentadoria</label><br>
            <input type="radio" id="crescimento" name="finalidade-investimento" value="d">
            <label for="crescimento">Crescimento significativo do patrimônio</label>

            <br><br>

            <p>9 - Por quanto tempo você pretende manter o recurso aplicado?</p>
            <br>

            <input type="radio" id="menos-1" name="recurso-aplicado" value="a">
            <label for="menos-1">Menos do que 1 ano.</label><br>
            <input type="radio" id="entre-1-a-3" name="recurso-aplicado" value="b">
            <label for="entre-1-a-3">Entre 1 a 3 anos.</label><br>
            <input type="radio" id="entre-3-a-5" name="recurso-aplicado" value="c">
            <label for="entre-3-a-5">Entre 3 a 5 anos.</label><br>
            <input type="radio" id="acima-5" name="recurso-aplicado" value="d">
            <label for="acima-5">Acima de 5 anos.</label><br>

            <br><br>

            <p>10 - Você acha que resgatara parte dessa aplicação antes da metade do prazo informado na pergunta anterior?</p>
            <br>

            <input type="radio" id="Nao" name="resgata-aplicacao" value="a">
            <label for="Nao">Não</label><br>
            <input type="radio" id="sim-20%-total" name="resgata-aplicacao" value="b">
            <label for="sim-20%-total">Sim, mas menos de 20% do total investido.</label><br>
            <input type="radio" id="sim-20%-pelo" name="resgata-aplicacao" value="c">
            <label for="sim-20%-pelo">Sim e pelo menos 20% do total investido.</label> <br>
            <input type="radio" id="nao-certeza" name="resgata-aplicacao" value="d">
            <label for="nao-certeza">Não tenho certeza.</label>

            <br><br>

            <p>11 - Quanto ao montante que você pretende investir no SICREDI ( incluindo o que você já possui aplicado conosco e em outras instituições), qual o percentual que este valor representa do total de seus investimentos (excluindo imóveis e empreendimentos)?</p>
            <br>

            <input type="radio" id="menos-50" name="montante-pretende-investir" value="a">
            <label for="menos-50">Menos de 50%.</label><br>
            <input type="radio" id="entre-50-e-75" name="montante-pretende-investir" value="b">
            <label for="entre-50-e-75">Entre 50% e 75%.</label><br>
            <input type="radio" id="mais-75" name="montante-pretende-investir" value="c">
            <label for="mais-75">Mais que 75</label>

            <br><br>

            <p>12 - Você deveria possuir reservas, para utilizar no caso de emergência, equivalentes a, no mínimo, 4 meses de suas despesas mensais. Além do montante que pretende investir, você possui essas reservas?</p>
            <br>

            <input type="radio" id="sim" name="reservas-financeiras" value="Sim">
            <label for="sim">Sim</label><br>
            <input type="radio" id="Naoo" name="reservas-financeiras" value="Naoo">
            <label for="Naoo">Não</label><br>
          

            <br><br><br><br>

            <button type="submit" class="btn-enviar">Enviar</button>

        </form>

    </div>

</main>

<?php
$pagina_padrao->rodape();
?>