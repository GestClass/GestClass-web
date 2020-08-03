<?php

include_once './conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// preparando variáveis
$id_disciplina = $_POST['idDisciplina'];
$situacao = true;

$sql_update_disciplina = $conn->prepare("UPDATE disciplina SET situacao = :true WHERE fk_id_escola_disciplina = :id_escola AND ID_disciplina = :id_disciplina");
$sql_update_disciplina->bindParam(':true', $situacao, PDO::FETCH_ASSOC);
$sql_update_disciplina->bindParam(':id_escola', $id_escola, PDO::FETCH_ASSOC);
$sql_update_disciplina->bindParam(':id_disciplina', $id_disciplina, PDO::FETCH_ASSOC);
$sql_update_disciplina->execute();

if ($sql_update_disciplina->rowCount()) {
?>
    <script>
        alert('Disciplina Ativada com Sucesso!!');
        history.back();
    </script>
<?php
} else {
?>
    <script>
        alert('Erro ao ativar disciplina!!');
        history.back();
    </script>
<?php
}

?>