<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

// //usuarios
$id_usuario = $_SESSION["id_usuario"];
$id_responsavel = $_SESSION["id_respon"];

$boleto = $_FILES["boleto"]['name'];
move_uploaded_file($_FILES["boleto"]["tmp_name"], "../../assets/boletos/" . $boleto);
if ($boleto != "") {

    if ($id_tipo_usuario == 2) {

        $query_envio = $conn->prepare("INSERT INTO envio_boleto (fk_id_diretor_envio_boleto, fk_id_secretario_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto) 
    VALUES (:id_usuario, NULL, :id_responsavel, NOW(), :boleto)");

        $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $query_envio->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
        $query_envio->bindParam(':boleto', $boleto, PDO::PARAM_STR);

        $query_envio->execute();

        if ($query_envio->rowCount()) {
            echo "<script>alert('Mensalidade enviada com sucesso');
        window.location='../../homeDiretor.html.php';
        </script>";
        } else {

            echo "<script>alert('Erro: Mensalidade não enviada');
    history.back();;
    </script>";
        }
    } else {

        $query_envio = $conn->prepare("INSERT INTO envio_boleto (fk_id_diretor_envio_boleto, fk_id_secretario_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto) 
    VALUES (NULL, :id_usuario, :id_responsavel, NOW(), :boleto)");

        $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $query_envio->bindParam(':id_responsavel', $id_responsavel, PDO::PARAM_INT);
        $query_envio->bindParam(':boleto', $boleto, PDO::PARAM_STR);

        $query_envio->execute();

        if ($query_envio->rowCount()) {
            echo "<script>alert('Mensalidade enviada com sucesso');
        window.location='../../homeSecretaria.html.php';
        </script>";
        } else {

            echo "<script>alert('Erro: Mensalidade não enviada');
    history.back();;
    </script>";
        }
    }
} else {
    echo "<script>alert('Escolha um arquivo para enviar')
    history.back()</script>";
}
