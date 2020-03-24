<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>GestClass - A gestão na palma da sua mão</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <!-- Bibliotecas CSS -->
  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Arquivo CSS -->
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/index.css" />

</head>

<body class="containerLoginGlobal">

  <div class="container">
    <div class="row">
      <div class="col l6 m8 s12 offset-l3 offset-m2">
        <div class="card-panel z-depth-5 formLogin">
          <a href="index.php"><i class="fas fa-chevron-left"></i> Voltar</a>
          <form action="php/login.php" method="post" autocomplete="off">
            <h4>Faça seu login</h4>
            <div class="input-field">
              <input name="emailLogin" type="email" placeholder="Email" class="inputDark">
            </div>
            <div class="input-field right-align">
              <input name="senhaLogin" type="password" placeholder="Senha" class="inputDark">
              <a class="linkAzul" onclick="toggleLoginRecupera()">Esqueci minha senha</a>
            </div>
            <div class="right-align">
              <button class="btn btn-flat waves-effect waves-light btnDark" type="submit" name="action">
                Logar
              </button>
            </div>
          </form>
        </div>
        <div class="card-panel z-depth-5 formRecuperarSenha hide">
          <a href="index.php"><i class="fas fa-chevron-left"></i> Voltar</a>
          <form action="php/esqSenha.php" method="post">
            <h4>Esqueceu sua senha?</h4>
            <p>
              Não se preocupe! Insira o seu email de cadastro e enviaremos instruções para você.
            </p>
            <div class="input-field right-align">
              <input type="text" class="inputDark" name="email" placeholder="Email" />
              <input type="hidden" name="recuperarSenha" value="Recuperar Senha"/>
              <a class="linkAzul" onclick="toggleLoginRecupera()">Lembrei minha senha</a>
            </div>
            <div class="right-align">
              <button class="btn btn-flat waves-effect waves-light btnDark" type="submit" name="action">
                Enviar solicitação
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