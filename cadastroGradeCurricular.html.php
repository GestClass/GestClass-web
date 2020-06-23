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

    // Resgatando valores do select do modal
    $id_turma = $_POST['turmas'];
    $id_padrao = $_POST['padroes'];

    // Selecionando o nome da turma
    $sql_select_nome_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
    $sql_select_nome_turma->execute();
    $array_turma = $sql_select_nome_turma->fetch(PDO::FETCH_ASSOC);
    $nome_turma = $array_turma['nome_turma'];

    ?>


    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <div id="cadastro" class="col s12 m12 l12">
            <h3 class="center">Cadastro de Grade Curricular</h3>
            <br>
            <hr>
            <h5 class="center">Turma: <?php echo $nome_turma; ?></h5>
            <br>
            <hr><br><br><br>
            <form action="php/cadastroDatasFinais.php" method="POST">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">access_time</i>
                        <input type="text" name="bimestre1" value="1º Aula" readonly>
                        <label id="lbl">Aula</label>
                    </div>

                    <div class="input-field col s12 m4 l4">
                        <input type="text" name="bimestre1" value="07:00:00  -  07:50:00" readonly>
                        <label id="lbl">Início - Término</label>
                    </div>

                    <div class="input-field col s12 m4 l4">
                        <select name="padroes">
                            <option value="" disabled selected>Selecione a Disciplina</option>
                        </select>
                    </div>
                </div>
                <br>

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

    <?php require_once 'reqFooter.php' ?>