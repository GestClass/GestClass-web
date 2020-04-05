<?php

    include_once 'conexao.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $id_escola = $_SESSION['id_escola'];
    $nome_escola = $_POST["nome_escola"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cnpj = $_POST["cnpj"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataPag = $_POST["data_pagamento"];   
    $qntdAlunos = $_POST["quantidade_alunos"];
    // $assunto = $_POST['cadastrarDiretor'];

    $chk1 = isset($_POST['chk1']) ? $_POST['chk1'] : 0;
    $chk2 = isset($_POST['chk2']) ? $_POST['chk2'] : 0;
    $chk3 = isset($_POST['chk3']) ? $_POST['chk3'] : 0;
    $chk4 = isset($_POST['chk4']) ? $_POST['chk4'] : 0;
    $chk5 = isset($_POST['chk5']) ? $_POST['chk5'] : 0;

    

    $query = $conn->prepare("UPDATE escola SET nome_escola = '{$nome_escola}', cep = '{$cep}', numero = '{$numero}', complemento = '{$complemento}', 
    CNPJ = '{$cnpj}', telefone = '{$telefone}', email = '{$email}', quantidade_alunos = '{$qntdAlunos}', data_pagamento_escola = '{$dataPag}', 
    turma_bercario = '0', turma_pre_escola = '0', turma_fundamental_I = '0', turma_fundamental_II = '0', turma_medio = '0' WHERE escola.ID_escola = $id_escola;");

    if ($query->execute()) {
        echo "<script>alert('Dados atualizados com sucesso');
        location.href='../cadastroEscola.html.php';
        </script>";



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
        
        $mail->Subject = 'Atualização de dados da Escola - GestClass';
        $mail->Body    = "<p> Os dados da escola {$nome_escola} foram atualizados com sucesso </p>";
        $mail->AltBody = 'habilite o html do seu email';
    
        $mail->send();
        echo 'Email Enviado com sucesso!';
    } catch (Exception $e) {
        echo "Email nao foi enviado, motivo: {$this->mail->ErrorInfo}";
    }
        
    }else{
        echo "<script>alert('Erro: Os dados não foram atualizados');
        history.back();</script>";
    }







?>