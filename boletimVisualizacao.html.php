<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/izimodal/css/iziModal.min.css">

    <!-- Arquivo CSS -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/boletimVisualizacao.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />

</head>

<body>
  
  <?php require_once 'reqHeader.php' ?>

  <div class="row">
    <div class="col s12 m6">
      <div class="card-boletim">
          <h3>Boletim</h3>
            <table class="centered striped " >
        <thead>
          <tr>
              <th >COMPONENTE CURRICULAR</th>
              <th colspan="2">1º BIMESTRE</th>
              <th colspan="2">2º BIMESTRE</th>
              <th colspan="2">3º BIMESTRE</th>
              <th colspan="2">4º BIMESTRE</th>
              <th colspan="2"> RESULTADO FINAL</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th> DISCIPLINAS</th>
            <th>n</th>
            <th>f</th>
            <th>n</th>
            <th>f</th>
            <th>n</th>
            <th>f</th>
            <th>n</th>
            <th>f</th>
            <th>MÉDIA</th>
            <TH> FALTAS</TH>
          </tr>
          <tr>
          <td>GEOGRAFIA</td>
            <td>9.55</td>
            <td>2</td>
            <td>10</td>
            <td>1</td>
            <td>10</td>
            <td>-</td>
            <td>10</td>
            <td>5</td>
            <td>8.7</td>
          </tr>
          <tr>
          <td>GEOGRAFIA</td>
            <td>8.55</td>
            <td>4</td>
            <td>10</td>
            <td>3</td>
            <td>10</td>
            <td>-</td>
            <td>10</td>
            <td>5</td>
            <td>8.7</td>
          </tr>
          <tr>
          <td>GEOGRAFIA</td>
            <td>7.55</td>
            <td>4</td>
            <td>10</td>
            <td>3</td>
            <td>10</td>
            <td>8.7</td>
            <td>10</td>
            <td>8.7</td>
            <td>8.7</td>
          </tr>
          <tr>
          <td>GEOGRAFIA</td>
            <td>4.55</td>
            <td>9.87</td>
            <td>10</td>
            <td>8.7</td>
            <td>10</td>
            <td>8.7</td>
            <td>10</td>
            <td>8.7</td>
            <td>8.7</td>
          </tr>
          <tr>
          <td>GEOGRAFIA</td>
            <td>4.55</td>
            <td>9.87</td>
            <td>10</td>
            <td>8.7</td>
            <td>10</td>
            <td>8.7</td>
            <td>10</td>
            <td>8.7</td>
            <td>8.7</td>

          </tr>
        </tbody>
      </table>
      <a href="contratacao.html.php" class="btn-flat btn-smalls btnDark btnHome" >
        <i class="large material-icons">file_upload</i>
            Gerar PDF
      </a>
    </div>
  </div>

<?php require_once 'reqFooter.php' ?>
