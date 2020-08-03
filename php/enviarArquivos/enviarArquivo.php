<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

// //usuarios
$id_usuario = $_SESSION["id_usuario"];
$id_responsavel = $_POST["id_respon"];

$arquivo = $_FILES["arquivo"]['name'];

$type  = $_FILES["arquivo"]["type"]; //file name "foto_file" 
$size  = $_FILES["arquivo"]["size"];
$temp  = $_FILES["arquivo"]["tmp_name"];
$error  = $_FILES["arquivo"]["error"];

if ($arquivo != "") {

    if ($id_tipo_usuario == 2) {

        if ($error == 1) {
            echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
            history.back();</script>";
        }
        //print_r($imagem);exit;
        $tamanho = 3000000;

        if ((!preg_match("/\.(pdf|doc|docx|jpg|jpeg|png|gif|txt|ppt|pptx|xls|xlsx){1}$/i", $arquivo, $ext)) || ($size > $tamanho)) {
            echo "<script>alert('Ops! Isso não é um arquivo permitido, ou o tamanho do arquivo é maior que o permitido.');
            history.back()</script>";
        } else {
            preg_match("/\.(pdf){1}$/i", $arquivo, $ext);

            $arquivo_certo = $arquivo;

            $caminho = "../../assets/arquivos/" . $arquivo_certo;

            move_uploaded_file($temp, $caminho);

            if ($caminho) {
                $query_envio = $conn->prepare("INSERT INTO envio_boleto (fk_id_diretor_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto,fk_id_escola_boleto) 
                VALUES (:id_usuario, :id_responsavel, NOW(), :arquivo_certo,:id_escola)");

                $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $query_envio->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
                $query_envio->bindParam(':arquivo_certo', $arquivo_certo, PDO::PARAM_STR);
                $query_envio->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
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

        if ((!preg_match("/\.(pdf|doc|docx|jpg|jpeg|png|gif|txt|ppt|pptx|xls|xlsx){1}$/i", $arquivo, $ext)) || ($size > $tamanho)) {
            echo "<script>alert('Ops! Isso não é um arquivo permitido, ou o tamanho do arquivo é maior que o permitido.');
            history.back()</script>";
        } else {
            preg_match("/\.(pdf){1}$/i", $arquivo, $ext);

            $arquivo_certo = md5(uniqid(time())) . "." . $ext[1];

            $caminho = "../../assets/arquivos/" . $arquivo_certo;

            move_uploaded_file($temp, $caminho);

            if ($caminho) {
                $query_envio = $conn->prepare("INSERT INTO envio_boleto (fk_id_secretario_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto, fk_id_escola_boleto) 
                VALUES (:id_usuario, :id_responsavel, NOW(), :arquivo_certo,:id_escola)");

                $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $query_envio->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
                $query_envio->bindParam(':arquivo_certo', $arquivo_certo, PDO::PARAM_STR);
                $query_envio->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
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
