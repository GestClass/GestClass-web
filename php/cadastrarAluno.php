<?php

  include_once 'conexao.php';

  // Aluno
  $id_escola = $_SESSION["id_da_escola"];
  $nome = $_POST["nome"];
  $rg = $_POST["rg"];
  $cpf = $_POST["cpf"];
  $data_nascimento = ["data_nascimento"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $confsenha = $_POST["confsenha"];
  $celular = $_POST["celular"];
  $telefone = $_POST["telefone"];

  $image_file = $_FILES["txt_file"]["name"];
	$type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
	$size  = $_FILES["txt_file"]["size"];
	$temp  = $_FILES["txt_file"]["tmp_name"];
	$error  = $_FILES["txt_file"]["error"];
	// print_r($imagem);exit;
	
	if ($error==1){
		echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
			    history.back();
		    </script>";
	 }
	//print_r($imagem);exit;
	if ($image_file) {

		$largura = 2000;
		$altura = 3000;
		$tamanho = 2000000;
    	
    	if(!preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image_file, $ext)){
            echo "<script>alert('Ops! Isso não é uma imagem.');
                     history.back();
				 </script>";
            
   	 	}
	
		$dimensoes = getimagesize($temp);
		//print_r($dimensoes);exit;	
		if($dimensoes[0] > $largura) {
			echo "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		if($dimensoes[1] > $altura) {
			echo "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		if($size > $tamanho) {
   		 	echo "A imagem deve ter no máximo ".$tamanho." bytes";
		}else {
			
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image_file, $ext);

        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	
        	$caminho = "../assets/imagensBanco/" . $nome_imagem;
			
			move_uploaded_file($temp, $caminho);
			
			$query = $conn->prepare("INSERT INTO aluno (nome,foto, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_aluno, fk_id_escola_aluno)
            VALUES ('{$nome}', '{$nome_imagem}', '{$rg}', '{$cpf}', '{$email}', '{$senha}', '{$celular}','{$telefone}','5' ,'{$id_escola}')");

            if ($query->execute()) {

                echo "<script>alert('Diretor cadastrada com sucesso');
                        window.location='../login.html.php';
                     </script>";
            }else{
				echo "<script>alert('Erro: Diretor não cadastrado');
					history.back();
				</script>";
			

				 
            }

		
		}
    }
  
?>