<?php

require_once 'reqDiretor.php';


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
            <p>Acesso aos dados dos alunos, efetuação e remoção de matriculas, mensalidade, lista de alunos</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-file-invoice-dollar fa-6x blue-icon"></i>
            <h5>Mensalidade</h5>
            <p>Acesso total aos dados da mensalidade dos alunos. </p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
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
        <a href="perfil.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-cog fa-6x blue-icon"></i>
            <h5>Configurações</h5>
            <p>Configurações da conta</p>
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
          <option value="1">Aluno</option>
          <option value="2">Responsável</option>
          <option value="3">Responsável Cadastrado</option>
          <option value="4">Professor</option>
          <option value="5">Secretaria</option>
        </select>
      </div>

      <form action="" class="formContas" id="respcadastrado" method="POST">
        <div class="row col s12">
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix blue-icon">ballot</i>
            <input id="cpf" type="tel" placeholder="154.258.963-22" data-mask="000.000.000-00" class="validate">
            <label id="lbl" for="icon_telephone">CPF</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix blue-icon">ballot</i>
            <input id="fk_ra_aluno_responsavel" type="tel" placeholder="8956478-9" data-mask="0000000-0" class="validate">
            <label id="lbl" for="icon_telephone">RA aluno</label>
          </div>
          <div class="input-field right">
            <button name="btncadastrar" value="fomrSecretaria" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<section class="floating-buttons">
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large light-blue lighten-1">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Cadastrar Turmas"><i class="material-icons">book</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating black tooltipped" data-position="left" data-tooltip="Gráfico de rendimento"><i class="material-icons">insert_chart</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating blue-grey darken-4 tooltipped" data-position="left" data-tooltip="Chat"><i class="material-icons">chat</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>

<div id="modalListaAlunos" class="modal">
  <div class="modal-content">
    <h4>Selecione a turma</h4>
    <div class="input-field col s12">
      <form action="listaAlunos.html.php" method="POST">
        <select name="turmas">
          <option value="" disabled selected>Selecione a Turma</option>
          <?php

          $query_select_turmas_escola = $conn->prepare("SELECT nome_turma, ID_turma FROM turma WHERE fk_id_escola_turma = $id_escola");
          $query_select_turmas_escola->execute();

          while ($dados_turmas_escola = $query_select_turmas_escola->fetch(PDO::FETCH_ASSOC)) {

            $nome_turma = $dados_turmas_escola["nome_turma"];
            $id_turma = $dados_turmas_escola["ID_turma"];

          ?>
            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma ?></option>
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

<?php require_once 'reqFooter.php' ?>