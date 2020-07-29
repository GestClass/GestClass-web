<?php
include_once 'php/conexao.php';
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset='utf-8' />
  <title>GestClass - Is Cool Manage</title>
  <link rel="icon" href="assets/icon/logo.png" />
  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/grafico.css" />

</head>

<body>

  <?php
  include_once 'php/conexao.php';

  $id_usuario = $_SESSION["id_usuario"];
  $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
  $id_escola = $_SESSION["id_escola"];

  $id_disciplina = $_POST['disciplinas'];

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

  $id_turma = $_POST['idTurma'];

  if ($id_disciplina == null) {
  ?>
    <script>
      alert('Erro, É Necessário Selecionar uma Disciplina!!');
      window.location = 'homeDiretor.html.php';
    </script>
  <?php
  }

  // Selecionar nome e turno da turma
  $sql_select_turma = $conn->prepare("SELECT turma.nome_turma AS nome_turma, turno.nome_turno AS turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE ID_turma = $id_turma");
  // Executar
  $sql_select_turma->execute();
  // Armazenar no array
  $array_turma = $sql_select_turma->fetch(PDO::FETCH_ASSOC);
  // Armazenar nome e turno
  $nome_turma = $array_turma['nome_turma'];
  $nome_turno = $array_turma['turno'];

  // Selecionando dados do professor
  $sql_select_professor = $conn->prepare("SELECT disciplinas_professor.fk_id_professor_disciplinas_professor AS id_professor, professor.nome_professor AS nome_professor FROM disciplinas_professor INNER JOIN professor ON (disciplinas_professor.fk_id_professor_disciplinas_professor = professor.ID_professor) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma AND disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = $id_disciplina");
  // Executar
  $sql_select_professor->execute();
  // Armazenar no array
  $array_professor = $sql_select_professor->fetch(PDO::FETCH_ASSOC);
  // Armazenar na variavel o id do professor
  $id_professor = $array_professor['id_professor'];
  $nome_professor = $array_professor['nome_professor'];


  //selecionar nome disciplina
  $query_select_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
  //Executar
  $query_select_nome->execute();
  //armazenando em um array
  $dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC);
  //armazenando em variavel
  $nomeDisciplina = $dados_nome['nome_disciplina'];



  //selecionar notas alunos agrupando
  $select_soma_notas = $conn->prepare("SELECT SUM(nota)as soma, nome_atividade, data_atividade  from boletim_aluno where fk_id_disciplina_boletim_aluno=:id and fk_id_turma_boletim_aluno=:idTurma group by fk_id_boletim_listagem_boletim_aluno");
  //passar parametro
  $select_soma_notas->bindValue(":id", $id_disciplina);
  $select_soma_notas->bindValue(":idTurma", $id_turma);
  //executar
  $select_soma_notas->execute();

  //selecionar notas alunos agrupando
  $select_contagem_notas = $conn->prepare("SELECT COUNT(nota)as cont, nome_atividade, data_atividade  from boletim_aluno where fk_id_disciplina_boletim_aluno=:id and fk_id_turma_boletim_aluno=:idTurma group by fk_id_boletim_listagem_boletim_aluno");
  //passar parametro
  $select_contagem_notas->bindValue(":id", $id_disciplina);
  $select_contagem_notas->bindValue(":idTurma", $id_turma);
  //executar
  $select_contagem_notas->execute();

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
      <?php
      echo $nomeDisciplina;
      ?><i class="Small material-icons">trending_up </i></h4>
    <div class="container">
      <table class="centered responsive-table">
        <thead>
          <tr>
            <th>Turma</th>
            <th>Turno</th>
            <th>Disciplina</th>
            <th>Professor(a)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $nome_turma ?></td>
            <td><?php echo $nome_turno ?></td>
            <td><?php echo $nomeDisciplina ?></td>
            <td><?php echo $nome_professor ?></td>

          </tr>

        </tbody>
      </table>
    </div>
    <h4 class="tit center">Atividades Realizadas </h4>
    <div class="container">
      <table class="atividades centered striped ">
        <thead>
          <tr>
            <th>Data</th>
            <th>Atividade</th>
            <th>Média Notas</th>
            <th>Alunos</th>
            <th>Bimestre</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($count_notas = $select_contagem_notas->fetch(PDO::FETCH_ASSOC)) {
            $notas_qntd = $count_notas['cont'];



            while ($soma_notas = $select_soma_notas->fetch(PDO::FETCH_ASSOC)) {
              $nota = $soma_notas['soma'];
              $nome_atividade = $soma_notas['nome_atividade'];
              $data_atividade = $soma_notas['data_atividade'];
              $media = $nota / $notas_qntd;

              //modificar a cada ano

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
                <td><?php echo $media ?></td>
                <td><?php echo $notas_qntd ?></td>
                <td><?php echo $bimestre ?></td>
            <?php

            }
          }
            ?>
              </tr>

        </tbody>
      </table><br><br>
    </div>


    <?php
    include_once 'reqFooter.php';
    ?>