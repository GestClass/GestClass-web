<?php

require_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_secretario = $_POST['idSecretario'];

?>
<script>
    var resp = confirm("Deseja realmente excluir esse secretário?");
    if (resp) {
        window.location = 'deleteUsuarios/excluirSecretario.php?idSecretario=<?php echo $id_secretario; ?>';
    } else {
        <?php
        if ($id_tipo_usuario == 2) {
        ?>
            window.location = '../homeDiretor.html.php';
        <?php
        } else {
        ?>
            window.location = '../homeSecretaria.html.php';
        <?php
        }
        ?>
    }
</script>