<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/paginaManutencao.css" />

</head>

<body>

<?php 
      include_once 'php/conexao.php';

      $id_usuario = $_SESSION["id_usuario"];
      $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
      $id_escola = $_SESSION["id_escola"];

      if ($id_tipo_usuario == 1) {
          require_once 'reqAdmGest.php';
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

    <section class="section sectionError center">
      <img class="gear" src="assets/img/compass.svg" alt="manutencao">

      <h3>Está paginá está em desenvolvimento</h3>
    </section>


    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/paginaManutencao.js"></script>
    <script src="js/default.js"></script>

</body>
</html>
