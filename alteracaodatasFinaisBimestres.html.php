<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="css/boletimCadastro.css" />
</head>


<body class="body_estilizado">

    <?php
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } else if ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    }

    // Preparar select para buscar as datas de fim de bimestre
    $sql_select_datas = $conn->prepare("SELECT * FROM datas_fim_bimestres WHERE fk_id_escola_datas_fim_bimestres = $id_escola");
    // Executar comando
    $sql_select_datas->execute();
    // Armazenar retorno
    $datas_fim_bimestres = $sql_select_datas->fetch(PDO::FETCH_ASSOC);

    // Armazenar retornos
    $data_bimestre1 = $datas_fim_bimestres['bimestre1'];
    $data_bimestre2 = $datas_fim_bimestres['bimestre2'];
    $data_bimestre3 = $datas_fim_bimestres['bimestre3'];
    $data_bimestre4 = $datas_fim_bimestres['bimestre4'];

    ?>


    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <div id="cadastro" class="col s12 m12 l12">
            <h4 class="center">Alteração de Datas Finais dos Bimestres</h4>
            <br><br>
            <form action="php/alteracaoDatasFinais.php" method="POST">
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">filter_1</i>
                        <input type="text" name="bimestre1" value="1º Bimestre" readonly>
                        <label id="lbl">Bimestre</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Ano/Mes/Dia" type="text" class="datepicker validate" name="dataBimestre1" value="<?php echo $data_bimestre1 ?>">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">filter_2</i>
                        <input type="text" name="bimestre2" value="2º Bimestre" readonly>
                        <label id="lbl">Bimestre</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Ano/Mes/Dia" type="text" class="datepicker validate" name="dataBimestre2" value="<?php echo $data_bimestre2; ?>">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">filter_3</i>
                        <input type="text" name="bimestre3" value="3º Bimestre" readonly>
                        <label id="lbl">Bimestre</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Ano/Mes/Dia" type="text" class="datepicker validate" name="dataBimestre3" value="<?php echo $data_bimestre3; ?>">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">filter_4</i>
                        <input type="text" name="bimestre4" value="4º Bimestre" readonly>
                        <label id="lbl">Bimestre</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Ano/Mes/Dia" type="text" class="datepicker validate" name="dataBimestre4" value="<?php echo $data_bimestre4; ?>">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue">
                        <i class="material-icons left">send</i>Alterar
                    </button>
            </form>
        </div>
    </div>


    <script src="js/default.js"></script>
    <?php require_once 'reqFooter.php' ?>