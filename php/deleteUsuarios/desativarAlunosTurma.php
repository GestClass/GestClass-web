<?php

include_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_turma = $_GET['idTurma'];
$situacao = false;
$qtde = 0;
$qtde_final = 0;

// Select aluno para verificar quantidade de registros
$sql_select_alunos = $conn->prepare("SELECT ra FROM aluno WHERE fk_id_turma_aluno = $id_turma AND fk_id_escola_aluno = $id_escola AND situacao = true");
$sql_select_alunos->execute();

if ($sql_select_alunos->rowCount()) {

    while ($aluno_array = $sql_select_alunos->fetch(PDO::FETCH_ASSOC)) {
        $qtde += 1;
    }
} else {
?>
    <script>
        alert('Nenhum aluno encontrado!');
        window.location = '../../listaTurmas.html.php';
    </script>
<?php
}

// Selecionar alunos para update de desativação
$sql_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_turma_aluno = $id_turma AND fk_id_escola_aluno = $id_escola AND situacao = true");
$sql_select_alunos->execute();

if ($sql_select_alunos->rowCount()) {

    while ($aluno_array = $sql_select_alunos->fetch(PDO::FETCH_ASSOC)) {

        $ra = $aluno_array['RA'];

        $sql_desativar_aluno = $conn->prepare("UPDATE aluno SET situacao = :false, id_tipo_usuario_exclusor = :id_tipo_usuario, id_usuario_exclusor = :id_usuario, data_exclusao = NOW() WHERE RA = :ra");
        $sql_desativar_aluno->bindParam(':false', $situacao, PDO::FETCH_ASSOC);
        $sql_desativar_aluno->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::FETCH_ASSOC);
        $sql_desativar_aluno->bindParam(':id_usuario', $id_usuario, PDO::FETCH_ASSOC);
        $sql_desativar_aluno->bindParam(':ra', $ra, PDO::FETCH_ASSOC);
        $sql_desativar_aluno->execute();

        if ($sql_desativar_aluno->rowCount()) {
            $qtde_final += 1;
        } else {
            $qtde_final += 0;
        }
    }
} else {
?>
    <script>
        alert('Nenhum aluno encontrado!');
        window.location = '../../listaTurmas.html.php';
    </script>
<?php
}


if ($qtde_final == $qtde) {
?>
    <script>
        alert('Alunos desativados com sucesso!');
        window.location = '../../listaTurmas.html.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Erro, um ou mais alunos não foram desativados!');
        //window.location = '../../listaTurmas.html.php';
    </script>
<?php
echo $qtde . '<br>' . $qtde_final;
}

?>