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
    <link rel="stylesheet" type="text/css" href="css/chamada.css" />
    <link rel="stylesheet" type="text/css" href="css/boletimCadastro.css" />


</head>

<body>

    <?php
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';
    } else if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } else if ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    } elseif ($id_tipo_usuario  == 5) {
        require_once 'reqAluno.php';
    } else {
        require_once 'reqPais.php';
    }

    $idChamada = $_POST['idChamada'];
    $dataChamada = $_POST['dataChamada'];
    $idTurma = $_POST['idTurma'];
    

    ?>

    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <div id="cadastroChamada" class="col s12 m12 l12">
            <h4 class="center">Cadastro da Chamada</h4>
            <br>
            <form action="php/alteracaoChamada.php" method="POST">
                <br><br>
                <table class="highlight centered">
                    <thead>
                        <tr>
                            <th>RA</th>
                            <th>Nome</th>
                            <th>Presença</th>
                            <th>Falta</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $query_select_alunos = $conn->prepare("SELECT nome_aluno, RA FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $idTurma");
                        $query_select_alunos->execute();

                        while ($dados_alunos = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {

                            $query_select_presenca = $conn->prepare('SELECT presenca FROM chamada_aluno WHERE fk_ra_aluno_chamada_aluno = ' . $dados_alunos['RA'] . ' AND fk_id_listagem_chamada_aluno = ' . $idChamada . '');
                            $query_select_presenca->execute();

                            while ($dados_presenca = $query_select_presenca->fetch(PDO::FETCH_ASSOC)) {

                                $presenca = $dados_presenca['presenca'];
                        ?>

                                <tr>
                                    <td>
                                        <?php echo $dados_alunos['RA'] ?>
                                    </td>
                                    <td>
                                        <?php echo $dados_alunos['nome_aluno'] ?>
                                    </td>
                                    <td>
                                        <label>
                                            <input id="presenca" type="checkbox" class="filled-in presenca checkbox-blue-grey" name="<?php echo $dados_alunos['RA'] ?>presenca" value="1" <?php if ($presenca == 1) { ?> checked <?php } ?> />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input id="falta" type="checkbox" class="filled-in falta checkbox-blue-grey" name="<?php echo $dados_alunos['RA'] ?>falta" value="0" <?php if ($presenca == 0) { ?> checked <?php } ?> />
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <input type="hidden" name="idChamada<?php echo $dados_alunos['RA']; ?>" value="<?php echo $idChamada ?>">
                                <input type="hidden" name="dataChamada<?php echo $dados_alunos['RA']; ?>" value="<?php echo $dataChamada ?>">
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br><br><br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">send</i>Alterar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once 'reqFooter.php' ?>