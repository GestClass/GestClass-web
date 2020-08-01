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

    ?>

    <br>
    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
                    <li class="tab col s3 m4 l4 "><a href="#matutino">Matutino</a></li>
                    <li class="tab col s3 m4 l4 "><a href="#vespertino">Vespertino</a></li>
                    <li class="tab col s3 m4 l4 "><a href="#noturno">Noturno</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>

        <div id="matutino" class="col s12 m12 l12">

            <h3 class="center">Lista de Turmas</h3>
            <hr>
            <h5 class="center">Período Matutino</h5>
            <hr>
            <br><br>
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select_turmas = $conn->prepare("SELECT turma.ID_turma AS ID_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma  INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true AND turma.fk_id_turno_turma = 1");
                    $select_turmas->execute();

                    while ($turmas_array = $select_turmas->fetch(PDO::FETCH_ASSOC)) {

                        $id_turma = $turmas_array['ID_turma'];
                        $nome_turma = $turmas_array['nome_turma'];
                        $turno_turma = $turmas_array['nome_turno'];

                    ?>

                        <tr>
                            <td><?php echo $nome_turma ?></td>
                            <td><?php echo $turno_turma ?></td>
                            <td>
                                <form action="php/confirmDesativarAlunosTurma.php" method="POST">
                                    <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">archive</i>Desativar Alunos
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="php/confirmDesativarTurma.php" method="POST">
                                    <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">delete</i>Desativar Turma
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="vespertino" class="col s12 m12 l12">
            <h3 class="center">Lista de Turmas</h3>
            <hr>
            <h5 class="center">Período Vespertino</h5>
            <hr>
            <br><br>
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select_turmas = $conn->prepare("SELECT turma.ID_turma AS ID_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma  INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true AND turma.fk_id_turno_turma = 2");
                    $select_turmas->execute();

                    while ($turmas_array = $select_turmas->fetch(PDO::FETCH_ASSOC)) {

                        $id_turma = $turmas_array['ID_turma'];
                        $nome_turma = $turmas_array['nome_turma'];
                        $turno_turma = $turmas_array['nome_turno'];

                    ?>

                        <tr>
                            <td><?php echo $nome_turma ?></td>
                            <td><?php echo $turno_turma ?></td>
                            <td>
                                <form action="php/confirmDesativarAlunosTurma.php" method="POST">
                                    <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">archive</i>Desativar Alunos
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="php/confirmDesativarTurma.php" method="POST">
                                    <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">delete</i>Desativar Turma
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="noturno" class="col s12 m12 l12">
            <h3 class="center">Lista de Turmas</h3>
            <hr>
            <h5 class="center">Período Noturno</h5>
            <hr>
            <br><br>
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select_turmas = $conn->prepare("SELECT turma.ID_turma AS ID_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma  INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.situacao = true AND turma.fk_id_turno_turma = 3");
                    $select_turmas->execute();

                    while ($turmas_array = $select_turmas->fetch(PDO::FETCH_ASSOC)) {

                        $id_turma = $turmas_array['ID_turma'];
                        $nome_turma = $turmas_array['nome_turma'];
                        $turno_turma = $turmas_array['nome_turno'];

                    ?>

                        <tr>
                            <td><?php echo $nome_turma ?></td>
                            <td><?php echo $turno_turma ?></td>
                            <td>
                                <form action="php/confirmDesativarAlunosTurma.php" method="POST">
                                    <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">archive</i>Desativar Alunos
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="php/confirmDesativarTurma.php" method="POST">
                                    <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">delete</i>Desativar Turma
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    require_once 'reqFooter.php';
    ?>