<?php

include_once 'conexao.php';

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   $email = $_POST['email'];

   $assunto = $_POST['recuperarSenha'];
   
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
      $mail->Username   = 'gestclass-esqueceusenha@hotmail.com';                     // SMTP username
      $mail->Password   = 'gestclass@1234';                               // SMTP password
      $mail->SMTPSecure = 'STARTTLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom('gestclass-esqueceusenha@hotmail.com', 'GestClass');
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
      $mail->Body= "
      <tr>
         <p> Olá, estamos aqui para te ajudar!</p>
      </tr>
      <tr>
         <p>
            Segue o link para recuperação da sua senha: <a href='http://localhost/gestclass-web/novaSenha.html.php'> Clique aqui
         </p>
      </tr>
      <tr>
         <p> Em caso de dúvidas ou problemas, estamos a disposição.</p>
      </tr>
      <tr>
      <p> Obrigado.</p>
      </tr>
      <tr>
      <p>   Equipe GestClass :) </p>
      </tr>";
     
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