<?php

include_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

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

$contador = 0;

// Selecionar dados do padrão de horário
$sql_select_padrao = $conn->prepare("SELECT nome_aula, aula_start, aula_end FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola AND fk_id_turno_aula_escola = $turno_turma AND nome_padrao = '$nome_padrao' ORDER BY aula_start ASC");
$sql_select_padrao->execute();
while ($array_aula_escola = $sql_select_padrao->fetch(PDO::FETCH_ASSOC)) {
    $contador += 1;
    $disciplina = $_POST[$contador];
    var_dump($_POST);
    echo '<hr>';
}
