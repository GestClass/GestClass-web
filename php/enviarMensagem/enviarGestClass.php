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

            $inserirMensagem = $conn->prepare("INSERT INTO contato (mensagem, assunto, data_mensagem,notificacao, 
            fk_envio_diretor_id_diretor,fk_id_tipo_usuario_envio,fk_recebimento_admin_id_admin,fk_id_escola_contato)
            VALUES (:mensagem, :assunto,  NOW(), '0',:id_usuario,:tipo_usuario :id_admin,:id_escola)");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_admin', $id_admin, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
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
