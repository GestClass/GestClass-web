<?php

include_once '../conexao.php';

$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if (($assunto != "") && ($mensagem != "")) {
    echo $destinatario."<br><br>";
    echo $assunto."<br><br>";
    echo $mensagem."<br><br>";
    
} else {
    echo "<script>alert('Preencha os Campos')
    history.back()</script>";
}




?>