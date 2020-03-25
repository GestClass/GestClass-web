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
    <link rel="stylesheet" type="text/css" href="css/cadastro.css" />


</head>

<body>

    <?php require_once 'reqHeader.php' ?>

    <div class="container col s12 m12 l12 ">
        <form method="POST" action="./controller/cadastro.controller.php">
            <h4>Selecione o tipo de conta</h4><br>
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul id="tabs-swipe-demo" class="tabs blue lighten-5">
                        <li class="tab col s1 m2 l3 "><a href="#aluno">Aluno</a></li>
                        <li class="tab col s1 m2 l3 "><a href="#responsavel">Responsável</a></li>
                        <li class="tab col s1 m2 l3 "><a href="#professor">Professor</a></li>
                        <li class="tab col s1 m2 l3 "><a href="#secretaria">Secretaria</a></li>
                    </ul>
                </div><br>


                <div id="aluno" class="col s12 m12 l12 blue lighten-5">
                    <h4>Aluno</h4>
                    <div>
                        <div class="container">
                            <div class="file-field input-field col s12 m8 l6">
                                <div class="btn">
                                    <span>Foto</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="foto" class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="RA" placeholder="8956478-9" type="text" class="validate" data-mask="0000000-0">
                                <label for="icon_prefix">RA</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="nome_aluno" placeholder="Nome Aluno" type="text" class="validate ">
                                <label for="icon_prefix">Nome</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="cep" placeholder="08574-150" type="tel" data-mask="00000-000" class="validate ">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="numero" placeholder="Número" type="tel" class="validate ">
                                <label for="icon_telephone">Nº</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="complemento" placeholder="Complemento" type="tel" class="validate ">
                                <label for="icon_telephone">Complemento</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="RG" placeholder="65.745.984-6" type="tel" data-mask="00.000.000-0" class="validate ">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="CPF" placeholder="614755014/16" type="tel" data-mask="000000000/00" class="validate ">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="email" placeholder="gestclass@enterprise.com" type="tel" class="validate ">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="senha" placeholder="********" type="password" class="validate ">
                                <label for="icon_telephone">Senha</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000" class="validate ">
                                <label for="icon_telephone">Celular</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="telefone" placeholder="(11) 4002-8922" type="tel" data-mask="(00) 0000-0000" class="validate ">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker">
                                <label>Data de Nascimento</label>
                            </div>
                            <div class="input-field col s12">
                                <select id="nome_tipo_turma">
                                    <option value="" disabled selected></option>
                                    <option value="1">Berçario</option>
                                    <option value="2">Pré Escola</option>
                                    <option value="3">Fundamental I</option>
                                    <option value="4">Fundamental II</option>
                                    <option value="5">Ensino Médio</option>
                                </select>
                                <label>Ensino</label>
                            </div>
                            <div class="input-field col s12">
                                <select id="nome_turma">
                                    <option value="" disabled selected></option>
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
                                <label>Sala</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="fk_id_escola_professor" placeholder="156" type="number" data-mask="000" class="validate">
                                <label for="icon_telephone">ID Escola</label>
                            </div>
                            <div class="input-field right">
                                <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                    <i class="material-icons left">send</i> Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="responsavel" class="col s12 m12 l12 blue lighten-5">
                    <h4>Responsável</h4>
                    <div>
                        <div class="container">
                            <div class="file-field input-field col s12 m8 l6">
                                <div class="btn">
                                    <span>Foto</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="foto" class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="nome_responsavel" type="tel" placeholder="Nome Responsável" class="validate">
                                <label for="icon_telephone">Nome</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="cep" type="tel" placeholder="08574-150" data-mask="00000-000" class="validate">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="numero" type="tel" placeholder="Número" class="validate">
                                <label for="icon_telephone">Nº</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="complemento" type="tel" placeholder="Complemento" class="validate">
                                <label for="icon_telephone">Complemento</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="rg" type="tel" placeholder="84.514.751-16" data-mask="00.000.000-00" class="validate">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="cpf" type="tel" placeholder="15886475/22" data-mask="000000000/00" class="validate">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="email" type="tel" placeholder="gestclass@enterprise.com" class="validate">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="senha" type="password" placeholder="******" class="validate">
                                <label for="icon_telephone">Senha</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="pin" type="password" placeholder="******" data-mask="000000" class="validate">
                                <label for="icon_telephone">Pin</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="celular" type="tel" placeholder="(11) 97765-3360" data-mask="(00) 00000-0000" class="validate">
                                <label for="icon_telephone">Celular</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="telefone" type="tel" placeholder="(11) 4651-3030" data-mask="(00) 0000-0000" class="validate">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="telefone_comercial" type="tel" placeholder="(11) 7765-3360" data-mask="(00) 0000-0000" class="validate">
                                <label for="icon_telephone">Telefone (Comercial)</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker">
                                <label>Data de Nascimento</label>
                            </div>
                            <div class="input-field col s6">
                                <select name="data_pagamento" id="data_pagamento">
                                    <option value="" disabled selected>Escolha uma data de pagamento</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="5">5</option>
                                    <option value="8">8</option>
                                    <option value="15">15</option>
                                    <option value="25">25</option>
                                </select>
                                <label for="first_name">Data de pagamento</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="fk_ra_aluno_responsavel" placeholder="8956478-9" type="text" class="validate" data-mask="0000000-0">
                                <label for="icon_prefix">RA Aluno</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="fk_id_escola_professor" placeholder="156" type="number" data-mask="000" class="validate">
                                <label for="icon_telephone">ID Escola</label>
                            </div>
                            <div class="input-field right">
                                <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                    <i class="material-icons left">send</i> Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="professor" class="col s12 m12 l12 blue lighten-5">
                    <h4>Professor</h4>
                    <div>
                        <div class="container">
                            <div class="file-field input-field col s12 m8 l6">
                                <div class="btn">
                                    <span>Foto</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="foto" class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="nome_professor" type="text" placeholder="Nome Professor" class="validate">
                                <label for="icon_prefix">Nome</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="cep" placeholder="08574-150" type="tel" data-mask="00000-000" class="validate">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="numero" placeholder="Número" type="tel" class="validate">
                                <label for="icon_telephone">Nº</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="complemento" placeholder="Complemento" type="tel" class="validate">
                                <label for="icon_telephone">Comple0mento</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="rg" placeholder="68.124.586-8" type="tel" data-mask="00.000.000-0" class="validate">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="cpf" placeholder="158688987/10" type="tel" data-mask="000000000/00" class="validate">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="email" placeholder="gestclass@entreprise.com" type="tel" class="validate">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="senha" placeholder="*******" type="password" class="validate">
                                <label for="icon_telephone">Senha</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000" class="validate">
                                <label for="icon_telephone">Celular</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="telefone" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000" class="validate">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="fk_id_escola_professor" placeholder="156" type="number" data-mask="000" class="validate">
                                <label for="icon_telephone">ID Escola</label>
                            </div>
                            <div class="input-field col s12">
                                <select id="nome_tipo_turma" multiple>
                                    <option value="" disabled selected></option>
                                    <option value="1">Berçario</option>
                                    <option value="2">Pré Escola</option>
                                    <option value="3">Fundamental I</option>
                                    <option value="4">Fundamental II</option>
                                    <option value="5">Ensino Médio</option>
                                </select>
                                <label>Tipos Turmas</label>
                            </div>
                            <div class="input-field col s12">
                                <select id="nome_turma" multiple>
                                    <option value="" disabled selected></option>
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
                            <div class="input-field col s12">
                                <select id="nome_disciplina" multiple>
                                    <option value="" disabled selected></option>
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
                            </div>
                            <div class="input-field right">
                                <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                    <i class="material-icons left">send</i> Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="secretaria" class="col s12 m12 l12 blue lighten-5">
                    <h4>Secretaria</h4>
                    <div >
                        <div class="container">
                            <div class="file-field input-field col s12 m8 l6">
                                <div class="btn">
                                    <span>Foto</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="foto" class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="nome_secretario" type="text" placeholder="Nome Secretario" class="validate">
                                <label for="icon_prefix">Nome</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="cep" type="tel" placeholder="08574-150" data-mask="00000-000" class="validate">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="numero" type="tel" placeholder="Número" class="validate">
                                <label for="icon_telephone">Nº</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="complemento" type="tel" placeholder="Complemento" class="validate">
                                <label for="icon_telephone">Complemento</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="rg" type="tel" placeholder="62.548.678-7" data-mask="00.000.000-0" class="validate">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="CPF" type="tel" placeholder="785958651/88" data-mask="000000000/00" class="validate">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="email" type="tel" placeholder="gestclass@enterprise.com" class="validate">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="senha" type="password" placeholder="*******" class="validate">
                                <label for="icon_telephone">Senha</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="celular" type="tel" placeholder="(11) 97765-3360" data-mask="(00) 00000-0000" class="validate">
                                <label for="icon_telephone">Celular</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="telefone" type="tel" placeholder="(11) 4753-8560" data-mask="(00) 0000-0000" class="validate">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="fk_id_escola_professor" placeholder="156" type="number" data-mask="000" class="validate">
                                <label for="icon_telephone">ID Escola</label>
                            </div>
                            <div class="input-field right">
                                <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                    <i class="material-icons left">send</i> Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

    <?php require_once 'reqFooter.php' ?>