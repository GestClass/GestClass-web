<?php
include_once 'conexao.php';

$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];

$query = $conn ("select * from aluno");
$query->execute();












 ?>
