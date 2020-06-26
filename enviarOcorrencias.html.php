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

    $id_responsavel = $_GET["id"];

    ?>

    <div class="container">
        <h4>Escreva a Ocorrência</h4><br>
        <form action="php/enviarOcorrencias/enviarOcorrencia.php" method="POST">
            <div class="modal-content">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input type="text" name="id_respon" value="<?php echo $id_responsavel?>" hidden>
                        <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                        <label id="lbl" for="first_name">Assunto</label>
                    </div>
                </>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="ocorrencia" id="ocorrencia" placeholder="Digite a sua Ocorrência" class="materialize-textarea"></textarea>
                        <label id="lbl" for="textarea1">Digite a sua Ocorrência</label>
                    </div>
                </div>
                <div class="input-field right">
                    <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                </div>
            </div>
        </form>
    </div>


    <script src="js/custom.js"></script>


    <?php require_once 'reqFooter.php' ?>