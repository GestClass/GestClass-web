<?php

include_once '../conexao.php';

// $id_escola = $_SESSION["id_escola"];
// $id_usuario = $_SESSION["id_usuario"];
// $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

$query_select_admin = $conn->prepare("SELECT * FROM `admin`");
$query_select_admin->execute();

if (($mensagem != "") && ($assunto != "")) {

    while ($dados_admin = $query_select_admin->fetch(PDO::FETCH_ASSOC)) {
        if (isset($dados_admin["ID_admin"])) {
            $id_admin = $dados_admin["ID_admin"];

            $inserirMensagem = $conn->prepare("INSERT INTO `contato` ( `nome`, `email`, `mensagem`, `assunto`, `data_mensagem`,
             `notificacao`, `fk_envio_aluno_ra_aluno`, `fk_envio_responsavel_id_responsavel`, `fk_envio_professor_id_professor`, 
             `fk_envio_diretor_id_diretor`, `fk_envio_secretario_id_secretario`, `fk_envio_admin_id_admin`, `fk_id_envio_solicitante`, 
             `fk_id_tipo_usuario_envio`, `fk_recebimento_aluno_ra_aluno`, `fk_recebimento_responsavel_id_responsavel`, 
             `fk_recebimento_professor_id_professor`, `fk_recebimento_diretor_id_diretor`, `fk_recebimento_secretario_id_secretario`, 
             `fk_recebimento_admin_id_admin`) VALUES (:nome, :email, :mensagem, :assunto, 
             NOW(), '0', NULL, NULL, NULL, NULL, NULL, NULL, '7', '7', NULL, NULL, NULL, NULL, NULL, :id_admin");

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
                print_r() $inserirMensagem->execute();
            }
        } else {
            echo "<script>alert('Houve algum erro')
        window.location = '../../index.php'</script>";
        }
    }
} else {
    echo "<script>alert('Preencha os campos')
    window.location = '../../index.php'</script>";
}



?>