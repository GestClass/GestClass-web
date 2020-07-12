<?php
require_once 'conexao.php';
$email = $_POST['email'];
$novaSenha=$_POST['novaSenha'];
$confirmarSenha=$_POST['confirmarSenha'];
 
  if( $email == "") {
    echo "<script>alert('Prencha o email, por favor');
    history.back();
    </script>";
    // exit();
  }
  else if($email != "" ){

    $query = $conn->prepare("select email,senha from diretor where email=:email and senha=:senha");

    $query->bindValue(":email",$email);
    $executa = $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount()>0){
        $query1 = $conn->prepare("update diretor set senha=:novaSenha where email=:email");
        $query1->bindValue(":email",$email);
        $query1->bindValue(":novaSenha",$novaSenha);
        $executa = $query1->execute();
    }
    else{
      $query = $conn->prepare("select email,senha from secretario where email=:email and senha=:senha");
      $query->bindValue(":email",$email);
      $executa = $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      if($query->rowCount()>0){
            $query1 = $conn->prepare("update secretario set senha=:novaSenha where email=:email");
            $query1->bindValue(":email",$email);
            $query1->bindValue(":novaSenha",$novaSenha);
            $executa = $query1->execute();
      }
      else {
        $query = $conn->prepare("select email,senha, ID_professor,fk_id_tipo_usuario_professor, fk_id_escola_professor from professor where email=:email and senha=:senha");
        $query->bindValue(":email",$email);
        $executa = $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount()>0){
                $query1 = $conn->prepare("update professor set senha=:novaSenha where email=:email");
                $query1->bindValue(":email",$email);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();
        }
        else {
          $query = $conn->prepare("select email,senha, RA,fk_id_tipo_usuario_aluno, fk_id_escola_aluno from aluno where email=:email and senha=:senha");
          $query->bindValue(":email",$email);
          $executa =  $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          if($query->rowCount()>0){
                $query1 = $conn->prepare("update aluno set senha=:novaSenha where email=:email");
                $query1->bindValue(":email",$email);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();
          }

          else {
              $query = $conn->prepare("select email,senha, ID_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel from responsavel where email=:email and senha=:senha");
              $query->bindValue(":email",$email);
              $query->bindValue(":senha",$senha);
              $executa = $query->execute();
              $dados = $query->fetch(PDO::FETCH_ASSOC);

              if($query->rowCount()>0){
                    $query1 = $conn->prepare("update responsavel set senha=:novaSenha where email=:email");
                    $query1->bindValue(":email",$email);
                    $query1->bindValue(":novaSenha",$novaSenha);
                    $executa = $query1->execute();
              }
              else {
                $query = $conn->prepare("select email,senha, ID_admin, fk_id_tipo_usuario_admin from admin where email=:email and senha=:senha");
                $query->bindValue(":email",$email);
                $query->bindValue(":senha",$senha);
                $executa = $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);

                if($query->rowCount()>0){
                        $query1 = $conn->prepare("update admin set senha=:novaSenha where email=:email");
                        $query1->bindValue(":email",$email);
                        $query1->bindValue(":novaSenha",$novaSenha);
                        $executa = $query1->execute();
                }else if (($dados["email"] == $email)) {
                  echo "<script>alert('O email digitadp não pertence a nenhuma conta, tente novamente');
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