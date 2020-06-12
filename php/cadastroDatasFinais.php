<?php

include_once 'conexao.php';

// recuperando id da escola
$id_escola = $_SESSION["id_escola"];

// Resgatando datas informadas
$dataBimestre1 = $_POST['dataBimestre1'];
$dataBimestre2 = $_POST['dataBimestre2'];
$dataBimestre3 = $_POST['dataBimestre3'];
$dataBimestre4 = $_POST['dataBimestre4'];

// Verificando preenchimento dos campos
if (($dataBimestre1 != "") && ($dataBimestre2 != "") && ($dataBimestre3 != "") && ($dataBimestre4 != "")) {

    // Comando para inserir no banco
    $sql_inserir_datas = $conn->prepare("INSERT INTO datas_fim_bimestres (bimestre1, bimestre2, bimestre3, bimestre4, fk_id_escola_datas_fim_bimestres) VALUES (:dataBimestre1, :dataBimestre2, :dataBimestre3, :dataBimestre4, :id_escola)");
    // Definir valores
    $sql_inserir_datas->bindParam(':dataBimestre1', $dataBimestre1, PDO::PARAM_STR);
    $sql_inserir_datas->bindParam(':dataBimestre2', $dataBimestre2, PDO::PARAM_STR);
    $sql_inserir_datas->bindParam(':dataBimestre3', $dataBimestre3, PDO::PARAM_STR);
    $sql_inserir_datas->bindParam(':dataBimestre4', $dataBimestre4, PDO::PARAM_STR);
    $sql_inserir_datas->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
    // Executar
    $sql_inserir_datas->execute();

    // Verificar sucesso
    if ($sql_inserir_datas->rowCount()) {
?>
        <script>
            alert('Cadastrado com Sucesso!!');
            window.location = '../homeDiretor.html.php';            
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Erro ao cadastrar!!\n\nNão podem ser cadastradas mais de uma data para cada bimestre, se for o caso, utilize a opção de alteração!!');
            history.back();
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert('Por favor, preencha todas as datas!!');
        history.back();
    </script>
<?php
}
?>