<!DOCTYPE html>

<head>
    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
</head>

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
    } ?>

    <div class="container col s12 m12 l12" id="container_boletimCadastro">
            <h3 class="center">Lista de Professores</h3>
            <br><br>
            <table class="striped centered">
                <thead>

                    <th>
                        Nome
                    </th>
                    <th>
                        Celular
                    </th>
                    <th>
                        Email
                    </th>
                    <th>

                    </th>
                </thead>
                <tbody>



                    <?php
                    $query_listagem = $conn->prepare("SELECT  nome_professor, celular, email, cpf,fk_id_tipo_usuario_professor,ID_professor FROM professor WHERE fk_id_escola_professor = $id_escola");
                    $query_listagem->execute();

                    if ($query_listagem->rowCount()) {

                        while ($professor = $query_listagem->fetch(PDO::FETCH_ASSOC)) {

                            $id = $professor['ID_professor'];
                            
                    ?>
                            <tr>


                                <td>
                                    <a href="retirarDisciplinas.html.php?id=<?php echo $id ?>"><?php echo $professor['nome_professor']; ?></a>
                                </td>

                                <td>
                                    <?php echo $professor['celular']; ?>
                                </td>

                                <td>
                                    <?php echo $professor['email']; ?>
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