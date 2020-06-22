<?php
require_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// Selecionar média da escola
$sql_select_media = $conn->prepare("SELECT media_min FROM escola where ID_escola = $id_escola");
$sql_select_media->execute();
$array_media = $sql_select_media->fetch(PDO::FETCH_ASSOC);
$media = $array_media['media_min'];
echo $media;

$nomeAtividade = $_POST['nomeAtividade'];
$dataOriginal = $_POST['dataAtividade'];
$data = str_replace('/', '-', $dataOriginal);
$dataAtividade = date('Y-m-d', strtotime($data));
$id = null;

$id_disciplina =  $_POST['id_disciplina'];
$id_turma = $_POST['id_turma'];
$idProfessor = $id_usuario;

if (($nomeAtividade != "") && ($dataAtividade != "")) {

    $query_insert_boletim_listagem = $conn->prepare("INSERT INTO boletim_listagem VALUES (:id, :id_escola, :id_disciplina)");

    $query_insert_boletim_listagem->bindParam(':id', $id, PDO::PARAM_STR);
    $query_insert_boletim_listagem->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
    $query_insert_boletim_listagem->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_STR);
    $query_insert_boletim_listagem->execute();

    if ($query_insert_boletim_listagem->rowCount()) {

        $query_select_id_listagem = $conn->prepare("SELECT MAX(ID_boletim_listagem)AS id_listagem FROM boletim_listagem WHERE fk_id_escola_boletim_listagem = $id_escola");
        $query_select_id_listagem->execute();

        $array_id_listagem = $query_select_id_listagem->fetch(PDO::FETCH_ASSOC);

        $id_listagem = $array_id_listagem['id_listagem'];


        $query_listagem = $conn->prepare("SELECT RA, nome_aluno FROM aluno WHERE fk_id_escola_aluno =  $id_escola AND fk_id_turma_aluno = $id_turma");
        $query_listagem->execute();

        while ($alunos = $query_listagem->fetch(PDO::FETCH_ASSOC)) {

            $ra = $alunos['RA'];
            $nota = $_POST[$ra . 'nota'];
            $observacao = $_POST[$ra . 'observacao'];

            if ($nota == "") {
                $nota = 0;
            }

            if (($nota < $media) && ($observacao == '')) {

?>

                <script>
                    alert('Por favor, insira uma observação para alunos com nota abaixo da média!!')
                    history.back();
                </script>

                <?php
            } else {

                $query_insert = $conn->prepare('INSERT INTO boletim_aluno VALUES(:id, :nota, :observacoes, :nome_atividade, :data_atividade, :ra, :id_disciplina, :id_boletim_listagem, :id_turma)');

                $query_insert->bindParam(':id', $id, PDO::PARAM_STR);
                $query_insert->bindParam(':nota', $nota, PDO::PARAM_STR);
                $query_insert->bindParam(':observacoes', $observacao, PDO::PARAM_STR);
                $query_insert->bindParam(':nome_atividade', $nomeAtividade, PDO::PARAM_STR);
                $query_insert->bindParam(':data_atividade', $dataAtividade, PDO::PARAM_STR);
                $query_insert->bindParam(':ra', $ra, PDO::PARAM_STR);
                $query_insert->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_STR);
                $query_insert->bindParam(':id_boletim_listagem', $id_listagem, PDO::PARAM_STR);
                $query_insert->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);

                $query_insert->execute();

                if ($query_insert->rowCount()) {
                ?>
                    <script>
                        alert("Cadastrado com sucesso!!")
                        //window.location = '../homeProfessor.html.php'
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
            }
        }
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
?>