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

  ?>
<body id="body_boletimVisualizacao">
  <div class="container col s12 m12 l12 z-depth-5 " id="container_boletimVisualizacao">
    <div class="row">
      <div class="col s12 m12 l12">
        <h3 class="center">BOLETIM</h3>
        <h5 class="center">Escola Tecnica De Itaquaquecetuba</h5>
        <table class="info highlight ">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Turma</th>
              <th>Turno</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Monique Correia Oliveira</td>
              <td> 3 ano B</td>
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
                $query_select_disciplinas = $conn->prepare('');

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
          <button class="btn waves-effect blue lighten-2" type="submit" name="action"> Gerar PDF
            <i class="material-icons right">file_upload</i>
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="js/default.js"></script>
  <script src="js/boletimVisualizacao.js"></script>





  <?php require_once 'reqFooter.php' ?>