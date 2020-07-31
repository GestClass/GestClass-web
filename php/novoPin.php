<?php
require_once 'conexao.php';
$email = $_POST['email'];
$novoPin=$_POST['novoPin'];
$confirmarPin=$_POST['confirmarPin'];
    //Se a variavel for vazia
    if (empty($email)) {
        echo "<script> alert('Digite o seu email');
        window.location ='../novaSenha.html.php'
        </script>";
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //se o formato for diferente do formato padrao de um email
        echo "<script>alert('Email invalido, tente novamente :)');
        window.location ='../novaSenha.html.php'
        </script>";
        }if($email != "" ){
                //select no banco (RESPONSAVEL)
                $query = $conn->prepare("select email from responsavel where email=:email");
                $query->bindValue(":email",$email);
                $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);
                        //confere se existe no banco
                    if($dados["email"]!=$email){
                        echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
                         window.location ='../novoPin.html.php'
                        </script>";
                    }else{   
                        //uptade do novo PIN
                        $query1 = $conn->prepare("update responsavel set pin=:novoPin where email=:email");
                        $query1->bindValue(":email",$email);
                        $query1->bindValue(":novoPin",md5($novoPin));
                        $executa = $query1->execute();
                        //caso o executa não receba valor
                        }if($executa == 0){
                        echo "update invalido";
                        die;
                        
    }
        }
    if($novoPin!=$confirmarPin){
        echo "<script> alert('Os códigos não se coincidem, digite novamente');
        window.location ='../novoPin.html.php'
        </script>";
    }else{
        echo "<script>alert('Código alterado com sucesso :)');
        window.location = '../homePais.html.php'
        </script>";
    }

?>

