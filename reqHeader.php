<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>GestClass - Is Cool Manage</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/animate.css/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/izitoast/dist/css/iziToast.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/aos/dist/aos.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />

</head>

<body>

  <header>
    <div class="navbar-fixed">
      <nav class="light-blue lighten-1">
        <div class="container">
          <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i
                class="material-icons">menu</i></a>

            <ul class="right">
              <li>
                <a class="transparent" disable>Olá Ana</a>
              </li>
              <li class="hide-on-med-and-down">
                <a href="perfil.html.php" class="transparent">
                  <img class="circle icon-user" width="50px" height="50px" src="assets/img/pp.jpg">
                </a>
              </li>
              <li class="hide-on-med-and-down">
                <div class="dividerVert"></div>
              </li>
              <li>
                <a href="index.php"  class="btn-flat btnLight">Sair</a>
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
          <a href="perfil.html.php"><img class="circle" src="assets/img/pp.jpg"></a>
          <a href="perfil.html.php"><span class="white-text name">Ana Beatriz</span></a>
          <a href="perfil.html.php"><span class="white-text email">ana.lopes155@etec.sp.gov.br</span></a>
        </div>
      </li>
      <li><a href="homeSecretaria.html.php"><i class="material-icons">home</i>Home</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a href="paginaManutencao.php"><i class="material-icons">person</i>Alunos</a></li>
      <li><a href="paginaManutencao.php"><i class="material-icons">group</i>Classes</a></li>
      <li><a href="paginaManutencao.php"><i class="material-icons">people_alt</i>Professores</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a class="waves-effect" href="calendario.html.php"><i class="material-icons">event</i>Calendario Escolar</a>
      </li>
      <li><a href="cadastroContas.html.php"><i
            class="material-icons">group_add</i>Cadastro de contas
      </a></li>
    </ul>
  </header>