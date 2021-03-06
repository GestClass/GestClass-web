<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <!-- <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" /> -->


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

    $id_mensagem = $_GET["id"];
    $usuario_tipo = $_GET["usuario"];
    $notificacao = $_GET["notificacao"];

    $query_update_notifi = $conn->prepare("UPDATE contato SET notificacao = $notificacao WHERE contato.ID_mensagem = $id_mensagem");
    $query_update_notifi->execute();

    ?>

    <?php if ($id_tipo_usuario == 2) { ?>
        <?php if ($usuario_tipo == 1) {
            $nome = $_GET["nome"];
            $id_admin = $_GET["dados"];

            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 2) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_diretor FROM diretor WHERE ID_diretor = {$dados["fk_envio_diretor_id_diretor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_diretor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>

            </div>
        <?php
        } elseif ($usuario_tipo == 3) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_secretario FROM secretario WHERE ID_secretario = {$dados["fk_envio_secretario_id_secretario"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_secretario"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 4) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = {$dados["fk_envio_professor_id_professor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Professor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_professor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>

            </div>
        <?php
        } elseif ($usuario_tipo == 6) { ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } elseif ($id_tipo_usuario == 3) { ?>
        <?php if ($usuario_tipo == 1) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 2) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_diretor FROM diretor WHERE ID_diretor = {$dados["fk_envio_diretor_id_diretor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_diretor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 3) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_secretario FROM secretario WHERE ID_secretario = {$dados["fk_envio_secretario_id_secretario"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_secretario"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_secretario"] ?>" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 4) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = {$dados["fk_envio_professor_id_professor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Professor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_professor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 6) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_responsavel FROM responsavel WHERE ID_responsavel = {$dados["fk_envio_responsavel_id_responsavel"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_responsavel"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } elseif ($id_tipo_usuario == 4) { ?>
        <?php if ($usuario_tipo == 1) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 2) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_diretor FROM diretor WHERE ID_diretor = {$dados["fk_envio_diretor_id_diretor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_diretor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 3) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_secretario FROM secretario WHERE ID_secretario = {$dados["fk_envio_secretario_id_secretario"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_secretario"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 4) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = {$dados["fk_envio_professor_id_professor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Professor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_professor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 6) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } else {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_aluno FROM aluno WHERE ID_aluno = {$dados["fk_envio_aluno_ra_aluno"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_aluno"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } elseif ($id_tipo_usuario == 5) { ?>
        <?php if ($usuario_tipo == 1) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 2) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_diretor FROM diretor WHERE ID_diretor = {$dados["fk_envio_diretor_id_diretor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m5 l6">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_diretor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l21">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 3) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_secretario FROM secretario WHERE ID_secretario = {$dados["fk_envio_secretario_id_secretario"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m5 l6">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_secretario"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m l6">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 4) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_secretario FROM secretario WHERE ID_secretario = {$dados["fk_envio_secretario_id_secretario"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Professor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_professor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 6) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } elseif ($id_tipo_usuario == 6) { ?>
        <?php if ($usuario_tipo == 1) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data Mensagem</label>
                            </div>
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="GestClass" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m7 l7">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 2) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_diretor FROM diretor WHERE ID_diretor = {$dados["fk_envio_diretor_id_diretor"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Diretor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_diretor"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 3) {
            $query = $conn->prepare("SELECT * FROM contato WHERE id_mensagem = $id_mensagem");
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            $query_select_remetente = $conn->prepare("SELECT nome_secretario FROM secretario WHERE ID_secretario = {$dados["fk_envio_secretario_id_secretario"]} ");
            $query_select_remetente->execute();
            $dados_remetente = $query_select_remetente->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Secretario" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m5 l5">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <?php if ($dados_remetente) { ?>
                                    <input name="assunto" id="assunto" value="<?php echo $dados_remetente["nome_secretario"] ?>" readonly type="text">
                                <?php } else { ?>
                                    <input name="assunto" id="assunto" readonly type="text">
                                <?php } ?>
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input-field right">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 4) { ?>
            <div class="container"><br><br><br>
                <h4 class="center">Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m5 l3">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m5 l3">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Professor" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } elseif ($usuario_tipo == 6) { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Responsavel" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" data-target="modal1" type="submit" class="btn-flat btnLightBlue modal-trigger">
                        <i class="material-icons left">question_answer</i>Responder
                    </button>
                </div>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="container"><br><br><br>
                <h4>Mensagem</h4><br>
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">date_range</i>
                                <input name="assunto" id="assunto" value="<?php echo date('d/m/Y H:i:s', strtotime($dados["data_mensagem"])); ?>" readonly type="text">
                                <label id="lbl" for="first_name">Data</label>
                            </div>
                            <div class="input-field col s12 m2 l2">
                                <i class="material-icons prefix blue-icon">assignment_ind</i>
                                <input name="assunto" id="assunto" value="Aluno" readonly type="text">
                                <label id="lbl" for="first_name">Usuário</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">perm_identity</i>
                                <input name="assunto" id="assunto" value="<?php echo $nome ?>" readonly type="text">
                                <label id="lbl" for="first_name">Rementente</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">chat_bubble_outline</i>
                                <input name="assunto" id="assunto" value="<?php echo $dados["assunto"] ?>" readonly type="text">
                                <label id="lbl" for="first_name">Assunto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix blue-icon">mail_outline</i>
                                <textarea name="mensagem" id="icon_prefix2" readonly class="materialize-textarea"><?php echo $dados["mensagem"] ?></textarea>
                                <label id="lbl" for="icon_prefix2">Mensagem</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input-field left">
                    <button id="btncadastrar" value="formMensagens" id="btnFormContas" type="submit" class="btn-flat btnLightBlue center" onclick="history.go(-1)">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } else {
    ?>
    <?php
    }
    ?>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4 class="center">Responder Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarResposta.php" method="POST">
                    <div class="row">
                        <input name="destinatario" type="text" value="<?php echo $id_envio ?>" hidden>
                        <input name="usuario_tipo" type="text" value="<?php echo $usuario_tipo ?>" hidden>
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
                    <div class="input-field left">
                        <button id="formMensagem" type="submit" class="btn-flat btnLightBlue">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- <script src="js/custom.js"></script> -->


    <?php require_once 'reqFooter.php' ?>