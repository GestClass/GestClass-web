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
    ?>


    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <div id="cadastro" class="col s12 m12 l12">
            <h4 class="center">Atribuição de datas finais de bimestres</h4>
            <br><br>
            <form action="php/cadastroDatasFinais.php" method="POST">
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">filter_1</i>
                        <input type="text" name="bimestre1" value="1º Bimestre" readonly>
                        <label id="lbl">Bimestre</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Dia/Mês/Ano" type="tel" class="datepicker validate" name="dataBimestre1">
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
                        <input placeholder="Dia/Mês/Ano" type="tel" class="datepicker validate" name="dataBimestre2">
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
                        <input placeholder="Dia/Mês/Ano" type="tel" class="datepicker validate" name="dataBimestre3">
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
                        <input placeholder="Dia/Mês/Ano" type="tel" class="datepicker validate" name="dataBimestre4">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue">
                        <i class="material-icons left">send</i>Enviar
                    </button>
            </form>

            <form action="alteracaodatasFinaisBimestres.html.php" method="POST">
                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue left">
                    <i class="material-icons left">edit</i>Alterar
                </button>
            </form>
        </div>

    </div>


    <script src="js/default.js"></script>
    <?php require_once 'reqFooter.php' ?>