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
    $nome = $_GET["n"];
    $usuario_tipo = $_GET["u"];
    $id_envio = $_GET["i"];

    $query = $conn->prepare("SELECT `ID_mensagem`, `mensagem`, `assunto`, `data_mensagem` FROM `contato` WHERE id_mensagem = $id_mensagem");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    ?>


    <?php if ($usuario_tipo == 1) { ?>
        <div class="container"><br><br>
            <h4>Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Rementente</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
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
                <button btn="btnResposta" data-target="modal1" type="submit" class="btn-flat btnAdmin modal-trigger"><i class="material-icons">chat</i> Responder</button>
            </div>
            <div class="input-field left">
                <button btn="btnResposta" value="formMensagens" id="btnFormContas" type="submit" onclick="history.go(-1)" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 2) { ?>
        <div class="container"><br><br>
            <h4>Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
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
                <button btn="btnResposta" data-target="modal1" type="submit" class="btn-flat btnAdmin modal-trigger"><i class="material-icons">chat</i> Responder</button>
            </div>
            <div class="input-field left">
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.go(-1)" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 3) { ?>
        <div class="container"><br><br>
            <h4>Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
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
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.go(-1)" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 4) { ?>
        <div class="container"><br><br>
            <h4>Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="Professor" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
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
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.go(-1)" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } elseif ($usuario_tipo == 6) { ?>
        <div class="container"><br><br>
            <h4>Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
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
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.go(-1)" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    } else { ?>
        <div class="container"><br><br>
            <h4>Mensagem</h4><br><br>
            <form action="" method="POST">
                <div class="row">
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">date_range</i>
                        <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Data Mensagem</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                        <label id="lbl_admin" for="first_name">Usuário</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">perm_identity</i>
                        <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                        <label id="lbl_admin" for="first_name">Escola</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
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
                <button btn="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" onclick="history.go(-1)" class="btn-flat btnAdmin"><i class="material-icons">arrow_back</i> Voltar</button>
            </div>
        </div>
    <?php
    }
    ?>


    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Responder Mensagem</h4><br>
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