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

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    // Alterar abaixo para o valor quando vier do <select>
    $id_disciplina = 1;
    $dataChamada = $_POST['dataChamada'];

    if ($dataChamada != "") {
    ?>
        <form action="alteracaoChamada.html.php?idChamada=1" method="$_GET">
            <div class="container col s12 m12 l12" id="container_boletimCadastro">
                <h4 class="center">Alteração de Chamada</h4>
                <br />
                <br />
                <table class="striped centered">
                    <thead>
                        <th>
                            Data
                        </th>
                        <th>
                            Disciplina
                        </th>
                        <th></th>
                    </thead>
                    <tbody>



                        <?php
                        $query_listagem = $conn->prepare('SELECT * FROM listagem_chamada WHERE fk_id_escola_listagem_chamada = ' . $id_escola . ' AND fk_id_professor_listagem_chamada = ' . $id_usuario . ' AND fk_id_disciplina_listagem_chamada = ' . $id_disciplina . '');
                        $query_listagem->execute();

                        if ($query_listagem->rowCount()) {

                            while ($chamadas = $query_listagem->fetch(PDO::FETCH_ASSOC)) {

                                $query_nome_disciplina = $conn->prepare('SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = ' . $chamadas['fk_id_disciplina_listagem_chamada'] . '');
                                $query_nome_disciplina->execute();

                                while ($nome_disciplina = $query_nome_disciplina->fetch(PDO::FETCH_ASSOC)) {

                                    $nomeDisciplina = $nome_disciplina['nome_disciplina'];
                                    $id_chamada = $chamadas['ID_listagem'];

                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $chamadas['data_chamada']; ?>
                                        </td>
                                        <td>
                                            <?php echo $nomeDisciplina ?>
                                        </td>
                                        <td>
                                            <a href="alteracaoChamada.html.php?idChamada=<?php echo $id_chamada ?>">Editar</a>
                                        </td>
                                    </tr>
                            <?php
                                }
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
        </form>
    <?php
    } else {
    ?>
        <script>
            alert('Por Favor, selecione a Data!!')
            history.back()
        </script>
    <?php
    }
    include_once 'reqFooter.php';
    ?>