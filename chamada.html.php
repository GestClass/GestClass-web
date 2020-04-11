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

    $query_alunos = $conn->prepare("SELECT t.id_turma,t.nome_turma FROM turma AS t JOIN turmas_professor AS P ON t.id_turma = P.fk_id_turma_professor_turmas_professor");
    $query_alunos->execute();





    ?>


    <div class="container col s12 m12 l12">
        <h4>Chamada</h4>
        <form action="php/chamada.php" method="post"><br>
            <div class="row">
                <div class="input-field col s12 m3 l2">
                    <input name="data_chamada" id="data_chamada" type="text" placeholder="05/09/2020" class="datepicker validate">
                    <label id="lbl" for="icon_telephone">Data</label>
                </div>
            </div>
            <table class="highlight centered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Presença</th>
                        <th>Falta</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $query_select_alunos = $conn->prepare("SELECT nome_aluno FROM aluno WHERE fk_id_escola_aluno = $id_escola");
                    $query_select_alunos->execute();

                    while ($dados_alunos = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {

                    ?>

                        <tr>
                            <td><?php echo $dados_alunos['nome_aluno'] ?></td>
                            <td>
                                <label>
                                    <input id="presenca" type="checkbox" class="filled-in presenca checkbox-blue-grey" name="presenca[]" value="1" />
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input id="falta" type="checkbox" class="filled-in falta checkbox-blue-grey" name="falta[]" value="1" />
                                    <span></span>
                                </label>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="input-field right">
                <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue">Enviar</button>
            </div>
        </form>
    </div>

    <script src="js/chamada.js"></script>

    <?php require_once 'reqFooter.php' ?>