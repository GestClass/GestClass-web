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

    <section class="section center">
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="far fa-user fa-6x blue-icon"></i>
                            <h5>Admins</h5>
                            <p>Acesso aos dados dos admins, efetuação e remoção de cadastros</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a class="modal-trigger" href="#CadastarEscolas">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-school fa-6x blue-icon"></i>
                            <h5>Cadastro Escolas</h5>
                            <p>Cadastro de novos acessos de escolas ao aplicativo e remoção das mesmas</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-bell fa-6x blue-icon"></i>
                            <h5>Notificações</h5>
                            <p>Envio de notificações para as escolas, avisos sobre atraso de mensalidade ou manutenção
                                no sistema</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-compass fa-6x blue-icon"></i>
                            <h5>Visão geral</h5>
                            <p>Visão geral do sistema para testes</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="paginaManutencao.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-idea fa-6x blue-icon"></i>
                            <h5>ALGUMA IDEIA PLEASE IDEIA</h5>
                            <p>Acesso total a dados dos professores, atribuição de classes, alterações de dados, etc</p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="perfil.php">
                        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                            <i class="fas fa-cog fa-6x blue-icon"></i>
                            <h5>Configurações</h5>
                            <p>Configurações da conta</p>
                        </div>
                    </a>
                </div>
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
                    <form id="adicionarEscola" class="col s12" method="POST">
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
                            <!-- <div class="input-field col s6">
                                <i class="material-icons prefix">alternate_email</i>
                                <input placeholder="gestclass@enterprise.com" name="email" id="email" type="text"
                                    class="validate">
                                <label for="first_name">Email</label>
                            </div> -->
                            <div class="input-field col s6">
                                <i class="material-icons prefix">call</i>
                                <input placeholder="+55 (11) 95945-7809" name="end" id="end" type="text"
                                    class="validate">
                                <label for="first_name">Telefone</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">location_on</i>
                                <input placeholder="Endereço" name="end" id="end" type="text" class="validate">
                                <label for="first_name">Logradouro</label>
                            </div>
                            <div class="input-field col s8">
                                <i class="material-icons prefix">location_on</i>
                                <input placeholder="Bairro" name="end" id="end" type="text" class="validate">
                                <label for="first_name">Bairro</label>
                            </div>
                            <div class="input-field col s2">
                                <!-- <i class="material-icons prefix">location_on</i> -->
                                <input placeholder="Número" name="end" id="end" type="text" class="validate">
                                <label for="first_name">Nº</label>
                            </div>
                            <div class="input-field col s2">
                                <!-- <i class="material-icons prefix">location_on</i> -->
                                <input placeholder="Estado" name="end" id="end" type="text" class="validate">
                                <label for="first_name">Estado</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">attach_money</i>
                                <input placeholder="Bairro" name="end" id="end" type="text" class="validate">
                                <label for="first_name">Data de pagamento</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">wc</i>
                                <input placeholder="Bairro" name="end" id="end" type="text" class="validate">
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
            <a class="btn-floating btn-large light-blue lighten-1">
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
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/homeAdmGest.js"></script>
    <script src="js/default.js"></script>

</body>

</html>