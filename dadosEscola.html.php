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
    <link rel="stylesheet" type="text/css" href="css/cadastroEscola.css" />


</head>

<body>

    <?php

    require_once 'reqMenuAdm.php';
    include_once 'php/conexao.php';

    $id_escola = $_GET["id_escola"];
    $_SESSION['id_escola'] = $id_escola;

    $query = $conn->prepare("SELECT * FROM escola WHERE id_escola = $id_escola");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $query_diretor = $conn->prepare("SELECT * FROM diretor WHERE fk_id_escola_diretor = $id_escola");
    $query_diretor->execute();



    ?>

    <div class="container ">
        <h4 class="center-align">Atualizar dados da Escola</h4><br>
        <div class="col s12 m12 l12 center-align">
            <ul id="tabs-swipe-demo" class="tabs indigo darken-4">
                <li class="tab col s1 m3 l3 "><a href="#dadosEscola">Escola</a></li>
                <li class="tab col s1 m3 l3 "><a href="#dadosDiretor">Diretores</a></li>
            </ul>
        </div>

        <div id="dadosEscola">
            <form id="adicionarEscola" class="col s12" method="POST" action="php/dadosEscola.php">
                <div class="row">
                    <div class="col s12 m12 l12"><br>
                        <h5 class="center">Formulario de atualização de dados</h5><br>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">account_balance</i>
                                <input id="icon_titulo" type="text" name="nome_escola" id="nome_escola" class="validate" value="<?php echo $dados["nome_escola"] ?>">
                                <label id="lbl_admin" for="icon_titulo">Nome Escola</label>
                            </div>
                            <div class="input-field col s12 m6 l6 ">
                                <i class="material-icons prefix blue-icon">business</i>
                                <input placeholder="00.000.000/0000-00" name="cnpj" id="cnpj" type="text" class="validate" data-mask="00.000.000/0000-00" value="<?php echo $dados["CNPJ"] ?>">
                                <label id="lbl_admin" for="first_name">CNPJ</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6 ">
                                <i class="material-icons prefix blue-icon">alternate_email</i>
                                <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email" class="validate" value="<?php echo $dados["email"] ?>">
                                <input type="hidden" name="cadastrarDiretor" value="Bem vindo ao GestClass" />
                                <label id="lbl_admin" for="email">Email</label>
                                <span class="helper-text" data-error="wrong" data-success="right"></span>
                            </div>
                            <div class="input-field col s12 m6 l6 ">
                                <i class="material-icons prefix blue-icon">call</i>
                                <input placeholder="(11) 95945-7809" name="telefone" id="telefone" type="text" class="validate" data-mask="(00) 00000-0000" value="<?php echo $dados["telefone"] ?>">
                                <label id="lbl_admin" for="first_name">Telefone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix blue-icon">location_on</i>
                                <input data-mask="00000-000" placeholder="08574-310" name="cep" id="cep" type="text" class="validate" value="<?php echo $dados["cep"] ?>">
                                <label id="lbl_admin" for="first_name">CEP</label>
                            </div>
                            <div class="input-field col s6 m2 l2">
                                <input placeholder="Número" name="numero" id="numero" type="text" class="validate" value="<?php echo $dados["numero"] ?>">
                                <label id="lbl_admin" for="first_name">Nº</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <input placeholder="Complemento" name="complemento" id="complemento" type="text" class="validate" value="<?php echo $dados["complemento"] ?>">
                                <label id="lbl_admin" for="first_name">Complemento</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">attach_money</i>
                                <select name="data_pagamento" id="data_pagamento">
                                    <option value="" disabled selected><?php echo $dados["data_pagamento_escola"] ?>
                                    </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="5">5</option>
                                    <option value="8">8</option>
                                    <option value="15">15</option>
                                    <option value="25">25</option>
                                </select>
                                <label id="lbl_admin" for="first_name">Data de Pagamento</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <input name="Media Mínima" step="0.00" type="number" class="validate" value="<?php echo $dados["media_min"] ?>">
                                <label id="lbl_admin" for="first_name">Média Mínima</label>
                            </div>
                            <div class="input-field col s4">
                                <input name="complemento" step="0.00" type="number" class="validate" value="<?php echo $dados["media_max"] ?>">
                                <label id="lbl_admin" for="first_name">Média Máxima</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button id="btnFormCadEscola" type="submit" class="btn-flat btnLightDark">
                            <i class="material-icons left">send</i>Alterar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col s12 m12 l12" id="dadosDiretor"><br>
            <h5 class="center">Diretores Escola</h5><br>
            <?php while ($dados_diretor = $query_diretor->fetch(PDO::FETCH_ASSOC)) { ?>
                <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="assets/imagensBanco/<?php echo  $dados_diretor["foto"]; ?>" alt="" class="circle">
                        <span class="title"><?php echo $dados_diretor["nome_diretor"] ?></span><br>
                        <span class="title"><?php echo $dados_diretor["email"] ?></span><br>
                        <span class="title"><?php echo $dados_diretor["cpf"] ?></span>
                        <a href="#" class="secondary-content"><i class="material-icons green-icon">done</i></a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="js/default.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>