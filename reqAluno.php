<?php
// session_start();
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$query = $conn->prepare("select * from aluno where RA=$id_usuario");
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);

$nomeAlu = $dados['nome_aluno'];

$nome = Explode(" ", $nomeAlu);
$nome_alu = $nome[0];

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/boletimVisualizacao.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/animate.css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="node_modules/aos/dist/aos.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />
    <link rel="stylesheet" type="text/css" href="css/grafico.css" />

</head>

<body>

    <header>
        <div class="navbar-fixed">
            <nav class="light-blue lighten-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">clear_all</i></a>
                        <a href="homeAluno.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-small-only">GestClass<span></a>

                        <ul class="right">
                            <li>
                                <a class="transparent hide-on-small-only" disable>Olá <?php echo $nome_alu ?></a>
                            </li>
                            <?php if (empty($dados['foto'])) { ?>
                                <li>
                                    <a href="homeAluno.html.php" class="transparent hide-on-small-only">
                                        <img class="circle icon-user" width="50px" height="50px" src="assets/imagensBanco/usuario.png">
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="homeAluno.html.php" class="transparent hide-on-small-only">
                                        <img class="circle icon-user" width="50px" height="50px" src="assets/imagensBanco/<?php echo $dados['foto'] ?>">
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <div class="dividerVert hide-on-small-only"></div>
                            </li>
                            <li>
                                <a href="php/logout.php" class="btn-flat btnLight hide-on-small-only">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul id="slide-out" class="sidenav" style="width:auto">
            <li>
                <div class="user-view">
                    <div class="background light-blue lighten-1">
                        <!-- <img src="assets/img/slide2.png"> -->
                    </div>
                    <?php if (empty($dados['foto'])) { ?>
                        <a href="perfil.html.php"><img class="circle" src="assets/imagensBanco/usuario.png"></a>
                    <?php } else { ?>
                        <a href="perfil.html.php"><img class="circle" src="assets/imagensBanco/<?php echo $dados['foto'] ?>"></a>
                    <?php } ?>
                    <a href="perfil.html.php"><span class="white-text name"><?php echo $nome_alu ?></span></a>
                    <a href="perfil.html.php"><span class="white-text email"><?php echo $dados['email'] ?></span></a>
                </div>
            </li>
            <li><a href="homeAluno.html.php"><i class="material-icons">home</i>Início</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#modalGraficos" class="modal-trigger"><i class=" material-icons">trending_up</i>Rendimento Disciplinar</a></li>
            <li><a href="boletimVisualizacao.html.php"><i class="material-icons">format_list_numbered_ltr</i>Boletim Escolar</a></li>
            <li><a href="calendario.html.php"><i class="material-icons">event</i>Calendario Escolar</a>
            <li><a href="paginaManutencao.php"><i class="material-icons">toc</i>Grade Curricular</a>
            <li><a href="mensagensAluno.html.php"><i class="material-icons">email</i>Mensagens</a>
            <li><a href="#modalFeedback" class="modal-trigger"><i class="material-icons">support_agent</i>Relate um Problema</a>
            <li><a href="materialAluno.html.php"><i class="material-icons">picture_as_pdf</i>Materiais de Apoio</a>
            </li>

            <li>
                <div class="divider"></div>
            </li>
            <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
        </ul>
        <div id="modalGraficos" class="modal ">
            <div class="modal-content">
                <h4 class="center">Rendimento Escolar</h4>
                <div class="input-field col s12 validate">
                    <form action="graficoRendimento.html.php" method="POST">
                        <h5 class="center">Selecione a matéria desejada para acompanhar o rendimento:</h5>
                        <select name="disciplinas">
                            <option value="" selected disabled>Selecione a Disciplina</option>
                            <?php
                            // Selecionar a turma do aluno
                            $sql_select_id_turma = $conn->prepare("SELECT fk_id_turma_aluno FROM aluno WHERE RA = $id_usuario");
                            // Executando
                            $sql_select_id_turma->execute();
                            // Armazenando array da informação
                            $array_turma = $sql_select_id_turma->fetch(PDO::FETCH_ASSOC);
                            // Armazenar ID turma
                            $id_turma = $array_turma['fk_id_turma_aluno'];

                            // Selecionar os as disciplinas do aluno
                            $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma GROUP BY nome_disciplina");
                            // Executar
                            $query_select_disciplinas->execute();
                            // Armazenar em um array
                            while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
                                // Armazenando o nome e o id da disciplina
                                $nome_disciplina = $array_disciplinas['nome_disciplina'];
                                $disciplina = $array_disciplinas['id_disciplina'];
                            ?>
                                <option value="<?php echo $disciplina ?>"><?php echo $nome_disciplina; ?></option>
                            <?php
                            }

                            ?>
                        </select>
                        <input type="hidden" name="id_disciplina" value="<?php $disciplina ?>" />
                        <div class="center">
                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                                <i class="material-icons left">check</i>Acessar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="modalFeedback" class="modal">
            <div class="modal-content">
                <h4 class="center">Digite o Problema que Occoreu</h4><br>
                <div id="novaMensagem">
                    <form action="php/enviarMensagem/enviarFeedback.php" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                                <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                            </div>
                        </div>
                        <div class="center">
                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                                <i class="material-icons left">send</i>Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </header>