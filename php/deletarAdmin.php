<?php

include_once 'conexao.php';

$id_admin = $_GET["id_admin"];

// Selecionar nome do admin
$sql_select_nome = $conn->prepare("SELECT nome FROM admin WHERE ID_admin = $id_admin");
// Executar
$sql_select_nome->execute();
// Armazenar array
$array_nome_admin = $sql_select_nome->fetch(PDO::FETCH_ASSOC);
$nome_admin = $array_nome_admin['nome'];
?>
<script>
    var resp = confirm('Deseja mesmo excluir o Administrador <?php echo $nome_admin; ?>?');

    if (resp) {
        window.location = 'deleteAdmin.php?id_admin=<?php echo $id_admin; ?>';
    } else {
        history.back();
    }
</script>