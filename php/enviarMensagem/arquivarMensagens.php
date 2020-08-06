<?php
        include_once 'conexao.php';

        // $id_usuario = $_SESSION["id_usuario"];
        // $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
        // $id_escola = $_SESSION["id_escola"];
    

        $id_mensagem = $_GET["id"];
        // $usuario_tipo = $_GET["u"];
        $arquivar = $_GET["arquivar"];
    
        $query_update_notifi = $conn->prepare("UPDATE contato SET arquivada = $arquivar WHERE contato.ID_mensagem = $id_mensagem");
        $query_update_notifi->execute();
?>