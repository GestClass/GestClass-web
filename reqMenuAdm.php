<?php
        // session_start();
        include_once 'php/conexao.php';

        $id_usuario = $_SESSION["id_usuario"];
        $id_tipo_usuario = $_SESSION["id_tipo_usuario"];

        $query = $conn->prepare("select * from admin where id_admin=$id_usuario");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        $nomeADM = $dados['nome'];
        
        $nome = Explode(" ",$nomeADM);
        $nome_admin = $nome[0];
?>

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
    <link rel="stylesheet" type="text/css" href="css/menu.css" />

</head>

<body>

    <header>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i
                                class="material-icons">clear_all</i></a>
                        <a href="homeAdmGest.html.php" class="brand-logo "><i class="fas fa-drafting-compass"></i><span
                                class="hide-on-small-only">GestClass</span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá <?php echo $nome_admin?></a>
                            </li>
                            <?php if(empty($dados['foto'])){?>
                            <li>
                                <a href="#" class="transparent hide-on-small-only">
                                    <img class="circle icon-user" width="50px" height="50px"
                                        src="assets/imagensBanco/usuario.png">
                                </a>
                            </li>
                            <?php }else{?>
                            <li>
                                <a href="#" class="transparent hide-on-small-only">
                                    <img class="circle icon-user" width="50px" height="50px"
                                        src="assets/imagensBanco/<?php echo $dados['foto']?>">
                                </a>
                            </li>
                            <?php }?>
                            <li>
                                <div class="dividerVert hide-on-small-only"></div>
                            </li>
                            <li>
                                <a href="php/logout.php" data-izimodal-open="#modalLogin"
                                    class="btn-flat btnLight hide-on-small-only">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul id="slide-out" class="sidenav mobile-nav">
            <li>
                <div class="user-view">
                    <div class="background indigo darken-4">
                        <!-- <img src="assets/img/slide2.png"> -->
                    </div>
                    <?php if(empty($dados['foto'])){?>
                        <a href="#"><img class="circle" src="assets/imagensBanco/usuario.png"></a>
                    <?php }else{?>   
                        <a href="#"><img class="circle" src="assets/imagensBanco/<?php echo $dados['foto']?>"></a> 
                    <?php }?>
                    <a href="#"><span class="white-text name"><?php echo $nome_admin?></span></a>
                    <a href="#"><span class="white-text email"><?php echo $dados['email']?></span></a>
                </div>
            </li>
            <li><a href="homeAdmGest.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="admins.html.php"><i class="material-icons">perm_identity</i>Admins</a></li>
            <li><a href="cadastroEscola.html.php"><i class="material-icons">account_balance</i>Cadastro Escolas</a></li>
            <li><a class="waves-effect" href="visaoGeral.html.php"><i class="material-icons">explore</i>Visão Geral</a></li>
            <li><a class="waves-effect" href="feedbackEscolas.html.php"><i class="material-icons">mail_outline</i>Feedback Usuários</a></li>
            <li><a class="waves-effect" href="solicitacoesadm.html.php"><i class="material-icons">add_alert</i>Solicitações de cadastro</a></li>
            <li><a class="waves-effect" href="modificarSenha.html.php"><i class="material-icons">lock_outline</i>Alterar Senha</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <!-- <li><a class="subheader">Submenu</a></li> -->
            <!-- <li><a href="paginaManutencao.php"><i class="material-icons">notifications</i>Notificações</a></li> -->
            <!-- <li><a href="perfil.html.php"><i class="material-icons">settings</i>Configurações</a></li> -->
            <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>


    </header>



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/default.js"></script>

</body>

</html>