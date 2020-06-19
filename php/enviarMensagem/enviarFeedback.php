<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$mensagem = $_POST["mensagem"];

//6 RESPONSAVEL //5 ALUNO  //4 PROFESSOR //3 SECRETARIA //2 DIRETOR

if (($assunto != "") && ($mensagem != "")) {

    if ($id_tipo_usuario == 2) {
        //diretor que vai enviar
    } elseif ($id_tipo_usuario == 3) {
        //secretaria que vai enviar
    } elseif ($id_tipo_usuario == 4) {
        //professor que vai enviar
    } elseif ($id_tipo_usuario == 5) {
        //aluno que vai enviar
    } else {
        //responsavel que vai enviar
    }
} else {
    echo "<script>alert('Preencha os campos')
    history.back();</script>";
}
