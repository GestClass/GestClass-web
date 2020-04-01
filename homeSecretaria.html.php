<?php
session_start();
require_once 'reqHeader.php';
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

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
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-chalkboard-teacher fa-6x blue-icon"></i>
            <h5>Professores</h5>
            <p>Acesso total a dados dos professores, atribuição de classes, alterações de dados, etc</p>
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
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-bell fa-6x blue-icon"></i>
            <h5>Notificações</h5>
            <p>Envio de notificações para pais e alunos, como a dispensa antes do horário, advertências, ocorrências,
              suspensões, etc..</p>
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
      <li><a href="cadastroContas.html.php" class="btn-floating black tooltipped" data-position="left" data-tooltip="Cadastro Contas"><i class="material-icons">person</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating blue-grey darken-4 tooltipped" data-position="left" data-tooltip="Chat"><i class="material-icons">chat</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>

<?php require_once 'reqFooter.php' ?>
