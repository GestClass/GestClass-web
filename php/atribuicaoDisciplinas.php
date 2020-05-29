<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_professor = $_SESSION['ID_professor'];

$turmas = $_POST['turmas'];
$disciplinas = $_POST['disciplinas'];


$query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES ('{$id_professor}', '{$disciplinas}', '{$turmas}')");
$executa = $query_disciplinas->execute();
$query_turmas = $conn->prepare("INSERT INTO turmas_professor (fk_id_professor_turmas_professor, fk_id_turma_professor_turmas_professor) VALUES ('{$id_professor}', '{$turmas}')");
$executa_dois = $query_turmas->execute();

  if ($executa == 0) {
    echo "<script>alert('Disciplina não foi inserida');
    history.back();</script>";
  }else{

    if ($id_tipo_usuario == 2) {
  
?>
 <script>

        var confirmacao = confirm('Deseja atribuir outra turma?');

        if(confirmacao == true){
          window.location='../atribuicaoDisciplinas.html.php';
        }else{
          window.location='../homeDiretor.html.php';
        }
      
</script>
 <?php

        }else if($id_tipo_usuario == 3){
        
    ?>
 <script>

          var confirmacao = confirm('Deseja atribuir outra turma?');

          if(confirmacao == true){
            window.location='../atribuicaoDisciplinas.html.php';
          }else{
            window.location='../homeSecretaria.html.php';
          }
        
</script>
<?php
        }else{
          echo "<script>alert('Usuario sem permissão');
          window.location='../index.php'</script>";
         }
      }
    
    ?>