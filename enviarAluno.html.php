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

    $ra_aluno = $_GET["ra"];
    $nome_aluno = $_GET["n"];

    ?>

    <div class="container"><br>
        <h4 class="center">Enviar mensagem ao Aluno</h4><br>
        <form action="php/enviarMensagem/enviarAluno.php" method="POST">
            <div class="modal-content">
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input type="text" name="ra" value="<?php echo $ra_aluno ?>" hidden>
                        <input name="assunto" value="<?php echo $ra_aluno; ?>" type="text" readonly>
                        <label id="lbl" for="first_name">RA Aluno</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input name="assunto" value="<?php echo $nome_aluno; ?>" type="text" readonly>
                        <label id="lbl" for="first_name">Nome Aluno</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                        <label id="lbl" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="mensagem" id="mensagem" placeholder="Digite a sua Mensagem" class="materialize-textarea"></textarea>
                        <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                    </div>
                </div>
                <div class="input-field right">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">send</i>Enviar
                    </button>
                </div>
            </div>
        </form>
    </div>


    <script src="js/custom.js"></script>


    <?php require_once 'reqFooter.php' ?>