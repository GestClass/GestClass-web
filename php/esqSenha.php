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
   if (empty($email)) {
      echo "<script> alert('Digite o seu email');
      window.location ='../login.html.php'
      </script>";
   }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //se o formato for diferente do formato padrao de um email
         echo "<script>alert('Email invalido, tente novamente :)');
         window.location ='../login.html.php'
         </script>";
   }else if($email!=""){
     
      //select no banco(ALUNO)
      $query_aluno = $conn->prepare("select email from aluno where email=:email");
      $query_aluno->bindValue(":email",$email);
      $query_aluno->execute();
      $dados_aluno = $query_aluno->fetch(PDO::FETCH_ASSOC);
      //select no banco (DIRETOR)
      $query_diretor = $conn->prepare("select email from diretor where email=:email");
      $query_diretor->bindValue(":email",$email);
      $query_diretor->execute();
      $dados_diretor = $query_diretor->fetch(PDO::FETCH_ASSOC);
      //select no banco (RESPONSAVEL)
      $query_respon = $conn->prepare("select email from responsavel where email=:email");
      $query_respon->bindValue(":email",$email);
      $query_respon->execute();
      $dados_respon = $query_respon->fetch(PDO::FETCH_ASSOC);
 
      //select no banco (SECRETARIA)
      $query_secret = $conn->prepare("select email from secretario where email=:email");
      $query_secret->bindValue(":email",$email);
      $query_secret->execute();
      $dados_secret = $query_secret->fetch(PDO::FETCH_ASSOC);
      //select no banco(ADMIN)
      $query_admin = $conn->prepare("select email from admin where email=:email");
      $query_admin->bindValue(":email",$email);
      $query_admin->execute();
      $dados_admin = $query_admin->fetch(PDO::FETCH_ASSOC);

   //confere se existe no banco
   if($dados_aluno["email"]==$email ){
      $confirmacao="ok";
   }else if($dados_respon["email"]==$email){    
      $confirmacao="ok";
   }else if($dados_diretor["email"]==$email){
      $confirmacao="ok";
   }else if($dados_secret["email"]==$email){
      $confirmacao="ok";
   
   }else if($dados_admin["email"]==$email){   
       $confirmacao="ok";
   }else{
      echo "<script>alert('Email Inválido, tente novamente:)');
      window.location ='../login.html.php'
      </script>";
   }
}
if($confirmacao=='ok'){
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
}

   ?>

   