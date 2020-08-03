<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$ra = $_POST["ra"];

//4 PROFESSOR
//3 SECRETARIA
//2 DIRETOR

if (($assunto != "") && ($mensagem != "")) {

    $ra_aluno = str_replace('-', '', $ra);

    if ($id_tipo_usuario == 2) {

        $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
        fk_envio_diretor_id_diretor,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno,fk_id_escola_contato)
        VALUES (:mensagem, :assunto,  NOW(), '0',:id_usuario,:tipo_usuario,:ra_aluno,:id_escola)");

        $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':ra_aluno', $ra_aluno, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
        $inserirMensagem->execute();

        if ($inserirMensagem->rowCount()) {

            echo "<script>alert('Mensagem enviada com Sucesso!!');
        window.location = '../../mensagensDiretor.html.php';</script>";
        } else {

            echo "<script>alert('Erro ao enviar a mensagem')
        history.back();</script>";
        }
    } elseif ($id_tipo_usuario == 3) {

        $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
        fk_envio_secretario_id_secretario,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno,fk_id_escola_contato)
        VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario, :ra_aluno,:id_escola)");

        $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':ra_aluno', $ra_aluno, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
        $inserirMensagem->execute();

        if ($inserirMensagem->rowCount()) {

            echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../mensagensSecretaria.html.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
        }
    } elseif ($id_tipo_usuario == 4) {

        $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
        fk_envio_professor_id_professor,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno,fk_id_escola_contato)
        VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario,:ra_aluno,:id_escola)");

        $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':ra_aluno', $ra_aluno, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
        $inserirMensagem->execute();

        if ($inserirMensagem->rowCount()) {
            echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../mensagensProfessor.html.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
        }
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
