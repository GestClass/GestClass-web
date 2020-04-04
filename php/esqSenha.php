<?php

 require_once 'conexao.php';

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   $email = $_POST['email'];

   //select e ver se existe o registro
   $query = $conn->prepare("select email from aluno where email=:email");
   $query->bindValue(":email",$email);
   $executa = $query->execute();



   // $querySelect = " SELECT * FROM aluno WHERE email='$email' ";
   // $executa = mysqli_query($conn, $querySelect);

   if (!$executa) {
      echo "Registro nao encontrado";
      die;
   }

   //gerando a nova senha 
   $novaSenha = substr(md5(time()),0,8);

   //uptade da nova senha 
   $query = $conn->prepare("UPDATE aluno SET senha=:novaSenha WHERE email=:email");
   $query->bindValue(":email",$email);
   $query->bindValue(":novaSenha",$novaSenha);
   $executa = $query->execute();


   // $queryUptade =  "UPDATE aluno SET senha='$novaSenha' WHERE email='$email'";
   // $executa = mysqli_query($conn, $queryUptade);

   if($executa == 0){
      echo "update invalido";
      die;
   }

   $assunto = $_POST['recuperarSenha'];

   if (empty($email)) {
      echo "digite o email";
      return;
   }

   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo "<script>alert('Email invalido, tente novamente :)');
      window.location = '../login.html.php'
      </script>";
   }

   require_once 'Mail/src/PHPMailer.php';
   require_once 'Mail/src/SMTP.php';
   require_once 'Mail/src/POP3.php';
   require_once 'Mail/src/Exception.php';
   require_once 'Mail/src/OAuth.php';

   $mail = new PHPMailer();


   try {
     
      $mail->CharSet = 'UTF-8';
      //Server settings
      $mail->SMTPDebug = 0;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'SMTP.office365.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'nick_oliveira2002@hotmail.com';                     // SMTP username
      $mail->Password   = '5minutos';                               // SMTP password
      $mail->SMTPSecure = 'STARTTLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom('nick_oliveira2002@hotmail.com', 'Monique');
      $mail->addAddress($email);     // Add a recipient
      // $mail->addAddress('ellen@example.com');               // Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
  
      // Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $assunto;
      $mail->Body= "<h1> Acesse este link e mude sua senha: <a href='http://localhost/gestclass-web/novaSenha.html.php'>salve</a></h1>";
      $mail->AltBody = 'habilite o html do seu email';
  
      $mail->send();
      echo "<script>alert('Email enviado com sucesso :)');
      window.location = '../login.html.php'
      </script>";
  } catch (Exception $e) {
   echo "<script>alert('Email nao foi enviado, motivo: {$this->mail->ErrorInfo})');
   window.location = '../login.html.php'
   </script>";
  }





?>