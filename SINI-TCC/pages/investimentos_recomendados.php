<?php
require('../config/database.php');

include_once('PaginaPadrao.php');
$pagina_padrao = new PaginaPadrao();

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: ../validacao/logout.php");
    exit;
}


$id = $_SESSION["dados_usuario"]["id"];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_consulta = "SELECT * FROM questionario_perfil_investidor WHERE id = $id";
$query_consulta = $pdo->prepare($sql_consulta);
$query_consulta->execute();
$dados_perfil_investidor = $query_consulta->fetchAll(PDO::FETCH_ASSOC);

$perfil_investidor = $dados_perfil_investidor[0]["tipo_de_investidor"];

// var_dump($dados_perfil_investidor);

Database::disconnect();

$pagina_padrao->cabecalho();

?>
<link rel="stylesheet" href="./styles/investimentos_recomendados.css">

<main>
    <div class="conteudo">
        <h1>Sugestão de investimentos</h1>
        <p>Avaliamos o seu perfil, e você possuí caracteristicas de um investidor <b><?= $perfil_investidor ?>.</b></p>

        <p>Segue uma lista de possíveis investimento que se adequa ao seu perfil:</p>

        <!-- <br><br><br><br><br><br><br> -->

        <?php 
        if ($perfil_investidor == "Conservador") {
            echo "
            <table>
                <tr>
                    <th>Investimentos</th>
                    <th>Duração</th>
                </tr>

                <tr>
                    <td>Fundo Renda Fixa</td>
                    <td>Médio e Longo</td>
                </tr>
                
                <tr>
                    <td>Renda Fixa</td>
                    <td>Médio e Longo</td>
                </tr>

                <tr>
                    <td>Tesouro Direto</td>
                    <td>Longo, Médio e Curto</td>
                </tr>

            </table>

            <p>O <b>Conservador</b>, é o investidor que têm maior aversão ao risco – isto é, preferem investir seu dinheiro em produtos que apresentem nenhum ou baixo risco. No geral, podemos dizer que o investidor conservador busca receber ganhos reais com o menor risco possível, mesmo que para isso tenha que abrir mão de certa rentabilidade.</p>

            <img src='../img/conservador.png' alt='Gráfico do perfil investidor conservador'>
            
            <ul>
                <li>Os <b>Fundos de Renda Fixa</b> possuem pelo menos 80% da sua carteira investida em ativos de renda fixa.</li><br>
                
                <li><b>Renda Fixa</b> é uma classe de ativos na qual é possível prever a rentabilidade final, por isso, são mais seguros.</li><br>

                <li>O <b>Tesouro Direto</b> é um programa do Tesouro Nacional do Brasil que visa a captação de recursos para o Governo.</li><br>
            </ul>

            ";
        } else if ($perfil_investidor == "Moderado") {
            echo "
            <table>
                <tr>
                    <th>Investimentos</th>
                    <th>Duração</th>
                </tr>

                <tr>
                    <td>Fundo Imobiliário</td>
                    <td>Médio e Longo</td>
                </tr>

                <tr>
                    <td>Fundo Multimercado</td>
                    <td>Médio e Longo</td>
                </tr>

                <tr>
                    <td>Fundo Previdência</td>
                    <td>Longo</td>
                </tr>

            </table>

            <p>O <b>Moderado</b>, é o investidor que corre um risco médio em suas aplicações – ele está disposto a assumir riscos um pouco maiores para ter uma rentabilidade também maior; mas, ao mesmo tempo, não abre mão de certa segurança. Por isso, ele investe tanto em renda fixa, mais segura, quanto em outras opções, como fundos multimercados (de médio risco) e até ações.</p>

            <img src='../img/moderado.png' alt='Gráfico do perfil investidor moderado'>
            <ul>
                <li>Os <b>Fundos Imobiliários</b> são formados por recursos de diversos investidores que são destinados à compra ou venda de ativos físicos ou valores imobiliários.</li><br>

                <li>Os <b>Fundos Multimercados</b> são uma categoria de fundos de investimento que investem em diferentes classes de ativos financeiros.</li><br>

                <li>O <b>Fundo de Previdência</b> tem o objetivo de guardar dinheiro para a aposentadoria ou outros objetivos de longo prazo.</li><br>
            </ul>
            ";
        } else if ($perfil_investidor == "Agressivo") {
            echo "
            <table>
                <tr>
                    <th>Investimentos</th>
                    <th>Duração</th>
                </tr>

                <tr>
                    <td>Minicontrato futuro</td>
                    <td>Curto</td>
                </tr>

                <tr>
                    <td>Opções</td>
                    <td>Curto</td>
                </tr>

                <tr>
                    <td>Ações</td>
                    <td>Longo, medio e curto</td>
                </tr>

                <tr>
                    <td>Fundo de Ações</td>
                    <td>Longo</td>
                </tr>

            </table>
            
            <p>O <b>agressivo</b>, por sua vez, está disposto a correr riscos para ter maior rentabilidade – e até perder parte de seu patrimônio em nome disso. Em uma carteira de investimentos, a maior parte de suas aplicações está em produtos de renda variável – ações, fundos de ações, opções, entre outros.</p>

            <img src='../img/agressivo.png' alt='Gráfico do perfil investidor agressivo'>
            
            <ul>
                <li><b>Minicontrato Futuro</b> é a nova modalidade do mercado disponibilizada pela Bolsa de Valores Brasileira, ele busca tornar mais acessível ao investidor iniciante investir em ações ou no já que o custo operacional é mais baixo do que a compra de ações no S&P500 mercado à vista.</li><br>
                
                <li>As <b>Opções</b> são um tipo de derivativo que dá o direito de comprar ou vender um lote de ações por um preço fixado.</li><br>

                <li>As <b>Ações</b> são parte do capital social de uma empresa que são negociadas na Bolsa de Valores.</li><br>
            </ul>
            ";
        }
        ?>

    </div>

</main>

<?php
$pagina_padrao->rodape();
?>