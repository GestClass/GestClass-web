<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$id_turma = $_POST["destinatario"];

if (($assunto != "") ($mensagem != "")) {
    
    $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
    $query_select_alunos->execute();
    
    while ($dados = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {
        if (isset($dados["RA"])) {
            $inserirMensagem = $conn->prepare("INSERT INTO `contato` (`mensagem`, `fk_envio_aluno_ra_aluno`, `fk_envio_responsavel_id_responsavel`, 
    `fk_envio_professor_id_professor`, `fk_envio_diretor_id_diretor`, `fk_envio_secretario_id_secretario`, `fk_recebimento_aluno_ra_aluno`, 
    `fk_recebimento_responsavel_id_responsavel`, `fk_recebimento_professor_id_professor`, `fk_recebimento_diretor_id_diretor`, 
    `fk_recebimento_secretario_id_secretario`, `assunto`, `data_mensagem`) 
    VALUES ('{$mensagem}', NULL, NULL, NULL, NULL, '{$id_usuario}', '{$dados["RA"]}', NULL, NULL, NULL, NULL, '{$assunto}', NOW())");
        $resultado = $inserirMensagem->execute();

        if ($resultado == 1) {
            echo "<script>alert('Mensagem enviada com Sucesso!!');
            window.location = '../../mensagensSecretaria.html.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar a mensagem')
            history.back();</script>";
        }
    } else {
        echo "<script>alert('Deu erro bobao')</script>";
    }
}
}else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}