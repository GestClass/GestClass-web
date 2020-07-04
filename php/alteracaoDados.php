<?php

require_once 'conexao.php';

$tipo_usuario = $_POST['tipo_conta'];



if ($tipo_usuario == '5') {
    $nome_aluno = $_POST['nome'];
    $dataNasc = $_POST['data_nascimento'];
    $data = str_replace('/', '-', $dataNasc);
    $data_nascimento = date('Y-m-d', strtotime($data));
    $RG = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $id_turma = $_POST['id_turma'];
    $ra = $_POST['ra'];

    

    //  var_dump($nome_aluno, $data_nascimento, $RG, $cpf, $email, $celular, $telefone);exit;

    $image_file = $_FILES["foto_file"]["name"];
    $type  = $_FILES["foto_file"]["type"];
    $size  = $_FILES["foto_file"]["size"];
    $temp  = $_FILES["foto_file"]["tmp_name"];
    $error  = $_FILES["foto_file"]["error"];

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

            $caminho = "../assets/imagensBanco/" . $nome_imagem;

            move_uploaded_file($temp, $caminho);
        }
    }
    
             if (($nome_aluno != "")&&($data_nascimento != "")&&($RG != "")||($cpf != "")&&($email != "")&&
     ($celular != "")&&($telefone != "")) {



                 
                                                
                $query_up = 'UPDATE aluno SET foto = :foto, nome_aluno = :nome_aluno, data_nascimento = :data_nascimento,
                                        RG = :RG, cpf = :cpf, email = :email, celular = :celular, telefone = :telefone, 
                                        fk_id_turma_aluno = :fk_id_turma_aluno 
                                        WHERE RA = ' . $ra . '';

                

                $query_update = $conn->prepare($query_up);
                $query_update->bindParam(':foto', $nome_imagem);
                $query_update->bindParam(':nome_aluno', $nome_aluno);
                $query_update->bindParam(':data_nascimento', $data_nascimento);
                $query_update->bindParam(':RG', $RG);
                $query_update->bindParam(':cpf', $cpf);
                $query_update->bindParam(':email', $email);
                $query_update->bindParam(':celular', $celular);
                $query_update->bindParam(':telefone', $telefone);
                $query_update->bindParam(':fk_id_turma_aluno', $id_turma);

                $query_update->execute();


                           

                if ($query_update->rowCount()) {
                    ?>

                                        <script>
                                        alert('Dados alterados com sucesso')
                                        window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
                                        </script>

                                        <?php
                } else {
                    ?>

                                        <script>
                                        alert('Erro, confira os campos e tente novamente')
                                        window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
                                        </script>

                                        <?php
                }
            
        
    }else {
                        ?>
                    <script>
                    alert("Erro ao tentar alterar, confira os campos!!")
                    window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
                    </script>
                    <?php
                            }
   
}elseif ($tipo_usuario == '6') {

    $nome_responsavel = $_POST['nome_respon'];
    $dataNasc = $_POST['nascimento_respon'];
    $data = str_replace('/', '-', $dataNasc);
    $data_nascimento = date('Y-m-d', strtotime($data));
    $RG = $_POST['rg_respon'];
    $cpf = $_POST['cpf_respon'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $email = $_POST['email_respon'];
    $celular = $_POST['celular_respon'];
    $telefone = $_POST['telefone_respon'];
    $tel_comercial = $_POST['tel_comercial'];
    $ID_responsavel = $_POST['ID_responsavel'];

    $image_file = $_FILES["foto_file"]["name"];
    $type  = $_FILES["foto_file"]["type"];
    $size  = $_FILES["foto_file"]["size"];
    $temp  = $_FILES["foto_file"]["tmp_name"];
    $error  = $_FILES["foto_file"]["error"];

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

                $caminho = "../assets/imagensBanco/" . $nome_imagem;

                move_uploaded_file($temp, $caminho);
            }
        }

        
                if (($nome_responsavel != "")&&($data_nascimento != "")&&($RG != "")&&($cpf != "")&&($cep != "")&&
        ($numero != "")&&($complemento != "")&&($email != "")&&($celular != "")&&($telefone != "")&&($tel_comercial != "")) {

        // var_dump($nome_responsavel, $data_nascimento, $RG, $cpf,$numero,$complemento,$cep, $email, $celular, $telefone,
                    //               $tel_comercial, $ID_responsavel);exit;


    
                    $query_up = 'UPDATE responsavel SET foto = :foto, nome_responsavel = :nome_responsavel, data_nascimento = :data_nascimento,
                    RG = :RG, cpf = :cpf, cep = :cep, numero = :numero, complemento = :complemento, email = :email, celular = :celular, telefone = :telefone, 
                    telefone_comercial = :tel_comercial WHERE ID_responsavel = ' . $ID_responsavel . '';

                    $query_update = $conn->prepare($query_up);
                    $query_update->bindParam(':foto', $nome_imagem);
                    $query_update->bindParam(':nome_responsavel', $nome_responsavel);
                    $query_update->bindParam(':data_nascimento', $data_nascimento);
                    $query_update->bindParam(':RG', $RG);
                    $query_update->bindParam(':cpf', $cpf);
                    $query_update->bindParam(':cep', $cep);
                    $query_update->bindParam(':numero', $numero);
                    $query_update->bindParam(':complemento', $complemento);
                    $query_update->bindParam(':email', $email);
                    $query_update->bindParam(':celular', $celular);
                    $query_update->bindParam(':telefone', $telefone);
                    $query_update->bindParam(':tel_comercial', $tel_comercial);


                    $query_update->execute();

                    // var_dump($query_update);exit;

                    if ($query_update->rowCount()) {
                        ?>

                                <script>
                                alert('Dados alterados com sucesso')
                                window.location = '../dadosResponsaveis.html.php?id=<?php echo $ID_responsavel?>'
                                </script>

                            <?php
                    } else {
                        ?>

                            <script>
                            alert('Erro, confira os campos e tente novamente')
                            window.location = '../dadosResponsaveis.html.php?id=<?php echo $ID_responsavel?>'
                            </script>

                            <?php
                    }
                
            
        }
        else {
        ?>
            <script>
            alert("Erro ao tentar alterar, confira os campos!")
            window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
            </script>
            <?php
        }
    }elseif ($tipo_usuario == '4') {
        
        $nome_professor = $_POST['nome_professor'];
        $RG = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $telefone = $_POST['telefone'];
        $ID_professor = $_POST['ID_professor'];


        $image_file = $_FILES["foto_file"]["name"];
        $type  = $_FILES["foto_file"]["type"];
        $size  = $_FILES["foto_file"]["size"];
        $temp  = $_FILES["foto_file"]["tmp_name"];
        $error  = $_FILES["foto_file"]["error"];
    
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
    
                    $caminho = "../assets/imagensBanco/" . $nome_imagem;
    
                    move_uploaded_file($temp, $caminho);
                }
            }
    
                    // var_dump($nome_secretario, $RG, $cpf, $email, $celular, $telefone, $ID_secretario);exit;
    
                    if (($nome_professor != "")&&($RG != "")&&($cpf != "")&&($cep != "")&&($numero != "")
        &&($complemento != "")&&($email != "")&&($celular != "")&&($telefone != "")) {
                        $query_up = 'UPDATE professor SET foto = :foto,nome_professor = :nome_professor, rg = :RG, cpf = :cpf, 
        cep = :cep, numero = :numero, complemento = :complemento,email = :email, celular = :celular, telefone = :telefone WHERE ID_professor = ' . $ID_professor . '';
    
                        $query_update = $conn->prepare($query_up);
                        $query_update->bindParam(':foto', $nome_imagem);
                        $query_update->bindParam(':nome_professor', $nome_professor);
                        $query_update->bindParam(':RG', $RG);
                        $query_update->bindParam(':cpf', $cpf);
                        $query_update->bindParam(':cep', $cep);
                        $query_update->bindParam(':numero', $numero);
                        $query_update->bindParam(':complemento', $complemento);
                        $query_update->bindParam(':email', $email);
                        $query_update->bindParam(':celular', $celular);
                        $query_update->bindParam(':telefone', $telefone);
    
    
                        $query_update->execute();
    
    
    
                        if ($query_update->rowCount()) {
                            ?>

                        <script>
                        alert('Dados alterados com sucesso')
                        window.location ='../dadosUsuarios.html.php?id=<?php echo $ID_professor?>&tipo=<?php echo $tipo_usuario?>'
                        </script>

                    <?php
                        } else {
                            ?>

                    <script>
                    alert('Erro, confira os campos e tente novamente')
                    window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_professor?>&tipo=<?php echo $tipo_usuario?>'
                    </script>

                    <?php
                        }
                    
                        
            }
                else {
            ?>
    <script>
    alert("Erro ao tentar alterar, confira os campos!!!!!!")
    window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_professor?>&tipo=<?php echo $tipo_usuario?>'
    </script>
    <?php
        }
    
    
    } elseif ($tipo_usuario == '3') {

    $nome_secretario = $_POST['nome_secretario'];
    $RG = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $ID_secretario = $_POST['ID_secretario'];

    // var_dump($nome_secretario, $RG, $cpf, $email, $celular, $telefone, $ID_secretario);exit;

    $image_file = $_FILES["foto_file"]["name"];
        $type  = $_FILES["foto_file"]["type"];
        $size  = $_FILES["foto_file"]["size"];
        $temp  = $_FILES["foto_file"]["tmp_name"];
        $error  = $_FILES["foto_file"]["error"];
    
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
    
                    $caminho = "../assets/imagensBanco/" . $nome_imagem;
    
                    move_uploaded_file($temp, $caminho);
                }
            }

    if (($nome_secretario != "")&&($RG != "")&&($cpf != "")&&($email != "")&&($celular != "")&&
    ($telefone != "")) {
        $query_up = 'UPDATE secretario SET foto = :foto, nome_secretario = :nome_secretario, RG = :RG, cpf = :cpf, 
    cep = :cep, numero = :numero, complemento = :complemento,email = :email, celular = :celular, telefone = :telefone WHERE ID_secretario = ' . $ID_secretario . '';

        $query_update = $conn->prepare($query_up);
        $query_update->bindParam(':foto', $nome_imagem);
        $query_update->bindParam(':nome_secretario', $nome_secretario);
        $query_update->bindParam(':RG', $RG);
        $query_update->bindParam(':cpf', $cpf);
        $query_update->bindParam(':cep', $cep);
        $query_update->bindParam(':numero', $numero);
        $query_update->bindParam(':complemento', $complemento);
        $query_update->bindParam(':email', $email);
        $query_update->bindParam(':celular', $celular);
        $query_update->bindParam(':telefone', $telefone);


        $query_update->execute();



        if ($query_update->rowCount()) {
            ?>

<script>
alert('Dados alterados com sucesso')
window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_secretario?>&tipo=<?php echo $tipo_usuario?>'
</script>

<?php
        } else {
            ?>

<script>
alert('Erro, confira os campos e tente novamente')
window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_secretario?>&tipo=<?php echo $tipo_usuario?>'
</script>

<?php
        }
    } else {
        ?>
<script>
alert("Erro ao tentar alterar, confira os campos!")
window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
</script>
<?php
    }
} elseif ($tipo_usuario == '2') {
    $nome_diretor = $_POST['nome_diretor'];
    $RG = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $ID_diretor = $_POST['ID_diretor'];

    //  var_dump($nome_diretor, $RG, $cpf, $email, $celular, $telefone, $ID_diretor);exit;

    $image_file = $_FILES["foto_file"]["name"];
        $type  = $_FILES["foto_file"]["type"];
        $size  = $_FILES["foto_file"]["size"];
        $temp  = $_FILES["foto_file"]["tmp_name"];
        $error  = $_FILES["foto_file"]["error"];
    
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
    
                    $caminho = "../assets/imagensBanco/" . $nome_imagem;
    
                    move_uploaded_file($temp, $caminho);
                }
            }

    if (($nome_diretor != "")&&($RG != "")&&($cpf != "")&&($email != "")&&($celular != "")&&
    ($telefone != "")) {
        $query_up = 'UPDATE diretor SET foto = :foto, nome_diretor = :nome_diretor, RG = :RG, cpf = :cpf, 
    cep = :cep, numero = :numero, complemento = :complemento,email = :email, celular = :celular, telefone = :telefone WHERE ID_diretor = ' . $ID_diretor . '';

        $query_update = $conn->prepare($query_up);
        $query_update->bindParam(':foto', $nome_imagem);
        $query_update->bindParam(':nome_diretor', $nome_diretor);
        $query_update->bindParam(':RG', $RG);
        $query_update->bindParam(':cpf', $cpf);
        $query_update->bindParam(':cep', $cep);
        $query_update->bindParam(':numero', $numero);
        $query_update->bindParam(':complemento', $complemento);
        $query_update->bindParam(':email', $email);
        $query_update->bindParam(':celular', $celular);
        $query_update->bindParam(':telefone', $telefone);


        $query_update->execute();



        if ($query_update->rowCount()) {
            ?>

<script>
alert('Dados alterados com sucesso')
window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_diretor?>&tipo=<?php echo $tipo_usuario?>'
</script>

<?php
        } else {
            ?>

<script>
alert('Erro, confira os campos e tente novamente')
window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_diretor?>&tipo=<?php echo $tipo_usuario?>'
</script>

<?php
        }
    } else {
        ?>
<script>
alert("Erro ao tentar alterar, confira os campos!")
window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
</script>
<?php
}
}