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
        <div class="avisoEscolaContainer card-panel z-depth-5  animated fadeIn">
        <img class="img" src="assets/alerta.png"/>
            <h4 class="center">Atenção</h4>
            <h6 class="mensagem">Não possivel completar o seu login, pois a escola associada encontrasse desativada para uso, entre em contato o mais breve possivel ;)</h6>
            <div class="right-align">
              <button class="btn btn-flat waves-effect waves-light btnDarkAviso" type="submit" name="action" onclick="window.location.href='login.html.php'">
                Ok
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
