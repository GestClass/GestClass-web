<?php
    include_once 'conexao.php';

    $id_escola = $_SESSION["id_escola"];
    $id_usuario = $_SESSION["id_usuario"];
    $destinatario = $_POST["destinatario"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];
   
    if ($destinatario == 1) {

        $selectSecretario = $conn->prepare("SELECT id_secretario FROM secretario where fk_id_escola_secretario = $id_escola");
        $selectSecretario->execute();
        $secretario = $selectSecretario->fetch(PDO::FETCH_ASSOC);
        $id_secretario = $secretario["id_secretario"];

        $inserirMensagem = $conn->prepare("INSERT INTO `contato` (`mensagem`, `fk_envio_aluno_ra_aluno`, `fk_envio_responsavel_id_responsavel`, 
        `fk_envio_professor_id_professor`, `fk_envio_diretor_id_diretor`, `fk_envio_secretario_id_secretario`, `fk_recebimento_aluno_ra_aluno`, 
        `fk_recebimento_responsavel_id_responsavel`, `fk_recebimento_professor_id_professor`, `fk_recebimento_diretor_id_diretor`, 
        `fk_recebimento_secretario_id_secretario`, `assunto`, `data`) 
        VALUES ('{$mensagem}', NULL, '{$id_usuario}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{$id_secretario}', '{$assunto}', NOW())");
        $resultado = $inserirMensagem->execute();
        

        if ($resultado == 1) {
            echo "inseriu trouxa";
        }else{
            echo "otara";
        }



    }else{

    }


    // if ($destinatario == 1) {
    //     echo "Secretaria <br>".$assunto."<br>".$mensagem."<br> id da escola = ".$id_escola;
    // }else{
    //     echo "Diretor <br>".$assunto."<br>".$mensagem."<br> id da escola = ".$id_escola;
    // }
?>