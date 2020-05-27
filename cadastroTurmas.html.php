<!DOCTYPE html>
<html lang="pt-br">

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
    <link rel="stylesheet" type="text/css" href="css/cadastroTurmas.css" />


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

    <div class="container col s12 m12 l12 "><br>
        <form id="cadastro_turmas" method="POST" action="php/cadastrarTurmas.php">
            <h5>Cadastrar Turmas</h5><br><br>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <select name="ensino">
                        <?php

                        $query_select_id_turma = $conn->prepare("SELECT ID_tipo_turma FROM tipo_turma WHERE $id_escola");
                        $query_select_id_turma->execute();

                        while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma_id['ID_tipo_turma'];

                            $query_select_turma = $conn->prepare("SELECT nome_tipo_turma FROM tipo_turma WHERE ID_tipo_turma = $id_turma");
                            $query_select_turma->execute();

                            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                $nome_turma = $dados_turma_nome['nome_tipo_turma'];

                        ?>
                                <option value="<?php echo $id_turma ?>"><?php echo $nome_turma; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label id="lbl">Selecione o Ensino</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <input name="turma" id="nome_turma" placeholder="Ex: 3ºano A . . ." type="text" class="validate">
                    <label id="lbl" for="first_name">Turma</label>
                </div>
            </div>
            <div class="input-field right">
                <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/cep.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>