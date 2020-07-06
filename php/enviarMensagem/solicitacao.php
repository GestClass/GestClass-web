<?php

include_once '../conexao.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

$query_select_admin = $conn->prepare("SELECT * FROM `admin`");
$query_select_admin->execute();

// if (($mensagem != "") && ($assunto != "")) {

    while ($dados_admin = $query_select_admin->fetch(PDO::FETCH_ASSOC)) {
        if (isset($dados_admin["ID_admin"])) {
            $id_admin = $dados_admin["ID_admin"];

            $inserirMensagem = $conn->prepare("INSERT INTO contato (nome, email, mensagem, assunto, data_mensagem, notificacao, 
            fk_id_tipo_usuario_envio,fk_recebimento_admin_id_admin)
            VALUES (:nome, :email, :mensagem, :assunto, NOW(), '0','7', :id_admin)");

            $inserirMensagem->bindParam(':nome', $nome, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':email', $email, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':id_admin', $id_admin, PDO::PARAM_INT);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../index.php';</script>";
            } else {
             print_r($inserirMensagem); //$inserirMensagem->execute();
            }
        } else {
            echo "<script>alert('Houve algum erro')
        window.location = '../../index.php'</script>";
        }
    }
// } else {
//     echo "<script>alert('Preencha os campos')
//     window.location = '../../index.php'</script>";
// }
