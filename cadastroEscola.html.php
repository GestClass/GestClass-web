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
    <link rel="stylesheet" type="text/css" href="css/homeAdmGest.css" />
    <link rel="stylesheet" type="text/css" href="css/cadastroEscola.css" />


</head>

<body>

    <?php require_once 'reqMenuAdm.php' ?>

    <section class="floating-buttons">
        <div class="fixed-action-btn floating-right">
            <a class="btn-floating btn blue accent-4 modal-trigger" href="cadastrarEscola.html.php">
                <i class="large material-icons">create</i>
            </a>
        </div>
    </section>

    <h4 class="center-align">Escolas Cadastradas</h4><br>

    <?php
    include_once 'php/conexao.php';

    $query = $conn->prepare("SELECT id_escola,nome_escola,cnpj,email,situacao FROM escola");
    $query->execute();

    ?>

    <section class="escolas">
        <?php while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {
            $id_escola = $dados["id_escola"];
        ?>
            <div class="col s12">
                <div class="container">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="assets/img/atheneu.jpeg" alt="" class="circle">
                            <span class="title"><?php echo $dados["nome_escola"] ?></span>
                            <p><?php echo $dados["email"] ?> <br>
                                <?php echo $dados["cnpj"] ?><br>
                                <?php
                                if ($dados['situacao']) {
                                    echo "Situação: Ativada </br>";
                                } else {
                                    echo "Situação: Desativada <br/>";
                                }
                                ?>
                                <?php
                                if ($dados['situacao']) {
                                ?>
                                    <form action="php/confirmdesativarEscola.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id_escola  ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed left" style="float: left;">
                                            <i class="material-icons left">delete</i>Desativar Escola
                                        </button>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <form action="php/AtivarEscola.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id_escola; ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightGreen left" style="float: left;">
                                            <i class="material-icons left">check</i>Ativar Escola
                                        </button>
                                    <?php
                                }
                                    ?>
                            </p>
                            <?php


                            $query_diretor = $conn->prepare("SELECT fk_id_escola_diretor FROM diretor WHERE fk_id_escola_diretor = $id_escola");
                            $query_diretor->execute();
                            $dados_diretor = $query_diretor->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <?php if ($query_diretor->rowCount() > 0) {
                                if ($dados_diretor["fk_id_escola_diretor"] == $id_escola) { ?>
                                    <div class="row">
                                        <div class="col s12">
                                            <a href="dadosEscola.html.php?id_escola=<?php echo $dados['id_escola']; ?>" class="secondary-content" title="Dados da Escola"><i class="material-icons blue-icon">visibility</i></a>
                                        </div>
                                        <div class="col s12">
                                            <a style="right:50px" class="secondary-content" title="Diretor cadastrado"><i class="material-icons green-icon">done</i></a>
                                        </div>
                                        <div class="col s12">
                                            <a href="php/deletarEscola.php?id_escola=<?php echo $dados['id_escola']; ?>" style="right:80px" class="secondary-content" title="Excluir escola"><i class="material-icons red-icon">delete</i></a>
                                        </div>

                                    </div>
                                <?php }
                            } else { ?>
                                <div class="row">
                                    <div class="col s12">
                                        <a href="dadosEscola.html.php?id_escola=<?php echo $dados['id_escola']; ?>" class="secondary-content" title="Dados da Escola"><i class="material-icons blue-icon">visibility</i></a>
                                    </div>
                                    <div class="col s12">
                                        <a style="right:50px" class="secondary-content" title="Diretor não cadastrado"><i class="material-icons red-icon">done</i></a>
                                    </div>
                                    <div class="col s12">
                                        <a href="php/deletarEscola.php?id_escola=<?php echo $dados['id_escola']; ?>" style="right:80px" class="secondary-content" title="Excluir escola"><i class="material-icons red-icon">delete</i></a>
                                    </div>
                                    <?php
                                    if ($situacao) {
                                    ?>
                                        <form action="php/confirmdesativarEscola.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $id_escola  ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">delete</i>Desativar Escola
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="php/AtivarEscola.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $id_escola; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightGreen center" style="float: center;">
                                                <i class="material-icons left">check</i>Ativar Escola
                                            </button>
                                        <?php
                                    }
                                        ?>
                                </div>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <!-- <div class="center-align">
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div> -->

    </section>


    <section class="floating-buttons">
        <!-- <div class="fixed-action-btn">
            <a class="btn-floating btn-large indigo darken-4">
                <i class="large material-icons">add</i>
            </a>
            <ul>
         
                <li><a href="paginaManutencao.html" class="btn-floating yellow darken-1 tooltipped" data-position="left"
                        data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
                <li><a href="feedbackEscolas.html.php" class="btn-floating blue-grey darken-4 tooltipped"
                        data-position="left" data-tooltip="Feedback Escolas"><i class="material-icons">chat</i></a></li>
                <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left"
                        data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
            </ul>
        </div> -->
    </section>



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/customAdm.js"></script>
    <script src="js/default.js"></script>

</body>

</html>