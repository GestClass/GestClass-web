<?php
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];
$id_disciplina =  $_POST['disciplinas'];

if (($id_disciplina == null) && ($id_tipo_usuario == 6)) {
?>
  <script>
    alert('Por Favor, Selecione uma Disciplina!!');
    window.location = 'homePais.html.php';
  </script>
<?php
} elseif (($id_disciplina == null) && ($id_tipo_usuario == 5)) {
?>
  <script>
    alert('Por Favor, Selecione uma Disciplina!!');
    window.location = 'homeAluno.html.php';
  </script>
  <?php
} else {

  if ($id_tipo_usuario == 6) {    
    require_once 'reqPais.php';
    $ra = $_POST["ra"];
  } else {
    $ra = $id_usuario;
    require_once 'reqAluno.php';
  }

  //Selecionar data do fim do semestre
  $sql_fim_semestre = $conn->prepare("SELECT  bimestre1, bimestre2, bimestre3, bimestre4,fk_id_escola_datas_fim_bimestres FROM   datas_fim_bimestres where fk_id_escola_datas_fim_bimestres = $id_escola");
  //executar
  $sql_fim_semestre->execute();
  // Verificar retorno
  if ($sql_fim_semestre->rowCount()) {
    //armazenar
    $array_fim_semestre = $sql_fim_semestre->fetch(PDO::FETCH_ASSOC);

    $bimestre1 = $array_fim_semestre['bimestre1'];
    $bimestre2 = $array_fim_semestre['bimestre2'];
    $bimestre3 = $array_fim_semestre['bimestre3'];
    $bimestre4 = $array_fim_semestre['bimestre4'];

    $select_boletim_aluno = $conn->prepare("SELECT nota,nome_atividade, data_atividade FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = :id AND fk_ra_aluno_boletim_aluno = :ra");
    $select_boletim_aluno->bindValue(":id", $id_disciplina);
    $select_boletim_aluno->bindValue(":ra", $ra);
    $select_boletim_aluno->execute();





    // Selecionar a turma do aluno
    $sql_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM aluno INNER JOIN turma ON (aluno.fk_id_turma_aluno = turma.ID_turma) INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE aluno.RA = $ra");
    // Executando
    $sql_select_turma->execute();
    // Armazenando array da informação
    $array_turma = $sql_select_turma->fetch(PDO::FETCH_ASSOC);
    // Armazenar dados da turma
    $id_turma = $array_turma['id_turma'];
    $nome_turma = $array_turma['nome_turma'];
    $nome_turno = $array_turma['nome_turno'];

    // Selecionando o nome do professor
    $sql_select_professor = $conn->prepare("SELECT professor.nome_professor AS nome_professor FROM disciplinas_professor INNER JOIN professor ON (fk_id_professor_disciplinas_professor = ID_professor) WHERE fk_id_turma_professor_disciplinas_professor = $id_turma AND fk_id_disciplina_professor_disciplinas_professor = $id_disciplina");
    // Executar
    $sql_select_professor->execute();
    // Armazenar no array
    $array_professor = $sql_select_professor->fetch(PDO::FETCH_ASSOC);
    // Armazenar na variavel o nome do professor
    $nome_professor = $array_professor['nome_professor'];

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
        <table class="centered responsive-table">
          <thead>
            <tr>
              <th>Professor(a)</th>
              <th>Turma</th>
              <th>Turno</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $nome_professor ?></td>
              <td><?php echo $nome_turma ?></td>
              <td><?php echo $nome_turno ?></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="container">
        <h4 class="tit center">Atividades Realizadas </h4>
        <table class="atividades centered striped">
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
  } else {
    ?>
      <script>
        alert('Desculpe, o(a) Diretor(a) Ainda Não Cadastrou as Datas de Fim de Bimestre!!');
        window.location = '<?php $id_tipo_usuario == 5 ? $location = "homeAluno.html.php" : $location = "homePais.html.php"; echo $location; ?>'
      </script>
  <?php
  }
}
  ?>