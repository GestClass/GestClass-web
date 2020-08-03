<?php

include_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// Preparando variáveis
$id_disciplina = $_GET['idDisciplina'];
$situacao = false;

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

?>