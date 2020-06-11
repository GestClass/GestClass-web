  <?php
  include_once 'php/conexao.php';

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

  $ra = $_POST['filhos'];

  // Resgatando nome da escola
  $sql_select_nome_escola = $conn->prepare("SELECT nome_escola FROM escola WHERE ID_escola = $id_escola");
  $sql_select_nome_escola->execute();

  // Armazenando nome da escola
  $escola = $sql_select_nome_escola->fetch(PDO::FETCH_ASSOC);

  // Nome da escola
  $nome_escola = $escola['nome_escola'];



  // Resgatando dados dos Alunos
  $sql_select_dados_alunos = $conn->prepare("SELECT * FROM aluno WHERE RA = $ra");

  // Executando comando no banco
  $sql_select_dados_alunos->execute();

  // Armazenando retorno em um array com as informações
  $aluno = $sql_select_dados_alunos->fetch(PDO::FETCH_ASSOC);

  // variaveis de dados do aluno
  $nome_aluno = $aluno['nome_aluno'];
  $id_turma_aluno = $aluno['fk_id_turma_aluno'];



  // Resgatando a turma do aluno
  $sql_select_turma_aluno = $conn->prepare("SELECT nome_turma, fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma_aluno");

  // Executando comando 
  $sql_select_turma_aluno->execute();

  // Armazenando nome da turma
  $turma_array = $sql_select_turma_aluno->fetch(PDO::FETCH_ASSOC);

  // Variável nome turma
  $nome_turma_aluno = $turma_array['nome_turma'];
  $id_turno = $turma_array['fk_id_turno_turma'];



  // Resgatar nome do turno
  $sql_select_nome_turno = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");

  // Executando o comando
  $sql_select_nome_turno->execute();

  // Armazenando nome do turno
  $turno = $sql_select_nome_turno->fetch(PDO::FETCH_ASSOC);

  // Armazenando o nome em variável
  $nome_turno = $turno['nome_turno'];



  ?>


  <div class="container col s12 m12 l12 z-depth-5 " id="container_boletimVisualizacao">
    <div class="row">
      <div class="col s12 m12 l12 ">
        <h3 class="center">BOLETIM</h3>
        <br>
        <h5 class="center"><?php echo $nome_escola ?></h5>
        <br>
        <table class="info highlight">
          <thead>
            <tr>
              <th>Nome</th>
              <th>RA</th>
              <th>Turma</th>
              <th>Turno</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $nome_aluno; ?></td>
              <td><?php echo $ra ?></td>
              <td><?php echo $nome_turma_aluno ?></td>
              <td><?php echo $nome_turno ?></td>

          </tbody>
        </table>

        <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
          <li class="tab col s1 m3 l3 "><a href="#1bimestre">1° Bimestre</a></li>
          <li class="tab col s1 m2 l2 "><a href="#2bimestre">2° Bimestre</a></li>
          <li class="tab col s1 m2 l2 "><a href="#3bimestre">3° Bimestre</a></li>
          <li class="tab col s1 m2 l2 "><a href="#4bimestre">4° Bimestre</a></li>
          <li class="tab col s1 m3 l3 "><a href="#mf">Média Final</a></li>
        </ul>
      </div>

      <div class="col s12 m12 l12 " id="1bimestre">
        <h4 class="center">1° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th>Faltas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_turma, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.ID_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              $nome_disciplina = $array_disciplinas['nome_disciplina'];


            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>10</td>
                <td>4</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="2bimestre">
        <h4 class="center">2° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th>Faltas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_turma, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.ID_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              $nome_disciplina = $array_disciplinas['nome_disciplina'];


            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>10</td>
                <td>4</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="3bimestre">
        <h4 class="center">3° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th>Faltas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_turma, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.ID_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              $nome_disciplina = $array_disciplinas['nome_disciplina'];


            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>10</td>
                <td>4</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="4bimestre">
        <h4 class="center">4° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th>Faltas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_turma, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.ID_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              $nome_disciplina = $array_disciplinas['nome_disciplina'];


            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>10</td>
                <td>4</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12 " id="mf">
        <h4 class="center">Média</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas Finais</th>
              <th>Faltas Finais </th>
            </tr>
          </thead>

          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_turma, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.ID_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              $nome_disciplina = $array_disciplinas['nome_disciplina'];


            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>10</td>
                <td>4</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="input-field right">
        <form action="pdf.php" method="post">
          <div class="center">
            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
              <i class="material-icons left">file_upload</i>Gerar PDF
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="js/default.js"></script>
  <script src="js/boletimVisualizacao.js"></script>





  <?php require_once 'reqFooter.php' ?>