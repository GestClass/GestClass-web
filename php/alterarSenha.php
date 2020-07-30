<?php
require_once 'conexao.php';
$antigaSenha = $_POST['antigaSenha'];
$novaSenha=$_POST['novaSenha'];
$confirmarSenha=$_POST['confirmarSenha'];
$id_usuario = $_SESSION["id_usuario"];
                                                                                                                                       
if (empty($antigaSenha)) {
  echo "<script> alert('Digite a sua atual senha');
  window.location ='../modificarSenha.html.php'
  </script>";
  }else if($antigaSenha != "" ){

    $query = $conn->prepare("select senha from diretor where senha=:nSenha and ID_diretor=:id");

    $query->bindValue(":nSenha",$antigaSenha);
    $query->bindValue(":id",$id_usuario);
    $executa = $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount()>0){
        $query1 = $conn->prepare("update diretor set senha=:novaSenha where senha=:nSenha ");
        $query1->bindValue(":nSenha",$antigaSenha);
        $query1->bindValue(":novaSenha",$novaSenha);
        $executa = $query1->execute();
    }
    else{
      $query = $conn->prepare("select email,senha from secretario where senha=:nSenha and ID_secretario=:id ");
      $query->bindValue(":nSenha",$antigaSenha);
      $query->bindValue(":id",$id_usuario);
      $executa = $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      if($query->rowCount()>0){
            $query1 = $conn->prepare("update secretario set senha=:novaSenha where senha=:nSenha");
            $query1->bindValue(":nSenha",$antigaSenha);
            $query1->bindValue(":novaSenha",$novaSenha);
            $executa = $query1->execute();
      }
      else {
        $query = $conn->prepare("select email,senha, ID_professor from professor where senha=:nSenha and ID_professor=:id");
        $query->bindValue(":nSenha",$antigaSenha);
        $query->bindValue(":id",$id_usuario);
        $executa = $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount()>0){
                $query1 = $conn->prepare("update professor set senha=:novaSenha where senha=:nSenha");
                $query1->bindValue(":nSenha",$antigaSenha);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();
        }
        else {
          $query = $conn->prepare("select email,senha, RA from aluno where senha=:nSenha and RA=:id");
          $query->bindValue(":nSenha",$antigaSenha);
          $query->bindValue(":id",$id_usuario);
          $executa =  $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          if($query->rowCount()>0){
                $query1 = $conn->prepare("update aluno set senha=:novaSenha where senha=:nSenha");
                $query1->bindValue(":nSenha",$antigaSenha);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();
          }

          else {
              $query = $conn->prepare("select email,senha, ID_responsavel from responsavel where senha=:nSenha and ID_responsavel=:id");
              $query->bindValue(":nSenha",$antigaSenha);
              $query->bindValue(":id",$id_usuario);
              $executa = $query->execute();
              $dados = $query->fetch(PDO::FETCH_ASSOC);

              if($query->rowCount()>0){
                    $query1 = $conn->prepare("update responsavel set senha=:novaSenha where senha=:nSenha");
                    $query1->bindValue(":nSenha",$antigaSenha);
                    $query1->bindValue(":novaSenha",$novaSenha);
                    $executa = $query1->execute();
              }
              else {
                $query = $conn->prepare("select email,senha, ID_admin from admin where senha=:nSenha and ID_admin=:id");
                $query->bindValue(":nSenha",$antigaSenha);
                $query->bindValue(":id",$id_usuario);
                $executa = $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);

                if($query->rowCount()>0){
                        $query1 = $conn->prepare("update admin set senha=:novaSenha where senha=:nSenha");
                        $query1->bindValue(":nSenha",$antigaSenha);
                        $query1->bindValue(":novaSenha",$novaSenha);
                        $executa = $query1->execute();
                }else if (($dados["senha"] != $antigaSenha)) {
                  echo "<script>alert('A senha digitada não coincide com a atual, tente novamente');
                  window.location = '../modificarSenha.html.php'
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
    window.location ='../modificarSenha.html.php'
    </script>";
}else{
    echo "<script>alert('Senha alterada com sucesso :)');
    window.location = '../modificarSenha.html.php'
    </script>";
}
?>