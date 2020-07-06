<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

if (($assunto != "") && ($mensagem != "")) {
    
    $selectDiretor = $conn->prepare("SELECT id_diretor FROM diretor where fk_id_escola_diretor =  $id_escola");
    $selectDiretor->execute();
    $diretor = $selectDiretor->fetch(PDO::FETCH_ASSOC);
    $id_diretor = $diretor["id_diretor"];

    $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
    fk_envio_secretario_id_secretario,fk_id_tipo_usuario_envio,fk_recebimento_diretor_id_diretor)
    VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario,:id_diretor)");
    
    $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_diretor', $id_diretor, PDO::PARAM_INT);
    $inserirMensagem->execute();

    if ($inserirMensagem->rowCount()) {
        echo "<script>alert('Mensagem enviada com Sucesso!!');
        window.location = '../../mensagensSecretaria.html.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
            history.back();</script>";
}
