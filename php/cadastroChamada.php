<?php
require_once  'conexao.php';


$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];
$dataChamada_original = $_POST['dataChamada'];
$data = str_replace('/', '-', $dataChamada_original);
$dataChamada = date('Y-m-d', strtotime($data));
// Alterar abaixo para o valor quando vier do <select>
$id_professor = $id_usuario;
$id_disciplina=$_SESSION["id_disciplinas"];
$id_turma=$_SESSION['id_turma'];

if ($dataChamada != "") {

    $query_insert_listagem_chamada = $conn->prepare('INSERT INTO listagem_chamada (data_chamada, fk_id_escola_listagem_chamada, fk_id_disciplina_listagem_chamada, fk_id_professor_listagem_chamada)
                                     VALUES (:data_chamada, :id_escola, :id_disciplina, :id_professor)');

    $query_insert_listagem_chamada->bindParam(':data_chamada', $dataChamada);
    $query_insert_listagem_chamada->bindParam(':id_escola', $id_escola);
    $query_insert_listagem_chamada->bindParam(':id_disciplina', $id_disciplina);
    $query_insert_listagem_chamada->bindParam(':id_professor', $id_usuario);


    $query_insert_listagem_chamada->execute();

    $query_id_listagem = $conn->prepare('SELECT MAX(ID_listagem) FROM listagem_chamada WHERE fk_id_escola_listagem_chamada = 1');

    $query_id_listagem->execute();

    while ($id_listagem = $query_id_listagem->fetch(PDO::FETCH_ASSOC)) {

        $id = $id_listagem['MAX(ID_listagem)'];
        
        $query_select_alunos = $conn->prepare("SELECT nome_aluno, RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
        $query_select_alunos->execute();

        while ($dados_alunos = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {
            if (isset($_POST[$dados_alunos['RA'] . 'presenca'])) {
                $presenca = 1;
            } else {
                $presenca = 0;
            }
            $ra = $dados_alunos['RA'];

            $query_insert_chamada = $conn->prepare('INSERT INTO chamada_aluno (presenca, data_aula, fk_ra_aluno_chamada_aluno, fk_id_disciplina_chamada_aluno, fk_id_professor_chamada_aluno, fk_id_listagem_chamada_aluno) 
                                    VALUES (:presenca, :data_aula, :ra_aluno, :id_disciplina, :id_professor, :id_listagem)');

            $query_insert_chamada->bindParam(':presenca', $presenca);
            $query_insert_chamada->bindParam(':data_aula', $dataChamada);
            $query_insert_chamada->bindParam(':ra_aluno', $ra);
            $query_insert_chamada->bindParam(':id_disciplina', $id_disciplina);
            $query_insert_chamada->bindParam(':id_professor', $id_professor);
            $query_insert_chamada->bindParam('id_listagem', $id);

            $query_insert_chamada->execute();

            if ($query_insert_chamada->rowCount()) {
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

