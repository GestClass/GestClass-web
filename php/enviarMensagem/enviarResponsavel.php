<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$destinatario = $_POST["destinatario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

if (($assunto != "") && ($mensagem != "")) {


    if ($destinatario == 1) {

        $query_select_secretaria = $conn->prepare("SELECT ID_secretario,fk_id_escola_secretario FROM secretario WHERE  fk_id_escola_secretario = $id_escola");
        $query_select_secretaria->execute();

        while ($dados_secretaria = $query_select_secretaria->fetch(PDO::FETCH_ASSOC)) {
            if (isset($dados_secretaria["ID_secretario"])) {
                $id_secretario = $dados_secretaria["ID_secretario"];

                $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
                fk_envio_responsavel_id_responsavel,fk_id_tipo_usuario_envio,fk_recebimento_secretario_id_secretario)  
                VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario, :tipo_usuario,:id_secretario)");

                $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $inserirMensagem->bindParam(':id_secretario', $id_secretario, PDO::PARAM_INT);
                $inserirMensagem->execute();

                if ($inserirMensagem->rowCount()) {
                    echo "<script>alert('Mensagem enviada com Sucesso!!');
                    window.location = '../../HomePais.html.php';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar a mensagem')
                    history.back();</script>";
                }
            } else {
                echo "<script>alert('Houve algum erro')</script>";
            }
        }
    } else {

        $selectDiretor = $conn->prepare("SELECT id_diretor FROM diretor where fk_id_escola_diretor =  $id_escola");
        $selectDiretor->execute();
        $diretor = $selectDiretor->fetch(PDO::FETCH_ASSOC);
        $id_diretor = $diretor["id_diretor"];

        $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
        fk_envio_responsavel_id_responsavel,fk_id_tipo_usuario_envio,fk_recebimento_secretario_id_secretario) 
        VALUES (:mensagem, :assunto,  NOW(),'0',:id_usuario,:tipo_usuario,:id_diretor)");

        $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
        $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $inserirMensagem->bindParam(':id_diretor', $id_diretor, PDO::PARAM_INT);
        $inserirMensagem->execute();

        if ($inserirMensagem->rowCount()) {
            echo "<script>alert('Cadastrado com Sucesso!!');
            window.location = '../../mensagensResponsavel.html.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
        }
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
