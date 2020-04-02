<?php
  // session_start();
  include_once 'conexao.php';

  $email=$_POST['emailLogin'];
  $senha=$_POST['senhaLogin'];

  if($senha == "" || $email == "") {
    echo "<script>alert('Prencha os campos, por favor');
    history.back();
    </script>";
    exit();
  }
  else if($email != "" || $senha != ""){

    $query = $conn->prepare("select email,senha,ID_diretor,fk_id_tipo_usuario_diretor,fk_id_escola_diretor from diretor where email=:email and senha=:senha");

    $query->bindValue(":email",$email);
    $query->bindValue(":senha",$senha);
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    // session_start();
    $_SESSION["id_usuario"] = $dados["ID_diretor"];
    $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_diretor"];
    $_SESSION["id_escola"] = $dados["fk_id_escola_diretor"];


    if($query->rowCount()>0){
      echo "<script>alert('Diretor logado com sucesso :)');
                  window.location = '../homeDiretor.html.php'
                  </script>";
    }
    else{
      $query = $conn->prepare("select email,senha, ID_secretario, fk_id_tipo_usuario_secretario, fk_id_escola_secretario from secretario where email=:email and senha=:senha");
      $query->bindValue(":email",$email);
      $query->bindValue(":senha",$senha);
      $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      // session_start();
      $_SESSION["id_usuario"] = $dados["ID_secretario"];
      $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_secretario"];
      $_SESSION["id_escola"] = $dados["fk_id_escola_secretario"];

      if($query->rowCount()>0){
        echo "<script>alert('Secretario logado com sucesso :)');
                  window.location = '../homeSecretaria.html.php'
                  </script>";
      }
      else {
        $query = $conn->prepare("select email,senha, ID_professor,fk_id_tipo_usuario_professor, fk_id_escola_professor from professor where email=:email and senha=:senha");
        $query->bindValue(":email",$email);
        $query->bindValue(":senha",$senha);
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        // session_start();
        $_SESSION["id_usuario"] = $dados["ID_professor"];
        $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_professor"];
        $_SESSION["id_escola"] = $dados["fk_id_escola_professor"];

        if($query->rowCount()>0){
          echo "<script>alert('Professor logado com sucesso :)');
          window.location = '../homeProfessor.html.php'
          </script>";
        }
        else {
          $query = $conn->prepare("select email,senha, RA,fk_id_tipo_usuario_aluno, fk_id_escola_aluno from aluno where email=:email and senha=:senha");
          $query->bindValue(":email",$email);
          $query->bindValue(":senha",$senha);
          $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          // session_start();
          $_SESSION["id_usuario"] = $dados["RA"];
          $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_aluno"];
          $_SESSION["id_escola"] = $dados["fk_id_escola_aluno"];

          if($query->rowCount()>0){
            echo "<script>alert('Aluno logado com sucesso :)');
            window.location = '../homeAluno.html.php'
            </script>";
          }

          else {
              $query = $conn->prepare("select email,senha, ID_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel from responsavel where email=:email and senha=:senha");
              $query->bindValue(":email",$email);
              $query->bindValue(":senha",$senha);
              $query->execute();
              $dados = $query->fetch(PDO::FETCH_ASSOC);

              // session_start();
              $_SESSION["id_usuario"] = $dados["ID_responsavel"];
              $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_responsavel"];
              $_SESSION["id_escola"] = $dados["fk_id_escola_responsavel"];

              if($query->rowCount()>0){
                echo "<script>alert('Responsável logado com sucesso :)');
                window.location = '../homePais.html.php'
                </script>";
              }
              else {
                $query = $conn->prepare("select email,senha, ID_admin, fk_id_tipo_usuario_admin from admin where email=:email and senha=:senha");
                $query->bindValue(":email",$email);
                $query->bindValue(":senha",$senha);
                $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);

                // session_start();
                $_SESSION["id_usuario"] = $dados["ID_admin"];
                $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_admin"];

                if($query->rowCount()>0){
                  echo "<script>alert('Admin logado com sucesso :)');
                  window.location = '../homeAdmGest.html.php'
                  </script>";
                }else if (($dados["email"] == $email) || ($dados["senha"] != $senha)) {
                  echo "<script>alert('Email ou senha está incorreto');
                  history.back();
                  </script>";
                  exit();
              }
            }
          }
        }
      }
    }
  }
?>
