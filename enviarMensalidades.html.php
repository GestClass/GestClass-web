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
    <link rel="stylesheet" type="text/css" href="css/mensagensDiretor.css" />


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
    $id_responsavel = $_GET["id_respon"];

    $query = $conn->prepare("SELECT nome_responsavel FROM responsavel WHERE ID_responsavel = $id_responsavel AND fk_id_escola_responsavel = $id_escola");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $nome_respon = $dados["nome_responsavel"];
    ?>

    <div class="container"><br>
        <h3 class="center">Enviar Mensalidades</h3><br><br>
        <form action="php/enviarMensalidades/enviarMensalidade.php" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <input name="ra" value="<?php echo $ra_aluno; ?>" type="text" readonly>
                    <label id="lbl" for="first_name">RA Aluno</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <input name="nome" value="<?php echo $nome_aluno; ?>" type="text" readonly>
                    <label id="lbl" for="first_name">Nome Aluno</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <input type="text" name="id_respon" value="<?php echo $id_responsavel; ?>" hidden>
                    <input name="nome" value="<?php echo $nome_respon; ?>" type="text" readonly>
                    <label id="lbl" for="first_name">Nome Responsável</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12 m12 l12">
                    <div id="btnMensalidade" class="btn col s6 m4 l4">
                        <span>Escolha o arquivo &nbsp;&nbsp;&nbsp;<i class="material-icons">picture_as_pdf</i></span>
                        <input type="file" name="boleto" />
                    </div>
                    <div class="file-path-wrapper">
                        <input id="boleto" class="file-path validate" type="text" name="boleto">
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
    <?php require_once 'reqFooter.php' ?>