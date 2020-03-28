<?php
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
    $query = $conn->prepare("select email,senha from diretor where email=:email and senha=:senha");
    $query->bindValue(":email",$email);
    $query->bindValue(":senha",$senha);
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount()>0){
      echo "<script>alert('Diretor logado com sucesso :)');
                  window.location = '../homeDiretor.html.php'
                  </script>";
    }
    else{
      $query = $conn->prepare("select email,senha from secretario where email=:email and senha=:senha");
      $query->bindValue(":email",$email);
      $query->bindValue(":senha",$senha);
      $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      if($query->rowCount()>0){
        echo "<script>alert('Secretario logado com sucesso :)');
                  window.location = '../homeSecretaria.html.php'
                  </script>";
      }
      else {
        $query = $conn->prepare("select email,senha from professor where email=:email and senha=:senha");
        $query->bindValue(":email",$email);
        $query->bindValue(":senha",$senha);
        $query->execute();

        if($query->rowCount()>0){
          echo "<script>alert('Professor logado com sucesso :)');
          window.location = '../homeProfessor.html.php'
          </script>";
        }
        else {
          $query = $conn->prepare("select email,senha from aluno where email=:email and senha=:senha");
          $query->bindValue(":email",$email);
          $query->bindValue(":senha",$senha);
          $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          if($query->rowCount()>0){
            echo "<script>alert('Aluno logado com sucesso :)');
            window.location = '../homeAluno.html.php'
            </script>";
          }

          else {
              $query = $conn->prepare("select email,senha from responsavel where email=:email and senha=:senha");
              $query->bindValue(":email",$email);
              $query->bindValue(":senha",$senha);
              $query->execute();
              $dados = $query->fetch(PDO::FETCH_ASSOC);

              if($query->rowCount()>0){
                echo "<script>alert('Responsável logado com sucesso :)');
                window.location = '../homePais.html.php'
                </script>";
              }
              else {
                $query = $conn->prepare("select email,senha from admin where email=:email and senha=:senha");
                $query->bindValue(":email",$email);
                $query->bindValue(":senha",$senha);
                $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);
    
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