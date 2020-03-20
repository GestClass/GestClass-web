<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/compass_white.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Arquivo CSS -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/contrato.css" />

</head>

<body class="scrollspy" id="home">

    <header>
        <div class="navbar-fixed">
            <nav class="light-blue lighten-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#home" class="brand-logo"><i class="fas fa-drafting-compass"></i> <span
                                class="hide-on-med-and-down">GestClass</span></a>
                        <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">clear_all</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="#home" class="btn-flat btnText">Home</a>
                            </li>
                            <li>
                                <a href="#sobre" class="btn-flat btnText">Sobre</a>
                            </li>
                            <li>
                                <a href="#recursos" class="btn-flat btnText">Recursos</a>
                            </li>
                            <li>
                                <a href="#contato" class="btn-flat btnText">Contato</a>
                            </li>
                            <li>
                                <a href="#modalLogin" class="btn-flat btnDefault modal-trigger">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="mobile-nav">
            <li>
                <a href="#home" class="waves-effect waves-light">Home</a>
            </li>
            <li>
                <a href="#sobre" class="waves-effect waves-light">Sobre</a>
            </li>
            <li>
                <a href="#recursos" class="waves-effect waves-light">Recursos</a>
            </li>
            <li>
                <a href="#contato" class="waves-effect waves-light">Contato</a>
            </li>
            <li>
                <a href="#modalLogin" class="waves-effect waves-light btnOpenLogin modal-trigger">Login</a>
            </li>
        </ul>
    </header>



    <footer class="section light-blue lighten-1 white-text center">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <p class="flow-text">
                        GestClass &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        | Todos os direitos reservados
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bibliotecas JS -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/lax.js/lib/lax.min.js"></script>
    <script src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>

    <!-- Arquivo JS -->
    <script src="js/contrato.js"></script>


</body>

</html>