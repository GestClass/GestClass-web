<?php
// session_start();
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$query = $conn->prepare("select * from professor where id_professor=$id_usuario");
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);

$nomeProf = $dados['nome_professor'];

$nome = Explode(" ", $nomeProf);
$nome_prof = $nome[0];


?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>GestClass - Is Cool Manage</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <link rel="stylesheet" type="text/css" href="css/homeProfessor.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/animate.css/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="node_modules/aos/dist/aos.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />




</head>

<body>

  <header>
    <div class="navbar-fixed">
      <nav class="light-blue lighten-1">
        <div class="container">
          <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">clear_all</i></a>
            <a href="homeProfessor.html.php" class="brand-logo"><i class="fas fa-drafting-compass"></i>
              <span class="hide-on-small-only">GestClass<span></a>

            <ul class="right">
              <li>
                <a class="transparent hide-on-small-only" disable>Olá
                  <?php echo $nome_prof ?></a>
              </li>
              <?php if (empty($dados['foto'])) { ?>
                <li>
                  <a href="perfil.html.php" class="transparent hide-on-small-only">
                    <img class="circle icon-user" width="50px" height="50px" src="assets/imagensBanco/usuario.png">
                  </a>
                </li>
              <?php } else { ?>
                <li>
                  <a href="perfil.html.php" class="transparent hide-on-small-only">
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
          <a href="perfil.html.php"><span class="white-text name"><?php echo $nome_prof ?></span></a>
          <a href="perfil.html.php"><span class="white-text email"><?php echo $dados['email'] ?></span></a>
        </div>
      </li>
      <li><a href="homeProfessor.html.php"><i class="material-icons">home</i>Início</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a href="#modalTurma" class="modal-trigger"><i class="material-icons">assignment</i>Chamada</a></li>
      <li><a href="#modalTurmaBoletim" class="modal-trigger"><i class="material-icons">format_list_numbered_rtl</i>Boletim Escolar</a></li>
      <li><a class="waves-effect modal-trigger" href="#modalOcorrencias"><i class="material-icons">assignment_late</i>Ocorrências</a></li>
      <li><a href="#modalListaAlunos" class="modal-trigger"><i class="material-icons">list_alt</i>Lista de alunos</a>
      <li><a href="calendario.html.php"><i class="material-icons">event</i>Calendário Escolar</a></li>
      <li><a href="mensagensProfessor.html.php"><i class="material-icons">email</i>Caixa de Mensagens</a></li>
      <li><a href="#modalFeedback" class="modal-trigger"><i class="material-icons">support_agent</i>Relte um Problema</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a href="php/logout.php"><i class="material-icons">input</i>Sair</a></li>
    </ul>

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

    <div id="modalTurmaBoletim" class="modal">
      <div class="modal-content">
        <h4 class="center">Selecione a Turma</h4>
        <div class="input-field col s12">
          <form action="selectDisciplinaBoletim.html.php" method="POST">
            <select name="turmas">
              <option value="" disabled selected>Selecionar Turma</option>
              <?php

              $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
              $query_select_turmas_professor->execute();

              while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                $query_select_turma->execute();

                while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                  $nome_turma = $dados_turma_nome["nome_turma"];

                  $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                  $query_turno->execute();

                  while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                    $id_turno = $dados_turno['fk_id_turno_turma'];

                    $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                    $query_turno_nome->execute();

                    while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                      $nome_turno = $dados_nome_turno['nome_turno'];

              ?>
                      <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
              <?php
                    }
                  }
                }
              } ?>
            </select>
            <br>
            <div class="center">
              <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                <i class="material-icons left">search</i>Pesquisar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>



    <div id="modalOcorrencias" class="modal">
      <div class="modal-content">
        <h4 class="center">Selecione a Turma</h4>
        <div class="input-field col s12">
          <form action="ocorrenciasProfessor.html.php" method="POST">
            <select name="turmas">
              <option value="" disabled selected>Selecionar Turma</option>
              <?php

              $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
              $query_select_turmas_professor->execute();

              while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                $query_select_turma->execute();

                while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                  $nome_turma = $dados_turma_nome["nome_turma"];

                  $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                  $query_turno->execute();

                  while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                    $id_turno = $dados_turno['fk_id_turno_turma'];

                    $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                    $query_turno_nome->execute();

                    while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                      $nome_turno = $dados_nome_turno['nome_turno'];

              ?>
                      <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
              <?php
                    }
                  }
                }
              } ?>
            </select>
            <br>
            <div class="center">
              <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                <i class="material-icons left">search</i>Pesquisar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="modalListaAlunos" class="modal">
      <div class="modal-content">
        <h4 class="center">Selecione a Turma</h4>
        <div class="input-field col s12">
          <form action="listaAlunos.html.php" method="POST">
            <select name="turmas">
              <option value="" disabled selected>Selecionar Turma</option>
              <?php

              $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
              $query_select_turmas_professor->execute();

              while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                $query_select_turma->execute();

                while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                  $nome_turma = $dados_turma_nome["nome_turma"];

                  $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                  $query_turno->execute();

                  while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                    $id_turno = $dados_turno['fk_id_turno_turma'];

                    $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                    $query_turno_nome->execute();

                    while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                      $nome_turno = $dados_nome_turno['nome_turno'];

              ?>
                      <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
              <?php
                    }
                  }
                }
              } ?>
            </select>
            <br>
            <div class="center">
              <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                <i class="material-icons left">search</i>Pesquisar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="modalTurma" class="modal">
      <div class="modal-content">
        <h4 class="center">Selecione a Turma</h4>
        <div class="input-field col s12">
          <form action="selectDisciplinaChamada.html.php" method="POST">
            <select name="turmas">
              <option value="" disabled selected>Selecionar Turma</option>
              <?php

              $query_select_turmas_professor = $conn->prepare("SELECT turmas_professor.fk_id_turma_professor_turmas_professor, turma.nome_turma, turno.nome_turno FROM turmas_professor INNER JOIN turma ON (fk_id_turma_professor_turmas_professor = ID_turma) INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE fk_id_professor_turmas_professor = $id_usuario");
              $query_select_turmas_professor->execute();

              while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];
                $nome_turma = $dados_turmas_professor["nome_turma"];
                $id_turno = $dados_turmas_professor['fk_id_turno_turma'];
                $nome_turno = $dados_turmas_professor['nome_turno'];

              ?>
                <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
              <?php
              }
              ?>
            </select>
            <br>
            <div class="center">
              <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                <i class="material-icons left">search</i>Pesquisar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </header>