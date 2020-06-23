<?php

require_once 'reqHeader.php';

// echo "id usuario ->".$id_usuario."</br>";
// echo "id tipo usuario ->".$id_tipo_usuario."</br>";
// echo "id escola ->".$id_escola."</br>";
?>

<section class="section center">
  <div class="container">
    <div class="row">
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="far fa-user fa-6x blue-icon"></i>
            <h5>Alunos</h5>
            <p>Acesso aos dados dos alunos, efetuação e remoção de matriculas, lista de alunos</p>
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
        <a href="listarProfessores.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-chalkboard-teacher fa-6x blue-icon"></i>
            <h5>Professores</h5>
            <p>Acesso total a dados dos professores, atribuição de classes, alterações de dados, etc</p>
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
        <a class="modal-trigger" href="#modalCadastroContas">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-address-book fa-6x blue-icon"></i>
            <h5>Cadastro de contas</h5>
            <p>Cadastro de novas contas ao aplicativo e remoção das mesmas, cadastro de novas contas de nível igual ou
              inferior</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalMensalidades">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-file-invoice-dollar fa-6x blue-icon"></i>
            <h5>Mensalidade</h5>
            <p>Acesso total aos dados da mensalidade dos alunos. </p>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div id="modalCadastroContas" class="modal">
    <div class="modal-content">
      <h4>Selecione o tipo de conta</h4>
      <div class="input-field col s12">
        <select id="selectConta" onchange="habilitaForm()">
          <option value="" disabled selected>Contas</option>
          <option value="1">Responsável/Aluno</option>
          <option value="2">Aluno</option>
          <option value="3">Professor</option>
          <option value="4">Secretaria</option>
        </select>
      </div>
    </div>
  </div>
</section>

<div id="modalAlterarTurmas" class="modal">
  <div class="modal-content">
    <h4 class="center">Selecione a turma para alterar</h4>
    <div class="input-field col s12">
      <form action="alteracaoTurmas.html.php" method="POST">
        <select name='turma'>
          <option value="" disabled selected>Turmas</option>
          <?php $query_turmas = $conn->prepare('SELECT * FROM turma WHERE fk_id_escola_turma = ' . $id_escola . '');
          $query_turmas->execute();
          while ($dados_turmas = $query_turmas->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $dados_turmas['ID_turma'] ?>"><?php echo $dados_turmas['nome_turma'] ?>
            </option><?php

                    } ?>

        </select>
        <br><br><br><br><br>

        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
          <i class="material-icons left">search</i>Pesquisar
        </button>

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
      <li><a href="#modalAlterarTurmas" class="modal-trigger btn-floating indigo accent-2 tooltipped" data-position="left" data-tooltip="Alterar turma dos alunos"><i class="material-icons">create</i></a></li>
      <li><a href="#modalGradeCurricular" class="modal-trigger btn-floating brown accent-2 tooltipped" data-position="left" data-tooltip="Atribuir grade curricular das turmas"><i class="material-icons">toc</i></a></li>
      <li><a href="#modalHorarioAulas" class="modal-trigger btn-floating grey tooltipped" data-position="left" data-tooltip="Cadastro Horário Aulas"><i class="material-icons">access_time</i></a></li>
      <li><a href="atribuicaoDisciplinas.html.php" class="btn-floating green tooltipped" data-position="left" data-tooltip="Atribuição de turmas e disciplinas"><i class="material-icons">import_contacts</i></a></li>
      <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Cadastrar Turmas"><i class="material-icons">book</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
      <li><a href="mensagensSecretaria.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>

<div id="modalHorarioAulas" class="modal">
  <div class="modal-content">
    <h4>Selecione a turma</h4>
    <form action="cadastroHorarioAulas.html.php" method="POST"><br>
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <label id="lbl" for="first_name">Nome do Horário</label>
          <input name="nome" id="nome" placeholder="Ex: Horário Manhã" type="text" class="validate">
        </div>
        <div class="input-field col s12 m6 l6">
          <select name="turno">
            <option value="" disabled selected>Selecione o Turno</option>
            <?php

            $query_select_turno = $conn->prepare("SELECT * FROM turno");
            $query_select_turno->execute();;

            while ($dados_turno = $query_select_turno->fetch(PDO::FETCH_ASSOC)) {
              $id_turno = $dados_turno["ID_turno"];
              $nome_turno = $dados_turno['nome_turno'];
            ?>
              <option value="<?php echo $id_turno ?>"><?php echo $nome_turno; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="center">
          <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
            <i class="material-icons left">send</i> Continuar
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

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

          $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
          $query_select_id_turma->execute();

          while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
            $id_turma = $dados_turma_id['ID_turma'];

            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
            $query_select_turma->execute();

            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
              $nome_turma = $dados_turma_nome['nome_turma'];

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

<div id="modalMensalidades" class="modal">
  <div class="modal-content">
    <h4>Selecione a turma</h4>
    <div class="input-field col s12">
      <form action="mensalidades.html.php" method="POST">
        <select name="turmas">
          <option value="" disabled selected>Selecione a Turma</option>
          <?php

          $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
          $query_select_id_turma->execute();

          while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
            $id_turma = $dados_turma_id['ID_turma'];

            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
            $query_select_turma->execute();

            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
              $nome_turma = $dados_turma_nome['nome_turma'];

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
<div id="modalGradeCurricular" class="modal">
    <div class="modal-content">
        <h4 class="center">Selecione os Dados</h4>
        <div class="input-field col s12">
            <form action="cadastroGradeCurricular.html.php" method="POST">
                <select name="turmas">
                    <option value="" disabled selected>Selecione a Turma</option>
                    <?php

                    $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE $id_escola");
                    $query_select_turma->execute();

                    while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                        $id_turma = $dados_turma['id_turma'];
                        $nome_turma = $dados_turma['nome_turma'];
                        $nome_turno = $dados_turma['nome_turno'];
                    ?>
                        <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <select name="padroes">
                    <option value="" disabled selected>Selecione o Padrão de Horários</option>
                    <?php

                    $query_select_padroes = $conn->prepare("SELECT ID_aula_escola, nome_padrao FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola GROUP BY nome_padrao");
                    $query_select_padroes->execute();

                    while ($dados_padroes = $query_select_padroes->fetch(PDO::FETCH_ASSOC)) {
                        $id_padrao = $dados_padroes['ID_aula_escola'];
                        $nome_padrao = $dados_padroes['nome_padrao'];
                    ?>
                        <option value="<?php echo $id_padrao; ?>"><?php echo $nome_padrao; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <select name="dia">
                    <option value="" disabled selected>Selecione o Dia da Semana</option>
                    <?php

                    $query_select_dias = $conn->prepare("SELECT ID_dia_semana, nome_dia FROM dia_semana ORDER BY ID_dia_semana ASC");
                    $query_select_dias->execute();

                    while ($dados_dias = $query_select_dias->fetch(PDO::FETCH_ASSOC)) {
                        $id_dia = $dados_dias['ID_dia_semana'];
                        $nome_dia = $dados_dias['nome_dia'];
                    ?>
                        <option value="<?php echo $id_dia; ?>"><?php echo $nome_dia; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once 'reqFooter.php' ?>