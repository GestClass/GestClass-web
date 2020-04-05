<?php

  include_once 'conexao.php';

  // $id_escola = $_SESSION["id_escola"];
  // $nome = $_POST["nome"];
  // $rg = $_POST["rg"];
  
  // $cpf = $_POST["cpf"];
	// $limcpf =  str_replace('.', '', $cpf);
  // $cpf_professor =  str_replace('-', '', $limcpf);
  
  // $cep = $_POST["cep"];
  // $numero = $_POST["numero"];
  // $complemento = $_POST["complemento"];
  // $email = $_POST["email"];
  // $senha = $_POST["senha"];
  // $confsenha = $_POST["confsenha"];
  // $celular = $_POST["celular"];
  // $telefone = $_POST["telefone"];
  $disciplina = $_POST["disciplina"];

  $portugues = isset($_POST['portugues']) ? $_POST['portugues'] : 0;
  $ingles = isset($_POST['ingles']) ? $_POST['ingles'] : 0;
  $matematica = isset($_POST['matematica']) ? $_POST['matematica'] : 0;
  $biologia = isset($_POST['biologia']) ? $_POST['biologia'] : 0;
  $ciencias = isset($_POST['ciencias']) ? $_POST['ciencias'] : 0;
  $quimica = isset($_POST['quimica']) ? $_POST['quimica'] : 0;
  $fisica = isset($_POST['fisica']) ? $_POST['fisica'] : 0;
  $filosofia = isset($_POST['filosofia']) ? $_POST['filosofia'] : 0;
  $historia = isset($_POST['historia']) ? $_POST['historia'] : 0;
  $geografia = isset($_POST['geografia']) ? $_POST['geografia'] : 0;
  $sociologia = isset($_POST['sociologia']) ? $_POST['sociologia'] : 0;
  $ed_fisica = isset($_POST['ed_fisica']) ? $_POST['ed_fisica'] : 0;

  
  // $image_file = $_FILES["foto_file"]["name"];
	// $type  = $_FILES["foto_file"]["type"]; //file name "foto_file" 
	// $size  = $_FILES["foto_file"]["size"];
	// $temp  = $_FILES["foto_file"]["tmp_name"];
	// $error  = $_FILES["foto_file"]["error"];
	// // print_r($imagem);exit;
  
  if ($portugues == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:1 WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":portugues",$portugues);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($ingles == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:ingles WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":ingles",$ingles);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($matematica == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:matematica WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":matematica",$matematica);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($biologia == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:biologia WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":biologia",$biologia);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($ciencias == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:ciencias WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":ciencias",$ciencias);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($quimica == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:quimica WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":quimica",$quimica);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($fisica == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:fisica WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":fisica",$fisica);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($filosofia == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:filosofia WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":filosofia",$filosofia);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($historia == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:historia WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":historia",$historia);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($geografia == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:geografia WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":geografia",$geografia);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($sociologia == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:sociologia WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":sociologia",$sociologia);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}
  if ($ed_fisica == 1) {
    $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:ed_fisica WHERE professor.id_escola = $id_escola");
    $query_up->bindValue(":ed_fisica",$ed_fisica);
    $executa = $query_up->execute();

    if ($executa == 0) {
        echo "<script>alert('Update de disciplina não foi efetuado');
             history.back();</script>";
    }
}

echo $disciplina;
	// if ($error==1){
	// 	echo "<script>alert('O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini');
	// 		    history.back();
	// 	    </script>";
	//  }
	// //print_r($imagem);exit;
	// if ($image_file) {

	// 	$largura = 2000;
	// 	$altura = 3000;
	// 	$tamanho = 2000000;
    	
  //   	if(!preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image_file, $ext)){
  //           echo "<script>alert('Ops! Isso não é uma imagem.');
  //                    history.back();
	// 			 </script>";
            
  //  	 	}
	
	// 	$dimensoes = getimagesize($temp);
	// 	//print_r($dimensoes);exit;	
	// 	if($dimensoes[0] > $largura) {
	// 		echo "A largura da imagem não deve ultrapassar ".$largura." pixels";
	// 	}

	// 	if($dimensoes[1] > $altura) {
	// 		echo "Altura da imagem não deve ultrapassar ".$altura." pixels";
	// 	}
		
	// 	if($size > $tamanho) {
  //  		 	echo "A imagem deve ter no máximo ".$tamanho." bytes";
	// 	}else {
			
	// 		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image_file, $ext);

  //       	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	
  //       	$caminho = "../assets/imagensBanco/" . $nome_imagem;
			
	// 		move_uploaded_file($temp, $caminho);
			
	// 		$query = $conn->prepare("INSERT INTO professor(nome_professor, foto, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_aulas_professor, fk_id_tipo_usuario_professor, fk_id_escola_professor) 
  //     VALUES ('{$nome}','{$nome_imagem}','{$cep}','{$numero}','{$complemento}','{$rg}','{$cpf_professor}','{$email}','{$senha}','{$celular}','{$telefone}', '{$disciplina}','4', '{$id_escola}')");
  //           if ($query->execute()) {

  //             echo "<script>alert('Professor cadastrado com sucesso');
  //             window.location='../homeSecretaria.html.php';
  //             </script>";

  //           }else{
  //             print_r($query);
  //             // echo "<script>alert('Erro: Professor não foi cadastrado');
  //             // history.back();;
  //             // </script>";
				
  //           }

		
	// 	}
  //   }
?>