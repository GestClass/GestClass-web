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
    
    $chk1 = $_POST["chk1"];
    $chk2 = $_POST["chk2"];
    $chk3 = $_POST["chk3"];
    $chk4 = $_POST["chk4"];
    $chk5 = $_POST["chk5"];
    

    $query = $conn->prepare("INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, quantidade_alunos, data_pagamento_escola, turma_bercario, turma_pre_escola, turma_fundamental_I, turma_fundamental_II, turma_medio) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '0', '0', '0', '0', '0');");

    if ($query->execute(array($nome_escola, $cep, $numero, $complemento, $cnpj, $telefone, $email, $qntdAlunos, $dataPag))) {
        echo "<script>alert('bicha cagada inseriu');
        </script>";


        if ($chk1 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_bercario=:chk1 WHERE turma_bercario=0");
            $query_up->bindValue(":chk1",$chk1);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('não foi otaria');
                     history.back();</script>";
            }
        }

        if ($chk2 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_pre_escola=:chk2 WHERE turma_pre_escola=0");
            $query_up->bindValue(":chk2",$chk2);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('não foi otaria');
                     history.back();</script>";
            }
        }

        if ($chk3 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_fundamental_I=:chk3 WHERE turma_fundamental_I=0");
            $query_up->bindValue(":chk3",$chk3);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('não foi otaria');
                     history.back();</script>";
            }
        }

        if ($chk4 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_fundamental_II=:chk4 WHERE turma_fundamental_II=0");
            $query_up->bindValue(":chk4",$chk4);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('não foi otaria');
                     history.back();</script>";
            }
        }

        if ($chk5 == 1) {
            $query_up = $conn->prepare("UPDATE escola SET turma_medio=:chk5 WHERE turma_medio=0");
            $query_up->bindValue(":chk5",$chk5);
            $executa = $query_up->execute();

            if ($executa == 0) {
                echo "<script>alert('não foi otaria');
                     history.back();</script>";
            }
        }
        

    }else{
        echo "<script>alert('te lascou otaria');
        history.back();</script>";
    }








?>