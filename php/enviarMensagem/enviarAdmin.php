<?php

include_once '../conexao.php';

$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if (($assunto != "") && ($mensagem != "")) {

    $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao,  
    fk_envio_admin_id_admin,fk_id_tipo_usuario_envio,fk_recebimento_admin_id_admin) 
    VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario, :tipo_usuario,:destinatario)");
    
    $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
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
