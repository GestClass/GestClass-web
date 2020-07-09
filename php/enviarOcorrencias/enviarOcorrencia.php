<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$id_responsavel = $_POST["id_respon"];
$ocorrencia = $_POST["ocorrencia"];

if ($ocorrencia != "") {

    $inserirOcorrencia = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
    fk_envio_professor_id_professor,fk_id_tipo_usuario_envio, fk_recebimento_responsavel_id_responsavel)
    VALUES (:mensagem, 'Ocorrência',  NOW(),'0', :id_usuario, :tipo_usuario, :id_responsavel)");

    $inserirOcorrencia->bindParam(':mensagem', $ocorrencia, PDO::PARAM_STR);
    $inserirOcorrencia->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_STR);
    $inserirOcorrencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
    $inserirOcorrencia->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_STR);
    $inserirOcorrencia->execute();

    if ($inserirOcorrencia->rowCount()) {
        echo "<script>alert('Mensagem enviada com Sucesso!!');
    window.location = '../../homeProfessor.html.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem')
    //history.back();</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
