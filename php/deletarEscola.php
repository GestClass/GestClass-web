<?php

include_once 'conexao.php';

$id_escola = $_GET["id_escola"];


?>
<script>
    var resp = confirm('Deseja mesmo excluir essa escola e todos seus dados?');

    if (resp) {
        window.location = 'deleteEscola.php?id_escola=<?php echo $id_escola?>';
    } else {
        history.back();
    }
</script>