<?php
// session_start();
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$query = $conn->prepare("SELECT * FROM secretario WHERE id_secretario = $id_usuario");
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);

$nomeSec = $dados['nome_secretario'];

$nome = Explode(" ", $nomeSec);
$nome_sec = $nome[0];

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

    <div id="modalCadastroContas" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecionar Tipo de Conta</h4>
            <div class="input-field col s12">
                <select id="selectConta" onchange="habilitaForm()">
                    <option value="" disabled selected>Selecionar Conta</option>
                    <option value="1">Responsável/Aluno</option>
                    <option value="2">Aluno</option>
                    <option value="3">Professor</option>
                    <option value="4">Secretaria</option>
                </select>
            </div>
        </div>
    </div>

    <div id="modalAlterarTurmas" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma para a alteração</h4>
            <div class="input-field col s12">
                <form action="alteracaoTurmas.html.php" method="POST">
                    <select name="turma">
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>

                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>

                </form>
            </div>
        </div>
    </div>

    <div id="modalHorarioAulas" class="modal">
        <div class="modal-content">
            <h4 class="center">Informe os Dados Solicitados</h4>
            <form action="cadastroHorarioAulas.html.php" method="POST"><br>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <label id="lbl" for="first_name">Nome do Padrão de Horários</label>
                        <input name="nome" id="nome" placeholder="Ex: Padrão 1" type="text" class="validate">
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select name="turno">
                            <option value="" disabled selected>Selecionar Turno</option>
                            <?php

                            $query_select_turno = $conn->prepare("SELECT * FROM turno");
                            $query_select_turno->execute();;

                            while ($dados_turno = $query_select_turno->fetch(PDO::FETCH_ASSOC)) {
                                $id_turno = $dados_turno["ID_turno"];
                                $nome_turno = $dados_turno['nome_turno'];
                            ?>
                                <option value="<?php echo $id_turno ?>"><?php echo $nome_turno; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i> Continuar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="modalFeedback" class="modal">
        <div class="modal-content">
            <h4 class="center">Digite o Problema que Ocoreu</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarFeedback.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalListaAlunos" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma</h4>
            <div class="input-field col s12">
                <form action="listaAlunos.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecionar Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalListaFuncionarios" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a área desejada</h4>
            <div class="input-field col s12">
                <form action="listarFuncionarios.html.php" method="POST">
                    <select name="funcionarios">
                        <option value="" disabled selected>Selecionar Área</option>
                        <option value="Secretarios">Secretários</option>
                        <option value="Professores">Professores</option>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalMensalidades" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma</h4>
            <div class="input-field col s12">
                <form action="arquivosAluno.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecionar Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalGradeCurricular" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione os Dados</h4>
            <div class="input-field col s12">
                <form action="cadastroGradeCurricular.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecionar Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    <select name="padroes">
                        <option value="" disabled selected>Selecionar Padrão de Horários</option>
                        <?php

                        $query_select_padroes = $conn->prepare("SELECT ID_aula_escola, nome_padrao FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola GROUP BY nome_padrao");
                        $query_select_padroes->execute();

                        while ($dados_padroes = $query_select_padroes->fetch(PDO::FETCH_ASSOC)) {
                            $id_padrao = $dados_padroes['ID_aula_escola'];
                            $nome_padrao = $dados_padroes['nome_padrao'];
                        ?>
                            <option value="<?php echo $id_padrao; ?>"><?php echo $nome_padrao; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    <select name="dia">
                        <option value="" disabled selected>Selecionar Dia da Semana</option>
                        <?php

                        $query_select_dias = $conn->prepare("SELECT ID_dia_semana, nome_dia FROM dia_semana ORDER BY ID_dia_semana ASC");
                        $query_select_dias->execute();

                        while ($dados_dias = $query_select_dias->fetch(PDO::FETCH_ASSOC)) {
                            $id_dia = $dados_dias['ID_dia_semana'];
                            $nome_dia = $dados_dias['nome_dia'];
                        ?>
                            <option value="<?php echo $id_dia; ?>"><?php echo $nome_dia; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Continuar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalCadastroTurmas" class="modal">
        <div class="modal-content">
            <form id="cadastro_turmas" method="POST" action="php/cadastrarTurmas.php">
                <h3 class="center">Cadastrar Turmas</h5><br><br>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <select name="turno">
                                <option value="" disabled selected>Selecionar Turno</option>
                                <?php

                                $query_select_turno = $conn->prepare("SELECT ID_turno,nome_turno FROM turno WHERE $id_escola");
                                $query_select_turno->execute();

                                while ($dados_turno = $query_select_turno->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_turno = $dados_turno['nome_turno'];
                                    $id_turno = $dados_turno['ID_turno'];

                                ?>
                                    <option value="<?php echo $id_turno ?>"><?php echo $nome_turno; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                            <label id="lbl" for="first_name">Turno</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input name="turma" id="nome_turma" placeholder="Ex: 3ºano A . . ." type="text" class="validate">
                            <label id="lbl" for="first_name">Turma</label>
                        </div>
                    </div>
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">send</i>Cadastrar
                    </button>
            </form>
        </div>
    </div>

    <div id="modalCadastroDisciplinas" class="modal">
        <div class="modal-content">
            <h4 class="center">Cadastro de Disciplinas</h4><br>
            <div id="novaMensagem">
                <form action="php/cadastrarNovasDisciplinas.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="disciplina" id="disciplina" placeholder="Digite o nome da disciplina" type="text" class="validate ">
                            <label id="lbl" for="first_name">Nome Disciplina</label>
                        </div>
                    </div>

                    <div class="input-field right">
                        <button id="formMensagem" type="submit" class="btn-flat btnLightBlue">
                            <i class="material-icons left">send</i>Cadastrar
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
                        <a href="homeSecretaria.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-small-only">GestClass<span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá <?php echo $nome_sec ?></a>
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
                    <a href="perfil.html.php"><span class="white-text name"><?php echo $nome_sec ?></span></a>
                    <a href="perfil.html.php"><span class="white-text email"><?php echo $dados['email'] ?></span></a>
                </div>
            </li>
            <li><a href="homeSecretaria.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="dropdown-trigger" href="paginaManutencao.php" data-target="dropdown1"><i class="material-icons">group_add</i>Cadastro de contas<i class="material-icons right" id="drop">arrow_drop_down</i></a></li>
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="cadastroResponsavel.html.php"><i class="material-icons">wc</i>Responsavel e aluno</a></li>
                <li><a href="cadastroAluno.html.php"><i class="material-icons">person</i>Aluno</a></li>
                <li><a href="cadastroProfessor.html.php"><i class="material-icons">people_alt</i>Professor</a></li>
                <li><a href="cadastroSecretaria.html.php"><i class="material-icons">school</i>Secretaria</a></li>
            </ul>
            <li><a href="#modalListaFuncionarios" class="modal-trigger"><i class="material-icons">people_alt</i>Lista de Funcionários</a></li>
            <li><a href="#modalListaAlunos" class="modal-trigger"><i class="material-icons">list_alt</i>Lista de Alunos</a></li>
            <li><a href="listaTurmas.html.php"><i class="material-icons">format_list_bulleted</i>Lista de Turmas</a></li>
            <li><a href="#modalMensalidades" class="modal-trigger"><i class="material-icons">description</i>Enviar Arquivos Responsáveis</a>
            <li><a href="calendario.html.php"><i class="material-icons">event</i>Calendario Escolar</a></li>
            <li><a href="#modalCadastroTurmas" class="modal-trigger"><i class="material-icons">book</i>Cadastro de Turmas</a></li>
            <li><a href="#modalCadastroDisciplinas" class="modal-trigger"><i class="material-icons">description</i>Cadastrar Disciplinas</a></li>
            <li><a href="#modalFeedback" class="modal-trigger"><i class="material-icons">support_agent</i>Relate um Problema</a></li>
            <li><a href="#modalAlterarTurmas" class="modal-trigger"><i class="material-icons">create</i>Alterar turmas dos alunos</a></li>
            <li><a href="#modalGradeCurricular" class="modal-trigger"><i class="material-icons">toc</i>Atribuir grade curricular de turmas</a></li>
            <li><a href="#modalHorarioAulas" class="modal-trigger"><i class="material-icons">access_time</i>Cadastro de horário de aulas </a></li>
            <li><a href="atribuicaoDisciplinas.html.php"><i class="material-icons">import_contacts</i>Atribuição de turmas e disciplinas</a></li>
            <li><a href="mensagensSecretaria.html.php"><i class="material-icons">email</i>Caixa de mensagens</a></li>
            <li><a href="modificarSenha.html.php"><i class="material-icons">lock_outline</i>Alterar Senha</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>
    </header>