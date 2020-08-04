<?php

require_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_turma = $_GET['idTurma'];
$situacao = false;

// Select para averiguar alunos ativos nesta turma
$sql_select_alunos_turma = $conn->prepare("SELECT ra FROM aluno WHERE fk_id_turma_aluno = $id_turma AND fk_id_escola_aluno = $id_escola AND situacao = true");
$sql_select_alunos_turma->execute();

if ($sql_select_alunos_turma->rowCount()) {
?>
    <script>
        alert('Erro ao desativar turma, alunos ativos dentro desta turma!');
        window.location = '../../listaTurmas.html.php';
    </script>
    <?php
} else {

    // Verificar existência de uma grade curricular
    $sql_select_grade = $conn->prepare("SELECT * FROM grade_curricular WHERE fk_id_turma_grade_curricular = $id_turma");
    $sql_select_grade->execute();

    // Verificar retorno
    if ($sql_select_grade->rowCount()) {

        // Delete da grade curricular
        $sql_delete_grade = $conn->prepare("DELETE FROM grade_curricular WHERE fk_id_turma_grade_curricular = :id_turma");
        $sql_delete_grade->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);
        $sql_delete_grade->execute();

        // Verificar sucesso da deleção de grade curricular
        if ($sql_delete_grade->rowCount()) {

            // Update para desativar turma
            $sql_desativar_turma = $conn->prepare("UPDATE turma SET situacao = :false WHERE ID_turma = :id_turma AND fk_id_escola_turma = :id_escola");
            $sql_desativar_turma->bindParam(':false', $situacao, PDO::PARAM_STR);
            $sql_desativar_turma->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);
            $sql_desativar_turma->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
            $sql_desativar_turma->execute();

            if ($sql_desativar_turma->rowCount()) {
    ?>
                <script>
                    alert('Turma desativada e grade curricular apagada com sucesso!');
                    window.location = '../../listaTurmas.html.php';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Erro ao desativar turma!');
                    window.location = '../../listaTurmas.html.php';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Erro ao excluir grade curricular da turma e desativa-la!');
                window.location = '../../listaTurmas.html.php';
            </script>
        <?php
        }
    } else {
        // Update para desativar turma
        $sql_desativar_turma = $conn->prepare("UPDATE turma SET situacao = :false WHERE ID_turma = :id_turma AND fk_id_escola_turma = :id_escola");
        $sql_desativar_turma->bindParam(':false', $situacao, PDO::PARAM_STR);
        $sql_desativar_turma->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);
        $sql_desativar_turma->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
        $sql_desativar_turma->execute();

        if ($sql_desativar_turma->rowCount()) {
        ?>
            <script>
                alert('Turma desativada com sucesso!');
                window.location = '../../listaTurmas.html.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Erro ao desativar turma!');
                window.location = '../../listaTurmas.html.php';
            </script>
<?php
        }
    }
}
?>