<?php

include_once '../conexao.php';

$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if (($assunto != "") && ($mensagem != "")) {
    echo $id_tipo_usuario."<br><br>";
    echo $id_usuario."<br><br>";
    echo $destinatario."<br><br>";
    echo $assunto."<br><br>";
    echo $mensagem."<br><br>";
    
} else {
    echo "<script>alert('Preencha os Campos')
    history.back()</script>";
}




?>