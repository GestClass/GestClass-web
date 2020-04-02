<?php
session_start();

$turma = $_POST['turma'];

$_SESSION["value_id_turma"] = $turma;

echo $turma;
?>