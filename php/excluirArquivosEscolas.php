<?php
include_once 'conexao.php';
$id_escola = $_GET["id"];
$opcao = $_GET["opc"];

if ($opcao == 1) {
    //Excluir todas mensagens da escola escolhida

    $query_delete = $conn->prepare("DELETE FROM contato WHERE fk_id_escola_contato = $id_escola");
    $query_delete->execute();

    if ($query_delete->rowCount()) {
        echo "<script>alert('Mensagens excluídas com sucesso');
        window.location = '../homeAdmGest.html.php';</script>";
    } else {
        echo "<script>alert('ERRO! Mensagens não excluídas, ou não existem mensagens para serem excluídas');
        history.back();</script>";
    }
} elseif ($opcao == 2) {
    //Excluir todos materiais de apoio da escola escolhida
    $query_delete = $conn->prepare("DELETE FROM envio_material_apoio WHERE fk_id_escola_material = $id_escola");
    $query_delete->execute();

    if ($query_delete->rowCount()) {
        echo "<script>alert('Materiais de apoio excluídos com sucesso');
        window.location = '../homeAdmGest.html.php';</script>";
    } else {
        echo "<script>alert('ERRO! Materiais não excluídos, ou não existem materiais para serem excluídos');
        history.back();</script>";
    }
} elseif ($opcao == 3) {
    //Excluir todos arquivos enviado aos responsáveis
    $query_delete = $conn->prepare("DELETE FROM envio_boleto WHERE fk_id_escola_boleto = $id_escola");
    $query_delete->execute();

    if ($query_delete->rowCount()) {
        echo "<script>alert('Arquivos excluídos com sucesso');
        window.location = '../homeAdmGest.html.php';</script>";
    } else {
        echo "<script>alert('ERRO! Arquivos não excluídos, ou não existem arquivos para serem excluídos');
        history.back();</script>";
    }
} else {
    echo "<script>alert('OPS! Houve algum erro');
    window.location = '../homeAdmGest.html.php';</script>";
}
