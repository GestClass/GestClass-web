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

    ?>

    <div class="container"><br><br><br>
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

                            while ($admin = $query_admin->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $admin["nome"];
                    ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td><?php echo $nome?></td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_admin ?>&u=<?php echo 1 ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 2) {
                            $dados_diretor = $mensagens["fk_envio_diretor_id_diretor"];

                            $query_diretor = $conn->prepare("SELECT ID_diretor,nome_diretor,fk_id_escola_diretor FROM diretor WHERE ID_diretor = $dados_diretor");
                            $query_diretor->execute();

                            while ($diretor_dados = $query_diretor->fetch(PDO::FETCH_ASSOC)) {
                                $id_escola = $diretor_dados["fk_id_escola_diretor"];

                                $query_id_escola = $conn->prepare("SELECT ID_escola,nome_escola FROM escola WHERE ID_escola = $id_escola");
                                $query_id_escola->execute();

                                while ($dados_escola  = $query_id_escola->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_escola = $dados_escola["nome_escola"];
                                }
                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Diretor</td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome_escola ?>&i=<?php echo $dados_diretor ?>&u=<?php echo 2 ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 3) {
                            $dados_secretario = $mensagens["fk_envio_secretario_id_secretario"];

                            $query_secretario = $conn->prepare("SELECT ID_secretario,nome_secretario,fk_id_escola_secretario FROM secretario WHERE ID_secretario = $dados_secretario");
                            $query_secretario->execute();

                            while ($secretario_dados = $query_secretario->fetch(PDO::FETCH_ASSOC)) {
                                $id_escola = $secretario_dados["fk_id_escola_secretario"];

                                $query_id_escola = $conn->prepare("SELECT ID_escola,nome_escola FROM escola WHERE ID_escola = $id_escola");
                                $query_id_escola->execute();

                                while ($dados_escola  = $query_id_escola->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_escola = $dados_escola["nome_escola"];
                                }
                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Secretario</td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome_escola ?>&i=<?php echo $dados_secretario ?>&u=<?php echo 3 ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 4) {
                            $dados_professor = $mensagens["fk_envio_professor_id_professor"];

                            $query_professor = $conn->prepare("SELECT ID_professor,nome_professor,fk_id_escola_professor FROM professor WHERE ID_professor = $dados_professor");
                            $query_professor->execute();

                            while ($professor_dados = $query_professor->fetch(PDO::FETCH_ASSOC)) {
                                $id_escola = $professor_dados["fk_id_escola_professor"];

                                $query_id_escola = $conn->prepare("SELECT ID_escola,nome_escola FROM escola WHERE ID_escola = $id_escola");
                                $query_id_escola->execute();

                                while ($dados_escola  = $query_id_escola->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_escola = $dados_escola["nome_escola"];
                                }
                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Professor</td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome_escola ?>&i=<?php echo $dados_professor ?>&u=<?php echo 4 ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 5) {
                            $dados_aluno = $mensagens["fk_envio_aluno_ra_aluno"];

                            $query_aluno = $conn->prepare("SELECT RA,nome_aluno,fk_id_escola_aluno FROM aluno WHERE RA = $dados_aluno");
                            $query_aluno->execute();

                            while ($aluno_dados = $query_aluno->fetch(PDO::FETCH_ASSOC)) {
                                $id_escola = $aluno_dados["fk_id_escola_aluno"];

                                $query_id_escola = $conn->prepare("SELECT ID_escola,nome_escola FROM escola WHERE ID_escola = $id_escola");
                                $query_id_escola->execute();

                                while ($dados_escola  = $query_id_escola->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_escola = $dados_escola["nome_escola"];
                                }
                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Aluno</td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome_escola ?>&i=<?php echo $dados_aluno ?>&u=<?php echo 5 ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
                                                <i class="small material-icons center">email</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } else {

                            $dados_responsavel = $mensagens["fk_envio_responsavel_id_responsavel"];

                            $query_responsavel = $conn->prepare("SELECT ID_responsavel,nome_responsavel,fk_id_escola_responsavel FROM responsavel WHERE ID_responsavel = $dados_responsavel");
                            $query_responsavel->execute();

                            while ($responsavel_dados = $query_responsavel->fetch(PDO::FETCH_ASSOC)) {
                                $id_escola = $responsavel_dados["fk_id_escola_responsavel"];

                                $query_id_escola = $conn->prepare("SELECT ID_escola,nome_escola FROM escola WHERE ID_escola = $id_escola");
                                $query_id_escola->execute();

                                while ($dados_escola  = $query_id_escola->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_escola = $dados_escola["nome_escola"];
                                }
                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Responsável</td>
                                    <td><?php echo $mensagens["assunto"]?></td>
                                    <td><a href="adminMensagens.html.php?id=<?php echo $mensagens["ID_mensagem"] ?>&n=<?php echo $nome_escola ?>&i=<?php echo $dados_responsavel ?>&u=<?php echo 6 ?>" class="modal-trigger">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Mensagem">
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

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large indigo darken-4">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="enviarAdminEscola.html.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Escola"><i class="material-icons">account_balance</i></a></li>
            <li><a href="encaminharTodasEscolas.html.php" class=" btn-floating indigo lighten-2 tooltipped" data-position="left" data-tooltip="Todas Escolas"><i class="material-icons">record_voice_over</i></a></li>
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