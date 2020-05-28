<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$disciplina = $_POST["disciplina"];

if ($disciplina != "") {

    $query_insert = $conn->prepare("INSERT INTO disciplina (nome_disciplina)VALUES (:disciplina)");


    $query_insert->bindParam(':disciplina' , $_POST["disciplina"], PDO::PARAM_STR);

    if ($query_insert->execute()) {

        if ($id_tipo_usuario == 2) {
?>
            <script>

                var confirmacao = confirm('Deseja cadastrar outra disciplina?');

                if (confirmacao == true) {
                    window.location = '../disciplinas.html.php';
                } else {
                    window.location = '../cadastroNovasDisciplinas.html.php';
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
                    window.location = '../cadastroNovasDisciplinas.html.php';
                }
            </script>
<?php
        }
    }
} else {
    echo "<script>alert('Erro: Disciplina não cadastrada, Preencha os campos.');
				history.back();;
				 </script>";
}

?>