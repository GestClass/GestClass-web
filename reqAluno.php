<?php
    // session_start();
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    $query = $conn->prepare("select * from aluno where RA=$id_usuario");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $nomeAlu = $dados['nome_aluno'];
    
    $nome = Explode(" ",$nomeAlu);
    $nome_alu = $nome[0];

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
                        <a href="homeAluno.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-small-only">GestClass<span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá <?php echo $nome_alu?></a>
                            </li>
                            <?php if(empty($dados['foto'])){?>
                            <li>
                                <a href="perfil.html.php" class="transparent hide-on-small-only">
                                    <img class="circle icon-user" width="50px" height="50px"
                                        src="assets/imagensBanco/usuario.png">
                                </a>
                            </li>
                            <?php }else{?>
                            <li>
                                <a href="perfil.html.php" class="transparent hide-on-small-only">
                                    <img class="circle icon-user" width="50px" height="50px"
                                        src="assets/imagensBanco/<?php echo $dados['foto']?>">
                                </a>
                            </li>
                            <?php }?>
                            <li>
                                <div class="dividerVert hide-on-small-only"></div>
                            </li>
                            <li>
                                <a href="php/logout.php" class="btn-flat btnLight hide-on-small-only">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul id="slide-out" class="sidenav" style="width:auto">
            <li>
                <div class="user-view">
                    <div class="background light-blue lighten-1">
                        <!-- <img src="assets/img/slide2.png"> -->
                    </div>
                    <?php if(empty($dados['foto'])){?>
                        <a href="perfil.html.php"><img class="circle" src="assets/imagensBanco/usuario.png"></a>
                    <?php }else{?>   
                        <a href="perfil.html.php"><img class="circle" src="assets/imagensBanco/<?php echo $dados['foto']?>"></a> 
                    <?php }?>
                    <a href="perfil.html.php"><span class="white-text name"><?php echo $nome_alu?></span></a>
                    <a href="perfil.html.php"><span class="white-text email"><?php echo $dados['email']?></span></a>
                </div>
            </li>
            <li><a href="homeAluno.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">trending_up</i>Rendimento Escolar</a></li>
            <li><a href="paginaManutencao.php"><i class="material-icons">format_list_numbered_rtl</i>Boletim Escolar</a></li>
            <li><a class="waves-effect" href="calendario.html.php"><i class="material-icons">event</i>Calendario
                    Escolar</a>
            <li><a href="paginaManutencao.php"><i class="material-icons">list_alt</i>Grade Escolar</a>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">rowing</i>Atividades Extra</a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">notifications</i>Notificações</a></li>
            <li><a href="index.php"><i class="material-icons">settings</i>Configurações</a></li>
            <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>
    </header>