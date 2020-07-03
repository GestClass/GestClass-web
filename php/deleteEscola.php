<?php
include_once 'conexao.php';
$id_escola = $_GET["id_escola"];

$delete_escola = $conn->prepare("DELETE FROM escola WHERE ID_escola = $id_escola");
$delete_escola->execute();

if ($delete_escola->rowCount()) {
?>
    <script>
        alert('Escola apagada com sucesso!!');
        window.location = '../cadastroEscola.html.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Erro ao apagar escola!!');
        window.location = '../cadastroEscola.html.php';
    </script>
<?php
}
?>
