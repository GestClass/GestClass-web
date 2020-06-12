<!DOCTYPE html>

<body class="body_estilizado">
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


    ?>

    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <table class="striped centered">
            <thead>

                <th>
                    Nome
                </th>
                <th>
                    Celular
                </th>
                <th>
                    Telefone
                </th>
                <th>
                    Email
                </th>
                <th>
                    CPF
                </th>
            </thead>
            <tbody>



                <?php
                $query_listagem = $conn->prepare('SELECT  nome_professor, celular, telefone, email, cpf,fk_id_tipo_usuario_professor,ID_professor FROM professor WHERE fk_id_escola_professor = ' . $id_escola . '');
                $query_listagem->execute();

                if ($query_listagem->rowCount()) {

                    while ($professor = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>


                            <td>
                                <a href="dadosUsuarios.html.php?id=<?php echo $professor['ID_professor'] ?>&tipo=<?php echo $professor['fk_id_tipo_usuario_professor'] ?> "><?php echo $professor['nome_professor']; ?></a>
                            </td>

                            <td>
                                <?php echo $professor['celular']; ?>
                            </td>

                            <td>
                                <?php echo $professor['telefone']; ?>
                            </td>

                            <td>
                                <?php echo $professor['email']; ?>
                            </td>

                            <td>
                                <?php echo $professor['cpf']; ?>
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
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large light-blue lighten-1">
                <i class="large material-icons">add</i>
            </a>
            <ul>
                <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Cadastrar Turmas"><i class="material-icons">book</i></a></li>
                <li><a href="atribuicaoDisciplinas.html.php" class="btn-floating green tooltipped" data-position="left" data-tooltip="Atribuição de turmas e disciplinas"><i class="material-icons">import_contacts</i></a></li>
            </ul>
        </div>
    </div>
    <?php
    include_once 'reqFooter.php';
    ?>