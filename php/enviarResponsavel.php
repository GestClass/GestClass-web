<?php
    include_once 'conexao.php';

    $id_escola = $_SESSION["id_escola"];
    $destinatario = $_POST["destinatario"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];


    $inserirMensagem = $conn->prepare("");

    // if ($destinatario == 1) {
    //     echo "Secretaria <br>".$assunto."<br>".$mensagem."<br> id da escola = ".$id_escola;
    // }else{
    //     echo "Diretor <br>".$assunto."<br>".$mensagem."<br> id da escola = ".$id_escola;
    // }

?>