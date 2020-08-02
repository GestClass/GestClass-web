<?php

include_once './conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_turma = $_POST['idTurma'];

?>

<script>
    var resp = confirm("Deseja realmente desativar essa turma?");
    if (resp) {
        window.location = 'deleteUsuarios/desativarTurma.php?idTurma=<?php echo $id_turma; ?>';
    } else {
        <?php
        if ($id_tipo_usuario == 2) {
        ?>
            window.location = '../listaTurmas.html.php';
        <?php
        } else {
        ?>
            window.location = '../listaTurmas.html.php';
        <?php
        }
        ?>
    }
</script>