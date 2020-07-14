<?php
require_once 'conexao.php';
$email = $_POST['email'];
$novaSenha=$_POST['novaSenha'];
$confirmarSenha=$_POST['confirmarSenha'];
                                                                                                                                       
if (empty($email)) {
  echo "<script> alert('Digite o seu email');
  window.location ='../novaSenha.html.php'
  </script>";
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //se o formato for diferente do formato padrao de um email
  echo "<script>alert('Email invalido, tente novamente :)');
  window.location ='../novaSenha.html.php'
  </script>";
  }else if($email != "" ){

    $query = $conn->prepare("select email,senha from diretor where email=:mEmail ");

    $query->bindValue(":mEmail",$email);
    $executa = $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount()>0){
        $query1 = $conn->prepare("update diretor set senha=:novaSenha where email=:mEmail");
        $query1->bindValue(":mEmail",$email);
        $query1->bindValue(":novaSenha",$novaSenha);
        $executa = $query1->execute();
    }
    else{
      $query = $conn->prepare("select email,senha from secretario where email=:mEmail ");
      $query->bindValue(":mEmail",$email);
      $executa = $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      if($query->rowCount()>0){
            $query1 = $conn->prepare("update secretario set senha=:novaSenha where email=:mEmail");
            $query1->bindValue(":mEmail",$email);
            $query1->bindValue(":novaSenha",$novaSenha);
            $executa = $query1->execute();
      }
      else {
        $query = $conn->prepare("select email,senha, ID_professor,fk_id_tipo_usuario_professor, fk_id_escola_professor from professor where email=:mEmail");
        $query->bindValue(":mEmail",$email);
        $executa = $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount()>0){
                $query1 = $conn->prepare("update professor set senha=:novaSenha where email=:mEmail");
                $query1->bindValue(":mEmail",$email);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();
        }
        else {
          $query = $conn->prepare("select email,senha, RA,fk_id_tipo_usuario_aluno, fk_id_escola_aluno from aluno where email=:mEmail");
          $query->bindValue(":mEmail",$email);
          $executa =  $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          if($query->rowCount()>0){
                $query1 = $conn->prepare("update aluno set senha=:novaSenha where email=:mEmail");
                $query1->bindValue(":mEmail",$email);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();
          }

          else {
              $query = $conn->prepare("select email,senha, ID_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel from responsavel where email=:mEmail");
              $query->bindValue(":mEmail",$email);
              $executa = $query->execute();
              $dados = $query->fetch(PDO::FETCH_ASSOC);

              if($query->rowCount()>0){
                    $query1 = $conn->prepare("update responsavel set senha=:novaSenha where email=:mEmail");
                    $query1->bindValue(":mEmail",$email);
                    $query1->bindValue(":novaSenha",$novaSenha);
                    $executa = $query1->execute();
              }
              else {
                $query = $conn->prepare("select email,senha, ID_admin, fk_id_tipo_usuario_admin from admin where email=:mEmail");
                $query->bindValue(":mEmail",$email);
                $executa = $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);

                if($query->rowCount()>0){
                        $query1 = $conn->prepare("update admin set senha=:novaSenha where email=:mEmail");
                        $query1->bindValue(":mEmail",$email);
                        $query1->bindValue(":novaSenha",$novaSenha);
                        $executa = $query1->execute();
                }else if (($dados["email"] != $email)) {
                  echo "<script>alert('O email digitado não pertence a nenhuma conta, tente novamente');
                  window.location = '../novaSenha.html.php'
                  </script>";
                  exit();
              }
            }
          }
        }
      }
    }
  }
  if($novaSenha!=$confirmarSenha){
    echo "<script> alert('As senhas não se coincidem, digite novamente');
    window.location ='../novaSenha.html.php'
    </script>";
}else{
    echo "<script>alert('Senha alterada com sucesso :)');
    window.location = '../login.html.php'
    </script>";
}
?>