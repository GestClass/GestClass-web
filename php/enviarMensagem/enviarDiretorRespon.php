<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

$cpf_respon = $_POST["cpf_respon"];
$cpf_res = str_replace('.', '', $cpf_respon);
$cpf_responsavel = str_replace('-', '', $cpf_res);
$query = $conn->prepare("select id_responsavel from responsavel where cpf=$cpf_responsavel");
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);
$id_responsavel = $dados['id_responsavel'];

?>