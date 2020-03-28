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
    <link rel="stylesheet" type="text/css" href="css/cadastroContas.css" />


</head>

<body>

    <?php require_once 'reqHeader.php' ?>


    <div class="container col s12 m12 l12 ">
        <form method="POST" action="./controller/cadastro.controller.php">
            <h4>Selecione o tipo de conta</h4>
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
                        <li class="tab col s1 m3 l3 "><a href="#aluno">Aluno</a></li>
                        <li class="tab col s1 m3 l3 "><a href="#responsavel">Responsável</a></li>
                        <li class="tab col s1 m3 l3 "><a href="#professor">Professor</a></li>
                        <li class="tab col s1 m3 l3 "><a href="#secretaria">Secretaria</a></li>
                    </ul>
                </div>


                <div id="aluno" class="col s12 m12 l12">
                    <h4>Aluno</h4>
                    <div class="file-field input-field col s12 m6 l6">
                        <div id="btnfoto" class="btn col s6">
                            <span><i class="material-icons">add_a_photo</i></span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input id="foto" class="validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="nome_aluno" type="text" placeholder="Nome Aluno" class="validate ">
                        <label id="lbl" for="first_name">Nome Aluno</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="RA" placeholder="8956478-9" type="text" class="validate" data-mask="0000000-0">
                        <label id="lbl" for="first_name">RA</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                        <label id="lbl">Data Nascimento</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="RG" placeholder="65.745.984-6" type="tel" data-mask="00.000.000-0" class="validate ">
                        <label id="lbl" for="first_name">RG</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="CPF" placeholder="614.755.014-16" type="tel" data-mask="000.000.000-00"
                            class="validate ">
                        <label id="lbl" for="first_name">CPF</label>
                    </div>
                    <div class="input-field col s8 m4 l4">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input id="cep" placeholder="08574-150" type="tel" data-mask="00000-000" class="validate ">
                        <label id="lbl" for="first_name">CEP</label>
                    </div>
                    <div class="input-field col s4 m2 l2">
                        <input id="numero" placeholder="Número" type="tel" class="validate ">
                        <label id="lbl" for="first_name">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m6 l6">
                        <input id="complemento" placeholder="Complemento" type="tel" class="validate ">
                        <label id="lbl" for="first_name">Complemento</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input id="email" placeholder="gestclass@enterprise.com" type="tel" class="validate ">
                        <label id="lbl" for="first_name">Email</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">security</i>
                        <input id="senha" placeholder="********" type="password" class="validate ">
                        <label id="lbl" for="first_name">Senha</label>
                    </div>
                    <div id="a" class="input-field col s10 m4 l4">
                        <input id="confsenha" placeholder="********" type="password" class="validate ">
                        <label id="lbl" for="first_name">Confirmar senha</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000"
                            class="validate ">
                        <label id="lbl" for="first_name">Celular</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input id="telefone" placeholder="(11) 4002-8922" type="tel" data-mask="(00) 0000-0000"
                            class="validate">
                        <label id="lbl" for="first_name">Telefone</label>
                    </div>
                    <div id="selcetEnsino" class="input-field col s12 m6 l6 validate">
                        <i class="material-icons prefix blue-icon">school</i>
                        <select id="nome_tipo_turma">
                            <option value="" disabled selected>Selecione o Ensino</option>
                            <option value="1">Berçario</option>
                            <option value="2">Pré Escola</option>
                            <option value="3">Fundamental I</option>
                            <option value="4">Fundamental II</option>
                            <option value="5">Ensino Médio</option>
                        </select>
                        <label id="lbl">Ensino</label>
                    </div>
                    <div id="a" class="input-field col s10 m6 l6 validate">
                        <select id="nome_turma">
                            <option value="" disabled selected>Selecione a Turma</option>
                            <option value="1">Berçario A</option>
                            <option value="2">Pré 1 A</option>
                            <option value="3">Pré 2 B</option>
                            <option value="4">1º ano A</option>
                            <option value="4">2º ano A</option>
                            <option value="4">3º ano A</option>
                            <option value="4">4º ano A</option>
                            <option value="4">5º ano A</option>
                            <option value="4">6º ano A</option>
                            <option value="4">7º ano A</option>
                            <option value="4">8º ano A</option>
                            <option value="4">9º ano A</option>
                            <option value="5">1º ano médio A</option>
                            <option value="5">2º ano médio A</option>
                            <option value="5">3º ano médio A</option>
                        </select>
                        <label id="lbl">Turma</label>
                    </div>
                    <div class="input-field right">
                        <button name="btncadastrar" value="formAluno" id="btnFormContas" type="submit"
                            class="btn-flat btnLightBlue"><i class="material-icons">send</i> Cadastrar</button>
                    </div>
                </div>

                <div id="responsavel" class="col s12 m12 l12">
                    <h4>Responsável</h4>
                    <div class="file-field input-field col s12 m6 l6">
                        <div id="btnfoto" class="btn col s6">
                            <span><i class="material-icons">add_a_photo</i></span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input id="foto" class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="nome_responsavel" type="tel" placeholder="Nome Responsável" class="validate">
                        <label id="lbl" for="icon_telephone">Nome</label>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="fk_ra_aluno_responsavel" placeholder="8956478-9" type="text" class="validate"
                            data-mask="0000000-0">
                        <label id="lbl" for="icon_prefix">RA Aluno</label>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                        <label id="lbl">Data Nascimento</label>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="rg" type="tel" placeholder="84.514.751-1" data-mask="00.000.000-0" class="validate">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="cpf" type="tel" placeholder="154.258.963-22" data-mask="000.000.000-00"
                            class="validate">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input id="email" type="tel" placeholder="gestclass@enterprise.com" class="validate">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                    <div class="input-field col s12 m3 l3">
                        <i class="material-icons prefix blue-icon">security</i>
                        <input id="senha" type="password" placeholder="******" class="validate">
                        <label id="lbl" for="icon_telephone">Senha</label>
                    </div>
                    <div id="a" class="input-field col s10 m3 l3">
                        <input id="confsenha" type="password" placeholder="******" class="validate">
                        <label id="lbl" for="icon_telephone">Confirma Senha</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <i class="material-icons prefix blue-icon">fiber_pin</i>
                        <input id="pin" type="password" placeholder="******" data-mask="000000" class="validate">
                        <label id="lbl" for="icon_telephone">Pin</label>
                    </div>
                    <div class="input-field col s12 l4">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="celular" type="tel" placeholder="(11) 97765-3360" data-mask="(00) 00000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 l4">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="telefone" type="tel" placeholder="(11) 4651-3030" data-mask="(00) 0000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="telefone_comercial" type="tel" placeholder="(11) 7765-3360"
                            data-mask="(00) 0000-0000" class="validate">
                        <label id="lbl" for="icon_telephone">Telefone Comercial</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">monetization_on</i>
                        <select name="data_pagamento" id="data_pagamento">
                            <option value="" disabled selected>Escolha uma data de pagamento</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="8">8</option>
                            <option value="15">15</option>
                            <option value="25">25</option>
                        </select>
                        <label id="lbl" for="first_name">Data de pagamento</label>
                    </div>
                    <div class="input-field right">
                        <button name="btncadastrar" value="formResposavel" id="btnFormContas" type="submit"
                            class="btn-flat btnLightBlue">
                            <i class="material-icons">send</i> Cadastrar</button>
                    </div>
                </div>

                <div id="professor" class="col s12 m12 l12">
                    <h4>Professor</h4>
                    <div class="file-field input-field col s12 m6 l6">
                        <div id="btnfoto" class="btn col s6">
                            <span><i class="material-icons">add_a_photo</i></span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input id="foto" class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="nome_professor" type="text" placeholder="Nome Professor" class="validate">
                        <label id="lbl" for="icon_prefix">Nome</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                        <label id="lbl">Data Nascimento</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="rg" placeholder="68.124.586-8" type="tel" data-mask="00.000.000-0" class="validate">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="cpf" placeholder="158.688.987-10" type="tel" data-mask="000.000.000-00"
                            class="validate">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                    <div class="input-field col s8 m4 l4">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input id="cep" placeholder="08574-150" type="tel" data-mask="00000-000" class="validate">
                        <label id="lbl" for="icon_telephone">CEP</label>
                    </div>
                    <div class="input-field col s4 m2 l2">
                        <input id="numero" placeholder="Número" type="tel" class="validate">
                        <label id="lbl" for="icon_telephone">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m6 l6">
                        <input id="complemento" placeholder="Complemento" type="tel" class="validate">
                        <label id="lbl" for="icon_telephone">Complemento</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input id="email" placeholder="gestclass@entreprise.com" type="tel" class="validate">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">security</i>
                        <input id="senha" placeholder="*******" type="password" class="validate">
                        <label id="lbl" for="icon_telephone">Senha</label>
                    </div>
                    <div id="a" class="input-field col s10 m4 l4">
                        <input id="confsenha" placeholder="*******" type="password" class="validate">
                        <label id="lbl" for="icon_telephone">Confirmar senha</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input id="telefone" placeholder="(11) 9765-3360" type="tel" data-mask="(00) 0000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">school</i>
                        <select id="nome_tipo_turma" multiple>
                            <option value="" disabled selected>Selecione o Ensino</option>
                            <option value="1">Berçario</option>
                            <option value="2">Pré Escola</option>
                            <option value="3">Fundamental I</option>
                            <option value="4">Fundamental II</option>
                            <option value="5">Ensino Médio</option>
                        </select>
                        <label id="lbl">Tipos Turmas</label>
                    </div>
                    <div id="a" class="input-field col s10 m6 l6">
                        <select id="nome_turma" multiple>
                            <option value="" disabled selected>Selecione a Turma</option>
                            <option value="1">Berçario A</option>
                            <option value="2">Pré 1 A</option>
                            <option value="3">Pré 2 B</option>
                            <option value="4">1º ano A</option>
                            <option value="4">2º ano A</option>
                            <option value="4">3º ano A</option>
                            <option value="4">4º ano A</option>
                            <option value="4">5º ano A</option>
                            <option value="4">6º ano A</option>
                            <option value="4">7º ano A</option>
                            <option value="4">8º ano A</option>
                            <option value="4">9º ano A</option>
                            <option value="5">1º ano médio A</option>
                            <option value="5">2º ano médio A</option>
                            <option value="5">3º ano médio A</option>
                        </select>
                        <label id="lbl">Turmas</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">school</i>
                        <select id="nome_disciplina" multiple>
                            <option value="" disabled selected>Selecione a Disciplina</option>
                            <option value="1">Português</option>
                            <option value="2">Matemática</option>
                            <option value="3">Inglês</option>
                            <option value="4">Ciências</option>
                            <option value="5">Geografia</option>
                            <option value="6">História</option>
                            <option value="7">Ed Física</option>
                            <option value="8">Artes</option>
                            <option value="9">Biologia</option>
                            <option value="10">Sociologia</option>
                            <option value="11">Filosofia</option>
                            <option value="12">Química</option>
                            <option value="13">Física</option>
                        </select>
                        <label id="lbl">Diciplinas</label>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit"
                            class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
                    </div>
                </div>

                <div id="secretaria" class="col s12 m12 l12">
                    <h4>Secretaria</h4>
                    <div class="file-field input-field col s12 m6 l6">
                        <div id="btnfoto" class="btn col s6">
                            <span><i class="material-icons">add_a_photo</i></span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input id="foto" class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="nome_secretario" type="text" placeholder="Nome Secretario" class="validate">
                        <label id="lbl" for="icon_prefix">Nome</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                        <label id="lbl">Data Nascimento</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="rg" type="tel" placeholder="62.548.678-7" data-mask="00.000.000-0" class="validate">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input id="CPF" type="tel" placeholder="785.958.651-88" data-mask="000.000.000-00"
                            class="validate">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                    <div class="input-field col s8 m4 l4">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input id="cep" type="tel" placeholder="08574-150" data-mask="00000-000" class="validate">
                        <label id="lbl" for="icon_telephone">CEP</label>
                    </div>
                    <div class="input-field col s4 m2 l2">
                        <input id="numero" type="tel" placeholder="Número" class="validate">
                        <label id="lbl" for="icon_telephone">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m6 l6">
                        <input id="complemento" type="tel" placeholder="Complemento" class="validate">
                        <label id="lbl" for="icon_telephone">Complemento</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input id="email" type="tel" placeholder="gestclass@enterprise.com" class="validate">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">security</i>
                        <input id="senha" type="password" placeholder="*******" class="validate">
                        <label id="lbl" for="icon_telephone">Senha</label>
                    </div>
                    <div id="a" class="input-field col s10 m4 l4">
                        <input id="confsenha" type="password" placeholder="*******" class="validate">
                        <label id="lbl" for="icon_telephone">Confirma senha</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input id="celular" type="tel" placeholder="(11) 97765-3360" data-mask="(00) 00000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input id="telefone" type="tel" placeholder="(11) 4753-8560" data-mask="(00) 0000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div class="input-field right">
                        <button name="btncadastrar" value="fomrSecretaria" id="btnFormContas" type="submit"
                            class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Contas</h3>
                <ul id="tabs-swipe-demo" class="tabs blue lighten-5 ">
                    <li class="tab col s4"><a href="#aluno">Aluno/Responsável</a></li>
                    <!-- <li class="tab col s4"><a href="#responsavel">Responsável</a></li> -->
                    <li class="tab col s4"><a href="#professor">Professor</a></li>
                    <li class="tab col s4"><a href="#secretaria">Secretaria</a></li>
                </ul>
                <div class="row">
                    <div id="aluno" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Aluno</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field">
                                    <img class="materialboxed imagePreview" width="100%" />
                                </div>
                                <div class="file-field ">
                                    <div class="btn-flat btn btnDark btnBlock">
                                        <span>Selecionar foto</span>
                                        <input type="file" onchange="imagePreview()" class="inputFoto" name="foto">
                                    </div>
                                    <div class="descFoto">
                                        <input class="file-path" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RA" name="ra" type="text" data-mask="0000000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do aluno" name="nomea" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="col s12">
                                <h5>Dados da turma</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="ensino">
                                    <option value="" disabled selected>Nível do ensino</option>
                                    <?php
                                        include_once 'php/conexao.php';
                                
                                        $query = $conn->prepare("SELECT ID_tipo_turma AS id, nome_tipo_turma AS tipo FROM tipo_turma");
                                        $query->execute();
                                    ?>
                                    <?php while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {?>
                                    <option value="<?php echo $dados["id"] ?>"><?php echo $dados["tipo"] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="turma">
                                    <option value="" disabled selected>Turma</option>
                                    <?php
                                        $query = $conn->prepare("SELECT ID_turma AS id, nome_turma AS turma FROM turma");
                                        $query->execute();
                                    ?>
                                    <?php while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {?>
                                    <option value="<?php echo $dados["id"] ?>"><?php echo $dados["turma"] ?></option>
                                    <?php }?>
                                </select>
                            </div>




                            <h4>Responsável</h4>

                            <div class="input-field col s12">
                                <p>
                                    <label>
                                        <input name="respSit" type="radio" value="novo" onclick="trocaFormResp(true)"/>
                                        <span>Cadastrar responsável</span>
                                    </label>
                                    <label>
                                        <input name="respSit" type="radio" value="existe" onclick="trocaFormResp(false)"/>
                                        <span>Responsável já cadastrado</span>
                                    </label></p>
                            </div>

                            <div class="existeResp hide">
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Digite o CPF do responsável" name="cpfResp" type="text" data-mask="000.000.000-00">
                                </div>
                            </div>


                            <div class="novoResp hide">
                                <div class="col s12">
                                    <h5>Dados pessoais</h5>
                                </div>
                                
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Nome do responsável" name="nomeResp" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="RG" name="rgResp" type="text" data-mask="00.000.000-0">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="CPF" name="cpfResp" type="text" data-mask="000.000.000-00">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Data de nascimento" name="nascResp" type="text" data-mask="00/00/0000">
                                </div>
                                <div class="col s12">
                                    <h5>Contato</h5>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Celular" name="celResp" type="text" data-mask="(00) 00000-0000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Telefone" name="telResp" type="text" data-mask="(00) 0000-0000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Telefone comercial" name="telcomResp" type="text" data-mask="(00) 0000-0000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Email" name="emailResp" type="text">
                                </div>
                                <div class="col s12">
                                    <h5>Endereço</h5>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark cepConsulta" placeholder="CEP" name="cepResp" type="text" data-mask="00000-000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark rua" placeholder="Logradouro" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Número" name="numResp" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark bairro" placeholder="Bairro" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark cidade" placeholder="Cidade" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark estado" placeholder="Estado" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Complemento" name="compResp" type="text">
                                </div>
                            </div>




                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="aluno">Cadastrar aluno e responsável</button>
                            </div>
                        </form>
                    </div>

                    <!-- <div id="responsavel" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Responsável</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do responsável" name="nome" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone" name="tel" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone comercial" name="telcom" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="col s12">
                                <h5>Endereço</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                    data-mask="00000-000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark rua" placeholder="Logradouro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Número" name="num" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark bairro" placeholder="Bairro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cidade" placeholder="Cidade" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark estado" placeholder="Estado" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="resp">Cadastrar responsável</button>
                            </div>
                        </form>
                    </div> -->

                    <div id="professor" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Professor</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field">
                                    <img class="materialboxed imagePreview" width="100%" />
                                </div>
                                <div class="file-field ">
                                    <div class="btn-flat btn btnDark btnBlock">
                                        <span>Selecionar foto</span>
                                        <input type="file" onchange="imagePreview()" class="inputFoto" name="foto">
                                    </div>
                                    <div class="descFoto">
                                        <input class="file-path" type="text">
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                            <div class="input-field col s6">
                                <input id="nome_professor" type="text" placeholder="Nome Professor" class="validate">
                                <label for="icon_prefix">Nome</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="cep" placeholder="08574-150" type="tel" data-mask="00000-000"
                                    class="validate">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="numero" placeholder="Número" type="tel" class="validate">
                                <label for="icon_telephone">Nº</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="complemento" placeholder="Complemento" type="tel" class="validate">
                                <label for="icon_telephone">Complemento</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="rg" placeholder="68.124.586-8" type="tel" data-mask="00.000.000-0"
                                    class="validate">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="cpf" placeholder="158688987/10" type="tel" data-mask="000000000/00"
                                    class="validate">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="email" placeholder="gestclass@entreprise.com" type="tel" class="validate">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="senha" placeholder="*******" type="password" class="validate">
                                <label for="icon_telephone">Senha</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000"
                                    class="validate">
                                <label for="icon_telephone">Celular</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="telefone" placeholder="(11) 97765-3360" type="tel"
                                    data-mask="(00) 00000-0000" class="validate">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="fk_id_escola_professor" placeholder="156" type="number" data-mask="000"
                                    class="validate">
                                <label for="icon_telephone">ID Escola</label>
                            </div>
                            <div class="input-field col s12 l6">
                                <select id="nome_tipo_turma" multiple>
                                    <option value="" disabled selected>Selecione o Ensino</option>
                                    <option value="1">Berçario</option>
                                    <option value="2">Pré Escola</option>
                                    <option value="3">Fundamental I</option>
                                    <option value="4">Fundamental II</option>
                                    <option value="5">Ensino Médio</option>
                                </select>
                                <label>Tipos Turmas</label>
                            </div>
                            <div class="input-field col s12 l6">
                                <select id="nome_turma" multiple>
                                    <option value="" disabled selected>Selecione a Turma</option>
                                    <option value="1">Berçario A</option>
                                    <option value="2">Pré 1 A</option>
                                    <option value="3">Pré 2 B</option>
                                    <option value="4">1º ano A</option>
                                    <option value="4">2º ano A</option>
                                    <option value="4">3º ano A</option>
                                    <option value="4">4º ano A</option>
                                    <option value="4">5º ano A</option>
                                    <option value="4">6º ano A</option>
                                    <option value="4">7º ano A</option>
                                    <option value="4">8º ano A</option>
                                    <option value="4">9º ano A</option>
                                    <option value="5">1º ano médio A</option>
                                    <option value="5">2º ano médio A</option>
                                    <option value="5">3º ano médio A</option>
                                </select>
                                <label>Turmas</label>
                            </div>
                            <div class="input-field col s12 l6">
                                <select id="nome_disciplina" multiple>
                                    <option value="" disabled selected>Selecione a Disciplina</option>
                                    <option value="1">Português</option>
                                    <option value="2">Matemática</option>
                                    <option value="3">Inglês</option>
                                    <option value="4">Ciências</option>
                                    <option value="5">Geografia</option>
                                    <option value="6">História</option>
                                    <option value="7">Ed Física</option>
                                    <option value="8">Artes</option>
                                    <option value="9">Biologia</option>
                                    <option value="10">Sociologia</option>
                                    <option value="11">Filosofia</option>
                                    <option value="12">Química</option>
                                    <option value="13">Física</option>
                                </select>
                                <label>Diciplinas</label>
=======
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do(a) professor(a)" name="nome" type="text">
>>>>>>> 83204b1f6ff50e64e30d406a4c78181cfdcb3bfa
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone" name="tel" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="col s12">
                                <h5>Endereço</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                    data-mask="00000-000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark rua" placeholder="Logradouro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Número" name="num" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark bairro" placeholder="Bairro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cidade" placeholder="Cidade" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark estado" placeholder="Estado" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="prof">Cadastrar
                                    professor(a)</button>
                            </div>
                        </form>
                    </div>

                    <div id="secretaria" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Secretaria</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field">
                                    <img class="materialboxed imagePreview" width="100%" />
                                </div>
                                <div class="file-field ">
                                    <div class="btn-flat btn btnDark btnBlock">
                                        <span>Selecionar foto</span>
                                        <input type="file" onchange="imagePreview()" class="inputFoto" name="foto">
                                    </div>
                                    <div class="descFoto">
                                        <input class="file-path" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do(a) secretário(a)" name="nome" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone" name="tel" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="col s12">
                                <h5>Endereço</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                    data-mask="00000-000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark rua" placeholder="Logradouro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Número" name="num" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark bairro" placeholder="Bairro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cidade" placeholder="Cidade" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark estado" placeholder="Estado" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="sec">Cadastrar
                                    secretário(a)</button>
                            </div>
                        </form>

>>>>>>> 7241579e3dd615fcb4cff713e4e3e8c574b46306
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <section class="floating-buttons">
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large light-blue lighten-1">
                <i class="large material-icons">add</i>
            </a>
            <ul>
                <li><a href="paginaManutencao.php" class="btn-floating black tooltipped" data-position="left"
                        data-tooltip="Gráfico de rendimento"><i class="material-icons">insert_chart</i></a></li>
                <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left"
                        data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
                <li><a href="paginaManutencao.php" class="btn-floating blue-grey darken-4 tooltipped"
                        data-position="left" data-tooltip="Chat"><i class="material-icons">chat</i></a></li>
                <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left"
                        data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
            </ul>
        </div>
    </section>
    <script src="js/default.js"></script>
=======
>>>>>>> 7241579e3dd615fcb4cff713e4e3e8c574b46306

    <?php require_once 'reqFooter.php' ?>