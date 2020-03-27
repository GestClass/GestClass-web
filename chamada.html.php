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
    <link rel="stylesheet" type="text/css" href="css/chamada.css" />


</head>

<body>

    <?php require_once 'reqHeader.php' ?>


    <div class="container">
        <h4>Chamada</h4>
        <table class="highlight centered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ausente</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Nome(Aluno)</td>
                    <td>
                        <label>
                            <input type="checkbox" class="filled-in checkbox-blue-grey" />
                            <span></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Nome(Aluno)</td>
                    <td>
                        <label>
                            <input type="checkbox" class="filled-in checkbox-blue-grey" />
                            <span></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Nome(Aluno)</td>
                    <td>
                        <label>
                            <input type="checkbox" class="filled-in checkbox-blue-grey" />
                            <span></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Nome(Aluno)</td>
                    <td>
                        <label>
                            <input type="checkbox" class="filled-in checkbox-blue-grey" />
                            <span></span>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="input-field right">
            <button class = "btn waves-effect blue lighten-2"id="btnTableChamada" type="submit" class="btn-flat btnDefaultTableChamada">
                <i class="material-icons right">send</i>Enviar</button>
        </div>

    </div>

<?php require_once 'reqFooter.php' ?>
