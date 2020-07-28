<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$turma = $_POST["turma"];
$disciplina = $_POST["disciplina"];
$assunto = $_POST["assunto"];
$material = $_POST["material"];

?>