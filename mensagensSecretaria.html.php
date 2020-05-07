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
    <link rel="stylesheet" type="text/css" href="css/mensagensSecretaria.css" />


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
                        <td><i class="small left material-icons  blue-icon">email</i> 06/05/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>
                    </tr>
                    <tr>
                        <td><i class="small left material-icons  blue-icon">drafts</i> 22/04/2020</td>
                        <td>Vagas de estagios</td>
                        <td>Banco do Brasil</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalMensagem" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                </form>
                <div class="input-field right">
                <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
        </div>
    </div>

    <div id="modalArquivados" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Mensagens Arquivadas</h4>
            <div id="arquivadas">
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
                            <td><i class="small left material-icons  blue-icon">drafts</i> 23/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>
                        </tr>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 22/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>

                        </tr>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 15/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>

                        </tr>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 10/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalArquivados" class="modal-trigger btn-floating green tooltipped" data-position="left" data-tooltip="Mensagens Arquivadas"><i class="material-icons">archive</i></a></li>
            <li><a href="#modalMensagem" class="modal-trigger btn-floating yellow tooltipped" data-position="left" data-tooltip="Nova Mensagem"><i class="material-icons">email</i></a></li>
        </ul>
    </div>

    <script src="js/mensagensSecretaria.js"></script>


    <?php require_once 'reqFooter.php' ?>