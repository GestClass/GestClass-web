<?php

include_once './conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// Resgatando variáveis
$id_disciplina = $_POST['idDisciplina'];

?>

<script>
    var resp = confirm('Deseja realmente desativar essa disciplina?');

    if (resp) {
        window.location = 'deleteUsuarios/desativarDisciplina.php?idDisciplina=<?php echo $id_disciplina; ?>'
    } else {
        history.back();
    }

</script>

