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
    $id_disciplina=$_POST['disciplinas'];
    $_SESSION['id_disciplinas']=$id_disciplina;

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

    ?>

    <div class="container col s12 m12 l12" id="container_boletimCadastro">

        <div class="row">
            <div class="col s12 m12 l12">
                <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
                    <li class="tab col s3 m6 l6 "><a href="#cadastroChamada">Cadastro da Chamada</a></li>
                    <li class="tab col s3 m6 l6 "><a href="#alteracaoChamada">Alteração da Chamada</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>

        <div id="cadastroChamada" class="col s12 m12 l12">
            <h4 class="center">Cadastro da Chamada</h4>
            <br>
            <form action="php/cadastroChamada.php" method="POST">
                <div class="row">
                    <div class="col  m8  offset-m4">
                        <div class="file field input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">event</i>
                            <input placeholder="Dia/Mes/Ano" type="text" class="datepicker validate" name="dataChamada">
                            <label id="lbl">Data da atividade</label>
                        </div>
                    </div>
                </div>

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
                        $id_turma=$_SESSION['id_turma'];
                        $query_select_alunos = $conn->prepare("SELECT nome_aluno, RA FROM aluno WHERE   fk_id_turma_aluno = $id_turma AND fk_id_escola_aluno = $id_escola");
                        $query_select_alunos->execute();

                        while ($dados_alunos = $query_select_alunos->fetch(PDO::FETCH_ASSOC)) {


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
                                        <input id="presenca" type="checkbox" class="filled-in presenca checkbox-blue-grey" name="<?php echo $dados_alunos['RA'].'presenca'?>" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input id="falta" type="checkbox" class="filled-in falta checkbox-blue-grey" name="<?php echo $dados_alunos['RA'].'falta'?>" value="0" />
                                        <span></span>
                                    </label>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br><br><br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">send</i>Cadastrar
                    </button>
                </div>
            </form>
        </div>

        <div id="alteracaoChamada" class="col s12 m12 l12">
            <form action="listagemChamada.html.php" method="POST">
                <h4 class="center">Alteraçao da Chamada</h4>
                <br>

                <div class="row">
                    <div class="col  m8  offset-m4">
                        <div class="file field input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">event</i>
                            <input placeholder="Dia/Mes/Ano" type="text" class="datepicker validate" name="dataChamada">
                            <label id="lbl">Data da Chamada</label>
                        </div>
                    </div>
                </div>

                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script src="js/chamada.js"></script>

    <?php require_once 'reqFooter.php' ?>