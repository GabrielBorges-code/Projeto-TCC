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

$sql = "SELECT * FROM `lancamento_diario` WHERE id_usuario = '$id' ORDER BY `lancamento_diario`.`id` ASC, `lancamento_diario`.`id_usuario`";
$query = $pdo->prepare($sql);
$query->execute();
$dados_lancamento = $query->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

if(!empty($dados_lancamento[0]['id_usuario'])) {
    $readonly = "readonly";
} else {
    $readonly = "";
}

if(!empty($dados_lancamento[0]['saldo_inicial'])) {
    $value = $dados_lancamento[0]['saldo_inicial'];
} else {
    $value = "";
}

$pagina_padrao->cabecalho();

?>
<link rel="stylesheet" href="./styles/lancamento_diario.css">

<main>
    <div class="conteudo">
        <h1>Lançamento Diário</h1>

        <form method="POST" action="./validacao/lancamento_diario?id=<?= $id ?>">

            <label for="data">Dia</label>
            <input name="data" type="date" id="data" type="date" class="input-padrao" value="<?= date('Y-m-d') ?>" max="2030-12-31" min="2020-01-01"  required/>

            <label for="resultadoDia">Resultado do dia R$</label>
            <input name="resultado-dia" type="number" id="resultadoDia" class="input-padrao" required/>

            <label for="valorSaldoVirtual" id="labelValorSaldoVirtual">Saldo Virtual Inicial R$:</label>
            <input name="valor-saldo-virtual" type="number" id="valorSaldoVirtual" value="<?= $value ?>" <?= $readonly ?> class="input-padrao" required/>

            <button type="submit" id="btn-lancar" class="btn-access">Lançar</button>

        </form>

        <br><br><br><br>

        <table width="95%" >
            <tr>
                <th>Data</th>
                <th>Resultado do Dia</th>
                <th>Saldo Virtual</th>
                <th id="excluir-lancamento">Excluir Lançamento</th>
            </tr>
            
                <?php 
                // var_dump($dados_lancamento);
                    foreach ($dados_lancamento as $key => $dados) {
                        echo "<tr>";
                        echo "<td>    {$dados['data_lancamento']} </td>";
                        echo "<td> R$ {$dados['resultado_dia']} </td>";
                        echo "<td> R$ {$dados['saldo_virtual']} </td>";

                        echo "<td><a href='./validacao/excluir_lancamento?id=" . $dados["id"] . "'><img src='./icon/excluir.png' alt='imagem para fazer a exclusão do item'></a></td>";

                        echo "</tr>";
                    }
                ?>
            
        </table>

        <!-- <button onclick="window.location='#'" type="button" class="btn-perfil">Gerar Relatório</button> -->
        <button  onclick="window.location='./validacao/planilha_lancamento_diario'" id="gerar-relatorio" class="btn-access">Gerar Relatório</button>

    </div>

</main>

<script src="./scripts/lancamento_diario.js"></script>

<?php
$pagina_padrao->rodape();
?>