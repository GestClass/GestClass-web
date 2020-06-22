<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$destinatario = $_POST["destinatario"];
$usuario_tipo = $_POST["usuario_tipo"];
$mensagem = $_POST["mensagem"];
$assunto = $_POST["assunto"];


//6 RESPONSAVEL //5 ALUNO  //4 PROFESSOR //3 SECRETARIA //2 DIRETOR

if (($mensagem != "") && ($assunto != "")) {

    if ($id_tipo_usuario == 1) {
        //admin vai enviar
        if ($usuario_tipo == 1) {
            //responder admin
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,NULL, NULL, :id_usuario, NULL, NULL,NULL,NULL,NULL, :destinatario)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
        window.location = '../../feedbackEscolas.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
            }
        } elseif ($usuario_tipo == 2) {
            //responder diretor
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,NULL, NULL, :id_usuario, NULL, NULL,NULL,:destinatario,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../feedbackEscolas.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
            }
        } else {
            echo "<script>alert('Houve algum erro')
                history.back();</script>";
        }
    } elseif ($id_tipo_usuario == 2) {
        //diretor que vai enviar
        if ($usuario_tipo == 1) {
            //responder admins
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,:id_usuario, NULL, NULL,NULL, NULL,NULL,NULL,NULL, :destinatario)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeDiretor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeDiretor.html.php'</script>";
            }
        } elseif ($usuario_tipo == 3) {
            //responder secretario
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,:id_usuario, NULL, NULL,NULL, NULL,NULL,NULL,:destinatario, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeDiretor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeDiretor.html.php'</script>";
            }
        } elseif ($usuario_tipo == 4) {
            //responder professor
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,:id_usuario, NULL, NULL,NULL, NULL,:destinatario,NULL,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeDiretor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeDiretor.html.php'</script>";
            }
        } elseif ($usuario_tipo == 6) {
            //responder responsavel
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,:id_usuario, NULL, NULL,NULL, :destinatario,NULL,NULL,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
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
            history.back()</script>";
        }
    } elseif ($id_tipo_usuario == 3) {
        //secretaria que vai enviar
        if ($usuario_tipo == 2) {
            //responder diretor
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,NULL, :id_usuario, NULL, NULL, NULL,NULL,:destinatario,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeSecretaria.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeSecretaria.html.php'</script>";
            }
        } elseif ($usuario_tipo == 4) {
            //responder professor
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,NULL, :id_usuario, NULL, NULL, NULL,:destinatario,NULL,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeSecretaria.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeSecretaria.html.php'</script>";
            }
        } elseif ($usuario_tipo == 6) {
            //responder responsavel
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
            fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
            fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
            fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
            VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL, NULL, NULL,NULL, :id_usuario, NULL, NULL, :destinatario,NULL,NULL,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeSecretaria.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeSecretaria.html.php'</script>";
            }
        } else {
            echo "<script>alert('Houve algum erro')
                history.back()</script>";
        }
    } elseif ($id_tipo_usuario == 4) {
        //professor que vai enviar
        if ($usuario_tipo == 2) {
            //responder diretor
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
                fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
                fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
                fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
                VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL,NULL,:id_usuario,NULL, NULL, NULL, NULL, NULL,NULL,:destinatario,NULL,NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeProfessor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeProfessor.html.php'</script>";
            }
        } elseif ($usuario_tipo == 3) {
            //responder secretario
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
                fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
                fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
                fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
                VALUES (:mensagem, :assunto,  NOW(),:tipo_usuario, NULL,NULL,:id_usuario,NULL, NULL, NULL, NULL, NULL,NULL,NULL,:destinatario,NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeProfessor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeProfessor.html.php'</script>";
            }
        } else {
            echo "<script>alert('Houve algum erro')
            history.back()</script>";
        }
    } elseif ($id_tipo_usuario == 6) {
        //responsavel que vai enviar
        if ($usuario_tipo == 2) {
            //responder diretor
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
                fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
                fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
                fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
                VALUES (:mensagem, :assunto, NOW(),:tipo_usuario,:id_usuario,NULL, NULL,NULL, NULL, NULL, NULL, NULL,NULL,:destinatario,NULL, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homeAluno.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homeAluno.html.php'</script>";
            }
        } elseif ($usuario_tipo == 3) {
            //responder secretario
            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,fk_id_tipo_usuario_envio, 
                fk_envio_aluno_ra_aluno, fk_envio_responsavel_id_responsavel, fk_envio_professor_id_professor, fk_envio_diretor_id_diretor, fk_envio_secretario_id_secretario, 
                fk_envio_admin_id_admin, fk_recebimento_aluno_ra_aluno, fk_recebimento_responsavel_id_responsavel, 
                fk_recebimento_professor_id_professor, fk_recebimento_diretor_id_diretor, fk_recebimento_secretario_id_secretario,fk_recebimento_admin_id_admin) 
                VALUES (:mensagem, :assunto, NOW(),:tipo_usuario,:id_usuario,NULL, NULL,NULL, NULL, NULL, NULL, NULL,NULL,NULL,:destinatario, NULL)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':destinatario', $destinatario, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
                window.location = '../../homePais.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                window.location = '../../homePais.html.php'</script>";
            }
        } else {
            echo "<script>alert('Houve algum erro')
                history.back()</script>";
        }
    } else {
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
