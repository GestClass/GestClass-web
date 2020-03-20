<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>Perfil - GestClass</title>
  <link rel="icon" href="assets/icon/logo.png" />

  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/perfil.css" />

</head>

<body>

  <?php require_once 'reqMenu.php' ?>

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col s12 m10 l6 offset-m1 offset-l3">
          <div class="card-panel z-depth-4 formPerfil">
            <form action="" enctype="multipart/form-data">
              <h3>Dados Pessoais</h3>
              <div class="input-field">
                <img class="materialboxed imagePreview" width="100%" />
              </div>
              <div class="file-field input-field">
                <div class="btn-flat btn-large btnDarkFill btnBlock">
                  <span>Selecionar foto</span>
                  <input type="file" onchange="imagePreview()" class="inputFoto" name="fotoPerfil">
                </div>
                <div class="descFoto">
                  <input class="file-path" type="text">
                </div>
              </div>
              <div class="input-field">
                <input type="text" autocomplete="off" placeholder="Nome completo" class="inputDark" name="nomePerfil" />
              </div>
              <div class="input-field">
                <input type="text" autocomplete="off" placeholder="Email" class="inputDark" name="emailPerfil"/>
              </div>
              <div class="input-field">
                <input type="password" autocomplete="off" placeholder="Senha" onkeyup="contagemCarac()" class="inputDark senhaPerfil" name="senhaPerfil"/>
                <span onclick="verSenha()" class="fa fa-fw fa-eye iconVerSenha btnVerSenha grey-text text-darken-4 right"></span>
                <span class="helper-text red-text" id="spanSenha"></span>
              </div>
              <div class="input-field input-field-btn">
                <button type="submit" class="btn-flat btn-large btnDark btnBlock">Salvar alterações <i class="far fa-save"></i>
              </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
  <script src="js/homeSecretaria.js"></script>
  <script src="js/perfil.js"></script>

</body>

</html>