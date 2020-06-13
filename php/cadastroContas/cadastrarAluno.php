<?php

include_once '../conexao.php';

// Aluno
$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$rastro = $_POST["ra"];
$ra = str_replace('-', '', $rastro);

$nome = $_POST["nome"];
$rg = $_POST["rg"];

$cpf = $_POST["cpf"];
$limcpf =  str_replace('.', '', $cpf);
$cpf_aluno =  str_replace('-', '', $limcpf);

$nascimento = $_POST["data_nascimento"];
$data_nascimento = date('Y/m/d',strtotime($nascimento));
$email = $_POST["email"];
$senha = $_POST["senha"];
$confsenha = $_POST["confsenha"];
$celular = $_POST["celular"];
$telefone = $_POST["telefone"];
$turma = $_POST["turma"];


// Resgatando responsavel
$cpf_respon = $_POST["cpf_respon"];
$cpf_res = str_replace('.', '', $cpf_respon);
$cpf_responsavel = str_replace('-', '', $cpf_res);
$query = $conn->prepare("select id_responsavel from responsavel where cpf=$cpf_responsavel");
$query->execute();
$dados = $query->fetch(PDO::FETCH_ASSOC);
$id_responsavel = $dados['id_responsavel'];

$image_file = $_FILES["foto_file"]["name"];
$type  = $_FILES["foto_file"]["type"]; //file name "foto_file" 
$size  = $_FILES["foto_file"]["size"];
$temp  = $_FILES["foto_file"]["tmp_name"];
$error  = $_FILES["foto_file"]["error"];
// print_r($imagem);exit;

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

		$query = $conn->prepare("INSERT INTO aluno (RA,nome_aluno, foto, RG, cpf, email, senha, celular, telefone, data_nascimento, fk_id_turma_aluno, fk_id_responsavel_aluno, fk_id_tipo_usuario_aluno, fk_id_escola_aluno)
            VALUES ('{$ra}','{$nome}','{$nome_imagem}','{$rg}','{$cpf_aluno}','{$email}','{$senha}','{$celular}','{$telefone}','{$data_nascimento}','{$turma}','{$id_responsavel}','5', '{$id_escola}')");

		if ($query->execute()) {
			if ($id_tipo_usuario == 2) {

				echo "<script>alert('Aluno cadastrado com sucesso');
					window.location='../../homeDiretor.html.php';
					</script>";
			} elseif ($id_tipo_usuario == 3) {

				echo "<script>alert('Aluno cadastrado com sucesso');
					window.location='../../homeSecretaria.html.php';
					</script>";
			} else {
				echo "<script>alert('Usuario sem permissão');
         		window.location='../../index.php'</script>";
			}
		} else {
			echo "<script>alert('Erro: Aluno não foi cadastrado');
				history.back();;
				 </script>";
		}
	}
}
