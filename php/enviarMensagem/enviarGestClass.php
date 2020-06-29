<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

$query_select_admin = $conn->prepare("SELECT * FROM `admin`");
$query_select_admin->execute();

if (($mensagem != "") && ($assunto != "")) {

    while ($dados_admin = $query_select_admin->fetch(PDO::FETCH_ASSOC)) {
        if (isset($dados_admin["ID_admin"])) {
            $id_admin = $dados_admin["ID_admin"];

            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,:id_usuario, NULL, NULL,NULL, NULL,NULL,NULL,NULL, :id_admin)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_admin', $id_admin, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../homeDiretor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
            window.location = '../../homeDiretor.html.php'</script>";
            }
        } else {
            echo "<script>alert('Houve algum erro')
        window.location = '../../homeDiretor.html.php'</script>";
        }
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back()</script>";
}