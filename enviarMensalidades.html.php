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

    $id_responsavel = $_GET["id_respon"];
    $_SESSION["id_respon"] = $id_responsavel;
    ?>

    <div class="container"><br>
        <h4>Enviar Mensalidades</h4><br><br><br><br><br><br>
        <form action="php/enviarMensalidades/enviarMensalidade.php" method="POST">
            <div class="row">
                <div class="file-field input-field col s8 m8 l8">
                    <div id="btnMensalidade" class="btn col s6 m4 l4">
                        <span><i class="material-icons">picture_as_pdf</i></span>
                        <input type="file" name="mensalidade" />
                    </div>
                    <div class="file-path-wrapper">
                        <input id="mensalidade" class="file-path validate" type="text" name="mensalidade">
                    </div>
                </div>
                <div class="input-field left">
                    <button btn="btnenviar" value="formMensalidade" id="btnFormMensalidade" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <?php require_once 'reqFooter.php' ?>