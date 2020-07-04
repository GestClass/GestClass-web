<?php
require_once 'reqProfessor.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

?>

<script src="js/jquery.js"></script>

<section class="section center">
  <div class="container">
    <div class="row">
      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalTurma">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-clipboard-list fa-6x blue-icon"></i>
            <h5>Chamada</h5>
            <p>Realização e modificação da chamada</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalTurmaBoletim">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-list-ol  fa-6x blue-icon"></i>
            <h5>Boletim Escolar</h5>
            <p>Adição e alteração de notas</p>
          </div>
        </a>
      </div>

      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalOcorrencias">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-clipboard fa-6x blue-icon"></i>
            <h5>Ocorrências</h5>
            <p>Realização de ocorrências relatando aos responsáveis problemas com alunos</p>
          </div>
        </a>
      </div>

      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalListaAlunos">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-list-alt fa-6x blue-icon"></i>
            <h5>Listas de alunos</h5>
            <p>Visualização das listas de alunos</p>
          </div>
        </a>
      </div>

      <div class="col s12 m4">
        <a href="calendario.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-calendar-check fa-6x blue-icon"></i>
            <h5>Calendário Escolar</h5>
            <p>Adesão, remoção e alteração de atividades no calendário</p>
          </div>
        </a>
      </div>
      <?php

      $query_mensagem = $conn->prepare("SELECT *
      FROM professor AS P 
      JOIN contato AS C ON P.id_professor = C.fk_recebimento_professor_id_professor and P.id_professor = {$id_usuario} WHERE notificacao = 0 ORDER BY data_mensagem DESC;");
      $query_mensagem->execute();
      $notificacao = $query_mensagem->rowCount();


      ?>

      <div class="col s12 m4">
        <a href="mensagensProfessor.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-envelope fa-6x blue-icon"></i><span class="notifi center-align"><?php echo $notificacao ?></span>
            <h5>Mensagens</h5>
            <p>Envio e recebebimento de mensagens de secretaria, diretores, alunos ou turmas</p>
          </div>
        </a>
      </div>

    </div>
  </div>

  <div id="modalTurma" class="modal">
    <div class="modal-content">
      <div class="input-field col s12 validate">
        <form action="selectDisciplinaChamada.html.php" method="POST">
          <h5 class="center">Seleciona a turma:</h5>
          <div class='select'>
            <select name="turma">
              <option value="" disabled selected>Selecione a Turma</option>
          </div>
          <?php
          $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
          $query_select_turmas_professor->execute();

          while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

            $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
            $query_select_turma->execute();

            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
              $nome_turma = $dados_turma_nome["nome_turma"];
          ?>
              <option value="<?php echo $id_turma ?>"><?php echo $nome_turma; ?></option>
          <?php
            }
          }
          ?>
          </select>
      </div>
      <div class="center">
        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
          <i class="material-icons left">search</i>Pesquisar
        </button>
      </div>
      </form>
    </div>
  </div>


  </div>
  <div id="modalTurmaBoletim" class="modal">
    <div class="modal-content">
      <div class="input-field col s12 validate">
        <form action="selectDisciplinaBoletim.html.php" method="POST">
          <h5 class="center">Seleciona a turma:</h5>
          <div class='select'>
            <select name="turma">
              <option value="" disabled selected>Selecione a Turma</option>
          </div>
          <?php
          $query_select_turmas_professor = $conn->prepare("SELECT turma.nome_turma AS nome_turma, turma.ID_turma AS id_turma FROM turmas_professor  INNER JOIN turma ON (fk_id_turma_professor_turmas_professor = ID_turma) WHERE fk_id_professor_turmas_professor = $id_usuario");
          $query_select_turmas_professor->execute();

          while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {
            $nome_turma = $dados_turmas_professor['nome_turma'];
            $id_turma = $dados_turmas_professor['id_turma'];

          ?>
            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma; ?></option>
          <?php

          }
          ?>
          </select>
      </div>
      <div class="center">
        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
          <i class="material-icons left">search</i>Pesquisar
        </button>
      </div>
      </form>
    </div>
  </div>
  </div>

  <section class="floating-buttons">
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large light-blue lighten-1">
        <i class="large material-icons">add</i>
      </a>
      <ul>
        <li><a href="#modalTurma" class="modal-trigger btn-floating black tooltipped" data-position="left" data-tooltip="Chamada"><i class="material-icons">assignment</i></a></li>
        <li><a href="#modalTurmaBoletim" class="modal-trigger btn-floating tooltipped" data-position="left" data-tooltip="Boletim Escolar"><i class="material-icons">format_list_numbered_rtl</i></a></li>
        <li><a href="#modalOcorrencias" class="modal-trigger btn-floating red tooltipped" data-position="left" data-tooltip="Ocorrências"><i class="material-icons">assignment_late</i></a></li>
        <li><a href="#modalListaAlunos" class="modal-trigger btn-floating brown tooltipped" data-position="left" data-tooltip="Lista de alunos"><i class="material-icons">list_alt</i></a></li>
        <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
        <li><span class="notifi center-align"><?php echo $notificacao ?></span><a href="mensagensProfessor.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
        <li><a href="#modalFeedback" class="modal-trigger btn-floating light-blue lighten-2 tooltipped" data-position="left" data-tooltip="Relate um Problema"><i class="material-icons">support_agent</i></a></li>
        <!-- <li><a href="mensagensDiretor.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li> -->
      </ul>
    </div>
  </section>

  <script src="js/boletimCadastro.js"></script>

  <?php require_once 'reqFooter.php' ?>