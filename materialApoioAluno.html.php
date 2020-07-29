<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
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

    $id_material = $_GET["id"];
    $nome = $_GET["n"];
    $usuario_tipo = $_GET["u"];
    $id_envio = $_GET["i"];

    $query = $conn->prepare("SELECT * FROM envio_material_apoio WHERE ID_envio_material = $id_material");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    ?>
    <?php if ($usuario_tipo == 2) { ?>
        <div class="container"><br>
            <h4 class="center">Material de Apoio</h4><br>
            <div class="row">
                <div class="input-field col s12 m5 l5">
                    <i class="material-icons prefix blue-icon">date_range</i>
                    <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_envio"])); ?>" readonly type="text">
                    <label id="lbl" for="first_name">Data Envio</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">assignment_ind</i>
                    <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                    <label id="lbl" for="first_name">Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m5 l5">
                    <i class="material-icons prefix blue-icon">perm_identity</i>
                    <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                    <label id="lbl" for="first_name">Rementente</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                    <input name="assunto" id="assunto" value="<?php echo $dados["assunto_material"] ?>" readonly type="text">
                    <label id="lbl" for="first_name">Assunto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11 m11 l11">
                    <i class="material-icons prefix blue-icon">picture_as_pdf</i>
                    <input name="assunto" id="assunto" value="<?php echo $dados["material"] ?>" readonly type="text">
                    <label id="lbl" for="icon_prefix2">Material de Apoio</label>
                </div>
                <a download="assets/MaterialApoio/<?php echo $dados["material"] ?>" href="assets/MaterialApoio/<?php echo $dados["material"] ?>"><i class="material-icons small blue-icon tooltipped" data-tooltip="Fazer Download" style="margin-top: 20px; margin-left: -25px;">get_app</i></a>
            </div>
            <div class="input-field left">
                <button id="btncadastrar" onclick="history.go(-1)" type="submit" class="btn-flat btnLightBlue">
                    <i class="material-icons left">keyboard_backspace</i>Voltar
                </button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 4) {
        $disciplina = $_GET["d"];

        $query_disciplina = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $disciplina");
        $query_disciplina->execute();
        $dados_disciplina = $query_disciplina->fetch(PDO::FETCH_ASSOC);
        $nome_disciplina = $dados_disciplina["nome_disciplina"];
    ?>
        <div class="container"><br>
            <h4 class="center">Material de Apoio</h4><br>
            <div class="row">
                <div class="input-field col s12 m5 l5">
                    <i class="material-icons prefix blue-icon">date_range</i>
                    <input value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_envio"])); ?>" readonly type="text">
                    <label id="lbl" for="first_name">Data envio</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">assignment_ind</i>
                    <input value="Professor" readonly type="text">
                    <label id="lbl" for="first_name">Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m5 l5">
                    <i class="material-icons prefix blue-icon">perm_identity</i>
                    <input value="<?php echo $nome ?>" readonly type="text">
                    <label id="lbl" for="first_name">Rementente</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">import_contacts</i>
                    <input value="<?php echo $nome_disciplina ?>" readonly type="text">
                    <label id="lbl" for="first_name">Disciplina</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m5 l5">
                    <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                    <input name="assunto" id="assunto" value="<?php echo $dados["assunto_material"] ?>" readonly type="text">
                    <label id="lbl" for="first_name">Assunto</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">picture_as_pdf</i>
                    <input name="assunto" id="assunto" value="<?php echo $dados["material"] ?>" readonly type="text">
                    <label id="lbl" for="icon_prefix2">Material de Apoio</label>
                </div>
                <a download="assets/MaterialApoio/<?php echo $dados["material"] ?>" href="assets/MaterialApoio/<?php echo $dados["material"] ?>"><i class="material-icons small blue-icon tooltipped" data-tooltip="Fazer Download" style="margin-top: 20px; margin-left: -25px;">get_app</i></a>
            </div>
            <div class="input-field left">
                <button id="btncadastrar" onclick="history.go(-1)" type="submit" class="btn-flat btnLightBlue">
                    <i class="material-icons left">keyboard_backspace</i>Voltar
                </button>
            </div>
        </div>
    <?php
    } ?>
    <?php require_once 'reqFooter.php' ?>