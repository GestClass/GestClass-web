<?php
include_once 'php/conexao.php';

  $id_disciplina =  $_POST['disciplinas'];
  $RA_filho = $_SESSION["RA_filho"];

  $select_boletim_aluno = $conn->prepare("select nota,nome_atividade, data_atividade from boletim_aluno where fk_id_disciplina_boletim_aluno=:id and fk_ra_aluno_boletim_aluno=:ra");
  $select_boletim_aluno->bindValue(":id", $id_disciplina);
  $select_boletim_aluno->bindValue(":ra", $RA_filho);
  $select_boletim_aluno->execute();
 


?>
  <?php
  include_once 'reqPais.php';

  $id_usuario = $_SESSION["id_usuario"];
  $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
  $id_escola = $_SESSION["id_escola"];

  
 

  // Selecionar a turma do aluno
  $sql_select_id_turma = $conn->prepare("SELECT fk_id_turma_aluno FROM aluno WHERE RA = $RA_filho");
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

  $bimestre1=$array_fim_semestre['bimestre1'];
  $bimestre2=$array_fim_semestre['bimestre2'];
  $bimestre3=$array_fim_semestre['bimestre3'];
  $bimestre4=$array_fim_semestre['bimestre4'];

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
      

        $query_select_n = $conn->prepare("SELECT * FROM aluno");
        $query_select_n->execute();
        while ($dados_n = $query_select_n->fetch(PDO::FETCH_ASSOC)) {
          $nomeL = $dados_n['nome_aluno'];

      ?> <i class="Small material-icons">trending_up </i>
    </h4>


    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        packages: ['corechart', 'bar']
      });
      google.charts.setOnLoadCallback(drawMultSeries);
      <?php
      
      ?>
      function drawMultSeries() {
        var data = google.visualization.arrayToDataTable([
          ['Element', '', {
            role: 'style'
          }],
          ['<?php echo $dados_n['nome_aluno'];?>', 8.94, '#e3f2fd'], // RGB value
                ]);
        <?php } ?>


        var options = {
          title: 'MÉDIA DAS NOTAS POR BIMESTRE',
          backgroundColor: 'rgba(255, 99, 71, 0.2)',
          width: '700px',
          chartArea: {
            left: 300,
            top: 30
          },
          hAxis: {
            title: 'NOTAS',
            minValue: 0
          }
        };

        var chart = new google.visualization.BarChart(document.querySelector('#chart_div'));
        chart.draw(data, options);

        $(window).resize(function(){
          drawMultSeries();
          
        });


      }
    </script>


    
  </head>

  <body>

    <table class="center responsive-table">
      <thead>
        <tr>
          <th>Professor(a)</th>
          <th>Turno</th>
          <th>Frequência Atual</th>
          <th>Frequência Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $nome_professor ?></td>
          <td><?php   ?></td>
          <td>80%</td>
          <td>90%</td>
        </tr>

      </tbody>
    </table>
    <h4 class="tit center">Atividades Realizadas </h4>
    <table class="atividades center striped">
    <thead>
             <tr>
              <th>Data</th>
              <th>Atividades</th>
              <th>Notas</th>
              <th>Bimestre</th>
            </tr>
          </thead>
          <?php 
           while( $dados_boletim_aluno = $select_boletim_aluno->fetch(PDO::FETCH_ASSOC)){
            $nota = $dados_boletim_aluno['nota'];
            $nome_atividade = $dados_boletim_aluno['nome_atividade'];
            $data_atividade = $dados_boletim_aluno['data_atividade'];
            if(strtotime($data_atividade) < strtotime($bimestre1)){
              $bimestre = "1º Bimestre";
            }elseif(strtotime($data_atividade) < strtotime($bimestre2)){
              $bimestre = "2º Bimestre";
            }elseif (strtotime($data_atividade) < strtotime($bimestre3)) {
              $bimestre = "3º Bimestre";
            }else {
              $bimestre ="4º Bimestre";
            }
          
          ?>
         
          <tbody>
        <tr>
          <td><?php echo $data_atividade?></td>
          <td><?php echo $nome_atividade ?></td>
          <td><?php echo $nota ?></td>
          <td><?php echo $bimestre ?></td>
          <?php } ?>
        </tr>

      </tbody>
    </table>
    <button id="btnTable" type="submit" href='#modal' class=" modal-trigger  btn-flat btnLightBlue center">
        <i class="material-icons left">trending_up</i> Acessar Gráfico  
      </button>
    <!--Div that will hold the pie chart-->
<div id="modal" class="modal">
  <div class="modal-content">
        <div class=" col-md-6">
          <div id="chart_div" style="height:500px; width:900px; ">
          <h4 class="tit center">Gráfico</h4>
          </div>
        </div>
      </div>


<?php
  include_once 'reqFooter.php';
?>