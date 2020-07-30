<?php

include_once '../conexao.php';

//Responsavel
$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$nome = $_POST["nome"];
$rg = $_POST["rg"];
$cpf_r = $_POST["cpf"];
$nascimento = $_POST["nascimento"];
$cep = $_POST["cep"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$pin = $_POST["pin"];
$celular = $_POST["celular"];
$telefone = $_POST["telefone"];
$tel_comercial = $_POST["tel_comercial"];
$data_pagamento = $_POST["data_pagamento"];

$image_file = $_FILES["foto_file"]["name"];
$type  = $_FILES["foto_file"]["type"]; //file name "foto_file" 
$size  = $_FILES["foto_file"]["size"];
$temp  = $_FILES["foto_file"]["tmp_name"];
$error  = $_FILES["foto_file"]["error"];
//print_r($imagem);exit;


if (($nome != "") && ($rg != "") && ($cpf_r != "") && ($nascimento != "") && ($cep != "") && ($numero != "") && ($email != "") && ($senha != "") && ($pin != "") && ($celular != "")) {

	//limpando cpf 
	$limcpf =  str_replace('.', '', $cpf_r);
	$cpf_respon =  str_replace('-', '', $limcpf);
	//arrumando data conforme ao banco
	$data = str_replace('/','-', $nascimento);
	$nascimento_r = date('Y-m-d', strtotime($data));

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

		}
	}

			$query_responsavel = $conn->prepare("INSERT INTO responsavel(nome_responsavel, foto, cep, numero, complemento, RG, cpf, email, senha, pin, celular, telefone, telefone_comercial, data_nascimento, data_pagamento_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel)
		   	VALUES (:nome,:nome_imagem,:cep,:numero,:complemento,:rg,:cpf_respon,:email,:senha,:pin,:celular,:telefone,:tel_comercial,:nascimento_r,:data_pagamento,'6',:id_escola)");

			$query_responsavel->bindParam(':nome', $nome, PDO::PARAM_STR);
			$query_responsavel->bindParam(':nome_imagem', $nome_imagem, PDO::PARAM_STR);
			$query_responsavel->bindParam(':cep', $cep, PDO::PARAM_STR);
			$query_responsavel->bindParam(':numero', $numero, PDO::PARAM_STR);
			$query_responsavel->bindParam(':complemento', $complemento, PDO::PARAM_STR);
			$query_responsavel->bindParam(':rg', $rg, PDO::PARAM_STR);
			$query_responsavel->bindParam(':cpf_respon', $cpf_respon, PDO::PARAM_INT);
			$query_responsavel->bindParam(':email', $email, PDO::PARAM_STR);
			$query_responsavel->bindParam(':senha', $senha, PDO::PARAM_STR);
			$query_responsavel->bindParam(':pin', $pin, PDO::PARAM_INT);
			$query_responsavel->bindParam(':celular', $celular, PDO::PARAM_STR);
			$query_responsavel->bindParam(':telefone', $telefone, PDO::PARAM_STR);
			$query_responsavel->bindParam(':tel_comercial', $tel_comercial, PDO::PARAM_STR);
			$query_responsavel->bindParam(':nascimento_r', $nascimento_r, PDO::PARAM_STR);
			$query_responsavel->bindParam(':data_pagamento', $data_pagamento, PDO::PARAM_INT);
			$query_responsavel->bindParam(':id_escola', $id_escola, PDO::PARAM_INT);
			$query_responsavel->execute();

			if ($query_responsavel->rowCount()) {

				if ($id_tipo_usuario == 2) {

					echo "<script>alert('Responsável cadastrado com sucesso');
					window.location='../../cadastroAluRespon.html.php';
					</script>";
				} elseif ($id_tipo_usuario == 3) {

					echo "<script>alert('Responsável cadastrado com sucesso');
					window.location='../../cadastroAluRespon.html.php';
					</script>";
				} else {
					echo "<script>alert('Usuario sem permissão');
					window.location='../../index.php'</script>";
				}
			} else {
				echo "<script>alert('Erro: Responsável não foi cadastrado');
				history.back();;
				</script>";
			}
		
} else {
	echo "<script>alert('Preencha os Campos');
	history.back();</script>";
}
