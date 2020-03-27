<?php

  require_once './Image.class.php';
  include_once 'conexao.php';

  $tipoConta = $_POST["btnSubmit"];

  switch ($tipoConta) {
    case 'aluno':
      cadastroAluno();
      break;

    case 'prof':
      cadastroProf();
      break;

    case 'sec':
      cadastroSec();
      break;
    
    default:
      echo "nada";
      break;
  }

  function cadastroAluno(){

    // dados do aluno
    $foto = $_FILES["foto"];
    $ra = $_POST["ra"];
    $nome = $_POST["nome"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $nasc = $_POST["nasc"];
    $email = $_POST["email"];
    $cel = $_POST["cel"];
    $ensino = $_POST["ensino"];
    $turma = $_POST["turma"];

    // opcao do responsavel(novo ou existente)
    $respSit =  $_POST["respSit"];
    $idResp = 1;


    if ($respSit == 'existe') {

      //  consulta no banco pra pegar o id do responsavel'
      $cpfResp = $_POST["cpfResp"];
      $query = $conn->prepare("SELECT ID_responsavel AS id FROM responsavel WHERE cpf = {$cpfResp}");
      $query->execute();

      $idResp = $query->fetch(PDO::FETCH_ASSOC);
      
    } else{

      //  dados do responsavel
      $nomeResp =  $_POST["nomeResp"];
      $rgResp =  $_POST["rgResp"];
      $cpfResp = $_POST["cpfResp"];
      $nascResp =  $_POST["nascResp"];
      $celResp = $_POST["celResp"];
      $telResp = $_POST["telResp"];
      $telcomResp =  $_POST["telcomResp"];
      $emailResp = $_POST["emailResp"];
      $cepResp = $_POST["cepResp"];
      $numResp = $_POST["numResp"];
      $compResp =  $_POST["compResp"];

      // cadastro do responsavel
      $query = $conn->prepare("INSERT INTO responsavel (ID_responsavel, nome_responsavel, cep, numero, complemento, RG, cpf, email, senha, pin, celular, telefone, telefone_comercial, data_nascimento, data_pagamento_responsavel, fk_ra_aluno_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel) VALUES (NULL, '{$nomeResp}', '{$celResp}', '{$numResp}', '{$compResp}', '{$rgResp}', '{$cpfResp}', '{$email}', '{$cpfResp}', 123456, '{$celResp}', '{$telResp}', ' {$telcomResp}', '{$ra}', 6, 1)");

      if ($query->execute()) {
        echo "<script>console.log('deu bom');</script>";

        //  consulta no banco pra pegar o id do responsavel'
        $cpfResp = $_POST["cpfResp"];
        $query = $conn->prepare("SELECT ID_responsavel AS id FROM responsavel WHERE cpf = {$cpfResp}");
        $query->execute();

        $idResp = $query->fetch(PDO::FETCH_ASSOC);
      }else{
        echo "<script>console.log('deu ruim'); history.back();</script>";
        exit;
      }
    }

    // funcao de upload da foto do aluno que retorna o nome e a extensao da foto pra insercao no banco
    

    // cadastro do aluno
    $query = $conn->prepare("INSERT INTO aluno (RA, nome_aluno, foto, RG, cpf, email, senha, celular, data_nascimento, fk_id_turma_aluno, fk_id_responsavel_aluno, fk_id_dados_aluno, fk_id_tipo_usuario_aluno, fk_id_escola_aluno) VALUES ('{$ra}', '{$nome}', '{$pathFotoAluno}', '{$rg}', '{$cpf}', '{$email}', '{$cpf}', '{$cel}', '{$nasc}', '{$turma}', '{$idResp}', 1, 5, 1)");

    if ($query->execute()) {
      echo "<script>alert('deu bom'); history.back();</script>";
    }else{
      echo "<script>alert('deu ruim'); history.back();</script>";
    }
  }

  function cadastroProf(){

    // dados do professor
    $foto = $_FILES["foto"];
    $nome = $_POST["nome"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $nasc = $_POST["nasc"];
    $email = $_POST["email"];
    $cel = $_POST["cel"];
    $tel = $_POST["tel"];
    $cep = $_POST["cep"];
    $num = $_POST["num"];
    $comp =  $_POST["comp"];

    $pathFotoProf = Image::processaImagem($foto);

    // cadastro do professor
    $query = $conn->prepare("INSERT INTO professor (ID_professor, nome_professor, foto, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, data_nascimento, fk_id_aulas_professor, fk_id_tipo_usuario_professor, fk_id_escola_professor) VALUES (NULL, '{$nome}', '{$pathFotoProf}', '{$cep}', '{$num}', '{$comp}', '{$rg}', '{$cpf}', '{$email}', '{$cpf}', '{$cel}', ' {$tel}', '{$nasc}', 1, 6, 1)");

    if ($query->execute()) {
      echo "<script>alert('deu bom'); history.back();</script>";
    }else{
      echo "<script>alert('deu ruim'); history.back();</script>";
    }
  }

  function cadastroSec(){

    // dados da secretaria
    $foto = $_FILES["foto"];
    $nome = $_POST["nome"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $nasc = $_POST["nasc"];
    $email = $_POST["email"];
    $cel = $_POST["cel"];
    $tel = $_POST["tel"];
    $cep = $_POST["cep"];
    $num = $_POST["num"];
    $comp =  $_POST["comp"];

    $pathFotoProf = Image::processaImagem($foto);

    // cadastro da secretaria
    $query = $conn->prepare("INSERT INTO professor (ID_secretario, nome_secretario, foto, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, data_nascimento, fk_id_tipo_usuario_secretario, fk_id_escola_secretario) VALUES (NULL, '{$nome}', '{$pathFotoProf}', '{$cep}', '{$num}', '{$comp}', '{$rg}', '{$cpf}', '{$email}', '{$cpf}', '{$cel}', ' {$tel}', '{$nasc}', 1, 6, 1)");

    if ($query->execute()) {
      echo "<script>alert('deu bom'); history.back();</script>";
    }else{
      echo "<script>alert('deu ruim'); history.back();</script>";
    }
  }









?>