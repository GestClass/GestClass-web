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

    if ($usuario == 3) {

        $query_select_secretaria = $conn->prepare("SELECT ID_secretario FROM secretario WHERE  fk_id_escola_secretario = $id_escola AND fk_id_tipo_usuario_secretario = $usuario");
        $query_select_secretaria->execute();

        while ($dados_secretaria = $query_select_secretaria->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_secretaria["ID_secretario"])) {
                $id_secretario = $dados_secretaria["ID_secretario"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_diretor_id_diretor, fk_id_tipo_usuario_envio,fk_recebimento_secretario_id_secretario)
                VALUES (:mensagem, :assunto,  NOW(), '0',:id_usuario,:tipo_usuario,:id_secretario)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_secretario', $id_secretario, PDO::PARAM_INT);
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
    } elseif ($usuario == 4) {

        $query_select_professor = $conn->prepare("SELECT ID_professor FROM professor WHERE fk_id_escola_professor = $id_escola AND fk_id_tipo_usuario_professor = $usuario");
        $query_select_professor->execute();

        while ($dados_professor = $query_select_professor->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_professor["ID_professor"])) {
                $id_professor = $dados_professor["ID_professor"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_diretor_id_diretor,fk_id_tipo_usuario_envio,fk_recebimento_professor_id_professor)
                VALUES (:mensagem, :assunto,  NOW(), '0',:id_usuario,:tipo_usuario,:id_professor)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
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
    } elseif ($usuario == 5) {

        $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_tipo_usuario_aluno = $usuario");
        $query_select_alunos->execute();

        while ($dados_aluno = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_aluno["RA"])) {
                $ra = $dados_aluno["RA"];

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
    } elseif ($usuario == 6) {

        $query_select_responsavel = $conn->prepare("SELECT ID_responsavel FROM responsavel WHERE fk_id_escola_responsavel = $id_escola AND fk_id_tipo_usuario_responsavel = $usuario");
        $query_select_responsavel->execute();

        while ($dados_responsavel = $query_select_responsavel->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_responsavel["ID_responsavel"])) {
                $id_reponsavel = $dados_responsavel["ID_responsavel"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_diretor_id_diretor,fk_id_tipo_usuario_envio,fk_recebimento_responsavel_id_responsavel)
                VALUES (:mensagem, :assunto,  NOW(), '0', :id_usuario,:tipo_usuario,:id_responsavel)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
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
    } else {
        echo "<script>alert('Escolha umas das opções')</script>";
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
