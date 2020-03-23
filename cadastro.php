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
    <link rel="stylesheet" type="text/css" href="css/cadastro.css" />


</head>

<body>

    <?php require_once 'reqMenu.php' ?>

    <div class="container ">
        <form method="POST" action="./controller/cadastro.controller.php">
            <h4>Selecione o tipo de conta</h4><br>
            <div class="row">
                <div class="col s12 m12 l8">
                    <ul id="tabs-swipe-demo" class="tabs blue lighten-5">
                        <li class="tab col s1 m2 l3 "><a class="active" href="#aluno">Aluno</a></li>
                        <li class="tab col s1 m2 l3 "><a href="#responsavel">Responsável</a></li>
                        <li class="tab col s1 m2 l3 "><a href="#professor">Professor</a></li>
                        <li class="tab col s1 m2 l3 "><a href="#secretaria">Secretaria</a></li>
                    </ul>
                </div><br>


                <div id="aluno" class="col s12 m12 l12 blue lighten-5">
                    <h4>Aluno</h4>
                    <div class="scroll">
                        <div class="container">
                            <div id="RA" class="input-field col s12 m8 l6">
                                <input placeholder="7755449 1" id="icon_prefix" type="text"
                                 class="validate inputDark" data-mask="7755449 1">
                                <label for="icon_prefix">RA</label>
                            </div>
                            <div id="foto" class="input-field col s12 m8 l6">
                                <input id="icon_prefix" type="text" class="validate inputDark">
                                <label for="icon_prefix">Foto</label>
                            </div>
                            <div id="nome_aluno" class="input-field col s12 m8 l6">
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
                            <div id="RG" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div id="CPF" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div id="email" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div id="senha" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="password" class="validate inputDark">
                                <label for="icon_telephone">Senha</label>
                            </div>
                            <div id="celular" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Celular</label>
                            </div>
                            <div id="telefone" class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div id="data_nascimento" class="input-field col s12 m8 l6">
                                <input type="text" class="datepicker">
                                <label>Data de Nascimento</label>
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
                    <div class="scroll">
                        <div class="container">
                            <div id="foto/resp" class="input-field col s12 m8 l6">
                                <input id="icon_prefix" type="text" class="validate inputDark">
                                <label for="icon_prefix">Foto</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Email</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">CEP</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark  ">
                                <label for="icon_telephone">Bairro</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Rua</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark  ">
                                <label for="icon_telephone">Numero</label>
                            </div>
                            <div class="input-field col s12 m8 l6">
                                <input id="icon_telephone" type="tel" class="validate inputDark">
                                <label for="icon_telephone">Complemento</label>
                            </div>
                            <div class="input-field right">
                                <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                    <i class="material-icons left">send</i> Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="professor" class="col s12 m12 l12 blue lighten-5">
                    <div id="professor">
                        <h4>Professor</h4>
                        <div class="scroll">
                            <div class="container">
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Nome</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Telefone</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Email</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">RG</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">CPF</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Titulo Eleitoral</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Carteira de Trabalho</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">CEP</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Bairro</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Rua</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Numero</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Complemento</label>
                                </div>
                                <div class="input-field right">
                                    <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                        <i class="material-icons left">send</i> Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="secretaria" class="col s12 m12 l12 blue lighten-5">
                    <div id="secretaria">
                        <h4>Secretaria</h4>
                        <div class="scroll">
                            <div class="container">
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Nome</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Telefone</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Email</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">RG</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">CPF</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Título Eleitoral</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Carteira de Trabalho</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">CEP</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Bairro</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate inputDark">
                                    <label for="icon_telephone">Rua</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate inputDark  ">
                                    <label for="icon_telephone">Numero</label>
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <input id="icon_telephone" type="tel" class="validate inputDark">
                                    <label for="icon_telephone">Complemento</label>
                                </div>
                                <div class="input-field right">
                                    <button id="btnFormContas" type="submit" class="btn-flat btnDefaultFormContas">
                                        <i class="material-icons left">send</i> Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="js/homeSecretaria.js"></script>
    <script src="js/cadastro.js"></script>

    <script src="js/default.js"></script>

</body>

</html>