<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$id_turma = $_POST["destinatario"];

if (($assunto != "") && ($mensagem != "")) {

    if ($id_tipo_usuario == 2) {

        $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
        $query_select_alunos->execute();

        while ($dados = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados["RA"])) {

                $ra = $dados["RA"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_diretor_id_diretor,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno)
                VALUES (:mensagem, :assunto,  NOW(), '0',:id_usuario,:tipo_usuario,:ra)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':ra', $ra, PDO::PARAM_INT);
                $inserirMensagem->execute();

                if ($inserirMensagem->rowCount()) {
                    echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../mensagensDiretor.html.php';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
                }
            } else {
                echo "<script>alert('Houve algum erro')</script>";
            }
        }
    } elseif ($id_tipo_usuario == 3) {

        $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
        $query_select_alunos->execute();

        while ($dados = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados["RA"])) {

                $ra = $dados["RA"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_secretario_id_secretario,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno)
                VALUES (:mensagem, :assunto,  NOW(),'0', :id_usuario,:tipo_usuario, :ra)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':ra', $ra, PDO::PARAM_INT);
                $inserirMensagem->execute();

                if ($inserirMensagem->rowCount()) {
                    echo "<script>alert('Mensagem enviada com Sucesso!!');
    window.location = '../../mensagensSecretaria.html.php';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
                }
            } else {
                echo "<script>alert('Houve Algum Erro')</script>";
            }
        }
    } else {
        echo "<script>alert('Usuario sem permissão')
        window.location = '../../index.php'</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
