<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$disciplina = $_POST["disciplina"];

if ($disciplina != "") {

    $query_insert = $conn->prepare("INSERT INTO disciplina (nome_disciplina, fk_id_escola_disciplina) VALUES (:disciplina, :id_escola)");
    $query_insert->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);
    $query_insert->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
    $query_insert->execute();

    if ($query_insert->rowCount()) {

        echo "<script>alert('Disciplina cadastrada com sucesso')
        window.location = '../atribuicaoDisciplinas.html.php'</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar!!');
        window.location = '../atribuicaoDisciplinas.html.php'</script>";
    }
} else {
    echo "<script>alert('Erro, Por Favor Preencha os campos.');
    window.location = '../atribuicaoDisciplinas.html.php'</script>";
}
