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
    <link rel="stylesheet" type="text/css" href="css/mensagensDProfessor.css" />


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
    FROM professor AS P 
    JOIN contato AS C ON P.id_professor = C.fk_recebimento_professor_id_professor and P.id_professor = {$id_usuario}  ORDER BY data_mensagem DESC");
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
                        <th>Usuario</th>
                        <th>Assunto</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($mensagens = $query_mensagem->fetch(PDO::FETCH_ASSOC)) {
                        if ($mensagens["fk_id_tipo_usuario_envio"] == 2) {

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
                                    <td>Diretor</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&uusuario=<?php echo 2 ?>&notificacao=<?php echo $notificacao ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
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
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 3 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 5) {

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
                                    <td>aluno</td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td>
                                        <a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 5 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i>
                                            </button>
                                        </a>
                                    </td>
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
            <h4 class="center">Selecione a turma</h4>
            <div class="input-field col s12">
                <form action="listaAlunosMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecionar Turma</option>
                        <?php
                        $query_select_turmas_professor = $conn->prepare("SELECT turmas_professor.fk_id_turma_professor_turmas_professor, turma.nome_turma, turno.nome_turno FROM turmas_professor INNER JOIN turma ON (fk_id_turma_professor_turmas_professor = ID_turma) INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE fk_id_professor_turmas_professor = $id_usuario GROUP BY turma.nome_turma");
                        $query_select_turmas_professor->execute();

                        while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                            $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];
                            $nome_turma = $dados_turmas_professor["nome_turma"];
                            $id_turno = $dados_turmas_professor['fk_id_turno_turma'];
                            $nome_turno = $dados_turmas_professor['nome_turno'];

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

    <div id="modalEnviarTurma" class="modal ">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarProfessorTurmas.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario" id="mensagemProf">
                                <option value="" disabled selected>Selecione uma Turma</option>
                                <?php

                                $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
                                $query_select_turmas_professor->execute();

                                $query_select_turmas_professor = $conn->prepare("SELECT turmas_professor.fk_id_turma_professor_turmas_professor, turma.nome_turma, turno.nome_turno FROM turmas_professor INNER JOIN turma ON (fk_id_turma_professor_turmas_professor = ID_turma) INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE fk_id_professor_turmas_professor = $id_usuario GROUP BY turma.nome_turma");
                                $query_select_turmas_professor->execute();

                                while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                                    $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];
                                    $nome_turma = $dados_turmas_professor["nome_turma"];
                                    $id_turno = $dados_turmas_professor['fk_id_turno_turma'];
                                    $nome_turno = $dados_turmas_professor['nome_turno'];

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
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalSecreDiretor" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarProfessor.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario" id="mensagemProf">
                                <option value="" disabled selected>Selecione uma Opção</option>
                                <option value="1">Secretaria</option>
                                <option value="2">Diretor</option>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate">
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

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalSecreDiretor" class="modal-trigger btn-floating  yellow accent-2 tooltipped" data-position="left" data-tooltip="Secretaria ou Diretor"><i class="material-icons">portrait</i></a></li>
            <li><a href="#modalEnviarTurma" class="modal-trigger btn-floating blue tooltipped" data-position="left" data-tooltip="Turmas"><i class="material-icons">school</i></a></li>
            <li><a href="#modalEnviarAluno" class="modal-trigger btn-floating red lighten-2 tooltipped" data-position="left" data-tooltip="Aluno"><i class="material-icons">face</i></a></li>
        </ul>
    </div>


    <?php require_once 'reqFooter.php' ?>