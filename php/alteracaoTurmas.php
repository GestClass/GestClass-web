<?php

include_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$ID_turma = $_POST['turmaAntiga'];

$query_alunos = $conn->prepare("SELECT nome_aluno, RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $ID_turma");
$query_alunos->execute();



while ($dados_alunos = $query_alunos->fetch(PDO::FETCH_ASSOC)) {
    if (isset($_POST[$dados_alunos['RA']])) {
        $turma =  $_POST['turma'];

        // $turno = $_POST['turno'];

        $ra = intval(($_POST[$dados_alunos['RA']]));

        $query_turma = $conn->prepare('UPDATE aluno SET fk_id_turma_aluno = :turma WHERE RA = '.$ra.' ');
    
        $query_turma->bindParam(':turma', $turma);

        $query_turma->execute();

    // var_dump($query_turma->rowCount());
    } else {
        ?><script> Alert('Dados não alterado') </script><?php
    }
}

//  var_dump($id_tipo_usuario);exit;

if ($id_tipo_usuario == "3") {?>

<script>
        alert('Alterado com Sucesso!!')
        window.location = '../homeSecretaria.html.php'
        </script>
<?php

 } elseif($id_tipo_usuario == "2") {?>

        
        <script>
    alert('Alterado com Sucesso!!')
    window.location = '../homeDiretor.html.php'
    </script> 
        
        <?php
    } else { ?>

        <script>
        alert('Usuário sem permissão!!')
        window.location = '../homeSecretaria.html.php'
        </script> <?php

    }
