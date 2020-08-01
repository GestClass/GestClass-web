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
    }

    $tipo_funcionario = $_POST["funcionarios"];

    if ($tipo_funcionario == "Professores") {
    ?>

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
                    ?>
                            <tr>


                                <td>
                                    <a href="dadosUsuarios.html.php?id=<?php echo $professor['ID_professor'] ?>&tipo=<?php echo $professor['fk_id_tipo_usuario_professor'] ?> "><?php echo $professor['nome_professor']; ?></a>
                                </td>

                                <td>
                                    <?php echo $professor['celular']; ?>
                                </td>

                                <td>
                                    <?php echo $professor['email']; ?>
                                </td>

                                <td>
                                    <form action="php/confirmDeleteProfessor.php" method="POST">
                                        <input type="hidden" name="idProfessor" value="<?php echo $professor['ID_professor']; ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                            <i class="material-icons left">delete</i>Excluir
                                        </button>
                                    </form>
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
    <?php } elseif ($tipo_funcionario == "Secretarios") { ?>

        <div class="container col s12 m12 l12" id="container_boletimCadastro">
            <h3 class="center">Lista de Secretários</h3>
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
                    if ($id_tipo_usuario == 2) {
                        $query_listagem = $conn->prepare("SELECT  nome_secretario, celular, email, cpf,fk_id_tipo_usuario_secretario,ID_secretario FROM secretario WHERE fk_id_escola_secretario = $id_escola ");
                    } else {
                        $query_listagem = $conn->prepare("SELECT  nome_secretario, celular, email, cpf,fk_id_tipo_usuario_secretario,ID_secretario FROM secretario WHERE fk_id_escola_secretario = $id_escola AND ID_secretario != $id_usuario");
                    }
                    $query_listagem->execute();

                    if ($query_listagem->rowCount()) {

                        while ($secretario = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>


                                <td>
                                    <a href="dadosUsuarios.html.php?id=<?php echo $secretario['ID_secretario'] ?>&tipo=<?php echo $secretario['fk_id_tipo_usuario_secretario'] ?> "><?php echo $secretario['nome_secretario']; ?></a>
                                </td>

                                <td>
                                    <?php echo $secretario['celular']; ?>
                                </td>

                                <td>
                                    <?php echo $secretario['email']; ?>
                                </td>

                                <td>
                                    <form action="php/confirmDeleteSecretario.php" method="POST">
                                        <input type="hidden" name="idSecretario" value="<?php echo $secretario['ID_secretario']; ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                            <i class="material-icons left">delete</i>Excluir
                                        </button>
                                    </form>
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
    <?php } elseif ($tipo_funcionario == "Diretores") { ?>

        <div class="container col s12 m12 l12" id="container_boletimCadastro">
            <h3 class="center">Lista de Diretores</h3>
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
                        CPF
                    </th>
                </thead>
                <tbody>



                    <?php
                    if ($id_tipo_usuario == 2) {
                        $query_listagem = $conn->prepare("SELECT  nome_diretor, celular, email, cpf,fk_id_tipo_usuario_diretor,ID_diretor FROM diretor WHERE fk_id_escola_diretor = $id_escola AND ID_diretor != $id_usuario");
                    } elseif ($id_tipo_usuario == 3) {
                        $query_listagem = $conn->prepare("SELECT  nome_diretor, celular, email, cpf,fk_id_tipo_usuario_diretor,ID_diretor FROM diretor WHERE fk_id_escola_diretor = $id_escola");
                    }
                    $query_listagem->execute();

                    if ($query_listagem->rowCount()) {

                        while ($diretor = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>


                                <td>
                                    <a href="dadosUsuarios.html.php?id=<?php echo $diretor['ID_diretor'] ?>&tipo=<?php echo $diretor['fk_id_tipo_usuario_diretor'] ?> "><?php echo $diretor['nome_diretor']; ?></a>
                                </td>

                                <td>
                                    <?php echo $diretor['celular']; ?>
                                </td>

                                <td>
                                    <?php echo $diretor['email']; ?>
                                </td>

                                <td>
                                    <?php echo $diretor['cpf']; ?>
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
    }
    include_once 'reqFooter.php';
    ?>