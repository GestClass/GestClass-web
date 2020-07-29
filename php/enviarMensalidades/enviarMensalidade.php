<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

// //usuarios
$id_usuario = $_SESSION["id_usuario"];
$id_responsavel = $_POST["id_respon"];

$arquivo = $_FILES["boleto"]['name'];

$type  = $_FILES["boleto"]["type"]; //file name "foto_file" 
$size  = $_FILES["boleto"]["size"];
$temp  = $_FILES["boleto"]["tmp_name"];
$error  = $_FILES["boleto"]["error"];

if ($arquivo != "") {

    if ($id_tipo_usuario == 2) {

        if ($error == 1) {
            echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
            history.back();</script>";
        }
        //print_r($imagem);exit;
        $tamanho = 3000000;

        if ((!preg_match("/\.(pdf){1}$/i", $arquivo, $ext))) {
            echo "<script>alert('Ops! Isso não é um PDF');
            history.back();</script>";
        } else {
            preg_match("/\.(pdf){1}$/i", $arquivo, $ext);

            $boleto = $arquivo;

            $caminho = "../../assets/boletos/" . $boleto;

            move_uploaded_file($temp, $caminho);

            if ($caminho) {
                $query_envio = $conn->prepare("INSERT INTO envio_boleto (fk_id_diretor_envio_boleto, fk_id_secretario_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto) 
                VALUES (:id_usuario, NULL, :id_responsavel, NOW(), :boleto)");

                $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $query_envio->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
                $query_envio->bindParam(':boleto', $boleto, PDO::PARAM_STR);
                $query_envio->execute();

                if ($query_envio->rowCount()) {
                    echo "<script>alert('Mensalidade enviada com sucesso');
                    window.location='../../homeDiretor.html.php';</script>";
                } else {
                    echo "<script>alert('Erro: Mensalidade não enviada');
                    history.back();</script>";
                }
            }
        }
    } elseif ($id_tipo_usuario == 3) {
        if ($error == 1) {
            echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
            history.back();</script>";
        }
        //print_r($imagem);exit;
        $tamanho = 3000000;

        if ((!preg_match("/\.(pdf){1}$/i", $arquivo, $ext))) {
            echo "<script>alert('Ops! Isso não é um pdf.');
            history.back();</script>";
        } else {
            preg_match("/\.(pdf){1}$/i", $arquivo, $ext);

            $boleto = md5(uniqid(time())) . "." . $ext[1];

            $caminho = "../../assets/boletos/" . $boleto;

            move_uploaded_file($temp, $caminho);

            if ($caminho) {
                $query_envio = $conn->prepare("INSERT INTO envio_boleto (fk_id_diretor_envio_boleto, fk_id_secretario_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto) 
            VALUES (NULL, :id_usuario, :id_responsavel, NOW(), :boleto)");

                $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $query_envio->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
                $query_envio->bindParam(':boleto', $boleto, PDO::PARAM_STR);
                $query_envio->execute();

                if ($query_envio->rowCount()) {
                    echo "<script>alert('Mensalidade enviada com sucesso');
                    window.location='../../homeDiretor.html.php';</script>";
                } else {
                    echo "<script>alert('Erro: Mensalidade não enviada');
                    history.back();</script>";
                }
            }
        }
    } else {
        echo "<script>alert('ERRO: Usuário sem permissão');
        window.location='../../index.php';</script>";
    }
} else {
    echo "<script>alert('Erro: Selecione um arquivo para ser enviado');
    history.back();</script>";
}
