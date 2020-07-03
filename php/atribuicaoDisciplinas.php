<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$id_turma = $_POST['turma'];
$id_disciplina = $_POST['disciplinas'];
$id_professor = $_POST['professor'];

if ($id_turma == null || $id_disciplina == null || $id_professor == null) {
?>
  <script>
    alert('Por Favor, Selecione os Dados');
    history.back();
  </script>
  <?php
} else {


  $query_insert_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES (:id_professor, :id_disciplina, :id_turma)");

  $query_insert_disciplinas->bindParam(':id_professor', $id_professor, PDO::PARAM_STR);
  $query_insert_disciplinas->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_STR);
  $query_insert_disciplinas->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);

  $executa = $query_insert_disciplinas->execute();

  $query_insert_turmas_professor = $conn->prepare("INSERT INTO turmas_professor (fk_id_professor_turmas_professor, fk_id_turma_professor_turmas_professor) VALUES (:id_professor, :id_turma)");

  $query_insert_turmas_professor->bindParam(':id_professor', $id_professor, PDO::PARAM_STR);
  $query_insert_turmas_professor->bindParam(':id_turma', $id_turma, PDO::PARAM_STR);

  $executa2 = $query_insert_turmas_professor->execute();

  if (($executa == 0) || ($executa2 == 0)) {
    echo "<script>alert('Disciplina não foi inserida');
    history.back();</script>";
  } else {

    if ($id_tipo_usuario == 2) {

  ?>
      <script>
        var confirmacao = confirm('Deseja atribuir outra turma?');

        if (confirmacao == true) {
          window.location = '../atribuicaoDisciplinas.html.php';
        } else {
          window.location = '../homeDiretor.html.php';
        }
      </script>
    <?php

    } else if ($id_tipo_usuario == 3) {

    ?>
      <script>
        var confirmacao = confirm('Deseja atribuir outra turma?');

        if (confirmacao == true) {
          window.location = '../atribuicaoDisciplinas.html.php';
        } else {
          window.location = '../homeSecretaria.html.php';
        }
      </script>
<?php
    } else {
      echo "<script>alert('Usuario sem permissão');
          window.location='../index.php'</script>";
    }
  }
}

?>