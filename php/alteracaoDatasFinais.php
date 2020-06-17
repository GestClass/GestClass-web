<?php

include_once 'conexao.php';

// resgatando valores dos campos para fazer alteração
$data1 = $_POST['dataBimestre1'];
$bimestre1 = date('Y/m/d', strtotime($data1));
$data2 = $_POST['dataBimestre2'];
$bimestre2 = date('Y/m/d', strtotime($data2));
$data3 = $_POST['dataBimestre3'];
$bimestre3 = date('Y/m/d', strtotime($data3));
$data4 = $_POST['dataBimestre4'];
$bimestre4 = date('Y/m/d', strtotime($data4));

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