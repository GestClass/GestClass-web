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
        <div id="cadastro" class="col s12 m12 l12">
            <h4 class="center">Alteração de Notas</h4>
            <br>

            <form action="php/alteracaoNotas.php" method="POST">
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
                            Nota
                        </th>
                        <th class="col s9 m9 l9">
                            Observações
                        </th>
                    </thead>

                    <tbody>


                        <?php
                        $dataAtividade = $_POST["dataAtividade"];
                        $nomeAtividade = $_POST['nomeAtividade'];

                        $query_listagem = $conn->prepare('SELECT RA, nome_aluno FROM aluno WHERE fk_id_escola_aluno = '.$id_escola.' AND fk_id_turma_aluno = 16');
                        $query_listagem->execute();

                        while ($alunos = $query_listagem->fetch(PDO::FETCH_ASSOC)) {

                            $query_boletim = $conn->prepare('SELECT nota, observacoes, ID_boletim_aluno FROM boletim_aluno WHERE data_atividade = "' . $dataAtividade . '" AND nome_atividade = "' . $nomeAtividade . '" AND fk_id_disciplina_boletim_aluno = 1 AND fk_ra_aluno_boletim_aluno = ' . $alunos['RA'] . ' AND fk_id_professor_boletim_aluno = '.$id_usuario.'');
                            $query_boletim->execute();

                            if (($dataAtividade != "") && ($nomeAtividade != "")) {

                                if ($query_boletim->rowCount()) {

                                    while ($boletim = $query_boletim->fetch(PDO::FETCH_ASSOC)) {


                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $alunos['RA']; ?>
                                            </td>

                                            <td>
                                                <?php echo $alunos['nome_aluno']; ?>
                                            </td>

                                            <td class="col s3 m3 l3">
                                                <input value="<?php echo $boletim['nota']; ?>" type="number" class="validate" name="<?php echo $alunos['RA'] . 'nota'; ?>">
                                            </td>

                                            <td class="col s9 m9 l9">
                                                <input value="<?php echo $boletim['observacoes']; ?>" type="text" class="validate" name="<?php echo $alunos['RA'] . 'observacao'; ?>">
                                            </td>
                                        </tr>

                                        <input type="hidden" name="idBoletim<?php echo $alunos['RA'];?>" value="<?php echo $boletim['ID_boletim_aluno'];?>">



                                    <?php
                                    }
                                } else {
                                    ?>

                                    <script>
                                        alert('Nenhum resultado encontrado, verifique o Nome e a Data da atividade!!')
                                        window.location = 'boletimCadastro.html.php'
                                    </script>

                                <?php
                                }
                            } else {
                                ?>

                                <script>
                                    alert('Preencha corretamente os campos de Nome e Data para pesquisar a atividade!!')
                                    window.location = 'boletimCadastro.html.php'
                                </script>

                        <?php
                            }
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
        <?php require_once 'reqFooter.php' ?>