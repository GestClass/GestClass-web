<?php require_once 'reqHeader.php' ?>

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
            <h5>Calendario Escolar</h5>
            <p>Adesão de eventos ao calendário de atividades acadêmicas</p>
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
        <a href="cadastro.php">
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
</section>

<section class="floating-buttons">
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large light-blue lighten-1">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a href="paginaManutencao.php" class="btn-floating black tooltipped" data-position="left"
          data-tooltip="Gráfico de rendimento"><i class="material-icons">insert_chart</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left"
          data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating blue-grey darken-4 tooltipped" data-position="left"
          data-tooltip="Chat"><i class="material-icons">chat</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left"
          data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>

<?php require_once 'reqFooter.php' ?>