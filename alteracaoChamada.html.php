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

    $dataChamada = $_POST['dataChamada'];
    // Alterar abaixo para o valor quando vier do <select>
    $id_disciplina = 1;
    $id_professor = $id_usuario;

    if ($dataChamada != "") {
    ?>

        <div class="container col s12 m12 l12" id="container_boletimCadastro">
            <table class="striped centered">
                <thead>
                    <th>
                        Data
                    </th>
                </thead>
                <tbody>



                    <?php
                    $query_listagem = $conn->prepare('SELECT data_aula FROM chamada_aluno WHERE fk_id_escola_aluno = ' . $id_escola . ' AND fk_id_professor_chamada_aluno = '.$id_professor.' AND fk_id_disciplina_chamada_aluno = '.$id_disciplina.'');
                    $query_listagem->execute();

                    if ($query_listagem->rowCount()) {

                        while ($chamadas = $query_listagem->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>
                                <td>
                                    <?php echo $chamadas['data_aula']; ?>
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