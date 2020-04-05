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
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="node_modules/animate.css/animate.min.css" />

  <!-- Arquivo CSS -->
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/index.css" />

</head>

<body class="containerLoginGlobal">

  <div class="container">
    <div class="row">
      <div class="col l6 m8 s12 offset-l3 offset-m2">
        <div class="card-panel z-depth-5 formLogin animated fadeIn">
          <form action="php/novaSenha.php" method="post" autocomplete="off">
            <h4 class="center">Redefinição de Senha</h4>
            <div class="input-field">
              <input name="email" type="email" placeholder="Digite seu email" class="inputDark">
            </div>
            <div class="input-field right-align">
              <input name="novaSenha" type="password" placeholder="Digite sua nova senha" class="inputDark">
            </div>
            <div class="input-field right-align">
              <input name="confirmarSenha" type="password" placeholder="Digite novamente a senha" class="inputDark">
            </div>
            <div class="right-align">
              <button class="btn btn-flat waves-effect waves-light btnDark" type="submit" name="action">
                Concluir
              </button>
            </div>
          </form>
        </div>
    
      </div>
    </div>
  </div>

  <!-- Bibliotecas JS -->
  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
  <script src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script><script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

  <!-- Arquivo JS -->
  <script src="js/index.js"></script>


</body>

</html>
