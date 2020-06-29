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


    $query_mensagem = $conn->prepare("SELECT *
    FROM secretario AS S 
    JOIN contato AS C ON S.id_secretario = C.fk_recebimento_secretario_id_secretario and  S.id_secretario = {$id_usuario} ORDER BY data_mensagem DESC");
    $query_mensagem->execute();
    $notificacao = 1;

    ?>

    <div class="container"><br>
        <h3 class="center">Caixa de Mensagens</h3>
        <br><br>
        <div id="mensagens">
            <table class="highlight centered col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Usuário</th>
                        <th>Assunto</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($mensagens = $query_mensagem->fetch(PDO::FETCH_ASSOC)) {

                        if ($mensagens["fk_id_tipo_usuario_envio"] == 2) {
                            $dados_diretor = $mensagens["fk_envio_diretor_id_diretor"];

                            $query_diretor = $conn->prepare("SELECT ID_diretor,nome_diretor FROM diretor WHERE ID_diretor = $dados_diretor");
                            $query_diretor->execute();

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

                            while ($diretor_dados = $query_diretor->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $diretor_dados["nome_diretor"];
                    ?>
                                <tr>
                                    <td>
                                        <?php if ($notifi["notificacao"] == 0) { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only">mark_email_unread</i>
                                        <?php } else { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only" style="color: grey;">mark_email_read</i>
                                        <?php } ?>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Diretor</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_diretor ?>&u=<?php echo 2 ?>&notificacao=<?php echo $notificacao ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 3) {
                            $dados_secretario = $mensagens["fk_envio_secretario_id_secretario"];

                            $query_secretario = $conn->prepare("SELECT ID_secretario,nome_secretario FROM secretario WHERE ID_secretario = $dados_secretario");
                            $query_secretario->execute();

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

                            while ($secretario_dados = $query_secretario->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $secretario_dados["nome_secretario"];

                            ?>
                                <tr>
                                    <td>
                                        <?php if ($notifi["notificacao"] == 0) { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only">mark_email_unread</i>
                                        <?php } else { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only" style="color: grey;">mark_email_read</i>
                                        <?php } ?>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Secretario</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_secretario ?>&u=<?php echo 3 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 4) {
                            $dados_professor = $mensagens["fk_envio_professor_id_professor"];

                            $query_professor = $conn->prepare("SELECT ID_professor,nome_professor FROM professor WHERE ID_professor = $dados_professor");
                            $query_professor->execute();

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

                            while ($professor_dados = $query_professor->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $professor_dados["nome_professor"];

                            ?>
                                <tr>
                                    <td>
                                        <?php if ($notifi["notificacao"] == 0) { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only">mark_email_unread</i>
                                        <?php } else { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only" style="color: grey;">mark_email_read</i>
                                        <?php } ?>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Professor</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_professor ?>&u=<?php echo 4 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 6) {

                            $dados_responsavel = $mensagens["fk_envio_responsavel_id_responsavel"];

                            $query_responsavel = $conn->prepare("SELECT ID_responsavel,nome_responsavel FROM responsavel WHERE ID_responsavel = $dados_responsavel");
                            $query_responsavel->execute();

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

                            while ($responsavel_dados = $query_responsavel->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $responsavel_dados["nome_responsavel"];

                            ?>
                                <tr>
                                    <td>
                                        <?php if ($notifi["notificacao"] == 0) { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only">mark_email_unread</i>
                                        <?php } else { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only" style="color: grey;">mark_email_read</i>
                                        <?php } ?>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Responsável</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_responsavel ?>&u=<?php echo 6 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                    <?php
                            }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalEnviarAluno" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma</h4>
            <div class="input-field col s12">
                <form action="listaAlunosMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE fk_id_escola_turma = $id_escola ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];

                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEnviarTurma" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <form action="php/enviarMensagem/enviarTurmas.php" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l12">
                        <select name="destinatario">
                            <option value="" disabled selected>Selecione Uma Turma</option>

                            <?php

                            $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE fk_id_escola_turma = $id_escola ORDER BY id_turma ASC");
                            $query_select_turma->execute();

                            while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                $id_turma = $dados_turma['id_turma'];
                                $nome_turma = $dados_turma['nome_turma'];
                                $nome_turno = $dados_turma['nome_turno'];

                            ?>
                                <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label id="lbl" for="first_name">Escolha a turma para que deseja enviar a mensagem</label>
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
                        <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem aqui" class="materialize-textarea"></textarea>
                        <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                    </div>
                </div>
                <div class="input-field right">
                    <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                </div>

            </form>
        </div>
    </div>

    <div id="modalEnviarProfessor" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/profSecreDiretor.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario">
                                <option value="" disabled selected>Selecione um Professor</option>

                                <?php

                                $query_select_professor = $conn->prepare("SELECT ID_professor,nome_professor FROM professor WHERE fk_id_escola_professor = $id_escola");
                                $query_select_professor->execute();

                                while ($dados_professor = $query_select_professor->fetch(PDO::FETCH_ASSOC)) {
                                    $id_professor = $dados_professor["ID_professor"];
                                    $nome_professor = $dados_professor["nome_professor"];
                                ?>
                                    <option value="<?php echo $id_professor ?>"><?php echo $nome_professor; ?></option>
                                <?php
                                } ?>
                            </select>
                            <label id="lbl" for="first_name">Escolha a turma para que deseja enviar a mensagem</label>
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
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem aqui" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="modalEnviarResponsavel" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma do aluno</h4>
            <div class="input-field col s12">
                <form action="listaResponMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE $id_escola");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalDiretor" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarSecretaria.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
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
    </div>

    <div id="modalEncaminharMensagem" class="modal">
        <div class="modal-content">
            <h4 class="center">Encaminhar Mensagem Para Todos</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/encaminharSecretaria.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="EncaminharMensagens" id="mensagemProf">
                                <option value="" disabled selected>Selecione Uma opção</option>
                                <?php

                                $query_select = $conn->prepare("SELECT ID_tipo_usuario,nome_usuario FROM tipo_usuario WHERE $id_escola ORDER BY `ID_tipo_usuario` DESC LIMIT 3");
                                $query_select->execute();

                                while ($dados = $query_select->fetch(PDO::FETCH_ASSOC)) {
                                    $id_usuario = $dados['ID_tipo_usuario'];
                                    $nome_usuario = $dados['nome_usuario'];

                                ?>
                                    <option value="<?php echo $id_usuario ?>"><?php echo $nome_usuario; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
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
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalEncaminharMensagem" class="modal-trigger btn-floating indigo lighten-2 tooltipped" data-position="left" data-tooltip="Encaminhar para Todos"><i class="material-icons">record_voice_over</i></a></li>
            <li><a href="#modalDiretor" class="modal-trigger btn-floating grey darken-1 tooltipped" data-position="left" data-tooltip="Diretor"><i class="material-icons">perm_identity</i></a></li>
            <li><a href="#modalEnviarResponsavel" class="modal-trigger btn-floating black tooltipped" data-position="left" data-tooltip="Responsável"><i class="material-icons">supervisor_account</i></a></li>
            <li><a href="#modalEnviarProfessor" class="modal-trigger btn-floating  yellow accent-2 tooltipped" data-position="left" data-tooltip="Professor"><i class="material-icons">portrait</i></a></li>
            <li><a href="#modalEnviarTurma" class="modal-trigger btn-floating blue tooltipped" data-position="left" data-tooltip="Turmas"><i class="material-icons">school</i></a></li>
            <li><a href="#modalEnviarAluno" class="modal-trigger btn-floating red lighten-2 tooltipped" data-position="left" data-tooltip="Aluno"><i class="material-icons">face</i></a></li>
        </ul>
    </div>


    <?php require_once 'reqFooter.php' ?>