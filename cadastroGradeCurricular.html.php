<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
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
    $id_dia = $_POST['dia'];

    if (($id_turma == null) || ($id_padrao == null) || ($id_dia == null)) {
    ?>
        <script>
            alert('Por favor, selecione os dados solicitados!!');
            history.back();
        </script>
    <?php
    }

    // Selecionar nome dia
    $sql_select_nome_dia = $conn->prepare("SELECT nome_dia FROM dia_semana WHERE ID_dia_semana = $id_dia");
    $sql_select_nome_dia->execute();
    $array_dia = $sql_select_nome_dia->fetch(PDO::FETCH_ASSOC);
    $nome_dia = $array_dia['nome_dia'];

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
            <h5 class="center">Turma:&nbsp;&nbsp; <?php echo $nome_turma; ?></h5>
            <br>
            <hr><br><br><br>

            <form action="php/cadastroGradeCurricular.php" method="POST">
                <input type="hidden" name="idTurma" value="<?php echo $id_turma ?>">
                <input type="hidden" name="idPadrao" value="<?php echo $id_padrao ?>">
                <input type="hidden" name="idDia" value="<?php echo $id_dia ?>">

                <?php

                // Selecionar dados do padrão de horário
                $sql_select_padrao = $conn->prepare("SELECT ID_aula_escola, nome_aula, aula_start, aula_end FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola AND fk_id_turno_aula_escola = $turno_turma AND nome_padrao = '$nome_padrao' ORDER BY aula_start ASC");
                $sql_select_padrao->execute();
                while ($array_aula_escola = $sql_select_padrao->fetch(PDO::FETCH_ASSOC)) {
                    $nome_aula = $array_aula_escola['nome_aula'];
                    $aula_start = $array_aula_escola['aula_start'];
                    $aula_end = $array_aula_escola['aula_end'];
                    $id_aula = $array_aula_escola['ID_aula_escola'];
                ?>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">access_time</i>
                            <input type="text" name="nomeAula<?php echo $id_aula ?>" value="<?php echo $nome_aula . '   -   ' . $nome_dia; ?>" readonly>
                            <label id="lbl">Aula</label>
                        </div>

                        <div class="input-field col s12 m4 l4">
                            <input type="text" name="HorarioAula<?php echo $id_aula ?>" value="<?php echo $aula_start . '   -   ' . $aula_end; ?>" readonly>
                            <label id="lbl">Início - Término</label>
                        </div>

                        <div class="input-field col s12 m4 l4">
                            <select name="disciplina<?php echo $id_aula; ?>">
                                <option value="" disabled selected>Selecione a Disciplina</option>
                                <option value="-1">Intervalo</option>
                                <?php
                                // Selecionar as disciplinas da turma
                                $sql_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (fk_id_disciplina_professor_disciplinas_professor = ID_disciplina) WHERE fk_id_turma_professor_disciplinas_professor = $id_turma ORDER BY disciplina.nome_disciplina ASC");
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
                <?php
                }
                ?>
                <div class="row">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue">
                        <i class="material-icons left">send</i>Cadastrar
                    </button>
            </form>

            <form action="alteracaoGradeCurricular.html.php" method="POST">
                <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                <input type="hidden" name="idDia" value="<?php echo $id_dia; ?>">
                <input type="hidden" name="idPadrao" value="<?php echo $id_padrao; ?>">
                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue left">
                    <i class="material-icons left">edit</i>Alterar
                </button>
            </form>
        </div>

    </div>

    <?php require_once 'reqFooter.php' ?>