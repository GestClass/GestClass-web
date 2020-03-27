<?php

    include_once 'conexao.php';

    $id_escola = $_GET["id_escola"];
    $nome_diretor = $GET["nome_diretor"];
    $cep = $GET["cep"];
    $numero = $GET["numero"];
    $complemento = $GET["complemento"];
    $rg = $GET["rg"];
    $cpf = $GET["cpf"];
    $email = $GET["email"];
    $senha = $GET["senha"];
    $confsenha = $GET["confsenha"];
    $celular = $GET["celular"];
    $telefone = $GET["telefone"];

    $imagem = $_FILES["imagem"];
	//print_r($imagem);exit;
	
	if ($imagem["error"]==1){
		echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
			    history.back();
		    </script>";
	 }
	//print_r($imagem);exit;
	if ($imagem["name"]) {

		$largura = 2000;
		$altura = 3000;
		$tamanho = 2000000;
    	
    	if(!preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext)){
            echo "<script>alert('Ops! Isso não é uma imagem.');
                     history.back();
                 </script>";
            
   	 	}
	
		$dimensoes = getimagesize($imagem["tmp_name"]);
		//print_r($dimensoes);exit;	
		if($dimensoes[0] > $largura) {
			echo "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		if($dimensoes[1] > $altura) {
			echo "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		if($imagem["size"] > $tamanho) {
   		 	echo "A imagem deve ter no máximo ".$tamanho." bytes";
		}else {
			
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	
        	$caminho = "../assets/img" . $nome_imagem;
			
			move_uploaded_file($imagem["tmp_name"], $caminho);
			
			$query = $conn->prepare("INSERT INTO escola (nome_diretor,foto, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_diretor, fk_id_escola_diretor)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,'2',?)");

            if ($query->execute(array($nome_diretor, $imagem ,$cep, $numero, $complemento, $rg, $cpf, $email, $senha, $celular,$telefone, $id_escola))) {

                echo "<script>alert('Escola cadastrada com sucesso');
                        history.back();
                     </script>";
            }else{
                echo "<script>alert('TE LASCOU KSKS');
                    history.back();
                 </script>";
            }

		
		}
	}



?>