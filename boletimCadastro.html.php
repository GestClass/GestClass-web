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

        <div class="row">
            <div class="col s12 m12 l12">
                <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
                    <li class="tab col s3 m6 l6 "><a href="#cadastro">Cadastro de notas</a></li>
                    <li class="tab col s3 m6 l6 "><a href="#alteracao">Alteração de notas</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>

        <div id="cadastro" class="col s12 m12 l12">
            <h4 class="center">Cadastro de Notas</h4>
            <br>
            <form action="php/cadastroNotas.php" method="POST">
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">border_color</i>
                        <input placeholder="Dê um nome a atividade" type="text" name="nomeAtividade">
                        <label id="lbl">Nome atividade</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Ano/Mes/Dia" type="text" class="datepicker validate" name="dataAtividade">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>

                <br><br>
                <table class="striped centered">
                    <thead class="">
                        <th>
                            RA
                        </th>
                        <th>
                            Nome
                        </th>
                        <th class="col s3 m3 l3">
                            &nbsp&nbsp&nbsp&nbsp Nota &nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th class="col s9 m9 l9">
                            Observações
                        </th>
                    </thead>
                    <tbody>



                        <?php
                        $query_listagem = $conn->prepare('SELECT RA, nome_aluno FROM aluno WHERE fk_id_escola_aluno = ' . $id_escola . ' AND fk_id_turma_aluno = 16');
                        $query_listagem->execute();

                        while ($alunos = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $alunos['RA']; ?>
                                </td>

                                <td>
                                    <?php echo $alunos['nome_aluno']; ?>
                                </td>

                                <td class="col s3 m3 l3">
                                    <input placeholder="ex: 5,00" type="number" class="validate" name="<?php echo $alunos['RA'] . 'nota'; ?>">
                                </td>

                                <td class="col s9 m9 l9">
                                    <input placeholder="Observações..." type="text" class="validate" name="<?php echo $alunos['RA'] . 'observacao'; ?>">
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <br><br><br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">send</i>Enviar
                    </button>
                </div>
            </form>
        </div>

        <div id="alteracao" class="col s12 m12 l12">
            <form action="alteracaoNotas.html.php" method="POST">
                <h4 class="center">Alteraçao de Notas</h4>
                <br>

                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">border_color</i>
                        <input placeholder="Pesquise pelo nome da atividade" type="text" name="nomeAtividade">
                        <label id="lbl">Nome atividade</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Ano/Mes/Dia" type="text" class="datepicker validate" name="dataAtividade">
                        <label id="lbl">Data da atividade</label>
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

    <script src="js/default.js"></script>
    <?php require_once 'reqFooter.php' ?>