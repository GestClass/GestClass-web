<?php require_once 'reqHeader.php' ?>

<section class="section center">
  <div class="container">
    <div class="row">
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-chart-line fa-6x blue-icon"></i>
            <h5>Rendimento Escolar</h5>
            <p>Acesso a frequência do aluno,  atividades desempenhadas e gráficos de rendimentos .</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="boletimVisualizacao.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-book fa-6x blue-icon"></i>
            <h5>Boletim Escolar</h5>
            <p>Visualizaçõa de notas do aluno</p>
          </div>
        </a>
      </div>
    <div class="col s12 m4">
      <a href="calendario.html.php">
        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
          <i class="fas fa-calendar-check fa-6x blue-icon"></i>
          <h5>Calendário Escolar</h5>
          <p>Calendário de atividades acadêmicas</p>
        </div>
      </a>
    </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-file-invoice-dollar fa-6x blue-icon"></i>
            <h5>Financeiro</h5>
            <p>Emissão de segunda via de boleto</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-bell fa-6x blue-icon"></i>
            <h5>Notificações</h5>
            <p>Central de notificações</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-comment-dots fa-6x blue-icon"></i>
            <h5>Chat</h5>
            <p>Envio e recebebimento de mensages de professores, secretaia e diretores</p>
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
