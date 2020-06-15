<!DOCTYPE html>

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
    }

    $turma = $_POST['turmas'];
    ?>

    <div class="container col s12 m12 l12">
        <table class="striped">
            <thead>
                <th>
                    RA
                </th>
                <th>
                    Nome
                </th>
            </thead>
            <tbody>



                <?php
                $query_listagem = $conn->prepare('SELECT RA, nome_aluno, celular, telefone, email, cpf,fk_id_responsavel_aluno,fk_id_tipo_usuario_aluno FROM aluno WHERE fk_id_escola_aluno = ' . $id_escola . ' AND fk_id_turma_aluno = ' . $turma . '');
                $query_listagem->execute();

                if ($query_listagem->rowCount()) {

                    while ($alunos = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td>
                                <?php echo $alunos['RA']; ?>
                            </td>

                            <td>
                                <a href="enviarOcorrencias.html.php?id=<?php echo $alunos['fk_id_responsavel_aluno']?>"><?php echo $alunos['nome_aluno']; ?></a>
                            </td>
                        </tr>


                    <?php
                    }
                } else {
                    ?>
                    <script>
                        alert('Nenhum registro encontrado!!')
                        history.back()
                    </script>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    include_once 'reqFooter.php';
    ?>