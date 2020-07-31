<?php

require_once 'conexao.php';

$ra = $_POST['raAluno'];

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

?>
<script>
    var resp = confirm("Deseja realmente desativar esse aluno?");
    if (resp) {
        window.location = 'deleteUsuarios/desativarAluno.php?raAluno=<?php echo $ra ?>';
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
<?php
?>