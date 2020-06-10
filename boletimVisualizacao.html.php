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
    echo $ra;

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
    $turma_aluno = $aluno['fk_id_turma_aluno'];

    // Resgatando a turma do aluno
    $sql_select_turma_aluno = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $turma_aluno");
    // Executando comando 
    $sql_select_turma_aluno->execute();
    // Armazenando nome da turma
    $turma = $sql_select_turma_aluno->fetch(PDO::FETCH_ASSOC);

    // Variável nome turma
    $nome_turma_aluno = $turma['nome_turma'];

  ?>
<body id="body_boletimVisualizacao">
  <div class="container col s12 m12 l12 z-depth-5 " id="container_boletimVisualizacao">
    <div class="row">
      <div class="col s12 m12 l12 ">
        <h3 class="center">BOLETIM</h3>
        <br>
        <h5 class="center"><?php echo $nome_escola?></h5>
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
              <td><?php echo $nome_aluno;?></td>
              <td>123456789</td>
              <td><?php echo $nome_turma_aluno?></td>
              <td> Matutino</td>

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
              <th>Notas</th>
              <th>Faltas</th>
            </tr>
          </thead>

          <tbody>
            <tr>

              <td>

                <?php
                $query_select_disciplinas = $conn->prepare('SELECT * FROM aluno WHERE fk_id_responsavel_aluno');

                ?>
                Matematica

              </td>
              <td>10</td>
              <td>4</td>

            </tr>
            <tr>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="2bimestre">
        <h4 class="center">2° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas</th>
              <th>Faltas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Matematica</td>
              <td>10</td>
              <td>4</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>8</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>7</td>
              <td>1</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>9</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>5</td>
              <td>-</td>
            </tr>
            <tr>
              <th colspan="2">Situação Atual Do Aluno:</th>
              <th>Aprovado</th>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="3bimestre">
        <h4 class="center">3° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas</th>
              <th>Faltas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Matematica</td>
              <td>10</td>
              <td>4</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>8</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>7</td>
              <td>1</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>9</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>5</td>
              <td>-</td>
            </tr>
            <tr>
              <th colspan="2">Situação Atual Do Aluno:</th>
              <th>Aprovado</th>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="4bimestre">
        <h4 class="center">4° Bimestre</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Componente Curricular</th>
              <th>Notas</th>
              <th>Faltas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Matematica</td>
              <td>10</td>
              <td>4</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>8</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>7</td>
              <td>1</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>9</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>5</td>
              <td>-</td>
            </tr>
            <tr>
              <th colspan="2">Situação Atual Do Aluno:</th>
              <th>Aprovado</th>
            </tr>
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
            <tr>
              <td>Matematica</td>
              <td>10</td>
              <td>4</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>8</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>7</td>
              <td>1</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>9</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Matematica</td>
              <td>5</td>
              <td>-</td>
            </tr>
            <tr>
              <th colspan="2">Situação Atual Do Aluno:</th>
              <th>Aprovado</th>
            </tr>

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