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

    <div class="container ">
        <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastrarEscola.php">
            <h4>Cadastro escolas</h4><br>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="scroll">
                        <div class="container">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix blue-icon">account_balance</i>
                                    <input id="icon_titulo" type="text" name="nome_escola" id="nome_escola"
                                        class="validate">
                                    <label for="icon_titulo">Nome Escola</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix blue-icon">business</i>
                                    <input placeholder="00.000.000/0000-00" name="cnpj" id="cnpj" type="text"
                                        class="validate" data-mask="00.000.000/0000-00">
                                    <label for="first_name">CNPJ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix blue-icon">alternate_email</i>
                                    <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email"
                                        class="validate">
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix blue-icon">call</i>
                                    <input placeholder="(11) 95945-7809" name="telefone" id="telefone" type="text"
                                        class="validate" data-mask="(00) 00000-0000">
                                    <label for="first_name">Telefone</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix blue-icon">location_on</i>
                                    <input data-mask="00000-000" placeholder="08574-310" name="cep" id="cep" type="text"
                                        class="validate">
                                    <label for="first_name">CEP</label>
                                </div>
                                <div class="input-field col s2">
                                    <input placeholder="Número" name="numero" id="numero" type="text" class="validate">
                                    <!-- <label for="first_name">Nº</label> -->
                                </div>
                                <div class="input-field col s4">
                                    <input placeholder="Complemento" name="complemento" id="complemento" type="text"
                                        class="validate">
                                    <!-- <label for="first_name">Complemento</label> -->
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix blue-icon">wc</i>
                                <label for="icon_telephone">Quantidade Alunos
                                    <input type="range" id="qtd" min="0" max="5000" name="quantidade_alunos" /></label>
                            </div>
                            <div class="input-field col s6">
                                <div class="col s4">
                                    <label for="first_name">Tipo de turma</label>
                                </div>
                                <div class="col s8">
                                    <label class="left"><input id="fk_id_tipos_turma_bercario" type="checkbox"
                                            class="filled-in checkbox-blue-grey" name="chk1"
                                            value="1" /><span>Berçario</span></label>
                                    <label class="left"><input id="fk_id_tipos_turma_pre_escola" type="checkbox"
                                            class="filled-in checkbox-blue-grey" name="chk2"
                                            value="1" /><span>Pré-Escola</span></label>
                                    <label class="left"><input id="fk_id_tipos_turma_fundamental_I" type="checkbox"
                                            class="filled-in checkbox-blue-grey" name="chk3"
                                            value="1" /><span>Fundamental
                                            I</span></label>
                                    <label class="left"><input id="fk_id_tipos_turma_fundamental_II" type="checkbox"
                                            class="filled-in checkbox-blue-grey" name="chk4"
                                            value="1" /><span>Fundamental
                                            II</span></label>
                                    <label class="left"><input id="fk_id_tipos_turma_medio" type="checkbox"
                                            class="filled-in checkbox-blue-grey" name="chk5" value="1" /><span>Ensino
                                            Médio</span></label>
                                </div>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-icon">attach_money</i>
                                <select name="data_pagamento" id="data_pagamento">
                                    <option value="" disabled selected>Escolha uma data de vencimento</option>
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
                            <i class="material-icons left">send</i>Enviar</button>
                    </div>
                    <!-- <button class="btn btn-flat waves-effect btnDarkFill left" type="submit" name="cadEscola"
                            id="cadEscola" value="cadEscola">Consultar
                            <i class="material-icons right">pageview</i>
                        </button>
                        <button class="btn btn-flat waves-effect btnLightBlue right" type="submit" name="cascolato"
                            id="cadEscola" value="cadEscola">Cadastrar
                            <i class="material-icons right">send</i>
                        </button> -->
                </div>
            </div>
    </div>
    </div>
    </form>
    <!-- <form method="POST" action="./controller/cadastroEscola.controller.php">
            <h4>Cadastro escolas</h4><br>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="scroll">
                        <div class="container">
                            <div id="nome_escola" class="input-field col s12 m8 l6">
                                <input id="icon_prefix" type="text" class="validate inputDark">
                                <label for="icon_prefix">Nome</label>
                            </div>
                            <div id="cep" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div id="numero" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Numero</label>
                            </div>
                            <div id="complemento" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Complemento</label>
                            </div>
                            <div id="cnpj" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">CNPJ</label>
                            </div>
                            <div id="telefone" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div id="email" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div id="data_pagamento" class="input-field col s12 m8 l6">
                                <input type="text" class="datepicker">
                                <label>Data Pagamento</label>
                            </div>
                            <div id="quantidade_alunos" class="input-field col s12 m8 l6">
                                <label for="icon_telephone">Quantidade Alunos
                                    <input type="range" id="qtd" min="0" max="5000" /></label>
                            </div>
                            <div id="tipos_de_turmas" class="input-field col s12 m8 l6">
                                <label>Tipos de contas <br><br>
                                    <label><input id="fk_id_tipos_turma_bercario" type="checkbox"
                                            class="filled-in checkbox-blue-grey" /><span>Berçario</span><br></label>
                                    <label><input id="fk_id_tipos_turma_pre_escola" type="checkbox"
                                            class="filled-in checkbox-blue-grey" /><span>Pré-Escola</span><br></label>
                                    <label><input id="fk_id_tipos_turma_fundamental_I" type="checkbox"
                                            class="filled-in checkbox-blue-grey" /><span>Fundamental
                                            I</span><br></label>
                                    <label><input id="fk_id_tipos_turma_fundamental_II" type="checkbox"
                                            class="filled-in checkbox-blue-grey" /><span>Fundamental
                                            II</span><br></label>
                                    <label><input id="fk_id_tipos_turma_medio" type="checkbox"
                                            class="filled-in checkbox-blue-grey" /><span>Ensino Médio</span></label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-field right">
                <button id="btnFormCadEscola" type="submit" class="btn-flat btnDefaultFormCadEscola">
                    <i class="material-icons left">send</i>Enviar</button>
            </div>
        </form> -->
    </div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="js/default.js"></script>

    <script>
        $('.datepicker').datepicker({
            i18n: {
                months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
                weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                today: 'Hoje',
                clear: 'Limpar',
                cancel: 'Sair',
                done: 'Confirmar',
                labelMonthNext: 'Próximo mês',
                labelMonthPrev: 'Mês anterior',
                labelMonthSelect: 'Selecione um mês',
                labelYearSelect: 'Selecione um ano',
                selectMonths: true,
                selectYears: 15,
            },
            format: 'dd mmmm, yyyy',
            container: 'body',
            minDate: new Date(),
        });
    </script>
</body>

</html>