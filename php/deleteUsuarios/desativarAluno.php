<?php

require_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$ra = $_GET['raAluno'];


$situacao = 0;
$id_resp_novo = null;

// Selecionar id do responsavel
$select_aluno = $conn->prepare("SELECT fk_id_responsavel_aluno FROM aluno WHERE RA = $ra AND fk_id_escola_aluno = $id_escola");
$select_aluno->execute();

$sql_update = $conn->prepare("UPDATE aluno SET fk_id_responsavel_aluno = :id_resp_novo, situacao = :situacao, id_tipo_usuario_exclusor = :id_tipo_usuario, id_usuario_exclusor = :id_usuario, data_exclusao = NOW() WHERE ra = :ra AND fk_id_escola_aluno = :id_escola");

$sql_update->bindParam(':id_resp_novo', $id_resp_novo, PDO::PARAM_STR);
$sql_update->bindParam(':situacao', $situacao, PDO::PARAM_STR);
$sql_update->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_STR);
$sql_update->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
$sql_update->bindParam(':ra', $ra, PDO::PARAM_STR);
$sql_update->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);

$sql_update->execute();

if ($sql_update->rowCount()) {

    // Verificar existência de registro do id do responsável
    if ($select_aluno->rowCount()) {

        // Armazenar id do responsavel
        $dados_aluno_array = $select_aluno->fetch(PDO::FETCH_ASSOC);
        $id_responsavel = $dados_aluno_array['fk_id_responsavel_aluno'];

        // Selecionar outros alunos para esse responsável
        $select_alunos_responsavel = $conn->prepare("SELECT * FROM aluno WHERE fk_id_responsavel_aluno = $id_responsavel AND situacao = true");
        $select_alunos_responsavel->execute();

        // Verificar existência
        if ($select_alunos_responsavel->rowCount()) {

            $existencia = true;
        } else {

            $existencia = false;

            $sql_delete_responsavel = $conn->prepare("DELETE FROM responsavel WHERE ID_responsavel = :idResponsavel");
            $sql_delete_responsavel->bindParam(':idResponsavel', $id_responsavel, PDO::PARAM_STMT);
            $sql_delete_responsavel->execute();

            if ($sql_delete_responsavel->rowCount()) {
                $ex_resp = true;
            } else {
                $ex_resp = false;
            }
        }
    } else {
        // Vazio
    }

    if ($id_tipo_usuario == 2) {
?>
        <script>
            alert('Aluno desativado com sucesso!!');
            <?php
            if (($existencia == false) && ($ex_resp == true)) {
            ?>
                alert('Responsável sem outro aluno cadastrado e excluído com sucesso!!');
            <?php
            } elseif (($existencia == false && ($ex_resp == false))) {
            ?>
                alert('Responsável sem outro aluno cadastrado, porém erro ao excluí-lo!!');
            <?php
            }
            ?>
            window.location = "../../homeDiretor.html.php";
        </script>
    <?php
    } elseif ($id_tipo_usuario == 3) {
    ?>
        <script>
            alert('Aluno desativado com sucesso!!');
            <?php
            if (($existencia == false) && ($ex_resp == true)) {
            ?>
                alert('Responsável sem outro aluno cadastrado e excluído com sucesso!!');
            <?php
            } elseif (($existencia == false && ($ex_resp == false))) {
            ?>
                alert('Responsável sem outro aluno cadastrado, porém erro ao excluí-lo!!');
            <?php
            }
            ?>
            window.location = "../../homeSecretaria.html.php";
        </script>
    <?php
    }
} else {
    if ($id_tipo_usuario == 2) {
    ?>
        <script>
            alert('Erro ao desativar aluno!!');
            window.location = "../../homeDiretor.html.php";
        </script>
    <?php
    } elseif ($id_tipo_usuario == 3) {
    ?>
        <script>
            alert('Erro ao desativar aluno!!');
            window.location = "../../homeSecretaria.html.php";
        </script>
<?php
    }
}
?>