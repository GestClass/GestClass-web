<?php

include_once 'conexao.php';

$query_listagem_alunos = $conn->prepare('SELECT RA, nome_aluno FROM aluno WHERE fk_id_escola_aluno = 1 AND fk_id_turma_aluno = 16');
$query_listagem_alunos->execute();

while ($alunos = $query_listagem_alunos->fetch(PDO::FETCH_ASSOC)) {

    $nota = $_POST[$alunos['RA'] . 'nota'];
    $observacao = $_POST[$alunos['RA'] . 'observacao'];
    $idBoletim = $_POST['idBoletim'.$alunos['RA']];


    $query_update_boletim = $conn->prepare('UPDATE boletim_aluno SET nota = :nota, observacoes = :observacao WHERE fk_ra_aluno_boletim_aluno = ' . $alunos['RA'] . ' AND ID_boletim_aluno = '.$idBoletim.'');

    $query_update_boletim->bindParam(':nota', $nota);
    $query_update_boletim->bindParam(':observacao', $observacao);

    $query_update_boletim->execute();

    if ($query_update_boletim->rowCount()) {
?>

        <script>
            alert('Alterado com sucesso!!')
            window.location = '../homeprofessor.html.php'
        </script>

    <?php
    } else {
    ?>

        <script>
            alert('Erro na alteração, tente novamente!!')
            window.location = '../boletimCadastro.html.php'
        </script>

<?php
    }
}
?>