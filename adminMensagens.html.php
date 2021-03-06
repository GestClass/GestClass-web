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

    $id_mensagem = $_GET["id"];
    $usuario_tipo = $_GET["usuario"];
    $notificacao = $_GET["notificacao"];

    $query_update_notifi = $conn->prepare("UPDATE contato SET notificacao = $notificacao WHERE contato.ID_mensagem = $id_mensagem");
    $query_update_notifi->execute();

    ?>


    <?php if ($usuario_tipo == 1) {
        $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem AND fk_id_tipo_usuario_envio = 1");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
    ?>
        <div class="container"><br><br>
            <h4 class="center">Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">assignment_ind</i>
                        <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Rementente</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                        <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">mail_outline</i>
                        <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                        <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                    </div>
                </div>
            </form>
            <div class="input-field right">
                <button btn="btnResposta" data-target="modal1" type="submit" class="btn-flat btnAdmin modal-trigger"><i class="material-icons">question_answer</i> Responder</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 2) { 
        $nome_escola = $_GET["escola"];
        $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem AND fk_id_tipo_usuario_envio = 2");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container"><br><br>
            <h4 class="center">Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">assignment_ind</i>
                        <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">account_balance</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome_escola ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                            <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                            <label id="lbl_admin" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix blue-icon">mail_outline</i>
                            <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                            <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                        </div>
                    </div>
            </form>
            <div class="input-field right">
                <button btn="btnResposta" data-target="modal1" type="submit" class="btn-flat btnAdmin modal-trigger"><i class="material-icons">question_answer</i> Responder</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 3) { 
        $nome_escola = $_GET["escola"];
        $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem AND fk_id_tipo_usuario_envio = 3");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container"><br><br>
            <h4 class="center">Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">assignment_ind</i>
                        <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">account_balance</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome_escola ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                        <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">mail_outline</i>
                        <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                        <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                    </div>
                </div>
            </form>
            <div class="input-field left">
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.back()" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 4) { 
        $nome_escola = $_GET["escola"];
        $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container"><br><br>
            <h4 class="center">Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">assignment_ind</i>
                        <input name="assunto" id="assunto" value="Professor" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">account_balance</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome_escola ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                        <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">mail_outline</i>
                        <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                        <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                    </div>
                </div>
            </form>
            <div class="input-field left">
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.back()" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
        <?php
    } elseif ($usuario_tipo == 7) {
        $query_solicitante = $conn->prepare("SELECT nome, email FROM contato WHERE ID_mensagem = $id_mensagem AND fk_id_tipo_usuario_envio = 7");
        $query_solicitante->execute();

        while ($dados_solicitante = $query_solicitante->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="container"><br><br>
                <h4 class="center">Mensagem</h4><br><br>
                <form action="" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">date_range</i>
                            <input name="data" id="data" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                            <label id="lbl_admin" for="first_name">Data Mensagem</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">assignment_ind</i>
                            <input name="usuario" id="usuario" value="Solicitante" readonly type="text">
                            <label id="lbl_admin" for="first_name">Usuário</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">account_balance</i>
                            <input name="nome" id="nome" value="<?php echo $dados_solicitante["nome"] ?>" readonly type="text">
                            <label id="lbl_admin" for="first_name">Escola ou Diretor</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">account_balance</i>
                            <input name="email" id="email" value="<?php echo $dados_solicitante["email"] ?>" readonly type="text">
                            <label id="lbl_admin" for="first_name">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                            <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                            <label id="lbl_admin" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix blue-icon">mail_outline</i>
                            <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                            <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.back()" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
                </div>
            </div>
        <?php
        }
    } elseif ($usuario_tipo == 6) { 
        $nome_escola = $_GET["escola"];
        $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container"><br><br>
            <h4 class="center">Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">assignment_ind</i>
                        <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">account_balance</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome_escola?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                        <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">mail_outline</i>
                        <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                        <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                    </div>
                </div>
            </form>
            <div class="input-field left">
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.back()" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } else { 
        $nome_escola = $_GET["escola"];
        $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container"><br><br>
            <h4 class="center">Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">assignment_ind</i>
                        <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">account_balance</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome_escola ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                        <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Assunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix blue-icon">mail_outline</i>
                        <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                        <label id="lbl_admin" for="icon_prefix2">Mensagem</label>
                    </div>
                </div>
            </form>
            <div class="input-field left">
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.back()" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    }
    ?>


    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4 class="center">Responder Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/respostaAdmin.php" method="POST">
                    <div class="row">
                        <input name="destinatario" type="text" value="<?php echo $id_envio ?>" hidden>
                        <input name="usuario_tipo" type="text" value="<?php echo $usuario_tipo ?>" hidden>
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl_admin" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                            <label id="lbl_admin" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnAdmin"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script src="js/customAdm.js"></script>
<script src="js/default.js"></script>

</html>