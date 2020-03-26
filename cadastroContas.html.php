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

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Contas</h3>
                    <ul id="tabs-swipe-demo" class="tabs blue lighten-5 ">
                        <li class="tab col s3"><a href="#aluno">Aluno</a></li>
                        <li class="tab col s3"><a href="#responsavel">Responsável</a></li>
                        <li class="tab col s3"><a href="#professor">Professor</a></li>
                        <li class="tab col s3"><a href="#secretaria">Secretaria</a></li>
                    </ul>
                    <div class="row">
                        <div id="aluno" class="col s12">
                            <form action="" method="post">

                                <h4>Aluno</h4>

                                <div class="col s12 m6">
                                    <div class="input-field">
                                        <img class="materialboxed imagePreview" width="100%" />
                                    </div>
                                    <div class="file-field ">
                                        <div class="btn-flat btn btnDark btnBlock">
                                            <span>Selecionar foto</span>
                                            <input type="file" onchange="imagePreview()" class="inputFoto"
                                                name="fotoPerfil">
                                        </div>
                                        <div class="descFoto">
                                            <input class="file-path" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="RA" name="ra" type="text"
                                        data-mask="0000000-0">
                                </div>

                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Nome do aluno" name="nomealuno" type="text">
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

                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Email" name="email" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                        data-mask="(00) 00000-0000">
                                </div>

                                <div class="input-field col s12 m6">
                                    <select name="ensino">
                                        <option value="" disabled selected>Nível do ensino</option>
                                        <option value="1">Berçario</option>
                                        <option value="2">Pré Escola</option>
                                        <option value="3">Fundamental I</option>
                                        <option value="4">Fundamental II</option>
                                        <option value="5">Ensino Médio</option>
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select name="ensino">
                                        <option value="" disabled selected>Turma</option>
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
                                </div>

                                <div class="col s12 right-align">
                                    <button type="submit" class="btn-flat btn-large btnDark">Cadastrar aluno</button>
                                </div>



                                <!-- <div class="col s12">
                                    <h4>Responsável</h4>
                                    <h5>Dados pessoais</h5>
                                </div>

                                <div class="input-field col s12">
                                    <input class="inputDark" placeholder="select" name="nomeresp" type="text">
                                </div>

                                <div class="input-field col s12">
                                    <input class="inputDark" placeholder="Nome do responsável" name="nomeresp"
                                        type="text">
                                </div>
                                <div class="input-field col s12 m4">
                                    <input class="inputDark" placeholder="RG" name="rgresp" type="text"
                                        data-mask="00.000.000-0">
                                </div>
                                <div class="input-field col s12 m4">
                                    <input class="inputDark" placeholder="CPF" name="cpfresp" type="text"
                                        data-mask="000.000.000-00">
                                </div>
                                <div class="input-field col s12 m4">
                                    <input class="inputDark" placeholder="Data de nascimento" name="nascresp"
                                        type="text" data-mask="00/00/0000">
                                </div>




                                <div class="col s12">
                                    <h5>Contato</h5>
                                </div>

                                <div class="input-field col s12 m4">
                                    <input class="inputDark" placeholder="Celular" name="celresp" type="text"
                                        data-mask="(00) 00000-0000">
                                </div>

                                <div class="input-field col s12 m4">
                                    <input class="inputDark" placeholder="Telefone" name="telresp" type="text"
                                        data-mask="(00) 0000-0000">
                                </div>

                                <div class="input-field col s12 m4">
                                    <input class="inputDark" placeholder="Telefone comercial" name="telcomresp"
                                        type="text" data-mask="(00) 0000-0000">
                                </div>

                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Email" name="emailresp" type="text">
                                </div>




                                <div class="col s12">
                                    <h5>Endereço</h5>
                                </div>

                                <div class="input-field col s12 m2">
                                    <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                        data-mask="00000-000">
                                </div>

                                <div class="input-field col s12 m2">
                                    <input class="inputDark" placeholder="Número" name="num" type="text">
                                </div>
                                <div class="input-field col s12 m5">
                                    <input class="inputDark rua" placeholder="Logradouro" type="text">
                                </div>

                                <div class="input-field col s12 m3">
                                    <input class="inputDark bairro" placeholder="Bairro" type="text">
                                </div>

                                <div class="input-field col s12 m4">
                                    <input class="inputDark cidade" placeholder="Cidade" type="text">
                                </div>

                                <div class="input-field col s12 m2">
                                    <input class="inputDark estado" placeholder="Estado" type="text">
                                </div>

                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                                </div> -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'reqFooter.php' ?>