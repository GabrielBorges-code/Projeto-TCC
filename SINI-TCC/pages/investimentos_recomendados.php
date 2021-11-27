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

            <p>O <b>conservador</b>, é o investidor que têm maior aversão ao risco – isto é, preferem investir seu dinheiro em produtos que apresentem nenhum ou baixo risco. No geral, podemos dizer que o investidor conservador busca receber ganhos reais com o menor risco possível, mesmo que para isso tenha que abrir mão de certa rentabilidade.</p>

            <img src='../img/conservador.png' alt='Gráfico do perfil investidor conservador'>
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
            ";
        }
        ?>

    </div>

</main>

<?php
$pagina_padrao->rodape();
?>