<?php

require_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$ra = $_GET['raAluno'];
$situacao = 0;

$sql_update = $conn->prepare("UPDATE aluno SET situacao = :situacao, id_tipo_usuario_exclusor = :id_tipo_usuario, id_usuario_exclusor = :id_usuario, data_exclusao = NOW() WHERE ra = :ra AND fk_id_escola_aluno = :id_escola");

$sql_update->bindParam(':situacao', $situacao, PDO::PARAM_STR);
$sql_update->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_STR);
$sql_update->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
$sql_update->bindParam(':ra', $ra, PDO::PARAM_STR);
$sql_update->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);

$sql_update->execute();

if ($sql_update->rowCount()) {

    if ($id_tipo_usuario == 2) {
?>
        <script>
            alert('Aluno desativado com sucesso!!');
            window.location = "../../homeDiretor.html.php";
        </script>
    <?php
    } elseif ($id_tipo_usuario == 3) {
    ?>
        <script>
            alert('Aluno desativado com sucesso!!');
            window.location = "../../homeSecretaria.html.php";
        </script>
    <?php
    }
} else {
    if ($id_tipo_usuario == 2) {
    ?>
        <script>
            alert('Erro ao desativar aluno!!');
            window.location = "../../homeDiretor.html.php";
        </script>
    <?php
    } elseif ($id_tipo_usuario == 3) {
    ?>
        <script>
            alert('Erro ao desativar aluno!!');
            window.location = "../../homeSecretaria.html.php";
        </script>
<?php
    }
}
?>