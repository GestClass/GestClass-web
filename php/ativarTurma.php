<?php

include_once './conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_turma = $_POST['idTurma'];
$situacao = true;

$sql_ativar_turma = $conn->prepare("UPDATE turma SET situacao = :true WHERE ID_turma = :id_turma");
$sql_ativar_turma->bindParam(':true', $situacao, PDO::PARAM_STR);
$sql_ativar_turma->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);
$sql_ativar_turma->execute();

if ($sql_ativar_turma->rowCount()) {
?>
    <script>
        alert('Turma reativada com sucesso!');
        window.location = "../listaTurmas.html.php";
    </script>
<?php
} else {
?>
    <script>
        alert('Erro ao reativar turma!');
        window.location = "../listaTurmas.html.php";
    </script>
<?php
}

?>