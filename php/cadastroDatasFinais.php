<?php

include_once 'conexao.php';

// recuperando id da escola
$id_escola = $_SESSION["id_escola"];

// Verificar se ja existem datas cadastradas para o ano atual
$select_datas_finais = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola AND ano_datas = YEAR(NOW())");
$select_datas_finais->execute();

if ($select_datas_finais->rowCount()) {
    ?>
    <script>
        alert('Desculpe, você já possui datas de fim de bimestres cadastradas para esse ano, caso deseje altera-la(s), utilize o botão Alterar');
        history.back();
    </script>
<?php
} else {

    // Resgatando datas informadas e ajustando a data para o banco
    $data1 = $_POST['dataBimestre1'];
    $dataB1 = str_replace('/', '-', $data1);
    $dataBimestre1 = date('Y-m-d', strtotime($dataB1));

    $data2 = $_POST['dataBimestre2'];
    $dataB2 = str_replace('/', '-', $data2);
    $dataBimestre2 = date('Y-m-d', strtotime($dataB2));

    $data3 = $_POST['dataBimestre3'];
    $dataB3 = str_replace('/', '-', $data3);
    $dataBimestre3 = date('Y-m-d', strtotime($dataB3));

    $data4 = $_POST['dataBimestre4'];
    $dataB4 = str_replace('/', '-', $data4);
    $dataBimestre4 = date('Y-m-d', strtotime($dataB4));

    // Verificando preenchimento dos campos
    if (($data1 != "") && ($data2 != "") && ($data3 != "") && ($data4 != "")) {

        // Declarando variável com o ano
        $ano = date('Y');

        // Comando para inserir no banco
        $sql_inserir_datas = $conn->prepare("INSERT INTO datas_fim_bimestres (bimestre1, bimestre2, bimestre3, bimestre4, ano_datas, fk_id_escola_datas_fim_bimestres) VALUES (:dataBimestre1, :dataBimestre2, :dataBimestre3, :dataBimestre4, :ano, :id_escola)");
        // Definir valores
        $sql_inserir_datas->bindParam(':dataBimestre1', $dataBimestre1, PDO::PARAM_STR);
        $sql_inserir_datas->bindParam(':dataBimestre2', $dataBimestre2, PDO::PARAM_STR);
        $sql_inserir_datas->bindParam(':dataBimestre3', $dataBimestre3, PDO::PARAM_STR);
        $sql_inserir_datas->bindParam(':dataBimestre4', $dataBimestre4, PDO::PARAM_STR);
        $sql_inserir_datas->bindParam(':ano', $ano, PDO::PARAM_STR);
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
                alert('Erro ao cadastrar!!');
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
}
?>