<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/izimodal/css/iziModal.min.css">

    <!-- Arquivo CSS -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/boletim.css" />
</head>
<link rel="stylesheet" type="text/css" href="css/menu.css" />

</head>

<body>

  <header>
    <div class="navbar-fixed">
      <nav class="light-blue lighten-1">
        <div class="container">
          <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i
                class="material-icons">menu</i></a>
            <a href="homeSecretaria.php" class="brand-logo"><i class="fas fa-drafting-compass"></i> GestClass</a>

            <ul class="right">
              <li>
                <a class="transparent" disable>Olá Monique</a>
              </li>
              <li>
                <a href="perfil.php" class="transparent">
                  <img class="circle icon-user" width="50px" height="50px" src="assets/img/momo.jpg">
                </a>
              </li>
              <li>
                <div class="dividerVert"></div>
              </li>
              <li>
                <a href="#" data-izimodal-open="#modalLogin" class="btn-flat btnLight">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <ul id="slide-out" class="sidenav">
      <li>
        <div class="user-view">
          <div class="background">
            <img src="assets/img/slide2.png">
          </div>
          <a href="perfil.php"><img class="circle" src="assets/img/momo.jpg"></a>
          <a href="perfil.php"><span class="white-text name">Monique</span></a>
          <a href="perfil.php"><span class="white-text email">monique@etec.sp.gov.br</span></a>
        </div>
      </li>
      <li><a href="paginaManutencao.php"><i class="material-icons">filter_1</i>1 Semestre</a></li>
      <li><a href="paginaManutencao.php"><i class="material-icons">filter_2</i>2 Semestre</a></li>
      <li><a href="paginaManutencao.php"><i class="material-icons">filter_3</i>3 Semestre</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a class="subheader">Subheader</a></li>
      <li><a class="waves-effect" href="calendario.php"><i class="material-icons">event</i>Calendario Escolar</a>
      </li>
      <li><a class="dropdown-trigger" href="paginaManutencao.php" data-target="dropdown1"><i
            class="material-icons">group_add</i>Cadastro de contas
            <i class="material-icons right" id="drop">arrow_drop_down</i></a></li>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="paginaManutencao.php"><i class="material-icons">people_alt</i>Professores</a></li>
        <li><a href="paginaManutencao.php"><i class="material-icons">school</i>Secretaria</a></li>
        <li><a href="paginaManutencao.php"><i class="material-icons">person</i>Alunos</a></li>
        <li><a href="paginaManutencao.php"><i class="material-icons">wc</i>Pais</a></li>
      </ul>
    </ul>
  </header>
  <div class="row">
    <div class="col s12 m6">
      <div class="card-boletim">
          <h3>Boletim</h3>
            <table class="centered striped " >
        <thead>
          <tr>
              <th >COMPONENTE CURRICULAR</th>
              <th colspan="2">1ºBIMESTRE</th>
              <th colspan="2">2ºBIMESTRE</th>
              <th colspan="2">3ºBIMESTRE</th>
              <th colspan="2">4ºBIMESTRE</th>
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
      <form action="pdf.php" method="post">
        <input type="submit" value="gerar pdf">
      </a>
      </form>
    </div>

  </div>

  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
  <script src="js/menu.js"></script>
  <script src="js/default.js"></script>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
  </script>

</body>

</html>
