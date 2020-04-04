<!DOCTYPE html>

    <body class="body_estilizado">
        <?php
            include_once 'php/conexao.php';

            $id_usuario = $_SESSION["id_usuario"];
            $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
            $id_escola = $_SESSION["id_escola"];

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


        