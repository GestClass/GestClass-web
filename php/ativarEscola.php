<?php
include_once 'conexao.php';

$id_escola = $_POST['id'];
$situacao = true;
$query_desativar = $conn->prepare("UPDATE escola SET situacao = :true WHERE ID_escola = :id_escola");
$query_desativar->bindParam(':true', $situacao, PDO::FETCH_ASSOC);
$query_desativar->bindParam(':id_escola', $id_escola, PDO::FETCH_ASSOC);

if ($query_desativar->rowCount()) {
    ?>
            <script>
                alert('Escola ativada com sucesso!');
                window.location = '../cadastroEscola.html.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Erro ao ativar escola!');
                window.location = '../cadastroEscola.html.php';
            </script>
    <?php
        }
    
    ?>

?>