<?php

include_once 'conexao.php';

// Resgatando valores
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

if ($id_tipo_usuario == 2) {
    $location = "../homeDiretor.html.php";
} elseif ($id_tipo_usuario == 3) {
    $location = "../homeSecretaria.html.php";
}

$id_padrao = $_POST['idPadrao'];
$nome_padrao_orig = $_POST['nomePadrao'];

// Resgatando nome do padrão
$query_select_nome_padrao = $conn->prepare("SELECT nome_padrao FROM aula_escola WHERE ID_aula_escola = $id_padrao AND fk_id_escola_aula_escola = $id_escola");
$query_select_nome_padrao->execute();


// Verificando sucesso
if ($query_select_nome_padrao->rowCount()) {

    // Armazenando array com valores
    $array_aula_escola = $query_select_nome_padrao->fetch(PDO::FETCH_ASSOC);

    // Armazenando o nome do padrão
    $nome_padrao = $array_aula_escola['nome_padrao'];

    $query_select_id_aula = $conn->prepare("SELECT ID_aula_escola FROM aula_escola WHERE nome_padrao = 'padrão manhã' AND fk_id_escola_aula_escola = 1");
    $query_select_id_aula->execute();

    // Verificando sucesso
    if ($query_select_id_aula->rowCount()) {

        while ($array_id_aula = $query_select_id_aula->fetch(PDO::FETCH_ASSOC)) {

            $id_aula = $array_id_aula['ID_aula_escola'];


            // recuperando dados do form
            $nome_aula = $_POST['aula' . $id_aula];
            $inicio = $_POST['inicio' . $id_aula];
            $fim = $_POST['termino' . $id_aula];

            $query_update_aulas = $conn->prepare("UPDATE aula_escola SET nome_padrao = :nomePadrao, nome_aula = :nomeAula, aula_start = :inicio, aula_end = :fim WHERE ID_aula_escola = :idAula");

            $query_update_aulas->bindParam(':nomePadrao', $nome_padrao_orig, PDO::PARAM_STR);
            $query_update_aulas->bindParam(':nomeAula', $nome_aula, PDO::PARAM_STR);
            $query_update_aulas->bindParam(':inicio', $inicio, PDO::PARAM_STR);
            $query_update_aulas->bindParam(':fim', $fim, PDO::PARAM_STR);
            $query_update_aulas->bindParam(':idAula', $id_aula, PDO::PARAM_STR);

            $query_update_aulas->execute();

        }
        ?>
        <script>
            alert('Alterado com Sucesso!!');
            window.location = '<?php echo $location; ?>';
        </script>
    <?php

    } else {
        ?>
        <script>
            alert('Erro ao Alterar!!');
            window.location = '<?php echo $location; ?>';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert('Erro ao Alterar!!');
        window.location = '<?php echo $location; ?>';
    </script>
<?php
}
