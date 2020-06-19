<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

if (($assunto != "") && ($mensagem != "")) {

    $query_select_secretaria = $conn->prepare("SELECT ID_secretario FROM secretario WHERE  fk_id_escola_secretario = $id_escola AND fk_id_tipo_usuario_secretario = $usuario");
    $query_select_secretaria->execute();

    while ($dados_secretaria = $query_select_secretaria->fetch(PDO::FETCH_ASSOC)) {
        if (isset($dados_secretaria["ID_secretario"])) {
            $id_secretario = $dados_secretaria["ID_secretario"];

            $inserirMensagem = $conn->prepare("INSERT INTO `contato` (`mensagem`, `fk_envio_aluno_ra_aluno`, `fk_envio_responsavel_id_responsavel`, 
    `fk_envio_professor_id_professor`, `fk_envio_diretor_id_diretor`, `fk_envio_secretario_id_secretario`, `fk_recebimento_aluno_ra_aluno`, 
    `fk_recebimento_responsavel_id_responsavel`, `fk_recebimento_professor_id_professor`, `fk_recebimento_diretor_id_diretor`, 
    `fk_recebimento_secretario_id_secretario`, `assunto`, `data_mensagem`) 
    VALUES (:mensagem, NULL, NULL, NULL, :id_usuario, NULL, NULL, NULL, NULL, NULL, :id_secretario, :assunto, NOW())");

            $inserirMensagem->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $inserirMensagem->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':id_secretario', $id_secretario, PDO::PARAM_INT);
            $inserirMensagem->bindParam(':assunto', $assunto, PDO::PARAM_STR);
            $inserirMensagem->execute();

            if ($inserirMensagem->rowCount()) {
                echo "<script>alert('mensagem enviada com Sucesso!!');
                window.location = '../../mensagensDiretor.html.php';</script>";
            } else {
                echo "<script>alert('Erro ao enviar a mensagem')
                history.back();</script>";
            }
        }
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
