<?php
include_once 'php/conexao.php';

$id_disciplina =  $_POST['disciplinas'];
$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

if ($id_tipo_usuario == 1) {
  require_once 'reqMenuAdm.php';
} else if ($id_tipo_usuario == 2) {
  require_once 'reqDiretor.php';
} else if ($id_tipo_usuario == 3) {
  require_once 'reqHeader.php';
} elseif ($id_tipo_usuario == 4) {
  require_once 'reqProfessor.php';
} elseif ($id_tipo_usuario  == 5) {
  require_once 'reqAluno.php';
} else {
  require_once 'reqPais.php';
}
if ($id_tipo_usuario == 6) {
  $ra = $_SESSION["RA_filho"];
} else {
  $ra = $id_usuario;
}


$nome_turno = $_SESSION['nome_turno'];
$select_boletim_aluno = $conn->prepare("select nota,nome_atividade, data_atividade from boletim_aluno where fk_id_disciplina_boletim_aluno=:id and fk_ra_aluno_boletim_aluno=:ra");
$select_boletim_aluno->bindValue(":id", $id_disciplina);
$select_boletim_aluno->bindValue(":ra", $ra);
$select_boletim_aluno->execute();






// Selecionar a turma do aluno
$sql_select_id_turma = $conn->prepare("SELECT fk_id_turma_aluno FROM aluno WHERE RA = $ra");
// Executando
$sql_select_id_turma->execute();
// Armazenando array da informação
$array_turma = $sql_select_id_turma->fetch(PDO::FETCH_ASSOC);
// Armazenar ID turma
$id_turma = $array_turma['fk_id_turma_aluno'];


// Selecionar nome da turma
$sql_select_nome_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
// Executar
$sql_select_nome_turma->execute();
// Armazenar array de informação
$array_nome_turma = $sql_select_nome_turma->fetch(PDO::FETCH_ASSOC);
// Armazenar nome da turma
$nome_turma = $array_nome_turma['nome_turma'];


// Selecionando o id do professor
$sql_select_id_professor = $conn->prepare("SELECT fk_id_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_turma_professor_disciplinas_professor = $id_turma AND fk_id_disciplina_professor_disciplinas_professor = $id_disciplina");
// Executar
$sql_select_id_professor->execute();
// Armazenar no array
$array_id_professor = $sql_select_id_professor->fetch(PDO::FETCH_ASSOC);
// Armazenar na variavel o id do professor
$id_professor = $array_id_professor['fk_id_professor_disciplinas_professor'];


// Selecionar o nome do professor
$sql_select_nome_professor = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = $id_professor");
// Executar
$sql_select_nome_professor->execute();
// Armazenar no array
$array_nome_professor = $sql_select_nome_professor->fetch(PDO::FETCH_ASSOC);
// Armazenando nome professor na variável
$nome_professor = $array_nome_professor['nome_professor'];

//Selecionar data do fim do semestre
$sql_fim_semestre = $conn->prepare("SELECT  bimestre1, bimestre2, bimestre3, bimestre4,fk_id_escola_datas_fim_bimestres FROM   datas_fim_bimestres where fk_id_escola_datas_fim_bimestres = $id_escola");
//executar
$sql_fim_semestre->execute();
//armazenar
$array_fim_semestre = $sql_fim_semestre->fetch(PDO::FETCH_ASSOC);

$bimestre1 = $array_fim_semestre['bimestre1'];
$bimestre2 = $array_fim_semestre['bimestre2'];
$bimestre3 = $array_fim_semestre['bimestre3'];
$bimestre4 = $array_fim_semestre['bimestre4'];

?>
<html>

<head>
  <div class='col s12 m12 l12' id="fundo">
  </div>

  <h4 class="tit center">Rendimento em
    <?php $query_select_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
    $query_select_nome->execute();
    while ($dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC)) {
      $nome = $dados_nome['nome_disciplina'];
      //aqui exibe a disciplina puxada 
      echo $nome;
    }

    ?> <i class="Small material-icons">trending_up </i>
  </h4>




</head>

<body>

  <div class="container">
    <table class="center responsive-table">
      <thead>
        <tr>
          <th>Professor(a)</th>
          <th>Turno</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $nome_professor ?></td>
          <td><?php echo $nome_turno ?></td>
        </tr>

      </tbody>
    </table>
  </div>
  <div class="container">
    <h4 class="tit center">Atividades Realizadas </h4>
    <table class="atividades center striped">
      <thead>
        <th>
          Data
        </th>
        <th>
          Atividades
        </th>
        <th>
          Notas
        </th>
        <th>
          Bimestre
        </th>
      </thead>
      <tbody>
        <?php
        while ($dados_boletim_aluno = $select_boletim_aluno->fetch(PDO::FETCH_ASSOC)) {
          $nota = $dados_boletim_aluno['nota'];
          $nome_atividade = $dados_boletim_aluno['nome_atividade'];
          //modificar a cada ano
          $data_atividade = $dados_boletim_aluno['data_atividade'];
          if (($data_atividade > '2020-01-01') && ($data_atividade <= $bimestre1)) {
            $bimestre = "1º Bimestre";
          } elseif (($data_atividade > $bimestre1) && ($data_atividade <= $bimestre2)) {
            $bimestre = "2º Bimestre";
          } elseif (($data_atividade > $bimestre2) && ($data_atividade <= $bimestre3)) {
            $bimestre = "3º Bimestre";
          } elseif (($data_atividade > $bimestre3) && ($data_atividade <= $bimestre4)) {
            $bimestre = "4º Bimestre";
          }

        ?>
          <tr>
            <td><?php echo date('d/m/Y ', strtotime($data_atividade)) ?></td>
            <td><?php echo $nome_atividade ?></td>
            <td><?php echo $nota ?></td>
            <td><?php echo $bimestre ?></td>
          <?php } ?>
          </tr>

      </tbody>
    </table>
  </div>
<br><br>
  <?php
  include_once 'reqFooter.php';
  ?>