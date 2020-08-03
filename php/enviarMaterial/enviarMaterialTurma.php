<?php
include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$turma = $_POST["turma"];
$assunto = $_POST["assunto"];

$arquivo = $_FILES["material"]["name"];
$type  = $_FILES["material"]["type"];
$size  = $_FILES["material"]["size"];
$temp  = $_FILES["material"]["tmp_name"];
$error  = $_FILES["material"]["error"];

if (($assunto != "") && ($arquivo != "")) {

    if ($id_tipo_usuario == 2) {

        $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $turma");
        $query_select_alunos->execute();

        if ($error == 1) {
            echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
            window.location='../../homeProfessor.html.php';</script>";
        }
        $tamanho = 3000000;

        if ((!preg_match("/\.(pdf|doc|docx|jpg|jpeg|png|gif|txt|ppt|pptx|xls|xlsx){1}$/i", $arquivo, $ext)) || ($size > $tamanho)) {
            echo "<script>alert('Ops! Isso não é um arquivo permitido, ou o tamanho do arquivo é maior que o permitido.');
            window.location='../../homeProfessor.html.php';</script>";
        } else {
            preg_match("/\.(pdf|doc|docx|jpg|jpeg|png|gif|txt|ppt|pptx|xls|xlsx){1}$/i", $arquivo, $ext);

            $material = $arquivo;

            $caminho = "../../assets/MaterialApoio/" . $material;

            move_uploaded_file($temp, $caminho);

            if ($caminho) {

                while ($dados = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {

                    if (isset($dados["RA"])) {
                        $ra_aluno = $dados["RA"];

                        $query_envio = $conn->prepare("INSERT INTO envio_material_apoio (fk_id_tipo_usuario_envio_material, fk_id_diretor_envio_material, fk_id_aluno_recebimento_material, assunto_material, data_envio, material, fk_id_escola_material)
                        VALUES (:id_tipo_usuario, :id_usuario, :ra_aluno, :assunto, NOW(), :material, :id_escola)");

                        $query_envio->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                        $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                        $query_envio->bindParam(':ra_aluno', $ra_aluno, PDO::PARAM_INT);
                        $query_envio->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                        $query_envio->bindParam(':material', $material, PDO::PARAM_STR);
                        $query_envio->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
                        $query_envio->execute();

                        if ($query_envio->rowCount()) {
                            echo "<script>alert('Material de apoio enviado com sucesso');
                            window.location='../../homeDiretor.html.php';</script>";
                        } else {
                            echo "<script>alert('Erro: Material de apoio não enviado');
                            window.location='../../homeDiretor.html.php';</script>";
                        }
                    } else {
                        echo "<script>alert('ERRO: Houve algum erro, Tente novamente!');
                        window.location='../../homeDiretor.html.php';</script>";
                    }
                }
            }
        }
    } elseif ($id_tipo_usuario == 4) {

        $disciplina = $_POST["disciplina"];

        $query_select_alunos = $conn->prepare("SELECT RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $turma");
        $query_select_alunos->execute();

        if ($error == 1) {
            echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
            window.location='../../homeProfessor.html.php';</script>";
        }
        $tamanho = 3000000;

        if ((!preg_match("/\.(pdf|doc|docx|jpg|jpeg|png|gif|txt|ppt|pptx|xls|xlsx){1}$/i", $arquivo, $ext)) || ($size > $tamanho)) {
            echo "<script>alert('Ops! Isso não é um arquivo permitido, ou o tamanho do arquivo é maior que o permitido.');
            window.location='../../homeProfessor.html.php';</script>";
        } else {
            preg_match("/\.(pdf|doc|docx|jpg|jpeg|png|gif|txt|ppt|pptx|xls|xlsx){1}$/i", $arquivo, $ext);

            $material = $arquivo;

            $caminho = "../../assets/MaterialApoio/" . $material;

            move_uploaded_file($temp, $caminho);

            if ($caminho) {

                while ($dados = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {

                    if (isset($dados["RA"])) {
                        $ra_aluno = $dados["RA"];

                        $query_envio = $conn->prepare("INSERT INTO envio_material_apoio (fk_id_disciplina_material,fk_id_tipo_usuario_envio_material, fk_id_professor_envio_material, fk_id_aluno_recebimento_material, assunto_material, data_envio, material, fk_id_escola_material)
                        VALUES (:disciplina,:id_tipo_usuario, :id_usuario, :ra_aluno, :assunto, NOW(), :material, :id_escola)");

                        $query_envio->bindParam(':disciplina', $disciplina, PDO::PARAM_INT);
                        $query_envio->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
                        $query_envio->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                        $query_envio->bindParam(':ra_aluno', $ra_aluno, PDO::PARAM_INT);
                        $query_envio->bindParam(':assunto', $assunto, PDO::PARAM_STR);
                        $query_envio->bindParam(':material', $material, PDO::PARAM_STR);
                        $query_envio->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
                        $query_envio->execute();

                        if ($query_envio->rowCount()) {
                            echo "<script>alert('Material de apoio enviado com sucesso');
                            window.location='../../homeProfessor.html.php';</script>";
                        } else {
                            echo "<script>alert('Erro: Material de apoio não enviado');
                            window.location='../../homeProfessor.html.php';</script>";
                        }
                    } else {
                        echo "<script>alert('ERRO: Houve algum erro, Tente novamente!');
                        window.location='../../homeProfessor.html.php';</script>";
                    }
                }
            }
        }
    } else {
        echo "<script>alert('ERRO: Usuário sem permissão');
        window.location='../../index.php';</script>";
    }
} else {
    if ($id_tipo_usuario == 2) {
        echo "<script>alert('OPS: O arquivo ou assunto não podem ser enviados vazios');
        window.location='../../homeDiretor.html.php';</script>";
    } else {
        echo "<script>alert('OPS: O arquivo ou assunto não podem ser enviados vazios');
        window.location='../../homeProfessor.html.php';</script>";
    }
}
