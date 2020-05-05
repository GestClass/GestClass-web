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
    <link rel="stylesheet" type="text/css" href="css/mensagens.css" />


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
    <div class="container"><br><br><br>
        <div id="mensagens">
            <table class="highlight centered">
                <thead>
                    <tr>

                        <th>Data</th>
                        <th>Assunto</th>
                        <th>Remetente</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><i class="small left material-icons  blue-icon">mail_outline</i> 22/04/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>
                    </tr>
                    <tr>
                        <td><i class="small left material-icons  blue-icon">mail_outline</i> 22/04/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>
                    </tr>
                    <tr>
                        <td><i class="small left material-icons  blue-icon">mail_outline</i> 22/04/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>
                    </tr>
                    <tr>
                        <td><i class="small left material-icons  blue-icon">mail_outline</i> 22/04/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>
                    </tr>
                    <tr>
                        <td><i class="small left material-icons  blue-icon">mail_outline</i> 22/04/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large light-blue lighten-1">
                <i class="large material-icons">add</i>
            </a>
            <ul>
                <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Lixeira"><i class="material-icons">delete</i></a></li>
                <li><a href="cadastroTurmas.html.php" class="btn-floating green tooltipped" data-position="left" data-tooltip="Mensagens Arquivadas"><i class="material-icons">cloud_off</i></a></li>
                <li><a href="cadastroTurmas.html.php" class="btn-floating yellow tooltipped" data-position="left" data-tooltip="Nova Mensagem"><i class="material-icons">email</i></a></li>
            </ul>
        </div>
    


    <?php require_once 'reqFooter.php' ?>