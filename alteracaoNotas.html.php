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

    // Recebendo o id da listagem da atividade                        
    $id_listagem_boletim = $_POST['id_listagem_boletim'];
    // Armazenar nome da atividade
    $nome_atividade = $_POST['nome_atividade'];
    ?>


    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <div id="cadastro" class="col s12 m12 l12">
            <h4 class="center">Alteração de Notas</h4>
            <br><br>

            <form action="php/alteracaoNotas.php" method="POST">
                <div class="row">
                    <div class="col  m8  offset-m4">
                        <div class="file field input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">border_color</i>
                            <input value="<?php echo $nome_atividade; ?>" type="text" name="nomeAtividade">
                            <label id="lbl">Nome da atividade</label>
                        </div>
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

                        // Seleciona os dados do aluno e os dados do boletim do aluno
                        $query_boletim = $conn->prepare("SELECT boletim_aluno.nota AS nota, boletim_aluno.observacoes AS observacao, boletim_aluno.fk_ra_aluno_boletim_aluno AS ra_aluno, boletim_aluno.ID_boletim_aluno AS id_boletim_aluno, aluno.nome_aluno AS nome_aluno, aluno.fk_id_turma_aluno AS id_turma FROM boletim_aluno INNER JOIN aluno ON boletim_aluno.fk_ra_aluno_boletim_aluno = aluno.RA WHERE fk_id_boletim_listagem_boletim_aluno = $id_listagem_boletim");
                        $query_boletim->execute();

                        // Verificar retorno da pesquisa ao boletim
                        if ($query_boletim->rowCount()) {

                            while ($boletim = $query_boletim->fetch(PDO::FETCH_ASSOC)) {

                                // Armazenar retornos do banco em variáveis
                                $nota = $boletim['nota'];
                                $observacao = $boletim['observacao'];
                                $ra = $boletim['ra_aluno'];
                                $id_boletim = $boletim['id_boletim_aluno'];
                                $nome_aluno = $boletim['nome_aluno'];
                                $id_turma = $boletim['id_turma'];


                        ?>
                                <tr>
                                    <td>
                                        <?php echo $ra; ?>
                                    </td>

                                    <td>
                                        <?php echo $nome_aluno; ?>
                                    </td>

                                    <td class="col s3 m3 l3">
                                        <input value="<?php echo $nota; ?>" type="number" step="0.01" class="validate" name="<?php echo $ra . 'nota'; ?>">
                                    </td>

                                    <td class="col s9 m9 l9">
                                        <input value="<?php echo $observacao; ?>" type="text" class="validate" name="<?php echo $ra . 'observacao'; ?>">
                                    </td>
                                </tr>

                                <input type="hidden" name="<?php echo $ra . 'id_boletim'; ?>" value="<?php echo $id_boletim; ?>">
                                <input type="hidden" name="id_turma" value="<?php echo $id_turma; ?>">
                            <?php
                            }
                        } else {
                            ?>
                            <script>
                                alert('Erro ao encontrar dados!!');
                                history.back();
                            </script>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <br><br><br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">edit</i>Alterar
                    </button>
                </div>
            </form>
        </div>
        <?php require_once 'reqFooter.php' ?>