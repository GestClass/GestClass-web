<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Arquivo CSS -->
    <link href='css/core/main.min.css' rel='stylesheet' />
    <link href='css/daygrid/main.min.css' rel='stylesheet' />
    <link href='css/list/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/calendario.css" />

    <!-- Arquivo JS -->
    <script src='js/core/main.min.js'></script>
    <script src='js/core/locales/pt-br.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/list/main.min.js'></script>
    <script src='js/google-calendar/main.min.js'></script>

</head>

<body>

    <?php require_once 'reqMenu.php' ?>

    <div id='loading'>loading...</div>

    <?php
       if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div id='calendar'></div>

    <section class="modals">
        <div id="modalInfo" class="modal model">

            <div class="modal-content" id="modalEdit">
                <dd class="col s3"><a href="#!" class="modal-close waves-effect btn-flat right"><i class="material-icons">clear</i></a></dd>
                <h4>Detalhes do evento</h4>
                <div class="visevent">
                    <dl class="row">
                        <dt class="col s3 bolder">Titulo do evento</dt>
                        <dd class="col s9" id="title"></dd><br>

                        <dt class="col s3 bolder">Início do evento</dt>
                        <dd class="col s9" id="start"></dd><br>

                        <dt class="col s3 bolder">Fim do evento</dt>
                        <dd class="col s9" id="end"></dd><br>
                    </dl>
                    <button class="tbtn waves-effect btn-flat btnDark btn-canc-vis">Editar
                    <i class="material-icons left">create</i>
                    </button>
                </div>
                <div class="formedit">
                <span id="msg-edit"></span>
                    <form id="EditarEvento" class="col s12" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">format_size</i>
                                <input placeholder="" name="title" id="title" type="text" class="validate">
                                <label for="icon_titulo">Titulo do evento</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">color_lens</i>
                                <select class="" name="color" id="color">
                                    <option value="" disabled selected>Escolha uma cor</option>
                                    <option value="#FFD700" data-icon="assets/img/amarelo.jpg" class="left">Amarelo
                                    </option>
                                    <option value="#8B0000" data-icon="assets/img/vermelho.jpg" class="left">Vermelho
                                    </option>
                                    <option value="#228B22" data-icon="assets/img/verde.jpg" class="left">Verde</option>
                                    <option value="#42A5F5" data-icon="assets/img/azul.jpg" class="left">Azul</option>
                                    <option value="#A020F0" data-icon="assets/img/roxo.jpg" class="left">Roxo</option>
                                    <option value="#000000" data-icon="assets/img/preto.jpg" class="left">Preto</option>
                                </select>
                                <!-- <label>Materialize Select</label> -->
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event</i>
                                <input placeholder="" name="start" id="start" type="text" class="validate"
                                    onkeypress="DataHora(event, this)">
                                <label for="first_name">Início do evento</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event</i>
                                <input placeholder="" name="end" id="end" type="text" class="validate"
                                    onkeypress="DataHora(event, this)">
                                <label for="first_name">Fim do evento</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn waves-effect btn-flat btnDarkFill btn-canc-edit left">Cancelar
                        <i class="material-icons right">clear</i>
                        </button>
                            <button class="btn btn-flat waves-effect btnLightBlue" type="submit" name="cadEvento" id="cadEvento"value="cadEvento">Cadastrar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect btn-flat btnDefault">Fechar</a>
            </div> -->
        </div>

        <div id="modalCadastro" class="modal">
            <div class="modal-content">
                <dl class="row">
                    <div class="modal-header">
                        <dt class="col s9">
                            <h4>Cadastrar evento</h4>
                        </dt>
                        <dd class="col s3"><a href="#!" class="modal-close waves-effect btn-flat right"><i
                                    class="material-icons">clear</i></a></dd>
                    </div>
                </dl>
                <div class="row">
                    <span id="msg-cad"></span>
                    <form id="adicionarEvento" class="col s12" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">format_size</i>
                                <input id="icon_titulo" type="text" name="title" id="title" class="validate">
                                <label for="icon_titulo">Titulo do evento</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">color_lens</i>
                                <select class="" name="color" id="color">
                                    <option value="" disabled selected>Escolha uma cor</option>
                                    <option value="#FFD700" data-icon="assets/img/amarelo.jpg" class="left">Amarelo
                                    </option>
                                    <option value="#8B0000" data-icon="assets/img/vermelho.jpg" class="left">Vermelho
                                    </option>
                                    <option value="#228B22" data-icon="assets/img/verde.jpg" class="left">Verde</option>
                                    <option value="#42A5F5" data-icon="assets/img/azul.jpg" class="left">Azul</option>
                                    <option value="#A020F0" data-icon="assets/img/roxo.jpg" class="left">Roxo</option>
                                    <option value="#000000" data-icon="assets/img/preto.jpg" class="left">Preto</option>
                                </select>
                                <!-- <label>Materialize Select</label> -->
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event</i>
                                <input placeholder="" name="start" id="start" type="text" class="validate"
                                    onkeypress="DataHora(event, this)">
                                <label for="first_name">Início do evento</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event</i>
                                <input placeholder="" name="end" id="end" type="text" class="validate"
                                    onkeypress="DataHora(event, this)">
                                <label for="first_name">Fim do evento</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-flat waves-effect btnLightBlue right" type="submit" name="cadEvento" id="cadEvento"
                                value="cadEvento">Cadastrar
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
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/default.js"></script>
    <script src='js/calendario.js'></script>

</body>

</html>