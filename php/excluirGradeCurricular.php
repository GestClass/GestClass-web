<?php
include_once 'conexao.php';

// Resgatando valores da sessão
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// Valores vindo dos inputs hidden
$id_turma = $_POST['idTurma'];
$id_padrao = $_POST['idPadrao'];
$id_dia = $_POST['idDia'];

// Selecionando o turno da turma
$sql_select_nome_turma = $conn->prepare("SELECT fk_id_turno_turma AS id_turno FROM turma WHERE ID_turma = $id_turma");
$sql_select_nome_turma->execute();
$array_turma = $sql_select_nome_turma->fetch(PDO::FETCH_ASSOC);
$turno_turma = $array_turma['id_turno'];

// Selecionar nome do padrão de horários
$sql_selct_nome_padrao = $conn->prepare("SELECT nome_padrao FROM aula_escola WHERE ID_aula_escola = $id_padrao");
$sql_selct_nome_padrao->execute();
$array_nome_padrao = $sql_selct_nome_padrao->fetch(PDO::FETCH_ASSOC);
$nome_padrao = $array_nome_padrao['nome_padrao'];

// Variavel para verificação de sucesso
$status = 0;
$contador = 0;

// Selecionar dados do padrão de horário
$sql_select_padrao = $conn->prepare("SELECT ID_aula_escola, nome_aula, aula_start, aula_end FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola AND fk_id_turno_aula_escola = $turno_turma AND nome_padrao = '$nome_padrao' ORDER BY aula_start ASC");
$sql_select_padrao->execute();
while ($array_aula_escola = $sql_select_padrao->fetch(PDO::FETCH_ASSOC)) {
    // Incrementando contador
    $contador += 1;

    // Resgatar valores da consulta
    $id_aula = $array_aula_escola['ID_aula_escola'];

    $sql_delete_grade = $conn->prepare("DELETE FROM grade_curricular WHERE fk_id_dia_semana_grade_curricular = :id_dia AND fk_id_aula_escola_grade_curricular = :id_aula AND fk_id_turma_grade_curricular = :id_turma");
    $sql_delete_grade->bindParam(':id_dia', $id_dia, PDO::PARAM_STR);
    $sql_delete_grade->bindParam(':id_aula', $id_aula, PDO::PARAM_STR);
    $sql_delete_grade->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);
    $sql_delete_grade->execute();

    if ($sql_delete_grade->rowCount()) {
        $status += 1;
    }
}

if ($contador == $status) {
    if ($id_usuario == 2) {
?>
        <script>
            alert('Dados apagados com sucesso!!');
           // window.location = "../homeDiretor.html.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Dados apagados com sucesso!!');
           // window.location = "../homeSecretario.html.php";
        </script>
    <?php
    }
} else {
    if ($id_usuario == 2) {
    ?>
        <script>
            alert('Erro ao apagar Dados!!');
           // window.location = "../homeDiretor.html.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Erro ao apagar Dados!!');
            //window.location = "../homeSecretario.html.php";
        </script>
<?php
    }
}
