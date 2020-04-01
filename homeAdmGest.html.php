<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/homeAdmGest.css" />

</head>

<body>

    <?php
 
    require_once 'reqMenuAdm.php';


    // echo "id usuario ->".$id_usuario."</br>";
    // echo "id tipo usuario ->".$id_tipo_usuario."</br>";
    ?>

    <section class="section center">
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <a href="admins.html.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="far fa-user fa-6x blue-icon"></i>
                            <h5>Admins</h5>
                            <p>Acesso aos dados dos admins, efetuação e remoção de cadastros</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a class="modal-trigger" href="cadastroEscola.html.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-school fa-6x blue-icon"></i>
                            <h5>Cadastro Escolas</h5>
                            <p>Cadastro de novos acessos de escolas ao aplicativo e remoção das mesmas</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-compass fa-6x blue-icon"></i>
                            <h5>Visão geral</h5>
                            <p>Visão geral do sistema para testes</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-envelope fa-6x blue-icon"></i>
                            <h5>Intermedio Escola e ADMINS</h5>
                            <p>Intermediario entre as escolas e os administradores do sistema</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-bell fa-6x blue-icon"></i>
                            <h5>Notificações</h5>
                            <p>Envio de notificações para as escolas, avisos sobre atraso de mensalidade ou manutenção
                                no sistema</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="perfil.html.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-cog fa-6x blue-icon"></i>
                            <h5>Configurações</h5>
                            <p>Configurações da conta</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="floating-buttons">
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large indigo darken-4">
                <i class="large material-icons">add</i>
            </a>
            <ul>
                <li><a href="cadastroEscola.html.php" class="btn-floating black tooltipped" data-position="left"
                        data-tooltip="Cadastro Escolas"><i class="material-icons">account_balance</i></a></li>
                <li><a href="paginaManutencao.html" class="btn-floating yellow darken-1 tooltipped" data-position="left"
                        data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
                <li><a href="paginaManutencao.html" class="btn-floating blue-grey darken-4 tooltipped"
                        data-position="left" data-tooltip="Intermedio"><i class="material-icons">email</i></a></li>
                <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left"
                        data-tooltip="Visão Geral"><i class="material-icons">explore</i></a></li>
            </ul>
        </div>
    </section>


    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/customAdm.js"></script>
    <script src="js/default.js"></script>

</body>

</html>
