<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>GestClass - A gestão na palma da sua mão</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />

</head>

<body>

  <?php require_once 'reqMenu.php' ?>

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
          <a href="calendario.php">
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
          <a href="perfil.php">
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

  <div id="modalCadastroContas" class="modal">
    <div class="modal-content">
      <h4>Selecione o tipo de conta</h4>
      <div class="input-field col s12">
        <select id="selectConta" onchange="habilitaForm()">
          <option value="" disabled selected>Contas</option>
          <option value="1">Alunos</option>
          <option value="2">Responsáveis</option>
          <option value="3">Professores</option>
          <option value="4">Secretaria</option>
        </select>
      </div>


      <form action="" class="formContas" id="aluno" method="post">
        <h3>Aluno</h3>
        <div class="scroll">
          <div class="container">
            <div class="input-field col s6">
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix">Nome</label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate">
              <label for="icon_telephone">Telefone</label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate">
              <label for="icon_telephone">Email</label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate">
              <label for="icon_telephone">RG</label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate">
              <label for="icon_telephone">CPF</label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate">
              <label for="icon_telephone">N° Matricula</label>
            </div>
            <div class="input-field right">
              <button type="submit" class="btn-flat btnDefaultFormContas">Cadastrar</button>
            </div>
          </div>
        </div>
    </div>
    </form>

    <form action="" class="formContas" id="responsavel" method="post">
      <h3>Responsavel</h3>
      <div class="scroll">
        <div class="container">
          <div class="input-field col s6">
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telefone</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Email</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">RG</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">CPF</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">CEP</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Rua</label>
          </div>
          <div class="input-field right">
            <button type="submit" class="btn-flat btnDefaultFormContas">Cadastrar</button>
          </div>
        </div>
      </div>
    </form>

    <form action="" class="formContas" id="professor" method="post">
      <h3>Professor</h3>
      <div class="scroll">
        <div class="container">
          <div class="input-field col s6">
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telefone</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Email</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">CPF</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">RG</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Titulo de Eleitor</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Carteira de Trabalho</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">CEP</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Rua</label>
          </div>
          <div class="input-field right">
            <button type="submit" class="btn-flat btnDefaultFormContas">Cadastrar</button>
          </div>
        </div>
      </div>
    </form>

    <form action="" class="formContas" id="secretria" method="post">
      <h3>Secretaria</h3>
      <div class="scroll">
        <div class="container">
          <div class="input-field col s6">
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telefone</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Email</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">RG</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">CPF</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Título Eleitoral</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">CEP</label>
          </div>
          <div class="input-field col s6">
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Rua</label>
          </div>
          <div class="input-field right">
            <button type="submit" class="btn-flat btnDefaultFormContas">Cadastrar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  </div>

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
        <li><a href="calendario.php" class="btn-floating blue tooltipped" data-position="left"
            data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
      </ul>
    </div>
  </section>


  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
  <script src="js/homeSecretaria.js"></script>
  <script src="js/default.js"></script>

</body>

</html>