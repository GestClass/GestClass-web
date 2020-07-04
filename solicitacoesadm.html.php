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
    <link rel="stylesheet" type="text/css" href="css/admins.css" />

</head>

<body>
    <?php
    require_once 'reqMenuAdm.php';

    $query_mensagem = $conn->prepare("SELECT *
    FROM `admin` AS R 
    JOIN contato AS C ON R.ID_admin = C.fk_recebimento_admin_id_admin and R.ID_admin = {$id_usuario}  ORDER BY data_mensagem DESC");
    $query_mensagem->execute();
    $notificacao = 1;

    ?>

    <div class="container">
    <h3 class="center">Caixa de Mensagens</h3>
        <br>
        <div id="mensagens">
            <table class="highlight centered col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo Usuário</th>
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
                                    <td><?php echo $nome?></td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_admin ?>&u=<?php echo 1 ?>&notificacao=<?php echo $notificacao ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } ?>
                    <?php
                            
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large indigo darken-4">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="enviarAdminEscola.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Escola"><i class="material-icons">account_balance</i></a></li>
            <li><a href="encaminharTodasEscolas.html.php" class=" btn-floating black tooltipped" data-position="left" data-tooltip="Todas Escolas"><i class="material-icons">record_voice_over</i></a></li>
            <li><a href="enviarAdmin.html.php" class="btn-floating red darken-1 tooltipped" data-position="left" data-tooltip="Admin"><i class="material-icons">perm_identity</i></a></li>
        </ul>
    </div>
</body>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script src="js/customAdm.js"></script>
<script src="js/default.js"></script>

</html>