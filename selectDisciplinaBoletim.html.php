<!DOCTYPE html>
<?php

require_once './reqProfessor.php';
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];


$id_turma = $_POST['turmas'];

if ($id_turma == null) {
?>
    <script>
        alert('Por favor, Selecione uma turma!!');
        history.back();
    </script>
<?php
} else {


    // echo "id usuario ->".$id_usuario."</br>";
    // echo "id tipo usuario ->".$id_tipo_usuario."</br>";
    // echo "id escola ->".$id_escola."</br>";

?>


    <body class='bodyDisciplinaGrafico'>
        <button id="btnTable" type="submit" href='#modalBoletimSelect' class=" btnDisciplina modal-trigger  btn-flat btnLightBlue center">
            Selecionar Disciplina
        </button>
        <div id="modalBoletimSelect" class="modal" data-backdrop="static">
            <div class="modal-content">
                <div class="input-field col s12 validate">
                    <form action="boletimCadastro.html.php" method="POST">
                        <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                        <h4 class="center">Selecione a Disciplina</h4>
                        <div class='select'>
                            <select name="disciplinas">
                                <option value="" disabled selected>Selecione a Disciplina</option>
                                <h4>Selecione a matéria desejada</h4>
                                <i class="material-icons prefix blue-icon">library_books</i>
                                <?php
                                $query_select_disciplina_turma_professor = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor, disciplina.nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = ID_disciplina) WHERE disciplinas_professor.fk_id_professor_disciplinas_professor = $id_usuario AND disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma GROUP BY disciplina.nome_disciplina");
                                $query_select_disciplina_turma_professor->execute();

                                while ($dados_disciplina_turma_professor = $query_select_disciplina_turma_professor->fetch(PDO::FETCH_ASSOC)) {

                                    $id_disciplina = $dados_disciplina_turma_professor["fk_id_disciplina_professor_disciplinas_professor"];
                                    $nome_disciplina = $dados_disciplina_turma_professor["nome_disciplina"];
                                ?>
                                    <option value="<?php echo $id_disciplina ?>"><?php echo $nome_disciplina ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <div class="center">
                                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                                    <i class="material-icons left">search</i>Pesquisar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
    require_once 'reqFooter.php';
}
    ?>