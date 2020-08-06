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
    <link rel="stylesheet" type="text/css" href="css/mensagensDiretor.css" />


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

    $turma = $_POST['turmas'];

    $query = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $turma");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $nome = $dados["nome_turma"];

    if ($turma == null) {
    ?>
        <script>
            alert('Por favor, escolha uma Turma!!');
            history.back();
        </script>
    <?php
    }

    ?>

    <div class="container col s12 m12 l12" id="container_boletimCadastro">
        <h4 class="center">Turma <?php echo $nome ?></h4><br>
        <table class="striped centered">
            <thead>
                <th>
                    RA
                </th>
                <th>
                    Nome
                </th>
                <th>
                    Celular
                </th>
                <th>
                    Email
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
                                <a href="enviarRespon.html.php?id_responsavel=<?php echo $alunos['fk_id_responsavel_aluno'] ?>&nome=<?php echo $alunos['nome_aluno']; ?>"><?php echo $alunos['nome_aluno']; ?></a>
                            </td>

                            <td>
                                <?php echo $alunos['celular']; ?>
                            </td>
                            <td>
                                <?php echo $alunos['email']; ?>
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

    <?php require_once 'reqFooter.php' ?>