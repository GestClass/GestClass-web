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
                                class="material-icons">clear_all</i></a>
                        <a href="homeSecretaria.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-small-only">GestClass<span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá Ana</a>
                            </li>
                            <li>
                                <a href="perfil.html.php" class="transparent hide-on-small-only">
                                    <img class="circle icon-user" width="50px" height="50px" src="assets/img/pp.jpg">
                                </a>
                            </li>
                            <li>
                                <div class="dividerVert hide-on-small-only"></div>
                            </li>
                            <li>
                                <a href="index.php" class="btn-flat btnLight hide-on-small-only">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background light-blue lighten-1">
                        <!-- <img src="assets/img/slide2.png"> -->
                    </div>
                    <a href="perfil.html.php"><img class="circle" src="assets/img/pp.jpg"></a>
                    <a href="perfil.html.php"><span class="white-text name">Ana Beatriz</span></a>
                    <a href="perfil.html.php"><span class="white-text email">ana.lopes155@etec.sp.gov.br</span></a>
                </div>
            </li>
            <li><a href="homeSecretaria.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">person</i>Alunos</a></li>
            <li><a class="waves-effect" href="calendario.html.php"><i class="material-icons">event</i>Calendario
                    Escolar</a>
            <li><a href="paginaManutencao.php"><i class="material-icons">people_alt</i>Professores</a></li>
            </li>
            <li><a class="dropdown-trigger" href="paginaManutencao.php" data-target="dropdown1"><i
                        class="material-icons">group_add</i>Cadastro de contas
                    <i class="material-icons right" id="drop">arrow_drop_down</i></a></li>
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="cadastroContas.html.php#professor"><i class="material-icons">people_alt</i>Professores</a></li>
                <li><a href="cadastroContas.html.php#secretaria"><i class="material-icons">school</i>Secretaria</a></li>
                <li><a href="cadastroContas.html.php#alunos"><i class="material-icons">person</i>Alunos</a></li>
                <li><a href="cadastroContas.html.php#responsavel"><i class="material-icons">wc</i>Pais</a></li>
            </ul>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">notifications</i>Notificações</a></li>
            <li><a href="index.php"><i class="material-icons">settings</i>Configurações</a></li>
            <li><a href="index.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>
    </header>
