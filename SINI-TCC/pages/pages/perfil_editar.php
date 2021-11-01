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

$id = $_SESSION["dados_usuario"]["id"];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT questionario_perfil_investidor.*, usuario.nome, usuario.email, usuario.telefone FROM questionario_perfil_investidor INNER JOIN usuario ON usuario.id = questionario_perfil_investidor.id WHERE usuario.id = $id";
$query = $pdo->prepare($sql);
$query->execute();
$login_usuario = $query->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

$nome = $login_usuario[0]['nome'];
$email = $login_usuario[0]['email'];
$telefone = $login_usuario[0]['telefone'];
$tipo_de_investidor = $login_usuario[0]['tipo_de_investidor'];

?>
<!-- <link rel="stylesheet" href="./styles/perfil.css"> -->

<main class="perfil">    
    <div class="info-perfil">
        <img class="img-perfil" src="./image/user.png" >
        
        <ul class="perfil">

            <hr>
            <form method="POST" action="../validacao/editar_dados_perfil.php<?=$id?>">
            
            </form>
            <li class="perfil"><b>Nome</b> <div class="alinha-direita"> <?php echo "<input type='text' name='nome' value='$nome' id=''>";?> </div></li>
            <hr>

            <li class="perfil"><b>E-mail</b> <div class="alinha-direita"> <?php echo "<input type='email' name='email' value='$email' id=''>";?> </div></li>
            <hr>

            <li class="perfil"><b>Telefone</b> <div class="alinha-direita"> <?php echo "<input type='tel' name='telefone' value='$telefone' id=''>";?> </div></li>
            <hr>

            <li class="perfil"><b>Tipo de Investidor</b> <div class="alinha-direita"> <?php echo "<input type='text' name='nome' value='$tipo_de_investidor' id=''>";?> </div></li>
            <hr>

            <br>
            
            <li class='perfil'><a href='perfil_editar.php?id=<?=$id?>'><button type='button' class='btn-access'>Salvar</button></a></li>";
            

        </ul>

        
    </div>

</main>

<?php
$pagina_padrao->rodape();

?>