<?php

include_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

// resgatando valores dos campos para fazer alteração
$data1 = $_POST['dataBimestre1'];
$dataB1 = str_replace('/', '-', $data1);
$bimestre1 = date('Y-m-d', strtotime($dataB1));

$data2 = $_POST['dataBimestre2'];
$dataB2 = str_replace('/', '-', $data2);
$bimestre2 = date('Y-m-d', strtotime($dataB2));

$data3 = $_POST['dataBimestre3'];
$dataB3 = str_replace('/', '-', $data3);
$bimestre3 = date('Y-m-d', strtotime($dataB3));

$data4 = $_POST['dataBimestre4'];
$dataB4 = str_replace('/', '-', $data4);
$bimestre4 = date('Y-m-d', strtotime($dataB4));

// Comando de alteração no banco de dados
$sql_alteracao_data = $conn->prepare("UPDATE datas_fim_bimestres SET bimestre1 = :bimestre1, bimestre2 = :bimestre2, bimestre3 = :bimestre3, bimestre4 = :bimestre4 WHERE fk_id_escola_datas_fim_bimestres = $id_escola AND ano_datas = YEAR(NOW())");
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