<?php
// session_start();
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$query = $conn->prepare("select * from responsavel where id_responsavel=$id_usuario");
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);

$nomePais = $dados['nome_responsavel'];

$nome = Explode(" ", $nomePais);
$nome_pais = $nome[0];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/boletimVisualizacao.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/animate.css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/aos/dist/aos.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />
    <link rel="stylesheet" type="text/css" href="css/homePais.css" />
    <link rel="stylesheet" type="text/css" href="css/grafico.css" />


</head>

<body>
    <div id="modalChat" class="modal ">
        <div class="modal-content">
            <h4 class="center"> <i class="material-icons right">vpn_key</i>Validação de Segurança</h4>
            <div class="input-field col s12 validate">
                <form action="php/pinNotif.php" method="POST">
                    <input placeholder="Digite o seu pin de acesso" id="first_name" name="pin" value="pin" type="password" data-mask="000000" class="validate" />
                    <div class="center">
                        <a class="btn-flat btnLightBlue1 centerr" href="esqPin.html.php">Esqueceu o PIN?</a>
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">verified_user</i>Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalNotif" class="modal ">
        <div class="modal-content">
            <h4 class="center"> <i class="material-icons right">vpn_key</i>Validação de Segurança</h4>
            <div class="input-field col s12 validate">
                <form action="php/pinChat.php" method="POST">
                    <input placeholder="Digite o seu pin de acesso" id="first_name" name="pin" value="pin" type="number" class="validate" />
                    <div class="center">
                        <a class="btn-flat btnLightBlue1 centerr" href="esqPin.html.php">Esqueceu o PIN?</a>
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">verified_user</i>Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalFilhosGrafico" class="modal">
        <div class="modal-content">
            <div class="input-field col s12 validate">
                <form action="selectDisciplinaRendimento.html.php" method="POST">
                    <h4 class="center">Selecione o Filho Desejado</h4>
                    <select name="filhos">
                        <option value="" disabled selected>Selecionar Filho</option>
                        <?php

                        $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario ");
                        $query_select_filhos_responsavel->execute();
                        print_r($query_select_filhos_responsavel);
                        while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

                            $nome_aluno = $filhos["nome_aluno"];
                            $ra = $filhos["RA"];

                        ?>
                            <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalFeedback" class="modal">
        <div class="modal-content">
            <h4 class="center">Digite o Problema que Occoreu</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarFeedback.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalFilhosGrade" class="modal">
        <div class="modal-content">
            <div class="input-field col s12 validate">
                <form action="gradeCurricularExibicao.html.php" method="POST">
                    <h4 class="center">Selecione o Filho Desejado</h4>
                    <select name="filhos">
                        <option value="" disabled selected>Selecionar Filho</option>
                        <?php

                        $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario");
                        $query_select_filhos_responsavel->execute();
                        print_r($query_select_filhos_responsavel);

                        while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

                            $nome_aluno = $filhos["nome_aluno"];
                            $ra = $filhos["RA"];

                        ?>
                            <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalFilhosBoletim" class="modal">
        <div class="modal-content">
            <div class="input-field col s12 validate">
                <form action="boletimVisualizacao.html.php" method="POST">
                    <h4 class="center">Selecione o Filho Desejado</h4>
                    <select name="filhos">
                        <option value="" disabled selected>Selecionar Filho</option>
                        <?php

                        $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario");
                        $query_select_filhos_responsavel->execute();
                        print_r($query_select_filhos_responsavel);

                        while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

                            $nome_aluno = $filhos["nome_aluno"];
                            $ra = $filhos["RA"];

                        ?>
                            <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <header>
        <div class="navbar-fixed">
            <nav class="light-blue lighten-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">clear_all</i></a>
                        <a href="homePais.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-small-only">GestClass<span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá
                                    <?php echo $nome_pais ?></a>
                            </li>
                            <?php if (empty($dados['foto'])) { ?>
                                <li>
                                    <a href="perfil.html.php" class="transparent hide-on-small-only">
                                        <img class="circle icon-user" width="50px" height="50px" src="assets/imagensBanco/usuario.png">
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="perfil.html.php" class="transparent hide-on-small-only">
                                        <img class="circle icon-user" width="50px" height="50px" src="assets/imagensBanco/<?php echo $dados['foto'] ?>">
                                    </a>
                                </li>
                            <?php } ?>
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
                    <?php if (empty($dados['foto'])) { ?>
                        <a href="perfil.html.php"><img class="circle" src="assets/imagensBanco/usuario.png"></a>
                    <?php } else { ?>
                        <a href="perfil.html.php"><img class="circle" src="assets/imagensBanco/<?php echo $dados['foto'] ?>"></a>
                    <?php } ?>
                    <a href="perfil.html.php"><span class="white-text name"><?php echo $nome_pais ?></span></a>
                    <a href="perfil.html.php"><span class="white-text email"><?php echo $dados['email'] ?></span></a>
                </div>
            </li>
            <li><a href="homePais.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#modalFilhosGrade" class="modal-trigger"><i class="material-icons">toc</i>Grade Curricular</a>
            <li><a href="#modalFilhosGrafico" class="modal-trigger"><i class="material-icons">trending_up</i>Rendimento Disciplinar</a></li>
            <li><a href="#modalFilhosBoletim" class="modal-trigger"><i class="material-icons">format_list_numbered_rtl</i>Boletim Escolar</a></li>
            <li><a href="listaBoletos.html.php"><i class="material-icons">attach_money</i>Financeiro</a></li>
            <li><a href="calendario.html.php"><i class="material-icons">event</i>Calendario Escolar</a></li>
            <li><a href="mensagensResponsavel.html.php"><i class="material-icons">email</i>Mensagens</a>
            <li><a href="#modalFeedback" class="modal-trigger"><i class="material-icons">support_agent</i>Relate um Problema</a></li>
            <li><a href="modificarSenha.html.php"><i class="material-icons">lock_outline</i>Alterar Senha</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>
    </header>
</body>