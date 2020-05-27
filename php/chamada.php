<?php
    require_once  'conexao.php';

    
    //$dataChamada = $_POST['dataChamada'];
    $id = null ;

    $query_presenca = $conn->prepare('SELECT RA FROM aluno WHERE fk_id_escola_aluno = 1 AND fk_id_turma_aluno = 16');
    $query_presenca->execute();

    while ($alunos = $query_presenca->fetch(PDO::FETCH_ASSOC)) {

        $presenca = $_POST[$alunos['RA'] . 'presenca'];
        $ra = $alunos['RA'];
        $disciplina =  1;
        $idProfessor = 1;
    
    $ra = $alunos['RA'];
    $disciplina =  1;
    $idProfessor = 1;
    
    
    if ($presenca == "") {
        $presenca = 0;
    }

    if($presenca != ""){
    
        if($presenca = 1){
        
            $query_presenca = $conn->prepare("INSERT INTO chamada_aluno VALUES (:id,:presenca,00000000,:ra,:id_disciplina,:id_professor)"); 
            
            $query_presenca->bindParam(':id', $id, PDO::PARAM_STR);
            $query_presenca->bindParam(':presenca', $presenca, PDO::PARAM_STR);
            //$query_presenca->bindParam(':data_chamada', $dataChamada, PDO::PARAM_STR);
            $query_presenca->bindParam(':ra', $ra, PDO::PARAM_STR);
            $query_presenca->bindParam(':id_disciplina', $disciplina, PDO::PARAM_STR);
            $query_presenca->bindParam(':id_professor', $idProfessor, PDO::PARAM_STR);
            
            $query_presenca->execute();
         
        }
        if ($query_presenca->rowCount()) {
?>
            <script>
                    alert("Cadastrado com sucesso!!")
                    window.location = '../chamada.html.php'
            </script>
        <?php
        } else {
        ?>
            <script>
                    alert("Erro ao cadastrar!!")
                    history.back()
             </script>
         
<?php
        }
    } else {
        ?>
            <script>
                alert("tem erro em algo!")
                history.back()
            </script>
        <?php
    }
}
?>