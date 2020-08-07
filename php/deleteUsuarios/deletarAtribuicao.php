<?php

require_once '../conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_disciplina = $_POST['id_disciplina'];
$id_professor = $_POST['id_professor'];

$sql_delete_professor = $conn->prepare("DELETE FROM grade_curricular WHERE ID_grade_curricular = :id_disciplina");
$sql_delete_professor->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_STR);
$sql_delete_professor->execute();

if ($sql_delete_professor->rowCount()) {
    if ($id_tipo_usuario == 2) {?>

      <script>
        var confirmacao = confirm('Deseja retirar outra atribuição de disciplina?');

        if (confirmacao == true) {
          window.location = '../../retirarDisciplinas.html.php?id=<?php echo $id_professor ?>';
        } else {
          window.location = '../../homeDiretor.html.php';
        }
      </script>
    <?php

    } elseif ($id_tipo_usuario == 3) {
        ?>
      <script>
        var confirmacao = confirm('Deseja atribuir outra turma?');

        if (confirmacao == true) {
          window.location = '../../retirarDisciplinas.html.php?id=<?php echo $id_professor ?>';
        } else {
          window.location = '../../homeSecretaria.html.php';
        }
      </script>
        
    <?php
    }
}else {
    echo "<script>alert('Erro ao retirar atribuiçao');
        window.location='../index.php'</script>";
  }
?>