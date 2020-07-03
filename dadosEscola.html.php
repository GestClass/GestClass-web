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

    $query = $conn->prepare("select * from escola where id_escola=$id_escola");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $query_diretor = $conn->prepare("select * from diretor where fk_id_escola_diretor=$id_escola");
    $query_diretor->execute();



    ?>

    <div class="container ">
        <h4 class="center-align">Atualizar dados da Escola</h4><br>
        <div class="container">
            <div class="col s12 m12 l12 center-align">
                <ul id="tabs-swipe-demo" class="tabs indigo darken-4">
                    <li class="tab col s1 m3 l3 "><a href="#dadosEscola">Escola</a></li>
                    <li class="tab col s1 m3 l3 "><a href="#dadosDiretor">Diretores</a></li>
                </ul>
            </div>
        </div>
        <div id="dadosEscola">
            <form id="adicionarEscola" class="col s12" method="POST" action="php/dadosEscola.php">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="container">
                            <h5>Formulario de atualização de dados</h5><br>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix blue-icon">account_balance</i>
                                    <input id="icon_titulo" type="text" name="nome_escola" id="nome_escola" class="validate" value="<?php echo $dados["nome_escola"] ?>">
                                    <label for="icon_titulo">Nome Escola</label>
                                </div>
                                <div class="input-field col s12 m6 l6 ">
                                    <i class="material-icons prefix blue-icon">business</i>
                                    <input placeholder="00.000.000/0000-00" name="cnpj" id="cnpj" type="text" class="validate" data-mask="00.000.000/0000-00" value="<?php echo $dados["CNPJ"] ?>">
                                    <label for="first_name">CNPJ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6 ">
                                    <i class="material-icons prefix blue-icon">alternate_email</i>
                                    <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email" class="validate" value="<?php echo $dados["email"] ?>">
                                    <input type="hidden" name="cadastrarDiretor" value="Bem vindo ao GestClass" />
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                                <div class="input-field col s12 m6 l6 ">
                                    <i class="material-icons prefix blue-icon">call</i>
                                    <input placeholder="(11) 95945-7809" name="telefone" id="telefone" type="text" class="validate" data-mask="(00) 00000-0000" value="<?php echo $dados["telefone"] ?>">
                                    <label for="first_name">Telefone</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix blue-icon">location_on</i>
                                    <input data-mask="00000-000" placeholder="08574-310" name="cep" id="cep" type="text" class="validate" value="<?php echo $dados["cep"] ?>">
                                    <label for="first_name">CEP</label>
                                </div>
                                <div class="input-field col s2">
                                    <input placeholder="Número" name="numero" id="numero" type="text" class="validate" value="<?php echo $dados["numero"] ?>">
                                    <label for="first_name">Nº</label>
                                </div>
                                <div class="input-field col s4">
                                    <input placeholder="Complemento" name="complemento" id="complemento" type="text" class="validate" value="<?php echo $dados["complemento"] ?>">
                                    <label for="first_name">Complemento</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12 ">
                                    <div class="col s4 m4 l3 ">
                                        <label for="first_name">Tipo de turma</label>
                                        <br><br>
                                    </div>
                                    <div class="col s8 m8 l12 ">
                                        <div class="row">
                                            <div class="col l3">
                                                <!-- TURMA BERÇARIO CONDIÇÃO -->
                                                <?php if ($dados['turma_bercario'] == 1) { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_bercario" type="checkbox" class="filled-in checkbox-blue-grey" name="chk1" value="1" checked />
                                                        <span>Berçario</span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_bercario" type="checkbox" class="filled-in checkbox-blue-grey" name="chk1" value="1" />
                                                        <span>Berçario</span>
                                                    </label>
                                                <?php } ?>
                                                <!-- FIM CONDIÇÃO -->
                                            </div>
                                            <div class="col l3">
                                                <!-- TURMA PRÉ ESCOLA CONDIÇÃO -->
                                                <?php if ($dados['turma_pre_escola'] == 1) { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_pre_escola" type="checkbox" class="filled-in checkbox-blue-grey" name="chk2" value="1" checked />
                                                        <span>Pré-Escola</span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_pre_escola" type="checkbox" class="filled-in checkbox-blue-grey" name="chk2" value="1" />
                                                        <span>Pré-Escola</span>
                                                    </label>
                                                <?php } ?>
                                                <!-- FIM CONDIÇÃO -->
                                            </div>
                                            <div class="col  l3">
                                                <!-- TURMA FUNDAMENTAL I CONDIÇÃO -->
                                                <?php if ($dados['turma_fundamental_I'] == 1) { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_fundamental_I" type="checkbox" class="filled-in checkbox-blue-grey" name="chk3" value="1" checked />
                                                        <span>Fundamental I</span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_fundamental_I" type="checkbox" class="filled-in checkbox-blue-grey" name="chk3" value="1" />
                                                        <span>Fundamental I</span>
                                                    </label>
                                                <?php } ?>
                                                <!-- FIM CONDIÇÃO -->
                                            
                                                <!-- TURMA FUNDAMENTAL II CONDIÇÃO -->
                                                <?php if ($dados['turma_fundamental_II'] == 1) { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_fundamental_II" type="checkbox" class="filled-in checkbox-blue-grey" name="chk4" value="1" checked />
                                                        <span>Fundamental II</span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_fundamental_II" type="checkbox" class="filled-in checkbox-blue-grey" name="chk4" value="1" />
                                                        <span>Fundamental II</span>
                                                    </label>
                                                <?php } ?>
                                                <!-- FIM CONDIÇÃO -->
                                            </div>
                                            <div class="col l3">
                                                <!-- TURMA ENSINO MEDIO CONDIÇÃO -->
                                                <?php if ($dados['turma_medio'] == 1) { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_medio" type="checkbox" class="filled-in checkbox-blue-grey" name="chk5" value="1" checked />
                                                        <span>Ensino Médio</span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="left">
                                                        <input id="fk_id_tipos_turma_medio" type="checkbox" class="filled-in checkbox-blue-grey" name="chk5" value="1" />
                                                        <span>Ensino Médio</span>
                                                    </label>
                                                <?php } ?>
                                                <!-- FIM CONDIÇÃO -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12">
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
                                <label for="first_name">Data de pagamento</label>
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

        <div class="col s12 m12 l12" id="dadosDiretor">
            <div class="container">
                <h5>Diretores Escola</h5><br>
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
    </div>



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="js/default.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>