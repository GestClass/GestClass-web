<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$disciplina = $_POST["disciplina"];

if ($disciplina != "") {

    $situacao = true;

    $query_insert = $conn->prepare("INSERT INTO disciplina (nome_disciplina, fk_id_escola_disciplina, situacao) VALUES (:disciplina, :id_escola, :situacao)");
    $query_insert->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);
    $query_insert->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
    $query_insert->bindParam(':situacao', $situacao, PDO::PARAM_STR);
    $query_insert->execute();

  if ($query_insert->rowCount()) {

    if ($id_tipo_usuario == 2) {
      echo "<script>alert('Disciplina cadastrada com sucesso')
      window.location = '../homeDiretor.html.php'</script>";
    } else if ($id_tipo_usuario == 3) {

      echo "<script>alert('Disciplina cadastrada com sucesso')
      window.location = '../homeSecretaria.html.php'</script>";
    }
  } else {
    echo "<script>alert('Erro ao cadastrar!!');
    history.back()</script>";
  }
} else {
  echo "<script>alert('Erro, Por Favor Preencha os campos.');
    history.back()</script>";
}
