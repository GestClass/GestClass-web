<?php
session_start();
require_once 'reqAluno.php';
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
            <i class="fas fa-chart-line fa-6x blue-icon"></i>
            <h5>Rendimento Escolar</h5>
            <p>Acesso presença do aluno,  atividades desempenhadas e gráficos de rendimentos .</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="boletimVisualizacao.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-list-ol fa-6x blue-icon"></i>
            <h5>Boletim Escolar</h5>
            <p>Acesso a notas </p>
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
            <i class="fas fa-list-alt fa-6x blue-icon"></i>
            <h5>Grade Escolar</h5>
            <p>Visualização dos horários de aulas, nome dos professores, lista de chamada</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-snowboarding fa-6x blue-icon"></i>
            <h5>Atividade Extracurriculares</h5>
            <p>Aulas complementares, como natação, treinos, atividades comunitarias</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-bell fa-6x blue-icon"></i>
            <h5>Notificações</h5>
            <p>Recebimento de notificações, como a dispensa antes do horário, advertências, ocorrências,
              suspensões, etc..</p>
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
          data-tooltip="Boletim Escolar"><i class="material-icons">format_list_numbered_rtl</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left"
          data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>

<?php require_once 'reqFooter.php' ?>
