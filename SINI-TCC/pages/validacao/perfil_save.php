<?php
require('../../config/database.php');

$id = "";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
}

$foto_perfil = "";
if (!empty($_FILES['foto-perfil'])) {
    $foto_perfil = $_FILES['foto-perfil'];
}
$nome = "";
if (!empty($_POST["nome-usuario"])) {
    $nome = $_POST["nome-usuario"];
}

$email = "";
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
}

$telefone = 0;
if (!empty($_POST["telefone"])) {
    $telefone = $_POST["telefone"];
}

$perfil_investidor = "";
if (!empty($_POST["perfil-investidorone"])) {
    $perfil_investidor = $_POST["perfil-investidorone"];
}

// var_dump($id);
// var_dump($nome);
// var_dump($foto_perfil["name"] == null);
// var_dump($email);
// var_dump($telefone);
// var_dump($perfil_investidor);

if ($foto_perfil["name"] != null) {
    if (empty($_FILES)) {
        // return false;

    } else {
        $temp = explode(".", basename($_FILES['foto-perfil']['name']));
        $newfilename = $_FILES['foto-perfil']['name'];
        $target_dir = "../img_perfil/{$id}/";
        $target_file = $target_dir . $newfilename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        } else {
            //
        }

        if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
            echo "<script>alert('Desculpa, somente arquivos JPEG/JPG.');
            window.location.href = '../perfil.php'</script>";
            exit;
            // $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["foto-perfil"]["size"] > 5000000) {
            echo "<script>alert('Desculpa, mas sua imagem ultrapassa o tamanho máximo permitido.');
            window.location.href = '../perfil.php'</script>";
            exit;
            // $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "<script>alert('Houve um erro no processo de upload.')</script>;<br>";
        } else {
            if (file_exists("../img_perfil/{$id}/profileImage.jpg")) {
                unlink("../img_perfil/{$id}/profileImage.jpg");
            }
            if (move_uploaded_file($_FILES['foto-perfil']['tmp_name'], $target_file)) {
                rename("$target_file", "$target_dir" . "profileImage.$imageFileType");
                echo "<script>window.location.href('../perfil_edicao.php?id=$id');</script>";
            } else {
                echo "<script>window.alert('Erro ao fazer upload do arquivo!')
                    window.location.href = '../perfil.php'</script>";
                exit;
            }
        }
    }
}



$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE `usuario` SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = $id ";
$query = $pdo->prepare($sql);
$query->execute();

Database::disconnect();

echo "<script>window.alert('Dados atualizados com suceso!')
        window.location.href = '../perfil.php'</script>";
