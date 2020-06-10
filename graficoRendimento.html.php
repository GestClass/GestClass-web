<?php
$id = $_POST['disciplinas'];


include_once 'php/conexao.php';
$query = $conn->prepare("select nota,nome_atividade from boletim_aluno where fk_id_disciplina_boletim_aluno=:id");
$query->bindValue(":id", $id);
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);

// colocar include_once 'reqPais';
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset='utf-8' />
  <title>GestClass - A gestão na palma da sua mão</title>
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
  // substituir pelo valor que vier do 1º select (modal pais)
  $ra = 1;
  // Substiruir pelo valor que vier do select
  $id_disciplina = 5;


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

  ?>
  <html>

  <head>
    <div class='col s12 m12 l12' id="fundo">
    </div>
    <h4 class="tit center">Rendimento em
      <?php $query_select_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id");
      $query_select_nome->execute();
      while ($dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC)) {
        $nome = $dados_nome['nome_disciplina'];
        echo $nome;
      } ?> <i class="Small material-icons">trending_up </i>
    </h4>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        packages: ['corechart', 'bar']
      });
      google.charts.setOnLoadCallback(drawMultSeries);

      function drawMultSeries() {
        var data = google.visualization.arrayToDataTable([
          ['Element', '', {
            role: 'style'
          }],
          ['1BIMESTRE', 8.94, '#e3f2fd'], // RGB value
          ['2BIMESTRE', 10, '#bbdefb'], // English color name
          ['3BIMESTRE', 7.50, '#90caf9'],
          ['4BIMESTRE', 5.45, 'color: #64b5f6'], // CSS-style declaration
        ]);


        var options = {
          title: 'MÉDIA DAS NOTAS POR BIMESTRE',
          backgroundColor: 'rgba(255, 99, 71, 0.2)',
          width: '500px',
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
        $(window).resize(function() {
          var view = new google.visualization.DataView(data);
          chart.draw(view, options);
        })


      }
    </script>
  </head>

  <body>

    <table class="center responsive-table">
      <thead>
        <tr>
          <th>Professor(a)</th>
          <th>Frequência Atual</th>
          <th>Frequência Total</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $nome_professor?></td>
          <td>80%</td>
          <td>90%</td>
        </tr>

      </tbody>
    </table>
    <!--Div that will hold the pie chart-->
    <div class="container col s12 m12 l12" id="container_grafico">
      <div class="row">
        <div class="col s12 m12 l12">
          <div id="chart_div" style="height:800px; ">
          </div>
        </div>
      </div>
    </div>


    <?php
    include_once 'reqFooter.php';
    ?>