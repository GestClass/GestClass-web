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
              <th>Frequência</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              // Armazenando o nome e o id da disciplina
              $nome_disciplina = $array_disciplinas['nome_disciplina'];
              $id_disciplina = $array_disciplinas['id_disciplina'];

              // Selecionar datas finais de bimestres
              $sql_select_datas_finais_bimestres = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola");
              // Executar
              $sql_select_datas_finais_bimestres->execute();
              // Armazenar no array
              $array_datas = $sql_select_datas_finais_bimestres->fetch(PDO::FETCH_ASSOC);
              // Armazenar datas
              $bimestre1 = $array_datas["bimestre1"];
              $bimestre2 = $array_datas["bimestre2"];
              $bimestre3 = $array_datas["bimestre3"];
              $bimestre4 = $array_datas["bimestre4"];


              /*  - ALTERAR CONDIÇÕES DE DATAS A CADA ANO - */

              // Selecionar a quantidade de notas do bimestre 1
              $sql_select_count_notas_bim1 = $conn->prepare("SELECT COUNT(nota) AS contNotas FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '2020-01-01' AND data_atividade <= '$bimestre1'");
              // Executar
              $sql_select_count_notas_bim1->execute();
              // Armazenar no array
              $array_count_notas_bim1 = $sql_select_count_notas_bim1->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de notas da disciplina no 1º bim
              $qtdeNotas_bim1 = $array_count_notas_bim1['contNotas'];

              /*  - - - - - -   - - -   - - - -   - - --  - --  - - - - -*/

              // Selecionar a soma das notas do bimestre 1
              $sql_select_sum_notas_bim1 = $conn->prepare("SELECT SUM(nota) AS sumNota FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '2020-01-01' AND data_atividade <= '$bimestre1'");
              // Executar
              $sql_select_sum_notas_bim1->execute();
              // Armazenar retorno no array
              $array_soma_notas_bim1 = $sql_select_sum_notas_bim1->fetch(PDO::FETCH_ASSOC);
              // Armazenar soma de notas bimestre 1
              $somaNotas_bim1 = $array_soma_notas_bim1['sumNota'];


              /*    -   SELECT DE FALTAS    -   */

              // Selecionar quantidade de faltas  do bimestre 1
              $sql_select_count_faltas_bim1 = $conn->prepare("SELECT COUNT(presenca) AS qtdeFaltas FROM  chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND presenca = 0 AND data_aula > '2020-01-01' AND data_aula <= '$bimestre1' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_faltas_bim1->execute();
              // Armzenar resposta em um array
              $array_count_faltas_bim1 = $sql_select_count_faltas_bim1->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de faltas
              $qtdeFaltas_bim1 = $array_count_faltas_bim1['qtdeFaltas'];


              // Selecionar quantidade de chamadas do bimestre 1
              $sql_select_count_chamadas_bim1 = $conn->prepare("SELECT COUNT(presenca) AS qtdeChamadas FROM chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND data_aula > '2020-01-01' AND data_aula <= '$bimestre1' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_chamadas_bim1->execute();
              // Armazenar no array
              $array_count_chamadas_bim1 = $sql_select_count_chamadas_bim1->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de chamadas
              $qtdeChamadas_bim1 = $array_count_chamadas_bim1['qtdeChamadas'];

            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>
                  <?php

                  if ($qtdeNotas_bim1 == 0) {
                    echo '-';
                  } else {
                    // Gerar média bimestre 1
                    $media_bim1 = ($somaNotas_bim1 / $qtdeNotas_bim1);
                    $media_bim1 = number_format($media_bim1, 2, ',', '');
                    echo $media_bim1;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim1 == 0) {
                    echo '-';
                  } else {
                    echo $qtdeFaltas_bim1;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim1 == 0) {
                    echo '-';
                  } else {
                    $frequencia = 100 - ($qtdeFaltas_bim1 / $qtdeChamadas_bim1) * 100;
                    echo $frequencia.'%';
                  }
                  ?>
                </td>
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
              <th>Frequência</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              // Armazenando o nome e o id da disciplina
              $nome_disciplina = $array_disciplinas['nome_disciplina'];
              $id_disciplina = $array_disciplinas['id_disciplina'];

              // Selecionar datas finais de bimestres
              $sql_select_datas_finais_bimestres = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola");
              // Executar
              $sql_select_datas_finais_bimestres->execute();
              // Armazenar no array
              $array_datas = $sql_select_datas_finais_bimestres->fetch(PDO::FETCH_ASSOC);
              // Armazenar datas
              $bimestre1 = $array_datas["bimestre1"];
              $bimestre2 = $array_datas["bimestre2"];
              $bimestre3 = $array_datas["bimestre3"];
              $bimestre4 = $array_datas["bimestre4"];


              /*  - ALTERAR CONDIÇÕES DE DATAS A CADA ANO - */

              // Selecionar a quantidade de notas do bimestre 2
              $sql_select_count_notas_bim2 = $conn->prepare("SELECT COUNT(nota) AS contNotas FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '$bimestre1' AND data_atividade <= '$bimestre2'");
              // Executar
              $sql_select_count_notas_bim2->execute();
              // Armazenar no array
              $array_count_notas_bim2 = $sql_select_count_notas_bim2->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de notas da disciplina no 2º bim
              $qtdeNotas_bim2 = $array_count_notas_bim2['contNotas'];

              /*  - - - - - -   - - -   - - - -   - - --  - --  - - - - -*/

              // Selecionar a soma das notas do bimestre 2
              $sql_select_sum_notas_bim2 = $conn->prepare("SELECT SUM(nota) AS sumNota FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '$bimestre1' AND data_atividade <= '$bimestre2'");
              // Executar
              $sql_select_sum_notas_bim2->execute();
              // Armazenar retorno no array
              $array_soma_notas_bim2 = $sql_select_sum_notas_bim2->fetch(PDO::FETCH_ASSOC);
              // Armazenar soma de notas bimestre 2
              $somaNotas_bim2 = $array_soma_notas_bim2['sumNota'];


              /*    -   SELECT DE FALTAS    -   */

              // Selecionar quantidade de faltas  do bimestre 2
              $sql_select_count_faltas_bim2 = $conn->prepare("SELECT COUNT(presenca) AS qtdeFaltas FROM  chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND presenca = 0 AND data_aula > '$bimestre1' AND data_aula <= '$bimestre2' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_faltas_bim2->execute();
              // Armzenar resposta em um array
              $array_count_faltas_bim2 = $sql_select_count_faltas_bim2->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de faltas
              $qtdeFaltas_bim2 = $array_count_faltas_bim2['qtdeFaltas'];


              // Selecionar quantidade de chamadas do bimestre 2
              $sql_select_count_chamadas_bim2 = $conn->prepare("SELECT COUNT(presenca) AS qtdeChamadas FROM chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND data_aula > '$bimestre1' AND data_aula <= '$bimestre2' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_chamadas_bim2->execute();
              // Armazenar no array
              $array_count_chamadas_bim2 = $sql_select_count_chamadas_bim2->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de chamadas
              $qtdeChamadas_bim2 = $array_count_chamadas_bim2['qtdeChamadas'];

            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>
                  <?php
                  if ($qtdeNotas_bim2 == 0) {
                    echo '-';
                  } else {
                    // Gerar média bimestre 2;
                    $media_bim2 = ($somaNotas_bim2 / $qtdeNotas_bim2);
                    $media_bim2 = number_format($media_bim2, 2, ',', '');
                    echo $media_bim2;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim2 == 0) {
                    echo '-';
                  } else {
                    echo $qtdeFaltas_bim2;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim2 == 0) {
                    echo '-';
                  } else {
                    $frequencia = 100 - ($qtdeFaltas_bim2 / $qtdeChamadas_bim2) * 100;
                    echo $frequencia.'%';
                  }
                  ?>
                </td>
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
              <th>Frequência</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              // Armazenando o nome e o id da disciplina
              $nome_disciplina = $array_disciplinas['nome_disciplina'];
              $id_disciplina = $array_disciplinas['id_disciplina'];

              // Selecionar datas finais de bimestres
              $sql_select_datas_finais_bimestres = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola");
              // Executar
              $sql_select_datas_finais_bimestres->execute();
              // Armazenar no array
              $array_datas = $sql_select_datas_finais_bimestres->fetch(PDO::FETCH_ASSOC);
              // Armazenar datas
              $bimestre1 = $array_datas["bimestre1"];
              $bimestre2 = $array_datas["bimestre2"];
              $bimestre3 = $array_datas["bimestre3"];
              $bimestre4 = $array_datas["bimestre4"];


              /*  - ALTERAR CONDIÇÕES DE DATAS A CADA ANO - */

              // Selecionar a quantidade de notas do bimestre 3
              $sql_select_count_notas_bim3 = $conn->prepare("SELECT COUNT(nota) AS contNotas FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '$bimestre2' AND data_atividade <= '$bimestre3'");
              // Executar
              $sql_select_count_notas_bim3->execute();
              // Armazenar no array
              $array_count_notas_bim3 = $sql_select_count_notas_bim3->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de notas da disciplina no 3º bim
              $qtdeNotas_bim3 = $array_count_notas_bim3['contNotas'];

              /*  - - - - - -   - - -   - - - -   - - --  - --  - - - - -*/

              // Selecionar a soma das notas do bimestre 3
              $sql_select_sum_notas_bim3 = $conn->prepare("SELECT SUM(nota) AS sumNota FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '$bimestre2' AND data_atividade <= '$bimestre3'");
              // Executar
              $sql_select_sum_notas_bim3->execute();
              // Armazenar retorno no array
              $array_soma_notas_bim3 = $sql_select_sum_notas_bim3->fetch(PDO::FETCH_ASSOC);
              // Armazenar soma de notas bimestre 3
              $somaNotas_bim3 = $array_soma_notas_bim3['sumNota'];


              /*    -   SELECT DE FALTAS    -   */

              // Selecionar quantidade de faltas  do bimestre 3
              $sql_select_count_faltas_bim3 = $conn->prepare("SELECT COUNT(presenca) AS qtdeFaltas FROM  chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND presenca = 0 AND data_aula > '$bimestre2' AND data_aula <= '$bimestre3' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_faltas_bim3->execute();
              // Armzenar resposta em um array
              $array_count_faltas_bim3 = $sql_select_count_faltas_bim3->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de faltas
              $qtdeFaltas_bim3 = $array_count_faltas_bim3['qtdeFaltas'];


              // Selecionar quantidade de chamadas do bimestre 3
              $sql_select_count_chamadas_bim3 = $conn->prepare("SELECT COUNT(presenca) AS qtdeChamadas FROM chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND data_aula > '$bimestre2' AND data_aula <= '$bimestre3' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_chamadas_bim3->execute();
              // Armazenar no array
              $array_count_chamadas_bim3 = $sql_select_count_chamadas_bim3->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de chamadas
              $qtdeChamadas_bim3 = $array_count_chamadas_bim3['qtdeChamadas'];
            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>
                  <?php
                  if ($qtdeNotas_bim3 == 0) {
                    echo '-';
                  } else {
                    // Gerar média bimestre 3;
                    $media_bim3 = ($somaNotas_bim3 / $qtdeNotas_bim3);
                    $media_bim3 = number_format($media_bim3, 2, ',', '');
                    echo $media_bim3;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim3 == 0) {
                    echo '-';
                  } else {
                    echo $qtdeFaltas_bim3;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim3 == 0) {
                    echo '-';
                  } else {
                    $frequencia = 100 - ($qtdeFaltas_bim3 / $qtdeChamadas_bim3) * 100;
                    echo $frequencia.'%';
                  }
                  ?>
                </td>
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
              <th>Frequência</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              // Armazenando o nome e o id da disciplina
              $nome_disciplina = $array_disciplinas['nome_disciplina'];
              $id_disciplina = $array_disciplinas['id_disciplina'];

              // Selecionar datas finais de bimestres
              $sql_select_datas_finais_bimestres = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola");
              // Executar
              $sql_select_datas_finais_bimestres->execute();
              // Armazenar no array
              $array_datas = $sql_select_datas_finais_bimestres->fetch(PDO::FETCH_ASSOC);
              // Armazenar datas
              $bimestre1 = $array_datas["bimestre1"];
              $bimestre2 = $array_datas["bimestre2"];
              $bimestre3 = $array_datas["bimestre3"];
              $bimestre4 = $array_datas["bimestre4"];


              /*  - ALTERAR CONDIÇÕES DE DATAS A CADA ANO - */

              // Selecionar a quantidade de notas do bimestre 4
              $sql_select_count_notas_bim4 = $conn->prepare("SELECT COUNT(nota) AS contNotas FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '$bimestre3' AND data_atividade <= '$bimestre4'");
              // Executar
              $sql_select_count_notas_bim4->execute();
              // Armazenar no array
              $array_count_notas_bim4 = $sql_select_count_notas_bim4->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de notas da disciplina no 4º bim
              $qtdeNotas_bim4 = $array_count_notas_bim4['contNotas'];

              /*  - - - - - -   - - -   - - - -   - - --  - --  - - - - -*/

              // Selecionar a soma das notas do bimestre 4
              $sql_select_sum_notas_bim4 = $conn->prepare("SELECT SUM(nota) AS sumNota FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '$bimestre3' AND data_atividade <= '$bimestre4'");
              // Executar
              $sql_select_sum_notas_bim4->execute();
              // Armazenar retorno no array
              $array_soma_notas_bim4 = $sql_select_sum_notas_bim4->fetch(PDO::FETCH_ASSOC);
              // Armazenar soma de notas bimestre 4
              $somaNotas_bim4 = $array_soma_notas_bim4['sumNota'];


              /*    -   SELECT DE FALTAS    -   */

              // Selecionar quantidade de faltas  do bimestre 4
              $sql_select_count_faltas_bim4 = $conn->prepare("SELECT COUNT(presenca) AS qtdeFaltas FROM  chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND presenca = 0 AND data_aula > '$bimestre3' AND data_aula <= '$bimestre4' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_faltas_bim4->execute();
              // Armzenar resposta em um array
              $array_count_faltas_bim4 = $sql_select_count_faltas_bim4->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de faltas
              $qtdeFaltas_bim4 = $array_count_faltas_bim4['qtdeFaltas'];


              // Selecionar quantidade de chamadas do bimestre 4
              $sql_select_count_chamadas_bim4 = $conn->prepare("SELECT COUNT(presenca) AS qtdeChamadas FROM chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND data_aula > '$bimestre3' AND data_aula <= '$bimestre4' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_chamadas_bim4->execute();
              // Armazenar no array
              $array_count_chamadas_bim4 = $sql_select_count_chamadas_bim4->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de chamadas
              $qtdeChamadas_bim4 = $array_count_chamadas_bim4['qtdeChamadas'];

            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>
                  <?php
                  if ($qtdeNotas_bim4 == 0) {
                    echo '-';
                  } else {
                    // Gerar média bimestre 4;
                    $media_bim4 = ($somaNotas_bim4 / $qtdeNotas_bim4);
                    $media_bim4 = number_format($media_bim4, 2, ',', '');
                    echo $media_bim4;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim4 == 0) {
                    echo '-';
                  } else {
                    echo $qtdeFaltas_bim4;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_bim4 == 0) {
                    echo '-';
                  } else {
                    $frequencia = 100 - ($qtdeFaltas_bim4 / $qtdeChamadas_bim4) * 100;
                    echo $frequencia.'%';
                  }
                  ?>
                </td>
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
              <th>Frequência Final</th>
            </tr>
          </thead>

          <tbody>
            <?php
            // Selecionar o id e nome da disciplina
            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
            // Executar
            $query_select_disciplinas->execute();
            // Armazenar em um array
            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
              // Armazenando o nome e o id da disciplina
              $nome_disciplina = $array_disciplinas['nome_disciplina'];
              $id_disciplina = $array_disciplinas['id_disciplina'];

              // Selecionar datas finais de bimestres
              $sql_select_datas_finais_bimestres = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola");
              // Executar
              $sql_select_datas_finais_bimestres->execute();
              // Armazenar no array
              $array_datas = $sql_select_datas_finais_bimestres->fetch(PDO::FETCH_ASSOC);
              // Armazenar datas
              $bimestre1 = $array_datas["bimestre1"];
              $bimestre2 = $array_datas["bimestre2"];
              $bimestre3 = $array_datas["bimestre3"];
              $bimestre4 = $array_datas["bimestre4"];


              /*  - ALTERAR CONDIÇÕES DE DATAS A CADA ANO - */

              // Selecionar a quantidade de notas final
              $sql_select_count_notas_final = $conn->prepare("SELECT COUNT(nota) AS contNotas FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '2020-01-01' AND data_atividade <= '$bimestre4'");
              // Executar
              $sql_select_count_notas_final->execute();
              // Armazenar no array
              $array_count_notas_final = $sql_select_count_notas_final->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de notas da disciplina final
              $qtdeNotas_final = $array_count_notas_final['contNotas'];

              /*  - - - - - -   - - -   - - - -   - - --  - --  - - - - -*/

              // Selecionar a soma das notas do final
              $sql_select_sum_notas_final = $conn->prepare("SELECT SUM(nota) AS sumNota FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = $id_disciplina AND fk_ra_aluno_boletim_aluno = $ra AND data_atividade > '2020-01-01' AND data_atividade <= '$bimestre4'");
              // Executar
              $sql_select_sum_notas_final->execute();
              // Armazenar retorno no array
              $array_soma_notas_final = $sql_select_sum_notas_final->fetch(PDO::FETCH_ASSOC);
              // Armazenar soma de notas final
              $somaNotas_final = $array_soma_notas_final['sumNota'];


              /*    -   SELECT DE FALTAS    -   */

              // Selecionar quantidade de faltas  final
              $sql_select_count_faltas_final = $conn->prepare("SELECT COUNT(presenca) AS qtdeFaltas FROM  chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND presenca = 0 AND data_aula > '2020-01-01' AND data_aula <= '$bimestre4' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_faltas_final->execute();
              // Armzenar resposta em um array
              $array_count_faltas_final = $sql_select_count_faltas_final->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de faltas
              $qtdeFaltas_final = $array_count_faltas_final['qtdeFaltas'];


              // Selecionar quantidade de chamadas final
              $sql_select_count_chamadas_final = $conn->prepare("SELECT COUNT(presenca) AS qtdeChamadas FROM chamada_aluno WHERE fk_ra_aluno_chamada_aluno = $ra AND data_aula > '2020-01-01' AND data_aula <= '$bimestre4' AND fk_id_disciplina_chamada_aluno = $id_disciplina");
              // Executar
              $sql_select_count_chamadas_final->execute();
              // Armazenar no array
              $array_count_chamadas_final = $sql_select_count_chamadas_final->fetch(PDO::FETCH_ASSOC);
              // Armazenar quantidade de chamadas
              $qtdeChamadas_final = $array_count_chamadas_final['qtdeChamadas'];


            ?>
              <tr>
                <td><?php echo $nome_disciplina; ?></td>
                <td>
                  <?php
                  if ($qtdeNotas_final == 0) {
                    echo '-';
                  } else {
                    // Gerar média bimestre 1;
                    $media_final = ($somaNotas_final / $qtdeNotas_final);
                    $media_final = number_format($media_final, 2, ',', '');
                    echo $media_final;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_final == 0) {
                    echo '-';
                  } else {
                    echo $qtdeChamadas_final;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($qtdeChamadas_final == 0) {
                    echo '-';
                  } else {
                    $frequencia = 100 - ($qtdeFaltas_final / $qtdeChamadas_final) * 100;
                    echo $frequencia.'%';
                  }
                  ?>
                </td>
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