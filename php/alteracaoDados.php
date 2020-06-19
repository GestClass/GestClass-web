<?php

require_once 'conexao.php';

$tipo_usuario = $_POST['tipo_conta'];



if ($tipo_usuario == '5') {
    $nome_aluno = $_POST['nome'];
    $data = $_POST['data_nascimento'];
    $data_nascimento = date('Y/m/d', strtotime($data));
    $RG = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $id_turma = $_POST['id_turma'];
    $ra = $_POST['ra'];

    if (($nome_aluno != "")&&($data_nascimento != "")&&($RG != "")&&($cpf != "")&&($email != "")&&
            ($celular != "")&&($telefone != "")&&($id_turma!= "")) {
        
     $query_up = 'UPDATE aluno SET nome_aluno = :nome_aluno, data_nascimento = :data_nascimento,
     RG = :RG, cpf = :cpf, email = :email, celular = :celular, telefone = :telefone, 
     fk_id_turma_aluno = :fk_id_turma_aluno 
     WHERE RA = ' . $ra . '';

        $query_update = $conn->prepare($query_up);
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
    } else {
        ?>
                <script>
                    alert("Erro ao tentar alterar, confira os campos!")
                    window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
                </script>
        <?php
    }
} elseif ($tipo_usuario == '6') {
    $nome_responsavel = $_POST['nome_respon'];
    $data_nascimento = $_POST['nascimento_respon'];
    $RG = $_POST['rg_respon'];
    $cpf = $_POST['cpf_respon'];
    $email = $_POST['email_respon'];
    $celular = $_POST['celular_respon'];
    $telefone = $_POST['telefone_respon'];
    $tel_comercial = $_POST['tel_comercial'];
    $ID_responsavel = $_POST['ID_responsavel'];

    if (($nome_responsavel != "")&&($data_nascimento != "")&&($RG != "")&&($cpf != "")&&($email != "")&&
    ($celular != "")&&($telefone != "")&&($tel_comercial != "")) {

    // var_dump($nome_responsavel, $data_nascimento, $RG, $cpf, $email, $celular, $telefone,
        //  $tel_comercial, $ID_responsavel);exit;


        $query_up = 'UPDATE responsavel SET nome_responsavel = :nome_responsavel, data_nascimento = :data_nascimento,
     RG = :RG, cpf = :cpf, email = :email, celular = :celular, telefone = :telefone, 
     telefone_comercial = :tel_comercial WHERE ID_responsavel = ' . $ID_responsavel . '';

        $query_update = $conn->prepare($query_up);
        $query_update->bindParam(':nome_responsavel', $nome_responsavel);
        $query_update->bindParam(':data_nascimento', $data_nascimento);
        $query_update->bindParam(':RG', $RG);
        $query_update->bindParam(':cpf', $cpf);
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
    } else {
        ?>
                <script>
                    alert("Erro ao tentar alterar, confira os campos!")
                    window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
                </script>
        <?php
    }
} elseif ($tipo_usuario == '4') {
    $nome_professor = $_POST['nome_professor'];
    $RG = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $ID_professor = $_POST['ID_professor'];

    //  var_dump($nome_professor, $RG, $cpf, $email, $celular, $telefone, $ID_professor);exit;

    if (($nome_professor != "")&&($RG != "")&&($cpf != "")&&($email != "")&&($celular != "")&&
    ($telefone != "")) {



    $query_up = 'UPDATE professor SET nome_professor = :nome_professor, RG = :RG, cpf = :cpf, 
    email = :email, celular = :celular, telefone = :telefone WHERE ID_professor = ' . $ID_professor . '';

    $query_update = $conn->prepare($query_up);
    $query_update->bindParam(':nome_professor', $nome_professor);
    $query_update->bindParam(':RG', $RG);
    $query_update->bindParam(':cpf', $cpf);
    $query_update->bindParam(':email', $email);
    $query_update->bindParam(':celular', $celular);
    $query_update->bindParam(':telefone', $telefone);


    $query_update->execute();



    if ($query_update->rowCount()) {
        ?>

<script>
alert('Dados alterados com sucesso')
window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_professor?>&tipo=<?php echo $tipo_usuario?>'
</script>

<?php
    } else {
        ?>

<script>
alert('Erro, confira os campos e tente novamente')
window.location = '../dadosUsuarios.html.php?id=<?php echo $ID_professor?>&tipo=<?php echo $tipo_usuario?>'
</script>

<?php }
    } else {
        ?>
                <script>
                    alert("Erro ao tentar alterar, confira os campos!")
                    window.location = '../dadosUsuarios.html.php?id=<?php echo $ra?>&tipo=<?php echo $tipo_usuario?>'
                </script>
        <?php
    }
} elseif ($tipo_usuario == '3') {
    $nome_secretario = $_POST['nome_secretario'];
    $RG = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $ID_secretario = $_POST['ID_secretario'];

    // var_dump($nome_secretario, $RG, $cpf, $email, $celular, $telefone, $ID_secretario);exit;

    if (($nome_secretario != "")&&($RG != "")&&($cpf != "")&&($email != "")&&($celular != "")&&
    ($telefone != "")) {
        

        $query_up = 'UPDATE secretario SET nome_secretario = :nome_secretario, RG = :RG, cpf = :cpf, 
    email = :email, celular = :celular, telefone = :telefone WHERE ID_secretario = ' . $ID_secretario . '';

        $query_update = $conn->prepare($query_up);
        $query_update->bindParam(':nome_secretario', $nome_secretario);
        $query_update->bindParam(':RG', $RG);
        $query_update->bindParam(':cpf', $cpf);
        $query_update->bindParam(':email', $email);
        $query_update->bindParam(':celular', $celular);
        $query_update->bindParam(':telefone', $telefone);


        $query_update->execute();



        if ($query_update->rowCount()) {
            ?>

<script>
alert('Dados alterados com sucesso')
window.location = '../dadosUsuarios.html.php'
</script>

<?php
        } else {
            ?>

<script>
alert('Erro, confira os campos e tente novamente')
window.location = '../dadosUsuarios.html.php'
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
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $ID_diretor = $_POST['ID_diretor'];

    //  var_dump($nome_diretor, $RG, $cpf, $email, $celular, $telefone, $ID_diretor);exit;

    if (($nome_diretor != "")&&($RG != "")&&($cpf != "")&&($email != "")&&($celular != "")&&
    ($telefone != "")) {


    $query_up = 'UPDATE diretor SET nome_diretor = :nome_diretor, RG = :RG, cpf = :cpf, 
    email = :email, celular = :celular, telefone = :telefone WHERE ID_diretor = ' . $ID_diretor . '';

    $query_update = $conn->prepare($query_up);
    $query_update->bindParam(':nome_diretor', $nome_diretor);
    $query_update->bindParam(':RG', $RG);
    $query_update->bindParam(':cpf', $cpf);
    $query_update->bindParam(':email', $email);
    $query_update->bindParam(':celular', $celular);
    $query_update->bindParam(':telefone', $telefone);


    $query_update->execute();



    if ($query_update->rowCount()) {
        ?>

<script>
alert('Dados alterados com sucesso')
window.location = '../dadosUsuarios.html.php'
</script>

<?php
    } else {
        ?>

<script>
alert('Erro, confira os campos e tente novamente')
window.location = '../dadosUsuarios.html.php'
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