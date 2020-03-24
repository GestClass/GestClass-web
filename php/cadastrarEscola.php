<?php

    include_once 'conexao.php';

    $nome_escola = $_POST["nome_escola"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cnpj = $_POST["cnpj"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataPag = $_POST["data_pagamento"];   
    $qntdAlunos = $_POST["quantidade_alunos"];
    
    // $chk1 = $_POST["chk1"];
    // $chk2 = $_POST["chk2"];
    // $chk3 = $_POST["chk3"];
    // $chk4 = $_POST["chk4"];
    // $chk5 = $_POST["chk5"];

    $query = $conn->prepare("INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, quantidade_alunos, data_pagamento_escola, turma_bercario, turma_pre_escola, turma_fundamental_I, turma_fundamental_II, turma_medio) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '0', '0', '0', '0', '0');");

    if ($query->execute(array($nome_escola, $cep, $numero, $complemento, $cnpj, $telefone, $email, $qntdAlunos, $dataPag))) {
        echo "bicha cagada";

        // if ($chk1 != null) {
        //     $query = $conn->prepare("select email,senha from diretor where email=:email and senha=:senha");
        // }
    }else{
        echo "te lascou otaria";
    }








?>