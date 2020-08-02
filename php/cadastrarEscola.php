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
    $mediaEscola = $_POST["media"];
    $notaMaxima = $_POST["nota_maxima"];
    $situacao = true;
    // $assunto = $_POST['cadastrarDiretor'];
    
    if (($nome_escola != "") && ($cep != "") && ($numero != "") && ($cnpj != "") && ($telefone != "") && ($email != "") && ($mediaEscola != "") && ($notaMaxima != "")) {

    $query = $conn->prepare("INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, data_pagamento_escola, media_min, media_max) 
    VALUES (:nome_escola, :cep, :numero, :complemento, :cnpj, :telefone, :email, :dataPag, :mediaEscola, :notaMaxima, :true);");

    $query->bindParam(':nome_escola', $nome_escola, PDO::PARAM_STR);
    $query->bindParam(':cep', $cep, PDO::PARAM_STR);
    $query->bindParam(':numero', $numero, PDO::PARAM_INT);
    $query->bindParam(':complemento', $complemento, PDO::PARAM_STR);
    $query->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
    $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':dataPag', $dataPag, PDO::PARAM_STR);
    $query->bindParam(':mediaEscola', $mediaEscola, PDO::PARAM_STR);
    $query->bindParam(':notaMaxima', $notaMaxima, PDO::PARAM_STR);
    $query->bindParam(':true', $situacao, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount()) {
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
           $mail->Username   = 'gestclass-esqueceusenha@hotmail.com'; 
           $mail->Password   = 'gestclass@1234';                      
           $mail->SMTPSecure = 'STARTTLS';       
           $mail->Port       = 587;              
       
          
           $mail->setFrom('gestclass-esqueceusenha@hotmail.com', 'GestClass');
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
}else {
    echo "<script>alert('Peencha os campos')
    history.back()</script>";
}

?>