<?php

require_once  'conexao.php';

// $id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];
$id_padrao = $_GET["id_padrao"];

if ($id_tipo_usuario == 2) {
    $location = "../homeDiretor.html.php";
} elseif ($id_tipo_usuario == 3) {
    $location = "../homeSecretaria.html.php";
}


// Resgatando nome do padrão
$query_select_nome_padrao = $conn->prepare("SELECT nome_padrao FROM aula_escola WHERE ID_aula_escola = $id_padrao AND fk_id_escola_aula_escola = $id_escola");
$query_select_nome_padrao->execute();
$array_aula_escola = $query_select_nome_padrao->fetch(PDO::FETCH_ASSOC);

// Verificar sucesso
if ($query_select_nome_padrao->rowCount()) {


    // Armazenando o nome do padrão
    $nome_padrao = $array_aula_escola['nome_padrao'];

    // Deletando padrão e suas aulas
    $query_delete_padrao = $conn->prepare("DELETE FROM aula_escola WHERE nome_padrao = :nomePadrao AND fk_id_escola_aula_escola = :idEscola");
    $query_delete_padrao->bindParam(':nomePadrao', $nome_padrao, PDO::PARAM_STR);
    $query_delete_padrao->bindParam(':idEscola', $id_escola, PDO::PARAM_STR);

    $query_delete_padrao->execute();

    // Verificando sucesso
    if ($query_delete_padrao->rowCount()) {
?>
        <script>
            alert('Apagado com Sucesso!!');
            window.location = '<?php echo $location ?>';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Erro ao Apagar!!');
            window.location = '<?php echo $location ?>';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert('Erro ao Apagar, tente novamente!!');
        window.location = '<?php echo $location ?>';
    </script>
<?php
}
?>