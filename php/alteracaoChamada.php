<?php

include_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];


// Substituir abaixo pelo valor do <select>
$idTurma = 16;



$query_select_alunos = $conn->prepare("SELECT nome_aluno, RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $idTurma");
$query_select_alunos->execute();

while ($dados_alunos = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {

    if (isset($_POST[$dados_alunos['RA'] . 'presenca'])) {

        $presenca =  1;

    } else {

        $presenca = 0;
    }

    $dataChamada = $_POST['dataChamada' . $dados_alunos['RA']];
    $idChamada = $_POST['idChamada' . $dados_alunos['RA']];
    //var_dump($_POST);

    $query_update_chamada = $conn->prepare('UPDATE chamada_aluno SET presenca = :presenca WHERE fk_ra_aluno_chamada_aluno = '.$dados_alunos['RA'].' AND data_aula = "'.$dataChamada.'" AND fk_id_listagem_chamada_aluno = '.$idChamada.'');
    
    $query_update_chamada->bindParam(':presenca', $presenca);

    $query_update_chamada->execute();
}
?>

<script>
    alert('Alterado com Sucesso!!')
    window.location = '../homeProfessor.html.php'
</script>

