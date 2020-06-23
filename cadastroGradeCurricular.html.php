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

    // Selecionar nome do padrão de horários
    $sql_selct_nome_padrao = $conn->prepare("SELECT nome_padrao FROM aula_escola WHERE ID_aula_escola = $id_padrao");
    $sql_selct_nome_padrao->execute();
    $array_nome_padrao = $sql_selct_nome_padrao->fetch(PDO::FETCH_ASSOC);
    $nome_padrao = $array_nome_padrao['nome_padrao'];

    // Selecionando o nome da turma
    $sql_select_nome_turma = $conn->prepare("SELECT nome_turma, fk_id_turno_turma AS id_turno FROM turma WHERE ID_turma = $id_turma");
    $sql_select_nome_turma->execute();
    $array_turma = $sql_select_nome_turma->fetch(PDO::FETCH_ASSOC);
    $nome_turma = $array_turma['nome_turma'];
    $turno_turma = $array_turma['id_turno'];

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
            <?php
                // Selecionar dados do padrão de horário
                $sql_select_padrao = $conn->prepare("SELECT nome_aula, aula_start, aula_end FROM aula_escola WHERE fk_id_escola_aula_escola = 1 AND fk_id_turno_aula_escola = 1 AND nome_padrao = '$nome_padrao' ORDER BY aula_start ASC")
            ?>
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
                            <?php
                            // Selecionar as disciplinas da turma
                            $sql_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (fk_id_disciplina_professor_disciplinas_professor = ID_disciplina) WHERE fk_id_turma_professor_disciplinas_professor = $id_turma");
                            $sql_select_disciplinas->execute();

                            while ($array_disciplinas = $sql_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
                                $nome_disciplina = $array_disciplinas['nome_disciplina'];
                                $id_disciplina = $array_disciplinas['id_disciplina'];

                            ?>
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                            <?php
                            }
                            ?>

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