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
    <link rel="stylesheet" type="text/css" href="css/homeAdmGest.css" />
    <link rel="stylesheet" type="text/css" href="css/cadastroEscola.css" />


</head>

<body>

    <?php require_once 'reqMenuAdm.php' ?>
    <br><br>
    <h4 class="center">Escolas Cadastradas</h4>
    <br><br>
    <?php
    include_once 'php/conexao.php';
    ?>
    <section class="escolas">
        <div class="col s12">
            <div class="container">
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Nome Escola</th>
                            <th>Qtde de Alunos</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Selecionar dados da escola
                        $query = $conn->prepare("SELECT ID_escola, nome_escola FROM escola");
                        // Executar
                        $query->execute();
                        // Armazenar array
                        while ($array_escola = $query->fetch(PDO::FETCH_ASSOC)) {
                            $nome_escola = $array_escola['nome_escola'];
                            $id_escola = $array_escola['ID_escola'];

                            // Select qtde alunos da escola
                            $select_qtde = $conn->prepare("SELECT COUNT(nome_aluno) AS qtde FROM aluno WHERE fk_id_escola_aluno = $id_escola");
                            // Executar
                            $select_qtde->execute();
                            // Armazenar array
                            $array_qtde = $select_qtde->fetch(PDO::FETCH_ASSOC);
                            // Armazenar qtde
                            $qtde_alunos = $array_qtde['qtde'];

                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $nome_escola;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $qtde_alunos;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $total = number_format(($qtde_alunos * 0.85), 2, ',', '.');
                                    echo 'R$ ' . $total;
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/customAdm.js"></script>
    <script src="js/default.js"></script>

</body>

</html>