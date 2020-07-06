<?php

include_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$destinatario = $_POST["destinatario"];
$usuario_tipo = $_POST["usuario_tipo"];
$mensagem = $_POST["mensagem"];
$assunto = $_POST["assunto"];

if (($assunto != "") && ($mensagem != "")) {

    if ($usuario_tipo == 1) {
        //respondendo para admin
        $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
        fk_envio_admin_id_admin,fk_id_tipo_usuario_envio,fk_recebimento_admin_id_admin) 
        VALUES (:mensagem, :assunto,  NOW(),'0', :id_usuario, :tipo_usuario, :destinatario)");

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
    }
    if ($usuario_tipo == 2) {
        //respondendo diretor

        $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao,
        fk_envio_admin_id_admin,fk_id_tipo_usuario_envio,fk_recebimento_diretor_id_diretor) 
        VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario,:destinatario)");

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
        echo "<script>alert('Houve algum erro')
                history.back();</script>";
    }
} else {
    echo "<script>alert('Preencha os Campos')
    history.back()</script>";
}
