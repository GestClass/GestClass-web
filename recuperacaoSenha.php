<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>Esqueci minha senha - GestClass</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <!-- Bibliotecas CSS -->
  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="node_modules/izimodal/css/iziModal.min.css">

  <!-- Arquivo CSS -->
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/recuperacaoSenha.css" />

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col s12 m10 l6 offset-m1 offset-l3">
        <div class="card-panel grey-text text-darken-4 formSenha z-depth-3">
          <form action="processaEsqueciSenha.php" method="post">
            <h3>Esqueceu sua senha?</h3>
            <p>
              Não se preocupe! Insira o seu CPF e seu email de cadastro e enviaremos instruções para você.
            </p>
            <div class="input-field">
              <input type="text" class="inputDark" name="cpf" placeholder="CPF" data-mask="000.000.000-00" />
            </div>
            <div class="input-field">
              <input type="text" class="inputDark" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <button type="submit" class="btn-flat btn-large btnDark btnBlock">
                Logar <i class="fas fa-user-check"></i>
              </button>
            </div>
            <div class="input-field">
              <p>Voltar para a <a href="index.php">home</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bibliotecas JS -->
  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
  <script src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
  <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

  <!-- Arquivo JS -->
  <script src="js/recuperacaoSenha.js"></script>


</body>

</html>