<?php
require_once 'conexao.php';

$nomeAtividade = $_POST['nomeAtividade'];
$dataAtividade = $_POST['dataAtividade'];
$id = null;

$query_listagem = $conn->prepare('SELECT RA, nome_aluno FROM aluno WHERE fk_id_escola_aluno = 1 AND fk_id_turma_aluno = 16');
$query_listagem->execute();

while ($alunos = $query_listagem->fetch(PDO::FETCH_ASSOC)) {

    $nota = $_POST[$alunos['RA'] . 'nota'];
    $observacao = $_POST[$alunos['RA'] . 'observacao'];
    $ra = $alunos['RA'];
    // Alterar o campo abaixo com a disciplina vinda do <select>
    $disciplina =  1;
    $idProfessor = 1;

    if ($nota == "") {
        $nota = 0;
    }

    if (($nomeAtividade != "") && ($dataAtividade != "")) {

        $query_insert = $conn->prepare('INSERT INTO boletim_aluno VALUES(:id, :nota, :observacoes, :nome_atividade, :data_atividade, :ra, :id_disciplina)');

        $query_insert->bindParam(':id', $id, PDO::PARAM_STR);
        $query_insert->bindParam(':nota', $nota, PDO::PARAM_STR);
        $query_insert->bindParam(':observacoes', $observacao, PDO::PARAM_STR);
        $query_insert->bindParam(':nome_atividade', $nomeAtividade, PDO::PARAM_STR);
        $query_insert->bindParam(':data_atividade', $dataAtividade, PDO::PARAM_STR);
        $query_insert->bindParam(':ra', $ra, PDO::PARAM_STR);
        $query_insert->bindParam(':id_disciplina', $disciplina, PDO::PARAM_STR);        

        $query_insert->execute();

        if ($query_insert->rowCount()) {
?>
            <script>
                alert("Cadastrado com sucesso!!")
                window.location = '../homeProfessor.html.php'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Erro ao cadastrar!!")
                history.back()
            </script>
<?php
        }
    } else {
        ?>
            <script>
                alert("Por favor, preencha o Nome e a Data da Atividade!!")
                history.back()
            </script>
        <?php
    }
}
?>