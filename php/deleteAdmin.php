<?php
include_once 'conexao.php';
$id_admin = $_GET["id_admin"];

$delete_admin = $conn->prepare("DELETE FROM `admin` WHERE ID_admin = $id_admin");
$delete_admin->execute();

if ($delete_admin->rowCount()) {
?>
    <script>
        alert('Administrador apagada com sucesso!!');
        window.location = '../admins.html.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Erro ao apagar Administrador!!');
        window.location = '../admins.html.php';
    </script>
<?php
}
?>
