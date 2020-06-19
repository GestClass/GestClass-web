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

    // alterar para valor vindo do <select>
    $id_disciplina = 5;
    // alterar para valor vindo do select
    $id_turma = 16;

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
                <input type="hidden" value="<?php echo $id_disciplina ?>" name="id_disciplina" />
                <input type="hidden" value="<?php echo $id_turma ?>" name="id_turma" />
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">border_color</i>
                        <input placeholder="Dê um nome a atividade" type="text" name="nomeAtividade">
                        <label id="lbl">Nome atividade</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input placeholder="Dia/Mes/Ano" type="text" class="datepicker validate" name="dataAtividade">
                        <label id="lbl">Data da atividade</label>
                    </div>
                </div>

                <br><br>
                <table class="striped centered">
                    <thead>
                        <th>
                            RA
                        </th>
                        <th>
                            Nome
                        </th>
                        <th class="col s3 m3 l3">
                            Nota
                        </th>
                        <th class="col s9 m9 l9">
                            Observações
                        </th>
                    </thead>
                    <tbody>



                        <?php
                        // Seleciona o nome e ra do aluno para a lista de atribuições de notas  
                        $query_listagem = $conn->prepare("SELECT RA, nome_aluno FROM aluno WHERE fk_id_escola_aluno = $id_escola AND fk_id_turma_aluno = $id_turma");
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
                                    <input placeholder="ex: 5,00" type="number" step="0.01" class="validate" name="<?php echo $alunos['RA'] . 'nota'; ?>">
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
            <h4 class="center">Lista de Atividades Dadas</h4>
            <br>

            <br><br>
            <table class="striped centered">
                <thead class="">
                    <th>
                        Nome
                    </th>
                    <th>
                        Data
                    </th>
                    <th>
                        Disciplina
                    </th>
                </thead>

                <tbody>
                    <?php
                    // Selecionar os dados da atividade e o nome da disciplia 
                    $query_listagem_boletim = $conn->prepare("SELECT boletim_aluno.nome_atividade   AS nome_atividade, boletim_aluno.data_atividade AS data_atividade,  boletim_aluno.fk_id_disciplina_boletim_aluno AS id_disciplina, boletim_aluno.fk_id_boletim_listagem_boletim_aluno AS id_listagem, disciplina.nome_disciplina AS nome_disciplina FROM boletim_aluno INNER JOIN disciplina ON fk_id_disciplina_boletim_aluno = ID_disciplina WHERE boletim_aluno.fk_id_disciplina_boletim_aluno = $id_disciplina AND boletim_aluno.fk_id_turma_boletim_aluno = $id_turma GROUP BY fk_id_boletim_listagem_boletim_aluno ORDER BY data_atividade ASC, nome_atividade ASC");
                    $query_listagem_boletim->execute();

                    while ($lista = $query_listagem_boletim->fetch(PDO::FETCH_ASSOC)) {
                        // Armazenando o id da listagem
                        $id_listagem_boletim = $lista['id_listagem'];
                        $nome_atividade = $lista['nome_atividade'];
                    ?>
                        <tr>
                            <td>
                                <?php echo $nome_atividade; ?>
                            </td>

                            <td>
                                <?php echo date('d-m-Y', strtotime($lista['data_atividade'])); ?>
                            </td>

                            <td>
                                <?php echo $lista['nome_disciplina']; ?>
                            </td>

                            <td>

                                <div class="center">
                                    <form action="alteracaoNotas.html.php" method="POST">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue">
                                            <i class="material-icons left">edit</i>Alterar
                                        </button>
                                        <!--    Enviar o id la listagem da atividade    -->
                                        <input type="hidden" value="<?php echo $id_listagem_boletim ?>" name="id_listagem_boletim" />
                                        <input type="hidden" value="<?php echo $nome_atividade ?>" name="nome_atividade" />                                        
                                    </form>
                                </div>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br><br><br>

        </div>

    </div>

    <script src="js/default.js"></script>
    <?php require_once 'reqFooter.php' ?>