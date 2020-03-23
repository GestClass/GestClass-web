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
    <link rel="stylesheet" type="text/css" href="css/homeAdmGest.css" />

</head>

<body>

    <?php require_once 'reqMenuAdm.php' ?>

    <section class="floating-buttons">
        <div class="fixed-action-btn floating-right">
            <a class="btn-floating btn blue accent-4 modal-trigger" href="#CadastarEscolas">
                <i class="large material-icons">create</i>
            </a>
        </div>
    </section>

    <h4 class="center-align">Escolas Cadastradas</h4>

    <?php
        include_once 'php/conexao.php';

        $query = $conn->prepare("select nome_escola,cnpj,email from escola");
        // $query->bindValue(":email",$email);
        // $query->bindValue(":senha",$senha);
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
    ?>

    <section class="escolas">
        <div class="col s12">
            <div class="container">
                <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="images/yuna.jpg" alt="" class="circle">
                        <span class="title">Title</span>
                        <p><?php echo $dados["nome_escola"] ?> <br>
                            Second Line
                        </p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- CADASTRO DAS ESCOLAS SENDO MODIFICADO "USANDO EXEMPLO DO CADASTRO DO CALENDARIO" -->
    <section>
        <div id="CadastarEscolas" class="modal">
            <div class="modal-content">
                <dl class="row">
                    <div class="modal-header">
                        <dt class="col s9">
                            <h4>Cadastrar Escola</h4>
                        </dt>
                        <dd class="col s3"><a href="#!" class="modal-close waves-effect btn-flat right"><i
                                    class="material-icons">clear</i></a></dd>
                    </div>
                </dl>
                <div class="row">
                    <span id="msg-cad"></span>
                    <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastroAdm.php">
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_balance</i>
                                <input id="icon_titulo" type="text" name="nome_escola" id="nome_escola"
                                    class="validate">
                                <label for="icon_titulo">Nome Escola</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">business</i>
                                <input placeholder="000.0000.0000/00-0" name="cnpj" id="cnpj" type="text"
                                    class="validate">
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
                                <input placeholder="+55 (11) 95945-7809" name="telefone" id="telefone" type="text"
                                    class="validate">
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
                                <input placeholder="Digite a quantidade de alunos" name="quantidade_alunos"
                                    id="quantidade_alunos" type="number" data-mask="0.000" class="validate">
                                <label for="first_name">Quantidade de alunos</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-flat waves-effect btnDarkFill left" type="submit" name="cadEscola"
                        id="cadEscola" value="cadEscola">Consultar
                        <i class="material-icons right">pageview</i>
                    </button>
                    <button class="btn btn-flat waves-effect btnLightBlue right" type="submit" name="cascolato"
                        id="cadEscola" value="cadEscola">Cadastrar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    <section class="floating-buttons">
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large indigo darken-4">
                <i class="large material-icons">add</i>
            </a>
            <ul>
                <li><a href="paginaManutencao.html" class="btn-floating black tooltipped" data-position="left"
                        data-tooltip="Gráfico de rendimento"><i class="material-icons">insert_chart</i></a></li>
                <li><a href="paginaManutencao.html" class="btn-floating yellow darken-1 tooltipped" data-position="left"
                        data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
                <li><a href="paginaManutencao.html" class="btn-floating blue-grey darken-4 tooltipped"
                        data-position="left" data-tooltip="Chat"><i class="material-icons">chat</i></a></li>
                <li><a href="calendario.php" class="btn-floating blue tooltipped" data-position="left"
                        data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
            </ul>
        </div>
    </section>


    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/homeAdmGest.js"></script>
    <script src="js/default.js"></script>

</body>

</html>