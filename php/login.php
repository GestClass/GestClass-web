<?php

include_once 'conexao.php';

$email = $_POST['emailLogin'];
$senha = $_POST['senhaLogin'];

if ($senha == "" || $email == "") {
  echo "<script>alert('Prencha os campos, por favor');
    history.back();</script>";
  // exit();
} else if ($email != "" || $senha != "") {

  $query = $conn->prepare("select email,senha,ID_diretor,fk_id_tipo_usuario_diretor,fk_id_escola_diretor from diretor where email=:email and senha=:senha");

  $query->bindValue(":email", $email);
  $query->bindValue(":senha", md5($senha));
  $query->execute();
  $dados = $query->fetch(PDO::FETCH_ASSOC);

  if ($query->rowCount() > 0) {

    $escola_diretor = $dados["fk_id_escola_diretor"];

    $query_escola = $conn->prepare("select ID_escola, situacao from escola where ID_escola = $escola_diretor");
    $query_escola->execute();
    $dados_escola = $query_escola->fetch(PDO::FETCH_ASSOC);

    if ($dados_escola['situacao']) {
      echo "<script>alert('Diretor logado com sucessoo :)');
        window.location = '../homeDiretor.html.php'</script>";

      $_SESSION["id_usuario"] = $dados["ID_diretor"];
      $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_diretor"];
      $_SESSION["id_escola"] = $dados["fk_id_escola_diretor"];
    } else if ($dados_escola['situacao'] == false) {
      echo "<script>window.location = '../escolaDesativadaMensagem.html.php'</script>";
    }
  } else {
    $query = $conn->prepare("select email,senha, ID_secretario, fk_id_tipo_usuario_secretario, fk_id_escola_secretario from secretario where email=:email and senha=:senha");
    $query->bindValue(":email", $email);
    $query->bindValue(":senha", md5($senha));
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $escola_secretario = $dados["fk_id_escola_secretario"];

    $query_escola = $conn->prepare("select ID_escola, situacao from escola where ID_escola = $escola_secretario");
    $query_escola->execute();
    $dados_escola = $query_escola->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {
      if ($dados_escola['situacao']) {
        echo "<script>alert('Secretario logado com sucessoo :)');
          window.location = '../homeSecretaria.html.php'</script>";

        $_SESSION["id_usuario"] = $dados["ID_secretario"];
        $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_secretario"];
        $_SESSION["id_escola"] = $dados["fk_id_escola_secretario"];
      } else if ($dados_escola['situacao'] == false) {
        echo "<script>window.location = '../escolaDesativadaMensagem.html.php'</script>";
      }
    } else {
      $query = $conn->prepare("select email,senha, ID_professor,fk_id_tipo_usuario_professor, fk_id_escola_professor from professor where email=:email and senha=:senha");
      $query->bindValue(":email", $email);
      $query->bindValue(":senha", md5($senha));
      $query->execute();
      $dados = $query->fetch(PDO::FETCH_ASSOC);

      $escola_professor = $dados["fk_id_escola_professor"];

      $query_escola = $conn->prepare("select ID_escola, situacao from escola where ID_escola = $escola_secretario");
      $query_escola->execute();
      $dados_escola = $query_escola->fetch(PDO::FETCH_ASSOC);

      if ($query->rowCount() > 0) {
        if ($dados_escola['situacao']) {
          echo "<script>alert('Professor logado com sucesso :)');
              window.location = '../homeProfessor.html.php'</script>";

          $_SESSION["id_usuario"] = $dados["ID_professor"];
          $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_professor"];
          $_SESSION["id_escola"] = $dados["fk_id_escola_professor"];
        } else if ($dados_escola['situacao'] == false) {
          echo "<script>window.location = '../escolaDesativadaMensagem.html.php'</script>";
        }
      } else {
        $query = $conn->prepare("select email,senha, RA,fk_id_tipo_usuario_aluno, fk_id_escola_aluno from aluno where email=:email and senha=:senha");
        $query->bindValue(":email", $email);
        $query->bindValue(":senha", md5($senha));
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        $escola_aluno = $dados["fk_id_escola_aluno"];

        $query_escola = $conn->prepare("select ID_escola, situacao from escola where ID_escola = $escola_aluno");
        $query_escola->execute();
        $dados_escola = $query_escola->fetch(PDO::FETCH_ASSOC);


        if ($query->rowCount() > 0) {
          if ($dados_escola['situacao']) {
            echo "<script>alert('Aluno logado com sucesso :)');
            window.location = '../homeAluno.html.php'</script>";

            $_SESSION["id_usuario"] = $dados["RA"];
            $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_aluno"];
            $_SESSION["id_escola"] = $dados["fk_id_escola_aluno"];
          } else if ($dados_escola['situacao'] == false) {
            echo "<script>window.location = '../escolaDesativadaMensagem.html.php'</script>";
          }
        } else {
          $query = $conn->prepare("select email,senha, ID_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel from responsavel where email=:email and senha=:senha");
          $query->bindValue(":email", $email);
          $query->bindValue(":senha", md5($senha));
          $query->execute();
          $dados = $query->fetch(PDO::FETCH_ASSOC);

          $escola_responsavel = $dados["fk_id_escola_responsavel"];

          $query_escola = $conn->prepare("select ID_escola, situacao from escola where ID_escola = $escola_responsavel");
          $query_escola->execute();
          $dados_escola = $query_escola->fetch(PDO::FETCH_ASSOC);

          if ($query->rowCount() > 0) {
            if ($dados_escola['situacao']) {
              echo "<script>alert('Responsável logado com sucesso :)');
                window.location = '../homePais.html.php'</script>";

              $_SESSION["id_usuario"] = $dados["ID_responsavel"];
              $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_responsavel"];
              $_SESSION["id_escola"] = $dados["fk_id_escola_responsavel"];
            } else if ($dados_escola['situacao'] == false) {
              echo "<script>window.location = '../escolaDesativadaMensagem.html.php'</script>";
            }
          } else {
            $query = $conn->prepare("select email,senha, ID_admin, fk_id_tipo_usuario_admin from admin where email=:email and senha=:senha");
            $query->bindValue(":email", $email);
            $query->bindValue(":senha", md5($senha));
            $query->execute();
            $dados = $query->fetch(PDO::FETCH_ASSOC);

            if ($query->rowCount() > 0) {
              echo "<script>alert('Admin logado com sucesso :)');
                  window.location = '../homeAdmGest.html.php'</script>";

              $_SESSION["id_usuario"] = $dados["ID_admin"];
              $_SESSION["id_tipo_usuario"] = $dados["fk_id_tipo_usuario_admin"];
            } else if (($dados["email"] == $email) || ($dados["senha"] != $senha)) {
              echo "<script>alert('Email ou senha está incorreto');
                  history.back();</script>";
              exit();
            }
          }
        }
      }
    }
  }
}
