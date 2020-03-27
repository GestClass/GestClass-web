<?php

    include_once 'conexao.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $nome_escola = $_POST["nome_escola"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cnpj = $_POST["cnpj"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataPag = $_POST["data_pagamento"];   
    $qntdAlunos = $_POST["quantidade_alunos"];
    $assunto = $_POST['cadastrarDiretor'];
    
    $chk1 = isset($_POST['chk1']) ? $_POST['chk1'] : 0;
    $chk2 = isset($_POST['chk2']) ? $_POST['chk2'] : 0;
    $chk3 = isset($_POST['chk3']) ? $_POST['chk3'] : 0;
    $chk4 = isset($_POST['chk4']) ? $_POST['chk4'] : 0;
    $chk5 = isset($_POST['chk5']) ? $_POST['chk5'] : 0;
    

    $query = $conn->prepare("INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, quantidade_alunos, data_pagamento_escola, turma_bercario, turma_pre_escola, turma_fundamental_I, turma_fundamental_II, turma_medio) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '0', '0', '0', '0', '0');");

    if ($query->execute(array($nome_escola, $cep, $numero, $complemento, $cnpj, $telefone, $email, $qntdAlunos, $dataPag))) {
        echo "<script>alert('Escola cadastrada com sucesso');
        location.href='../cadastroEscola.html.php';
        </script>";

        $query_select = $conn->prepare("select id_escola FROM escola ORDER BY id_escola DESC");
        $query_select->execute();
        $dados = $query_select->fetch(PDO::FETCH_ASSOC);
        $id_escola = $dados["id_escola"];

        if ($chk1 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_bercario=:chk1 WHERE escola.id_escola = $id_escola");
            $query_up->bindValue(":chk1",$chk1);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('Update da turma não foi efetuado');
                     history.back();</script>";
            }
        }

        if ($chk2 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_pre_escola=:chk2 WHERE escola.id_escola = $id_escola");
            $query_up->bindValue(":chk2",$chk2);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('Update da turma não foi efetuado');
                     history.back();</script>";
            }
        }

        if ($chk3 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_fundamental_I=:chk3 WHERE escola.id_escola = $id_escola");
            $query_up->bindValue(":chk3",$chk3);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('Update da turma não foi efetuado');
                     history.back();</script>";
            }
        }

        if ($chk4 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_fundamental_II=:chk4 WHERE escola.id_escola = $id_escola");
            $query_up->bindValue(":chk4",$chk4);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('Update da turma não foi efetuado');
                     history.back();</script>";
            }
        }

        if ($chk5 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_medio=:chk5 WHERE escola.id_escola = $id_escola");
            $query_up->bindValue(":chk5",$chk5);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('Update da turma não foi efetuado');
                     history.back();</script>";
            }
        }
     
        require_once 'Mail/src/PHPMailer.php';
        require_once 'Mail/src/SMTP.php';
        require_once 'Mail/src/POP3.php';
        require_once 'Mail/src/Exception.php';
        require_once 'Mail/src/OAuth.php';
     
        $mail = new PHPMailer();
     
     
        try {
          
           $mail->CharSet = 'UTF-8';
    
           $mail->SMTPDebug = 0;                  
           $mail->isSMTP();                       
           $mail->Host       = 'SMTP.office365.com';
           $mail->SMTPAuth   = true;                
           $mail->Username   = 'nick_oliveira2002@hotmail.com'; 
           $mail->Password   = '5minutos';                      
           $mail->SMTPSecure = 'STARTTLS';       
           $mail->Port       = 587;              
       
          
           $mail->setFrom('nick_oliveira2002@hotmail.com', 'Monique');
           $mail->addAddress($email);     
          
           $mail->Subject = 'Bem vindo ao GestClass';
           $mail->Body    = "<p> Olá, a equipe do GestClass te deseja boas vindas.</br>Segue a baixo o link para o cadastro do Diretor da escola:</br>http://localhost/GestClass-web/cadastrarDiretor.html.php?id_escola={$id_escola}</p>";
           $mail->AltBody = 'habilite o html do seu email';
       
           $mail->send();
           echo 'Email Enviado com sucesso!';
       } catch (Exception $e) {
           echo "Email nao foi enviado, motivo: {$this->mail->ErrorInfo}";
       }
         
    }else{
        echo "<script>alert('Erro: Escola não foi cadastrada');
        history.back();</script>";
    }

?>