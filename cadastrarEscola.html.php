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

    <?php require_once 'reqMenuAdm.php' ?>

    <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastrarEscola.php">
        <div class="col s12 m12 l12">
            <div class="container">
                <h4 class="center">Formulario de atualização de dados</h4><br><br><br>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">account_balance</i>
                        <input id="icon_titulo" type="text" name="nome_escola" id="nome_escola" class="validate">
                        <label for="icon_titulo">Nome Escola</label>
                    </div>
                    <div class="input-field col s12 m6 l6 ">
                        <i class="material-icons prefix blue-icon">business</i>
                        <input placeholder="00.000.000/0000-00" name="cnpj" id="cnpj" type="text" class="validate" data-mask="00.000.000/0000-00">
                        <label for="first_name">CNPJ</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6 ">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email" class="validate">
                        <!-- <input type="hidden" name="cadastrarDiretor" value="Bem vindo ao GestClass" /> -->
                        <label for="email">Email</label>
                        <span class="helper-text" data-error="Ex: gestclass@enterprise.com" data-success="right"></span>
                    </div>
                    <div class="input-field col s12 m6 l6 ">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input placeholder="(11) 95945-7809" name="telefone" id="telefone" type="text" class="validate" data-mask="(00) 00000-0000">
                        <label for="first_name">Telefone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4 l3">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input id="cep" name="cep" placeholder="08574-150" type="text" data-mask="00000-000" class="validate" onblur="pesquisacep(this.value);">
                        <label for="first_name">CEP</label>
                    </div>
                    <div id="a" class="input-field col s10 m4 l2">
                        <input id="cidade" placeholder="Cidade" type="text" class="validate">
                        <label for="first_name">Cidade</label>
                    </div>
                    <div id="a" class="input-field col s10 m4 l2">
                        <input id="bairro" placeholder="Bairro" type="text" class="validate">
                        <label for="first_name">Bairro</label>
                    </div>
                    <div id="a" class="input-field col s10 m4 l2">
                        <input id="rua" placeholder="Rua" type="text" class="validate">
                        <label for="first_name">Rua</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l1">
                        <input id="numero" name="numero" placeholder="12" type="tel" class="validate ">
                        <label for="first_name">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m6 l2">
                        <input id="complemento" name="complemento" placeholder="ap" type="tel" class="validate ">
                        <label for="first_name">Complemento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 ">
                        <div class="col s4 m4 l3 ">
                            <label for="first_name">Tipo de turma</label>
                        </div>
                        <div class="col s8 m8 l12 ">
                            <div class="row">
                                <div class="col l4">

                                    <label class="left">
                                        <input id="fk_id_tipos_turma_bercario" type="checkbox" class="filled-in checkbox-blue-grey" name="chk1" value="1" />
                                        <span>Berçario&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </label>

                                    <label class="left">
                                        <input id="fk_id_tipos_turma_pre_escola" type="checkbox" class="filled-in checkbox-blue-grey" name="chk2" value="1" />
                                        <span>Pré-Escola</span>
                                    </label>

                                </div>
                                <div class="col  l4">

                                    <label class="left">
                                        <input id="fk_id_tipos_turma_fundamental_I" type="checkbox" class="filled-in checkbox-blue-grey" name="chk3" value="1" />
                                        <span>Fundamental I&nbsp;&nbsp;&nbsp;</span>
                                    </label>


                                    <label class="left">
                                        <input id="fk_id_tipos_turma_fundamental_II" type="checkbox" class="filled-in checkbox-blue-grey" name="chk4" value="1" />
                                        <span>Fundamental II</span>
                                    </label>

                                </div>
                                <div class="col l4">

                                    <label class="left">
                                        <input id="fk_id_tipos_turma_medio" type="checkbox" class="filled-in checkbox-blue-grey" name="chk5" value="1" />
                                        <span>Ensino Médio</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">attach_money</i>
                        <select name="data_pagamento" id="data_pagamento">
                            <option value="" disabled selected>Escolha a data do pagamento
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
                    <div class="input-field col s6 m2 l2">
                        <i class="material-icons prefix blue-icon">style</i>
                        <input id="media" name="media" placeholder="6.00" step="0.00" type="number" class="validate ">
                        <label for="first_name">Média Escolar</label>
                    </div>
                    <div class="input-field col s6 m2 l2">
                        <input id="nota_maxima" name="nota_maxima" placeholder="10.00" step="0.00" type="number" class="validate ">
                        <label for="first_name">Nota Máxima</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="input-field right">
                <button id="btnFormCadEscola" type="submit" class="btn-flat btnLightDark">
                    <i class="material-icons left">send</i>Cadastrar
                </button>
            </div>
        </div>
    </form>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="js/cep.js"></script>
    <script src="js/default.js"></script>
</body>

</html>