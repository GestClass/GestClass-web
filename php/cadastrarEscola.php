<?php

    include_once 'conexao.php';

    $nome_escola = $_POST["nome_escola"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cnpj = $_POST["cnpj"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataPag = $_POST["data_pagamento_escola"];   
    $qntdAlunos = $_POST["quantidade_alunos"];
    
    // $chk1 = $_POST["chk1"];
    // $chk2 = $_POST["chk2"];
    // $chk3 = $_POST["chk3"];
    // $chk4 = $_POST["chk4"];
    // $chk5 = $_POST["chk5"];

    $query = $conn->prepare("INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, data_pagamento_escola, quantidade_aluno) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bindValue(":nome_escola",$nome_escola);
    $query->bindValue(":cep",$cep);
    $query->bindValue(":numero",$numero);
    $query->bindValue(":complemento",$complemento);
    $query->bindValue(":cnpj",$cnpj);
    $query->bindValue(":telefone",$telefone);
    $query->bindValue(":email",$email);
    $query->bindValue(":data_pagamento_escola",$dataPag);
    $query->bindValue(":quantidade_alunos",$qntdAlunos);
    // $query->bindValue(":turma_bercario",$chk1);
    // $query->bindValue(":turma_pre_escola",$chk2);
    // $query->bindValue(":turma_fundamental_I",$chk3);
    // $query->bindValue(":turma_fundamental_II",$chk4);
    // $query->bindValue(":turma_medio",$chk4);
    $query->execute();
    print_r($query->execute(););
    exit();

    if ($result) {
        echo "bicha cagada";

        // if ($chk1 != null) {
        //     $query = $conn->prepare("select email,senha from diretor where email=:email and senha=:senha");
        // }
    }else{
        echo "te lascou otaria";
    }








?>