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
    <link rel="stylesheet" type="text/css" href="css/mensagensAluno.css" />


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
    FROM aluno AS A 
    JOIN contato AS C ON A.RA = C.fk_recebimento_aluno_RA_aluno and A.RA = '{$id_usuario}'  ORDER BY data_mensagem DESC");
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
                                <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 2 ?>&notificacao=<?php echo $notificacao ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem" style="margin-top: 5px;">
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
                                <td><a href="mensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&usuario=<?php echo 3 ?>&notificacao=<?php echo $notificacao ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem" style="margin-top: 5px;">
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
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Mensagem" style="margin-top: 5px;">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                    <?php
                            }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php require_once 'reqFooter.php' ?>