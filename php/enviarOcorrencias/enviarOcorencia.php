<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_responsavel = $_SESSION["id"];
$ocorrencia = $_POST["ocorrencia"];
$assunto = $_POST["assunto"];

if (($ocorrencia != "") && ($assunto != "")) {
    # code...
    $inserirMensagem = $conn->prepare("INSERT INTO `contato` (`mensagem`, `fk_envio_aluno_ra_aluno`, `fk_envio_responsavel_id_responsavel`, 
    `fk_envio_professor_id_professor`, `fk_envio_diretor_id_diretor`, `fk_envio_secretario_id_secretario`, `fk_recebimento_aluno_ra_aluno`, 
    `fk_recebimento_responsavel_id_responsavel`, `fk_recebimento_professor_id_professor`, `fk_recebimento_diretor_id_diretor`, 
    `fk_recebimento_secretario_id_secretario`, `assunto`, `data_mensagem`) 
    VALUES ('{$ocorrencia}', NULL, NULL, '{$id_usuario}', NULL, NULL, NULL,'{$id_responsavel}', NULL, NULL, NULL, '{$assunto}', NOW())");
$resultado = $inserirMensagem->execute();

if ($resultado == 1) {
    echo "<script>alert('Mensagem enviada com Sucesso!!');
    window.location = '../../HomeProfessor.html.php';</script>";
} else {
    echo "<script>alert('Erro ao enviar a mensagem')
    history.back();</script>";
}
}else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}

?>