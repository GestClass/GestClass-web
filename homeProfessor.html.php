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
            <p>Realização de ocorrências relatando aos pais problemas com alunos</p>
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

      <div class="col s12 m4">
        <a class="modal-trigger" href="mensagensProfessor.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-envelope fa-6x blue-icon"></i>
            <h5>Mensagens</h5>
            <p>Envio e recebebimento de mensagens de professores, secretaria e diretores</p>
          </div>
        </a>
      </div>

    </div>
  </div>

  <div id="modalTurma" class="modal">
    <div class="modal-content">
      <div class="input-field col s12 validate">
         <form action="selectDisciplinaChamada.html.php"  method="POST">
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
         <form action="selectDisciplinaBoletim.html.php"  method="POST">
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

<section class="floating-buttons">
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large light-blue lighten-1">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a href="#modalFeedback" class="modal-trigger btn-floating light-blue lighten-2 tooltipped" data-position="left" data-tooltip="Relate um Problema"><i class="material-icons">support_agent</i></a></li>
      <li><a href="#modalTurma" class="modal-trigger btn-floating black tooltipped" data-position="left" data-tooltip="Chamada"><i class="material-icons">assignment</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>

<div id="modalFeedback" class="modal">
  <div class="modal-content">
    <h4>Digite o Problema que occoreu</h4><br>
    <div id="novaMensagem">
      <form action="php/enviarMensagem/enviarFeedback.php" method="POST">
        <div class="row">
          <div class="input-field col s12">
            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
          </div>
        </div>
        <div class="input-field right">
          <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modalListaAlunos" class="modal">
  <div class="modal-content">
    <h4>Selecione a turma</h4>
    <div class="input-field col s12">
      <form action="listaAlunos.html.php" method="POST">
        <select name="turmas">
          <option value="" disabled selected>Selecione a Turma</option>
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
    <h4>Selecione a turma</h4>
    <div class="input-field col s12">
      <form action="ocorrenciasProfessor.html.php" method="POST">
        <select name="turmas">
          <option value="" disabled selected>Selecione a Turma</option>
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

<script src="js/boletimCadastro.js"></script>

<?php require_once 'reqFooter.php' ?>