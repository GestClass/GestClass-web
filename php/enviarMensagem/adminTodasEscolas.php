<?php

include_once '../conexao.php';

$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if (($assunto != "") && ($mensagem != "")) {

    $select_id_diretor = $conn->prepare("SELECT * FROM diretor");
    $select_id_diretor->execute();

    while ($dados_diretor = $select_id_diretor->fetch(PDO::FETCH_ASSOC)) {
        if (isset($dados_diretor["ID_diretor"])) {
            $id_diretor = $dados_diretor["ID_diretor"];

            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao,  
            fk_envio_admin_id_admin,fk_id_tipo_usuario_envio,fk_recebimento_diretor_id_diretor) 
            VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario, :id_diretor)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_diretor', $id_diretor, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../feedbackEscolas.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
            }
        }else {
            echo "<script>alert('Houve algum erro')
            history.back()</script>";
        }
    }
} else {
    echo "<script>alert('Preencha os Campos')
    history.back()</script>";
}
