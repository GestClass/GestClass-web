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

    $id_mensagem = $_GET["id"];
    $nome = $_GET["n"];

    $query = $conn->prepare("SELECT `ID_mensagem`, `mensagem`, `assunto`, `data_mensagem` FROM `contato` WHERE id_mensagem = $id_mensagem");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    ?>

    <div class="container"><br><br><br>
        <h4>Mensagem</h4><br>
        <form action="" method="POST">
            <div class="row">
                <div class="input-field col s12 m2 l2">
                    <i class="material-icons prefix blue-icon">date_range</i>
                    <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                    <label id="lbl" for="first_name">Data Mensagem</label>
                </div>
                <div class="input-field col s12 m2 l2">
                    <i class="material-icons prefix blue-icon">assignment_ind</i>
                    <input name="assunto" id="assunto" value="Professor" readonly type="text">
                    <label id="lbl" for="first_name">Usuário</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">perm_identity</i>
                    <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                    <label id="lbl" for="first_name">Rementente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                    <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                    <label id="lbl" for="first_name">Assunto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix blue-icon">mail_outline</i>
                    <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                    <label id="lbl" for="icon_prefix2">Mensagem</label>
                </div>
            </div>
        </form>
        <div class="input-field left">
            <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                <i class="material-icons left">arrow_back</i>Voltar
            </button>
        </div>
    </div>

    <script src="js/custom.js"></script>


    <?php require_once 'reqFooter.php' ?>