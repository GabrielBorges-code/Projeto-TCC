<?php
require('../../config/database.php');

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

$sql = "SELECT * FROM lancamento_diario WHERE $id";
$query = $pdo->prepare($sql);
$query->execute();
$dados_lancamento = $query->fetchAll(PDO::FETCH_ASSOC);

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

Database::disconnect();

$pagina_padrao->cabecalho();

?>
<link rel="stylesheet" href="./styles/lancamento_diario.css">

<main>
    <div class="conteudo">
        <h1>Lançamento Diário</h1>

        <form method="POST" action="../validacao/lancamento_diario.php?id=<?= $id ?>">
            <!-- <img class="img-dinheiro" src="../icon/dollar.png" alt=""> -->

            <label for="data">Dia</label>
            <input name="data" type="date" id="data" type="date" class="input-padrao" max="2030-12-31" min="1980-01-01"  required/>

            <label for="resultadoDia">Resultado do dia R$</label>
            <input name="resultado-dia" type="number" id="resultadoDia" class="input-padrao" required/>

            <label for="valorSaldoVirtual" id="labelValorSaldoVirtual">Saldo Virtual Inicial R$:</label>
            <input name="valor-saldo-virtual" type="text" id="valorSaldoVirtual" value="<?= $value ?>" <?= $readonly ?> class="input-padrao" />

            <!-- <label for="valorSaldoVirtualInicial" id="valorSaldoVirtualInicial">Saldo Virtual Inicial R$:</label>
            <input name="valor-saldo-virtual-inicial" type="text" id="valorSaldoVirtualInicial" value="<?= $value ?>" class="input-padrao"  /> -->

            <a href=""></a>
            <button type="submit" id="btn-lancar" class="btn-access">Lançar</button>

        </form>

        <br><br><br><br><br><br><br><br>

        <table width="95%" >
            <tr>
                <th>Data</th>
                <th>Resultado do Dia</th>
                <th>Saldo Virtual</th>
            </tr>
            
                <?php 
                // var_dump($dados_lancamento);
                    foreach ($dados_lancamento as $key => $dados) {
                        echo "<tr>";
                        echo "<th>" . $dados["data_lancamento"] . "</th>";
                        echo "<th> R$ " . $dados["resultado_dia"] . "</th>";
                        echo "<th> R$ " . $dados["saldo_virtual"] . "</th>";
                        echo "</tr>";
                    }
                ?>
            
        </table>

    </div>

</main>

<script>
// document.querySelector("label#labelValorSaldoVirtual").style.display = "none";
// document.querySelector("input#valorSaldoVirtual").style.display = "none";

// document.querySelector("input#valorSaldoVirtualInicial").style.display = "block";
// document.querySelector("label#valorSaldoVirtualInicial").style.display = "block";

// var valorSaldoIncial = document.querySelector("input#valorSaldoVirtualInicial").value;

// console.log(valorSaldoIncial);

// if (valorSaldoIncial != null) {
//     document.querySelector("input#valorSaldoVirtualInicial").style.display = "none";
//     document.querySelector("label#valorSaldoVirtualInicial").style.display = "none";

//     // document.querySelector("label#labelValorSaldoVirtual").style.display = "block";
//     // document.querySelector("input#valorSaldoVirtual").style.display = "block";
// }


</script>

<?php
$pagina_padrao->rodape();
?>