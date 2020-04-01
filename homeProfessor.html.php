<?php
  require_once 'reqProfessor.php';

    // echo "id usuario ->".$id_usuario."</br>";
    // echo "id tipo usuario ->".$id_tipo_usuario."</br>";
    // echo "id escola ->".$id_escola."</br>";
?>

<section class="section center">
  <div class="container">
    <div class="row">
      <div class="col s12 m4">
        <a href="chamada.php.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-clipboard-list fa-6x blue-icon"></i>
            <h5>Chamada</h5>
            <p>Realização e modificação da chamada</p>
          </div>
        </a>
      </div>


      <div class="col s12 m4">
        <a href="boletimCadastro.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-list-ol  fa-6x blue-icon"></i>
            <h5>Boletim Escolar</h5>
            <p>Adição e alteração de notas</p>
          </div>
        </a>
      </div>

    <div class="col s12 m4">
      <a href="calendario.html.php">
        <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
          <i class="fas fa-clipboard fa-6x blue-icon"></i>
          <h5>Ocorrências</h5>
          <p>Realização de ocorrências relatando aos pais problemas com alunos</p>
        </div>
      </a>
    </div>

      <div class="col s12 m4">
        <a href="paginaManutencao.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-list-alt fa-6x blue-icon"></i>
            <h5>Listas de alunos</h5>
            <p>Visualização das listas de alunos</p>
          </div>
        </a>
      </div>

      <div class="col s12 m4">
        <a href="paginaManutencao.php">
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
            <i class="fas fa-comment-dots fa-6x blue-icon"></i>
            <h5>Chat</h5>
            <p>Envio e recebebimento de mensages para os alunos, responsáveis, secretaria e diretores</p>
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
      <li><a href="chamada.html.php" class="btn-floating black tooltipped" data-position="left"
          data-tooltip="Chamada"><i class="material-icons">assignment</i></a></li>
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
