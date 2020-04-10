<?php
require_once 'conexao.php';
 $email = $_POST['email'];
 $novaSenha=$_POST['novaSenha'];
 $confirmarSenha=$_POST['confirmarSenha'];

    //select e ver se existe o registro
    $query = $conn->prepare("SELECT * FROM aluno WHERE email=:email");
    $query->bindValue(":email",$email);
    $executa = $query->execute();
    

    //uptade na senha antiga
    $query = $conn->prepare("UPDATE aluno SET senha=:novaSenha where email=:email");
    $query->bindValue(":email",$email);
    $query->bindValue(":novaSenha",$novaSenha);
    $executa = $query->execute(); 
    

    if($executa == 0){
      echo "<script> alert('Não foi possível alterar, tente novamente mais tarde.');
      window.location ='../novaSenha.html.php'
      </script>";
     }
  
     if (empty($email)) {
      echo "<script> alert('Digite o seu email');
      window.location ='../novaSenha.html.php'
      </script>";
     }
  
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo "<script> alert('Email inválido, digite novamente');
      window.location ='../novaSenha.html.php'
      </script>";
     }
     if($novaSenha!=$confirmarSenha){
        echo "<script> alert('As senhas não se coincidem, digite novamente');
        window.location ='../novaSenha.html.php'
        </script>";
     }
    else{
        echo "<script>alert('Senha alterada com sucesso :)');
        window.location = '../login.html.php'
        </script>";
    }
?>