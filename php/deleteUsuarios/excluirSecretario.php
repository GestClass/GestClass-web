<?php

require_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_secretario = $_GET['idSecretario'];

$sql_delete_secretario = $conn->prepare("DELETE FROM secretario WHERE ID_secretario = :idSecretario");
$sql_delete_secretario->bindParam(':idSecretario', $id_secretario, PDO::PARAM_STR);
$sql_delete_secretario->execute();

if ($sql_delete_secretario->rowCount()) {
?>
    <script>
        alert('Secretário excluído com sucesso!!');
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
        alert('Erro ao excluir secretário!!');
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