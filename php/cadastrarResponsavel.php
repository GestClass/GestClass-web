<?php

  include_once 'conexao.php';

  //Responsavel
  $id_escola = $_SESSION["id_escola"];
  $nome_respon = $_POST["nome_respon"];
  $rg_respon = $_POST["rg_respon"];

  $cpf_r = $_POST["cpf_respon"];
  $limcpf =  str_replace('.', '', $cpf_r);
  $cpf_respon =  str_replace('-', '', $limcpf);

  $nascimento_respon = $_POST["nascimento_respon"];
  $cep = $_POST["cep"];
  $numero = $_POST["numero"];
  $complemento = $_POST["complemento"];
  $email_respon = $_POST["email_respon"];
  $senha_respon = $_POST["senha_respon"];
  $confsenha_respn = $_POST["confsenha_respon"];
  $pin = $_POST["pin"];
  $celular_respon = $_POST["celular_respon"];
  $telefone_respon = $_POST["telefone_respon"];
  $tel_comercial = $_POST["tel_comercial"];
  $data_pagamento = $_POST["data_pagamento"];

  $image_file = $_FILES["foto_file"]["name"];
	$type  = $_FILES["foto_file"]["type"]; //file name "foto_file" 
	$size  = $_FILES["foto_file"]["size"];
	$temp  = $_FILES["foto_file"]["tmp_name"];
	$error  = $_FILES["foto_file"]["error"];
  //print_r($imagem);exit;

  

	
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
      
      $query_responsavel = $conn->prepare("INSERT INTO responsavel(nome_responsavel, foto, cep, numero, complemento, RG, cpf, email, senha, pin, celular, telefone, telefone_comercial, data_nascimento, data_pagamento_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel)
           VALUES ('{$nome_respon}','{$nome_imagem}', '{$cep}', '{$numero}', '{$complemento}', '{$rg_respon}', '{$cpf_respon}', '{$email_respon}', '{$senha_respon}', '{$pin}', '{$celular_respon}', '{$telefone_respon}', '{$tel_comercial}', '{$nascimento_respon}', '{$data_pagamento}','6', '{$id_escola}')");

            if ($query_responsavel->execute()) {

              echo "<script>alert('Responsável cadastrado com sucesso');
			  window.location='../cadastrarAluRespon.html.php';
			   </script>";
  
            }else{
				echo "<script>alert('Erro: Responsável não foi cadastrado');
				history.back();;
			 	</script>";
            }

		
		}
    }

?>