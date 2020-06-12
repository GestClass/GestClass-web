<?php

include_once 'conexao.php';

// resgatando valores dos campos para fazer alteração
$bimestre1 = $_POST['dataBimestre1'];
$bimestre2 = $_POST['dataBimestre2'];
$bimestre3 = $_POST['dataBimestre3'];
$bimestre4 = $_POST['dataBimestre4'];

// Comando de alteração no banco de dados
$sql_alteracao_data = $conn->prepare("UPDATE datas_fim_bimestres SET bimestre1 = :bimestre1, bimestre2 = :bimestre2, bimestre3 = :bimestre3, bimestre4 = :bimestre4");
// Alterando parâmetros passados
$sql_alteracao_data->bindParam(':bimestre1', $bimestre1, PDO::PARAM_STR);
$sql_alteracao_data->bindParam(':bimestre2', $bimestre2, PDO::PARAM_STR);
$sql_alteracao_data->bindParam(':bimestre3', $bimestre3, PDO::PARAM_STR);
$sql_alteracao_data->bindParam(':bimestre4', $bimestre4, PDO::PARAM_STR);
// Executar comando
$sql_alteracao_data->execute();

?>

<script>
    alert('Dados alterados com sucesso!!');
    window.location = '../homeDiretor.html.php';
</script>