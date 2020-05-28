<?php
require_once  'conexao.php';


$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$dataChamada = $_POST['dataChamada'];
// Alterar abaixo para o valor quando vier do <select>
$id_disciplina = 1;
$id_professor = $id_usuario;

if ($dataChamada != "") {


    $query_select_alunos = $conn->prepare("SELECT nome_aluno, RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = 16");
    $query_select_alunos->execute();

    while ($dados_alunos = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {

        $presenca = $_POST[$dados_alunos['RA'] . 'presenca'];
        $ra = $dados_alunos['RA'];

        $query_inser_chamada = $conn->prepare('INSERT INTO chamada_aluno (presenca, data_aula, fk_ra_aluno_chamada_aluno, fk_id_disciplina_chamada_aluno, fk_id_professor_chamada_aluno) 
                                    VALUES (:presenca, :data_aula, :ra_aluno, :id_disciplina, :id_professor)');

        $query_inser_chamada->bindParam(':presenca', $presenca);
        $query_inser_chamada->bindParam(':data_aula', $dataChamada);
        $query_inser_chamada->bindParam(':ra_aluno', $ra);
        $query_inser_chamada->bindParam(':id_disciplina', $id_disciplina);
        $query_inser_chamada->bindParam(':id_professor', $id_professor);

        $query_inser_chamada->execute();

        if ($query_inser_chamada->rowCount()) {
?>
            <script>
                alert('Cadastrado com Sucesso!!')
                window.location = '../homeProfessor.html.php'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Erro ao  Cadastrar!!')
                history.back();
            </script>
    <?php
        }
    }
} else {
    ?>
    <script>
        alert('Por favor, selecione a Data!')
        history.back();
    </script>
<?php
}

?>