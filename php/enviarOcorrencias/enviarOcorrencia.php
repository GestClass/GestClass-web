<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_responsavel = $_SPOST["id_respon"];
$ocorrencia = $_POST["ocorrencia"];
$assunto = $_POST["assunto"];

if (($ocorrencia != "") && ($assunto != "")) {

    $inserirOcorrencia = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
    fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
    fk_envio_admin_id_admin,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
    fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin)
    VALUES (:mensagem, :assunto,  NOW(),'0', NULL,NULL,:id_usuario,NULL, NULL, NULL,:tipo_usuario, NULL,:id_responsavel,NULL,NULL,NULL, NULL)");

    $inserirOcorrencia->bindParam(':ocorrencia', $ocorrencia, PDO::PARAM_STR);
    $inserirOcorrencia->bindParam(':assunto', $assunto, PDO::PARAM_STR);
    $inserirOcorrencia->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
    $inserirOcorrencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $inserirOcorrencia->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
    $inserirOcorrencia->execute();

    if ($inserirOcorrencia->rowCount()) {
        echo "<script>alert('Mensagem enviada com Sucesso!!');
    window.location = '../../homeProfessor.html.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem')
    history.back();</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
