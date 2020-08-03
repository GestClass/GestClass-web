<?php
include_once 'conexao.php';
$id_escola = $_GET["id"];
$opcao = $_GET["opc"];

if ($opcao == 1) {
    //Excluir todas mensagens da escola escolhida
} elseif ($opcao == 2) {
    //Excluir todos materiais de apoio da escola escolhida
} elseif ($opcao == 3) {
    //Excluir todos arquivos enviado aos responsáveis
} else {
    echo "<script>alert('OPS! Houve algum erro');
    window.location = '../homeAdmGest.html.php';</script>";
}
