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


    $query_mensagem = $conn->prepare("SELECT *
    FROM diretor AS D 
    JOIN contato AS c ON D.id_diretor = C.fk_recebimento_diretor_id_diretor and d.id_diretor = {$id_usuario}  ORDER BY data_mensagem DESC");
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

                        if ($mensagens["fk_id_tipo_usuario_envio"] == 1) {
                            $dados_admin = $mensagens["fk_envio_admin_id_admin"];

                            $query_admin = $conn->prepare("SELECT nome,ID_admin FROM `admin` WHERE ID_admin = $dados_admin");
                            $query_admin->execute();

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

                            while ($admin = $query_admin->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $admin["nome"];

                    ?>
                                <tr>
                                    <td>
                                        <?php if ($notifi["notificacao"] == 0) { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only">mark_email_unread</i>
                                        <?php } else { ?>
                                            <i class="small left material-icons blue-icon hide-on-small-only" style="color: grey;">mark_email_read</i>
                                        <?php } ?>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>GestClass</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&nome=<?php echo $nome ?>&dados=<?php echo $dados_admin ?>&usuario=<?php echo 1 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                                <!-- ARQUIVAR EM DESENVOLVIMENTO -->
                                    <!-- <td><a href="php/enviarMensagem/arquivarMensagens.php?id=<?php echo $mensagens["ID_mensagem"] ?>&u=<?php echo 6 ?>&arquivar=<?php echo $arquivar ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                        <i class="small material-icons center">move_to_inbox</i></button></a></td> -->
                                        <td><a href="php/enviarMensagem/arquivarMensagens.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_admin ?>&u=<?php echo 1 ?>&notificacao=<?php echo $arquivar ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                            <i class="small material-icons center">move_to_inbox</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 3) {

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);


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
                                <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 3 ?>&notificacao=<?php echo $notificacao ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                            <i class="small material-icons center">email</i></button></a></td>
                            </tr>
                        <?php
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 4) {

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

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
                                <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 4 ?>&notificacao=<?php echo $notificacao ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                            <i class="small material-icons center">email</i></button></a></td>
                            </tr>
                        <?php
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 6) {

                            $query_notificacao = $conn->prepare("SELECT id_mensagem,notificacao FROM contato where id_mensagem = {$mensagens["ID_mensagem"]}");
                            $query_notificacao->execute();
                            $notifi = $query_notificacao->fetch(PDO::FETCH_ASSOC);

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
                                <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 6 ?>&notificacao=<?php echo $notificacao ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                            <i class="small material-icons center">email</i></button></a></td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalEnviarAluno" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma do aluno</h4>
            <div class="input-field col s12">
                <form action="listaAlunosMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                            </option>
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
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarTurmas.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario">
                                <option value="" disabled selected>Selecione uma Turma</option>
                                <?php

                                $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                                $query_select_turma->execute();

                                while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                    $id_turma = $dados_turma['id_turma'];
                                    $nome_turma = $dados_turma['nome_turma'];
                                    $nome_turno = $dados_turma['nome_turno'];
                                ?>
                                    <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                                    </option>
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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
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

                                $query_select = $conn->prepare("SELECT ID_professor,nome_professor FROM professor WHERE fk_id_escola_professor = $id_escola");
                                $query_select->execute();

                                while ($dados = $query_select->fetch(PDO::FETCH_ASSOC)) {
                                    $id_professor = $dados["ID_professor"];
                                    $nome_professor = $dados["nome_professor"];

                                ?>
                                    <option value="<?php echo $id_professor ?>"><?php echo $nome_professor; ?></option>
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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
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

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (turma.fk_id_turno_turma = ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];
                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?>
                            </option>
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

    <div id="modalSecretaria" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarDiretor.php" method="POST">
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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEncaminharMensagem" class="modal">
        <div class="modal-content">
            <h4 class="center">Encaminhar Mensagem Para Todos</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/encaminharDiretor.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="EncaminharMensagens" id="mensagemDiretor">
                                <option value="" disabled selected>Selecione uma Opção</option>
                                <option value="5">Alunos</option>
                                <option value="4">Professores</option>
                                <option value="6">Responsáveis</option>
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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalGestClass" class="modal">
        <div class="modal-content">
            <h4 class="center">Mensagem Para GestClass</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarGestClass.php" method="POST">
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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalCorpoDocente" class="modal">
        <div class="modal-content">
            <h4 class="center">Mensagem Para Corpo Docente</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarCorpoDocente.php" method="POST">
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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="center-align">
        <hr class="arquivar">Arquivadas(0)</hr>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalGestClass" class="modal-trigger btn-floating indigo darken-4 tooltipped" data-position="left" data-tooltip="GestClass"><i class="Small material-icons">architecture</i></a></li>
            <li><a href="#modalCorpoDocente" class="modal-trigger btn-floating amber lighten-3 tooltipped" data-position="left" data-tooltip="Corpo Docente"><i class="Small material-icons" style="color: black;">account_balance</i></a></li>
            <li><a href="#modalEncaminharMensagem" class="modal-trigger btn-floating indigo lighten-2 tooltipped" data-position="left" data-tooltip="Encaminhar para Todos"><i class="material-icons">record_voice_over</i></a></li>
            <li><a href="#modalSecretaria" class="modal-trigger btn-floating grey darken-1 tooltipped" data-position="left" data-tooltip="Secretaria"><i class="material-icons">perm_identity</i></a></li>
            <li><a href="#modalEnviarResponsavel" class="modal-trigger btn-floating black tooltipped" data-position="left" data-tooltip="Responsável"><i class="material-icons">supervisor_account</i></a></li>
            <li><a href="#modalEnviarProfessor" class="modal-trigger btn-floating  yellow accent-2 tooltipped" data-position="left" data-tooltip="Professor"><i class="material-icons" style="color: grey;">portrait</i></a></li>
            <li><a href="#modalEnviarTurma" class="modal-trigger btn-floating blue tooltipped" data-position="left" data-tooltip="Turmas"><i class="material-icons">school</i></a></li>
            <li><a href="#modalEnviarAluno" class="modal-trigger btn-floating red lighten-2 tooltipped" data-position="left" data-tooltip="Aluno"><i class="material-icons">face</i></a></li>
        </ul>
    </div>


    <?php require_once 'reqFooter.php' ?>