<?php
include_once 'php/conexao.php';
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

<body >

  <?php 
      include_once 'php/conexao.php';

      $id_usuario = $_SESSION["id_usuario"];
      $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
      $id_escola = $_SESSION["id_escola"];

      if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';
      } else if($id_tipo_usuario == 2){
          require_once 'reqDiretor.php';
      }else if($id_tipo_usuario == 3){
          require_once 'reqHeader.php';
      }elseif ($id_tipo_usuario == 4) {
          require_once 'reqProfessor.php';
      }elseif ($id_tipo_usuario  == 5) {
          require_once 'reqAluno.php';
      }else {
          require_once 'reqPais.php';
      }

  ?>
<html>
  <head>
  <div class='col s12 m12 l12' id="fundo">
    </div>
    <h4 class="tit center">Rendimento Turmas <i class="Small material-icons">trending_up </i></h4>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Element', '', { role: 'style' }],
            ['1 ANO A', 8.94, '#e3f2fd'],            // RGB value
            ['1 ANO B', 10, '#bbdefb'],            // English color name
            ['1 ANO C', 7.50, '#90caf9'],
            ['1 ANO D', 5.45, 'color: #64b5f6' ], // CSS-style declaration
          ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      $(window).resize(function(){
        var view = new google.visualization.DataView(data);
        chart.draw(view, options);
      })
  }
  </script>
    <div class="container col s12 m12 l12" id="container_grafico">
      <div class="row">
        <div class="col s12 m12 l12">
          <div id="columnchart_values" style="height:600px; " ></div>
     </div>
    </div>
  </div>
</html>



<?php
    include_once 'reqFooter.php';
?>
