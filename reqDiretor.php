<?php
    // session_start();
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    $query = $conn->prepare("select * from diretor where id_diretor=$id_usuario");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $nomeDir = $dados['nome_diretor'];
    
    $nome = Explode(" ",$nomeDir);
    $nome_dir = $nome[0];

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
                        <a href="homeDiretor.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-small-only">GestClass<span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá <?php echo $nome_dir?></a>
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
                    <a href="perfil.html.php"><span class="white-text name"><?php echo $nome_dir?></span></a>
                    <a href="perfil.html.php"><span class="white-text email"><?php echo $dados['email']?></span></a>
                </div>
            </li>
            <li><a href="homeDiretor.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">person</i>Alunos</a></li>
            <li><a class="waves-effect" href="calendario.html.php"><i class="material-icons">event</i>Calendario
                    Escolar</a>
            <li><a href="listarProfessores.html.php"><i class="material-icons">people_alt</i>Professores</a></li>
            </li>
            <li><a class="dropdown-trigger" href="paginaManutencao.php" data-target="dropdown1"><i
                        class="material-icons">group_add</i>Cadastro de contas
                    <i class="material-icons right" id="drop">arrow_drop_down</i></a></li>
            <ul id='dropdown1' class='dropdown-content'>
            <li><a href="cadastroProfessor.html.php"><i class="material-icons">people_alt</i>Professores</a></li>
                <li><a href="cadastroSecretaria.html.php"><i class="material-icons">school</i>Secretaria</a></li>
                <li><a href="cadastroResponsavel.html.php"><i class="material-icons">wc</i>Responsável e Aluno</a></li>
                <li><a href="cadastroAluno.html.php"><i class="material-icons">person</i>Aluno</a></li>
            </ul>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="graficoRendimentoDiretor.php"><i class="material-icons">trending_up</i>Rendimento Escolar</a></li>
            <li><a href="paginaManutencao.php"><i class="material-icons">attach_money</i>Financeiro</a>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="paginaManutencao.php"><i class="material-icons">notifications</i>Notificações</a></li>
            <li><a href="index.php"><i class="material-icons">settings</i>Configurações</a></li>
            <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>
    </header>
