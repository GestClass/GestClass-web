<?php

include_once '../conexao.php';

$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if (($assunto != "") && ($mensagem != "")) {

    $select_id_diretor = $conn->prepare("SELECT ID_diretor,fk_id_escola_diretor FROM diretor WHERE fk_id_escola_diretor = $destinatario");
    $select_id_diretor->execute();
    $diretor = $select_id_diretor->fetch(PDO::FETCH_ASSOC);
    $id_diretor = $diretor["ID_diretor"];

    $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao,  
    fk_envio_admin_id_admin,fk_id_tipo_usuario_envio,fk_recebimento_diretor_id_diretor,fk_id_escola_contato) 
    VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario, :tipo_usuario, :id_diretor,:id_escola)");
    
    $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_diretor', $id_diretor, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
    $inserirMensagem->execute();

    if ($inserirMensagem->rowCount()) {
        echo "<script>alert('Mensagem enviada com Sucesso!!');
        window.location = '../../feedbackEscolas.html.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
    }
} else {
    echo "<script>alert('Preencha os Campos')
    history.back()</script>";
}
