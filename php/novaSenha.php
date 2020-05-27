<?php
require_once 'conexao.php';
$email = $_POST['email'];
$novaSenha=$_POST['novaSenha'];
$confirmarSenha=$_POST['confirmarSenha'];
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
            //select no banco(ALUNO)
            $query = $conn->prepare("select email from aluno where email=:email");
            $query->bindValue(":email",$email);
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);
            //confere se existe no banco
            if($dados["email"]!=$email){
             echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
             window.location ='../novaSenha.html.php'
             </script>";
            }else{   
            //uptade da nova senha 
            $query1 = $conn->prepare("update aluno set senha=:novaSenha where email=:email");
            $query1->bindValue(":email",$email);
            $query1->bindValue(":novaSenha",$novaSenha);
            $executa = $query1->execute();
            //caso o executa não receba valor
            }if($executa == 0){
                echo "Update inválido, tente novamente mais tarde :)";
                die;
            }else{
                //select no banco (PROFESSOR)
                $query = $conn->prepare("select email from professor where email=:email");
                $query->bindValue(":email",$email);
                $query->execute();
                $dados = $query->fetch(PDO::FETCH_ASSOC);
                //confere se existe no banco
                if($dados["email"]!=$email){
                echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
                window.location ='../novaSenha.html.php'
                </script>";
                }else{   
                //uptade da nova senha 
                $query1 = $conn->prepare("update professor set senha=:novaSenha where email=:email");
                $query1->bindValue(":email",$email);
                $query1->bindValue(":novaSenha",$novaSenha);
                $executa = $query1->execute();

                //caso o executa não receba valor
                }if($executa == 0){
                    echo "update invalido";
                    die;

                }else{
                    //select no banco (DIRETOR)
                    $query = $conn->prepare("select email from diretor where email=:email");
                    $query->bindValue(":email",$email);
                    $query->execute();
                    $dados = $query->fetch(PDO::FETCH_ASSOC);
                    //confere se existe no banco
                    if($dados["email"]!=$email){
                        echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
                        window.location ='../novaSenha.html.php'
                        </script>";
                    }else{   
                    //uptade da nova senha 
                    $query1 = $conn->prepare("update diretor set senha=:novaSenha where email=:email");
                    $query1->bindValue(":email",$email);
                    $query1->bindValue(":novaSenha",$novaSenha);
                    $executa = $query1->execute();
                    //caso o executa não receba valor
                    }if($executa == 0){
                    echo "update invalido";
                    die;
                    }else{
                        //select no banco (RESPONSAVEL)
                        $query = $conn->prepare("select email from responsavel where email=:email");
                        $query->bindValue(":email",$email);
                        $query->execute();
                        $dados = $query->fetch(PDO::FETCH_ASSOC);
                        //confere se existe no banco
                        if($dados["email"]!=$email){
                            echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
                            window.location ='../novaSenha.html.php'
                            </script>";
                        }else{   
                        //uptade da nova senha 
                        $query1 = $conn->prepare("update responsavel set senha=:novaSenha where email=:email");
                        $query1->bindValue(":email",$email);
                        $query1->bindValue(":novaSenha",$novaSenha);
                        $executa = $query1->execute();
                        //caso o executa não receba valor
                        }if($executa == 0){
                        echo "update invalido";
                        die;
                        }else{
                            //select no banco (SECRETARIA)
                            $query = $conn->prepare("select email from secretario where email=:email");
                            $query->bindValue(":email",$email);
                            $query->execute();
                            $dados = $query->fetch(PDO::FETCH_ASSOC);
                            //confere se existe no banco
                            if($dados["email"]!=$email){
                                echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
                                window.location ='../novaSenha.html.php'
                                </script>";
                            }else{   
                            //uptade da nova senha 
                            $query1 = $conn->prepare("update secretario set senha=:novaSenha where email=:email");
                            $query1->bindValue(":email",$email);
                            $query1->bindValue(":novaSenha",$novaSenha);
                            $executa = $query1->execute();
                            //caso o executa não receba valor
                            }if($executa == 0){
                            echo "update invalido";
                            die;
                            }else{
                                //select no banco(ADMIN)
                                $query = $conn->prepare("select email from admin where email=:email");
                                $query->bindValue(":email",$email);
                                $query->execute();
                                $dados = $query->fetch(PDO::FETCH_ASSOC);
                               //confere se existe no banco
                                if($dados["email"]!=$email){
                                    echo"<script>alert('O email digitado não pertence a nenhum login, tente novamente :)')
                                    window.location ='../novaSenha.html.php'
                                    </script>";
                                }else{   
                                //uptade da nova senha 
                                $query1 = $conn->prepare("update admin set senha=:novaSenha where email=:email");
                                $query1->bindValue(":email",$email);
                                $query1->bindValue(":novaSenha",$novaSenha);
                                $executa = $query1->execute();
                                //caso o executa não receba valor
                                }if($executa == 0){
                                echo "update invalido";
                                die;
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