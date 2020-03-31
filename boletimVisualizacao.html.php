<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <title>GestClass - A gestão na palma da sua mão</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <!-- Bibliotecas CSS -->
  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

  <!-- Arquivo CSS -->
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/boletimVisualizacao.css" />
</head>



<body id="body_boletimVisualizacao">

  <?php require_once 'reqHeader.php' ?>

  <div class="container col s12 m12 l12 z-depth-5 " id="container_boletimVisualizacao">
    <div class="row">
      <div class="col s12 m12 l12">
        <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
          <li class="tab col s1 m3 l3 "><a href="#1bimestre">1° Bimestre</a></li>
          <li class="tab col s1 m3 l3 "><a href="#2bimestre">2° Bimestre</a></li>
          <li class="tab col s1 m3 l3 "><a href="#3bimestre">3° Bimestre</a></li>
          <li class="tab col s1 m3 l3 "><a href="#4bimestre">4° Bimestre</a></li>
        </ul>
      </div>

      <div class="col s12 m12 l12 " id="1bimestre">
        <table class="highlight centered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Item Name</th>
              <th>Item Price</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
              <td>$3.76</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
              <td>$7.00</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="2bimestre">
        <table class="highlight centered">
          <thead>
            <tr>
              <th>2Name</th>
              <th>Item Name</th>
              <th>Item Price</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
              <td>$3.76</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
              <td>$7.00</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="3bimestre">
        <table class="highlight centered">
          <thead>
            <tr>
              <th>3Name</th>
              <th>Item Name</th>
              <th>Item Price</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
              <td>$3.76</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
              <td>$7.00</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col s12 m12 l12" id="4bimestre">
        <table class="highlight centered">
          <thead>
            <tr>
              <th>4Name</th>
              <th>Item Name</th>
              <th>Item Price</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
              <td>$3.76</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
              <td>$7.00</td>
            </tr>
          </tbody>
        </table>
      </div>


      <div class="input-field left">
        <form action="pdf.php" method="post">
          <button class="btn waves-effect light-blue" type="submit" name="action"> Gerar PDF
            <i class="material-icons right">file_upload</i>
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="js/default.js"></script>
  <script src="js/boletimVisualizacao.js"></script>





  <?php require_once 'reqFooter.php' ?>