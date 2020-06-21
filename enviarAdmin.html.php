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
    require_once 'php/conexao.php';
    require_once 'reqMenuAdm.php';
    ?>

    <div class="container">
        <h4>Enviar mensagem para Admin</h4><br>
        <form action="php/enviarMensagem/enviarAdmin.php" method="POST">
            <div class="modal-content">
                <div class="row">
                    <div class="input-field col s12 m4 l12">
                        <select name="destinatario" id="destinatario">
                            <option value="" disabled selected>Selecione uma Admin</option>
                            <?php

                            $query_select_admin = $conn->prepare("SELECT * FROM `admin`");
                            $query_select_admin->execute();

                            while ($dados_admin = $query_select_admin->fetch(PDO::FETCH_ASSOC)) {
                                $id_admin = $dados_admin['ID_admin'];
                                $nome_admin = $dados_admin['nome'];

                            ?>
                                    <option value="<?php echo $id_admin ?>"><?php echo $nome_admin ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <label id="lbl_admin" for="first_name">Escolha a escola para que deseja enviar a mensagem</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate">
                        <label id="lbl_admin" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="mensagem" id="mensagem" placeholder="Digite a sua Mensagem" class="materialize-textarea"></textarea>
                        <label id="lbl_admin" for="textarea1">Digite a sua Mensagem</label>
                    </div>
                </div>
                <div class="input-field right">
                    <button btn="btnEnviar" value="formAdmin" id="btnFormAdmin" type="submit" class="btn-flat btnAdmin"><i class="material-icons">send</i> Enviar</button>
                </div>
            </div>
        </form>
    </div>

</body>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script src="js/customAdm.js"></script>
<script src="js/default.js"></script>

</html>