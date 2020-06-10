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


    $query_mensagem = $conn->prepare("SELECT nome_secretario,fk_recebimento_secretario_id_secretario,data,assunto,mensagem
    FROM secretario AS S 
    JOIN contato AS C ON S.id_secretario = C.fk_recebimento_secretario_id_secretario and S.id_secretario = {$id_usuario}");
    $query_mensagem->execute();




    ?>

    <div class="container"><br><br><br>
        <div id="mensagens">
            <table class="highlight centered col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($mensagens = $query_mensagem->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                <?php echo $mensagens["data"] ?></td>
                            <td><?php echo $mensagens["assunto"] ?></td>
                            <td><?php echo $mensagens["mensagem"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalMensagem" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarSecretaria.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario" id="mensagemSecretaria">
                                <option value="" disabled selected></option>
                                <optgroup label="Aluno">
                                    <option value="1">Uma Turma</option>
                                    <option value="2">Aluno</option>
                                <optgroup label="Responsável">
                                    <option value="3">Responsável</option>
                                <optgroup label="Professor">
                                    <option value="4">Professor</option>
                                <optgroup label="Diretor">
                                    <option value="5">Diretor</option>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="nome" type="text" id="autocomplete-input" placeholder="Digite o nome " class="autocomplete validate">
                                    <label id="lbl" for="autocomplete-input">Nome</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
        </div>
    </div>

    <div id="modalEncaminharMensagem" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Encaminhar Mensagem Para Todos</h4><br>
            <div id="novaMensagem">
                <form action="php/encaminharSecretaria.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="EncaminharMensagens" id="mensagemProf">
                                <option value="" disabled selected></option>
                                <?php

                                $query_select_id_usuario = $conn->prepare("SELECT ID_tipo_usuario FROM tipo_usuario WHERE $id_escola ORDER BY `ID_tipo_usuario` DESC LIMIT 5");
                                $query_select_id_usuario->execute();

                                while ($dados_id_usuario = $query_select_id_usuario->fetch(PDO::FETCH_ASSOC)) {
                                    $id_usuario = $dados_id_usuario['ID_tipo_usuario'];

                                    $query_select_nome_usuario = $conn->prepare("SELECT nome_usuario FROM tipo_usuario WHERE ID_tipo_usuario = $id_usuario");
                                    $query_select_nome_usuario->execute();

                                    while ($dados_nome_usuario = $query_select_nome_usuario->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_usuario = $dados_nome_usuario['nome_usuario'];

                                ?>
                                        <option value="<?php echo $id_usuario ?>"><?php echo $nome_usuario; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite a mensagem aqui" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>

                </form>
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
            <li><a href="#modalArquivados" class="modal-trigger btn-floating green accent-2 tooltipped" data-position="left" data-tooltip="Mensagens Arquivadas"><i class="material-icons">archive</i></a></li>
            <li><a href="#modalEncaminharMensagem" class="modal-trigger btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Encaminhar para Todos"><i class="material-icons">email</i></a></li>
            <li><a href="#modalMensagem" class="modal-trigger btn-floating yellow lighten-2 tooltipped" data-position="left" data-tooltip="Nova Mensagem"><i class="material-icons">email</i></a></li>
        </ul>
    </div>

    <script src="js/mensagensSecretaria.js"></script>


    <?php require_once 'reqFooter.php' ?>