<?php

require_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_professor = $_GET['idProfessor'];

$sql_delete_professor = $conn->prepare("DELETE FROM professor WHERE DI_professor = :idProfessor");
$sql_delete_professor->bindParam(':idProfessor', $id_professor, PDO::PARAM_STR);
$sql_delete_professor->execute();

if ($sql_delete_professor->rowCount()) {
    ?>
        <script>
            alert('Professor excluído com sucesso!!');
            <?php
            if ($id_tipo_usuario == 2) {
            ?>
                window.location = '../../homeDiretor.html.php';
            <?php
            } elseif ($id_tipo_usuario == 3) {
            ?>
                window.location = '../../homeSecretario.html.php';
            <?php
            }
            ?>
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Erro ao excluir professor!!');
            <?php
            if ($id_tipo_usuario == 2) {
            ?>
                window.location = '../../homeDiretor.html.php';
            <?php
            } elseif ($id_tipo_usuario == 3) {
            ?>
                window.location = '../../homeSecretario.html.php';
            <?php
            }
            ?>
        </script>
    <?php
    }
?>