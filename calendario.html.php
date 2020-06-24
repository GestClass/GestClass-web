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

    <?php 
    // session_start();

    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';
    } else if($id_tipo_usuario == 2){
        require_once 'reqDiretor.php';
    }else if($id_tipo_usuario == 3){
        require_once 'reqHeader.php';
    }elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    }elseif ($id_tipo_usuario  == 5) {
        require_once 'reqAluno.php';
    }else {
        require_once 'reqPais.php';
    }


    ?>

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
                <dd class="col s3"><a href="#!" class="modal-close waves-effect btn-flat right"><i
                            class="material-icons">clear</i></a></dd>
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
                            <button type="button"
                                class="btn waves-effect btn-flat btnDarkFill btn-canc-edit left">Cancelar
                                <i class="material-icons right">clear</i>
                            </button>
                            <button class="btn btn-flat waves-effect btnLightBlue" type="submit" name="cadEvento"
                                id="cadEvento" value="cadEvento">Cadastrar
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
                            <button class="btn btn-flat waves-effect btnLightBlue right" type="submit" name="cadEvento"
                                id="cadEvento" value="cadEvento">Cadastrar
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
                <li><a href="#modalGraficos" class="modal-trigger btn-floating black tooltipped" data-position="left"
                        data-tooltip="Rendimento Disciplinar"><i class="material-icons">insert_chart</i></a></li>
                <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left"
                        data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
                <li><a href="mensagensAluno.html.php" class="btn-floating blue-grey darken-4 tooltipped"
                        data-position="left" data-tooltip="Chat"><i class="material-icons">chat</i></a></li>
                <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left"
                        data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
            </ul>
        </div>
    </section>
    <div id="modalGraficos" class="modal ">
        <div class="modal-content">
            <h4 class="center"><i class="material-icons right">school</i>Rendimento Escolar</h4>
                <div class="input-field col s12 validate">
                    <form action="graficoRendimento.html.php" method="POST">
                        <h5 class="center">Seleciona a matéria desejada para acompanhar o rendimento:</h5>
                        <select name="disciplinas">
                        <?php
                            // Selecionar a turma do aluno
                            $sql_select_id_turma = $conn->prepare("SELECT fk_id_turma_aluno FROM aluno WHERE RA = $id_usuario");
                            // Executando
                            $sql_select_id_turma->execute();
                            // Armazenando array da informação
                            $array_turma = $sql_select_id_turma->fetch(PDO::FETCH_ASSOC);
                            // Armazenar ID turma
                            $id_turma = $array_turma['fk_id_turma_aluno'];

                            // Resgatando a turma do aluno
                            $sql_select_turma_aluno = $conn->prepare("SELECT nome_turma, fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                            // Executando comando 
                            $sql_select_turma_aluno->execute();
                            // Armazenando nome da turma
                            $turma_array = $sql_select_turma_aluno->fetch(PDO::FETCH_ASSOC);
                            // Variável nome turma
                            $nome_turma_aluno = $turma_array['nome_turma'];
                            $id_turno = $turma_array['fk_id_turno_turma'];

                            // Resgatar nome do turno
                            $sql_select_nome_turno = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                            // Executando o comando
                            $sql_select_nome_turno->execute();
                            // Armazenando nome do turno
                            $turno = $sql_select_nome_turno->fetch(PDO::FETCH_ASSOC);
                            // Armazenando o nome em variável
                            $nome_turno = $turno['nome_turno'];
                            $_SESSION['nome_turno']=$nome_turno;
                            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma");
                            // Executar
                            $query_select_disciplinas->execute();
                                // Armazenar em um array
                                while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
                                    // Armazenando o nome e o id da disciplina
                                    $nome_disciplina = $array_disciplinas['nome_disciplina'];
                                    $id_disciplina = $array_disciplinas['id_disciplina'];
                                ?>
                                    <option value="<?php echo $id_disciplina ?>"><?php echo $nome_disciplina; ?></option>
                            <?php
                                }
                            
                            ?>
                        </select>
                <input type="hidden" name="id_disciplina" value="<?php $id_disciplina ?>" />
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">check</i>Acessar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/default.js"></script>
    <script src='js/calendario.js'></script>

</body>

</html>