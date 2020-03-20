<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
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
                        <a href="paginaManutencao.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            GestClass</a>

                        <ul class="right">
                            <li>
                                <a class="transparent" disable>Olá Ana</a>
                            </li>
                            <li>
                                <a href="perfil.php" class="transparent">
                                    <img class="circle icon-user" width="50px" height="50px" src="assets/img/pp.jpg">
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
                    <a href="perfil.php"><img class="circle" src="assets/img/pp.jpg"></a>
                    <a href="perfil.php"><span class="white-text name">Ana Beatriz</span></a>
                    <a href="perfil.php"><span class="white-text email">ana.lopes155@etec.sp.gov.br</span></a>
                </div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">person</i>Alunos</a></li>
            <li><a href="paginaManutencao.php"><i class="material-icons">group</i>Classes</a></li>
            <li><a href="paginaManutencao.php"><i class="material-icons">people_alt</i>Professores</a></li>
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



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/default.js"></script>

</body>

</html>