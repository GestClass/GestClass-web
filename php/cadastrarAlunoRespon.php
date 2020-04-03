<?php

  include_once 'conexao.php';

  //Aluno
  $id_escola = $_SESSION["id_da_escola"];
  $nome_aluno = $_POST["nome_aluno"];
  $ra = $_POST["ra"];
  $rg_aluno = $_POST["rg_aluno"];
  $cpf_aluno = $_POST["cpf_aluno"];
  $nascimento_aluno = $_POST["nascimento_aluno"];
  $email_aluno = $_POST["email_aluno"];
  $senha_aluno = $_POST["senha_aluno"];
  $confsenha_aluno = $_POST["confsenha_aluno"];
  $celular_aluno = $_POST["celular_aluno"];
  $telefone_aluno = $_POST["telefone_aluno"];

  //Responsável
  $nome_respon = $_POST["nome_respon"];
  $ra = $_POST["ra"];
  $rg_respon = $_POST["rg_respon"];
  $cpf_respon = $_POST["cpf_respon"];
  $nascimento_respon = $_POST["nascimento_respon"];
  $cep = $_POST["cep"];
  $numero = $_POST["numero"];
  $complemento = $_POST["complemento"];
  $email_respon = $_POST["email_respon"];
  $senha_respon = $_POST["senha_respon"];
  $pin = $_POST["pin"];
  $confsenha_respon = $_POST["confsenha_respon"];
  $celular_respon = $_POST["celular_respon"];
  $telefone_respon = $_POST["telefone_respon"];


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
			
			$query = $conn->prepare("INSERT INTO aluno (nome_aluno,foto, rg_aluno, cpf_aluno, email_aluno, senha_aluno, celular_aluno, telefone_aluno, fk_id_tipo_usuario_aluno, fk_id_escola_aluno)
            VALUES ('{$nome_aluno}', '{$nome_imagem}', '{$rg_aluno}', '{$cpf_aluno}', '{$email_aluno}', '{$senha_aluno}', '{$celular_aluno}','{$telefone_aluno}','5' ,'{$id_escola}')");

			$query = $conn->prepare("INSERT INTO responsavel (nome_respon, foto, rg_respon, cpf_respon, cep, numero, complemento, email_respon, senha_respon, pin, celular_respon, telefone_respon, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel, fk_ra_aluno_responsavel)
            VALUES ('{$nome_respon}', '{$nome_imagem}', '{$rg_respon}', '{$cpf_respon}', '{cep}', '{numero}', '{complemento}', '{$email_respon}', '{$senha_respon}', '{$pin}', '{$celular_respon}','{$telefone_respon}','' ,'{$id_escola}','{$ra}' )");
            if ($query->execute()) {

                echo "<script>alert('Aluno e Responsável com sucesso');
                        window.location='../login.html.php';
                     </script>";
            }else{
				echo "<script>alert('Erro: Aluno e Responsável não cadastrado');
					history.back();
				</script>";
			

				 
            }

		 
		}
    }
    
?>