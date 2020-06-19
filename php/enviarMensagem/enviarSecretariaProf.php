<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_professor = $_POST["destinatario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

if (($assunto != "") && ($mensagem != "")) {
    
    $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem, 
    fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
    fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
    fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebmento_admin_id_admin) 
    VALUES (:mensagem, :assunto,  NOW(), NULL, NULL, NULL,NULL, :id_usuario, NULL, NULL, NULL,:id_professor,NULL,NULL, NULL)");

    $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
    $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
    $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
    $inserirMensagem->execute();

    if ($inserirMensagem->rowCount()) {
        echo "<script>alert('Cadastrado com Sucesso!!');
        window.location = '../../mensagensSecretaria.html.php'</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
            history.back();</script>";
}
