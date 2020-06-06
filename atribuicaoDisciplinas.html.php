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
    <link rel="stylesheet" type="text/css" href="css/cadastroContas.css" />


</head>

<body>

    <?php
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';
    } else if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } else if ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    } elseif ($id_tipo_usuario  == 5) {
        require_once 'reqAluno.php';
    } else {
        require_once 'reqPais.php';
    }
    ?>

    <div id="turmas_disci" class="container col s12 m12 l12 ">
        <form id="disciplina_turmas" method="POST" action="php/atribuicaoDisciplinas.php"">
            <h5>Atribuiçao de turmas e disciplinas</h5><br><br>

            <div class=" row">
            <div class="input-field col s12 m6 l6">
                <i class="material-icons prefix blue-icon">account_circle</i>
                <select name="professor">
                    <option value="" disabled selected>Selecione Professor</option>
                    <?php

                    $query_select_id_professor = $conn->prepare("SELECT ID_professor FROM professor WHERE $id_escola");
                    $query_select_id_professor->execute();

                    while ($dados_id_professor = $query_select_id_professor->fetch(PDO::FETCH_ASSOC)) {
                        $id_professor = $dados_id_professor['ID_professor'];

                        $query_select_nome = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = $id_professor");
                        $query_select_nome->execute();

                        while ($dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC)) {
                            $nome_professor = $dados_nome['nome_professor'];

                            session_start();
                            $_SESSION['ID_professor'] = $id_professor;
                    ?>
                            <option value="<?php echo $id_professor ?>"><?php echo $nome_professor; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <label id="lbl">Selecione o Professor</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <i class="material-icons prefix blue-icon">school</i>
                <select name="turmas">
                    <option value="" disabled selected>Selecione a Turma</option>
                    <?php

                    $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                    $query_select_id_turma->execute();

                    while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                        $id_turma = $dados_turma_id['ID_turma'];

                        $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                        $query_select_turma->execute();

                        while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $nome_turma = $dados_turma_nome['nome_turma'];

                    ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma; ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
                <label id="lbl" for="first_name">Turmas</label>
            </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix blue-icon">school</i>
            <select name="disciplinas">
                <option value="" disabled selected>Selecione a Disciplina</option>
                <?php

                $query_select_id = $conn->prepare("SELECT ID_disciplina FROM disciplina WHERE $id_escola ORDER BY `ID_disciplina` DESC LIMIT 10 ");
                $query_select_id->execute();

                while ($dados_id = $query_select_id->fetch(PDO::FETCH_ASSOC)) {
                    $id_disciplina = $dados_id['ID_disciplina'];

                    $query_select_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
                    $query_select_nome->execute();

                    while ($dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC)) {
                        $nome = $dados_nome['nome_disciplina'];

                ?>
                        <option value="<?php echo $id_disciplina ?>"><?php echo $nome; ?></option>
                <?php
                    }
                }
                ?>

            </select>
            <label id="lbl" for="first_name">Disciplinas</label>
        </div>
        <a href="disciplinas.html.php" id="disciplinas" class="waves-effect waves-light blue btn">Nova Disciplina</a>
    </div>
    <div class="input-field right">
        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
    </div>
    </form>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Cadastrar Turmas"><i class="material-icons">book</i></a></li>
            <li><a href="paginaManutencao.php" class="btn-floating black tooltipped" data-position="left" data-tooltip="Dados Professore"><i class="material-icons">account_circle</i></a></li>
        </ul>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>