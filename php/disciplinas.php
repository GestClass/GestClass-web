<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$disciplina = $_POST["disciplina"];

if ($disciplina != "") {

    $query_insert = $conn->prepare("INSERT INTO disciplina (nome_disciplina, fk_id_escola_disciplina) VALUES (:disciplina, :id_escola)");


    $query_insert->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);
    $query_insert->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);

    if ($query_insert->execute()) {

        if ($id_tipo_usuario == 2) {
?>
            <script>
                var confirmacao = confirm('Deseja cadastrar outra disciplina?');

                if (confirmacao == true) {
                    window.location = '../disciplinas.html.php';
                } else {
                    window.location = '../atribuicaoDisciplinas.html.php';
                }
            </script>
        <?php

        } else if ($id_tipo_usuario == 3) {
        ?>
            <script>
                var confirmacao = confirm('Deseja cadastrar outra disciplina?');

                if (confirmacao == true) {
                    window.location = '../disciplinas.html.php';
                } else {
                    window.location = '../atribuicaoDisciplinas.html.php';
                }
            </script>
<?php
        }
    } else {
        echo "
                <script>
                    alert('Erro ao cadastrar!!');
                    history.back();;
                </script>
            ";
    }
} else {
    echo "
            <script>
                alert('Erro, Por Favor Preencha os campos.');
                history.back();;
            </script>
        ";
}

?>