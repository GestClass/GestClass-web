<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$usuario = $_POST["EncaminharMensagens"];

//6 RESPONSAVEL
//5 ALUNO 
//4 PROFESSOR
//3 SECRETARIA
//2 DIRETOR

if (($assunto != "") && ($mensagem != "")) {

    if ($usuario == 4) {

        $query_select_professor = $conn->prepare("SELECT ID_professor FROM professor WHERE fk_id_escola_professor = $id_escola AND fk_id_tipo_usuario_professor = $usuario");
        $query_select_professor->execute();

        while ($dados_professor = $query_select_professor->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_professor["ID_professor"])) {
                $id_professor = $dados_professor["ID_professor"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_secretario_id_secretario,fk_id_tipo_usuario_envio,fk_recebimento_professor_id_professor,fk_id_escola_contato)
                VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario, :tipo_usuario,:id_professor,:id_escola)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
                $inserirMensagem->execute();

                if ($inserirMensagem->rowCount()) {
                    echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../mensagensSecretaria.html.php';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
                }
            } else {
                echo "<script>alert('Houve algum erro')</script>";
            }
        }
    } elseif ($usuario == 5) {

        $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_tipo_usuario_aluno = $usuario");
        $query_select_alunos->execute();

        while ($dados_aluno = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_aluno["RA"])) {
                $ra = $dados_aluno["RA"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_secretario_id_secretario,fk_id_tipo_usuario_envio, fk_recebimento_aluno_ra_aluno,fk_id_escola_contato)
                VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario, :ra,:id_escola)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':ra', $ra, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
                $inserirMensagem->execute();

                if ($inserirMensagem->rowCount()) {
                    echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../mensagensSecretaria.html.php';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
                }
            } else {
                echo "<script>alert('Houve algum erro')</script>";
            }
        }
    } elseif ($usuario == 6) {

        $query_select_responsavel = $conn->prepare("SELECT ID_responsavel FROM responsavel WHERE fk_id_escola_responsavel = $id_escola AND fk_id_tipo_usuario_responsavel = $usuario");
        $query_select_responsavel->execute();

        while ($dados_responsavel = $query_select_responsavel->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_responsavel["ID_responsavel"])) {
                $id_responsavel = $dados_responsavel["ID_responsavel"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_secretario_id_secretario,fk_id_tipo_usuario_envio,fk_recebimento_responsavel_id_responsavel,fk_id_escola_contato)
                VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario, :id_responsavel,:id_escola)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
                $inserirMensagem->execute();

                if ($inserirMensagem->rowCount()) {
                    echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../mensagensSecretaria.html.php';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
                }
            } else {
                echo "<script>alert('Houve algum erro')</script>";
            }
        }
    } else {
        echo "<script>alert('Escolha uma das opções')</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
