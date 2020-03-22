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
      echo "Login diretor efetuado";
    }
    else{
      $query = $conn->prepare("select email,senha from secretario where email=:email and senha=:senha");
      $query->bindValue(":email",$email);
      $query->bindValue(":senha",$senha);
      $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      if($query->rowCount()>0){
        echo "<script>alert('Secretario logado com sucesso :)');
                  window.location = '../homeSecretaria.php'
                  </script>";
      }
      else {
        $query = $conn->prepare("select email,senha from professor where email=:email and senha=:senha");
        $query->bindValue(":email",$email);
        $query->bindValue(":senha",$senha);
        $query->execute();

        if($query->rowCount()>0){
          echo "Login professor efetuado";
        }
        else {
          $query = $conn->prepare("select email,senha from aluno where email=:email and senha=:senha");
          $query->bindValue(":email",$email);
          $query->bindValue(":senha",$senha);
          $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          if($query->rowCount()>0){
            echo "Login aluno efetuado";
          }

          else {
              $query = $conn->prepare("select email,senha from responsavel where email=:email and senha=:senha");
              $query->bindValue(":email",$email);
              $query->bindValue(":senha",$senha);
              $query->execute();
              $dados = $query->fetch(PDO::FETCH_ASSOC);

              if($query->rowCount()>0){
                echo "Login responsavel efetuado";
              }
              else {
                $query = $conn->prepare("select email,senha from admin where email=:email and senha=:senha");
                $query->bindValue(":email",$email);
                $query->bindValue(":senha",$senha);
                $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);
    
                if($query->rowCount()>0){
                  echo "<script>alert('Admin logado com sucesso :)');
                  window.location = '../homeAdmGest.php'
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