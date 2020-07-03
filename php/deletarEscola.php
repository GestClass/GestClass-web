<?php

include_once 'conexao.php';

$id_escola = $_GET["id_escola"];

?>
<script>
    var resp = confirm('Deseja mesmo excluir essa escola e todos seus dados?');

    if (resp) {
        <?php
            $delete_escola = $conn->prepare("DELETE FROM escola WHERE ID_escola = $id_escola");
            $delete_escola->execute();

            
        ?>
        
    } else {
        window.location = '../cadastroEscola.html.php';
    }
</script>