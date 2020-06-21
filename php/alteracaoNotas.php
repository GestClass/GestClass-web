<?php

include_once 'conexao.php';

// Valores da sessão
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// Armazenndo o nome da atividadeS
$nome_atividade = $_POST['nomeAtividade'];
// Armazenando id da turma
$id_turma = $_POST['id_turma'];

// Verificando se o campo está vazio
if ($nome_atividade != "") {

    $query_listagem_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
    $query_listagem_alunos->execute();

    while ($alunos = $query_listagem_alunos->fetch(PDO::FETCH_ASSOC)) {
        // Armazenando ra e nome do aluno
        $ra = $alunos['RA'];
        // Armazenando id do boletim
        $id_boletim = $_POST[$ra . 'id_boletim'];

        $nota = $_POST[$ra . 'nota'];
        $observacao = $_POST[$ra . 'observacao'];

        $query_update_boletim = $conn->prepare("UPDATE boletim_aluno SET nota = :nota, observacoes = :observacao, nome_atividade = :nome_atividade WHERE fk_ra_aluno_boletim_aluno = $ra AND ID_boletim_aluno = $id_boletim");

        $query_update_boletim->bindParam(':nota', $nota, PDO::PARAM_STR);
        $query_update_boletim->bindParam(':observacao', $observacao, PDO::PARAM_STR);
        $query_update_boletim->bindParam(':nome_atividade', $nome_atividade, PDO::PARAM_STR);

        $query_update_boletim->execute();

        if ($query_update_boletim->rowCount()) {
?>

            <script>
                alert('Alterado com sucesso!!')
                window.location = '../homeprofessor.html.php'
            </script>

    <?php
        }
    }
} else {
    ?>
    <script>
        alert('Desculpe, você precisa inserir um nome para a atividade!!');
        window.location = "../boletimCadastro.html.php";
    </script>
<?php
}
?>