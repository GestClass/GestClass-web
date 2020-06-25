<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

$nome_turma = $_POST['turma'];
$id_turno = $_POST['turno'];


if (($nome_turma != "") && ($id_turno != null)) {

    $query_insert = $conn->prepare("INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES (:turma, :id_escola, :turno)");

    $query_insert->bindParam(':turma', $nome_turma, PDO::PARAM_STR);
    $query_insert->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
    $query_insert->bindParam(':turno', $id_turno, PDO::PARAM_STR);

    if ($query_insert->execute()) {

        if ($id_tipo_usuario == 2) {
?>
            <script>
                // alert('Diciplina inserida com sucesso');

                var confirmacao = confirm('Deseja cadastrar outra turma?');

                if (confirmacao == true) {
                    window.location = '../cadastroTurmas.html.php';
                } else {
                    window.location = '../homeDiretor.html.php';
                }
            </script>
        <?php

        } else if ($id_tipo_usuario == 3) {
        ?>
            <script>
                // alert('Diciplina inserida com sucesso');

                var confirmacao = confirm('Deseja cadastrar outra turma?');

                if (confirmacao == true) {
                    window.location = '../cadastroTurmas.html.php';
                } else {
                    window.location = '../homeSecretaria.html.php';
                }
            </script>
<?php
        }
    }
} else {
    echo "
            <script>
                alert('Por favor, informe os dados solicitados!!');
				history.back();;
            </script>
        ";
}

?>