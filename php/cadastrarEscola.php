<?php

    include_once 'conexao.php';

    $nome_escola = $_POST["nome_escola"];
    $cnpj = $_POST["cnpj"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $qntdAlunos = $_POST["quantidade_alunos"];
    $dataPag = $_POST["data_pagamento"];
    $chk1 = $_POST["chk1"];
    $chk2 = $_POST["chk2"];
    $chk3 = $_POST["chk3"];
    $chk4 = $_POST["chk4"];
    $chk5 = $_POST["chk5"];

    $query = $conn->prepare("INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, data_pagamento_escola, quantidade_alunos, turma_bercario, turma_pre_escola, turma_fundamental_I, turma_fundamental_II, turma_medio) 
    VALUES ('$nome_escola', '$cep', $numero, '$complemento', '$cnpj', '$telefone', '$email', '$dataPag', $qntdAlunos, $chk1, $chk2, $chk3, $chk4, $chk5)");
    $query->bindValue(":nome_escola",$nome_escola);
    $query->bindValue(":cep",$cep);
    $query->bindValue(":numero",$numero);
    $query->bindValue(":complemento",$complemento);
    $query->bindValue(":CNPJ",$cnpj);
    $query->bindValue(":telefone",$telefone);
    $query->bindValue(":email",$email);
    $query->bindValue(":data_pagamento_escola",$dataPag);
    $query->bindValue(":quantidade_alunos",$qntdAlunos);
    $query->bindValue(":turma_bercario",$chk1);
    $query->bindValue(":turma_pre_escola",$chk2);
    $query->bindValue(":turma_fundamental_I",$chk3);
    $query->bindValue(":turma_fundamental_II",$chk4);
    $query->bindValue(":turma_medio",$chk4);
    $result = $query->execute();

    if ($result) {
        echo "bicha cagada";

        if ($chk1 != null) {
            $query = $conn->prepare("select email,senha from diretor where email=:email and senha=:senha");
        }
    }else{
        echo "te lascou otaria";
    }








?>