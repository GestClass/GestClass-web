<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/cadastroContas.css" />


</head>

<body>

    <?php
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';
    } elseif ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } elseif ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    } elseif ($id_tipo_usuario  == 5) {
        require_once 'reqAluno.php';
    } else {
        require_once 'reqPais.php';
    }

    $id_turma = $_POST['turma'];
    if ($id_turma == null) {
        ?>
        <script>
            alert('Por favor, selecione uma Turma!!');
            history.back();
        </script>
        <?php
    } else {

    ?>

        <div id="turmas_disci" class="container col s12 m12 l12 ">
            <form id="disciplina_turmas" method="POST" action="php/alteracaoTurmas.php">
                <h3 class="center">Alteração de turmas</h3><br><br>

                <div class="row">

                    <div class="input-field col s12 m6 l6 offset-l3 ">

                        <i class="material-icons prefix blue-icon">school</i>
                        <select name="turma">
                            <option value="" disabled selected>Selecione a nova turma</option>
                            <?php
                            $query_select_turma = $conn->prepare("SELECT * FROM turma WHERE fk_id_escola_turma = $id_escola");
                            $query_select_turma->execute();

                            while ($turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                $query_turno = $conn->prepare('SELECT * FROM turno WHERE ID_turno = ' . $turma_nome['fk_id_turno_turma'] . '');
                                $query_turno->execute();
                                $turma_turno = $query_turno->fetch(PDO::FETCH_ASSOC)
                            ?>
                                <option value="<?php echo $turma_nome['ID_turma'] ?>">
                                    <?php echo $turma_nome['nome_turma'] . '  -  ' . $turma_turno['nome_turno'] ?>
                                </option>
                                
                            <?php
                            }

                            ?>
                        </select>
                        <label id="lbl">Selecione a turma</label>
                        <div class="row">
                            <div class="input-field col s12 m6 l6 offset-l12">

                                <a href="cadastroTurmas.html.php" id="disciplinas" class="btn-flat btnLightBlue center">Nova Turma</a>
                            </div>
                        </div>
                    </div>
                    <table class="striped centered">

                        <thead>

                            <th>
                                Nome do aluno
                            </th>
                            <th>
                                Selecione
                            </th>
                        </thead>
                        <tbody>


                            <?php

                            $query_listagem = $conn->prepare("SELECT nome_aluno,RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
                            $query_listagem->execute();

                            if ($query_listagem->rowCount()) {
                                while ($alunos = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <tr>


                                        <td>
                                            <?php echo $alunos['nome_aluno'] ?>
                                        </td>

                                        <td>
                                            <label>
                                                <input id="alteracaoturma" type="checkbox" class="filled-in falta checkbox-blue-grey" name="<?php echo $alunos['RA'] ?>" value="<?php echo $alunos['RA'] ?>" checked />
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>


                                <?php
                                }
                            } else {
                                ?>
                                <script>
                                    alert('Nenhum registro encontrado!!')
                                </script>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br><br>
                    <div class="center">
                        <input type="hidden" name='turmaAntiga' value="<?php echo $_POST['turma'] ?>">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Alterar
                        </button>
                    </div>

            </form>
        </div>

        <script src="js/query-3.3.1.min.js"></script>
        <script src="js/default.js"></script>

    <?php
        require_once 'reqFooter.php';
    }
    ?>