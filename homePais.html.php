<?php

require_once 'reqPais.php';
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
        <a class="modal-trigger" href="#modalGraficos">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-chart-line fa-6x blue-icon"></i>
            <h5>Rendimento Escolar</h5>
            <p>Acesso a frequência do aluno, atividades desempenhadas e gráficos de rendimentos .</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalFilhos">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-list-ol fa-6x blue-icon"></i>
            <h5>Boletim Escolar</h5>
            <p>Visualização de notas do aluno</p>
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
        <a class="modal-trigger" href="#modalChat">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-comment-dots fa-6x blue-icon"></i>
            <h5>Mensagens</h5>
            <p>Envio e recebebimento de mensagens de professores, secretaria e diretores</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a class="modal-trigger" href="#modalNotif">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-bell fa-6x blue-icon"></i>
            <h5>Notificações</h5>
            <p>Central de notificações</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
<div id="modalChat" class="modal ">
  <div class="modal-content">
    <h4 class="center"> <i class="material-icons right">vpn_key</i>Validação de Segurança</h4>
    <div class="input-field col s12 validate">
      <form action="php/pinNotif.php" method="POST">
        <input placeholder="Digite o seu pin de acesso" id="first_name" name="pin" value="pin" type="number" class="validate" />
        <div class="center">
          <a class="btn-flat btnLightBlue1 centerr" href="#modalPin">Esqueceu o PIN?</a>
          <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
            <i class="material-icons left">verified_user</i>Entrar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="modalNotif" class="modal ">
  <div class="modal-content">
    <h4 class="center"> <i class="material-icons right">vpn_key</i>Validação de Segurança</h4>
    <div class="input-field col s12 validate">
      <form action="php/pinChat.php" method="POST">
        <input placeholder="Digite o seu pin de acesso" id="first_name" name="pin" value="pin" type="number" class="validate" />
        <div class="center">
          <a class="btn-flat btnLightBlue1 centerr" href="#modalPin">Esqueceu o PIN?</a>
          <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
            <i class="material-icons left">verified_user</i>Entrar
          </button>
        </div>


      </form>
    </div>
  </div>
</div>
<div id="modalPin" class="modal ">
  <div class="modal-content">
    <h4 class="center"><i class="material-icons right">vpn_key</i>Esqueceu o seu PIN?</h4>
    <div class="input-field col s12 validate">
      <form action="php/esqPin.php" method="POST">
        <h5 class="center">Não se preocupe, estamos aqui para te ajudar! Digite o seu email para recupera-lo:</h5>
        <input placeholder="Digite o seu email" id="first_name" name="email" type="text" class="validate" />
        <input type="hidden" name="recuperarPin" value="Recuperar Pin" />
        <button class="btn waves-effect blue lighten-1" type="Enviar" name="action">Enviar
          <i class="material-icons right">lock_open</i>
        </button>
      </form>
    </div>
  </div>
</div>

<div id="modalGraficos" class="modal ">
  <div class="modal-content">
    <h4 class="center"><i class="material-icons right">school</i>Rendimento Escolar</h4>
    <div class="input-field col s12 validate">
      <form action="graficoRendimento.php" method="POST">
        <h5 class="center">Seleciona a matéria desejada para acompanhar o rendimento do seu filho:</h5>
        <select name="disciplinas">
          <h4>Selecione o tipo de conta</h4>
          <option value="" disabled selected>Selecione a Turma</option>
          <?php
          $id_escola = $_SESSION["id_escola"];
          $query_select_id = $conn->prepare("SELECT ID_disciplina FROM disciplina WHERE $id_escola ORDER BY `ID_disciplina` DESC LIMIT 10 ");
          $query_select_id->execute();

          while ($dados_id = $query_select_id->fetch(PDO::FETCH_ASSOC)) {
            $id_disciplina = $dados_id['ID_disciplina'];
            $query_select_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
            $query_select_nome->execute();
            while ($dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC)) {
              $nome = $dados_nome['nome_disciplina'];

          ?>
              <option value="<?php echo $id_disciplina ?>"><?php echo $nome; ?></option>
          <?php
            }
          }
          ?>
        </select>


        <input type="hidden" name="id_disciplina" value="<?php $id_disciplina ?>" />
        <button class="btn waves-effect blue lighten-1" type="Enviar" name="action">Acessar
          <i class="material-icons right">check</i>
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
      <li><a href="paginaManutencao.php" class="btn-floating black tooltipped" data-position="left" data-tooltip="Gráfico de rendimento"><i class="material-icons">trending_up</i></a></li>
      <li><a href="paginaManutencao.php" class="btn-floating yellow darken-4 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
      <li><a href="mensagensResponsavel.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
      <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
    </ul>
  </div>
</section>



<div id="modalFilhos" class="modal">
  <div class="modal-content">
    <div class="input-field col s12 validate">
      <form action="boletimVisualizacao.html.php" method="POST">
        <h4>Selecione o filho desejado</h4>
        <select name="filhos">
          <option value="" disabled selected>Selecionar filho</option>
          <?php

          $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario");
          $query_select_filhos_responsavel->execute();
          print_r($query_select_filhos_responsavel);

          while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

            $nome_aluno = $filhos["nome_aluno"];
            $ra = $filhos["RA"];

          ?>
            <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
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
  </div>
</div>



<?php require_once 'reqFooter.php' ?>