<?php

include_once '../conexao.php';

// session_start();

$id_escola = $_POST["id_escola"];
$nome_diretor = $_POST["nome_diretor"];
$cep = $_POST["cep"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$rg = $_POST["rg"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$celular = $_POST["celular"];
$telefone = $_POST["telefone"];

// var_dump($id_tipo_usuario);

$image_file = $_FILES["txt_file"]["name"];
$type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
$size  = $_FILES["txt_file"]["size"];
$temp  = $_FILES["txt_file"]["tmp_name"];
$error  = $_FILES["txt_file"]["error"];
// print_r($imagem);exit;

if (($nome_diretor != "") && ($cep != "") && ($numero != "") && ($rg != "") && ($cpf != "") && ($email != "") && ($senha != "") && ($celular != "")) {

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

			$query = $conn->prepare("INSERT INTO diretor (nome_diretor,foto, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_diretor, fk_id_escola_diretor)
			VALUES (:nome_diretor, :nome_imagem, :cep, :numero, :complemento, :rg, :cpf, :email, :senha, :celular,:telefone,'2' ,:id_escola)");

			$query->bindParam(':nome_diretor', $nome_diretor, PDO::PARAM_STR);
			$query->bindParam(':nome_imagem', $nome_imagem, PDO::PARAM_STR);
			$query->bindParam(':cep', $cep, PDO::PARAM_STR);
			$query->bindParam(':numero', $numero, PDO::PARAM_STR);
			$query->bindParam(':complemento', $complemento, PDO::PARAM_STR);
			$query->bindParam(':rg', $rg, PDO::PARAM_STR);
			$query->bindParam(':cpf', $cpf, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':senha', $senha, PDO::PARAM_STR);
			$query->bindParam(':celular', $celular, PDO::PARAM_STR);
			$query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
			$query->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
			$query->execute();

			if ($query->rowCount()) {
				echo "<script>alert('Diretor cadastrado com sucesso');
				window.location='../../login.html.php';</script>";
			} else {
				echo "<script>alert('Erro: Diretor não cadastrado');
				history.back();</script>";
			}
		}
	}
} else {
	echo "<script>alert('Erro: Preencha os Campos');
	history.back();</script>";
}
