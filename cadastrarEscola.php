<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/cadastroEscola.css" />


</head>

<body>

    <?php require_once 'reqMenu.php' ?>

    <div class="container ">
        <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastroAdm.php">
            <h4>Cadastro escolas</h4><br>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="scroll">
                        <div class="container">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_balance</i>
                                    <input id="icon_titulo" type="text" name="nome_escola" id="nome_escola"
                                        class="validate">
                                    <label for="icon_titulo">Nome Escola</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">business</i>
                                    <input placeholder="00.000.000/0000-00" name="cnpj" id="cnpj" type="text"
                                        class="validate" data-mask="00.000.000/0000-00">
                                    <label for="first_name">CNPJ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">alternate_email</i>
                                    <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email"
                                        class="validate">
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">call</i>
                                    <input placeholder="(11) 95945-7809" name="telefone" id="telefone" type="text"
                                        class="validate" data-mask="(00) 00000-0000">
                                    <label for="first_name">Telefone</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">location_on</i>
                                    <input placeholder="Endereço" name="logradouro" id="logradouro" type="text"
                                        class="validate">
                                    <label for="first_name">Logradouro</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">location_on</i>
                                    <input placeholder="Bairro" name="bairro" id="bairro" type="text" class="validate">
                                    <label for="first_name">Bairro</label>
                                </div>
                                <div class="input-field col s2">
                                    <input placeholder="Número" name="numero" id="numero" type="text" class="validate">
                                    <label for="first_name">Nº</label>
                                </div>
                                <div class="input-field col s4">
                                    <select name="estado" id="estado" class="validate">
                                        <option value="" disabled selected>Selecione o Estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="EX">Estrangeiro</option>
                                    </select>
                                    <label for="first_name">Estado</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">attach_money</i>
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
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">wc</i>
                                    <label for="icon_telephone">Quantidade Alunos
                                        <input type="range" id="qtd" min="0" max="5000" /></label>
                                </div>
                                <div class="input-field col s12">
                                    <div class="col s4">
                                        <label for="first_name">Tipo de turma</label>
                                    </div>
                                    <div class="col s8">
                                        <label class="left"><input id="fk_id_tipos_turma_bercario" type="checkbox"
                                                class="filled-in checkbox-blue-grey" /><span>Berçario&nbsp;&nbsp;</span></label>
                                        <label class="left"><input id="fk_id_tipos_turma_pre_escola" type="checkbox"
                                                class="filled-in checkbox-blue-grey" /><span>Pré-Escola&nbsp;&nbsp;</span></label>
                                        <label class="left"><input id="fk_id_tipos_turma_fundamental_I" type="checkbox"
                                                class="filled-in checkbox-blue-grey" /><span>Fundamental
                                                I&nbsp;&nbsp;</span></label>
                                        <label class="left"><input id="fk_id_tipos_turma_fundamental_II" type="checkbox"
                                                class="filled-in checkbox-blue-grey" /><span>Fundamental
                                                II&nbsp;&nbsp;</span></label>
                                        <label class="left"><input id="fk_id_tipos_turma_medio" type="checkbox"
                                                class="filled-in checkbox-blue-grey" /><span>Ensino Médio</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-field right">
                            <button id="btnFormCadEscola" type="submit" class="btn-flat btnDefaultFormCadEscola">
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
    <script src="js/homeSecretaria.js"></script>
    <script src="js/cadastroEscola.js"></script>

    <script src="js/default.js"></script>