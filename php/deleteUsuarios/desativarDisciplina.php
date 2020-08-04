<?php

include_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// Preparando variáveis
$id_disciplina = $_GET['idDisciplina'];
$situacao = false;

// Verificar existência de grade curricular com essa disciplina
$sql_select_grade = $conn->prepare("SELECT turma.nome_turma AS turma FROM grade_curricular INNER JOIN turma ON (grade_curricular.fk_id_turma_grade_curricular = turma.ID_turma) WHERE grade_curricular.fk_id_disciplina_grade_curricular = $id_disciplina GROUP BY grade_curricular.fk_id_turma_grade_curricular;");
$sql_select_grade->execute();

if (!$sql_select_grade->rowCount()) {

    $sql_update_desativar = $conn->prepare("UPDATE disciplina SET situacao = :false WHERE fk_id_escola_disciplina = :id_escola AND ID_disciplina = :id_disciplina");
    $sql_update_desativar->bindParam(':false', $situacao, PDO::FETCH_ASSOC);
    $sql_update_desativar->bindParam(':id_escola', $id_escola, PDO::FETCH_ASSOC);
    $sql_update_desativar->bindParam(':id_disciplina', $id_disciplina, PDO::FETCH_ASSOC);
    $sql_update_desativar->execute();

    if ($sql_update_desativar->rowCount()) {
?>
        <script>
            alert('Disciplina desativada com sucesso!');
            window.location = '../../listaDisciplinas.html.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Erro ao desativas disciplina!');
            window.location = '../../listaDisciplinas.html.php';
        </script>
<?php
    }
} else {
    ?>
    <script>
        alert('Erro ao desativas disciplina, você possui grade(s) curricular(es) com esta disciplina cadastrada!\n\nTurma(s):<?php while($array_turmas = $sql_select_grade->fetch(PDO::FETCH_ASSOC)) { $nome_turma =  $array_turmas['turma']; echo '   ' . $nome_turma . ';   '; }?>');
        window.location = '../../listaDisciplinas.html.php';
    </script>
<?php
}
?>