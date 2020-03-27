<?php

  require_once './Image.class.php';

  $tipoConta = $_POST["btnSubmit"];

  switch ($tipoConta) {
    case 'aluno':
      cadastroAluno();
      break;

    case 'resp':
      cadastroResp();
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
    $foto =   $_FILES['foto'];
    $ra =     $_POST["ra"];
    $nome =   $_POST["nome"];
    $rg =     $_POST["rg"];
    $cpf =    $_POST["cpf"];
    $nasc =   $_POST["nasc"];
    $email =  $_POST["email"];
    $cel =    $_POST["cel"];
    $ensino = $_POST["ensino"];
    $turma=   $_POST["turma"];


    echo Image::processaImagem($foto);

  }









?>