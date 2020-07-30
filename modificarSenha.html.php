<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Arquivo CSS -->
    <link href='css/core/main.min.css' rel='stylesheet' />
    <link href='css/daygrid/main.min.css' rel='stylesheet' />
    <link href='css/list/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/calendario.css" />

    <!-- Arquivo JS -->
    <script src='js/core/main.min.js'></script>
    <script src='js/core/locales/pt-br.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/list/main.min.js'></script>
    <script src='js/google-calendar/main.min.js'></script>

</head>

<body>

    <?php 
    // session_start();

    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
   
    if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';

    } else if($id_tipo_usuario == 2){
        require_once 'reqDiretor.php';
    }else if($id_tipo_usuario == 3){
        require_once 'reqHeader.php';
    }elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    }elseif ($id_tipo_usuario  == 5) {
        require_once 'reqAluno.php';
    }else {
        require_once 'reqPais.php';
    }


    ?>
    <div class="container">
    <div class="row">
      <div class="col l6 m8 s12 offset-l3 offset-m2">
        <div class="card-panel z-depth-5 formSenha animated fadeIn">
          <form action="php/alterarSenha.php" method="post" autocomplete="off">
            <h4 class="center">Alterar Senha</h4>
            <a href="perfil.html.php" class="">
                <img class="foto circle icon-user" width="120px" height="120px" src="assets/imagensBanco/<?php echo $dados['foto'] ?>">
            </a>
            <div class="input-field">
              <input name="antigaSenha" type="password" placeholder="Atual senha" class="inputDark" autofocus="true">
            </div>
            <div class="input-field">
              <input name="novaSenha" type="password" placeholder="Nova senha" class="inputDark" autofocus="true">
            </div>
            <div class="input-field right-align">
              <input name="confirmarSenha" type="password" placeholder="Redigite a nova senha" class="inputDark">
            </div>
            <div class="right-align">
              <button class="btn btn-flat waves-effect waves-light btnDark" type="submit" name="action">
                Alterar
              </button>
            </div>
          </form>
        </div>



    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/default.js"></script>
    <script src='js/calendario.js'></script>

</body>

</html>