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
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select_turmas = $conn->prepare("SELECT turma.ID_turma AS ID_turma, turma.nome_turma AS nome_turma, turma.situacao AS situacao, turno.nome_turno AS nome_turno FROM turma  INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.fk_id_turno_turma = 1");
                    $select_turmas->execute();

                    if ($select_turmas->rowCount()) {

                        while ($turmas_array = $select_turmas->fetch(PDO::FETCH_ASSOC)) {

                            $id_turma = $turmas_array['ID_turma'];
                            $nome_turma = $turmas_array['nome_turma'];
                            $turno_turma = $turmas_array['nome_turno'];
                            $situacao = $turmas_array['situacao'];

                            if ($situacao) {
                                $status = 'Ativa';
                            } else {
                                $status = 'Desativa';
                            }

                    ?>

                            <tr>
                                <td><?php echo $nome_turma ?></td>
                                <td><?php echo $turno_turma ?></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $status; ?></td>
                                <td>
                                    <?php

                                    $select_alunos_turma = $conn->prepare("SELECT ra FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma AND situacao = true");
                                    $select_alunos_turma->execute();

                                    if ($select_alunos_turma->rowCount()) {
                                    ?>
                                        <form action="php/confirmDesativarAlunosTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">archive</i>Desativar Alunos
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <button disabled id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                            <i class="material-icons left">archive</i>Desativar Alunos
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($situacao) {
                                    ?>
                                        <form action="php/confirmDesativarTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">delete</i>Desativar Turma
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="php/ativarTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightGreen center" style="float: center;">
                                                <i class="material-icons left">unarchive</i>Ativar Turma
                                            </button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
            <h5 class="center">Período Matutino</h5>
            <hr>
            <br><br>
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select_turmas = $conn->prepare("SELECT turma.ID_turma AS ID_turma, turma.nome_turma AS nome_turma, turma.situacao AS situacao, turno.nome_turno AS nome_turno FROM turma  INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.fk_id_turno_turma = 2");
                    $select_turmas->execute();

                    if ($select_turmas->rowCount()) {

                        while ($turmas_array = $select_turmas->fetch(PDO::FETCH_ASSOC)) {

                            $id_turma = $turmas_array['ID_turma'];
                            $nome_turma = $turmas_array['nome_turma'];
                            $turno_turma = $turmas_array['nome_turno'];
                            $situacao = $turmas_array['situacao'];

                            if ($situacao) {
                                $status = 'Ativa';
                            } else {
                                $status = 'Desativa';
                            }

                    ?>

                            <tr>
                                <td><?php echo $nome_turma ?></td>
                                <td><?php echo $turno_turma ?></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $status; ?></td>
                                <td>
                                    <?php

                                    $select_alunos_turma = $conn->prepare("SELECT ra FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma AND situacao = true");
                                    $select_alunos_turma->execute();

                                    if ($select_alunos_turma->rowCount()) {
                                    ?>
                                        <form action="php/confirmDesativarAlunosTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">archive</i>Desativar Alunos
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <button disabled id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                            <i class="material-icons left">archive</i>Desativar Alunos
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($situacao) {
                                    ?>
                                        <form action="php/confirmDesativarTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">delete</i>Desativar Turma
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="php/ativarTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightGreen center" style="float: center;">
                                                <i class="material-icons left">unarchive</i>Ativar Turma
                                            </button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
            <h5 class="center">Período Matutino</h5>
            <hr>
            <br><br>
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select_turmas = $conn->prepare("SELECT turma.ID_turma AS ID_turma, turma.nome_turma AS nome_turma, turma.situacao AS situacao, turno.nome_turno AS nome_turno FROM turma  INNER JOIN turno ON (turma.fk_id_turno_turma = turno.ID_turno) WHERE turma.fk_id_escola_turma = $id_escola AND turma.fk_id_turno_turma = 3");
                    $select_turmas->execute();

                    if ($select_turmas->rowCount()) {

                        while ($turmas_array = $select_turmas->fetch(PDO::FETCH_ASSOC)) {

                            $id_turma = $turmas_array['ID_turma'];
                            $nome_turma = $turmas_array['nome_turma'];
                            $turno_turma = $turmas_array['nome_turno'];
                            $situacao = $turmas_array['situacao'];

                            if ($situacao) {
                                $status = 'Ativa';
                            } else {
                                $status = 'Desativa';
                            }

                    ?>

                            <tr>
                                <td><?php echo $nome_turma ?></td>
                                <td><?php echo $turno_turma ?></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $status; ?></td>
                                <td>
                                    <?php

                                    $select_alunos_turma = $conn->prepare("SELECT ra FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma AND situacao = true");
                                    $select_alunos_turma->execute();

                                    if ($select_alunos_turma->rowCount()) {
                                    ?>
                                        <form action="php/confirmDesativarAlunosTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">archive</i>Desativar Alunos
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <button disabled id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                            <i class="material-icons left">archive</i>Desativar Alunos
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($situacao) {
                                    ?>
                                        <form action="php/confirmDesativarTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                                <i class="material-icons left">delete</i>Desativar Turma
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="php/ativarTurma.php" method="POST">
                                            <input type="hidden" name="idTurma" value="<?php echo $id_turma; ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightGreen center" style="float: center;">
                                                <i class="material-icons left">unarchive</i>Ativar Turma
                                            </button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    require_once 'reqFooter.php';
    ?>