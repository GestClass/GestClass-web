<?php

include_once 'conexao.php';

// $id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];

//$ensino = $_POST["ensino"];
$turma = $_POST["turma"];


$query = $conn->prepare("INSERT INTO turma(nome_turma) 
            VALUES ('{$turma}')");

if ($query->execute()) {

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
} else {
    echo "<script>alert('Erro: Turma não foi cadastrada');
				history.back();;
				 </script>";
}

?>