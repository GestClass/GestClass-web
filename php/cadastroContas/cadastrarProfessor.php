<?php

include_once '../conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$nome = $_POST["nome"];
$rg = $_POST["rg"];
$cpf = $_POST["cpf"];
$cep = $_POST["cep"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$celular = $_POST["celular"];
$telefone = $_POST["telefone"];

$image_file = $_FILES["foto_file"]["name"];
$type  = $_FILES["foto_file"]["type"]; //file name "foto_file" 
$size  = $_FILES["foto_file"]["size"];
$temp  = $_FILES["foto_file"]["tmp_name"];
$error  = $_FILES["foto_file"]["error"];
// // print_r($imagem);exit;
      
if (($nome != "") && ($rg != "") && ($cpf != "") && ($cep != "") && ($numero != "") && ($email != "") && ($senha != "") && ($celular != "")) {

  //Limpando CPF Professor
  $limcpf =  str_replace('.', '', $cpf);
  $cpf_professor =  str_replace('-', '', $limcpf);

  if ($error == 1) {
    echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
            history.back();
            </script>";
  }
  //print_r($imagem);exit;
  if ($image_file) {

    $largura = 2000;
    $altura = 3000;
    $tamanho = 2000000;

    if (!preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image_file, $ext)) {
      echo "<script>alert('Ops! Isso não é uma imagem.');
              history.back();
              </script>";
    }

    $dimensoes = getimagesize($temp);
    //print_r($dimensoes);exit;	
    if ($dimensoes[0] > $largura) {
      echo "A largura da imagem não deve ultrapassar " . $largura . " pixels";
    }

    if ($dimensoes[1] > $altura) {
      echo "Altura da imagem não deve ultrapassar " . $altura . " pixels";
    }

    if ($size > $tamanho) {
      echo "A imagem deve ter no máximo " . $tamanho . " bytes";
    } else {

      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image_file, $ext);

      $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

      $caminho = "../../assets/imagensBanco/" . $nome_imagem;

      move_uploaded_file($temp, $caminho);

      $query_insert = $conn->prepare("INSERT INTO professor(nome_professor, foto, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_professor, fk_id_escola_professor) 
        VALUES (:nome,:nome_imagem,:cep,:numero,:complemento,:rg,:cpf_professor,:email,:senha,:celular,:telefone,'4',:id_escola)");

      $query_insert->bindParam(':nome', $nome, PDO::PARAM_STR);
      $query_insert->bindParam(':nome_imagem', $nome_imagem, PDO::PARAM_STR);
      $query_insert->bindParam(':cep', $cep, PDO::PARAM_STR);
      $query_insert->bindParam(':numero', $numero, PDO::PARAM_STR);
      $query_insert->bindParam(':complemento', $complemento, PDO::PARAM_STR);
      $query_insert->bindParam(':rg', $rg, PDO::PARAM_STR);
      $query_insert->bindParam(':cpf_professor', $cpf_professor, PDO::PARAM_INT);
      $query_insert->bindParam(':email', $email, PDO::PARAM_STR);
      $query_insert->bindParam(':senha', $senha, PDO::PARAM_STR);
      $query_insert->bindParam(':celular', $celular, PDO::PARAM_STR);
      $query_insert->bindParam(':telefone', $telefone, PDO::PARAM_STR);
      $query_insert->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
      $query_insert->execute();

      if ($query_insert->rowCount()) {
        if ($id_tipo_usuario == 2) {

          echo "<script>alert('Professor cadastrado com sucesso');
                  window.location='../../homeDiretor.html.php';
                  </script>";
        } elseif ($id_tipo_usuario == 3) {

          echo "<script>alert('Professor cadastrado com sucesso');
                  window.location='../../homeSecretaria.html.php';
                  </script>";
        } else {
          echo "<script>alert('Usuario sem permissão');
                  window.location='../../index.php'</script>";
        }
      } else {
        echo "<script>alert('Erro: Professor não foi cadastrado');
                history.back();;
                </script>";
      }
    }
  }
} else {
  echo "<script>alert('Preencha os Campos');
          history.back();</script>";
}
