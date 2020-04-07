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
        <a href="chamada.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-clipboard-list fa-6x blue-icon"></i>
            <h5>Chamada</h5>
            <p>Realização e modificação da chamada</p>
          </div>
        </a>
      </div>


      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalBoletimCadastro">
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
        <a class="modal-trigger" href="#modalListaAlunos">
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

<div id="modalBoletimCadastro" class="modal">
  <div class="modal-content">
    <h4>Selecione o tipo de conta</h4>
    <div class="input-field col s12">
      <select id="selectTurma" onchange="idTurma()">
        <option value="" disabled selected>Selecione a Turma</option>
        <?php
          $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
          $query_select_turmas_professor->execute();

          while($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)){

            $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
            $query_select_turma->execute();

            while($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)){
        ?>        
          <option value="<?php echo $id_turma?>"><?php echo $dados_turma_nome["nome_turma"]?></option>
          <?php
            }
          }
          ?>
      </select>
      <div class="input-field col s12 m6 l6 validate">
        <i class="material-icons prefix blue-icon">library_books</i>
        <select id="nome_tipo_turma" name="disciplina">
        <option value="" disabled selected>Selecione a Disciplina</option>
        <?php            

            $query_select_disciplinas_professor = $conn->prepare("SELECT fk_id_disciplina_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_professor_disciplinas_professor = $id_usuario");
            $query_select_disciplinas_professor->execute();

            while($dados_disciplinas_professor = $query_select_disciplinas_professor->fetch(PDO::FETCH_ASSOC)){
                $id_disciplina = $dados_disciplinas_professor["fk_id_disciplina_professor_aulas_professor"];

                $query_select_disciplina_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
                $query_select_disciplina_nome->execute();

                while($dados_disciplina_nome = $query_select_disciplina_nome->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $id_disciplina ?>"><?php echo $dados_disciplina_nome['nome_disciplina']  ?></option>
        <?php
                }
            }
        ?>
        </select>
      </div>
    </div>
  </div>
</div>

<div id="modalListaAlunos" class="modal">
  <div class="modal-content">
    <h4>Selecione a turma</h4>
    <div class="input-field col s12">
      <select id="selectTurma" onchange="listaAlunos()">
        <option value="" disabled selected>Selecione a Turma</option>
          <?php
        
            $query_select_turmas_escola = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
            $query_select_turmas_escola->execute();

            while($dados_turmas_escola = $query_select_turmas_escola->fetch(PDO::FETCH_ASSOC)){

              $id_turma = $dados_turmas_escola["fk_id_turma_professor_turmas_professor"];

              $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
              $query_select_turma->execute();

              while($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)){
          ?>
              <option value="<?php echo $id_turma?>"><?php echo $dados_turma_nome["nome_turma"]?></option>
          <?php
              } 
            }       
          ?>
      </select>
    </div>
  </div>
</div>

<script src="js/boletimCadastro.js"></script>
<?php require_once 'reqFooter.php' ?>
