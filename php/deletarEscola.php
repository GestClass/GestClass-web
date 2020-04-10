<?php

    include_once 'conexao.php';

    $id_escola = $_GET["id_escola"];
    // turmas_professor
    // disciplinas_professor
    // boletim_aluno
    // chamada_aluno
    
    
    $query_delete_aluno = $conn->prepare("delete from aluno where fk_id_escola_aluno = $id_escola");
    $query_delete_aluno->execute();
    // var_dump($query_delete_aluno->execute());

    $query_delete_responsavel = $conn->prepare("delete from responsavel where fk_id_escola_responsavel = $id_escola");
    $query_delete_responsavel->execute();
    // var_dump($query_delete_responsavel->execute());

    $query_delete_professor = $conn->prepare("delete from professor where fk_id_escola_professor = $id_escola");
    $query_delete_professor->execute();
    // var_dump($query_delete_professor->execute());
    
    $query_delete_secretario = $conn->prepare("delete from secretario where fk_id_escola_secretario = $id_escola");
    $query_delete_secretario->execute();
    // var_dump($query_delete_secretario->execute());

    $query_delete_diretor = $conn->prepare("delete from diretor where fk_id_escola_diretor = $id_escola");
    $query_delete_diretor->execute();
    // var_dump($query_delete_diretor->execute());

    $query_delete_escola = $conn->prepare("delete from escola where id_escola = $id_escola");
    $query_delete_escola->execute();
    // var_dump($query_delete_escola->execute());

    if ($query_delete_aluno->execute() && $query_delete_responsavel->execute() && $query_delete_professor->execute() &&  $query_delete_secretario->execute()
    && $query_delete_diretor->execute() && $query_delete_escola->execute()) {
        echo "<script>alert('Escola deletada com sucesso');
                    history.back();</script>";
    }else{
        echo "<script>alert('A escola não foi deletada');
                    history.back();</script>";
    }
    





?>