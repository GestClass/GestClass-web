<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/mensagensResponsavel.css" />

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
    FROM responsavel AS R 
    JOIN contato AS C ON R.id_responsavel = C.fk_recebimento_responsavel_id_responsavel and R.id_responsavel = {$id_usuario}  ORDER BY data_mensagem DESC");
    $query_mensagem->execute();
    $notificacao = 1;





    ?>

    <div class="container"><br>
        <h3 class="center">Caixa de Mensagens</h3>
        <br><br>
        <div id="mensagens">
            <table class="centered col s12 m12 l12">
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
                                    <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_secretario ?>&u=<?php echo 3 ?>&notificacao=<?php echo $notificacao ?>">
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
                                    <td><a href="ocorrenciasVisualicao.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&notificacao=<?php echo $notificacao ?>">
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

    <div id="modalMensagem" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarResponsavel.php" method="post">

                    <div class="input-field col s12 m12 l12">
                        <select name="destinatario" id="mensagemRespon">
                            <option value="" disabled selected>Selecione uma Opção</option>
                            <option value="1">Secretaria</option>
                            <option value="2">Diretor</option>
                        </select>
                        <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                    </div>
                    <br>
                    <div class="input-field col s12 m12 l12">
                        <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                        <label id="lbl" for="first_name">Assunto</label>
                    </div>
                    <br>
                    <div class="input-field col s12">
                        <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem aqui" class="materialize-textarea"></textarea>
                        <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
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
            <li><a href="#modalMensagem" class="modal-trigger btn-floating yellow lighten-2 tooltipped" data-position="left" data-tooltip="Secretaria ou Diretor"><i class="material-icons">perm_identity</i></a></li>
        </ul>
    </div>


    <?php require_once 'reqFooter.php' ?>